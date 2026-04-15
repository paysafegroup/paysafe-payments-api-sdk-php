<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Settlement;

use Paysafe\PhpSdk\Model\BaseApiResponse;
use Paysafe\PhpSdk\Model\Common\Error\Error;
use Paysafe\PhpSdk\Model\Common\GatewayResponse;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\AirlineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Carrental\CarRentalDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Cruise\CruiselineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Lodging\LodgingDetails;
use Paysafe\PhpSdk\Model\Lpm\Splitpay;

/**
 * Represents the details of a settlement transaction, including payment type, amount available for refund,
 * transaction time, status and other related fields.
 */
class Settlement extends BaseApiResponse
{
	private string $merchantRefNum;
	private int $amount;
	private bool $dupCheck = true;
	private ?array $splitpay = null;
	private AirlineTravelDetails $airlineTravelDetails;
	private CruiselineTravelDetails $cruiselineTravelDetails;
	private LodgingDetails $lodgingDetails;
	private CarRentalDetails $carRentalDetails;
	private string $id;
	private string $paymentType;
	private int $availableToRefund;
	private string $childAccountNum;
	private $txnTime;
	private string $status;
	private Error $error;
	private ?array $riskReasonCode = null;
	private GatewayResponse $gatewayResponse;
	private string $gatewayReconciliationId;
	private bool $liveMode;
	private string $updatedTime;
	private string $statusTime;

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
	 * This is the merchant reference number created by the merchant and submitted as part of the request.
     * It must be unique for each request.
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
	 * This is the amount of the request, in minor units.For example, to process US $10.99,
     * this value should be 1099. <br />
	 * Maximum: 99999999999
	 * 
	 * @return int
	 */
	public function getAmount(): int
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
	public function dupCheck(bool $dupCheck): self
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
	public function setDupCheck(bool $dupCheck): void
	{
		$this->dupCheck = $dupCheck;
	}

	/**
	 * This validates that this request is not a duplicate.
     * A request is considered a duplicate if the merchantRefNum has already been used in a previous
	 * request within the past 90 days. <b>Note:<b> This value defaults to true
	 * 
	 * @return bool
	 */
	public function getDupCheck(): bool
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
	 * Get splitpay
	 * 
	 * @return Splitpay[]|null
	 */
	public function getSplitpay(): array
	{
		return $this->splitpay;
	}

	/**
	 * Add new splitpayItem
	 * 
	 * @param Splitpay $splitpayItem
	 * 
	 * @return $this
	 */
	public function addSplitpayItem(Splitpay $splitpayItem): self
	{
		if ($this->splitpay === null) {
			$this->setSplitpay([$splitpayItem]);
			
			return $this;
		}
		
		$splitpay = $this->getSplitpay();
		$splitpay[] = $splitpayItem;
		$this->setSplitpay($splitpay);
		
		return $this;
	}

	/**
	 * Remove splitpayItem
	 * 
	 * @param Splitpay $splitpayItem
	 * 
	 * @return $this
	 */
	public function removeSplitpayItem(Splitpay $splitpayItem): self
	{
		$this->setSplitpay(array_diff($this->getSplitpay(), [$splitpayItem]));
		
		return $this;
	}

	/**
	 * Builder function for airlineTravelDetails
	 * 
	 * @param AirlineTravelDetails $airlineTravelDetails
	 * 
	 * @return $this
	 */
	public function airlineTravelDetails(AirlineTravelDetails $airlineTravelDetails): self
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
	public function setAirlineTravelDetails(AirlineTravelDetails $airlineTravelDetails): void
	{
		$this->airlineTravelDetails = $airlineTravelDetails;
	}

	/**
	 * Contains information about your airline travel. <br /> <b>Note:</b> This object is only for Airline Merchants.
	 * This field has to be passed only in case of card transactions.
	 * 
	 * @return AirlineTravelDetails
	 */
	public function getAirlineTravelDetails(): AirlineTravelDetails
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
	public function cruiselineTravelDetails(CruiselineTravelDetails $cruiselineTravelDetails): self
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
	public function setCruiselineTravelDetails(CruiselineTravelDetails $cruiselineTravelDetails): void
	{
		$this->cruiselineTravelDetails = $cruiselineTravelDetails;
	}

	/**
	 * Contains information about your cruise line travel. <br /> <b>Note:</b>
     * This object is only for Cruise line Merchants.
	 * This field has to be passed only in case of card transactions.
	 * 
	 * @return CruiselineTravelDetails
	 */
	public function getCruiselineTravelDetails(): CruiselineTravelDetails
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
	public function lodgingDetails(LodgingDetails $lodgingDetails): self
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
	public function setLodgingDetails(LodgingDetails $lodgingDetails): void
	{
		$this->lodgingDetails = $lodgingDetails;
	}

