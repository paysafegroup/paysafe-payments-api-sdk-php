<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This is the read-only raw response returned by an acquirer or PSP.
 */
class GatewayResponse extends BaseModel
{

	private string $id;
	private string $processor;
	private string $code;
	private string $responseCode;
	private string $responseCodeDescription;
	private string $avsCode;
	private string $avsResponse;
	private string $nameVerification;
	private string $firstNameVerification;
	private string $lastNameVerification;
	private string $balanceResponse;
	private string $mid;
	private string $terminalId;
	private string $batchNumber;
	private string $seqNumber;
	private string $effectiveDate;
	private string $financingType;
	private string $plan;
	private string $gracePeriod;
	private string $term;
	private string $responseId;
	private string $requestId;
	private string $description;
	private string $authCode;
	private string $txnDateTime;
	private string $referenceNbr;
	private string $responseReasonCode;
	private string $cvvVerification;
	private string $cvv2Result;
	private string $status;
	private string $orderId;
	private string $operationId;

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
	 * This is the response id returned by the processor
	 * 
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * Builder function for processor
	 * 
	 * @param string $processor
	 * 
	 * @return $this
	 */
	public function processor(string $processor): self
	{
		$this->setProcessor($processor);
		
		return $this;
	}

	/**
	 * Setter function for processor
	 * 
	 * @param string $processor
	 * 
	 * @return void
	 */
	public function setProcessor(string $processor): void
	{
		$this->processor = $processor;
	}

	/**
	 * This is the processor code of the transaction at Paysafe side
	 * 
	 * @return string
	 */
	public function getProcessor(): string
	{
		return $this->processor;
	}

	/**
	 * Builder function for code
	 * 
	 * @param string $code
	 * 
	 * @return $this
	 */
	public function code(string $code): self
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
	public function setCode(string $code): void
	{
		$this->code = $code;
	}

	/**
	 * This is acquirer identification code, such as VPS, GPS, etc.
	 * 
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * Builder function for responseCode
	 * 
	 * @param string $responseCode
	 * 
	 * @return $this
	 */
	public function responseCode(string $responseCode): self
	{
		$this->setResponseCode($responseCode);
		
		return $this;
	}

	/**
	 * Setter function for responseCode
	 * 
	 * @param string $responseCode
	 * 
	 * @return void
	 */
	public function setResponseCode(string $responseCode): void
	{
		$this->responseCode = $responseCode;
	}

	/**
	 * This is the raw response returned by the acquirer.
	 * 
	 * @return string
	 */
	public function getResponseCode(): string
	{
		return $this->responseCode;
	}

	/**
	 * Builder function for responseCodeDescription
	 * 
	 * @param string $responseCodeDescription
	 * 
	 * @return $this
	 */
	public function responseCodeDescription(string $responseCodeDescription): self
	{
		$this->setResponseCodeDescription($responseCodeDescription);
		
		return $this;
	}

	/**
	 * Setter function for responseCodeDescription
	 * 
	 * @param string $responseCodeDescription
	 * 
	 * @return void
	 */
	public function setResponseCodeDescription(string $responseCodeDescription): void
	{
		$this->responseCodeDescription = $responseCodeDescription;
	}

	/**
	 * This is the raw response code description returned by the acquirer.
	 * 
	 * @return string
	 */
	public function getResponseCodeDescription(): string
	{
		return $this->responseCodeDescription;
	}

	/**
	 * Builder function for avsCode
	 * 
	 * @param string $avsCode
	 * 
	 * @return $this
	 */
	public function avsCode(string $avsCode): self
	{
		$this->setAvsCode($avsCode);
		
		return $this;
	}

	/**
	 * Setter function for avsCode
	 * 
	 * @param string $avsCode
	 * 
	 * @return void
	 */
	public function setAvsCode(string $avsCode): void
	{
		$this->avsCode = $avsCode;
	}

	/**
	 * This is the raw AVS code returned by the acquirer.
	 * 
	 * @return string
	 */
	public function getAvsCode(): string
	{
		return $this->avsCode;
	}

