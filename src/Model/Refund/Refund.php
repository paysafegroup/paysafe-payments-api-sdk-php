<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Refund;
use Paysafe\PhpSdk\Model\BaseApiResponse;
use Paysafe\PhpSdk\Model\Common\GatewayResponse;
use Paysafe\PhpSdk\Model\Lpm\Splitpay;


/**
 * Represents the details of a refund.
 */
class Refund extends BaseApiResponse
{
    /**
     * The unique identifier for the refund transaction
     */
    private ?string $id = null;
    /**
     * The merchant reference number created by the merchant and submitted as part of the request
     */
    private ?string $merchantRefNum = null;
    /**
     * The amount of the request, in minor units
     */
    private ?int $amount = null;
    /**
     * Indicates whether duplicate transaction checking was applied
     */
    private ?bool $dupCheck = null;
    /**
     * Split payment details for the refund
     */
    private array $splitpay = [];
    private ?string $paymentType = null;
    private ?string $currencyCode = null;
    /**
     * The date and time of the transaction
     */
    private ?string $txnTime = null;
    private ?string $status = null;
    /**
     * The reconciliation ID returned by the gateway
     */
    private ?string $gatewayReconciliationId = null;
    /**
     * The date and time the refund response was last updated
     */
    private ?string $updatedTime = null;
    /**
     * The date and time of the last status change
     */
    private ?string $statusTime = null;
    /**
     * Indicates whether the refund was processed in live mode
     */
    private ?bool $liveMode = null;
    private ?GatewayResponse $gatewayResponse = null;
    /**
     * The source of the refund
     */
    private ?string $source = null;
    /**
     * The child account number if the transaction is processed via a master account
     */
    private ?string $childAccountNum = null;
    /**
     * List of risk-related reason codes
     */
    private array $riskReasonCode = [];

