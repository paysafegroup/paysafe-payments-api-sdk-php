<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Customer\Address;
use Paysafe\PhpSdk\Model\Customer\Customer;


/**
 * Customer's billing details. You must send billingDetails if AVS (Address verification) is enabled. In 3DS flow, it is recommended to send billingDetails to improve acceptance rate.
 */
class BillingDetails extends BaseModel
{
    /**
     * This is the nickname the merchant has for the billing address.
     */
    private ?string $nickName = null;
    /**
     * This is the first line of the customer's street address.
     */
    private ?string $street = null;
    /**
     * This is the first line of the street address.
     */
    private ?string $street1 = null;
    /**
     * This is the second line of the street address, if required (e.g., apartment number).
     */
    private ?string $street2 = null;
    /**
     * The city of the billing address.
     */
    private ?string $city = null;
    /**
     * The state or province of the billing address. - For Canada see [Province Codes](https://developer.paysafe.com/en/support/reference-information/codes/#province-codes) - For the United States see [State Code](https://developer.paysafe.com/en/support/reference-information/codes/#state-codes)
     */
    private ?string $state = null;
    /**
     * The country of the billing address, in ISO 3166-1 alpha-2 format. See See [Country Codes](https://developer.paysafe.com/en/support/reference-information/codes/#country-codes).
     */
    private ?string $country = null;
    /**
     * The zip or postal code of the billing address
     */
    private ?string $zip = null;
    /**
     * The phone number associated with the billing address
     */
    private ?string $phone = null;

    /**
     * Builder function for nickName
     *
     * @param string $nickName
     *
     * @return $this
     */
    public function nickName(?string $nickName): self
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
    public function setNickName(?string $nickName): void
    {
        $this->nickName = $nickName;
    }

    /**
     * Getter function for nickName
     *
     * @return ?string
     */
    public function getNickName(): ?string
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
     * Builder function for street1
     *
     * @param string $street1
     *
     * @return $this
     */
    public function street1(?string $street1): self
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
    public function setStreet1(?string $street1): void
    {
        $this->street1 = $street1;
    }

    /**
     * Getter function for street1
     *
     * @return ?string
     */
    public function getStreet1(): ?string
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
    public function street2(?string $street2): self
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
    public function setStreet2(?string $street2): void
    {
        $this->street2 = $street2;
    }

    /**
     * Getter function for street2
     *
     * @return ?string
     */
    public function getStreet2(): ?string
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
     * Builder function for phone
     *
     * @param string $phone
     *
     * @return $this
     */
    public function phone(?string $phone): self
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
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * Getter function for phone
     *
     * @return ?string
     */
    public function getPhone(): ?string
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
            . "    nickName: " . $this->toIndentedString($this->nickName ?? null) . PHP_EOL
            . "    street: " . $this->toIndentedString($this->street ?? null) . PHP_EOL
            . "    street1: " . $this->toIndentedString($this->street1 ?? null) . PHP_EOL
            . "    street2: " . $this->toIndentedString($this->street2 ?? null) . PHP_EOL
            . "    city: " . $this->toIndentedString($this->city ?? null) . PHP_EOL
            . "    state: " . $this->toIndentedString($this->state ?? null) . PHP_EOL
            . "    country: " . $this->toIndentedString($this->country ?? null) . PHP_EOL
            . "    zip: " . $this->toIndentedString($this->zip ?? null) . PHP_EOL
            . "    phone: " . $this->toIndentedString($this->phone ?? null) . PHP_EOL
            . "}";
    }
}
