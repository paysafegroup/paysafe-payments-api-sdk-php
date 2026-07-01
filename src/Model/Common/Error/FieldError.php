<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Error;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * If applicable, this is a list of fields that have issues.
 */
class FieldError extends BaseModel
{
    /**
     * Identifies the JSON request field
     */
    private ?string $field = null;
    /**
     * The problem associated with field
     */
    private ?string $error = null;

    /**
     * Builder function for field
     *
     * @param string $field
     *
     * @return $this
     */
    public function field(?string $field): self
    {
        $this->setField($field);

        return $this;
    }

    /**
     * Setter function for field
     *
     * @param string $field
     *
     * @return void
     */
    public function setField(?string $field): void
    {
        $this->field = $field;
    }

    /**
     * Getter function for field
     *
     * @return ?string
     */
    public function getField(): ?string
    {
        return $this->field;
    }
    /**
     * Builder function for error
     *
     * @param string $error
     *
     * @return $this
     */
    public function error(?string $error): self
    {
        $this->setError($error);

        return $this;
    }

    /**
     * Setter function for error
     *
     * @param string $error
     *
     * @return void
     */
    public function setError(?string $error): void
    {
        $this->error = $error;
    }

    /**
     * Getter function for error
     *
     * @return ?string
     */
    public function getError(): ?string
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
        return "class FieldError {" . PHP_EOL
            . "    field: " . $this->toIndentedString($this->field ?? null) . PHP_EOL
            . "    error: " . $this->toIndentedString($this->error ?? null) . PHP_EOL
            . "}";
    }
}
