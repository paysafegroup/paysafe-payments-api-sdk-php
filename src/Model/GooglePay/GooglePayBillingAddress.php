<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\GooglePay;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Billing address for Google Pay
 */
class GooglePayBillingAddress extends BaseModel
{
    /**
     * The address1 of the contact
     */
    private ?string $address1 = null;
    /**
     * The address2 of the contact
     */
    private ?string $address2 = null;
    /**
     * The address3 of the contact
     */
    private ?string $address3 = null;
    /**
     * The state for the contact
     */
    private ?string $administrativeArea = null;
    /**
     * The contact's two-letter ISO 3166 country code
     */
    private ?string $countryCode = null;
    /**
     * The city for the contact
     */
    private ?string $locality = null;
    /**
     * The contact's name
     */
    private ?string $name = null;
    /**
     * The zip code or postal code, where applicable, for the contact
     */
    private ?int $postalCode = null;
    /**
     * Sorting code
     */
    private ?int $sortingCode = null;

    /**
     * Builder function for address1
     *
     * @param string $address1
     *
     * @return $this
     */
    public function address1(?string $address1): self
    {
        $this->setAddress1($address1);

        return $this;
    }

    /**
     * Setter function for address1
     *
     * @param string $address1
     *
     * @return void
     */
    public function setAddress1(?string $address1): void
    {
        $this->address1 = $address1;
    }

    /**
     * Getter function for address1
     *
     * @return ?string
     */
    public function getAddress1(): ?string
    {
        return $this->address1;
    }
    /**
     * Builder function for address2
     *
     * @param string $address2
     *
     * @return $this
     */
    public function address2(?string $address2): self
    {
        $this->setAddress2($address2);

        return $this;
    }

    /**
     * Setter function for address2
     *
     * @param string $address2
     *
     * @return void
     */
    public function setAddress2(?string $address2): void
    {
        $this->address2 = $address2;
    }

    /**
     * Getter function for address2
     *
     * @return ?string
     */
    public function getAddress2(): ?string
    {
        return $this->address2;
    }
    /**
     * Builder function for address3
     *
     * @param string $address3
     *
     * @return $this
     */
    public function address3(?string $address3): self
    {
        $this->setAddress3($address3);

        return $this;
    }

    /**
     * Setter function for address3
     *
     * @param string $address3
     *
     * @return void
     */
    public function setAddress3(?string $address3): void
    {
        $this->address3 = $address3;
    }

    /**
     * Getter function for address3
     *
     * @return ?string
     */
    public function getAddress3(): ?string
    {
        return $this->address3;
    }
    /**
     * Builder function for administrativeArea
     *
     * @param string $administrativeArea
     *
     * @return $this
     */
    public function administrativeArea(?string $administrativeArea): self
    {
        $this->setAdministrativeArea($administrativeArea);

        return $this;
    }

    /**
     * Setter function for administrativeArea
     *
     * @param string $administrativeArea
     *
     * @return void
     */
    public function setAdministrativeArea(?string $administrativeArea): void
    {
        $this->administrativeArea = $administrativeArea;
    }

    /**
     * Getter function for administrativeArea
     *
     * @return ?string
     */
    public function getAdministrativeArea(): ?string
    {
        return $this->administrativeArea;
    }
    /**
     * Builder function for countryCode
     *
     * @param string $countryCode
     *
     * @return $this
     */
    public function countryCode(?string $countryCode): self
    {
        $this->setCountryCode($countryCode);

        return $this;
    }

    /**
     * Setter function for countryCode
     *
     * @param string $countryCode
     *
     * @return void
     */
    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * Getter function for countryCode
     *
     * @return ?string
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * Builder function for locality
     *
     * @param string $locality
     *
     * @return $this
     */
    public function locality(?string $locality): self
    {
        $this->setLocality($locality);

        return $this;
    }

    /**
     * Setter function for locality
     *
     * @param string $locality
     *
     * @return void
     */
    public function setLocality(?string $locality): void
    {
        $this->locality = $locality;
    }

    /**
     * Getter function for locality
     *
     * @return ?string
     */
    public function getLocality(): ?string
    {
        return $this->locality;
    }
    /**
     * Builder function for name
     *
     * @param string $name
     *
     * @return $this
     */
    public function name(?string $name): self
    {
        $this->setName($name);

        return $this;
    }

    /**
     * Setter function for name
     *
     * @param string $name
     *
     * @return void
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Getter function for name
     *
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Builder function for postalCode
     *
     * @param int $postalCode
     *
     * @return $this
     */
    public function postalCode(?int $postalCode): self
    {
        $this->setPostalCode($postalCode);

        return $this;
    }

    /**
     * Setter function for postalCode
     *
     * @param int $postalCode
     *
     * @return void
     */
    public function setPostalCode(?int $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * Getter function for postalCode
     *
     * @return ?int
     */
    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }
    /**
     * Builder function for sortingCode
     *
     * @param int $sortingCode
     *
     * @return $this
     */
    public function sortingCode(?int $sortingCode): self
    {
        $this->setSortingCode($sortingCode);

        return $this;
    }

    /**
     * Setter function for sortingCode
     *
     * @param int $sortingCode
     *
     * @return void
     */
    public function setSortingCode(?int $sortingCode): void
    {
        $this->sortingCode = $sortingCode;
    }

    /**
     * Getter function for sortingCode
     *
     * @return ?int
     */
    public function getSortingCode(): ?int
    {
        return $this->sortingCode;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class GooglePayBillingAddress {" . PHP_EOL
            . "    address1: " . $this->toIndentedString($this->address1 ?? null) . PHP_EOL
            . "    address2: " . $this->toIndentedString($this->address2 ?? null) . PHP_EOL
            . "    address3: " . $this->toIndentedString($this->address3 ?? null) . PHP_EOL
            . "    administrativeArea: " . $this->toIndentedString($this->administrativeArea ?? null) . PHP_EOL
            . "    countryCode: " . $this->toIndentedString($this->countryCode ?? null) . PHP_EOL
            . "    locality: " . $this->toIndentedString($this->locality ?? null) . PHP_EOL
            . "    name: " . $this->toIndentedString($this->name ?? null) . PHP_EOL
            . "    postalCode: " . $this->toIndentedString($this->postalCode ?? null) . PHP_EOL
            . "    sortingCode: " . $this->toIndentedString($this->sortingCode ?? null) . PHP_EOL
            . "}";
    }
}
