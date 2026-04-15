<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the details of the paysafecard used for the transaction. 
 */
class Paysafecard extends BaseModel
{

	/**
	 * This is the merchant's unique identifier of the customer. For security purposes,
     * if any personal data is used (for example, customer's user name, email address, etc.),
     * it has to be encrypted or hashed.
	 * Example: merchantclientid
	 */
	private string $consumerId;

	/**
	 * payment can be restricted for a certain minimum consumer age
     * (implicitly restricts payment to registered consumers only)
     * Example: 18
	 */
	private int $minAgeRestriction;


	/**
	 * payment can be restricted for a certain minimum kyc level
     * (implicitly restricts payment to registered consumers only).
     * Possible values are
	 *  - FULL 
	 *  - SIMPLE.
	 * Example: SIMPLE
	 */
	private string $kycLevelRestriction;

	/**
	 * developer.paysafe.com/en/support/reference-information/codes/#country-codes).
	 * Example: DE
	 */
	private string $countryRestriction;

	/**
	 * The Submerchant Id (Reporting Criteria) is used to classify sub-merchants at PaysafeCard side.
	 * Example: 2
	 */
	private string $submerchantId;


	/**
	 * Builder function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return Paysafecard
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
	 * Builder function for minAgeRestriction
	 * 
	 * @param int $minAgeRestriction
	 * 
	 * @return Paysafecard
	 */
	public function minAgeRestriction(int $minAgeRestriction): self
	{
		$this->setMinAgeRestriction($minAgeRestriction);
		
		return $this;
	}
	/**
	 * Setter function for minAgeRestriction
	 * 
	 * @param int $minAgeRestriction
	 * 
	 * @return void
	 */
	public function setMinAgeRestriction(int $minAgeRestriction): void
	{
		$this->minAgeRestriction = $minAgeRestriction;
	}
	/**
	 * Getter function for minAgeRestriction
	 * 
	 * @return int
	 */
	public function getMinAgeRestriction(): int
	{
		return $this->minAgeRestriction;
	}

	/**
	 * Builder function for kycLevelRestriction
	 * 
	 * @param string $kycLevelRestriction
	 * 
	 * @return Paysafecard
	 */
	public function kycLevelRestriction(string $kycLevelRestriction): self
	{
		$this->setKycLevelRestriction($kycLevelRestriction);
		
		return $this;
	}
	/**
	 * Setter function for kycLevelRestriction
	 * 
	 * @param string $kycLevelRestriction
	 * 
	 * @return void
	 */
	public function setKycLevelRestriction(string $kycLevelRestriction): void
	{
		$this->kycLevelRestriction = $kycLevelRestriction;
	}
	/**
	 * Getter function for kycLevelRestriction
	 * 
	 * @return string
	 */
	public function getKycLevelRestriction(): string
	{
		return $this->kycLevelRestriction;
	}

	/**
	 * Builder function for countryRestriction
	 * 
	 * @param string $countryRestriction
	 * 
	 * @return Paysafecard
	 */
	public function countryRestriction(string $countryRestriction): self
	{
		$this->setCountryRestriction($countryRestriction);
		
		return $this;
	}
	/**
	 * Setter function for countryRestriction
	 * 
	 * @param string $countryRestriction
	 * 
	 * @return void
	 */
	public function setCountryRestriction(string $countryRestriction): void
	{
		$this->countryRestriction = $countryRestriction;
	}
	/**
	 * Getter function for countryRestriction
	 * 
	 * @return string
	 */
	public function getCountryRestriction(): string
	{
		return $this->countryRestriction;
	}

	/**
	 * Builder function for submerchantId
	 * 
	 * @param string $submerchantId
	 * 
	 * @return Paysafecard
	 */
	public function submerchantId(string $submerchantId): self
	{
		$this->setSubmerchantId($submerchantId);
		
		return $this;
	}
	/**
	 * Setter function for submerchantId
	 * 
	 * @param string $submerchantId
	 * 
	 * @return void
	 */
	public function setSubmerchantId(string $submerchantId): void
	{
		$this->submerchantId = $submerchantId;
	}
	/**
	 * Getter function for submerchantId
	 * 
	 * @return string
	 */
	public function getSubmerchantId(): string
	{
		return $this->submerchantId;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Paysafecard {" . PHP_EOL .
			"	consumerId: " . $this->toIndentedString($this->consumerId) . PHP_EOL .
			"	minAgeRestriction: " . $this->toIndentedString($this->minAgeRestriction) . PHP_EOL .
			"	kycLevelRestriction: " . $this->toIndentedString($this->kycLevelRestriction) . PHP_EOL .
			"	countryRestriction: " . $this->toIndentedString($this->countryRestriction) . PHP_EOL .
			"	submerchantId: " . $this->toIndentedString($this->submerchantId) . PHP_EOL .
		"}";
	}
}
