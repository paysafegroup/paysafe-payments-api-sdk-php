<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Exception\Error;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Contains error info for the given field.
 */
class FieldError extends BaseModel implements \Serializable
{

    /**
     * @var string|null Identifies the JSON request field.
     */
    private ?string $field;

    /**
     * @var string|null The problem associated with the field.
     */
    private ?string $error;

    /**
     * FieldError constructor.
     */
    public function __construct(string $field = null, string $error = null)
    {
        parent::__construct();

        $this->field = $field;
        $this->error = $error;
    }

    /**
     * Sets the field name and returns the current object for method chaining.
     *
     * @param string $field The JSON request field.
     *
     * @return FieldError The current FieldError instance.
     */
    public function field(string $field): FieldError
    {
        $this->field = $field;
        return $this;
    }

    /**
     * Sets the field name and returns the current object for method chaining.
     *
     * @param string $field The JSON request field.
     */
    public function setField(string $field): void
    {
        $this->field = $field;
    }

    /**
     * Gets the field name.
     *
     * @return string|null The JSON request field.
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * Sets the error description for the field and returns the current object for method chaining.
     *
     * @param string $error The problem associated with the field.
     *
     * @return FieldError The current FieldError instance.
     */
    public function error(string $error): FieldError
    {
        $this->error = $error;
        return $this;
    }

    /**
     * Sets the error description for the field and returns the current object for method chaining.
     *
     * @param string $error The problem associated with the field.
     */
    public function setError(string $error): void
    {
        $this->error = $error;
    }

    /**
     * Gets the error description for the field.
     *
     * @return string|null The problem associated with the field.
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * Converts the FieldError object to a string representation.
     *
     * @return string The string representation of the FieldError object.
     */
    public function __toString()
    {
        return "FieldError {\n" .
            "    field: " . $this->toIndentedString($this->field) . "\n" .
            "    error: " . $this->toIndentedString($this->error) . "\n" .
            "}";
    }

    /**
     * Serializes the object.
     *
     * @return string A serialized string representation of the object.
     */
    public function serialize(): string
    {
        return serialize([$this->field, $this->error]);
    }

    /**
     * Unserializes the object.
     *
     * @param string $data The serialized string to unserialize.
     *
     * @return void
     */
    public function unserialize($data): void
    {
        list($this->field, $this->error) = unserialize($data);
    }
}
