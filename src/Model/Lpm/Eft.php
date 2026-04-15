<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Details of the EFT account to be used for the transaction 
 */
class Eft extends BaseModel
{

	/**
	 * This is the name of the customer or company.
	 * Example: XYZ Company
	 */
	private string $accountHolderName;

	/**
	 * This is the bank account number.
	 * Example: 336612
	 */
	private string $accountNumber;

	/**
	 * This is the 5-digit transit number of the customer's bank branch.
	 * Example: 22446
	 */
	private string $transitNumber;

	/**
	 * This is the 3-digit institution ID of the customer’s bank branch.
	 * Example: 001
	 */
	private string $institutionId;

	/**
	 * It contains only last 2 digits of bank account.
	 * Example: 12
	 */
	private string $lastDigits;


	/**
	 * Builder function for accountHolderName
	 * 
	 * @param string $accountHolderName
	 * 
	 * @return Eft
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
	 * @return Eft
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
	 * Builder function for transitNumber
	 * 
	 * @param string $transitNumber
	 * 
	 * @return Eft
	 */
	public function transitNumber(string $transitNumber): self
	{
		$this->setTransitNumber($transitNumber);
		
		return $this;
	}
	/**
	 * Setter function for transitNumber
	 * 
	 * @param string $transitNumber
	 * 
	 * @return void
	 */
	public function setTransitNumber(string $transitNumber): void
	{
		$this->transitNumber = $transitNumber;
	}
	/**
	 * Getter function for transitNumber
	 * 
	 * @return string
	 */
	public function getTransitNumber(): string
	{
		return $this->transitNumber;
	}

	/**
	 * Builder function for institutionId
	 * 
	 * @param string $institutionId
	 * 
	 * @return Eft
	 */
	public function institutionId(string $institutionId): self
	{
		$this->setInstitutionId($institutionId);
		
		return $this;
	}
	/**
	 * Setter function for institutionId
	 * 
	 * @param string $institutionId
	 * 
	 * @return void
	 */
	public function setInstitutionId(string $institutionId): void
	{
		$this->institutionId = $institutionId;
	}
	/**
	 * Getter function for institutionId
	 * 
	 * @return string
	 */
	public function getInstitutionId(): string
	{
		return $this->institutionId;
	}

	/**
	 * Builder function for lastDigits
	 * 
	 * @param string $lastDigits
	 * 
	 * @return Eft
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
		return "class Eft {" . PHP_EOL .
			"	accountHolderName: " . $this->toIndentedString($this->accountHolderName) . PHP_EOL .
			"	accountNumber: " . $this->toIndentedString($this->accountNumber) . PHP_EOL .
			"	transitNumber: " . $this->toIndentedString($this->transitNumber) . PHP_EOL .
			"	institutionId: " . $this->toIndentedString($this->institutionId) . PHP_EOL .
			"	lastDigits: " . $this->toIndentedString($this->lastDigits) . PHP_EOL .
		"}";
	}
}
