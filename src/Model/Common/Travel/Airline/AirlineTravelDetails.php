<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;

use Paysafe\PhpSdk\Model\Common\Travel\Airline\Ticket;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\Passengers;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\TravelAgency;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\TripLegs;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Contains information about your airline travel.

>**Note:** This object is only for Airline Merchants.

>**Note:** This field has to be passed only in case of card transactions.
 */
class AirlineTravelDetails extends BaseModel
{
	const COMPUTERIZED_RESERVATION_SYSTEM_STRT = 'STRT';
	const COMPUTERIZED_RESERVATION_SYSTEM_PARS = 'PARS';
	const COMPUTERIZED_RESERVATION_SYSTEM_DATS = 'DATS';
	const COMPUTERIZED_RESERVATION_SYSTEM_SABR = 'SABR';
	const COMPUTERIZED_RESERVATION_SYSTEM_DALA = 'DALA';
	const COMPUTERIZED_RESERVATION_SYSTEM_BLAN = 'BLAN';
	const COMPUTERIZED_RESERVATION_SYSTEM_DERD = 'DERD';
	const COMPUTERIZED_RESERVATION_SYSTEM_TUID = 'TUID';

	/**
	 * The airline company uses the passengerNameRecord as a reservation number.
	 * Example: ABCDE12345
	 */
	private string $passengerNameRecord;


	/**
	 * Name of the passenger to whom the ticket was issued.
	 * >Required during payment request for AMEX with TSYS processor<br/>
	 * >Required during settlement request for integration with Paysafe Acquiring<br/>
	 * >Required during settlement request with Visa or Mastercard with TSYS processor
	 * Example: John Doe
	 */
	private string $passengerName;

	/**
	 * Date of passenger’s departure. Date format = YYYY-MM-DD, ISO 8601 expected. UTC date format Example: 2022-12-20
	 */
	private string $departureDate;

	/**
	 * Departure Airport Code: IATA Airport Code.
	 * Example: SXF
	 */
	private string $origin;


	/**
	 * >**Note:** Required only if the ticket is purchased in Germany. Otherwise it can be omitted.
	 * Indicates the computerized reservation system used to make the reservation and purchase the ticket.
     * For tickets purchased in Germany, this field should one of these codes:
	 * 
	 * - STRT - Start
	 * - PARS - TWA
	 * - DATS - Delta
	 * - SABR - Sabre
	 * - DALA - Covia-Apollo
	 * - BLAN - Dr. Blank
	 * - DERD - DER
	 * - TUID - TUI
	 * Example: DATS
	 */
	private string $computerizedReservationSystem;

	/**
	 * BookingReference field. Typically used for the PNR, but should allow an airline
     * to specify any other reference if they feel fit.
	 */
	private string $additionalBookingReference;

	/**
	 * Total fare for all legs on the ticket, excluding taxes and fees.
     * If multiple tickets are purchased, this is the total fare for all tickets
	 */
	private int $totalFare;

	/**
	 * Total fee for all legs on the ticket.
     * If multiple tickets are purchased, this is the total fee for all tickets.
	 */
	private int $totalFee;

	/**
	 * Total taxes for all legs on the ticket.
     * If multiple tickets are purchased, this is the total taxes for all tickets.
	 */
	private int $totalTaxes;

	private Ticket $ticket;
	private Passengers $passengers;

	/**
	 * Contains the code that the cardholder supplied to the card acceptor.
	 * Example: 10987654321
	 */
	private string $customerReferenceNumber;

	private TravelAgency $travelAgency;
	private TripLegs $tripLegs;

	/**
	 * Builder function for passengerNameRecord
	 * 
	 * @param string $passengerNameRecord
	 * 
	 * @return AirlineTravelDetails
	 */
	public function passengerNameRecord(string $passengerNameRecord): self
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
	public function setPassengerNameRecord(string $passengerNameRecord): void
	{
		$this->passengerNameRecord = $passengerNameRecord;
	}
	/**
	 * Getter function for passengerNameRecord
	 * 
	 * @return string
	 */
	public function getPassengerNameRecord(): string
	{
		return $this->passengerNameRecord;
	}

