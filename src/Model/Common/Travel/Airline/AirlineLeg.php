<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Contains detailed itinerary information for one of the trip legs.
 */
class AirlineLeg extends BaseModel
{
    /**
     * Indicates the total fare applied to a specific leg
     */
    private ?string $fare = null;
    private ?string $serviceClass = null;
    /**
     * Fee applied to a specific leg
     */
    private ?string $serviceClassFee = null;
    /**
     * Indicates whether a stopover is allowed on this ticket. false - not allowed, true - allowed
     */
    private ?bool $isStopOverAllowed = null;
    /**
     * Departure airport
     */
    private ?string $departureAirport = null;
    /**
     * Destination Airport Code (IATA Airport Code)
     */
    private ?string $destination = null;
    /**
     * Contains a Fare Basis Code for Leg that carriers assign to a particular ticket type, such as business class or discounted/nonrefundable
     */
    private ?string $fareBasis = null;
    /**
     * Date of passenger's departure for this leg. Date format YYYY-MM-DD, ISO 8601 expected. For example, 2014-01-26
     */
    private ?string $departureDate = null;
    /**
     * Departure time
     */
    private ?string $departureTime = null;
    /**
     * Arrival time
     */
    private ?string $arrivalTime = null;
    /**
     * Conjunction ticket information
     */
    private ?string $conjunctionTicket = null;
    /**
     * Coupon number
     */
    private ?string $couponNumber = null;
    /**
     * Notation information
     */
    private ?string $notation = null;
    /**
     * Taxes for this leg
     */
    private ?string $taxes = null;
    private ?Flight $flight = null;

    /**
     * Builder function for fare
     *
     * @param string $fare
     *
     * @return $this
     */
    public function fare(?string $fare): self
    {
        $this->setFare($fare);

        return $this;
    }

    /**
     * Setter function for fare
     *
     * @param string $fare
     *
     * @return void
     */
    public function setFare(?string $fare): void
    {
        $this->fare = $fare;
    }

    /**
     * Getter function for fare
     *
     * @return ?string
     */
    public function getFare(): ?string
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
     * Builder function for serviceClassFee
     *
     * @param string $serviceClassFee
     *
     * @return $this
     */
    public function serviceClassFee(?string $serviceClassFee): self
    {
        $this->setServiceClassFee($serviceClassFee);

        return $this;
    }

    /**
     * Setter function for serviceClassFee
     *
     * @param string $serviceClassFee
     *
     * @return void
     */
    public function setServiceClassFee(?string $serviceClassFee): void
    {
        $this->serviceClassFee = $serviceClassFee;
    }

    /**
     * Getter function for serviceClassFee
     *
     * @return ?string
     */
    public function getServiceClassFee(): ?string
    {
        return $this->serviceClassFee;
    }
    /**
     * Builder function for isStopOverAllowed
     *
     * @param bool $isStopOverAllowed
     *
     * @return $this
     */
    public function isStopOverAllowed(?bool $isStopOverAllowed): self
    {
        $this->setIsStopOverAllowed($isStopOverAllowed);

        return $this;
    }

    /**
     * Setter function for isStopOverAllowed
     *
     * @param bool $isStopOverAllowed
     *
     * @return void
     */
    public function setIsStopOverAllowed(?bool $isStopOverAllowed): void
    {
        $this->isStopOverAllowed = $isStopOverAllowed;
    }

    /**
     * Getter function for isStopOverAllowed
     *
     * @return ?bool
     */
    public function getIsStopOverAllowed(): ?bool
    {
        return $this->isStopOverAllowed;
    }
    /**
     * Builder function for departureAirport
     *
     * @param string $departureAirport
     *
     * @return $this
     */
    public function departureAirport(?string $departureAirport): self
    {
        $this->setDepartureAirport($departureAirport);

        return $this;
    }

    /**
     * Setter function for departureAirport
     *
     * @param string $departureAirport
     *
     * @return void
     */
    public function setDepartureAirport(?string $departureAirport): void
    {
        $this->departureAirport = $departureAirport;
    }

