<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;

use Paysafe\PhpSdk\Model\Common\Travel\Airline\Flight;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Contains detailed itinerary information for one of the trip legs
 */
class Leg extends BaseModel
{
	const SERVICE_CLASS_F = 'F';
	const SERVICE_CLASS_J = 'J';
	const SERVICE_CLASS_W = 'W';
	const SERVICE_CLASS_Y = 'Y';

	/**
	 * Indicates the total fare applied to a specific leg.
	 */
	private string $fare;


	/**
	 * Indicates service class (first class, business class, etc.). Example values (not limited to):
	 * 
	 * - F - first class
	 * 
	 * - J - business class
	 * 
	 * - W - premium economy class
	 * 
	 * - Y - economy class
	 * Example: F
	 */
	private string $serviceClass;

	/**
	 * Fee applied to a specific leg
	 */
	private string $serviceClassFee;


	/**
	 * Indicates whether a stopover is allowed on this ticket. Valid values are:
	 * 
	 * - false - not allowed
	 * 
	 * - true - allowed
	 */
	private bool $isStopOverAllowed;

	/**
	 * Departure airport
	 */
	private string $departureAirport;

	/**
	 * Destination Airport Code (IATA Airport Code).
	 * Example: YUL
	 */
	private string $destination;

	/**
	 * Contains a Fare Basis Code for Leg that carriers assign to a particular ticket type,
     * such as business class or discounted/nonrefundable.
	 * Example: VMAY
	 */
	private string $fareBasis;

	/**
	 * Date of passenger’s departure for this leg. Date format = YYYY-MM-DD, ISO 8601 expected.
     * Example: 2022-12-20
	 */
	private string $departureDate;

	/**
	 * Departure time at the airport of departure Date format = YYYY-MM-DDTHH:MM:SSZ,
     * ISO 8601 expected: 2014-01-26T10:32:28Z
     * Example: 2014-01-26T10:32:28Z
	 */
	private string $departureTime;

	/**
	 * Arrival time at the airport for that specific leg.
	 * Example: 2023-05-25T10:32:28Z
	 */
	private string $arrivalTime;

	/**
	 * Specifying a number of the conjunction ticket within a single contract of carriage.
	 */
	private string $conjunctionTicket;

	/**
	 * Coupon number associated with the leg. Every leg could have a coupon number.
	 */
	private string $couponNumber;

	/**
	 * An endorsement can be an agency-added notation or a mandatory government required notation,
     * such as value-added tax.
     * A restriction is a limitation based on the type of fare, such as a ticket with a 3-day minimum stay
	 */
	private string $notation;

	/**
	 * Taxes for a specific leg
	 */
	private string $taxes;

	private Flight $flight;

	/**
	 * Builder function for fare
	 * 
	 * @param string $fare
	 * 
	 * @return Leg
	 */
	public function fare(string $fare): self
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
	public function setFare(string $fare): void
	{
		$this->fare = $fare;
	}
	/**
	 * Getter function for fare
	 * 
	 * @return string
	 */
	public function getFare(): string
	{
		return $this->fare;
	}

	/**
	 * Builder function for serviceClass
	 * 
	 * @param string $serviceClass
	 * 
	 * @return Leg
	 */
	public function serviceClass(string $serviceClass): self
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
	public function setServiceClass(string $serviceClass): void
	{
		$this->serviceClass = $serviceClass;
	}
	/**
	 * Getter function for serviceClass
	 * 
	 * @return string
	 */
	public function getServiceClass(): string
	{
		return $this->serviceClass;
	}

	/**
	 * Builder function for serviceClassFee
	 * 
	 * @param string $serviceClassFee
	 * 
	 * @return Leg
	 */
	public function serviceClassFee(string $serviceClassFee): self
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
	public function setServiceClassFee(string $serviceClassFee): void
	{
		$this->serviceClassFee = $serviceClassFee;
	}
	/**
	 * Getter function for serviceClassFee
	 * 
	 * @return string
	 */
	public function getServiceClassFee(): string
	{
		return $this->serviceClassFee;
	}

	/**
	 * Builder function for isStopOverAllowed
	 * 
	 * @param bool $isStopOverAllowed
	 * 
	 * @return Leg
	 */
	public function isStopOverAllowed(bool $isStopOverAllowed): self
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
	public function setIsStopOverAllowed(bool $isStopOverAllowed): void
	{
		$this->isStopOverAllowed = $isStopOverAllowed;
	}
	/**
	 * Getter function for isStopOverAllowed
	 * 
	 * @return bool
	 */
	public function getIsStopOverAllowed(): bool
	{
		return $this->isStopOverAllowed;
	}

	/**
	 * Builder function for departureAirport
	 * 
	 * @param string $departureAirport
	 * 
	 * @return Leg
	 */
	public function departureAirport(string $departureAirport): self
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
	public function setDepartureAirport(string $departureAirport): void
	{
		$this->departureAirport = $departureAirport;
	}
	/**
	 * Getter function for departureAirport
	 * 
	 * @return string
	 */
	public function getDepartureAirport(): string
	{
		return $this->departureAirport;
	}

	/**
	 * Builder function for destination
	 * 
	 * @param string $destination
	 * 
	 * @return Leg
	 */
	public function destination(string $destination): self
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
	public function setDestination(string $destination): void
	{
		$this->destination = $destination;
	}
	/**
	 * Getter function for destination
	 * 
	 * @return string
	 */
	public function getDestination(): string
	{
		return $this->destination;
	}

