<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Details about shipping
 * <ul>
 *   <li>
 *     <b>shipMethod:</b> This is the method of shipment. <br />
 *     <i>Allowed values: N, T, C, O, S</i>
 *   </li>
 *   <li>
 *     <b>street:</b> This is the recipient's street address. <br />
 *     Example: 20735 Stevens Creek Blvd
 *   </li>
 *   <li>
 *     <b>street2:</b> This is the second line of the street address in the shipping address,
 *      if required (e.g., apartment number). <br />
 *     Example: Montessori
 *   </li>
 *   <li>
 *     <b>city:</b> This is the city in which the recipient resides. <br />
 *     Example: Cupertino
 *   </li>
 *   <li>
 *     <b>state:</b> This is the state/province/region in which the recipient lives. <br />
 *     - For Canada see
 *      <a href="https://developer.paysafe.com/en/support/reference-information/codes/#province-codes">
 *          Province Codes;
 *      </a>
 *     <br />
 *     - For the United States see
 *      <a href="https://developer.paysafe.com/en/support/reference-information/codes/#state-codes">
 *          State Codes;
 *      </a>
 *     <br />
 *     - Other countries have no restrictions. <br />
 *     Example: ON
 *   </li>
 *   <li>
 *     <b>countries:</b> This is the country where the address is located. <br />
 *     See
 *      <a href="https://developer.paysafe.com/en/support/reference-information/codes/#country-codes">
 *          Country Codes.
 *      </a> <br />
 *     Example: CA
 *   </li>
 *   <li>
 *     <b>zip:</b> This is the recipient's postal/zip code. <br />
 *     Example: 95014
 *   </li>
 * </ul>
 */
class ShippingDetails extends BaseModel
{

	private string $shipMethod;
	private string $street;
	private string $street2;
	private string $city;
	private string $state;
	private string $country;
	private string $zip;

	/**
	 * Builder function for shipMethod
	 * 
	 * @param string $shipMethod
	 * 
	 * @return $this
	 */
	public function shipMethod(string $shipMethod): self
	{
		$this->setShipMethod($shipMethod);
		
		return $this;
	}

	/**
	 * Setter function for shipMethod
	 * 
	 * @param string $shipMethod
	 * 
	 * @return void
	 */
	public function setShipMethod(string $shipMethod): void
	{
		$this->shipMethod = $shipMethod;
	}

	/**
	 * This is the method of shipment.
     * Possible values are:
     * - N – Next Day/Overnight
     * - T – Two-Day Service
     * - C – Lowest Cost
     * - O – Other
     * - S – Same Day
	 * 
	 * @return string
	 */
	public function getShipMethod(): string
	{
		return $this->shipMethod;
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
	 * This is the recipient's street address.
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
	 * This is the second line of the street address in the shipping address,
     * if required (e.g., apartment number).
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
	 * This is the city in which the recipient resides.
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
	 * This is the state/province/region in which the recipient lives.
	 * For Canada see (
     *  <a href="https://developer.paysafe.com/en/support/reference-information/codes/#province-codes">
     *      Province Codes.
     * </a>)<br />
	 * For the United States see
     *  <a href="https://developer.paysafe.com/en/support/reference-information/codes/#state-codes">
     *      State Codes.
     *  </a><br />
	 * Other countries have no restrictions.
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
	 * This is the country where the address is located.
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
	 * This is the recipient's postal/zip code.
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
		return "class ShippingDetails {" . PHP_EOL
			. "    shipMethod: " . $this->toIndentedString($this->shipMethod) . PHP_EOL
			. "    street: " . $this->toIndentedString($this->street) . PHP_EOL
			. "    street2: " . $this->toIndentedString($this->street2) . PHP_EOL
			. "    city: " . $this->toIndentedString($this->city) . PHP_EOL
			. "    state: " . $this->toIndentedString($this->state) . PHP_EOL
			. "    country: " . $this->toIndentedString($this->country) . PHP_EOL
			. "    zip: " . $this->toIndentedString($this->zip) . PHP_EOL
			. "}";
	}
}
