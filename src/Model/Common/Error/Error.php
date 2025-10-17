<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Error;

use Paysafe\PhpSdk\Model\BaseModel;

class Error extends BaseModel
{
    private string $code;
    private string $message;
    private ?array $details = null;
    private ?array $fieldErrors = null;
    private ?array $additionalDetails = null;


    /**
     * @param string $code
     * @return $this
     */
    public function code(string $code): self
    {
        $this->setCode($code);
        return $this;
    }
    /**
     * @param string $code
     * @return void
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }
    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function message(string $message): self
    {
        $this->setMessage($message);
        return $this;
    }
    /**
     * @param string $message
     * @return void
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param array $details
     * @return $this
     */
    public function details(array $details): self
    {
        $this->setDetails($details);
        return $this;
    }
    /**
     * @param array $details
     * @return void
     */
    public function setDetails(array $details): void
    {
        $this->details = $details;
    }
    /**
     * @return array
     */
    public function getDetails(): array
    {
        return $this->details ?? [];
    }
    /**
     * @param string $detailsItem
     * @return Error
     */
    public function addDetailsItem(string $detailsItem): Error
    {
        if ($this->details === null) {
            $this->details = [];
        }
        $this->details[] = $detailsItem;

        return $this;
    }

    /**
     * @param string|null $detailsItem
     * @return $this
     */
    public function removeDetailsItem(string $detailsItem = null): Error
    {
        if ($detailsItem !== null && $this->details !== null) {
            $this->setDetails(array_diff($this->getDetails(), [$detailsItem]));
        }

        return $this;
    }


    /**
     * @param array $fieldErrors
     * @return $this
     */
    public function fieldErrors(array $fieldErrors): self
    {
        $this->setFieldErrors($fieldErrors);
        return $this;
    }
    /**
     * @param array $fieldErrors
     * @return void
     */
    public function setFieldErrors(array $fieldErrors): void
    {
        $this->fieldErrors = $fieldErrors;
    }
    /**
     * @return array
     */
    public function getFieldErrors(): array
    {
        return $this->fieldErrors ?? [];
    }
    /**
     * @param string $fieldErrorsItem
     * @return Error
     */
    public function addFieldErrorsItem(string $fieldErrorsItem): Error
    {
        if ($this->fieldErrors === null) {
            $this->fieldErrors = [];
        }
        $this->fieldErrors[] = $fieldErrorsItem;

        return $this;
    }

    /**
     * @param string|null $fieldErrorsItem
     * @return $this
     */
    public function removeFieldErrorsItem(string $fieldErrorsItem = null): Error
    {
        if ($fieldErrorsItem !== null && $this->fieldErrors !== null) {
            $this->setFieldErrors(array_diff($this->getFieldErrors(), [$fieldErrorsItem]));
        }

        return $this;
    }

    /**
     * @param array $additionalDetails
     * @return $this
     */
    public function additionalDetails(array $additionalDetails): self
    {
        $this->setAdditionalDetails($additionalDetails);
        return $this;
    }
    /**
     * @param array $additionalDetails
     * @return void
     */
    public function setAdditionalDetails(array $additionalDetails): void
    {
        $this->additionalDetails = $additionalDetails;
    }
    /**
     * @return array
     */
    public function getAdditionalDetails(): array
    {
        return $this->additionalDetails ?? [];
    }
    /**
     * @param string $additionalDetailsItem
     * @return Error
     */
    public function addAdditionalDetailsItem(string $additionalDetailsItem): Error
    {
        if ($this->additionalDetails === null) {
            $this->additionalDetails = [];
        }
        $this->additionalDetails[] = $additionalDetailsItem;

        return $this;
    }
    /**
     * @param string|null $additionalDetailsItem
     * @return $this
     */
    public function removeAdditionalDetailsItem(string $additionalDetailsItem = null): Error
    {
        if ($additionalDetailsItem !== null && $this->additionalDetails !== null) {
            $this->setAdditionalDetails(array_diff($this->getAdditionalDetails(), [$additionalDetailsItem]));
        }

        return $this;
    }

    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Error {" . PHP_EOL
            . "    code: " . $this->toIndentedString($this->code) . "\n"
            . "    message: " . $this->toIndentedString($this->message) . "\n"
            . "    details: " . $this->toIndentedString($this->details) . "\n"
            . "    fieldErrors: " . $this->toIndentedString($this->fieldErrors) . "\n"
            . "    additionalDetails: " . $this->toIndentedString($this->additionalDetails) . "\n"
            . "}";
    }
}
