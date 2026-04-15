<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the Amex-specific travel details.
 */
class TravelDetails extends BaseModel
{
    /**
     * This indicates whether the transaction is an air travel related purchase,
     * e.g., a ticket purchase
     */
	private bool $isAirTravel = false;

	/**
	 * This is the selected airline carrier.
	 */
	private string $airlineCarrier;

	/**
	 * This is the date of departure in the time zone of the departure location.
     * The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
	 */
	private string $departureDate;

	/**
	 * This is the airport code of the destination airport.
	 */
	private string $destination;

	/**
	 * This is the airport code of the originating airport.
	 */
	private string $origin;

	/**
	 * This is the first name of the cardholder from the billing details.
	 */
	private string $passengerFirstName;

	/**
	 * This is the last name of the cardholder from the billing details.
	 */
	private string $passengerLastName;


	/**
	 * Builder function for isAirTravel
	 * 
	 * @param bool $isAirTravel
	 * 
	 * @return TravelDetails
	 */
	public function isAirTravel(bool $isAirTravel = false): self
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
	public function setIsAirTravel(bool $isAirTravel = false): void
	{
		$this->isAirTravel = $isAirTravel;
	}
	/**
	 * Getter function for isAirTravel
	 * 
	 * @return bool
	 */
	public function getIsAirTravel(): bool
	{
		return $this->isAirTravel;
	}

	/**
	 * Builder function for airlineCarrier
	 * 
	 * @param string $airlineCarrier
	 * 
	 * @return TravelDetails
	 */
	public function airlineCarrier(string $airlineCarrier): self
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
	public function setAirlineCarrier(string $airlineCarrier): void
	{
		$this->airlineCarrier = $airlineCarrier;
	}
	/**
	 * Getter function for airlineCarrier
	 * 
	 * @return string
	 */
	public function getAirlineCarrier(): string
	{
		return $this->airlineCarrier;
	}

	/**
	 * Builder function for departureDate
	 * 
	 * @param string $departureDate
	 * 
	 * @return TravelDetails
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
	 * Builder function for destination
	 * 
	 * @param string $destination
	 * 
	 * @return TravelDetails
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
	 * Builder function for origin
	 * 
	 * @param string $origin
	 * 
	 * @return TravelDetails
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
	 * Builder function for passengerFirstName
	 * 
	 * @param string $passengerFirstName
	 * 
	 * @return TravelDetails
	 */
	public function passengerFirstName(string $passengerFirstName): self
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
	public function setPassengerFirstName(string $passengerFirstName): void
	{
		$this->passengerFirstName = $passengerFirstName;
	}
	/**
	 * Getter function for passengerFirstName
	 * 
	 * @return string
	 */
	public function getPassengerFirstName(): string
	{
		return $this->passengerFirstName;
	}

	/**
	 * Builder function for passengerLastName
	 * 
	 * @param string $passengerLastName
	 * 
	 * @return TravelDetails
	 */
	public function passengerLastName(string $passengerLastName): self
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
	public function setPassengerLastName(string $passengerLastName): void
	{
		$this->passengerLastName = $passengerLastName;
	}
	/**
	 * Getter function for passengerLastName
	 * 
	 * @return string
	 */
	public function getPassengerLastName(): string
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
		return "class TravelDetails {" . PHP_EOL . 
			"	isAirTravel: " . $this->toIndentedString($this->isAirTravel) . PHP_EOL .
			"	airlineCarrier: " . $this->toIndentedString($this->airlineCarrier) . PHP_EOL .
			"	departureDate: " . $this->toIndentedString($this->departureDate) . PHP_EOL .
			"	destination: " . $this->toIndentedString($this->destination) . PHP_EOL .
			"	origin: " . $this->toIndentedString($this->origin) . PHP_EOL .
			"	passengerFirstName: " . $this->toIndentedString($this->passengerFirstName) . PHP_EOL .
			"	passengerLastName: " . $this->toIndentedString($this->passengerLastName) . PHP_EOL .
		"}";
	}
}