	/**
	 * Builder function for avsResponse
	 * 
	 * @param string $avsResponse
	 * 
	 * @return $this
	 */
	public function avsResponse(string $avsResponse): self
	{
		$this->setAvsResponse($avsResponse);
		
		return $this;
	}

	/**
	 * Setter function for avsResponse
	 * 
	 * @param string $avsResponse
	 * 
	 * @return void
	 */
	public function setAvsResponse(string $avsResponse): void
	{
		$this->avsResponse = $avsResponse;
	}

	/**
	 * This is the AVS response returned from the card issuer.
	 * 
	 * @return string
	 */
	public function getAvsResponse(): string
	{
		return $this->avsResponse;
	}

	/**
	 * Builder function for nameVerification
	 * 
	 * @param string $nameVerification
	 * 
	 * @return $this
	 */
	public function nameVerification(string $nameVerification): self
	{
		$this->setNameVerification($nameVerification);
		
		return $this;
	}

	/**
	 * Setter function for nameVerification
	 * 
	 * @param string $nameVerification
	 * 
	 * @return void
	 */
	public function setNameVerification(string $nameVerification): void
	{
		$this->nameVerification = $nameVerification;
	}

	/**
	 * This is the account name inquiry full name set result returned by the acquirer.
	 * 
	 * @return string
	 */
	public function getNameVerification(): string
	{
		return $this->nameVerification;
	}

	/**
	 * Builder function for firstNameVerification
	 * 
	 * @param string $firstNameVerification
	 * 
	 * @return $this
	 */
	public function firstNameVerification(string $firstNameVerification): self
	{
		$this->setFirstNameVerification($firstNameVerification);
		
		return $this;
	}

	/**
	 * Setter function for firstNameVerification
	 * 
	 * @param string $firstNameVerification
	 * 
	 * @return void
	 */
	public function setFirstNameVerification(string $firstNameVerification): void
	{
		$this->firstNameVerification = $firstNameVerification;
	}

	/**
	 * This is the account name inquiry first name result returned by the acquirer.
	 * 
	 * @return string
	 */
	public function getFirstNameVerification(): string
	{
		return $this->firstNameVerification;
	}

	/**
	 * Builder function for lastNameVerification
	 * 
	 * @param string $lastNameVerification
	 * 
	 * @return $this
	 */
	public function lastNameVerification(string $lastNameVerification): self
	{
		$this->setLastNameVerification($lastNameVerification);
		
		return $this;
	}

	/**
	 * Setter function for lastNameVerification
	 * 
	 * @param string $lastNameVerification
	 * 
	 * @return void
	 */
	public function setLastNameVerification(string $lastNameVerification): void
	{
		$this->lastNameVerification = $lastNameVerification;
	}

	/**
	 * This is the account name inquiry for the last name returned by the acquirer.
	 * 
	 * @return string
	 */
	public function getLastNameVerification(): string
	{
		return $this->lastNameVerification;
	}

	/**
	 * Builder function for balanceResponse
	 * 
	 * @param string $balanceResponse
	 * 
	 * @return $this
	 */
	public function balanceResponse(string $balanceResponse): self
	{
		$this->setBalanceResponse($balanceResponse);
		
		return $this;
	}

	/**
	 * Setter function for balanceResponse
	 * 
	 * @param string $balanceResponse
	 * 
	 * @return void
	 */
	public function setBalanceResponse(string $balanceResponse): void
	{
		$this->balanceResponse = $balanceResponse;
	}

	/**
	 * This is the balance remaining on a gift card, if a gift card was used for the original transaction.
	 * 
	 * @return string
	 */
	public function getBalanceResponse(): string
	{
		return $this->balanceResponse;
	}

	/**
	 * Builder function for mid
	 * 
	 * @param string $mid
	 * 
	 * @return $this
	 */
	public function mid(string $mid): self
	{
		$this->setMid($mid);
		
		return $this;
	}

