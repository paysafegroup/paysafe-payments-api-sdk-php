<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model;

use Paysafe\PhpSdk\Model\Common\Error\Error;
use Paysafe\PhpSdk\Model\BaseModel;

abstract class BaseApiResponse extends BaseModel
{
    private Error $error;

    public function getError(): Error

    {
        return $this->error;
    }

    public function setError(Error $error): void

    {
        $this->error = $error;
    }

    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class BaseApiResponse {" . PHP_EOL
            . "    error: " . $this->toIndentedString($this->error) . "\n"
            . "}";
    }
}
