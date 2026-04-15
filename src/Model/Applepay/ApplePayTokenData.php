<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Applepay;

use Paysafe\PhpSdk\Model\BaseModel;

class ApplePayTokenData extends BaseModel
{
	private ApplePayTokenPaymentData $paymentData;
	private ApplePayPaymentMethod $paymentMethod;
	private string $transactionIdentifier;

	/**
	 * Builder function for paymentData
	 * 
	 * @param ApplePayTokenPaymentData $paymentData
	 * 
	 * @return $this
	 */
	public function paymentData(ApplePayTokenPaymentData $paymentData): self
	{
		$this->setPaymentData($paymentData);
		
		return $this;
	}

	/**
	 * Setter function for paymentData
	 * 
	 * @param ApplePayTokenPaymentData $paymentData
	 * 
	 * @return void
	 */
	public function setPaymentData(ApplePayTokenPaymentData $paymentData): void
	{
		$this->paymentData = $paymentData;
	}

	/**
	 * Getter function for paymentData
	 * 
	 * @return ApplePayTokenPaymentData
	 */
	public function getPaymentData(): ApplePayTokenPaymentData
	{
		return $this->paymentData;
	}

	/**
	 * Builder function for paymentMethod
	 * 
	 * @param ApplePayPaymentMethod $paymentMethod
	 * 
	 * @return $this
	 */
	public function paymentMethod(ApplePayPaymentMethod $paymentMethod): self
	{
		$this->setPaymentMethod($paymentMethod);
		
		return $this;
	}

	/**
	 * Setter function for paymentMethod
	 * 
	 * @param ApplePayPaymentMethod $paymentMethod
	 * 
	 * @return void
	 */
	public function setPaymentMethod(ApplePayPaymentMethod $paymentMethod): void
	{
		$this->paymentMethod = $paymentMethod;
	}

	/**
	 * Getter function for paymentMethod
	 * 
	 * @return ApplePayPaymentMethod
	 */
	public function getPaymentMethod(): ApplePayPaymentMethod
	{
		return $this->paymentMethod;
	}

	/**
	 * Builder function for transactionIdentifier
	 * 
	 * @param string $transactionIdentifier
	 * 
	 * @return $this
	 */
	public function transactionIdentifier(string $transactionIdentifier): self
	{
		$this->setTransactionIdentifier($transactionIdentifier);
		
		return $this;
	}

	/**
	 * Setter function for transactionIdentifier
	 * 
	 * @param string $transactionIdentifier
	 * 
	 * @return void
	 */
	public function setTransactionIdentifier(string $transactionIdentifier): void
	{
		$this->transactionIdentifier = $transactionIdentifier;
	}

	/**
	 * Getter function for transactionIdentifier
	 * 
	 * @return string
	 */
	public function getTransactionIdentifier(): string
	{
		return $this->transactionIdentifier;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ApplePayTokenData {" . PHP_EOL
			. "    paymentData: " . $this->toIndentedString($this->paymentData) . PHP_EOL
			. "    paymentMethod: " . $this->toIndentedString($this->paymentMethod) . PHP_EOL
			. "    transactionIdentifier: " . $this->toIndentedString($this->transactionIdentifier) . PHP_EOL
			. "}";
	}
}