	/**
	 * Setter function for mid
	 * 
	 * @param string $mid
	 * 
	 * @return void
	 */
	public function setMid(string $mid): void
	{
		$this->mid = $mid;
	}

	/**
	 * This is the acquirer MID that was sent to the clearing house.
	 * 
	 * @return string
	 */
	public function getMid(): string
	{
		return $this->mid;
	}

	/**
	 * Builder function for terminalId
	 * 
	 * @param string $terminalId
	 * 
	 * @return $this
	 */
	public function terminalId(string $terminalId): self
	{
		$this->setTerminalId($terminalId);
		
		return $this;
	}

	/**
	 * Setter function for terminalId
	 * 
	 * @param string $terminalId
	 * 
	 * @return void
	 */
	public function setTerminalId(string $terminalId): void
	{
		$this->terminalId = $terminalId;
	}

	/**
	 * This is the merchant's terminal ID.
	 * 
	 * @return string
	 */
	public function getTerminalId(): string
	{
		return $this->terminalId;
	}

	/**
	 * Builder function for batchNumber
	 * 
	 * @param string $batchNumber
	 * 
	 * @return $this
	 */
	public function batchNumber(string $batchNumber): self
	{
		$this->setBatchNumber($batchNumber);
		
		return $this;
	}

	/**
	 * Setter function for batchNumber
	 * 
	 * @param string $batchNumber
	 * 
	 * @return void
	 */
	public function setBatchNumber(string $batchNumber): void
	{
		$this->batchNumber = $batchNumber;
	}

	/**
	 * This is the batch number.
	 * 
	 * @return string
	 */
	public function getBatchNumber(): string
	{
		return $this->batchNumber;
	}

	/**
	 * Builder function for seqNumber
	 * 
	 * @param string $seqNumber
	 * 
	 * @return $this
	 */
	public function seqNumber(string $seqNumber): self
	{
		$this->setSeqNumber($seqNumber);
		
		return $this;
	}

	/**
	 * Setter function for seqNumber
	 * 
	 * @param string $seqNumber
	 * 
	 * @return void
	 */
	public function setSeqNumber(string $seqNumber): void
	{
		$this->seqNumber = $seqNumber;
	}

	/**
	 * This is the merchant's sequence number.
	 * 
	 * @return string
	 */
	public function getSeqNumber(): string
	{
		return $this->seqNumber;
	}

	/**
	 * Builder function for effectiveDate
	 * 
	 * @param string $effectiveDate
	 * 
	 * @return $this
	 */
	public function effectiveDate(string $effectiveDate): self
	{
		$this->setEffectiveDate($effectiveDate);
		
		return $this;
	}

	/**
	 * Setter function for effectiveDate
	 * 
	 * @param string $effectiveDate
	 * 
	 * @return void
	 */
	public function setEffectiveDate(string $effectiveDate): void
	{
		$this->effectiveDate = $effectiveDate;
	}

	/**
	 * This is the date of the bank deposit associated  with the transaction.
	 * 
	 * @return string
	 */
	public function getEffectiveDate(): string
	{
		return $this->effectiveDate;
	}

	/**
	 * Builder function for financingType
	 * 
	 * @param string $financingType
	 * 
	 * @return $this
	 */
	public function financingType(string $financingType): self
	{
		$this->setFinancingType($financingType);
		
		return $this;
	}

	/**
	 * Setter function for financingType
	 * 
	 * @param string $financingType
	 * 
	 * @return void
	 */
	public function setFinancingType(string $financingType): void
	{
		$this->financingType = $financingType;
	}

	/**
	 * This is the type of financing offered.
	 * 
	 * @return string
	 */
	public function getFinancingType(): string
	{
		return $this->financingType;
	}

	/**
	 * Builder function for plan
	 * 
	 * @param string $plan
	 * 
	 * @return $this
	 */
	public function plan(string $plan): self
	{
		$this->setPlan($plan);
		
		return $this;
	}

