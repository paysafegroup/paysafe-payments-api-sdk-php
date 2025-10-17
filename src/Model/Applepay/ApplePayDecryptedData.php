<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Applepay;

use Paysafe\PhpSdk\Model\BaseModel;

class ApplePayDecryptedData extends BaseModel
{
	private string $applicationPrimaryAccountNumber;
	private string $applicationExpirationDate;
	private string $currencyCode;
	private string $transactionAmount;
	private string $cardholderName;
	private string $deviceManufacturerIdentifier;
	private string $paymentDataType;
	private ApplePayDecryptedTokenPaymentData $paymentData;

	/**
	 * Builder function for applicationPrimaryAccountNumber
	 * 
	 * @param string $applicationPrimaryAccountNumber
	 * 
	 * @return $this
	 */
	public function applicationPrimaryAccountNumber(string $applicationPrimaryAccountNumber): self
	{
		$this->setApplicationPrimaryAccountNumber($applicationPrimaryAccountNumber);
		
		return $this;
	}

	/**
	 * Setter function for applicationPrimaryAccountNumber
	 * 
	 * @param string $applicationPrimaryAccountNumber
	 * 
	 * @return void
	 */
	public function setApplicationPrimaryAccountNumber(string $applicationPrimaryAccountNumber): void
	{
		$this->applicationPrimaryAccountNumber = $applicationPrimaryAccountNumber;
	}

	/**
	 * Getter function for applicationPrimaryAccountNumber
	 * 
	 * @return string
	 */
	public function getApplicationPrimaryAccountNumber(): string
	{
		return $this->applicationPrimaryAccountNumber;
	}

	/**
	 * Builder function for applicationExpirationDate
	 * 
	 * @param string $applicationExpirationDate
	 * 
	 * @return $this
	 */
	public function applicationExpirationDate(string $applicationExpirationDate): self
	{
		$this->setApplicationExpirationDate($applicationExpirationDate);
		
		return $this;
	}

	/**
	 * Setter function for applicationExpirationDate
	 * 
	 * @param string $applicationExpirationDate
	 * 
	 * @return void
	 */
	public function setApplicationExpirationDate(string $applicationExpirationDate): void
	{
		$this->applicationExpirationDate = $applicationExpirationDate;
	}

	/**
	 * Getter function for applicationExpirationDate
	 * 
	 * @return string
	 */
	public function getApplicationExpirationDate(): string
	{
		return $this->applicationExpirationDate;
	}

	/**
	 * Builder function for currencyCode
	 * 
	 * @param string $currencyCode
	 * 
	 * @return $this
	 */
	public function currencyCode(string $currencyCode): self
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
	public function setCurrencyCode(string $currencyCode): void
	{
		$this->currencyCode = $currencyCode;
	}

	/**
	 * Getter function for currencyCode
	 * 
	 * @return string
	 */
	public function getCurrencyCode(): string
	{
		return $this->currencyCode;
	}

	/**
	 * Builder function for transactionAmount
	 * 
	 * @param string $transactionAmount
	 * 
	 * @return $this
	 */
	public function transactionAmount(string $transactionAmount): self
	{
		$this->setTransactionAmount($transactionAmount);
		
		return $this;
	}

	/**
	 * Setter function for transactionAmount
	 * 
	 * @param string $transactionAmount
	 * 
	 * @return void
	 */
	public function setTransactionAmount(string $transactionAmount): void
	{
		$this->transactionAmount = $transactionAmount;
	}

	/**
	 * Getter function for transactionAmount
	 * 
	 * @return string
	 */
	public function getTransactionAmount(): string
	{
		return $this->transactionAmount;
	}

	/**
	 * Builder function for cardholderName
	 * 
	 * @param string $cardholderName
	 * 
	 * @return $this
	 */
	public function cardholderName(string $cardholderName): self
	{
		$this->setCardholderName($cardholderName);
		
		return $this;
	}

