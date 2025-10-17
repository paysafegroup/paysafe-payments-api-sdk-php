<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\StandaloneCredit;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This is the sender's address.
 */
class SenderAddress extends BaseModel
{

	/**
	 * Sender's street address.
	 * Example: 100 Queen
	 */
	private string $street;

	/**
	 * Sender's city.
	 * Example: Toronto
	 */
	private string $city;

	/**
	 * Sender's state.
	 * Example: ON
	 */
	private string $state;

	/**
	 * Sender's country.
	 * Example: CA
	 */
	private string $country;

	/**
	 * Sender's postal code.
	 * Example: M5H 2N2
	 */
	private string $zip;


	/**
	 * Builder function for street
	 * 
	 * @param string $street
	 * 
	 * @return SenderAddress
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
	 * Builder function for city
	 * 
	 * @param string $city
	 * 
	 * @return SenderAddress
	 */
	public function city(string $city): self
	{
		$this->setCity($city);
		
		return $this;
	}
	/**
	 * Setter function for city
	 * 
	 * @param string $city
	 * 
	 * @return void
	 */
	public function setCity(string $city): void
	{
		$this->city = $city;
	}
	/**
	 * Getter function for city
	 * 
	 * @return string
	 */
	public function getCity(): string
	{
		return $this->city;
	}

	/**
	 * Builder function for state
	 * 
	 * @param string $state
	 * 
	 * @return SenderAddress
	 */
	public function state(string $state): self
	{
		$this->setState($state);
		
		return $this;
	}
	/**
	 * Setter function for state
	 * 
	 * @param string $state
	 * 
	 * @return void
	 */
	public function setState(string $state): void
	{
		$this->state = $state;
	}
	/**
	 * Getter function for state
	 * 
	 * @return string
	 */
	public function getState(): string
	{
		return $this->state;
	}

	/**
	 * Builder function for country
	 * 
	 * @param string $country
	 * 
	 * @return SenderAddress
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
	 * Builder function for zip
	 * 
	 * @param string $zip
	 * 
	 * @return SenderAddress
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
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class SenderAddress {" . PHP_EOL .
			"	street: " . $this->toIndentedString($this->street) . PHP_EOL .
			"	city: " . $this->toIndentedString($this->city) . PHP_EOL .
			"	state: " . $this->toIndentedString($this->state) . PHP_EOL .
			"	country: " . $this->toIndentedString($this->country) . PHP_EOL .
			"	zip: " . $this->toIndentedString($this->zip) . PHP_EOL .
		"}";
	}
}
