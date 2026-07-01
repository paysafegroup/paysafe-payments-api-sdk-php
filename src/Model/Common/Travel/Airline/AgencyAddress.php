<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Customer\Address;


/**
 * The travel agency address.
 */
class AgencyAddress extends BaseModel
{
    /**
     * Address line of the agent selling the ticket
     */
    private ?string $street = null;
    /**
     * Postal code of the agent selling the ticket
     */
    private ?string $zip = null;
    /**
     * ISO Country code of agent selling the ticket
     */
    private ?string $country = null;

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
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class AgencyAddress {" . PHP_EOL
            . "    street: " . $this->toIndentedString($this->street ?? null) . PHP_EOL
            . "    zip: " . $this->toIndentedString($this->zip ?? null) . PHP_EOL
            . "    country: " . $this->toIndentedString($this->country ?? null) . PHP_EOL
            . "}";
    }
}
