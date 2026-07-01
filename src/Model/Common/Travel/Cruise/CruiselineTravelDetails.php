<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Cruise;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\Passengers;


/**
 * Contains information about your cruise line travel. <br>**Note:** This object is only for Cruise line Merchants. <br>**Note:** This field has to be passed only in case of card transactions.
 */
class CruiselineTravelDetails extends BaseModel
{
    /**
     * The ship name booked for the cruise. * Required during settlement request with AMEX for integration with TSYS processor
     */
    private ?string $cruiseShipName = null;
    /**
     * Name of the passenger to whom the ticket was issued. * Required during authorization request with AMEX for integration or TSYS processor * Required during settlement request with Visa or Mastercard for integration with TSYS processor
     */
    private ?string $passengerName = null;
    /**
     * Date of passenger's departure. Date format = YYYY-MM-DD, ISO 8601 expected. * Required during authorization request with AMEX for integration with TSYS processor * Required during settlement request for integration with TSYS processor _UTC Date Format_
     */
    private ?string $departureDate = null;
    /**
     * Date of passenger's return. Date format = YYYY-MM-DD, ISO 8601 expected. * Required during settlement request with AMEX for integration with TSYS processor _UTC Date Format_
     */
    private ?string $returnDate = null;
    /**
     * This field contains the country code of the cruise location.  See [Country Codes](https://developer.paysafe.com/en/support/reference-information/codes/#country-codes).  * Required during settlement request with AMEX for integration with TSYS processor
     */
    private ?string $country = null;
    /**
     * The region code that corresponds to the state, province, or other country subdivision of the cruise location.  See [Province Codes](https://developer.paysafe.com/en/support/reference-information/codes/#province-codes) or [State Codes](https://developer.paysafe.com/en/support/reference-information/codes/#state-codes) for Canada or the United States.  * Required during settlement request with AMEX for integration with TSYS processor
     */
    private ?string $state = null;
    /**
     * Departure City where the trip originates.  * Required for AMEX in case of integration with TSYS processor
     */
    private ?string $originCity = null;
    /**
     * Total cost of the cruise. For onboard purchases or transactions occurring during cruise travel, this field must be zero filled.  * Required during settlement request with AMEX for integration with TSYS processor
     */
    private ?float $roomRate = null;
    private ?string $travelPackageApplication = null;
    private ?CruiselineTicket $ticket = null;
    private ?Passengers $passengers = null;
    private ?CruiselineTripLegs $tripLegs = null;

    /**
     * Builder function for cruiseShipName
     *
     * @param string $cruiseShipName
     *
     * @return $this
     */
    public function cruiseShipName(?string $cruiseShipName): self
    {
        $this->setCruiseShipName($cruiseShipName);

        return $this;
    }

    /**
     * Setter function for cruiseShipName
     *
     * @param string $cruiseShipName
     *
     * @return void
     */
    public function setCruiseShipName(?string $cruiseShipName): void
    {
        $this->cruiseShipName = $cruiseShipName;
    }

    /**
     * Getter function for cruiseShipName
     *
     * @return ?string
     */
    public function getCruiseShipName(): ?string
    {
        return $this->cruiseShipName;
    }
    /**
     * Builder function for passengerName
     *
     * @param string $passengerName
     *
     * @return $this
     */
    public function passengerName(?string $passengerName): self
    {
        $this->setPassengerName($passengerName);

        return $this;
    }

    /**
     * Setter function for passengerName
     *
     * @param string $passengerName
     *
     * @return void
     */
    public function setPassengerName(?string $passengerName): void
    {
        $this->passengerName = $passengerName;
    }