	/**
	 * Setter function for plan
	 * 
	 * @param string $plan
	 * 
	 * @return void
	 */
	public function setPlan(string $plan): void
	{
		$this->plan = $plan;
	}

	/**
	 * This is the plan number for this financing  transaction.
	 * 
	 * @return string
	 */
	public function getPlan(): string
	{
		return $this->plan;
	}

	/**
	 * Builder function for gracePeriod
	 * 
	 * @param string $gracePeriod
	 * 
	 * @return $this
	 */
	public function gracePeriod(string $gracePeriod): self
	{
		$this->setGracePeriod($gracePeriod);
		
		return $this;
	}

	/**
	 * Setter function for gracePeriod
	 * 
	 * @param string $gracePeriod
	 * 
	 * @return void
	 */
	public function setGracePeriod(string $gracePeriod): void
	{
		$this->gracePeriod = $gracePeriod;
	}

	/**
	 * This is the grace period, in months, associated  with deferred payment transactions.
	 * 
	 * @return string
	 */
	public function getGracePeriod(): string
	{
		return $this->gracePeriod;
	}

	/**
	 * Builder function for term
	 * 
	 * @param string $term
	 * 
	 * @return $this
	 */
	public function term(string $term): self
	{
		$this->setTerm($term);
		
		return $this;
	}

	/**
	 * Setter function for term
	 * 
	 * @param string $term
	 * 
	 * @return void
	 */
	public function setTerm(string $term): void
	{
		$this->term = $term;
	}

	/**
	 * This is the number of payments, in months, for  equal payment transactions.
	 * 
	 * @return string
	 */
	public function getTerm(): string
	{
		return $this->term;
	}

	/**
	 * Builder function for responseId
	 * 
	 * @param string $responseId
	 * 
	 * @return $this
	 */
	public function responseId(string $responseId): self
	{
		$this->setResponseId($responseId);
		
		return $this;
	}

	/**
	 * Setter function for responseId
	 * 
	 * @param string $responseId
	 * 
	 * @return void
	 */
	public function setResponseId(string $responseId): void
	{
		$this->responseId = $responseId;
	}

	/**
	 * This is the response ID assigned by Credorax.
	 * 
	 * @return string
	 */
	public function getResponseId(): string
	{
		return $this->responseId;
	}

	/**
	 * Builder function for requestId
	 * 
	 * @param string $requestId
	 * 
	 * @return $this
	 */
	public function requestId(string $requestId): self
	{
		$this->setRequestId($requestId);
		
		return $this;
	}

	/**
	 * Setter function for requestId
	 * 
	 * @param string $requestId
	 * 
	 * @return void
	 */
	public function setRequestId(string $requestId): void
	{
		$this->requestId = $requestId;
	}

	/**
	 * This is the request ID assigned by Paysafe.
	 * 
	 * @return string
	 */
	public function getRequestId(): string
	{
		return $this->requestId;
	}

	/**
	 * Builder function for description
	 * 
	 * @param string $description
	 * 
	 * @return $this
	 */
	public function description(string $description): self
	{
		$this->setDescription($description);
		
		return $this;
	}

	/**
	 * Setter function for description
	 * 
	 * @param string $description
	 * 
	 * @return void
	 */
	public function setDescription(string $description): void
	{
		$this->description = $description;
	}

	/**
	 * This is a description of the response.
	 * 
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * Builder function for authCode
	 * 
	 * @param string $authCode
	 * 
	 * @return $this
	 */
	public function authCode(string $authCode): self
	{
		$this->setAuthCode($authCode);
		
		return $this;
	}

	/**
	 * Setter function for authCode
	 * 
	 * @param string $authCode
	 * 
	 * @return void
	 */
	public function setAuthCode(string $authCode): void
	{
		$this->authCode = $authCode;
	}

	/**
	 * This is the authorization code.
	 * 
	 * @return string
	 */
	public function getAuthCode(): string
	{
		return $this->authCode;
	}

