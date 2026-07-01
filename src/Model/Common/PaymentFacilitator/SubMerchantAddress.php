<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\PaymentFacilitator;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Payment\Payment;


/**
 * Contains information for Payment facilitator sub-merchant address.
 */
class SubMerchantAddress extends BaseModel
{
    /**
     * Field contains the street address of the actual merchant
     */
    private ?string $street = null;
    /**
     * Field contains the city of the actual merchant
     */
    private ?string $city = null;
    /**
     * See [Province Codes](https://developer.paysafe.com/en/support/reference-information/codes/#province-codes) or [State Codes](https://developer.paysafe.com/en/support/reference-information/codes/#state-codes) for Canada or the United States. For other countries, see [ISO 3166-2](https://en.wikipedia.org/wiki/ISO_3166-2). For transactions with American Express cards, the state/province/region is mandatory.
     */
    private ?string $state = null;
    /**
     * This is the country where the address is located. See [Country Codes](https://developer.paysafe.com/en/support/reference-information/codes/#country-codes).
     */
    private ?string $country = null;
    /**
     * Field containing the postal code of the actual merchant
     */
    private ?string $zip = null;

    /**
     * Builder function for street
     *
     * @param string $street
     *
     * @return $this
     */
    public function street(?string $street): self
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
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * Getter function for street
     *
     * @return ?string
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }
    /**
     * Builder function for city
     *
     * @param string $city
     *
     * @return $this
     */
    public function city(?string $city): self
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
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * Getter function for city
     *
     * @return ?string
     */
    public function getCity(): ?string
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
    public function state(?string $state): self
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
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * Getter function for state
     *
     * @return ?string
     */
    public function getState(): ?string
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
    public function country(?string $country): self
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
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * Getter function for country
     *
     * @return ?string
     */
    public function getCountry(): ?string
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
    public function zip(?string $zip): self
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
    public function setZip(?string $zip): void
    {
        $this->zip = $zip;
    }

    /**
     * Getter function for zip
     *
     * @return ?string
     */
    public function getZip(): ?string
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
        return "class SubMerchantAddress {" . PHP_EOL
            . "    street: " . $this->toIndentedString($this->street ?? null) . PHP_EOL
            . "    city: " . $this->toIndentedString($this->city ?? null) . PHP_EOL
            . "    state: " . $this->toIndentedString($this->state ?? null) . PHP_EOL
            . "    country: " . $this->toIndentedString($this->country ?? null) . PHP_EOL
            . "    zip: " . $this->toIndentedString($this->zip ?? null) . PHP_EOL
            . "}";
    }
}
