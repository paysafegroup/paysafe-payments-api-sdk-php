<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\StandaloneCredit;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * [The Sender](/schemas/sender) is deemed to be the person or party who has
 * the contractual relationship with the the end customer.

**Notes:**

- In case of Visa Direct with use cases Account to Account, Wallet transfer or Funds Transfer,
 * the sender name should be the same as the recipient name.
 */
class Sender extends BaseModel
{

	/**
	 * Sender's first name.
	 * Example: John
	 */
	private string $firstName;

	/**
	 * Sender's last name.
	 * Example: Smith
	 */
	private string $lastName;

	/**
	 * This is the sender''s account number,
	 */
	private string $accountNumber;

    // e.g., a loan agreement number or customer ID.
    // Example: ABC1234567890
	/**
	 * This is the sender's address.
	 */
	private SenderAddress $address;


	/**
	 * Builder function for firstName
	 * 
	 * @param string $firstName
	 * 
	 * @return Sender
	 */
	public function firstName(string $firstName): self
	{
		$this->setFirstName($firstName);
		
		return $this;
	}
	/**
	 * Setter function for firstName
	 * 
	 * @param string $firstName
	 * 
	 * @return void
	 */
	public function setFirstName(string $firstName): void
	{
		$this->firstName = $firstName;
	}
	/**
	 * Getter function for firstName
	 * 
	 * @return string
	 */
	public function getFirstName(): string
	{
		return $this->firstName;
	}

	/**
	 * Builder function for lastName
	 * 
	 * @param string $lastName
	 * 
	 * @return Sender
	 */
	public function lastName(string $lastName): self
	{
		$this->setLastName($lastName);
		
		return $this;
	}
	/**
	 * Setter function for lastName
	 * 
	 * @param string $lastName
	 * 
	 * @return void
	 */
	public function setLastName(string $lastName): void
	{
		$this->lastName = $lastName;
	}
	/**
	 * Getter function for lastName
	 * 
	 * @return string
	 */
	public function getLastName(): string
	{
		return $this->lastName;
	}

	/**
	 * Builder function for accountNumber
	 * 
	 * @param string $accountNumber
	 * 
	 * @return Sender
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
	 * Builder function for address
	 * 
	 * @param SenderAddress $address
	 * 
	 * @return Sender
	 */
	public function address(SenderAddress $address): self
	{
		$this->setAddress($address);
		
		return $this;
	}
	/**
	 * Setter function for address
	 * 
	 * @param SenderAddress $address
	 * 
	 * @return void
	 */
	public function setAddress(SenderAddress $address): void
	{
		$this->address = $address;
	}
	/**
	 * Getter function for address
	 * 
	 * @return SenderAddress
	 */
	public function getAddress(): SenderAddress
	{
		return $this->address;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Sender {" . PHP_EOL . 
			"	firstName: " . $this->toIndentedString($this->firstName) . PHP_EOL .
			"	lastName: " . $this->toIndentedString($this->lastName) . PHP_EOL .
			"	accountNumber: " . $this->toIndentedString($this->accountNumber) . PHP_EOL .
			"	address: " . $this->toIndentedString($this->address) . PHP_EOL .
		"}";
	}
}
