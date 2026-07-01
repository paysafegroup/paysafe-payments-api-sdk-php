<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Error;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Details of the error.
 */
class Error extends BaseModel
{
    /**
     * The error code. Also shown in the X-Application-Status-Code response header.
     */
    private ?string $code = null;
    /**
     * A description of the error.
     */
    private ?string $message = null;
    /**
     * Details of any parameter value errors
     */
    private array $details = [];
    /**
     * If applicable, this is a list of fields that have issues
     */
    private array $fieldErrors = [];
    /**
     * This is an optional field that provides additional data in case of a reject.
     */
    private array $additionalDetails = [];

    /**
     * Builder function for code
     *
     * @param string $code
     *
     * @return $this
     */
    public function code(?string $code): self
    {
        $this->setCode($code);

        return $this;
    }

    /**
     * Setter function for code
     *
     * @param string $code
     *
     * @return void
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * Getter function for code
     *
     * @return ?string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
    /**
     * Builder function for message
     *
     * @param string $message
     *
     * @return $this
     */
    public function message(?string $message): self
    {
        $this->setMessage($message);

        return $this;
    }

    /**
     * Setter function for message
     *
     * @param string $message
     *
     * @return void
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * Getter function for message
     *
     * @return ?string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    /**
     * Builder function for details
     *
     * @param string[] $details
     *
     * @return $this
     */
    public function details(array $details): self
    {
        $this->setDetails($details);

        return $this;
    }

    /**
     * Setter function for details
     *
     * @param string[] $details
     *
     * @return void
     */
    public function setDetails(array $details): void
    {
        $this->details = $details;
    }

    /**
     * Getter function for details
     *
     * @return string[]
     */
    public function getDetails(): array
    {
        return $this->details ?? [];
    }
    /**
     * Builder function for fieldErrors
     *
     * @param FieldError[] $fieldErrors
     *
     * @return $this
     */
    public function fieldErrors(array $fieldErrors): self
    {
        $this->setFieldErrors($fieldErrors);

        return $this;
    }

    /**
     * Setter function for fieldErrors
     *
     * @param FieldError[] $fieldErrors
     *
     * @return void
     */
    public function setFieldErrors(array $fieldErrors): void
    {
        $this->fieldErrors = $fieldErrors;
    }

    /**
     * Getter function for fieldErrors
     *
     * @return FieldError[]
     */
    public function getFieldErrors(): array
    {
        return $this->fieldErrors ?? [];
    }
    /**
     * Builder function for additionalDetails
     *
     * @param AdditionalDetail[] $additionalDetails
     *
     * @return $this
     */
    public function additionalDetails(array $additionalDetails): self
    {
        $this->setAdditionalDetails($additionalDetails);

        return $this;
    }

    /**
     * Setter function for additionalDetails
     *
     * @param AdditionalDetail[] $additionalDetails
     *
     * @return void
     */
    public function setAdditionalDetails(array $additionalDetails): void
    {
        $this->additionalDetails = $additionalDetails;
    }

    /**
     * Getter function for additionalDetails
     *
     * @return AdditionalDetail[]
     */
    public function getAdditionalDetails(): array
    {
        return $this->additionalDetails ?? [];
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Error {" . PHP_EOL
            . "    code: " . $this->toIndentedString($this->code ?? null) . PHP_EOL
            . "    message: " . $this->toIndentedString($this->message ?? null) . PHP_EOL
            . "    details: " . $this->toIndentedString($this->details ?? null) . PHP_EOL
            . "    fieldErrors: " . $this->toIndentedString($this->fieldErrors ?? null) . PHP_EOL
            . "    additionalDetails: " . $this->toIndentedString($this->additionalDetails ?? null) . PHP_EOL
            . "}";
    }
}
