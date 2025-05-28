<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model;

use Paysafe\PhpSdk\Config\ObjectMapperConfiguration;
use ReflectionClass;

abstract class BaseModel
{
    public function __construct(array $__data = null)
    {
        if ($__data === null) {
            return;
        }

        $objectFromArray = ObjectMapperConfiguration::initObjectFromArray($__data, static::class);

        $ref = new ReflectionClass(static::class);
        foreach ($ref->getProperties() as $property) {
            $property->setAccessible(true);
            $propName = $property->getName();

            if (array_key_exists($propName, $__data)) {
                if ($property->isInitialized($objectFromArray)) {
                    $value = $property->getValue($objectFromArray);
                    $property->setValue($this, $value);
                }
            }
        }
    }

    /**
     * Convert the given object to string with each line indented by 4 spaces
     * (except the first line).
     *
     * @param mixed $o
     *
     * @return string
     */
    protected function toIndentedString($o): string
    {
        if ($o === null) {
            return "null";
        }
        return str_replace("\n", "\n    ", (string)$o);
    }

}
