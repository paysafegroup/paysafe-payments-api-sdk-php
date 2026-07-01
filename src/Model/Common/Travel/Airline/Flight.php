<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Operating Carrier Code and the Number of the airline flight to be taken on Leg of the trip (excluding the carrier code).
 */
class Flight extends BaseModel
{
    /**
     * Operating Carrier Code; the standard abbreviation code indicating name of the operating carrier like United Airlines, Jet Blue, etc
     */
    private ?string $carrierCode = null;
    /**
     * Number of the airline flight to be taken on Leg of the trip excluding the carrier code
     */
    private ?string $flightNumber = null;
    /**
     * Airline full name. Required during settlement request
     */
    private ?string $airlineName = null;
    /**
     * Airline ICAO code
     */
    private ?string $airlineIcaoCode = null;

    /**
     * Builder function for carrierCode
     *
     * @param string $carrierCode
     *
     * @return $this
     */
    public function carrierCode(?string $carrierCode): self
    {
        $this->setCarrierCode($carrierCode);

        return $this;
    }

    /**
     * Setter function for carrierCode
     *
     * @param string $carrierCode
     *
     * @return void
     */
    public function setCarrierCode(?string $carrierCode): void
    {
        $this->carrierCode = $carrierCode;
    }

    /**
     * Getter function for carrierCode
     *
     * @return ?string
     */
    public function getCarrierCode(): ?string
    {
        return $this->carrierCode;
    }
    /**
     * Builder function for flightNumber
     *
     * @param string $flightNumber
     *
     * @return $this
     */
    public function flightNumber(?string $flightNumber): self
    {
        $this->setFlightNumber($flightNumber);

        return $this;
    }

    /**
     * Setter function for flightNumber
     *
     * @param string $flightNumber
     *
     * @return void
     */
    public function setFlightNumber(?string $flightNumber): void
    {
        $this->flightNumber = $flightNumber;
    }

    /**
     * Getter function for flightNumber
     *
     * @return ?string
     */
    public function getFlightNumber(): ?string
    {
        return $this->flightNumber;
    }
    /**
     * Builder function for airlineName
     *
     * @param string $airlineName
     *
     * @return $this
     */
    public function airlineName(?string $airlineName): self
    {
        $this->setAirlineName($airlineName);

        return $this;
    }

    /**
     * Setter function for airlineName
     *
     * @param string $airlineName
     *
     * @return void
     */
    public function setAirlineName(?string $airlineName): void
    {
        $this->airlineName = $airlineName;
    }

    /**
     * Getter function for airlineName
     *
     * @return ?string
     */
    public function getAirlineName(): ?string
    {
        return $this->airlineName;
    }
    /**
     * Builder function for airlineIcaoCode
     *
     * @param string $airlineIcaoCode
     *
     * @return $this
     */
    public function airlineIcaoCode(?string $airlineIcaoCode): self
    {
        $this->setAirlineIcaoCode($airlineIcaoCode);

        return $this;
    }

    /**
     * Setter function for airlineIcaoCode
     *
     * @param string $airlineIcaoCode
     *
     * @return void
     */
    public function setAirlineIcaoCode(?string $airlineIcaoCode): void
    {
        $this->airlineIcaoCode = $airlineIcaoCode;
    }

    /**
     * Getter function for airlineIcaoCode
     *
     * @return ?string
     */
    public function getAirlineIcaoCode(): ?string
    {
        return $this->airlineIcaoCode;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Flight {" . PHP_EOL
            . "    carrierCode: " . $this->toIndentedString($this->carrierCode ?? null) . PHP_EOL
            . "    flightNumber: " . $this->toIndentedString($this->flightNumber ?? null) . PHP_EOL
            . "    airlineName: " . $this->toIndentedString($this->airlineName ?? null) . PHP_EOL
            . "    airlineIcaoCode: " . $this->toIndentedString($this->airlineIcaoCode ?? null) . PHP_EOL
            . "}";
    }
}
