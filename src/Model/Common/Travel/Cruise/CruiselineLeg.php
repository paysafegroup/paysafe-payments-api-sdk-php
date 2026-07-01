<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Cruise;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Contains detailed itinerary information for one of the cruise line trip legs. <br>**Note:** This object is only for Cruise line Merchants.
 */
class CruiselineLeg extends BaseModel
{
    /**
     * Indicates the total fare applied to a specific leg. Required during settlement request for integration with TSYS processor
     */
    private ?int $fare = null;
    /**
     * Indicates service class (first class, business class, etc.). Example values (not limited to) F - first class, J - business class, W - premium economy class, Y - economy class. Required during settlement request for integration with TSYS processor
     */
    private ?string $serviceClass = null;
    /**
     * Departure City where the trip originates.  [UN/LOCODE](https://unece.org/trade/cefact/unlocode-code-list-country-and-territory) expected.  * Required during settlement request for integration with TSYS processor
     */
    private ?string $departureCity = null;
    /**
     * Destination City where the trip ends.  [UN/LOCODE](https://unece.org/trade/cefact/unlocode-code-list-country-and-territory) expected.  * Required during authorization request with AMEX for integration with TSYS processor * Required during settlement request with Visa or Mastercard for integration with TSYS processor
     */
    private ?string $destinationCity = null;
    /**
     * Date of passenger's departure for this leg. Date format YYYY-MM-DD, ISO 8601 expected. For example, 2014-01-26
     */
    private ?string $departureDate = null;

    /**
     * Builder function for fare
     *
     * @param int $fare
     *
     * @return $this
     */
    public function fare(?int $fare): self
    {
        $this->setFare($fare);

        return $this;
    }

    /**
     * Setter function for fare
     *
     * @param int $fare
     *
     * @return void
     */
    public function setFare(?int $fare): void
    {
        $this->fare = $fare;
    }

    /**
     * Getter function for fare
     *
     * @return ?int
     */
    public function getFare(): ?int
    {
        return $this->fare;
    }
    /**
     * Builder function for serviceClass
     *
     * @param string $serviceClass
     *
     * @return $this
     */
    public function serviceClass(?string $serviceClass): self
    {
        $this->setServiceClass($serviceClass);

        return $this;
    }

    /**
     * Setter function for serviceClass
     *
     * @param string $serviceClass
     *
     * @return void
     */
    public function setServiceClass(?string $serviceClass): void
    {
        $this->serviceClass = $serviceClass;
    }

    /**
     * Getter function for serviceClass
     *
     * @return ?string
     */
    public function getServiceClass(): ?string
    {
        return $this->serviceClass;
    }
    /**
     * Builder function for departureCity
     *
     * @param string $departureCity
     *
     * @return $this
     */
    public function departureCity(?string $departureCity): self
    {
        $this->setDepartureCity($departureCity);

        return $this;
    }

    /**
     * Setter function for departureCity
     *
     * @param string $departureCity
     *
     * @return void
     */
    public function setDepartureCity(?string $departureCity): void
    {
        $this->departureCity = $departureCity;
    }

    /**
     * Getter function for departureCity
     *
     * @return ?string
     */
    public function getDepartureCity(): ?string
    {
        return $this->departureCity;
    }
    /**
     * Builder function for destinationCity
     *
     * @param string $destinationCity
     *
     * @return $this
     */
    public function destinationCity(?string $destinationCity): self
    {
        $this->setDestinationCity($destinationCity);

        return $this;
    }

    /**
     * Setter function for destinationCity
     *
     * @param string $destinationCity
     *
     * @return void
     */
    public function setDestinationCity(?string $destinationCity): void
    {
        $this->destinationCity = $destinationCity;
    }

    /**
     * Getter function for destinationCity
     *
     * @return ?string
     */
    public function getDestinationCity(): ?string
    {
        return $this->destinationCity;
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
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class CruiselineLeg {" . PHP_EOL
            . "    fare: " . $this->toIndentedString($this->fare ?? null) . PHP_EOL
            . "    serviceClass: " . $this->toIndentedString($this->serviceClass ?? null) . PHP_EOL
            . "    departureCity: " . $this->toIndentedString($this->departureCity ?? null) . PHP_EOL
            . "    destinationCity: " . $this->toIndentedString($this->destinationCity ?? null) . PHP_EOL
            . "    departureDate: " . $this->toIndentedString($this->departureDate ?? null) . PHP_EOL
            . "}";
    }
}
