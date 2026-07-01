<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Settlement;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Error\Error;
use Paysafe\PhpSdk\Model\Common\GatewayResponse;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\AirlineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\CarRental\CarRentalDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Cruise\CruiselineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Lodging\LodgingDetails;
use Paysafe\PhpSdk\Model\Lpm\Splitpay;


/**
 * Represents the details of a settlement transaction, including payment type, amount available for refund, transaction time, status and other related fields.
 */
class Settlement extends BaseModel
{
    /**
     * This is the ID returned in the response. This ID can be used for future associated request.
     */
    private ?string $id = null;
    /**
     * This is the merchant reference number created by the merchant and submitted as part of the request. It must be unique for each request.
     */
    private ?string $merchantRefNum = null;
    /**
     * This is the amount of the request, in minor units.For example, to process US $10.99, this value should be 1099. Maximum: 99999999999
     */
    private ?int $amount = null;
    /**
     * This validates that this request is not a duplicate. A request is considered a duplicate if the merchantRefNum has already been used in a previous request within the past 90 days. **Note:** This value defaults to true
     */
    private ?bool $dupCheck = null;
    /**
     * Get splitpay
     */
    private array $splitpay = [];
    private ?AirlineTravelDetails $airlineTravelDetails = null;
    private ?CruiselineTravelDetails $cruiselineTravelDetails = null;
    private ?LodgingDetails $lodgingDetails = null;
    private ?CarRentalDetails $carRentalDetails = null;
    private ?string $paymentType = null;
    /**
     * This is the remaining amount of the refund, in minor units.99. Maximum: 99999999999
     */
    private ?int $availableToRefund = null;
    /**
     * This is the child merchant account number. It is returned only if the transaction was processed via a master account.
     */
    private ?string $childAccountNum = null;
    /**
     * This is the date and time the request was processed. For example: 2014-01-26T10:32:28Z
     */
    private ?string $txnTime = null;
    private ?string $status = null;
    /**
     * An array of integers is returned, displaying the detailed Risk reason codes if your transaction was declined. It is returned only if your account is configured accordingly.
     */
    private array $riskReasonCode = [];
    private ?GatewayResponse $gatewayResponse = null;
    /**
     * It is the id which is common between paysafe and payment serivce provider.
     */
    private ?string $gatewayReconciliationId = null;
    /**
     * This flag indicates the envrionment.  - true - Production - false - Non-Production
     */
    private ?bool $liveMode = null;
    /**
     * ISO 8601 format (UTC). This is the date and time the resource was last updated.
     */
    private ?string $updatedTime = null;
    /**
     * ISO 8601 format (UTC). This is the date and time the resource was last updated.
     */
    private ?string $statusTime = null;
    private ?Error $error = null;

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
     * Builder function for airlineTravelDetails
     *
     * @param AirlineTravelDetails $airlineTravelDetails
     *
     * @return $this
     */
    public function airlineTravelDetails(?AirlineTravelDetails $airlineTravelDetails): self
    {
        $this->setAirlineTravelDetails($airlineTravelDetails);

        return $this;
    }

    /**
     * Setter function for airlineTravelDetails
     *
     * @param AirlineTravelDetails $airlineTravelDetails
     *
     * @return void
     */
    public function setAirlineTravelDetails(?AirlineTravelDetails $airlineTravelDetails): void
    {
        $this->airlineTravelDetails = $airlineTravelDetails;
    }

    /**
     * Getter function for airlineTravelDetails
     *
     * @return ?AirlineTravelDetails
     */
    public function getAirlineTravelDetails(): ?AirlineTravelDetails
    {
        return $this->airlineTravelDetails;
    }
    /**
     * Builder function for cruiselineTravelDetails
     *
     * @param CruiselineTravelDetails $cruiselineTravelDetails
     *
     * @return $this
     */
    public function cruiselineTravelDetails(?CruiselineTravelDetails $cruiselineTravelDetails): self
    {
        $this->setCruiselineTravelDetails($cruiselineTravelDetails);

        return $this;
    }

    /**
     * Setter function for cruiselineTravelDetails
     *
     * @param CruiselineTravelDetails $cruiselineTravelDetails
     *
     * @return void
     */
    public function setCruiselineTravelDetails(?CruiselineTravelDetails $cruiselineTravelDetails): void
    {
        $this->cruiselineTravelDetails = $cruiselineTravelDetails;
    }

    /**
     * Getter function for cruiselineTravelDetails
     *
     * @return ?CruiselineTravelDetails
     */
    public function getCruiselineTravelDetails(): ?CruiselineTravelDetails
    {
        return $this->cruiselineTravelDetails;
    }
    /**
     * Builder function for lodgingDetails
     *
     * @param LodgingDetails $lodgingDetails
     *
     * @return $this
     */
    public function lodgingDetails(?LodgingDetails $lodgingDetails): self
    {
        $this->setLodgingDetails($lodgingDetails);

        return $this;
    }