    /**
     * Getter function for departureAirport
     *
     * @return ?string
     */
    public function getDepartureAirport(): ?string
    {
        return $this->departureAirport;
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
     * Builder function for fareBasis
     *
     * @param string $fareBasis
     *
     * @return $this
     */
    public function fareBasis(?string $fareBasis): self
    {
        $this->setFareBasis($fareBasis);

        return $this;
    }

    /**
     * Setter function for fareBasis
     *
     * @param string $fareBasis
     *
     * @return void
     */
    public function setFareBasis(?string $fareBasis): void
    {
        $this->fareBasis = $fareBasis;
    }

    /**
     * Getter function for fareBasis
     *
     * @return ?string
     */
    public function getFareBasis(): ?string
    {
        return $this->fareBasis;
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
     * Builder function for departureTime
     *
     * @param string $departureTime
     *
     * @return $this
     */
    public function departureTime(?string $departureTime): self
    {
        $this->setDepartureTime($departureTime);

        return $this;
    }

    /**
     * Setter function for departureTime
     *
     * @param string $departureTime
     *
     * @return void
     */
    public function setDepartureTime(?string $departureTime): void
    {
        $this->departureTime = $departureTime;
    }

    /**
     * Getter function for departureTime
     *
     * @return ?string
     */
    public function getDepartureTime(): ?string
    {
        return $this->departureTime;
    }
    /**
     * Builder function for arrivalTime
     *
     * @param string $arrivalTime
     *
     * @return $this
     */
    public function arrivalTime(?string $arrivalTime): self
    {
        $this->setArrivalTime($arrivalTime);

        return $this;
    }

    /**
     * Setter function for arrivalTime
     *
     * @param string $arrivalTime
     *
     * @return void
     */
    public function setArrivalTime(?string $arrivalTime): void
    {
        $this->arrivalTime = $arrivalTime;
    }

    /**
     * Getter function for arrivalTime
     *
     * @return ?string
     */
    public function getArrivalTime(): ?string
    {
        return $this->arrivalTime;
    }
    /**
     * Builder function for conjunctionTicket
     *
     * @param string $conjunctionTicket
     *
     * @return $this
     */
    public function conjunctionTicket(?string $conjunctionTicket): self
    {
        $this->setConjunctionTicket($conjunctionTicket);

        return $this;
    }

    /**
     * Setter function for conjunctionTicket
     *
     * @param string $conjunctionTicket
     *
     * @return void
     */
    public function setConjunctionTicket(?string $conjunctionTicket): void
    {
        $this->conjunctionTicket = $conjunctionTicket;
    }

    /**
     * Getter function for conjunctionTicket
     *
     * @return ?string
     */
    public function getConjunctionTicket(): ?string
    {
        return $this->conjunctionTicket;
    }
    /**
     * Builder function for couponNumber
     *
     * @param string $couponNumber
     *
     * @return $this
     */
    public function couponNumber(?string $couponNumber): self
    {
        $this->setCouponNumber($couponNumber);

        return $this;
    }

    /**
     * Setter function for couponNumber
     *
     * @param string $couponNumber
     *
     * @return void
     */
    public function setCouponNumber(?string $couponNumber): void
    {
        $this->couponNumber = $couponNumber;
    }

    /**
     * Getter function for couponNumber
     *
     * @return ?string
     */
    public function getCouponNumber(): ?string
    {
        return $this->couponNumber;
    }
    /**
     * Builder function for notation
     *
     * @param string $notation
     *
     * @return $this
     */
    public function notation(?string $notation): self
    {
        $this->setNotation($notation);

        return $this;
    }

    /**
     * Setter function for notation
     *
     * @param string $notation
     *
     * @return void
     */
    public function setNotation(?string $notation): void
    {
        $this->notation = $notation;
    }

    /**
     * Getter function for notation
     *
     * @return ?string
     */
    public function getNotation(): ?string
    {
        return $this->notation;
    }
    /**
     * Builder function for taxes
     *
     * @param string $taxes
     *
     * @return $this
     */
    public function taxes(?string $taxes): self
    {
        $this->setTaxes($taxes);

        return $this;
    }

    /**
     * Setter function for taxes
     *
     * @param string $taxes
     *
     * @return void
     */
    public function setTaxes(?string $taxes): void
    {
        $this->taxes = $taxes;
    }

    /**
     * Getter function for taxes
     *
     * @return ?string
     */
    public function getTaxes(): ?string
    {
        return $this->taxes;
    }
    /**
     * Builder function for flight
     *
     * @param Flight $flight
     *
     * @return $this
     */
    public function flight(?Flight $flight): self
    {
        $this->setFlight($flight);

        return $this;
    }

    /**
     * Setter function for flight
     *
     * @param Flight $flight
     *
     * @return void
     */
    public function setFlight(?Flight $flight): void
    {
        $this->flight = $flight;
    }

    /**
     * Getter function for flight
     *
     * @return ?Flight
     */
    public function getFlight(): ?Flight
    {
        return $this->flight;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class AirlineLeg {" . PHP_EOL
            . "    fare: " . $this->toIndentedString($this->fare ?? null) . PHP_EOL
            . "    serviceClass: " . $this->toIndentedString($this->serviceClass ?? null) . PHP_EOL
            . "    serviceClassFee: " . $this->toIndentedString($this->serviceClassFee ?? null) . PHP_EOL
            . "    isStopOverAllowed: " . $this->toIndentedString($this->isStopOverAllowed ?? null) . PHP_EOL
            . "    departureAirport: " . $this->toIndentedString($this->departureAirport ?? null) . PHP_EOL
            . "    destination: " . $this->toIndentedString($this->destination ?? null) . PHP_EOL
            . "    fareBasis: " . $this->toIndentedString($this->fareBasis ?? null) . PHP_EOL
            . "    departureDate: " . $this->toIndentedString($this->departureDate ?? null) . PHP_EOL
            . "    departureTime: " . $this->toIndentedString($this->departureTime ?? null) . PHP_EOL
            . "    arrivalTime: " . $this->toIndentedString($this->arrivalTime ?? null) . PHP_EOL
            . "    conjunctionTicket: " . $this->toIndentedString($this->conjunctionTicket ?? null) . PHP_EOL
            . "    couponNumber: " . $this->toIndentedString($this->couponNumber ?? null) . PHP_EOL
            . "    notation: " . $this->toIndentedString($this->notation ?? null) . PHP_EOL
            . "    taxes: " . $this->toIndentedString($this->taxes ?? null) . PHP_EOL
            . "    flight: " . $this->toIndentedString($this->flight ?? null) . PHP_EOL
            . "}";
    }
}
