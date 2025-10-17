<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Cruise;

use Paysafe\PhpSdk\Model\Common\Travel\Cruise\CruiselineTicket;
use Paysafe\PhpSdk\Model\Common\Travel\Cruise\CruiselinePassengers;
use Paysafe\PhpSdk\Model\Common\Travel\Cruise\CruiselineTripLegs;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Contains information about your cruise line travel.

>**Note:** This object is only for Cruise line Merchants.

>**Note:** This field has to be passed only in case of card transactions.
 */
class CruiselineTravelDetails extends BaseModel
{
	const TRAVEL_PACKAGE_APPLICATION_CAR_RENTAL_RESERVATION = 'CAR_RENTAL_RESERVATION';
	const TRAVEL_PACKAGE_APPLICATION_AIRLINE_RESERVATION = 'AIRLINE_RESERVATION';
	const TRAVEL_PACKAGE_APPLICATION_CAR_RENTAL_AND_AIRLINE_RESERVATION = 'CAR_RENTAL_AND_AIRLINE_RESERVATION';
	const TRAVEL_PACKAGE_APPLICATION_UNKNOWN = 'UNKNOWN';


	/**
	 * The ship name booked for the cruise.
	 * 
	 * * Required during settlement request with AMEX for integration with TSYS processor
	 * Example: Cruise Ship
	 */
	private string $cruiseShipName;


	/**
	 * Name of the passenger to whom the ticket was issued.
	 * * Required during authorization request with AMEX for integration with TSYS processor
	 * * Required during settlement request with Visa or Mastercard for integration with TSYS processor
	 * Example: John Doe
	 */
	private string $passengerName;


	/**
	 * Date of passenger’s departure. Date format = YYYY-MM-DD, ISO 8601 expected.
	 * * Required during authorization request with AMEX for integration with TSYS processor
	 * * Required during settlement request for integration with TSYS processor
	 * _UTC Date Format_
	 * Example: 2023-12-15
	 */
	private string $departureDate;


	/**
	 * Date of passenger’s return. Date format = YYYY-MM-DD, ISO 8601 expected.
	 * * Required during settlement request with AMEX for integration with TSYS processor
	 * _UTC Date Format_
	 * Example: 2023-12-20
	 */
	private string $returnDate;


	/**
	 * This field contains the country code of the cruise location.
	 * 
	 * See [Country Codes](https://developer.paysafe.com/en/support/reference-information/codes/#country-codes).
	 * 
	 * * Required during settlement request with AMEX for integration with TSYS processor
	 * Example: US
	 */
	private string $country;


	/**
	 * The region code that corresponds to the state, province, or other country subdivision of the cruise location.
	 * 
	 * See [Province Codes](https://developer.paysafe.com/en/support/reference-information/codes/#province-codes)
     * or [State Codes](https://developer.paysafe.com/en/support/reference-information/codes/#state-codes)
     * for Canada or the United States.
	 * 
	 * * Required during settlement request with AMEX for integration with TSYS processor
	 * Example: CA
	 */
	private string $state;


	/**
	 * Departure City where the trip originates.
	 * 
	 * * Required for AMEX in case of integration with TSYS processor
	 * Example: Barbados
	 */
	private string $originCity;


	/**
	 * Total cost of the cruise. For onboard purchases or transactions occurring during cruise travel,
     * this field must be zero filled.
	 * 
	 * * Required during settlement request with AMEX for integration with TSYS processor
	 * Example: 1200
	 */
	private int $roomRate;


	/**
	 * Indicates if the package includes car rental, airline flight, both or neither.
	 * 
	 * - CAR_RENTAL_RESERVATION - Car rental reservation included
	 * - AIRLINE_RESERVATION - Airline flight reservation included
	 * - CAR_RENTAL_AND_AIRLINE_RESERVATION - Both car rental and airline flight reservations included
	 * - UNKNOWN - Unknown
	 * 
	 * * Required during settlement request with AMEX for integration with TSYS processor
	 * Example: CAR_RENTAL_RESERVATION
	 */
	private string $travelPackageApplication;

	private CruiselineTicket $ticket;
	private CruiselinePassengers $passengers;
	private CruiselineTripLegs $tripLegs;

	/**
	 * Builder function for cruiseShipName
	 * 
	 * @param string $cruiseShipName
	 * 
	 * @return CruiselineTravelDetails
	 */
	public function cruiseShipName(string $cruiseShipName): self
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
	public function setCruiseShipName(string $cruiseShipName): void
	{
		$this->cruiseShipName = $cruiseShipName;
	}
	/**
	 * Getter function for cruiseShipName
	 * 
	 * @return string
	 */
	public function getCruiseShipName(): string
	{
		return $this->cruiseShipName;
	}

	/**
	 * Builder function for passengerName
	 * 
	 * @param string $passengerName
	 * 
	 * @return CruiselineTravelDetails
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
	 * @return CruiselineTravelDetails
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
	 * Builder function for returnDate
	 * 
	 * @param string $returnDate
	 * 
	 * @return CruiselineTravelDetails
	 */
	public function returnDate(string $returnDate): self
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
	public function setReturnDate(string $returnDate): void
	{
		$this->returnDate = $returnDate;
	}
	/**
	 * Getter function for returnDate
	 * 
	 * @return string
	 */
	public function getReturnDate(): string
	{
		return $this->returnDate;
	}