    /**
     * Setter function for lodgingDetails
     *
     * @param LodgingDetails $lodgingDetails
     *
     * @return void
     */
    public function setLodgingDetails(?LodgingDetails $lodgingDetails): void
    {
        $this->lodgingDetails = $lodgingDetails;
    }

    /**
     * Getter function for lodgingDetails
     *
     * @return ?LodgingDetails
     */
    public function getLodgingDetails(): ?LodgingDetails
    {
        return $this->lodgingDetails;
    }
    /**
     * Builder function for carRentalDetails
     *
     * @param CarRentalDetails $carRentalDetails
     *
     * @return $this
     */
    public function carRentalDetails(?CarRentalDetails $carRentalDetails): self
    {
        $this->setCarRentalDetails($carRentalDetails);

        return $this;
    }

    /**
     * Setter function for carRentalDetails
     *
     * @param CarRentalDetails $carRentalDetails
     *
     * @return void
     */
    public function setCarRentalDetails(?CarRentalDetails $carRentalDetails): void
    {
        $this->carRentalDetails = $carRentalDetails;
    }

    /**
     * Getter function for carRentalDetails
     *
     * @return ?CarRentalDetails
     */
    public function getCarRentalDetails(): ?CarRentalDetails
    {
        return $this->carRentalDetails;
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
     * Builder function for availableToRefund
     *
     * @param int $availableToRefund
     *
     * @return $this
     */
    public function availableToRefund(?int $availableToRefund): self
    {
        $this->setAvailableToRefund($availableToRefund);

        return $this;
    }

    /**
     * Setter function for availableToRefund
     *
     * @param int $availableToRefund
     *
     * @return void
     */
    public function setAvailableToRefund(?int $availableToRefund): void
    {
        $this->availableToRefund = $availableToRefund;
    }

    /**
     * Getter function for availableToRefund
     *
     * @return ?int
     */
    public function getAvailableToRefund(): ?int
    {
        return $this->availableToRefund;
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
     * Builder function for error
     *
     * @param Error $error
     *
     * @return $this
     */
    public function error(?Error $error): self
    {
        $this->setError($error);

        return $this;
    }

    /**
     * Setter function for error
     *
     * @param Error $error
     *
     * @return void
     */
    public function setError(?Error $error): void
    {
        $this->error = $error;
    }

    /**
     * Getter function for error
     *
     * @return ?Error
     */
    public function getError(): ?Error
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
        return "class Settlement {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id ?? null) . PHP_EOL
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum ?? null) . PHP_EOL
            . "    amount: " . $this->toIndentedString($this->amount ?? null) . PHP_EOL
            . "    dupCheck: " . $this->toIndentedString($this->dupCheck ?? null) . PHP_EOL
            . "    splitpay: " . $this->toIndentedString($this->splitpay ?? null) . PHP_EOL
            . "    airlineTravelDetails: " . $this->toIndentedString($this->airlineTravelDetails ?? null) . PHP_EOL
            . "    cruiselineTravelDetails: " . $this->toIndentedString($this->cruiselineTravelDetails ?? null) . PHP_EOL
            . "    lodgingDetails: " . $this->toIndentedString($this->lodgingDetails ?? null) . PHP_EOL
            . "    carRentalDetails: " . $this->toIndentedString($this->carRentalDetails ?? null) . PHP_EOL
            . "    paymentType: " . $this->toIndentedString($this->paymentType ?? null) . PHP_EOL
            . "    availableToRefund: " . $this->toIndentedString($this->availableToRefund ?? null) . PHP_EOL
            . "    childAccountNum: " . $this->toIndentedString($this->childAccountNum ?? null) . PHP_EOL
            . "    txnTime: " . $this->toIndentedString($this->txnTime ?? null) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status ?? null) . PHP_EOL
            . "    riskReasonCode: " . $this->toIndentedString($this->riskReasonCode ?? null) . PHP_EOL
            . "    gatewayResponse: " . $this->toIndentedString($this->gatewayResponse ?? null) . PHP_EOL
            . "    gatewayReconciliationId: " . $this->toIndentedString($this->gatewayReconciliationId ?? null) . PHP_EOL
            . "    liveMode: " . $this->toIndentedString($this->liveMode ?? null) . PHP_EOL
            . "    updatedTime: " . $this->toIndentedString($this->updatedTime ?? null) . PHP_EOL
            . "    statusTime: " . $this->toIndentedString($this->statusTime ?? null) . PHP_EOL
            . "    error: " . $this->toIndentedString($this->error ?? null) . PHP_EOL
            . "}";
    }
}
