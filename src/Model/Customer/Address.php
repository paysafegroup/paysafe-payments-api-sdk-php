<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Customer;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the address details associated with the customer.
 */
class Address extends BaseModel
{

	private string $id;
	private string $status;
	private string $nickName;
	private string $street;
	private string $street2;
	private string $city;
	private string $state;
	private string $country;
	private string $zip;
	private string $phone;
	private bool $defaultShippingAddressIndicator;
	private array $additionalParameters;

	/**
	 * Builder function for id
	 * 
	 * @param string $id
	 * 
	 * @return $this
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
	 * This is the ID of request, returned in the response.
	 * 
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * Builder function for status
	 * 
	 * @param string $status
	 * 
	 * @return $this
	 */
	public function status(string $status): self
	{
		$this->setStatus($status);
		
		return $this;
	}

	/**
	 * Setter function for status
	 * 
	 * @param string $status
	 * 
	 * @return void
	 */
	public function setStatus(string $status): void
	{
		$this->status = $status;
	}

	/**
	 * This is the status of the address.
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

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
	 * This is an alias defined by the customer for this address (e.g., \"home address\").
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
	 * This is the first line of the customer''s street address.
	 * <b>Note:<b> This is required only when the address is to be used in association with a bank account.
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
	 * This is the second line of the customer's street address, if required.
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
     * <b>Note:<b> This is required only when the address is to be used in association with a bank account.
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
	 * This is the state/province/region in which the customer lives.
	 * See
     * <a href="https://developer.paysafe.com/en/support/reference-information/codes/#province-codes">
     *      Province Codes
     * </a>
	 * or
     * <a href="https://developer.paysafe.com/en/support/reference-information/codes/#state-codes">
     *     State Codes
     * </a>
     * for Canada or the United States.
	 * <br />
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
	 * This is the customer's phone number.
	 * 
	 * @return string
	 */
	public function getPhone(): string
	{
		return $this->phone;
	}

	/**
	 * Builder function for defaultShippingAddressIndicator
	 * 
	 * @param bool $defaultShippingAddressIndicator
	 * 
	 * @return $this
	 */
	public function defaultShippingAddressIndicator(bool $defaultShippingAddressIndicator): self
	{
		$this->setDefaultShippingAddressIndicator($defaultShippingAddressIndicator);
		
		return $this;
	}

	/**
	 * Setter function for defaultShippingAddressIndicator
	 * 
	 * @param bool $defaultShippingAddressIndicator
	 * 
	 * @return void
	 */
	public function setDefaultShippingAddressIndicator(bool $defaultShippingAddressIndicator): void
	{
		$this->defaultShippingAddressIndicator = $defaultShippingAddressIndicator;
	}

	/**
	 * Flag to mark this address as the default shipping address.
	 * 
	 * @return bool
	 */
	public function getDefaultShippingAddressIndicator(): bool
	{
		return $this->defaultShippingAddressIndicator;
	}

	/**
	 * Builder function for additionalParameters
	 * 
	 * @param array $additionalParameters
	 * 
	 * @return $this
	 */
	public function additionalParameters(array $additionalParameters): self
	{
		$this->setAdditionalParameters($additionalParameters);
		
		return $this;
	}

	/**
	 * Setter function for additionalParameters
	 * 
	 * @param array $additionalParameters
	 * 
	 * @return void
	 */
	public function setAdditionalParameters(array $additionalParameters): void
	{
		$this->additionalParameters = $additionalParameters;
	}

	/**
	 * Getter function for additionalParameters
	 * 
	 * @return array
	 */
	public function getAdditionalParameters(): array
	{
		return $this->additionalParameters;
	}

    /**
     * Add a new additional parameter
     *
     * @param string $key
     * @param object $value
     *
     * @return $this
     */
    public function addAdditionalParameter(string $key, object $value): self
    {
        if ($this->additionalParameters === null) {
            $this->additionalParameters = [];
        }

        $this->additionalParameters[$key] = $value;

        return $this;
    }

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Address {" . PHP_EOL
			. "    id: " . $this->toIndentedString($this->id) . PHP_EOL
			. "    status: " . $this->toIndentedString($this->status) . PHP_EOL
			. "    nickName: " . $this->toIndentedString($this->nickName) . PHP_EOL
			. "    street: " . $this->toIndentedString($this->street) . PHP_EOL
			. "    street2: " . $this->toIndentedString($this->street2) . PHP_EOL
			. "    city: " . $this->toIndentedString($this->city) . PHP_EOL
			. "    state: " . $this->toIndentedString($this->state) . PHP_EOL
			. "    country: " . $this->toIndentedString($this->country) . PHP_EOL
			. "    zip: " . $this->toIndentedString($this->zip) . PHP_EOL
			. "    phone: " . $this->toIndentedString($this->phone) . PHP_EOL
			. "    defaultShippingAddressIndicator: "
            . $this->toIndentedString($this->defaultShippingAddressIndicator) . PHP_EOL
			. "    additionalParameters: " . $this->toIndentedString($this->additionalParameters) . PHP_EOL
			. "}";
	}
}
