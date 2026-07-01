<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Contains information about your airline travel. <br>**Note:** This object is only for Airline Merchants. <br>**Note:** This field has to be passed only in case of card transactions.
 */
class AirlineTravelDetails extends BaseModel
{
    /**
     * The airline company uses the passengerNameRecord as a reservation number
     */
    private ?string $passengerNameRecord = null;
    /**
     * Name of the passenger to whom the ticket was issued
     */
    private ?string $passengerName = null;
    /**
     * Date of passenger's departure. Date format YYYY-MM-DD, ISO 8601 expected. For example 2022-12-20
     */
    private ?string $departureDate = null;
    /**
     * Origin airport code (IATA Airport Code)
     */
    private ?string $origin = null;
    private ?string $computerizedReservationSystem = null;
    /**
     * Additional booking reference information
     */
    private ?string $additionalBookingReference = null;
    /**
     * Total fare amount in minor units
     */
    private ?int $totalFare = null;
    /**
     * Total fee amount in minor units
     */
    private ?int $totalFee = null;
    /**
     * Total taxes amount in minor units
     */
    private ?int $totalTaxes = null;
    private ?AirlineTicket $ticket = null;
    private ?Passengers $passengers = null;
    /**
     * Contains the code that the cardholder supplied to the card acceptor
     */
    private ?string $customerReferenceNumber = null;
    private ?TravelAgency $travelAgency = null;
    private ?AirlineTripLegs $tripLegs = null;

    /**
     * Builder function for passengerNameRecord
     *
     * @param string $passengerNameRecord
     *
     * @return $this
     */
    public function passengerNameRecord(?string $passengerNameRecord): self
    {
        $this->setPassengerNameRecord($passengerNameRecord);

        return $this;
    }

    /**
     * Setter function for passengerNameRecord
     *
     * @param string $passengerNameRecord
     *
     * @return void
     */
    public function setPassengerNameRecord(?string $passengerNameRecord): void
    {
        $this->passengerNameRecord = $passengerNameRecord;
    }