	/**
	 * Builder function for txnDateTime
	 * 
	 * @param string $txnDateTime
	 * 
	 * @return $this
	 */
	public function txnDateTime(string $txnDateTime): self
	{
		$this->setTxnDateTime($txnDateTime);
		
		return $this;
	}

	/**
	 * Setter function for txnDateTime
	 * 
	 * @param string $txnDateTime
	 * 
	 * @return void
	 */
	public function setTxnDateTime(string $txnDateTime): void
	{
		$this->txnDateTime = $txnDateTime;
	}

	/**
	 * This is the transaction date and time.
	 * 
	 * @return string
	 */
	public function getTxnDateTime(): string
	{
		return $this->txnDateTime;
	}

	/**
	 * Builder function for referenceNbr
	 * 
	 * @param string $referenceNbr
	 * 
	 * @return $this
	 */
	public function referenceNbr(string $referenceNbr): self
	{
		$this->setReferenceNbr($referenceNbr);
		
		return $this;
	}

	/**
	 * Setter function for referenceNbr
	 * 
	 * @param string $referenceNbr
	 * 
	 * @return void
	 */
	public function setReferenceNbr(string $referenceNbr): void
	{
		$this->referenceNbr = $referenceNbr;
	}

	/**
	 * This is the Bank net transaction ID/Merch Tran Ref
	 * 
	 * @return string
	 */
	public function getReferenceNbr(): string
	{
		return $this->referenceNbr;
	}

	/**
	 * Builder function for responseReasonCode
	 * 
	 * @param string $responseReasonCode
	 * 
	 * @return $this
	 */
	public function responseReasonCode(string $responseReasonCode): self
	{
		$this->setResponseReasonCode($responseReasonCode);
		
		return $this;
	}

	/**
	 * Setter function for responseReasonCode
	 * 
	 * @param string $responseReasonCode
	 * 
	 * @return void
	 */
	public function setResponseReasonCode(string $responseReasonCode): void
	{
		$this->responseReasonCode = $responseReasonCode;
	}

	/**
	 * This is the raw response reason code returned by  Credorax.
	 * 
	 * @return string
	 */
	public function getResponseReasonCode(): string
	{
		return $this->responseReasonCode;
	}

	/**
	 * Builder function for cvvVerification
	 * 
	 * @param string $cvvVerification
	 * 
	 * @return $this
	 */
	public function cvvVerification(string $cvvVerification): self
	{
		$this->setCvvVerification($cvvVerification);
		
		return $this;
	}

	/**
	 * Setter function for cvvVerification
	 * 
	 * @param string $cvvVerification
	 * 
	 * @return void
	 */
	public function setCvvVerification(string $cvvVerification): void
	{
		$this->cvvVerification = $cvvVerification;
	}

	/**
	 * This is the response to the cvv submitted with the transaction request.
	 * 
	 * @return string
	 */
	public function getCvvVerification(): string
	{
		return $this->cvvVerification;
	}

	/**
	 * Builder function for cvv2Result
	 * 
	 * @param string $cvv2Result
	 * 
	 * @return $this
	 */
	public function cvv2Result(string $cvv2Result): self
	{
		$this->setCvv2Result($cvv2Result);
		
		return $this;
	}

	/**
	 * Setter function for cvv2Result
	 * 
	 * @param string $cvv2Result
	 * 
	 * @return void
	 */
	public function setCvv2Result(string $cvv2Result): void
	{
		$this->cvv2Result = $cvv2Result;
	}

