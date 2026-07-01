<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\CarRental;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Contains return details information for car rental. <br>**Note:** This object is only for Car Rental Merchants.
 */
class CarRentalReturnDetails extends BaseModel
{
    /**
     * The last date to return the car by. Date format YYYY-MM-DD, ISO 8601 expected. UTC Date Format. Required during authorization request with Visa for integration with TSYS processor. Required during settlement request for integration with TSYS processor
     */
    private ?string $date = null;
    /**
     * The local date and time when the vehicle was rented and/or picked up. Date format YYYY-MM-DDTHH:MM:SSZ, ISO 8601 expected. Required during settlement request with Amex for integration with TSYS processor
     */
    private ?string $time = null;
    /**
     * The agency code, phone number, or address abbreviation. Required during settlement request with Mastercard for integration with TSYS processor
     */
    private ?string $location = null;
    /**
     * The country of the location where the vehicle must be returned. Required during settlement request with Mastercard or Amex for integration with TSYS processor
     */
    private ?string $country = null;
    /**
     * The name of the city, town, or village where the vehicle must be returned. Required during settlement request with Mastercard or Amex for integration with TSYS processor
     */
    private ?string $city = null;
    /**
     * The region code that corresponds to the state, province, or other country subdivision where the vehicle must be returned. Required during settlement request with Amex for integration with TSYS processor
     */
    private ?string $state = null;

    /**
     * Builder function for date
     *
     * @param string $date
     *
     * @return $this
     */
    public function date(?string $date): self
    {
        $this->setDate($date);

        return $this;
    }

    /**
     * Setter function for date
     *
     * @param string $date
     *
     * @return void
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    /**
     * Getter function for date
     *
     * @return ?string
     */
    public function getDate(): ?string
    {
        return $this->date;
    }
    /**
     * Builder function for time
     *
     * @param string $time
     *
     * @return $this
     */
    public function time(?string $time): self
    {
        $this->setTime($time);

        return $this;
    }

    /**
     * Setter function for time
     *
     * @param string $time
     *
     * @return void
     */
    public function setTime(?string $time): void
    {
        $this->time = $time;
    }

    /**
     * Getter function for time
     *
     * @return ?string
     */
    public function getTime(): ?string
    {
        return $this->time;
    }
    /**
     * Builder function for location
     *
     * @param string $location
     *
     * @return $this
     */
    public function location(?string $location): self
    {
        $this->setLocation($location);

        return $this;
    }

    /**
     * Setter function for location
     *
     * @param string $location
     *
     * @return void
     */
    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    /**
     * Getter function for location
     *
     * @return ?string
     */
    public function getLocation(): ?string
    {
        return $this->location;
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
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class CarRentalReturnDetails {" . PHP_EOL
            . "    date: " . $this->toIndentedString($this->date ?? null) . PHP_EOL
            . "    time: " . $this->toIndentedString($this->time ?? null) . PHP_EOL
            . "    location: " . $this->toIndentedString($this->location ?? null) . PHP_EOL
            . "    country: " . $this->toIndentedString($this->country ?? null) . PHP_EOL
            . "    city: " . $this->toIndentedString($this->city ?? null) . PHP_EOL
            . "    state: " . $this->toIndentedString($this->state ?? null) . PHP_EOL
            . "}";
    }
}