	/**
	 * Contains information about lodging details.  <br /> <b>Note:</b> This object is only for Airline Merchants.
	 * This field has to be passed only in case of card transactions.
	 * 
	 * @return LodgingDetails
	 */
	public function getLodgingDetails(): LodgingDetails
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
	public function carRentalDetails(CarRentalDetails $carRentalDetails): self
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
	public function setCarRentalDetails(CarRentalDetails $carRentalDetails): void
	{
		$this->carRentalDetails = $carRentalDetails;
	}

	/**
	 * Contains information about your car rental. <br />
	 * <b>Note:<b> This object is only for Car rental Merchants.<br />
	 * <b>Note:<b> This field has to be passed only in case of card transactions.
	 * 
	 * @return CarRentalDetails
	 */
	public function getCarRentalDetails(): CarRentalDetails
	{
		return $this->carRentalDetails;
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
	 * This is the ID returned in the response. This ID can be used for future associated request.
	 * 
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * Builder function for paymentType
	 * 
	 * @param string $paymentType
	 * 
	 * @return $this
	 */
	public function paymentType(string $paymentType): self
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
	public function setPaymentType(string $paymentType): void
	{
		$this->paymentType = $paymentType;
	}

	/**
	 * This is the payment type associated with the settlement used for this request.
	 * 
	 * @return string
	 */
	public function getPaymentType(): string
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
	public function availableToRefund(int $availableToRefund): self
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
	public function setAvailableToRefund(int $availableToRefund): void
	{
		$this->availableToRefund = $availableToRefund;
	}

	/**
	 * This is the remaining amount of the refund, in minor units.99. <br />
	 * Maximum: 99999999999
	 * 
	 * @return int
	 */
	public function getAvailableToRefund(): int
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
	public function childAccountNum(string $childAccountNum): self
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
	public function setChildAccountNum(string $childAccountNum): void
	{
		$this->childAccountNum = $childAccountNum;
	}

	/**
	 * This is the child merchant account number.
     * It is returned only if the transaction was processed via a master account.
	 * 
	 * @return string
	 */
	public function getChildAccountNum(): string
	{
		return $this->childAccountNum;
	}

	/**
	 * Builder function for txnTime
	 * 
	 * @param mixed $txnTime
	 * 
	 * @return $this
	 */
	public function txnTime($txnTime): self
	{
		$this->setTxnTime($txnTime);
		
		return $this;
	}

	/**
	 * Setter function for txnTime
	 * 
	 * @param mixed $txnTime
	 * 
	 * @return void
	 */
	public function setTxnTime($txnTime): void
	{
        if (is_int($txnTime)) {
            $txnTime = date('Y-m-d\TH:i:s\Z', $txnTime);
        }

		$this->txnTime = $txnTime;
	}

	/**
	 * This is the date and time the request was processed. For example: 2014-01-26T10:32:28Z
	 * 
	 * @return mixed
	 */
	public function getTxnTime()
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
	 * This is the status of the transaction request. Possible values are: <br />
	 * • RECEIVED – Our system has received the request and is waiting for the downstream processor’s response. <br />
	 * • INITIATED – The transaction was initiated with the downstream provider. <br />
	 * • PENDING - The transaction is awaiting the payment service provider's response. <br />
	 * • FAILED – The transaction failed, due to either an error or being declined. <br />
	 * • CANCELLED – The transaction request is cancelled. <br />
	 * • EXPIRED – The transaction request is expired. <br />
	 * • COMPLETED – The transaction request is completed. <br />
	 * <p>
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Builder function for error
	 * 
	 * @param Error $error
	 * 
	 * @return $this
	 */
	public function error(Error $error): self
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
	public function setError(Error $error): void
	{
		$this->error = $error;
	}

	/**
	 * Getter function for error
	 * 
	 * @return Error
	 */
	public function getError(): Error
	{
		return $this->error;
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
	 * An array of integers is returned, displaying the detailed Risk reason codes if your transaction was declined.
	 * It is returned only if your account is configured accordingly.
	 * 
	 * @return int[]|null
	 */
	public function getRiskReasonCode(): array
	{
		return $this->riskReasonCode;
	}

	/**
	 * Add new riskReasonCodeItem
	 * 
	 * @param int $riskReasonCodeItem
	 * 
	 * @return $this
	 */
	public function addRiskReasonCodeItem(int $riskReasonCodeItem): self
	{
		if ($this->riskReasonCode === null) {
			$this->setRiskReasonCode([$riskReasonCodeItem]);
			
			return $this;
		}
		
		$riskReasonCode = $this->getRiskReasonCode();
		$riskReasonCode[] = $riskReasonCodeItem;
		$this->setRiskReasonCode($riskReasonCode);
		
		return $this;
	}

	/**
	 * Remove riskReasonCodeItem
	 * 
	 * @param int $riskReasonCodeItem
	 * 
	 * @return $this
	 */
	public function removeRiskReasonCodeItem(int $riskReasonCodeItem): self
	{
		$this->setRiskReasonCode(array_diff($this->getRiskReasonCode(), [$riskReasonCodeItem]));
		
		return $this;
	}

	/**
	 * Builder function for gatewayResponse
	 * 
	 * @param GatewayResponse $gatewayResponse
	 * 
	 * @return $this
	 */
	public function gatewayResponse(GatewayResponse $gatewayResponse): self
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
	public function setGatewayResponse(GatewayResponse $gatewayResponse): void
	{
		$this->gatewayResponse = $gatewayResponse;
	}

	/**
	 * This is the read-only raw response returned by an acquirer or PSP.
	 * 
	 * @return GatewayResponse
	 */
	public function getGatewayResponse(): GatewayResponse
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
	public function gatewayReconciliationId(string $gatewayReconciliationId): self
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
	public function setGatewayReconciliationId(string $gatewayReconciliationId): void
	{
		$this->gatewayReconciliationId = $gatewayReconciliationId;
	}

	/**
	 * It is the id which is common between paysafe and payment serivce provider.
	 * 
	 * @return string
	 */
	public function getGatewayReconciliationId(): string
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
	public function liveMode(bool $liveMode): self
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
	public function setLiveMode(bool $liveMode): void
	{
		$this->liveMode = $liveMode;
	}

	/**
	 * This flag indicates the envrionment.  - true - Production - false - Non-Production
	 * 
	 * @return bool
	 */
	public function getLiveMode(): bool
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
	public function updatedTime(string $updatedTime): self
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
	public function setUpdatedTime(string $updatedTime): void
	{
		$this->updatedTime = $updatedTime;
	}

	/**
	 * Indicates the last updated time for the resource.
	 * 
	 * @return string
	 */
	public function getUpdatedTime(): string
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
	public function statusTime(string $statusTime): self
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
	public function setStatusTime(string $statusTime): void
	{
		$this->statusTime = $statusTime;
	}

	/**
	 * Indicates the last updated time for the resource.
	 * 
	 * @return string
	 */
	public function getStatusTime(): string
	{
		return $this->statusTime;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Settlement {" . PHP_EOL
			. "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL
			. "    amount: " . $this->toIndentedString($this->amount) . PHP_EOL
			. "    dupCheck: " . $this->toIndentedString($this->dupCheck) . PHP_EOL
			. "    splitpay: " . $this->toIndentedString($this->splitpay) . PHP_EOL
			. "    airlineTravelDetails: " . $this->toIndentedString($this->airlineTravelDetails) . PHP_EOL
			. "    cruiselineTravelDetails: " . $this->toIndentedString($this->cruiselineTravelDetails) . PHP_EOL
			. "    lodgingDetails: " . $this->toIndentedString($this->lodgingDetails) . PHP_EOL
			. "    carRentalDetails: " . $this->toIndentedString($this->carRentalDetails) . PHP_EOL
			. "    id: " . $this->toIndentedString($this->id) . PHP_EOL
			. "    paymentType: " . $this->toIndentedString($this->paymentType) . PHP_EOL
			. "    availableToRefund: " . $this->toIndentedString($this->availableToRefund) . PHP_EOL
			. "    childAccountNum: " . $this->toIndentedString($this->childAccountNum) . PHP_EOL
			. "    txnTime: " . $this->toIndentedString($this->txnTime) . PHP_EOL
			. "    status: " . $this->toIndentedString($this->status) . PHP_EOL
			. "    error: " . $this->toIndentedString($this->error) . PHP_EOL
			. "    riskReasonCode: " . $this->toIndentedString($this->riskReasonCode) . PHP_EOL
			. "    gatewayResponse: " . $this->toIndentedString($this->gatewayResponse) . PHP_EOL
			. "    gatewayReconciliationId: " . $this->toIndentedString($this->gatewayReconciliationId) . PHP_EOL
			. "    liveMode: " . $this->toIndentedString($this->liveMode) . PHP_EOL
			. "    updatedTime: " . $this->toIndentedString($this->updatedTime) . PHP_EOL
			. "    statusTime: " . $this->toIndentedString($this->statusTime) . PHP_EOL
			. "}";
	}
}