    /**
     * Getter function for passengerNameRecord
     *
     * @return ?string
     */
    public function getPassengerNameRecord(): ?string
    {
        return $this->passengerNameRecord;
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
     * Builder function for computerizedReservationSystem
     *
     * @param string $computerizedReservationSystem
     *
     * @return $this
     */
    public function computerizedReservationSystem(?string $computerizedReservationSystem): self
    {
        $this->setComputerizedReservationSystem($computerizedReservationSystem);

        return $this;
    }

    /**
     * Setter function for computerizedReservationSystem
     *
     * @param string $computerizedReservationSystem
     *
     * @return void
     */
    public function setComputerizedReservationSystem(?string $computerizedReservationSystem): void
    {
        $this->computerizedReservationSystem = $computerizedReservationSystem;
    }

    /**
     * Getter function for computerizedReservationSystem
     *
     * @return ?string
     */
    public function getComputerizedReservationSystem(): ?string
    {
        return $this->computerizedReservationSystem;
    }
    /**
     * Builder function for additionalBookingReference
     *
     * @param string $additionalBookingReference
     *
     * @return $this
     */
    public function additionalBookingReference(?string $additionalBookingReference): self
    {
        $this->setAdditionalBookingReference($additionalBookingReference);

        return $this;
    }

    /**
     * Setter function for additionalBookingReference
     *
     * @param string $additionalBookingReference
     *
     * @return void
     */
    public function setAdditionalBookingReference(?string $additionalBookingReference): void
    {
        $this->additionalBookingReference = $additionalBookingReference;
    }

    /**
     * Getter function for additionalBookingReference
     *
     * @return ?string
     */
    public function getAdditionalBookingReference(): ?string
    {
        return $this->additionalBookingReference;
    }
    /**
     * Builder function for totalFare
     *
     * @param int $totalFare
     *
     * @return $this
     */
    public function totalFare(?int $totalFare): self
    {
        $this->setTotalFare($totalFare);

        return $this;
    }

    /**
     * Setter function for totalFare
     *
     * @param int $totalFare
     *
     * @return void
     */
    public function setTotalFare(?int $totalFare): void
    {
        $this->totalFare = $totalFare;
    }

    /**
     * Getter function for totalFare
     *
     * @return ?int
     */
    public function getTotalFare(): ?int
    {
        return $this->totalFare;
    }
    /**
     * Builder function for totalFee
     *
     * @param int $totalFee
     *
     * @return $this
     */
    public function totalFee(?int $totalFee): self
    {
        $this->setTotalFee($totalFee);

        return $this;
    }

    /**
     * Setter function for totalFee
     *
     * @param int $totalFee
     *
     * @return void
     */
    public function setTotalFee(?int $totalFee): void
    {
        $this->totalFee = $totalFee;
    }

    /**
     * Getter function for totalFee
     *
     * @return ?int
     */
    public function getTotalFee(): ?int
    {
        return $this->totalFee;
    }
    /**
     * Builder function for totalTaxes
     *
     * @param int $totalTaxes
     *
     * @return $this
     */
    public function totalTaxes(?int $totalTaxes): self
    {
        $this->setTotalTaxes($totalTaxes);

        return $this;
    }

    /**
     * Setter function for totalTaxes
     *
     * @param int $totalTaxes
     *
     * @return void
     */
    public function setTotalTaxes(?int $totalTaxes): void
    {
        $this->totalTaxes = $totalTaxes;
    }

    /**
     * Getter function for totalTaxes
     *
     * @return ?int
     */
    public function getTotalTaxes(): ?int
    {
        return $this->totalTaxes;
    }
    /**
     * Builder function for ticket
     *
     * @param AirlineTicket $ticket
     *
     * @return $this
     */
    public function ticket(?AirlineTicket $ticket): self
    {
        $this->setTicket($ticket);

        return $this;
    }

    /**
     * Setter function for ticket
     *
     * @param AirlineTicket $ticket
     *
     * @return void
     */
    public function setTicket(?AirlineTicket $ticket): void
    {
        $this->ticket = $ticket;
    }

    /**
     * Getter function for ticket
     *
     * @return ?AirlineTicket
     */
    public function getTicket(): ?AirlineTicket
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
     * Builder function for customerReferenceNumber
     *
     * @param string $customerReferenceNumber
     *
     * @return $this
     */
    public function customerReferenceNumber(?string $customerReferenceNumber): self
    {
        $this->setCustomerReferenceNumber($customerReferenceNumber);

        return $this;
    }

    /**
     * Setter function for customerReferenceNumber
     *
     * @param string $customerReferenceNumber
     *
     * @return void
     */
    public function setCustomerReferenceNumber(?string $customerReferenceNumber): void
    {
        $this->customerReferenceNumber = $customerReferenceNumber;
    }

    /**
     * Getter function for customerReferenceNumber
     *
     * @return ?string
     */
    public function getCustomerReferenceNumber(): ?string
    {
        return $this->customerReferenceNumber;
    }
    /**
     * Builder function for travelAgency
     *
     * @param TravelAgency $travelAgency
     *
     * @return $this
     */
    public function travelAgency(?TravelAgency $travelAgency): self
    {
        $this->setTravelAgency($travelAgency);

        return $this;
    }

    /**
     * Setter function for travelAgency
     *
     * @param TravelAgency $travelAgency
     *
     * @return void
     */
    public function setTravelAgency(?TravelAgency $travelAgency): void
    {
        $this->travelAgency = $travelAgency;
    }

    /**
     * Getter function for travelAgency
     *
     * @return ?TravelAgency
     */
    public function getTravelAgency(): ?TravelAgency
    {
        return $this->travelAgency;
    }
    /**
     * Builder function for tripLegs
     *
     * @param AirlineTripLegs $tripLegs
     *
     * @return $this
     */
    public function tripLegs(?AirlineTripLegs $tripLegs): self
    {
        $this->setTripLegs($tripLegs);

        return $this;
    }

    /**
     * Setter function for tripLegs
     *
     * @param AirlineTripLegs $tripLegs
     *
     * @return void
     */
    public function setTripLegs(?AirlineTripLegs $tripLegs): void
    {
        $this->tripLegs = $tripLegs;
    }

    /**
     * Getter function for tripLegs
     *
     * @return ?AirlineTripLegs
     */
    public function getTripLegs(): ?AirlineTripLegs
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
        return "class AirlineTravelDetails {" . PHP_EOL
            . "    passengerNameRecord: " . $this->toIndentedString($this->passengerNameRecord ?? null) . PHP_EOL
            . "    passengerName: " . $this->toIndentedString($this->passengerName ?? null) . PHP_EOL
            . "    departureDate: " . $this->toIndentedString($this->departureDate ?? null) . PHP_EOL
            . "    origin: " . $this->toIndentedString($this->origin ?? null) . PHP_EOL
            . "    computerizedReservationSystem: " . $this->toIndentedString($this->computerizedReservationSystem ?? null) . PHP_EOL
            . "    additionalBookingReference: " . $this->toIndentedString($this->additionalBookingReference ?? null) . PHP_EOL
            . "    totalFare: " . $this->toIndentedString($this->totalFare ?? null) . PHP_EOL
            . "    totalFee: " . $this->toIndentedString($this->totalFee ?? null) . PHP_EOL
            . "    totalTaxes: " . $this->toIndentedString($this->totalTaxes ?? null) . PHP_EOL
            . "    ticket: " . $this->toIndentedString($this->ticket ?? null) . PHP_EOL
            . "    passengers: " . $this->toIndentedString($this->passengers ?? null) . PHP_EOL
            . "    customerReferenceNumber: " . $this->toIndentedString($this->customerReferenceNumber ?? null) . PHP_EOL
            . "    travelAgency: " . $this->toIndentedString($this->travelAgency ?? null) . PHP_EOL
            . "    tripLegs: " . $this->toIndentedString($this->tripLegs ?? null) . PHP_EOL
            . "}";
    }
}