	/**
	 * Setter function for cardholderName
	 * 
	 * @param string $cardholderName
	 * 
	 * @return void
	 */
	public function setCardholderName(string $cardholderName): void
	{
		$this->cardholderName = $cardholderName;
	}

	/**
	 * Getter function for cardholderName
	 * 
	 * @return string
	 */
	public function getCardholderName(): string
	{
		return $this->cardholderName;
	}

	/**
	 * Builder function for deviceManufacturerIdentifier
	 * 
	 * @param string $deviceManufacturerIdentifier
	 * 
	 * @return $this
	 */
	public function deviceManufacturerIdentifier(string $deviceManufacturerIdentifier): self
	{
		$this->setDeviceManufacturerIdentifier($deviceManufacturerIdentifier);
		
		return $this;
	}

	/**
	 * Setter function for deviceManufacturerIdentifier
	 * 
	 * @param string $deviceManufacturerIdentifier
	 * 
	 * @return void
	 */
	public function setDeviceManufacturerIdentifier(string $deviceManufacturerIdentifier): void
	{
		$this->deviceManufacturerIdentifier = $deviceManufacturerIdentifier;
	}

	/**
	 * Getter function for deviceManufacturerIdentifier
	 * 
	 * @return string
	 */
	public function getDeviceManufacturerIdentifier(): string
	{
		return $this->deviceManufacturerIdentifier;
	}

	/**
	 * Builder function for paymentDataType
	 * 
	 * @param string $paymentDataType
	 * 
	 * @return $this
	 */
	public function paymentDataType(string $paymentDataType): self
	{
		$this->setPaymentDataType($paymentDataType);
		
		return $this;
	}

	/**
	 * Setter function for paymentDataType
	 * 
	 * @param string $paymentDataType
	 * 
	 * @return void
	 */
	public function setPaymentDataType(string $paymentDataType): void
	{
		$this->paymentDataType = $paymentDataType;
	}

	/**
	 * Getter function for paymentDataType
	 * 
	 * @return string
	 */
	public function getPaymentDataType(): string
	{
		return $this->paymentDataType;
	}

	/**
	 * Builder function for paymentData
	 * 
	 * @param ApplePayDecryptedTokenPaymentData $paymentData
	 * 
	 * @return $this
	 */
	public function paymentData(ApplePayDecryptedTokenPaymentData $paymentData): self
	{
		$this->setPaymentData($paymentData);
		
		return $this;
	}

	/**
	 * Setter function for paymentData
	 * 
	 * @param ApplePayDecryptedTokenPaymentData $paymentData
	 * 
	 * @return void
	 */
	public function setPaymentData(ApplePayDecryptedTokenPaymentData $paymentData): void
	{
		$this->paymentData = $paymentData;
	}

	/**
	 * Getter function for paymentData
	 * 
	 * @return ApplePayDecryptedTokenPaymentData
	 */
	public function getPaymentData(): ApplePayDecryptedTokenPaymentData
	{
		return $this->paymentData;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ApplePayDecryptedData {" . PHP_EOL
			. "    applicationPrimaryAccountNumber: "
            . $this->toIndentedString($this->applicationPrimaryAccountNumber) . PHP_EOL
			. "    applicationExpirationDate: "
            . $this->toIndentedString($this->applicationExpirationDate) . PHP_EOL
			. "    currencyCode: " . $this->toIndentedString($this->currencyCode) . PHP_EOL
			. "    transactionAmount: " . $this->toIndentedString($this->transactionAmount) . PHP_EOL
			. "    cardholderName: " . $this->toIndentedString($this->cardholderName) . PHP_EOL
			. "    deviceManufacturerIdentifier: "
            . $this->toIndentedString($this->deviceManufacturerIdentifier) . PHP_EOL
			. "    paymentDataType: " . $this->toIndentedString($this->paymentDataType) . PHP_EOL
			. "    paymentData: " . $this->toIndentedString($this->paymentData) . PHP_EOL
			. "}";
	}
}
