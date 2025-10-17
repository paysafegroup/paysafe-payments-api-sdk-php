<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Customer's billing details. Required if AVS (Address verification) is enabled.
 * If included in the request, this will serve as the billing address for transaction processing.
 * Any billing details returned in Apple Pay Token by Apple Pay will be ignored.
 * 3DS Flow: It is recommended to send billingDetails to improve acceptance rate.
 * <ul>
 *   <li>
 *     <b>id:</b> This is the ID of the billing address, returned in the response.
 *   </li>
 *   <li>
 *     <b>city:</b> This is the city where the address is located. <br />
 *     Example: Toronto
 *   </li>
 *   <li>
 *     <b>country:</b> This is the country where the address is located. See
 *     <a href="https://developer.paysafe.com/en/support/reference-information/codes/#country-codes">
 *         Country Codes
 *      </a><br />
 *     Example: CA
 *   </li>
 *   <li>
 *     <b>nickName:</b> This is the nickname the merchant has for the billing address. <br />
 *     Example: Home
 *   </li>
 *   <li>
 *     <b>state:</b> This is the state/province/region in which the customer lives. <br />
 *     - For Canada see
 *      <a href="https://developer.paysafe.com/en/support/reference-information/codes/#province-codes">
 *         Province Codes
 *      </a>
 *     <br />
 *     - For United States see
 *          <a href="https://developer.paysafe.com/en/support/reference-information/codes/#state-codes">
 *          State Codes
 *          </a>
 *     <br />
 *     - Other countries have no restrictions. <br />
 *     - For 3DS flow: If billingDetails is provided and country is US or CA, then state is mandatory. <br />
 *     Example: ON
 *   </li>
 *   <li>
 *     <b>street:</b> This is the first line of the customer's street address. <br />
 *     Example: Street
 *   </li>
 *   <li>
 *     <b>street1:</b> This is the first line of the street address. <br />
 *     <b>Note:<b> Mandatory for VIPPreferred <br />
 *     Example: street1
 *   </li>
 *   <li>
 *     <b>street2:</b> This is the second line of the street address, if required (e.g., apartment number). <br />
 *     Example: street2
 *   </li>
 *   <li>
 *     <b>zip:</b> This is the zip, postal, or post code of the customer's address. <br />
 *     Example: M5H 2N2
 *   </li>
 *   <li>
 *     <b>phone:</b> This is the customer's telephone number. <br />
 *     Example: 8765846321
 *   </li>
 *   <li>
 *     <b>error:</b> This contains error details. <br />
 *   </li>
 * </ul>
 */
class BillingDetails extends BaseModel
{

	private string $nickName;
	private string $street;
	private string $street1;
	private string $street2;
	private string $city;
	private string $state;
	private string $country;
	private string $zip;
	private string $phone;

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
	 * This is the nickname the merchant has for the  billing address.
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
	 * This is the line of the customer's street address.<br />
	 * If both street and street1 are sent then street1 is ignored.
	 * 
	 * @return string
	 */
	public function getStreet(): string
	{
		return $this->street;
	}

	/**
	 * Builder function for street1
	 * 
	 * @param string $street1
	 * 
	 * @return $this
	 */
	public function street1(string $street1): self
	{
		$this->setStreet1($street1);
		
		return $this;
	}

	/**
	 * Setter function for street1
	 * 
	 * @param string $street1
	 * 
	 * @return void
	 */
	public function setStreet1(string $street1): void
	{
		$this->street1 = $street1;
	}

	/**
	 * This is the first line of the customer's street address.<br />
	 * If both street and street1 are sent then street1 is ignored.
	 * 
	 * @return string
	 */
	public function getStreet1(): string
	{
		return $this->street1;
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
	 * This is the second line of the street address, if required (e.g., apartment number).
	 * If more than 15 characters are sent then address will be truncated to first 15 characters.
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
	 * This is the city where the address is located.
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
	 * This is the state/province/region in which the  customer lives.
	 * In 3DS flow, it is mandatory if country is US or CA.
	 * For Canada see
     *  (<a href="https://developer.paysafe.com/en/support/reference-information/codes/#province-codes">
     *      Province Codes.
     *  </a>)<br />
	 * For the United States see
     *  <a href="https://developer.paysafe.com/en/support/reference-information/codes/#state-codes">
     *      State Codes.
     *  </a><br />
	 * <br />
	 * In cases when it is not mandatory, it is recommended to send billingDetails to improve acceptance rate.
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
	 * SKRILL - Dummy value can be sent in request as this is not passed to Skrill.
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
	 * This is the zip, postal, or post code of the customer's address.
	 * 
	 * @return string
	 */
	public function getZip(): string
	{
		return $this->zip;
	}

	/**
	 * Builder function for phone
	 * 
	 * @param string $phone
	 * 
	 * @return $this
	 */
	public function phone(string $phone): self
	{
		$this->setPhone($phone);
		
		return $this;
	}

	/**
	 * Setter function for phone
	 * 
	 * @param string $phone
	 * 
	 * @return void
	 */
	public function setPhone(string $phone): void
	{
		$this->phone = $phone;
	}

	/**
	 * This is the customer's telephone number.
	 * 
	 * @return string
	 */
	public function getPhone(): string
	{
		return $this->phone;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class BillingDetails {" . PHP_EOL
			. "    nickName: " . $this->toIndentedString($this->nickName) . PHP_EOL
			. "    street: " . $this->toIndentedString($this->street) . PHP_EOL
			. "    street1: " . $this->toIndentedString($this->street1) . PHP_EOL
			. "    street2: " . $this->toIndentedString($this->street2) . PHP_EOL
			. "    city: " . $this->toIndentedString($this->city) . PHP_EOL
			. "    state: " . $this->toIndentedString($this->state) . PHP_EOL
			. "    country: " . $this->toIndentedString($this->country) . PHP_EOL
			. "    zip: " . $this->toIndentedString($this->zip) . PHP_EOL
			. "    phone: " . $this->toIndentedString($this->phone) . PHP_EOL
			. "}";
	}
}
