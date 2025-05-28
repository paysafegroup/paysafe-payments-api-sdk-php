<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Operating Carrier Code and the Number of the airline flight to be taken on Leg of the trip
 * (excluding the carrier code).
 */
class Flight extends BaseModel
{

	/**
	 * Operating Carrier Code; the standard abbreviation code indicating name
     * of the operating carrier like United Airlines, Jet Blue, etc.
	 * Example: LH
	 */
	private string $carrierCode;

	/**
	 * Number of the airline flight to be taken on Leg of the trip excluding the carrier code.
	 * Example: 0799
	 */
	private string $flightNumber;


	/**
	 * Airline full name.
	 * >Required during settlement request for integration with TSYS processor
	 * Example: Bulgaria Air
	 */
	private string $airlineName;

	/**
	 * Airline ICAO code.
	 * Example: DLH
	 */
	private string $airlineIcaoCode;


	/**
	 * Builder function for carrierCode
	 * 
	 * @param string $carrierCode
	 * 
	 * @return Flight
	 */
	public function carrierCode(string $carrierCode): self
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
	public function setCarrierCode(string $carrierCode): void
	{
		$this->carrierCode = $carrierCode;
	}
	/**
	 * Getter function for carrierCode
	 * 
	 * @return string
	 */
	public function getCarrierCode(): string
	{
		return $this->carrierCode;
	}

	/**
	 * Builder function for flightNumber
	 * 
	 * @param string $flightNumber
	 * 
	 * @return Flight
	 */
	public function flightNumber(string $flightNumber): self
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
	public function setFlightNumber(string $flightNumber): void
	{
		$this->flightNumber = $flightNumber;
	}
	/**
	 * Getter function for flightNumber
	 * 
	 * @return string
	 */
	public function getFlightNumber(): string
	{
		return $this->flightNumber;
	}

	/**
	 * Builder function for airlineName
	 * 
	 * @param string $airlineName
	 * 
	 * @return Flight
	 */
	public function airlineName(string $airlineName): self
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
	public function setAirlineName(string $airlineName): void
	{
		$this->airlineName = $airlineName;
	}
	/**
	 * Getter function for airlineName
	 * 
	 * @return string
	 */
	public function getAirlineName(): string
	{
		return $this->airlineName;
	}

	/**
	 * Builder function for airlineIcaoCode
	 * 
	 * @param string $airlineIcaoCode
	 * 
	 * @return Flight
	 */
	public function airlineIcaoCode(string $airlineIcaoCode): self
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
	public function setAirlineIcaoCode(string $airlineIcaoCode): void
	{
		$this->airlineIcaoCode = $airlineIcaoCode;
	}
	/**
	 * Getter function for airlineIcaoCode
	 * 
	 * @return string
	 */
	public function getAirlineIcaoCode(): string
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
		return "class Flight {" . PHP_EOL . 
			"	carrierCode: " . $this->toIndentedString($this->carrierCode) . PHP_EOL .
			"	flightNumber: " . $this->toIndentedString($this->flightNumber) . PHP_EOL .
			"	airlineName: " . $this->toIndentedString($this->airlineName) . PHP_EOL .
			"	airlineIcaoCode: " . $this->toIndentedString($this->airlineIcaoCode) . PHP_EOL .
		"}";
	}
}
