<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the details of the Play+ (Sightline) used for the transaction.
 */
class Sightline extends BaseModel
{
	/**
	 * This is the Loyalty Membership Number unique to the customer to be enrolled with Play+ (Sightline).
     * This is to be provided by the merchant.
	 * 
	 * _Mandatory_
	 * Example: 12312313
	 */
	private string $consumerId;

	/**
	 * This the customer's Social Security Number.
	 * Example: 123456789
	 */
	private string $ssn;

	/**
	 * This the customer’s last 4 digits of Social Security Number.
	 */
	private string $last4ssn;

	/**
	 * This the customer’s last 4 digits of Social Security Number.
	 */
	private string $lastDigits;


	/**
	 * Builder function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return Sightline
	 */
	public function consumerId(string $consumerId): self
	{
		$this->setConsumerId($consumerId);
		
		return $this;
	}
	/**
	 * Setter function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return void
	 */
	public function setConsumerId(string $consumerId): void
	{
		$this->consumerId = $consumerId;
	}
	/**
	 * Getter function for consumerId
	 * 
	 * @return string
	 */
	public function getConsumerId(): string
	{
		return $this->consumerId;
	}

	/**
	 * Builder function for ssn
	 * 
	 * @param string $ssn
	 * 
	 * @return Sightline
	 */
	public function ssn(string $ssn): self
	{
		$this->setSsn($ssn);
		
		return $this;
	}
	/**
	 * Setter function for ssn
	 * 
	 * @param string $ssn
	 * 
	 * @return void
	 */
	public function setSsn(string $ssn): void
	{
		$this->ssn = $ssn;
	}
	/**
	 * Getter function for ssn
	 * 
	 * @return string
	 */
	public function getSsn(): string
	{
		return $this->ssn;
	}

	/**
	 * Builder function for last4ssn
	 * 
	 * @param string $last4ssn
	 * 
	 * @return Sightline
	 */
	public function last4ssn(string $last4ssn): self
	{
		$this->setLast4ssn($last4ssn);
		
		return $this;
	}
	/**
	 * Setter function for last4ssn
	 * 
	 * @param string $last4ssn
	 * 
	 * @return void
	 */
	public function setLast4ssn(string $last4ssn): void
	{
		$this->last4ssn = $last4ssn;
	}
	/**
	 * Getter function for last4ssn
	 * 
	 * @return string
	 */
	public function getLast4ssn(): string
	{
		return $this->last4ssn;
	}

	/**
	 * Builder function for lastDigits
	 * 
	 * @param string $lastDigits
	 * 
	 * @return Sightline
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
		return "class Sightline {" . PHP_EOL . 
			"	consumerId: " . $this->toIndentedString($this->consumerId) . PHP_EOL .
			"	ssn: " . $this->toIndentedString($this->ssn) . PHP_EOL .
			"	last4ssn: " . $this->toIndentedString($this->last4ssn) . PHP_EOL .
			"	lastDigits: " . $this->toIndentedString($this->lastDigits) . PHP_EOL .
		"}";
	}
}
