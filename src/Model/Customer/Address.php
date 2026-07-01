<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Customer;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * These are the address details associated with the customer
 */
class Address extends BaseModel
{
    /**
     * This is the ID of request, returned in the response.
     */
    private ?string $id = null;
    private ?string $status = null;
    /**
     * This is an alias defined by the customer for this address (e.g., \"home address\").
     */
    private ?string $nickName = null;
    /**
     * This is the first line of the customer's street address. **Note:** This is required only when the address is to be used in association with a bank account.
     */
    private ?string $street = null;
    /**
     * This is the second line of the customer's street address, if required.
     */
    private ?string $street2 = null;
    /**
     * This is the city where the address is located.   **Note:** This is required only when the address is to be used in association with a bank account.
     */
    private ?string $city = null;
    /**
     * This is the state/province/region in which the customer lives. See [Province Codes](https://developer.paysafe.com/en/support/reference-information/codes/#province-codes) or [State Codes](https://developer.paysafe.com/en/support/reference-information/codes/#state-codes) for Canada or the United States. Other countries have no restrictions.
     */
    private ?string $state = null;
    /**
     * This is the country where the address is located. See [Country codes](https://developer.paysafe.com/en/support/reference-information/codes/#country-codes)
     */
    private ?string $country = null;
    /**
     * This is the zip, postal, or post code of the customer's address.
     */
    private ?string $zip = null;
    /**
     * This is the customer's phone number
     */
    private ?string $phone = null;
    /**
     * Flag to mark this address as the default shipping address
     */
    private ?bool $defaultShippingAddressIndicator = null;

    /**
     * Builder function for id
     *
     * @param string $id
     *
     * @return $this
     */
    public function id(?string $id): self
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
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter function for id
     *
     * @return ?string
     */
    public function getId(): ?string
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
    public function status(?string $status): self
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
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Getter function for status
     *
     * @return ?string
     */
    public function getStatus(): ?string
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
     * Builder function for defaultShippingAddressIndicator
     *
     * @param bool $defaultShippingAddressIndicator
     *
     * @return $this
     */
    public function defaultShippingAddressIndicator(?bool $defaultShippingAddressIndicator): self
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
    public function setDefaultShippingAddressIndicator(?bool $defaultShippingAddressIndicator): void
    {
        $this->defaultShippingAddressIndicator = $defaultShippingAddressIndicator;
    }

    /**
     * Getter function for defaultShippingAddressIndicator
     *
     * @return ?bool
     */
    public function getDefaultShippingAddressIndicator(): ?bool
    {
        return $this->defaultShippingAddressIndicator;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Address {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id ?? null) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status ?? null) . PHP_EOL
            . "    nickName: " . $this->toIndentedString($this->nickName ?? null) . PHP_EOL
            . "    street: " . $this->toIndentedString($this->street ?? null) . PHP_EOL
            . "    street2: " . $this->toIndentedString($this->street2 ?? null) . PHP_EOL
            . "    city: " . $this->toIndentedString($this->city ?? null) . PHP_EOL
            . "    state: " . $this->toIndentedString($this->state ?? null) . PHP_EOL
            . "    country: " . $this->toIndentedString($this->country ?? null) . PHP_EOL
            . "    zip: " . $this->toIndentedString($this->zip ?? null) . PHP_EOL
            . "    phone: " . $this->toIndentedString($this->phone ?? null) . PHP_EOL
            . "    defaultShippingAddressIndicator: " . $this->toIndentedString($this->defaultShippingAddressIndicator ?? null) . PHP_EOL
            . "}";
    }
    private ?array $additionalParameters = null;

    /**
     * This map holds additional parameters for features not yet available in this library.
     * Each key-value pair is serialized as a top-level field in the request/response.
     *
     * @return array|null
     */
    public function getAdditionalParameters(): ?array
    {
        return $this->additionalParameters;
    }

    public function setAdditionalParameters(array $additionalParameters): void
    {
        $this->additionalParameters = $additionalParameters;
    }

    public function addAdditionalParameter(string $key, $value): self
    {
        if ($this->additionalParameters === null) {
            $this->additionalParameters = [];
        }
        $this->additionalParameters[$key] = $value;
        return $this;
    }


}
