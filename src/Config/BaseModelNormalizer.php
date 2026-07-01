<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

declare(strict_types=1);
namespace Paysafe\PhpSdk\Config;

use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionObject;
use ReflectionProperty;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

class BaseModelNormalizer implements NormalizerInterface, DenormalizerInterface, SerializerAwareInterface
{
    private ObjectNormalizer $innerNormalizer;
    private ?SerializerInterface $serializer = null;
    private static array $fileSourceCache = [];

    private const MODEL_NAMESPACE = 'Paysafe\\PhpSdk\\Model\\';

    public function __construct(ObjectNormalizer $innerNormalizer)
    {
        $this->innerNormalizer = $innerNormalizer;
    }

    public function setSerializer(SerializerInterface $serializer): void
    {
        $this->serializer = $serializer;
        $this->innerNormalizer->setSerializer($serializer);
    }

    public function normalize($object, ?string $format = null, array $context = []): array
    {
        $data = $this->innerNormalizer->normalize($object, $format, $context);

        if ($this->isPaysafeModel($object)) {
            $ref = new ReflectionObject($object);

            // Remove uninitialised/null/empty-array properties in a single pass
            foreach ($data as $key => $value) {
                $prop = $this->getReflectionProperty($ref, $key);
                if ($prop !== null && !$prop->isInitialized($object)) {
                    unset($data[$key]);
                    continue;
                }

                if ($value === null) {
                    unset($data[$key]);
                    continue;
                }

                if (is_array($value) && empty($value)) {
                    unset($data[$key]);
                }
            }

            // Merge additionalParameters as top-level keys, remove the wrapper key
            unset($data['additionalParameters']);
            if (method_exists($object, 'getAdditionalParameters')) {
                $additionalParameters = $object->getAdditionalParameters();
                if (!empty($additionalParameters)) {
                    $data = array_merge($data, $additionalParameters);
                }
            }

            // Recursively prune nulls/empty arrays from nested payloads
            $data = $this->removeNullsRecursively($data);
        }

        return $data;
    }

    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && $this->isPaysafeModel($data);
    }

    public function denormalize($data, string $type, ?string $format = null, array $context = [])
    {
        if (is_array($data)) {
            $data = $this->coerceTypes($data, $type);
        }

        $object = $this->innerNormalizer->denormalize($data, $type, $format, $context);

        if (is_object($object) && $this->isPaysafeModel($object) && $this->serializer !== null) {
            $this->resolveTypedArrays($object, $format, $context);
        }

        return $object;
    }

    public function supportsDenormalization($data, string $type, ?string $format = null, array $context = []): bool
    {
        return $this->innerNormalizer->supportsDenormalization($data, $type, $format);
    }

    /**
     * Coerce incoming scalar values to the declared property type before the inner
     * normalizer sees them, so "5" for an int field does not cause a type error.
     *
     * Rules:
     *  - int/float : only coerce when value is a numeric string
     *  - bool      : map "true"/"1" → true, everything else → false
     *  - string    : cast any scalar to string
     *  - objects / arrays are left untouched (inner normalizer handles them)
     */
    private function coerceTypes(array $data, string $type): array
    {
        if (!class_exists($type)) {
            return $data;
        }

        try {
            $ref = new ReflectionClass($type);
        } catch (\ReflectionException $e) {
            return $data;
        }

        foreach ($data as $key => $value) {
            if ($value === null) {
                continue;
            }

            $property = $this->getReflectionProperty($ref, $key);
            if ($property === null) {
                continue;
            }

            $propType = $property->getType();
            if (!$propType instanceof ReflectionNamedType) {
                continue;
            }

            switch ($propType->getName()) {
                case 'int':
                    if (is_int($value)) {
                        $data[$key] = $value;
                    } elseif (is_string($value) && preg_match('/^-?\d+$/', $value) === 1) {
                        $data[$key] = (int) $value;
                    }
                    break;
                case 'float':
                    if (is_numeric($value)) {
                        $data[$key] = (float) $value;
                    }
                    break;
                case 'bool':
                    if (is_string($value)) {
                        $data[$key] = in_array(strtolower($value), ['true', '1'], true);
                    } elseif (is_int($value) || is_float($value)) {
                        $data[$key] = $value !== 0 && $value !== 0.0;
                    }
                    break;
                case 'string':
                    if (is_scalar($value)) {
                        $data[$key] = (string) $value;
                    }
                    break;
            }
        }

        return $data;
    }

    /**
     * Post-process a freshly denormalized object: find array properties whose
     * getter @return docblock declares a typed array (e.g. "@return Settlement[]"),
     * then deserialize each raw array element into the declared class.
     */
    private function resolveTypedArrays(object $object, ?string $format, array $context): void
    {
        $ref = new ReflectionObject($object);

        foreach ($ref->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            $methodName = $method->getName();

            if (!str_starts_with($methodName, 'get')) {
                continue;
            }

            $returnType = $method->getReturnType();
            if ($returnType === null || $returnType->getName() !== 'array') {
                continue;
            }

            $elementType = $this->extractArrayElementType($method);
            if ($elementType === null) {
                continue;
            }

            $propertyName = lcfirst(substr($methodName, 3));

            try {
                $prop = $ref->getProperty($propertyName);
                $prop->setAccessible(true);
                if (!$prop->isInitialized($object)) {
                    continue;
                }
                $value = $prop->getValue($object);
            } catch (\ReflectionException $e) {
                continue;
            }

            if (!is_array($value) || empty($value)) {
                continue;
            }

            // Some APIs return a single object instead of a one-element array — normalise it
            if (!isset($value[0]) && array_keys($value) !== range(0, count($value) - 1)) {
                $value = [$value];
            }

            if (!is_array($value[0] ?? null)) {
                continue;
            }

            $resolved = [];
            foreach ($value as $item) {
                if (is_array($item)) {
                    $encoded = json_encode($item);
                    if ($encoded === false) {
                        throw new \RuntimeException(
                            'Failed to encode array element for ' . $elementType . ': ' . json_last_error_msg()
                        );
                    }
                    $resolved[] = $this->serializer->deserialize($encoded, $elementType, $format ?? 'json', $context);
                } else {
                    $resolved[] = $item;
                }
            }

            $prop->setValue($object, $resolved);
        }
    }

    /**
     * Extract the fully qualified element type from a getter's @return docblock.
     * Short class names are resolved by reading the `use` statements in the
     * declaring class file (necessary after models moved to sub-namespaces).
     */
    private function extractArrayElementType(ReflectionMethod $method): ?string
    {
        $docComment = $method->getDocComment();
        if ($docComment === false) {
            return null;
        }

        if (!preg_match('/@return\s+([A-Z][A-Za-z0-9_\\\\]*)\[\]/', $docComment, $matches)) {
            return null;
        }

        $typeName = $matches[1];

        // Already fully qualified
        if (strpos($typeName, '\\') !== false) {
            $fqcn = ltrim($typeName, '\\');
            return class_exists($fqcn) ? $fqcn : null;
        }

        // Read use statements from the source file to resolve short names (cached per file)
        $file = $method->getDeclaringClass()->getFileName();
        if ($file !== false) {
            if (!isset(self::$fileSourceCache[$file])) {
                self::$fileSourceCache[$file] = (string) file_get_contents($file);
            }
            $source = self::$fileSourceCache[$file];
            if ($source !== ''
                && preg_match(
                    '/^use\s+([\w\\\\]+\\\\' . preg_quote($typeName, '/') . ')\s*;/m',
                    $source,
                    $useMatch
                )
            ) {
                return $useMatch[1];
            }
        }

        // Fall back: same namespace as the declaring class
        $fqcn = $method->getDeclaringClass()->getNamespaceName() . '\\' . $typeName;
        return class_exists($fqcn) ? $fqcn : null;
    }

    private function isPaysafeModel(object $object): bool
    {
        return str_starts_with(get_class($object), self::MODEL_NAMESPACE)
            || str_starts_with(get_class($object), 'Paysafe\\PhpSdk\\Exception\\Error\\');
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    private function removeNullsRecursively($value)
    {
        if (!is_array($value)) {
            return $value;
        }

        foreach ($value as $key => $item) {
            if ($item === null) {
                unset($value[$key]);
                continue;
            }

            if (is_array($item)) {
                $value[$key] = $this->removeNullsRecursively($item);
                if ($value[$key] === []) {
                    unset($value[$key]);
                }
            }
        }

        return $value;
    }

    private function getReflectionProperty(ReflectionClass $ref, string $propertyName): ?ReflectionProperty
    {
        try {
            $property = $ref->getProperty($propertyName);
            $property->setAccessible(true);
            return $property;
        } catch (\ReflectionException $e) {
            return null;
        }
    }
}
