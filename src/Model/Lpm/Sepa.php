<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the details of the sepa account used for the transaction. 
 */
class Sepa extends BaseModel
{

	/**
	 * This is an alias for this bank account.
	 * Example: Sally's Barclays Account
	 */
	private string $nickName;


	/**
	 * This is the name of the customer or company 
	 * that owns the bank account.
	 * Example: XYZ Company
	 */
	private string $accountHolderName;

	/**
	 * This is the Bank Identifier Code for the consumer's bank account.
	 * Example: ABNANL2APIP
	 */
	private string $bic;

	/**
	 * This is the International Bank Account Number for the costumer's bank account.
	 * Example: DE89370400440532013000
	 */
	private string $iban;

	private Mandate $mandate;

	/**
	 * These are the last two digits of the iban.
	 * Example: 11
	 */
	private string $lastDigits;


	/**
	 * Builder function for nickName
	 * 
	 * @param string $nickName
	 * 
	 * @return Sepa
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
	 * @return Sepa
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
	 * Builder function for bic
	 * 
	 * @param string $bic
	 * 
	 * @return Sepa
	 */
	public function bic(string $bic): self
	{
		$this->setBic($bic);
		
		return $this;
	}
	/**
	 * Setter function for bic
	 * 
	 * @param string $bic
	 * 
	 * @return void
	 */
	public function setBic(string $bic): void
	{
		$this->bic = $bic;
	}
	/**
	 * Getter function for bic
	 * 
	 * @return string
	 */
	public function getBic(): string
	{
		return $this->bic;
	}

	/**
	 * Builder function for iban
	 * 
	 * @param string $iban
	 * 
	 * @return Sepa
	 */
	public function iban(string $iban): self
	{
		$this->setIban($iban);
		
		return $this;
	}
	/**
	 * Setter function for iban
	 * 
	 * @param string $iban
	 * 
	 * @return void
	 */
	public function setIban(string $iban): void
	{
		$this->iban = $iban;
	}
	/**
	 * Getter function for iban
	 * 
	 * @return string
	 */
	public function getIban(): string
	{
		return $this->iban;
	}

	/**
	 * Builder function for mandate
	 * 
	 * @param Mandate $mandate
	 * 
	 * @return Sepa
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
	 * @return Sepa
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
		return "class Sepa {" . PHP_EOL . 
			"	nickName: " . $this->toIndentedString($this->nickName) . PHP_EOL .
			"	accountHolderName: " . $this->toIndentedString($this->accountHolderName) . PHP_EOL .
			"	bic: " . $this->toIndentedString($this->bic) . PHP_EOL .
			"	iban: " . $this->toIndentedString($this->iban) . PHP_EOL .
			"	mandate: " . $this->toIndentedString($this->mandate) . PHP_EOL .
			"	lastDigits: " . $this->toIndentedString($this->lastDigits) . PHP_EOL .
		"}";
	}
}