	/**
	 * Builder function for passengerName
	 * 
	 * @param string $passengerName
	 * 
	 * @return AirlineTravelDetails
	 */
	public function passengerName(string $passengerName): self
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
	public function setPassengerName(string $passengerName): void
	{
		$this->passengerName = $passengerName;
	}
	/**
	 * Getter function for passengerName
	 * 
	 * @return string
	 */
	public function getPassengerName(): string
	{
		return $this->passengerName;
	}

	/**
	 * Builder function for departureDate
	 * 
	 * @param string $departureDate
	 * 
	 * @return AirlineTravelDetails
	 */
	public function departureDate(string $departureDate): self
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
	public function setDepartureDate(string $departureDate): void
	{
		$this->departureDate = $departureDate;
	}
	/**
	 * Getter function for departureDate
	 * 
	 * @return string
	 */
	public function getDepartureDate(): string
	{
		return $this->departureDate;
	}

	/**
	 * Builder function for origin
	 * 
	 * @param string $origin
	 * 
	 * @return AirlineTravelDetails
	 */
	public function origin(string $origin): self
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
	public function setOrigin(string $origin): void
	{
		$this->origin = $origin;
	}
	/**
	 * Getter function for origin
	 * 
	 * @return string
	 */
	public function getOrigin(): string
	{
		return $this->origin;
	}

	/**
	 * Builder function for computerizedReservationSystem
	 * 
	 * @param string $computerizedReservationSystem
	 * 
	 * @return AirlineTravelDetails
	 */
	public function computerizedReservationSystem(string $computerizedReservationSystem): self
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
	public function setComputerizedReservationSystem(string $computerizedReservationSystem): void
	{
		$this->computerizedReservationSystem = $computerizedReservationSystem;
	}
	/**
	 * Getter function for computerizedReservationSystem
	 * 
	 * @return string
	 */
	public function getComputerizedReservationSystem(): string
	{
		return $this->computerizedReservationSystem;
	}

	/**
	 * Builder function for additionalBookingReference
	 * 
	 * @param string $additionalBookingReference
	 * 
	 * @return AirlineTravelDetails
	 */
	public function additionalBookingReference(string $additionalBookingReference): self
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
	public function setAdditionalBookingReference(string $additionalBookingReference): void
	{
		$this->additionalBookingReference = $additionalBookingReference;
	}
	/**
	 * Getter function for additionalBookingReference
	 * 
	 * @return string
	 */
	public function getAdditionalBookingReference(): string
	{
		return $this->additionalBookingReference;
	}

	/**
	 * Builder function for totalFare
	 * 
	 * @param int $totalFare
	 * 
	 * @return AirlineTravelDetails
	 */
	public function totalFare(int $totalFare): self
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
	public function setTotalFare(int $totalFare): void
	{
		$this->totalFare = $totalFare;
	}
	/**
	 * Getter function for totalFare
	 * 
	 * @return int
	 */
	public function getTotalFare(): int
	{
		return $this->totalFare;
	}

	/**
	 * Builder function for totalFee
	 * 
	 * @param int $totalFee
	 * 
	 * @return AirlineTravelDetails
	 */
	public function totalFee(int $totalFee): self
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
	public function setTotalFee(int $totalFee): void
	{
		$this->totalFee = $totalFee;
	}
	/**
	 * Getter function for totalFee
	 * 
	 * @return int
	 */
	public function getTotalFee(): int
	{
		return $this->totalFee;
	}

	/**
	 * Builder function for totalTaxes
	 * 
	 * @param int $totalTaxes
	 * 
	 * @return AirlineTravelDetails
	 */
	public function totalTaxes(int $totalTaxes): self
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
	public function setTotalTaxes(int $totalTaxes): void
	{
		$this->totalTaxes = $totalTaxes;
	}
	/**
	 * Getter function for totalTaxes
	 * 
	 * @return int
	 */
	public function getTotalTaxes(): int
	{
		return $this->totalTaxes;
	}

