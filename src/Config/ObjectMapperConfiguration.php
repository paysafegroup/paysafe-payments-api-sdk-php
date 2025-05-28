<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Config;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ObjectMapperConfiguration
{
    public static ?Serializer $serializer = null;

    /**
     * Get the global instance of the ObjectMapper (Singleton).
     */
    public static function getObjectMapper(): Serializer
    {
        if (self::$serializer === null) {
            self::$serializer = self::initializeObjectMapper();
        }
        return self::$serializer;
    }

    /**
     * Initializes and configures the Symfony Serializer.
     */
    private static function initializeObjectMapper(): Serializer
    {
        $encoder = [new JsonEncoder()];
        $extractor = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);
        $normalizer = [new ArrayDenormalizer(), new ObjectNormalizer(null, null, null, $extractor)];
        return new Serializer($normalizer, $encoder);
    }

    public static function initObjectFromArray($data, $type)
    {
        return self::deserialize(json_encode($data), $type);
    }

    /**
     * Serialize an object to JSON.
     */
    public static function serialize($object): string
    {
        return self::getObjectMapper()->serialize($object, 'json');
    }

    /**
     * Deserialize JSON into an object.
     */
    public static function deserialize(string $json, string $classType)
    {
        return self::getObjectMapper()->deserialize($json, $classType, 'json');
    }

}
