<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Details of the bacs account to be used for the transaction.
 */
class Bacs extends BaseModel
{

	/**
	 * This is an alias for this bank account.
	 * Example: Sally's Barclays Account
	 */
	private string $nickName;

	/**
	 * This is the name of the customer or company that owns the bank account.
	 * Example: XYZ Company
	 */
	private string $accountHolderName;

	/**
	 * This is the bank account number.
	 * Example: 98877219
	 */
	private string $accountNumber;

	/**
	 * This is the 6-digit sort code that identifies the financial institution and branch of the customer’s bank.
	 * Example: 321654
	 */
	private string $sortCode;

	private Mandate $mandate;

	/**
	 * These are the last two digits of the account 
	 * number.
	 * Example: 11
	 */
	private string $lastDigits;


	/**
	 * Builder function for nickName
	 * 
	 * @param string $nickName
	 * 
	 * @return Bacs
	 */
	public function nickName(string $nickName): self
	{
		$this->setNickName($nickName);
		
		return $this;
	}
	/**
	 * Setter function for nickName
	 * 
	 * @param string $nickName
	 * 
	 * @return void
	 */
	public function setNickName(string $nickName): void
	{
		$this->nickName = $nickName;
	}
	/**
	 * Getter function for nickName
	 * 
	 * @return string
	 */
	public function getNickName(): string
	{
		return $this->nickName;
	}

	/**
	 * Builder function for accountHolderName
	 * 
	 * @param string $accountHolderName
	 * 
	 * @return Bacs
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
	 * Getter function for accountHolderName
	 * 
	 * @return string
	 */
	public function getAccountHolderName(): string
	{
		return $this->accountHolderName;
	}

	/**
	 * Builder function for accountNumber
	 * 
	 * @param string $accountNumber
	 * 
	 * @return Bacs
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
	 * Getter function for accountNumber
	 * 
	 * @return string
	 */
	public function getAccountNumber(): string
	{
		return $this->accountNumber;
	}

	/**
	 * Builder function for sortCode
	 * 
	 * @param string $sortCode
	 * 
	 * @return Bacs
	 */
	public function sortCode(string $sortCode): self
	{
		$this->setSortCode($sortCode);
		
		return $this;
	}
	/**
	 * Setter function for sortCode
	 * 
	 * @param string $sortCode
	 * 
	 * @return void
	 */
	public function setSortCode(string $sortCode): void
	{
		$this->sortCode = $sortCode;
	}
	/**
	 * Getter function for sortCode
	 * 
	 * @return string
	 */
	public function getSortCode(): string
	{
		return $this->sortCode;
	}

	/**
	 * Builder function for mandate
	 * 
	 * @param Mandate $mandate
	 * 
	 * @return Bacs
	 */
	public function mandate(Mandate $mandate): self
	{
		$this->setMandate($mandate);
		
		return $this;
	}
	/**
	 * Setter function for mandate
	 * 
	 * @param Mandate $mandate
	 * 
	 * @return void
	 */
	public function setMandate(Mandate $mandate): void
	{
		$this->mandate = $mandate;
	}
	/**
	 * Getter function for mandate
	 * 
	 * @return Mandate
	 */
	public function getMandate(): Mandate
	{
		return $this->mandate;
	}

	/**
	 * Builder function for lastDigits
	 * 
	 * @param string $lastDigits
	 * 
	 * @return Bacs
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
	 * Getter function for lastDigits
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
		return "class Bacs {" . PHP_EOL . 
			"	nickName: " . $this->toIndentedString($this->nickName) . PHP_EOL .
			"	accountHolderName: " . $this->toIndentedString($this->accountHolderName) . PHP_EOL .
			"	accountNumber: " . $this->toIndentedString($this->accountNumber) . PHP_EOL .
			"	sortCode: " . $this->toIndentedString($this->sortCode) . PHP_EOL .
			"	mandate: " . $this->toIndentedString($this->mandate) . PHP_EOL .
			"	lastDigits: " . $this->toIndentedString($this->lastDigits) . PHP_EOL .
		"}";
	}
}
