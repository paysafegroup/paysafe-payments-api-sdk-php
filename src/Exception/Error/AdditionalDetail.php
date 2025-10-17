<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Exception\Error;


use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Class AdditionalDetail
 * Additional details about the error returned from Paysafe PaymentsAPI.
 */
class AdditionalDetail extends BaseModel
{

    private ?string $type;
    private ?string $code;
    private ?string $message;

    public function __construct(string $type, string $code, string $message = null)
    {
        parent::__construct();

        $this->type = $type;
        $this->code = $code;
        $this->message = $message;
    }

    /**
     * Sets the type of the additional detail.
     *
     * @param string $type The type of the additional detail.
     *
     * @return AdditionalDetail The current instance for method chaining.
     */
    public function type(string $type): AdditionalDetail
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Sets the type of the additional detail.
     *
     * @param string $type The type of the additional detail.
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * Gets the type of the additional detail.
     *
     * @return string The type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Sets the code of the additional detail.
     *
     * @param string $code The code of the additional detail.
     *
     * @return AdditionalDetail The current instance for method chaining.
     */
    public function code(string $code): AdditionalDetail
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Sets the code of the additional detail.
     *
     * @param string $code The code of the additional detail.
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * Gets the code of the additional detail.
     *
     * @return string The code.
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Sets the message of the additional detail.
     *
     * @param string $message The message of the additional detail.
     *
     * @return AdditionalDetail The current instance for method chaining.
     */
    public function message(string $message): AdditionalDetail
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Sets the message of the additional detail.
     *
     * @param string $message The message of the additional detail.
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * Gets the message of the additional detail.
     *
     * @return string The message.
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string A string representation of the object.
     */
    public function toString(): string
    {
        return "class AdditionalDetail {\n"
            . "    type: " . $this->toIndentedString($this->type) . "\n"
            . "    code: " . $this->toIndentedString($this->code) . "\n"
            . "    message: " . $this->toIndentedString($this->message) . "\n"
            . "}";
    }
}
