<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This are the bank details which requires in case of enrollment/payments/payouts
 */
class AchBankAccount extends BaseModel
{

	/**
	 * The id of this bank resource.
	 * Example: 4fc8df40-033b-47cd-952b-bffcb52374bc
	 */
	private string $id;

	/**
	 * The customers bank account name.
	 * Example: Paysafe Test Bank
	 */
	private string $bankName;

	/**
	 * The corresponding registrationId associated with this bank account.
	 * Example: ac02be45-7ae5-40b5-a9ec-234086b2640e
	 */
	private string $registrationId;

	/**
	 * The routing number of the bank.
	 * Example: 123103729
	 */
	private string $routingNumber;

	/**
	 * The customers bank account number.
	 * Example: 12345678
	 */
	private string $accountNumber;

	/**
	 * The last digits of bank account number.
	 * Example: 78
	 */
	private string $lastDigits;

	/**
	 * The unique token associated with this bank account Example: BAxdQf1eUonA5adC
	 */
	private string $paymentToken;

	/**
	 * The unique token associated with this bank account.
	 * Example: BAxdQf1eUonA5adC
	 */
	private string $paymentHandleToken;


	/**
	 * Builder function for id
	 * 
	 * @param string $id
	 * 
	 * @return AchBankAccount
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
	 * Getter function for id
	 * 
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * Builder function for bankName
	 * 
	 * @param string $bankName
	 * 
	 * @return AchBankAccount
	 */
	public function bankName(string $bankName): self
	{
		$this->setBankName($bankName);
		
		return $this;
	}
	/**
	 * Setter function for bankName
	 * 
	 * @param string $bankName
	 * 
	 * @return void
	 */
	public function setBankName(string $bankName): void
	{
		$this->bankName = $bankName;
	}
	/**
	 * Getter function for bankName
	 * 
	 * @return string
	 */
	public function getBankName(): string
	{
		return $this->bankName;
	}

	/**
	 * Builder function for registrationId
	 * 
	 * @param string $registrationId
	 * 
	 * @return AchBankAccount
	 */
	public function registrationId(string $registrationId): self
	{
		$this->setRegistrationId($registrationId);
		
		return $this;
	}
	/**
	 * Setter function for registrationId
	 * 
	 * @param string $registrationId
	 * 
	 * @return void
	 */
	public function setRegistrationId(string $registrationId): void
	{
		$this->registrationId = $registrationId;
	}
	/**
	 * Getter function for registrationId
	 * 
	 * @return string
	 */
	public function getRegistrationId(): string
	{
		return $this->registrationId;
	}

	/**
	 * Builder function for routingNumber
	 * 
	 * @param string $routingNumber
	 * 
	 * @return AchBankAccount
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
	 * Getter function for routingNumber
	 * 
	 * @return string
	 */
	public function getRoutingNumber(): string
	{
		return $this->routingNumber;
	}

	/**
	 * Builder function for accountNumber
	 * 
	 * @param string $accountNumber
	 * 
	 * @return AchBankAccount
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
	 * Builder function for lastDigits
	 * 
	 * @param string $lastDigits
	 * 
	 * @return AchBankAccount
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
	 * Builder function for paymentToken
	 * 
	 * @param string $paymentToken
	 * 
	 * @return AchBankAccount
	 */
	public function paymentToken(string $paymentToken): self
	{
		$this->setPaymentToken($paymentToken);
		
		return $this;
	}
	/**
	 * Setter function for paymentToken
	 * 
	 * @param string $paymentToken
	 * 
	 * @return void
	 */
	public function setPaymentToken(string $paymentToken): void
	{
		$this->paymentToken = $paymentToken;
	}
	/**
	 * Getter function for paymentToken
	 * 
	 * @return string
	 */
	public function getPaymentToken(): string
	{
		return $this->paymentToken;
	}

	/**
	 * Builder function for paymentHandleToken
	 * 
	 * @param string $paymentHandleToken
	 * 
	 * @return AchBankAccount
	 */
	public function paymentHandleToken(string $paymentHandleToken): self
	{
		$this->setPaymentHandleToken($paymentHandleToken);
		
		return $this;
	}
	/**
	 * Setter function for paymentHandleToken
	 * 
	 * @param string $paymentHandleToken
	 * 
	 * @return void
	 */
	public function setPaymentHandleToken(string $paymentHandleToken): void
	{
		$this->paymentHandleToken = $paymentHandleToken;
	}
	/**
	 * Getter function for paymentHandleToken
	 * 
	 * @return string
	 */
	public function getPaymentHandleToken(): string
	{
		return $this->paymentHandleToken;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class AchBankAccount {" . PHP_EOL .
			"	id: " . $this->toIndentedString($this->id) . PHP_EOL .
			"	bankName: " . $this->toIndentedString($this->bankName) . PHP_EOL .
			"	registrationId: " . $this->toIndentedString($this->registrationId) . PHP_EOL .
			"	routingNumber: " . $this->toIndentedString($this->routingNumber) . PHP_EOL .
			"	accountNumber: " . $this->toIndentedString($this->accountNumber) . PHP_EOL .
			"	lastDigits: " . $this->toIndentedString($this->lastDigits) . PHP_EOL .
			"	paymentToken: " . $this->toIndentedString($this->paymentToken) . PHP_EOL .
			"	paymentHandleToken: " . $this->toIndentedString($this->paymentHandleToken) . PHP_EOL .
		"}";
	}
}