	/**
	 * Builder function for fareBasis
	 * 
	 * @param string $fareBasis
	 * 
	 * @return Leg
	 */
	public function fareBasis(string $fareBasis): self
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
	public function setFareBasis(string $fareBasis): void
	{
		$this->fareBasis = $fareBasis;
	}
	/**
	 * Getter function for fareBasis
	 * 
	 * @return string
	 */
	public function getFareBasis(): string
	{
		return $this->fareBasis;
	}

	/**
	 * Builder function for departureDate
	 * 
	 * @param string $departureDate
	 * 
	 * @return Leg
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
	 * Builder function for departureTime
	 * 
	 * @param string $departureTime
	 * 
	 * @return Leg
	 */
	public function departureTime(string $departureTime): self
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
	public function setDepartureTime(string $departureTime): void
	{
		$this->departureTime = $departureTime;
	}
	/**
	 * Getter function for departureTime
	 * 
	 * @return string
	 */
	public function getDepartureTime(): string
	{
		return $this->departureTime;
	}

	/**
	 * Builder function for arrivalTime
	 * 
	 * @param string $arrivalTime
	 * 
	 * @return Leg
	 */
	public function arrivalTime(string $arrivalTime): self
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
	public function setArrivalTime(string $arrivalTime): void
	{
		$this->arrivalTime = $arrivalTime;
	}
	/**
	 * Getter function for arrivalTime
	 * 
	 * @return string
	 */
	public function getArrivalTime(): string
	{
		return $this->arrivalTime;
	}

	/**
	 * Builder function for conjunctionTicket
	 * 
	 * @param string $conjunctionTicket
	 * 
	 * @return Leg
	 */
	public function conjunctionTicket(string $conjunctionTicket): self
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
	public function setConjunctionTicket(string $conjunctionTicket): void
	{
		$this->conjunctionTicket = $conjunctionTicket;
	}
	/**
	 * Getter function for conjunctionTicket
	 * 
	 * @return string
	 */
	public function getConjunctionTicket(): string
	{
		return $this->conjunctionTicket;
	}

	/**
	 * Builder function for couponNumber
	 * 
	 * @param string $couponNumber
	 * 
	 * @return Leg
	 */
	public function couponNumber(string $couponNumber): self
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
	public function setCouponNumber(string $couponNumber): void
	{
		$this->couponNumber = $couponNumber;
	}
	/**
	 * Getter function for couponNumber
	 * 
	 * @return string
	 */
	public function getCouponNumber(): string
	{
		return $this->couponNumber;
	}

	/**
	 * Builder function for notation
	 * 
	 * @param string $notation
	 * 
	 * @return Leg
	 */
	public function notation(string $notation): self
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
	public function setNotation(string $notation): void
	{
		$this->notation = $notation;
	}
	/**
	 * Getter function for notation
	 * 
	 * @return string
	 */
	public function getNotation(): string
	{
		return $this->notation;
	}

	/**
	 * Builder function for taxes
	 * 
	 * @param string $taxes
	 * 
	 * @return Leg
	 */
	public function taxes(string $taxes): self
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
	public function setTaxes(string $taxes): void
	{
		$this->taxes = $taxes;
	}
	/**
	 * Getter function for taxes
	 * 
	 * @return string
	 */
	public function getTaxes(): string
	{
		return $this->taxes;
	}

	/**
	 * Builder function for flight
	 * 
	 * @param Flight $flight
	 * 
	 * @return Leg
	 */
	public function flight(Flight $flight): self
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
	public function setFlight(Flight $flight): void
	{
		$this->flight = $flight;
	}
	/**
	 * Getter function for flight
	 * 
	 * @return Flight
	 */
	public function getFlight(): Flight
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
		return "class Leg {" . PHP_EOL .
			"	fare: " . $this->toIndentedString($this->fare) . PHP_EOL .
			"	serviceClass: " . $this->toIndentedString($this->serviceClass) . PHP_EOL .
			"	serviceClassFee: " . $this->toIndentedString($this->serviceClassFee) . PHP_EOL .
			"	isStopOverAllowed: " . $this->toIndentedString($this->isStopOverAllowed) . PHP_EOL .
			"	departureAirport: " . $this->toIndentedString($this->departureAirport) . PHP_EOL .
			"	destination: " . $this->toIndentedString($this->destination) . PHP_EOL .
			"	fareBasis: " . $this->toIndentedString($this->fareBasis) . PHP_EOL .
			"	departureDate: " . $this->toIndentedString($this->departureDate) . PHP_EOL .
			"	departureTime: " . $this->toIndentedString($this->departureTime) . PHP_EOL .
			"	arrivalTime: " . $this->toIndentedString($this->arrivalTime) . PHP_EOL .
			"	conjunctionTicket: " . $this->toIndentedString($this->conjunctionTicket) . PHP_EOL .
			"	couponNumber: " . $this->toIndentedString($this->couponNumber) . PHP_EOL .
			"	notation: " . $this->toIndentedString($this->notation) . PHP_EOL .
			"	taxes: " . $this->toIndentedString($this->taxes) . PHP_EOL .
			"	flight: " . $this->toIndentedString($this->flight) . PHP_EOL .
		"}";
	}
}
