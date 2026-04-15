<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\VoidAuthorization;

use Paysafe\PhpSdk\Model\BaseApiResponse;

class VoidAuthorization extends BaseApiResponse
{
    /** Our system has received the request and is waiting for the downstream processor's response. */

    private string $merchantRefNum;
    private int $amount;
    private string $id;
    private string $txnTime;
    private string $status;

    private array $additionalParameters;


    /**
     * Builder function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return $this
     */
    public function merchantRefNum(string $merchantRefNum): self
    {
        $this->setMerchantRefNum($merchantRefNum);

        return $this;
    }

    /**
     * Setter function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return void
     */
    public function setMerchantRefNum(string $merchantRefNum): void
    {
        $this->merchantRefNum = $merchantRefNum;
    }

    /**
     * Getter function for merchantRefNum
     *
     * @return string
     */
    public function getMerchantRefNum(): string
    {
        return $this->merchantRefNum;
    }

    /**
     * Builder function for amount
     *
     * @param int $amount
     *
     * @return $this
     */
    public function amount(int $amount): self
    {
        $this->setAmount($amount);

        return $this;
    }

    /**
     * Setter function for amount
     *
     * @param int $amount
     *
     * @return void
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Getter function for amount
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * Builder function for id
     *
     * @param string $id
     *
     * @return $this
     */
    public function id(string $id): self
    {
        $this->setId($id);

        return $this;
    }

    /**
     * Setter function for id
     *
     * @param string $id
     *
     * @return void
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter function for id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Builder function for txnTime
     *
     * @param string $txnTime
     *
     * @return $this
     */
    public function txnTime(string $txnTime): self
    {
        $this->setTxnTime($txnTime);

        return $this;
    }

    /**
     * Setter function for txnTime
     *
     * @param string $txnTime
     *
     * @return void
     */
    public function setTxnTime(string $txnTime): void
    {
        $this->txnTime = $txnTime;
    }

    /**
     * Getter function for txnTime
     *
     * @return string
     */
    public function getTxnTime(): string
    {
        return $this->txnTime;
    }

    /**
     * Builder function for status
     *
     * @param string $status
     *
     * @return $this
     */
    public function status(string $status): self
    {
        $this->setStatus($status);

        return $this;
    }

    /**
     * Setter function for status
     *
     * @param string $status
     *
     * @return void
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * Getter function for status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * This map holds additional parameters that can be used for features not available in this client library.
     * During serialization, each key-value pair is treated as if the key were a top-level field
     * in the serialized object,
     * i.e.
     * <code>
     *     {"merchantRefNum" : "uuid", "additionalParameter1" : 100, "additionalParameter2" : "string" }
     * </code> .
     *
     * @return array|null
     */
    public function getAdditionalParameters(): ?array
    {
        return $this->additionalParameters;
    }

    /**
     * Builder function for this Request
     *
     * @param array $additionalParameters
     *
     * @return $this
     */
    public function additionalParameters(array $additionalParameters): self
    {
        $this->setAdditionalParameters($additionalParameters);

        return $this;
    }

    /**
     * Set the additional parameters list
     *
     * @param array $additionalParameters
     *
     * @return void
     */
    public function setAdditionalParameters(array $additionalParameters): self
    {
        $this->additionalParameters = $additionalParameters;

        return $this;
    }

    /**
     * Add a new additional parameter
     *
     * @param string $key
     * @param object $value
     *
     * @return $this
     */
    public function addAdditionalParameter(string $key, object $value): self
    {
        if ($this->additionalParameters === null) {
            $this->additionalParameters = [];
        }

        $this->additionalParameters[$key] = $value;

        return $this;
    }

    /**
     * Add a new additional parameters to the list
     *
     * @param array $additionalParameters
     *
     * @return $this
     */
    public function addAdditionalParameters(array $additionalParameters): self
    {
        if ($this->additionalParameters === null) {
            $this->additionalParameters = [];
        }

        $this->additionalParameters = array_merge($this->additionalParameters, $additionalParameters);

        return $this;
    }

    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class VoidAuthorization {" . PHP_EOL
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL
            . "    amount: " . $this->toIndentedString($this->amount) . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id) . PHP_EOL
            . "    txnTime: " . $this->toIndentedString($this->txnTime) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status) . PHP_EOL
            . "    additionalParameters: " . $this->toIndentedString($this->additionalParameters) . PHP_EOL
            . "}";
    }
}
