<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Payment;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * [Partial Authorization](https://developer.paysafe.com/en/payments-api/#/schemas/partialAuth) service is a feature where a card issuer approves only a part of the amount requested by the merchant during a transaction. Instead of declining a transaction outright due to insufficient funds for example, the card issuer authorizes a lesser amount than what the merchant requested. This is an optional field and is only applicable for CARD transactions.
 */
class PartialAuth extends BaseModel
{
    /**
     * This indicates whether the merchant requests the transaction to be processed as Partial Authorization.
     */
    private ?bool $allowPartialAuth = null;
    /**
     * This is the id of the Partial Authorization group identifying a single sale, which is returned in the initial Partial Auth response. The ID should be provided by the merchants in subsequent Partial Auth requests, in order to associate it to the Initial partially authorized transaction.
     */
    private ?string $groupId = null;
    /**
     * 'This is the amount of the request, in minor units. This value will contain the requested amount by the merchant. **Note:** Its value may differ from the amount value inside the payment object - in the case issuer partially authorized the required amount.'
     */
    private ?int $requestedAmount = null;
    /**
     * 'This indicates whether the transaction was actually processed by the issuer as Partial Authorization. - true - The transaction was processed as Partial Authorization. - false - The transaction was not processed as Partial Authorization even though it was requested by the merchant as such.'
     */
    private ?bool $processedAsPartialAuth = null;

    /**
     * Builder function for allowPartialAuth
     *
     * @param bool $allowPartialAuth
     *
     * @return $this
     */
    public function allowPartialAuth(?bool $allowPartialAuth): self
    {
        $this->setAllowPartialAuth($allowPartialAuth);

        return $this;
    }

    /**
     * Setter function for allowPartialAuth
     *
     * @param bool $allowPartialAuth
     *
     * @return void
     */
    public function setAllowPartialAuth(?bool $allowPartialAuth): void
    {
        $this->allowPartialAuth = $allowPartialAuth;
    }

    /**
     * Getter function for allowPartialAuth
     *
     * @return ?bool
     */
    public function getAllowPartialAuth(): ?bool
    {
        return $this->allowPartialAuth;
    }
    /**
     * Builder function for groupId
     *
     * @param string $groupId
     *
     * @return $this
     */
    public function groupId(?string $groupId): self
    {
        $this->setGroupId($groupId);

        return $this;
    }

    /**
     * Setter function for groupId
     *
     * @param string $groupId
     *
     * @return void
     */
    public function setGroupId(?string $groupId): void
    {
        $this->groupId = $groupId;
    }

    /**
     * Getter function for groupId
     *
     * @return ?string
     */
    public function getGroupId(): ?string
    {
        return $this->groupId;
    }
    /**
     * Builder function for requestedAmount
     *
     * @param int $requestedAmount
     *
     * @return $this
     */
    public function requestedAmount(?int $requestedAmount): self
    {
        $this->setRequestedAmount($requestedAmount);

        return $this;
    }

    /**
     * Setter function for requestedAmount
     *
     * @param int $requestedAmount
     *
     * @return void
     */
    public function setRequestedAmount(?int $requestedAmount): void
    {
        $this->requestedAmount = $requestedAmount;
    }

    /**
     * Getter function for requestedAmount
     *
     * @return ?int
     */
    public function getRequestedAmount(): ?int
    {
        return $this->requestedAmount;
    }
    /**
     * Builder function for processedAsPartialAuth
     *
     * @param bool $processedAsPartialAuth
     *
     * @return $this
     */
    public function processedAsPartialAuth(?bool $processedAsPartialAuth): self
    {
        $this->setProcessedAsPartialAuth($processedAsPartialAuth);

        return $this;
    }

    /**
     * Setter function for processedAsPartialAuth
     *
     * @param bool $processedAsPartialAuth
     *
     * @return void
     */
    public function setProcessedAsPartialAuth(?bool $processedAsPartialAuth): void
    {
        $this->processedAsPartialAuth = $processedAsPartialAuth;
    }

    /**
     * Getter function for processedAsPartialAuth
     *
     * @return ?bool
     */
    public function getProcessedAsPartialAuth(): ?bool
    {
        return $this->processedAsPartialAuth;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class PartialAuth {" . PHP_EOL
            . "    allowPartialAuth: " . $this->toIndentedString($this->allowPartialAuth ?? null) . PHP_EOL
            . "    groupId: " . $this->toIndentedString($this->groupId ?? null) . PHP_EOL
            . "    requestedAmount: " . $this->toIndentedString($this->requestedAmount ?? null) . PHP_EOL
            . "    processedAsPartialAuth: " . $this->toIndentedString($this->processedAsPartialAuth ?? null) . PHP_EOL
            . "}";
    }
}