	/**
	 * Builder function for country
	 * 
	 * @param string $country
	 * 
	 * @return CruiselineTravelDetails
	 */
	public function country(string $country): self
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
	public function setCountry(string $country): void
	{
		$this->country = $country;
	}
	/**
	 * Getter function for country
	 * 
	 * @return string
	 */
	public function getCountry(): string
	{
		return $this->country;
	}

	/**
	 * Builder function for state
	 * 
	 * @param string $state
	 * 
	 * @return CruiselineTravelDetails
	 */
	public function state(string $state): self
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
	public function setState(string $state): void
	{
		$this->state = $state;
	}
	/**
	 * Getter function for state
	 * 
	 * @return string
	 */
	public function getState(): string
	{
		return $this->state;
	}

	/**
	 * Builder function for originCity
	 * 
	 * @param string $originCity
	 * 
	 * @return CruiselineTravelDetails
	 */
	public function originCity(string $originCity): self
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
	public function setOriginCity(string $originCity): void
	{
		$this->originCity = $originCity;
	}
	/**
	 * Getter function for originCity
	 * 
	 * @return string
	 */
	public function getOriginCity(): string
	{
		return $this->originCity;
	}

	/**
	 * Builder function for roomRate
	 * 
	 * @param int $roomRate
	 * 
	 * @return CruiselineTravelDetails
	 */
	public function roomRate(int $roomRate): self
	{
		$this->setRoomRate($roomRate);
		
		return $this;
	}
	/**
	 * Setter function for roomRate
	 * 
	 * @param int $roomRate
	 * 
	 * @return void
	 */
	public function setRoomRate(int $roomRate): void
	{
		$this->roomRate = $roomRate;
	}
	/**
	 * Getter function for roomRate
	 * 
	 * @return int
	 */
	public function getRoomRate(): int
	{
		return $this->roomRate;
	}

	/**
	 * Builder function for travelPackageApplication
	 * 
	 * @param string $travelPackageApplication
	 * 
	 * @return CruiselineTravelDetails
	 */
	public function travelPackageApplication(string $travelPackageApplication): self
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
	public function setTravelPackageApplication(string $travelPackageApplication): void
	{
		$this->travelPackageApplication = $travelPackageApplication;
	}
	/**
	 * Getter function for travelPackageApplication
	 * 
	 * @return string
	 */
	public function getTravelPackageApplication(): string
	{
		return $this->travelPackageApplication;
	}

	/**
	 * Builder function for ticket
	 * 
	 * @param CruiselineTicket $ticket
	 * 
	 * @return CruiselineTravelDetails
	 */
	public function ticket(CruiselineTicket $ticket): self
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
	public function setTicket(CruiselineTicket $ticket): void
	{
		$this->ticket = $ticket;
	}
	/**
	 * Getter function for ticket
	 * 
	 * @return CruiselineTicket
	 */
	public function getTicket(): CruiselineTicket
	{
		return $this->ticket;
	}

	/**
	 * Builder function for passengers
	 * 
	 * @param CruiselinePassengers $passengers
	 * 
	 * @return CruiselineTravelDetails
	 */
	public function passengers(CruiselinePassengers $passengers): self
	{
		$this->setPassengers($passengers);
		
		return $this;
	}
	/**
	 * Setter function for passengers
	 * 
	 * @param CruiselinePassengers $passengers
	 * 
	 * @return void
	 */
	public function setPassengers(CruiselinePassengers $passengers): void
	{
		$this->passengers = $passengers;
	}
	/**
	 * Getter function for passengers
	 * 
	 * @return CruiselinePassengers
	 */
	public function getPassengers(): CruiselinePassengers
	{
		return $this->passengers;
	}

	/**
	 * Builder function for tripLegs
	 * 
	 * @param CruiselineTripLegs $tripLegs
	 * 
	 * @return CruiselineTravelDetails
	 */
	public function tripLegs(CruiselineTripLegs $tripLegs): self
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
	public function setTripLegs(CruiselineTripLegs $tripLegs): void
	{
		$this->tripLegs = $tripLegs;
	}
	/**
	 * Getter function for tripLegs
	 * 
	 * @return CruiselineTripLegs
	 */
	public function getTripLegs(): CruiselineTripLegs
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
		return "class CruiselineTravelDetails {" . PHP_EOL . 
			"	cruiseShipName: " . $this->toIndentedString($this->cruiseShipName) . PHP_EOL .
			"	passengerName: " . $this->toIndentedString($this->passengerName) . PHP_EOL .
			"	departureDate: " . $this->toIndentedString($this->departureDate) . PHP_EOL .
			"	returnDate: " . $this->toIndentedString($this->returnDate) . PHP_EOL .
			"	country: " . $this->toIndentedString($this->country) . PHP_EOL .
			"	state: " . $this->toIndentedString($this->state) . PHP_EOL .
			"	originCity: " . $this->toIndentedString($this->originCity) . PHP_EOL .
			"	roomRate: " . $this->toIndentedString($this->roomRate) . PHP_EOL .
			"	travelPackageApplication: " . $this->toIndentedString($this->travelPackageApplication) . PHP_EOL .
			"	ticket: " . $this->toIndentedString($this->ticket) . PHP_EOL .
			"	passengers: " . $this->toIndentedString($this->passengers) . PHP_EOL .
			"	tripLegs: " . $this->toIndentedString($this->tripLegs) . PHP_EOL .
		"}";
	}
}