	/**
	 * Builder function for ticket
	 * 
	 * @param Ticket $ticket
	 * 
	 * @return AirlineTravelDetails
	 */
	public function ticket(Ticket $ticket): self
	{
		$this->setTicket($ticket);
		
		return $this;
	}
	/**
	 * Setter function for ticket
	 * 
	 * @param Ticket $ticket
	 * 
	 * @return void
	 */
	public function setTicket(Ticket $ticket): void
	{
		$this->ticket = $ticket;
	}
	/**
	 * Getter function for ticket
	 * 
	 * @return Ticket
	 */
	public function getTicket(): Ticket
	{
		return $this->ticket;
	}

	/**
	 * Builder function for passengers
	 * 
	 * @param Passengers $passengers
	 * 
	 * @return AirlineTravelDetails
	 */
	public function passengers(Passengers $passengers): self
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
	public function setPassengers(Passengers $passengers): void
	{
		$this->passengers = $passengers;
	}
	/**
	 * Getter function for passengers
	 * 
	 * @return Passengers
	 */
	public function getPassengers(): Passengers
	{
		return $this->passengers;
	}

	/**
	 * Builder function for customerReferenceNumber
	 * 
	 * @param string $customerReferenceNumber
	 * 
	 * @return AirlineTravelDetails
	 */
	public function customerReferenceNumber(string $customerReferenceNumber): self
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
	public function setCustomerReferenceNumber(string $customerReferenceNumber): void
	{
		$this->customerReferenceNumber = $customerReferenceNumber;
	}
	/**
	 * Getter function for customerReferenceNumber
	 * 
	 * @return string
	 */
	public function getCustomerReferenceNumber(): string
	{
		return $this->customerReferenceNumber;
	}

	/**
	 * Builder function for travelAgency
	 * 
	 * @param TravelAgency $travelAgency
	 * 
	 * @return AirlineTravelDetails
	 */
	public function travelAgency(TravelAgency $travelAgency): self
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
	public function setTravelAgency(TravelAgency $travelAgency): void
	{
		$this->travelAgency = $travelAgency;
	}
	/**
	 * Getter function for travelAgency
	 * 
	 * @return TravelAgency
	 */
	public function getTravelAgency(): TravelAgency
	{
		return $this->travelAgency;
	}

	/**
	 * Builder function for tripLegs
	 * 
	 * @param TripLegs $tripLegs
	 * 
	 * @return AirlineTravelDetails
	 */
	public function tripLegs(TripLegs $tripLegs): self
	{
		$this->setTripLegs($tripLegs);
		
		return $this;
	}
	/**
	 * Setter function for tripLegs
	 * 
	 * @param TripLegs $tripLegs
	 * 
	 * @return void
	 */
	public function setTripLegs(TripLegs $tripLegs): void
	{
		$this->tripLegs = $tripLegs;
	}
	/**
	 * Getter function for tripLegs
	 * 
	 * @return TripLegs
	 */
	public function getTripLegs(): TripLegs
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
		return "class AirlineTravelDetails {" . PHP_EOL . 
			"	passengerNameRecord: " . $this->toIndentedString($this->passengerNameRecord) . PHP_EOL .
			"	passengerName: " . $this->toIndentedString($this->passengerName) . PHP_EOL .
			"	departureDate: " . $this->toIndentedString($this->departureDate) . PHP_EOL .
			"	origin: " . $this->toIndentedString($this->origin) . PHP_EOL .
			"	computerizedReservationSystem: " . $this->toIndentedString($this->computerizedReservationSystem) . PHP_EOL .
			"	additionalBookingReference: " . $this->toIndentedString($this->additionalBookingReference) . PHP_EOL .
			"	totalFare: " . $this->toIndentedString($this->totalFare) . PHP_EOL .
			"	totalFee: " . $this->toIndentedString($this->totalFee) . PHP_EOL .
			"	totalTaxes: " . $this->toIndentedString($this->totalTaxes) . PHP_EOL .
			"	ticket: " . $this->toIndentedString($this->ticket) . PHP_EOL .
			"	passengers: " . $this->toIndentedString($this->passengers) . PHP_EOL .
			"	customerReferenceNumber: " . $this->toIndentedString($this->customerReferenceNumber) . PHP_EOL .
			"	travelAgency: " . $this->toIndentedString($this->travelAgency) . PHP_EOL .
			"	tripLegs: " . $this->toIndentedString($this->tripLegs) . PHP_EOL .
		"}";
	}
}