	/**
	 * This is the raw cvv2 result code.
	 * 
	 * @return string
	 */
	public function getCvv2Result(): string
	{
		return $this->cvv2Result;
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
	 * This is the status of the transaction at the processor side.
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Builder function for orderId
	 * 
	 * @param string $orderId
	 * 
	 * @return $this
	 */
	public function orderId(string $orderId): self
	{
		$this->setOrderId($orderId);
		
		return $this;
	}

	/**
	 * Setter function for orderId
	 * 
	 * @param string $orderId
	 * 
	 * @return void
	 */
	public function setOrderId(string $orderId): void
	{
		$this->orderId = $orderId;
	}

	/**
	 * Unique NETELLER reference for the order.
	 * 
	 * @return string
	 */
	public function getOrderId(): string
	{
		return $this->orderId;
	}

	/**
	 * Builder function for operationId
	 * 
	 * @param string $operationId
	 * 
	 * @return $this
	 */
	public function operationId(string $operationId): self
	{
		$this->setOperationId($operationId);
		
		return $this;
	}

	/**
	 * Setter function for operationId
	 * 
	 * @param string $operationId
	 * 
	 * @return void
	 */
	public function setOperationId(string $operationId): void
	{
		$this->operationId = $operationId;
	}

	/**
	 * It is a transaction identifier at Safetypay.
	 * 
	 * @return string
	 */
	public function getOperationId(): string
	{
		return $this->operationId;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class GatewayResponse {" . PHP_EOL
			. "    id: " . $this->toIndentedString($this->id) . PHP_EOL
			. "    processor: " . $this->toIndentedString($this->processor) . PHP_EOL
			. "    code: " . $this->toIndentedString($this->code) . PHP_EOL
			. "    responseCode: " . $this->toIndentedString($this->responseCode) . PHP_EOL
			. "    responseCodeDescription: " . $this->toIndentedString($this->responseCodeDescription) . PHP_EOL
			. "    avsCode: " . $this->toIndentedString($this->avsCode) . PHP_EOL
			. "    avsResponse: " . $this->toIndentedString($this->avsResponse) . PHP_EOL
			. "    nameVerification: " . $this->toIndentedString($this->nameVerification) . PHP_EOL
			. "    firstNameVerification: " . $this->toIndentedString($this->firstNameVerification) . PHP_EOL
			. "    lastNameVerification: " . $this->toIndentedString($this->lastNameVerification) . PHP_EOL
			. "    balanceResponse: " . $this->toIndentedString($this->balanceResponse) . PHP_EOL
			. "    mid: " . $this->toIndentedString($this->mid) . PHP_EOL
			. "    terminalId: " . $this->toIndentedString($this->terminalId) . PHP_EOL
			. "    batchNumber: " . $this->toIndentedString($this->batchNumber) . PHP_EOL
			. "    seqNumber: " . $this->toIndentedString($this->seqNumber) . PHP_EOL
			. "    effectiveDate: " . $this->toIndentedString($this->effectiveDate) . PHP_EOL
			. "    financingType: " . $this->toIndentedString($this->financingType) . PHP_EOL
			. "    plan: " . $this->toIndentedString($this->plan) . PHP_EOL
			. "    gracePeriod: " . $this->toIndentedString($this->gracePeriod) . PHP_EOL
			. "    term: " . $this->toIndentedString($this->term) . PHP_EOL
			. "    responseId: " . $this->toIndentedString($this->responseId) . PHP_EOL
			. "    requestId: " . $this->toIndentedString($this->requestId) . PHP_EOL
			. "    description: " . $this->toIndentedString($this->description) . PHP_EOL
			. "    authCode: " . $this->toIndentedString($this->authCode) . PHP_EOL
			. "    txnDateTime: " . $this->toIndentedString($this->txnDateTime) . PHP_EOL
			. "    referenceNbr: " . $this->toIndentedString($this->referenceNbr) . PHP_EOL
			. "    responseReasonCode: " . $this->toIndentedString($this->responseReasonCode) . PHP_EOL
			. "    cvvVerification: " . $this->toIndentedString($this->cvvVerification) . PHP_EOL
			. "    cvv2Result: " . $this->toIndentedString($this->cvv2Result) . PHP_EOL
			. "    status: " . $this->toIndentedString($this->status) . PHP_EOL
			. "    orderId: " . $this->toIndentedString($this->orderId) . PHP_EOL
			. "    operationId: " . $this->toIndentedString($this->operationId) . PHP_EOL
			. "}";
	}
}
