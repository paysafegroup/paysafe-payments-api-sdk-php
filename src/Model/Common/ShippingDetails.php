<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Shipping details for the transaction
 */
class ShippingDetails extends BaseModel
{
    private ?string $shipMethod = null;
    /**
     * Name of the recipient
     */
    private ?string $recipientName = null;
    /**
     * Street address
     */
    private ?string $street = null;
    /**
     * Additional street address information
     */
    private ?string $street2 = null;
    /**
     * City
     */
    private ?string $city = null;
    /**
     * State or province
     */
    private ?string $state = null;
    /**
     * Two-letter ISO country code
     */
    private ?string $country = null;
    /**
     * Postal code
     */
    private ?string $zip = null;
    /**
     * Phone number
     */
    private ?string $phone = null;

    /**
     * Builder function for shipMethod
     *
     * @param string $shipMethod
     *
     * @return $this
     */
    public function shipMethod(?string $shipMethod): self
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
    public function setShipMethod(?string $shipMethod): void
    {
        $this->shipMethod = $shipMethod;
    }

    /**
     * Getter function for shipMethod
     *
     * @return ?string
     */
    public function getShipMethod(): ?string
    {
        return $this->shipMethod;
    }
    /**
     * Builder function for recipientName
     *
     * @param string $recipientName
     *
     * @return $this
     */
    public function recipientName(?string $recipientName): self
    {
        $this->setRecipientName($recipientName);

        return $this;
    }

    /**
     * Setter function for recipientName
     *
     * @param string $recipientName
     *
     * @return void
     */
    public function setRecipientName(?string $recipientName): void
    {
        $this->recipientName = $recipientName;
    }

    /**
     * Getter function for recipientName
     *
     * @return ?string
     */
    public function getRecipientName(): ?string
    {
        return $this->recipientName;
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
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class ShippingDetails {" . PHP_EOL
            . "    shipMethod: " . $this->toIndentedString($this->shipMethod ?? null) . PHP_EOL
            . "    recipientName: " . $this->toIndentedString($this->recipientName ?? null) . PHP_EOL
            . "    street: " . $this->toIndentedString($this->street ?? null) . PHP_EOL
            . "    street2: " . $this->toIndentedString($this->street2 ?? null) . PHP_EOL
            . "    city: " . $this->toIndentedString($this->city ?? null) . PHP_EOL
            . "    state: " . $this->toIndentedString($this->state ?? null) . PHP_EOL
            . "    country: " . $this->toIndentedString($this->country ?? null) . PHP_EOL
            . "    zip: " . $this->toIndentedString($this->zip ?? null) . PHP_EOL
            . "    phone: " . $this->toIndentedString($this->phone ?? null) . PHP_EOL
            . "}";
    }
}
