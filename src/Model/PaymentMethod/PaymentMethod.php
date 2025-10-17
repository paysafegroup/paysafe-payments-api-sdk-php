<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentMethod;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Represents a payment method used for processing transactions.
 * <p>
 * This class includes details such as the type of payment method,
 * the currency code associated with the payment, and the account Id
 * linked to the payment method.
 * </p>
 */
class PaymentMethod extends BaseModel
{
	private string $paymentMethod;
	private string $currencyCode;
	private string $accountId;

	/**
	 * Builder function for paymentMethod
	 * 
	 * @param string $paymentMethod
	 * 
	 * @return $this
	 */
	public function paymentMethod(string $paymentMethod): self
	{
		$this->setPaymentMethod($paymentMethod);
		
		return $this;
	}

	/**
	 * Setter function for paymentMethod
	 * 
	 * @param string $paymentMethod
	 * 
	 * @return void
	 */
	public function setPaymentMethod(string $paymentMethod): void
	{
		$this->paymentMethod = $paymentMethod;
	}

	/**
	 * This is the payment type associated with this payment method.
     * Possible values are defined in string enum.
	 * 
	 * @return string
	 */
	public function getPaymentMethod(): string
	{
		return $this->paymentMethod;
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
	 * This is the currency of the merchant account, e.g., USD or CAD.
	 * See
     * <a href="https://developer.paysafe.com/en/support/reference-information/codes/#currency-codes">
     *     Currency Codes.
     * </a>
	 * 
	 * @return string
	 */
	public function getCurrencyCode(): string
	{
		return $this->currencyCode;
	}

	/**
	 * Builder function for accountId
	 * 
	 * @param string $accountId
	 * 
	 * @return $this
	 */
	public function accountId(string $accountId): self
	{
		$this->setAccountId($accountId);
		
		return $this;
	}

	/**
	 * Setter function for accountId
	 * 
	 * @param string $accountId
	 * 
	 * @return void
	 */
	public function setAccountId(string $accountId): void
	{
		$this->accountId = $accountId;
	}

	/**
	 * Account Id in the paysafe system.
	 * 
	 * @return string
	 */
	public function getAccountId(): string
	{
		return $this->accountId;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class PaymentMethod {" . PHP_EOL
			. "    paymentMethod: " . $this->toIndentedString($this->paymentMethod) . PHP_EOL
			. "    currencyCode: " . $this->toIndentedString($this->currencyCode) . PHP_EOL
			. "    accountId: " . $this->toIndentedString($this->accountId) . PHP_EOL
			. "}";
	}
}
