<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\ApplePay;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * The billing contact provided by the user for this transaction in Apple Pay wallet
 */
class ApplePayBillingContact extends BaseModel
{
    /**
     * The street portion of the address for the contact
     */
    private array $addressLines = [];
    /**
     * The state for the contact
     */
    private ?string $administrativeArea = null;
    /**
     * The name of the country or region for the contact
     */
    private ?string $country = null;
    /**
     * The contact's two-letter ISO 3166 country code
     */
    private ?string $countryCode = null;
    /**
     * The contact's family name
     */
    private ?string $familyName = null;
    /**
     * The contact's given name
     */
    private ?string $givenName = null;
    /**
     * The city for the contact
     */
    private ?string $locality = null;
    /**
     * The phonetic spelling of the contact's family name
     */
    private ?string $phoneticFamilyName = null;
    /**
     * The phonetic spelling of the contact's given name
     */
    private ?string $phoneticGivenName = null;
    /**
     * The zip code or postal code, where applicable, for the contact
     */
    private ?string $postalCode = null;
    /**
     * The subadministrative area (such as a county or other region) in a postal address
     */
    private ?string $subAdministrativeArea = null;
    /**
     * Additional information associated with the location, typically defined at the city or town level (such as district or neighborhood), in a postal address
     */
    private ?string $subLocality = null;

    /**
     * Builder function for addressLines
     *
     * @param string[] $addressLines
     *
     * @return $this
     */
    public function addressLines(array $addressLines): self
    {
        $this->setAddressLines($addressLines);

        return $this;
    }

    /**
     * Setter function for addressLines
     *
     * @param string[] $addressLines
     *
     * @return void
     */
    public function setAddressLines(array $addressLines): void
    {
        $this->addressLines = $addressLines;
    }

    /**
     * Getter function for addressLines
     *
     * @return string[]
     */
    public function getAddressLines(): array
    {
        return $this->addressLines ?? [];
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
     * Builder function for familyName
     *
     * @param string $familyName
     *
     * @return $this
     */
    public function familyName(?string $familyName): self
    {
        $this->setFamilyName($familyName);

        return $this;
    }

    /**
     * Setter function for familyName
     *
     * @param string $familyName
     *
     * @return void
     */
    public function setFamilyName(?string $familyName): void
    {
        $this->familyName = $familyName;
    }

    /**
     * Getter function for familyName
     *
     * @return ?string
     */
    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }
    /**
     * Builder function for givenName
     *
     * @param string $givenName
     *
     * @return $this
     */
    public function givenName(?string $givenName): self
    {
        $this->setGivenName($givenName);

        return $this;
    }

    /**
     * Setter function for givenName
     *
     * @param string $givenName
     *
     * @return void
     */
    public function setGivenName(?string $givenName): void
    {
        $this->givenName = $givenName;
    }

    /**
     * Getter function for givenName
     *
     * @return ?string
     */
    public function getGivenName(): ?string
    {
        return $this->givenName;
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
     * Builder function for phoneticFamilyName
     *
     * @param string $phoneticFamilyName
     *
     * @return $this
     */
    public function phoneticFamilyName(?string $phoneticFamilyName): self
    {
        $this->setPhoneticFamilyName($phoneticFamilyName);

        return $this;
    }

    /**
     * Setter function for phoneticFamilyName
     *
     * @param string $phoneticFamilyName
     *
     * @return void
     */
    public function setPhoneticFamilyName(?string $phoneticFamilyName): void
    {
        $this->phoneticFamilyName = $phoneticFamilyName;
    }

    /**
     * Getter function for phoneticFamilyName
     *
     * @return ?string
     */
    public function getPhoneticFamilyName(): ?string
    {
        return $this->phoneticFamilyName;
    }
    /**
     * Builder function for phoneticGivenName
     *
     * @param string $phoneticGivenName
     *
     * @return $this
     */
    public function phoneticGivenName(?string $phoneticGivenName): self
    {
        $this->setPhoneticGivenName($phoneticGivenName);

        return $this;
    }

    /**
     * Setter function for phoneticGivenName
     *
     * @param string $phoneticGivenName
     *
     * @return void
     */
    public function setPhoneticGivenName(?string $phoneticGivenName): void
    {
        $this->phoneticGivenName = $phoneticGivenName;
    }

    /**
     * Getter function for phoneticGivenName
     *
     * @return ?string
     */
    public function getPhoneticGivenName(): ?string
    {
        return $this->phoneticGivenName;
    }
    /**
     * Builder function for postalCode
     *
     * @param string $postalCode
     *
     * @return $this
     */
    public function postalCode(?string $postalCode): self
    {
        $this->setPostalCode($postalCode);

        return $this;
    }

    /**
     * Setter function for postalCode
     *
     * @param string $postalCode
     *
     * @return void
     */
    public function setPostalCode(?string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * Getter function for postalCode
     *
     * @return ?string
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }
    /**
     * Builder function for subAdministrativeArea
     *
     * @param string $subAdministrativeArea
     *
     * @return $this
     */
    public function subAdministrativeArea(?string $subAdministrativeArea): self
    {
        $this->setSubAdministrativeArea($subAdministrativeArea);

        return $this;
    }

    /**
     * Setter function for subAdministrativeArea
     *
     * @param string $subAdministrativeArea
     *
     * @return void
     */
    public function setSubAdministrativeArea(?string $subAdministrativeArea): void
    {
        $this->subAdministrativeArea = $subAdministrativeArea;
    }

    /**
     * Getter function for subAdministrativeArea
     *
     * @return ?string
     */
    public function getSubAdministrativeArea(): ?string
    {
        return $this->subAdministrativeArea;
    }
    /**
     * Builder function for subLocality
     *
     * @param string $subLocality
     *
     * @return $this
     */
    public function subLocality(?string $subLocality): self
    {
        $this->setSubLocality($subLocality);

        return $this;
    }

    /**
     * Setter function for subLocality
     *
     * @param string $subLocality
     *
     * @return void
     */
    public function setSubLocality(?string $subLocality): void
    {
        $this->subLocality = $subLocality;
    }

    /**
     * Getter function for subLocality
     *
     * @return ?string
     */
    public function getSubLocality(): ?string
    {
        return $this->subLocality;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class ApplePayBillingContact {" . PHP_EOL
            . "    addressLines: " . $this->toIndentedString($this->addressLines ?? null) . PHP_EOL
            . "    administrativeArea: " . $this->toIndentedString($this->administrativeArea ?? null) . PHP_EOL
            . "    country: " . $this->toIndentedString($this->country ?? null) . PHP_EOL
            . "    countryCode: " . $this->toIndentedString($this->countryCode ?? null) . PHP_EOL
            . "    familyName: " . $this->toIndentedString($this->familyName ?? null) . PHP_EOL
            . "    givenName: " . $this->toIndentedString($this->givenName ?? null) . PHP_EOL
            . "    locality: " . $this->toIndentedString($this->locality ?? null) . PHP_EOL
            . "    phoneticFamilyName: " . $this->toIndentedString($this->phoneticFamilyName ?? null) . PHP_EOL
            . "    phoneticGivenName: " . $this->toIndentedString($this->phoneticGivenName ?? null) . PHP_EOL
            . "    postalCode: " . $this->toIndentedString($this->postalCode ?? null) . PHP_EOL
            . "    subAdministrativeArea: " . $this->toIndentedString($this->subAdministrativeArea ?? null) . PHP_EOL
            . "    subLocality: " . $this->toIndentedString($this->subLocality ?? null) . PHP_EOL
            . "}";
    }
}
