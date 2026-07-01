<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Threeds;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Travel-related details for the transaction
 */
class TravelDetails extends BaseModel
{
    /**
     * Whether the travel involves air travel
     */
    private ?bool $isAirTravel = null;
    /**
     * Airline carrier
     */
    private ?string $airlineCarrier = null;
    /**
     * Date of departure in the time zone of the departure location. The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
     */
    private ?string $departureDate = null;
    /**
     * Travel destination Airport Code
     */
    private ?string $destination = null;
    /**
     * Travel origin Airport Code
     */
    private ?string $origin = null;
    /**
     * First name of the passenger
     */
    private ?string $passengerFirstName = null;
    /**
     * Last name of the passenger
     */
    private ?string $passengerLastName = null;

    /**
     * Builder function for isAirTravel
     *
     * @param bool $isAirTravel
     *
     * @return $this
     */
    public function isAirTravel(?bool $isAirTravel): self
    {
        $this->setIsAirTravel($isAirTravel);

        return $this;
    }

    /**
     * Setter function for isAirTravel
     *
     * @param bool $isAirTravel
     *
     * @return void
     */
    public function setIsAirTravel(?bool $isAirTravel): void
    {
        $this->isAirTravel = $isAirTravel;
    }

    /**
     * Getter function for isAirTravel
     *
     * @return ?bool
     */
    public function getIsAirTravel(): ?bool
    {
        return $this->isAirTravel;
    }
    /**
     * Builder function for airlineCarrier
     *
     * @param string $airlineCarrier
     *
     * @return $this
     */
    public function airlineCarrier(?string $airlineCarrier): self
    {
        $this->setAirlineCarrier($airlineCarrier);

        return $this;
    }

    /**
     * Setter function for airlineCarrier
     *
     * @param string $airlineCarrier
     *
     * @return void
     */
    public function setAirlineCarrier(?string $airlineCarrier): void
    {
        $this->airlineCarrier = $airlineCarrier;
    }

    /**
     * Getter function for airlineCarrier
     *
     * @return ?string
     */
    public function getAirlineCarrier(): ?string
    {
        return $this->airlineCarrier;
    }
    /**
     * Builder function for departureDate
     *
     * @param string $departureDate
     *
     * @return $this
     */
    public function departureDate(?string $departureDate): self
    {
        $this->setDepartureDate($departureDate);

        return $this;
    }

    /**
     * Setter function for departureDate
     *
     * @param string $departureDate
     *
     * @return void
     */
    public function setDepartureDate(?string $departureDate): void
    {
        $this->departureDate = $departureDate;
    }

    /**
     * Getter function for departureDate
     *
     * @return ?string
     */
    public function getDepartureDate(): ?string
    {
        return $this->departureDate;
    }
    /**
     * Builder function for destination
     *
     * @param string $destination
     *
     * @return $this
     */
    public function destination(?string $destination): self
    {
        $this->setDestination($destination);

        return $this;
    }

    /**
     * Setter function for destination
     *
     * @param string $destination
     *
     * @return void
     */
    public function setDestination(?string $destination): void
    {
        $this->destination = $destination;
    }

    /**
     * Getter function for destination
     *
     * @return ?string
     */
    public function getDestination(): ?string
    {
        return $this->destination;
    }
    /**
     * Builder function for origin
     *
     * @param string $origin
     *
     * @return $this
     */
    public function origin(?string $origin): self
    {
        $this->setOrigin($origin);

        return $this;
    }

    /**
     * Setter function for origin
     *
     * @param string $origin
     *
     * @return void
     */
    public function setOrigin(?string $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * Getter function for origin
     *
     * @return ?string
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }
    /**
     * Builder function for passengerFirstName
     *
     * @param string $passengerFirstName
     *
     * @return $this
     */
    public function passengerFirstName(?string $passengerFirstName): self
    {
        $this->setPassengerFirstName($passengerFirstName);

        return $this;
    }

    /**
     * Setter function for passengerFirstName
     *
     * @param string $passengerFirstName
     *
     * @return void
     */
    public function setPassengerFirstName(?string $passengerFirstName): void
    {
        $this->passengerFirstName = $passengerFirstName;
    }

    /**
     * Getter function for passengerFirstName
     *
     * @return ?string
     */
    public function getPassengerFirstName(): ?string
    {
        return $this->passengerFirstName;
    }
    /**
     * Builder function for passengerLastName
     *
     * @param string $passengerLastName
     *
     * @return $this
     */
    public function passengerLastName(?string $passengerLastName): self
    {
        $this->setPassengerLastName($passengerLastName);

        return $this;
    }

    /**
     * Setter function for passengerLastName
     *
     * @param string $passengerLastName
     *
     * @return void
     */
    public function setPassengerLastName(?string $passengerLastName): void
    {
        $this->passengerLastName = $passengerLastName;
    }

    /**
     * Getter function for passengerLastName
     *
     * @return ?string
     */
    public function getPassengerLastName(): ?string
    {
        return $this->passengerLastName;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class TravelDetails {" . PHP_EOL
            . "    isAirTravel: " . $this->toIndentedString($this->isAirTravel ?? null) . PHP_EOL
            . "    airlineCarrier: " . $this->toIndentedString($this->airlineCarrier ?? null) . PHP_EOL
            . "    departureDate: " . $this->toIndentedString($this->departureDate ?? null) . PHP_EOL
            . "    destination: " . $this->toIndentedString($this->destination ?? null) . PHP_EOL
            . "    origin: " . $this->toIndentedString($this->origin ?? null) . PHP_EOL
            . "    passengerFirstName: " . $this->toIndentedString($this->passengerFirstName ?? null) . PHP_EOL
            . "    passengerLastName: " . $this->toIndentedString($this->passengerLastName ?? null) . PHP_EOL
            . "}";
    }
}
