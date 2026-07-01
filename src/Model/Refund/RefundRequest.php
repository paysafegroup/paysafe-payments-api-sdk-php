<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Refund;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Lpm\Splitpay;


/**
 * Represents a refund request.
 */
class RefundRequest extends BaseModel
{
    /**
     * The merchant reference number created by the merchant and submitted as part of the request. It must be unique for each request
     */
    private ?string $merchantRefNum = null;
    /**
     * The amount to refund in minor units (e.g., $10.99 = 1099)
     */
    private ?int $amount = null;
    /**
     * Validates that this request is not a duplicate
     */
    private ?bool $dupCheck = null;
    /**
     * This is the account identifier to which the refund will be sent. It is only used today for PaysafeCard. The merchant may pass either the PaysafeCard Account ID of the account to which the refund should be made, or the email address that is registered against the customer’s PaysafeCard account.
     */
    private ?string $customerAccountId = null;
    /**
     * Split payment details for the refund
     */
    private array $splitpay = [];

    /**
     * Builder function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return $this
     */
    public function merchantRefNum(?string $merchantRefNum): self
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
    public function setMerchantRefNum(?string $merchantRefNum): void
    {
        $this->merchantRefNum = $merchantRefNum;
    }

    /**
     * Getter function for merchantRefNum
     *
     * @return ?string
     */
    public function getMerchantRefNum(): ?string
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
    public function amount(?int $amount): self
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
    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Getter function for amount
     *
     * @return ?int
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }
    /**
     * Builder function for dupCheck
     *
     * @param bool $dupCheck
     *
     * @return $this
     */
    public function dupCheck(?bool $dupCheck): self
    {
        $this->setDupCheck($dupCheck);

        return $this;
    }

    /**
     * Setter function for dupCheck
     *
     * @param bool $dupCheck
     *
     * @return void
     */
    public function setDupCheck(?bool $dupCheck): void
    {
        $this->dupCheck = $dupCheck;
    }

    /**
     * Getter function for dupCheck
     *
     * @return ?bool
     */
    public function getDupCheck(): ?bool
    {
        return $this->dupCheck;
    }
    /**
     * Builder function for customerAccountId
     *
     * @param string $customerAccountId
     *
     * @return $this
     */
    public function customerAccountId(?string $customerAccountId): self
    {
        $this->setCustomerAccountId($customerAccountId);

        return $this;
    }

    /**
     * Setter function for customerAccountId
     *
     * @param string $customerAccountId
     *
     * @return void
     */
    public function setCustomerAccountId(?string $customerAccountId): void
    {
        $this->customerAccountId = $customerAccountId;
    }

    /**
     * Getter function for customerAccountId
     *
     * @return ?string
     */
    public function getCustomerAccountId(): ?string
    {
        return $this->customerAccountId;
    }
    /**
     * Builder function for splitpay
     *
     * @param Splitpay[] $splitpay
     *
     * @return $this
     */
    public function splitpay(array $splitpay): self
    {
        $this->setSplitpay($splitpay);

        return $this;
    }

    /**
     * Setter function for splitpay
     *
     * @param Splitpay[] $splitpay
     *
     * @return void
     */
    public function setSplitpay(array $splitpay): void
    {
        $this->splitpay = $splitpay;
    }

    /**
     * Getter function for splitpay
     *
     * @return Splitpay[]
     */
    public function getSplitpay(): array
    {
        return $this->splitpay ?? [];
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class RefundRequest {" . PHP_EOL
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum ?? null) . PHP_EOL
            . "    amount: " . $this->toIndentedString($this->amount ?? null) . PHP_EOL
            . "    dupCheck: " . $this->toIndentedString($this->dupCheck ?? null) . PHP_EOL
            . "    customerAccountId: " . $this->toIndentedString($this->customerAccountId ?? null) . PHP_EOL
            . "    splitpay: " . $this->toIndentedString($this->splitpay ?? null) . PHP_EOL
            . "}";
    }
    private ?array $additionalParameters = null;

    /**
     * This map holds additional parameters for features not yet available in this library.
     * Each key-value pair is serialized as a top-level field in the request/response.
     *
     * @return array|null
     */
    public function getAdditionalParameters(): ?array
    {
        return $this->additionalParameters;
    }

    public function setAdditionalParameters(array $additionalParameters): void
    {
        $this->additionalParameters = $additionalParameters;
    }

    public function addAdditionalParameter(string $key, $value): self
    {
        if ($this->additionalParameters === null) {
            $this->additionalParameters = [];
        }
        $this->additionalParameters[$key] = $value;
        return $this;
    }


}
