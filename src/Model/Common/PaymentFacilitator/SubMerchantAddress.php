<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\PaymentFacilitator;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Contains information for Payment facilitator sub-merchant address.

 **Note** This object is only for Payment facilitator merchants.
 */
class SubMerchantAddress extends BaseModel
{

    /**
     *  This field must contain the street address of the actual merchant. Example: payfac street
     */
    private string $street;

    /**
     *  This field must contain the city of the actual merchant. Example: Toronto
     */
    private string $city;

    /**
     * en.wikipedia.org/wiki/ISO_3166-2).
     * For transactions with American Express cards, the state/province/region is mandatory.
     * Example: ON
     */
    private string $state;


    /**
     * This is the country where the address is located.
     * See [Country Codes](https://developer.paysafe.com/en/support/reference-information/codes/#country-codes).
     * Example: CA
     */
    private string $country;

    /**
     *  This field must contain the postal code of the actual merchant. Example: 1233
     */
    private string $zip;


    /**
     * Builder function for street
     *
     * @param string $street
     *
     * @return SubMerchantAddress
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
     * @return SubMerchantAddress
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
     * @return SubMerchantAddress
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
     * @return SubMerchantAddress
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
     * @return SubMerchantAddress
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
        return "class SubMerchantAddress {" . PHP_EOL .
            "	street: " . $this->toIndentedString($this->street) . PHP_EOL .
            "	city: " . $this->toIndentedString($this->city) . PHP_EOL .
            "	state: " . $this->toIndentedString($this->state) . PHP_EOL .
            "	country: " . $this->toIndentedString($this->country) . PHP_EOL .
            "	zip: " . $this->toIndentedString($this->zip) . PHP_EOL .
            "}";
    }
}
