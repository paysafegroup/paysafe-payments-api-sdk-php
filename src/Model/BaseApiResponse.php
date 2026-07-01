<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model;
use Paysafe\PhpSdk\Model\Common\Error\Error;


/**
 * Represents the base for every response object.
 */
class BaseApiResponse extends BaseModel
{
    private ?Error $error = null;

    /**
     * Builder function for error
     *
     * @param Error $error
     *
     * @return $this
     */
    public function error(?Error $error): self
    {
        $this->setError($error);

        return $this;
    }

    /**
     * Setter function for error
     *
     * @param Error $error
     *
     * @return void
     */
    public function setError(?Error $error): void
    {
        $this->error = $error;
    }

    /**
     * Getter function for error
     *
     * @return ?Error
     */
    public function getError(): ?Error
    {
        return $this->error;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class BaseApiResponse {" . PHP_EOL
            . "    error: " . $this->toIndentedString($this->error ?? null) . PHP_EOL
            . "}";
    }
}
