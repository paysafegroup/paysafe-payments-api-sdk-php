<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Details of the ach account to be used for the transaction.
 */
class Ach extends BaseModel
{

	private string $accountHolderName;
	private string $payMethod;
	private string $accountType;
	private string $accountNumber;
	private string $routingNumber;
	private string $lastDigits;

	/**
	 * Builder function for accountHolderName
	 * 
	 * @param string $accountHolderName
	 * 
	 * @return $this
	 */
	public function accountHolderName(string $accountHolderName): self
	{
		$this->setAccountHolderName($accountHolderName);
		
		return $this;
	}

	/**
	 * Setter function for accountHolderName
	 * 
	 * @param string $accountHolderName
	 * 
	 * @return void
	 */
	public function setAccountHolderName(string $accountHolderName): void
	{
		$this->accountHolderName = $accountHolderName;
	}

	/**
	 * This is the name of the customer or company.
	 * 
	 * @return string
	 */
	public function getAccountHolderName(): string
	{
		return $this->accountHolderName;
	}

	/**
	 * Builder function for payMethod
	 * 
	 * @param string $payMethod
	 * 
	 * @return $this
	 */
	public function payMethod(string $payMethod): self
	{
		$this->setPayMethod($payMethod);
		
		return $this;
	}

	/**
	 * Setter function for payMethod
	 * 
	 * @param string $payMethod
	 * 
	 * @return void
	 */
	public function setPayMethod(string $payMethod): void
	{
		$this->payMethod = $payMethod;
	}

	/**
	 * This is the payment type. Possible values are: <br />
	 * - WEB - Website originated debit (Personal bank accounts only). <br />
	 * - TEL - elephone-Initiated Entry (Personal bank accounts
	 * only). <br />
	 * - PPD - Personal account debit (Personal bank accounts only). <br />
	 * - CCD - Business account debit (Business bank accounts only).
	 * 
	 * @return string
	 */
	public function getPayMethod(): string
	{
		return $this->payMethod;
	}

	/**
	 * Builder function for accountType
	 * 
	 * @param string $accountType
	 * 
	 * @return $this
	 */
	public function accountType(string $accountType): self
	{
		$this->setAccountType($accountType);
		
		return $this;
	}

	/**
	 * Setter function for accountType
	 * 
	 * @param string $accountType
	 * 
	 * @return void
	 */
	public function setAccountType(string $accountType): void
	{
		$this->accountType = $accountType;
	}

	/**
	 * This is the bank account type.
	 * 
	 * @return string
	 */
	public function getAccountType(): string
	{
		return $this->accountType;
	}

	/**
	 * Builder function for accountNumber
	 * 
	 * @param string $accountNumber
	 * 
	 * @return $this
	 */
	public function accountNumber(string $accountNumber): self
	{
		$this->setAccountNumber($accountNumber);
		
		return $this;
	}

	/**
	 * Setter function for accountNumber
	 * 
	 * @param string $accountNumber
	 * 
	 * @return void
	 */
	public function setAccountNumber(string $accountNumber): void
	{
		$this->accountNumber = $accountNumber;
	}

	/**
	 * This is the bank account number.
	 * 
	 * @return string
	 */
	public function getAccountNumber(): string
	{
		return $this->accountNumber;
	}

	/**
	 * Builder function for routingNumber
	 * 
	 * @param string $routingNumber
	 * 
	 * @return $this
	 */
	public function routingNumber(string $routingNumber): self
	{
		$this->setRoutingNumber($routingNumber);
		
		return $this;
	}

	/**
	 * Setter function for routingNumber
	 * 
	 * @param string $routingNumber
	 * 
	 * @return void
	 */
	public function setRoutingNumber(string $routingNumber): void
	{
		$this->routingNumber = $routingNumber;
	}

	/**
	 * For USD accounts, this is the 9-digit routing number of the bank.
	 * 
	 * @return string
	 */
	public function getRoutingNumber(): string
	{
		return $this->routingNumber;
	}

	/**
	 * Builder function for lastDigits
	 * 
	 * @param string $lastDigits
	 * 
	 * @return $this
	 */
	public function lastDigits(string $lastDigits): self
	{
		$this->setLastDigits($lastDigits);
		
		return $this;
	}

	/**
	 * Setter function for lastDigits
	 * 
	 * @param string $lastDigits
	 * 
	 * @return void
	 */
	public function setLastDigits(string $lastDigits): void
	{
		$this->lastDigits = $lastDigits;
	}

	/**
	 * This is returned in response. It contains only last 2 digits of bank account.
	 * 
	 * @return string
	 */
	public function getLastDigits(): string
	{
		return $this->lastDigits;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Ach {" . PHP_EOL
			. "    accountHolderName: " . $this->toIndentedString($this->accountHolderName) . PHP_EOL
			. "    payMethod: " . $this->toIndentedString($this->payMethod) . PHP_EOL
			. "    accountType: " . $this->toIndentedString($this->accountType) . PHP_EOL
			. "    accountNumber: " . $this->toIndentedString($this->accountNumber) . PHP_EOL
			. "    routingNumber: " . $this->toIndentedString($this->routingNumber) . PHP_EOL
			. "    lastDigits: " . $this->toIndentedString($this->lastDigits) . PHP_EOL
			. "}";
	}
}
