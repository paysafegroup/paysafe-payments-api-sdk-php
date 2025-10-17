<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * The travel agency address
 */
class AgencyAddress extends BaseModel
{

	/**
	 * Address line of the agent selling the ticket.
	 */
	private string $street;

	/**
	 * Postal code of the agent selling the ticket.
	 */
	private string $zip;

	/**
	 * ISO Country code of agent selling the ticket.
	 */
	private string $country;


	/**
	 * Builder function for street
	 * 
	 * @param string $street
	 * 
	 * @return AgencyAddress
	 */
	public function street(string $street): self
	{
		$this->setStreet($street);
		
		return $this;
	}
	/**
	 * Setter function for street
	 * 
	 * @param string $street
	 * 
	 * @return void
	 */
	public function setStreet(string $street): void
	{
		$this->street = $street;
	}
	/**
	 * Getter function for street
	 * 
	 * @return string
	 */
	public function getStreet(): string
	{
		return $this->street;
	}

	/**
	 * Builder function for zip
	 * 
	 * @param string $zip
	 * 
	 * @return AgencyAddress
	 */
	public function zip(string $zip): self
	{
		$this->setZip($zip);
		
		return $this;
	}
	/**
	 * Setter function for zip
	 * 
	 * @param string $zip
	 * 
	 * @return void
	 */
	public function setZip(string $zip): void
	{
		$this->zip = $zip;
	}
	/**
	 * Getter function for zip
	 * 
	 * @return string
	 */
	public function getZip(): string
	{
		return $this->zip;
	}

	/**
	 * Builder function for country
	 * 
	 * @param string $country
	 * 
	 * @return AgencyAddress
	 */
	public function country(string $country): self
	{
		$this->setCountry($country);
		
		return $this;
	}
	/**
	 * Setter function for country
	 * 
	 * @param string $country
	 * 
	 * @return void
	 */
	public function setCountry(string $country): void
	{
		$this->country = $country;
	}
	/**
	 * Getter function for country
	 * 
	 * @return string
	 */
	public function getCountry(): string
	{
		return $this->country;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class AgencyAddress {" . PHP_EOL . 
			"	street: " . $this->toIndentedString($this->street) . PHP_EOL .
			"	zip: " . $this->toIndentedString($this->zip) . PHP_EOL .
			"	country: " . $this->toIndentedString($this->country) . PHP_EOL .
		"}";
	}
}
