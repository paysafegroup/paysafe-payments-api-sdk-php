<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

class CardBillingDetailsRequest extends BaseModel
{

	private string $nickName;
	private string $street;
	private string $street2;
	private string $city;
	private string $state;
	private string $country;
	private string $zip;

	/**
	 * Builder function for nickName
	 * 
	 * @param string $nickName
	 * 
	 * @return $this
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
	 * Builder function for street
	 * 
	 * @param string $street
	 * 
	 * @return $this
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
	 * Builder function for street2
	 * 
	 * @param string $street2
	 * 
	 * @return $this
	 */
	public function street2(string $street2): self
	{
		$this->setStreet2($street2);
		
		return $this;
	}

	/**
	 * Setter function for street2
	 * 
	 * @param string $street2
	 * 
	 * @return void
	 */
	public function setStreet2(string $street2): void
	{
		$this->street2 = $street2;
	}

	/**
	 * Getter function for street2
	 * 
	 * @return string
	 */
	public function getStreet2(): string
	{
		return $this->street2;
	}

	/**
	 * Builder function for city
	 * 
	 * @param string $city
	 * 
	 * @return $this
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
	 * @return $this
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
	 * @return $this
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
	 * @return $this
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
		return "class CardBillingDetailsRequest {" . PHP_EOL
			. "    nickName: " . $this->toIndentedString($this->nickName) . PHP_EOL
			. "    street: " . $this->toIndentedString($this->street) . PHP_EOL
			. "    street2: " . $this->toIndentedString($this->street2) . PHP_EOL
			. "    city: " . $this->toIndentedString($this->city) . PHP_EOL
			. "    state: " . $this->toIndentedString($this->state) . PHP_EOL
			. "    country: " . $this->toIndentedString($this->country) . PHP_EOL
			. "    zip: " . $this->toIndentedString($this->zip) . PHP_EOL
			. "}";
	}
}