    /**
     * Builder function for id
     *
     * @param string $id
     *
     * @return $this
     */
    public function id(?string $id): self
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
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter function for id
     *
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }
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
     * Builder function for paymentType
     *
     * @param string $paymentType
     *
     * @return $this
     */
    public function paymentType(?string $paymentType): self
    {
        $this->setPaymentType($paymentType);

        return $this;
    }

    /**
     * Setter function for paymentType
     *
     * @param string $paymentType
     *
     * @return void
     */
    public function setPaymentType(?string $paymentType): void
    {
        $this->paymentType = $paymentType;
    }

    /**
     * Getter function for paymentType
     *
     * @return ?string
     */
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }
    /**
     * Builder function for currencyCode
     *
     * @param string $currencyCode
     *
     * @return $this
     */
    public function currencyCode(?string $currencyCode): self
    {
        $this->setCurrencyCode($currencyCode);

        return $this;
    }

    /**
     * Setter function for currencyCode
     *
     * @param string $currencyCode
     *
     * @return void
     */
    public function setCurrencyCode(?string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * Getter function for currencyCode
     *
     * @return ?string
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }
    /**
     * Builder function for txnTime
     *
     * @param string $txnTime
     *
     * @return $this
     */
    public function txnTime(?string $txnTime): self
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
    public function setTxnTime(?string $txnTime): void
    {
        $this->txnTime = $txnTime;
    }

    /**
     * Getter function for txnTime
     *
     * @return ?string
     */
    public function getTxnTime(): ?string
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
    public function status(?string $status): self
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
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Getter function for status
     *
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Builder function for gatewayReconciliationId
     *
     * @param string $gatewayReconciliationId
     *
     * @return $this
     */
    public function gatewayReconciliationId(?string $gatewayReconciliationId): self
    {
        $this->setGatewayReconciliationId($gatewayReconciliationId);

        return $this;
    }

    /**
     * Setter function for gatewayReconciliationId
     *
     * @param string $gatewayReconciliationId
     *
     * @return void
     */
    public function setGatewayReconciliationId(?string $gatewayReconciliationId): void
    {
        $this->gatewayReconciliationId = $gatewayReconciliationId;
    }

    /**
     * Getter function for gatewayReconciliationId
     *
     * @return ?string
     */
    public function getGatewayReconciliationId(): ?string
    {
        return $this->gatewayReconciliationId;
    }
    /**
     * Builder function for updatedTime
     *
     * @param string $updatedTime
     *
     * @return $this
     */
    public function updatedTime(?string $updatedTime): self
    {
        $this->setUpdatedTime($updatedTime);

        return $this;
    }

    /**
     * Setter function for updatedTime
     *
     * @param string $updatedTime
     *
     * @return void
     */
    public function setUpdatedTime(?string $updatedTime): void
    {
        $this->updatedTime = $updatedTime;
    }

    /**
     * Getter function for updatedTime
     *
     * @return ?string
     */
    public function getUpdatedTime(): ?string
    {
        return $this->updatedTime;
    }
    /**
     * Builder function for statusTime
     *
     * @param string $statusTime
     *
     * @return $this
     */
    public function statusTime(?string $statusTime): self
    {
        $this->setStatusTime($statusTime);

        return $this;
    }

    /**
     * Setter function for statusTime
     *
     * @param string $statusTime
     *
     * @return void
     */
    public function setStatusTime(?string $statusTime): void
    {
        $this->statusTime = $statusTime;
    }

    /**
     * Getter function for statusTime
     *
     * @return ?string
     */
    public function getStatusTime(): ?string
    {
        return $this->statusTime;
    }
    /**
     * Builder function for liveMode
     *
     * @param bool $liveMode
     *
     * @return $this
     */
    public function liveMode(?bool $liveMode): self
    {
        $this->setLiveMode($liveMode);

        return $this;
    }

    /**
     * Setter function for liveMode
     *
     * @param bool $liveMode
     *
     * @return void
     */
    public function setLiveMode(?bool $liveMode): void
    {
        $this->liveMode = $liveMode;
    }

    /**
     * Getter function for liveMode
     *
     * @return ?bool
     */
    public function getLiveMode(): ?bool
    {
        return $this->liveMode;
    }
    /**
     * Builder function for gatewayResponse
     *
     * @param GatewayResponse $gatewayResponse
     *
     * @return $this
     */
    public function gatewayResponse(?GatewayResponse $gatewayResponse): self
    {
        $this->setGatewayResponse($gatewayResponse);

        return $this;
    }

    /**
     * Setter function for gatewayResponse
     *
     * @param GatewayResponse $gatewayResponse
     *
     * @return void
     */
    public function setGatewayResponse(?GatewayResponse $gatewayResponse): void
    {
        $this->gatewayResponse = $gatewayResponse;
    }

    /**
     * Getter function for gatewayResponse
     *
     * @return ?GatewayResponse
     */
    public function getGatewayResponse(): ?GatewayResponse
    {
        return $this->gatewayResponse;
    }
    /**
     * Builder function for source
     *
     * @param string $source
     *
     * @return $this
     */
    public function source(?string $source): self
    {
        $this->setSource($source);

        return $this;
    }

    /**
     * Setter function for source
     *
     * @param string $source
     *
     * @return void
     */
    public function setSource(?string $source): void
    {
        $this->source = $source;
    }

    /**
     * Getter function for source
     *
     * @return ?string
     */
    public function getSource(): ?string
    {
        return $this->source;
    }
    /**
     * Builder function for childAccountNum
     *
     * @param string $childAccountNum
     *
     * @return $this
     */
    public function childAccountNum(?string $childAccountNum): self
    {
        $this->setChildAccountNum($childAccountNum);

        return $this;
    }

    /**
     * Setter function for childAccountNum
     *
     * @param string $childAccountNum
     *
     * @return void
     */
    public function setChildAccountNum(?string $childAccountNum): void
    {
        $this->childAccountNum = $childAccountNum;
    }

    /**
     * Getter function for childAccountNum
     *
     * @return ?string
     */
    public function getChildAccountNum(): ?string
    {
        return $this->childAccountNum;
    }
    /**
     * Builder function for riskReasonCode
     *
     * @param int[] $riskReasonCode
     *
     * @return $this
     */
    public function riskReasonCode(array $riskReasonCode): self
    {
        $this->setRiskReasonCode($riskReasonCode);

        return $this;
    }

    /**
     * Setter function for riskReasonCode
     *
     * @param int[] $riskReasonCode
     *
     * @return void
     */
    public function setRiskReasonCode(array $riskReasonCode): void
    {
        $this->riskReasonCode = $riskReasonCode;
    }

    /**
     * Getter function for riskReasonCode
     *
     * @return int[]
     */
    public function getRiskReasonCode(): array
    {
        return $this->riskReasonCode ?? [];
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Refund {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id ?? null) . PHP_EOL
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum ?? null) . PHP_EOL
            . "    amount: " . $this->toIndentedString($this->amount ?? null) . PHP_EOL
            . "    dupCheck: " . $this->toIndentedString($this->dupCheck ?? null) . PHP_EOL
            . "    splitpay: " . $this->toIndentedString($this->splitpay ?? null) . PHP_EOL
            . "    paymentType: " . $this->toIndentedString($this->paymentType ?? null) . PHP_EOL
            . "    currencyCode: " . $this->toIndentedString($this->currencyCode ?? null) . PHP_EOL
            . "    txnTime: " . $this->toIndentedString($this->txnTime ?? null) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status ?? null) . PHP_EOL
            . "    gatewayReconciliationId: " . $this->toIndentedString($this->gatewayReconciliationId ?? null) . PHP_EOL
            . "    updatedTime: " . $this->toIndentedString($this->updatedTime ?? null) . PHP_EOL
            . "    statusTime: " . $this->toIndentedString($this->statusTime ?? null) . PHP_EOL
            . "    liveMode: " . $this->toIndentedString($this->liveMode ?? null) . PHP_EOL
            . "    gatewayResponse: " . $this->toIndentedString($this->gatewayResponse ?? null) . PHP_EOL
            . "    source: " . $this->toIndentedString($this->source ?? null) . PHP_EOL
            . "    childAccountNum: " . $this->toIndentedString($this->childAccountNum ?? null) . PHP_EOL
            . "    riskReasonCode: " . $this->toIndentedString($this->riskReasonCode ?? null) . PHP_EOL
            . "}";
    }
}