    /**
     * Getter function for passengerName
     *
     * @return ?string
     */
    public function getPassengerName(): ?string
    {
        return $this->passengerName;
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
     * Builder function for returnDate
     *
     * @param string $returnDate
     *
     * @return $this
     */
    public function returnDate(?string $returnDate): self
    {
        $this->setReturnDate($returnDate);

        return $this;
    }

    /**
     * Setter function for returnDate
     *
     * @param string $returnDate
     *
     * @return void
     */
    public function setReturnDate(?string $returnDate): void
    {
        $this->returnDate = $returnDate;
    }

    /**
     * Getter function for returnDate
     *
     * @return ?string
     */
    public function getReturnDate(): ?string
    {
        return $this->returnDate;
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
     * Builder function for originCity
     *
     * @param string $originCity
     *
     * @return $this
     */
    public function originCity(?string $originCity): self
    {
        $this->setOriginCity($originCity);

        return $this;
    }

    /**
     * Setter function for originCity
     *
     * @param string $originCity
     *
     * @return void
     */
    public function setOriginCity(?string $originCity): void
    {
        $this->originCity = $originCity;
    }

    /**
     * Getter function for originCity
     *
     * @return ?string
     */
    public function getOriginCity(): ?string
    {
        return $this->originCity;
    }
    /**
     * Builder function for roomRate
     *
     * @param float $roomRate
     *
     * @return $this
     */
    public function roomRate(?float $roomRate): self
    {
        $this->setRoomRate($roomRate);

        return $this;
    }

    /**
     * Setter function for roomRate
     *
     * @param float $roomRate
     *
     * @return void
     */
    public function setRoomRate(?float $roomRate): void
    {
        $this->roomRate = $roomRate;
    }

    /**
     * Getter function for roomRate
     *
     * @return ?float
     */
    public function getRoomRate(): ?float
    {
        return $this->roomRate;
    }
    /**
     * Builder function for travelPackageApplication
     *
     * @param string $travelPackageApplication
     *
     * @return $this
     */
    public function travelPackageApplication(?string $travelPackageApplication): self
    {
        $this->setTravelPackageApplication($travelPackageApplication);

        return $this;
    }

    /**
     * Setter function for travelPackageApplication
     *
     * @param string $travelPackageApplication
     *
     * @return void
     */
    public function setTravelPackageApplication(?string $travelPackageApplication): void
    {
        $this->travelPackageApplication = $travelPackageApplication;
    }

    /**
     * Getter function for travelPackageApplication
     *
     * @return ?string
     */
    public function getTravelPackageApplication(): ?string
    {
        return $this->travelPackageApplication;
    }
    /**
     * Builder function for ticket
     *
     * @param CruiselineTicket $ticket
     *
     * @return $this
     */
    public function ticket(?CruiselineTicket $ticket): self
    {
        $this->setTicket($ticket);

        return $this;
    }

    /**
     * Setter function for ticket
     *
     * @param CruiselineTicket $ticket
     *
     * @return void
     */
    public function setTicket(?CruiselineTicket $ticket): void
    {
        $this->ticket = $ticket;
    }

    /**
     * Getter function for ticket
     *
     * @return ?CruiselineTicket
     */
    public function getTicket(): ?CruiselineTicket
    {
        return $this->ticket;
    }
    /**
     * Builder function for passengers
     *
     * @param Passengers $passengers
     *
     * @return $this
     */
    public function passengers(?Passengers $passengers): self
    {
        $this->setPassengers($passengers);

        return $this;
    }

    /**
     * Setter function for passengers
     *
     * @param Passengers $passengers
     *
     * @return void
     */
    public function setPassengers(?Passengers $passengers): void
    {
        $this->passengers = $passengers;
    }

    /**
     * Getter function for passengers
     *
     * @return ?Passengers
     */
    public function getPassengers(): ?Passengers
    {
        return $this->passengers;
    }
    /**
     * Builder function for tripLegs
     *
     * @param CruiselineTripLegs $tripLegs
     *
     * @return $this
     */
    public function tripLegs(?CruiselineTripLegs $tripLegs): self
    {
        $this->setTripLegs($tripLegs);

        return $this;
    }

    /**
     * Setter function for tripLegs
     *
     * @param CruiselineTripLegs $tripLegs
     *
     * @return void
     */
    public function setTripLegs(?CruiselineTripLegs $tripLegs): void
    {
        $this->tripLegs = $tripLegs;
    }

    /**
     * Getter function for tripLegs
     *
     * @return ?CruiselineTripLegs
     */
    public function getTripLegs(): ?CruiselineTripLegs
    {
        return $this->tripLegs;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class CruiselineTravelDetails {" . PHP_EOL
            . "    cruiseShipName: " . $this->toIndentedString($this->cruiseShipName ?? null) . PHP_EOL
            . "    passengerName: " . $this->toIndentedString($this->passengerName ?? null) . PHP_EOL
            . "    departureDate: " . $this->toIndentedString($this->departureDate ?? null) . PHP_EOL
            . "    returnDate: " . $this->toIndentedString($this->returnDate ?? null) . PHP_EOL
            . "    country: " . $this->toIndentedString($this->country ?? null) . PHP_EOL
            . "    state: " . $this->toIndentedString($this->state ?? null) . PHP_EOL
            . "    originCity: " . $this->toIndentedString($this->originCity ?? null) . PHP_EOL
            . "    roomRate: " . $this->toIndentedString($this->roomRate ?? null) . PHP_EOL
            . "    travelPackageApplication: " . $this->toIndentedString($this->travelPackageApplication ?? null) . PHP_EOL
            . "    ticket: " . $this->toIndentedString($this->ticket ?? null) . PHP_EOL
            . "    passengers: " . $this->toIndentedString($this->passengers ?? null) . PHP_EOL
            . "    tripLegs: " . $this->toIndentedString($this->tripLegs ?? null) . PHP_EOL
            . "}";
    }
}
