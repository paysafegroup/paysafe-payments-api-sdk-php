<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Exception\Error;

/**
 * This class contains detailed information about the error returned by Paysafe PaymentsAPI.
 */
class PaysafeError
{

    /**
     * @var string Internal error code from Paysafe systems.
     */
    private string $code;

    /**
     * @var string Provides an error message that can be displayed to customers.
     */
    private string $message;

    /**
     * @var array|null List of error details that contains more information about the error.
     */
    private ?array $details = [];

    /**
     * @var array|null List of json fields that caused the error.
     */
    private ?array $fieldErrors = [];

    /**
     * @var array|null List of additional details about the error.
     */
    private ?array $additionalDetails = [];

    /**
     * PaysafeError constructor.
     *
     * @param string|null $code
     * @param string|null $message
     * @param array|null $details
     * @param array|null $additionalDetails
     * @param array|null $fieldErrors
     */
    public function __construct(
        string $code = null,
        string $message = null,
        array $details = null,
        array $additionalDetails = null,
        array $fieldErrors = null
    ) {
        $this->code = $code ?? '';
        $this->message = $message ?? '';
        $this->details = $details;
        $this->additionalDetails = $additionalDetails;
        $this->fieldErrors = $fieldErrors;
    }

    /**
     * Gets the error code.
     *
     * @return string|null The error code.
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Sets the error code.
     *
     * @param string $code The error code.
     * @return PaysafeError
     */
    public function setCode(string $code): PaysafeError
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Gets the error message.
     *
     * @return string|null The error message.
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Sets the error message.
     *
     * @param string $message The error message.
     * @return PaysafeError
     */
    public function setMessage(string $message): PaysafeError
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Gets the list of error details.
     *
     * @return array|null The list of error details.
     */
    public function getDetails(): ?array
    {
        return $this->details ?? [];
    }

    /**
     * Sets the list of error details.
     *
     * @param array $details The list of error details.
     * @return PaysafeError
     */
    public function setDetails(array $details): PaysafeError
    {
        $this->details = $details;
        return $this;
    }

    /**
     * Gets the list of field errors.
     *
     * @return array|null The list of field errors.
     */
    public function getFieldErrors(): ?array
    {
        return $this->fieldErrors ?? [];
    }

    /**
     * Sets the list of field errors.
     *
     * @param array $fieldErrors The list of field errors.
     * @return PaysafeError
     */
    public function setFieldErrors(array $fieldErrors): PaysafeError
    {
        $this->fieldErrors = $fieldErrors;
        return $this;
    }

    /**
     * Gets the list of additional details.
     *
     * @return array|null The list of additional details.
     */
    public function getAdditionalDetails(): ?array
    {
        return $this->additionalDetails ?? [];
    }

    /**
     * Sets the list of additional details.
     *
     * @param array $additionalDetails The list of additional details.
     * @return PaysafeError
     */
    public function setAdditionalDetails(array $additionalDetails): PaysafeError
    {
        $this->additionalDetails = $additionalDetails;
        return $this;
    }

    /**
     * Converts this PaysafeError object to a string representation.
     *
     * @return string The string representation of the PaysafeError object.
     */
    public function __toString()
    {
        return "PaysafeError {\n" .
               "    code: " . $this->toIndentedString($this->code) . "\n" .
               "    message: " . $this->toIndentedString($this->message) . "\n" .
               "    details: " . $this->toIndentedString($this->details) . "\n" .
               "    fieldErrors: " . $this->toIndentedString($this->fieldErrors) . "\n" .
               "    additionalDetails: " . $this->toIndentedString($this->additionalDetails) . "\n" .
               "}";
    }

    /**
     * Converts a given object to a string with each line indented by 4 spaces (except the first line).
     *
     * @param mixed $value The value to convert to a string.
     * @return string The indented string representation of the value.
     */
    private function toIndentedString($value): string
    {
        if ($value === null) {
            return 'null';
        }
        return is_array($value) ? implode("\n    ", $value) : $value;
    }
}
