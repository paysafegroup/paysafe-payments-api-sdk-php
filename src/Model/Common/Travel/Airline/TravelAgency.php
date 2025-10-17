<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;

use Paysafe\PhpSdk\Model\Common\Travel\Airline\AgencyAddress;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Information about the travel agency if the ticket was issued by a travel agency.
 */
class TravelAgency extends BaseModel
{

	/**
	 * Code identifying travel agency if the ticket was issued by a travel agency..
	 * Example: MY AGENT
	 */
	private string $code;

	/**
	 * Information about the travel agency if the ticket was issued by a travel agency.
	 * Example: MYAGENT347
	 */
	private string $name;

	private AgencyAddress $agencyAddress;

	/**
	 * Builder function for code
	 * 
	 * @param string $code
	 * 
	 * @return TravelAgency
	 */
	public function code(string $code): self
	{
		$this->setCode($code);
		
		return $this;
	}
	/**
	 * Setter function for code
	 * 
	 * @param string $code
	 * 
	 * @return void
	 */
	public function setCode(string $code): void
	{
		$this->code = $code;
	}
	/**
	 * Getter function for code
	 * 
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * Builder function for name
	 * 
	 * @param string $name
	 * 
	 * @return TravelAgency
	 */
	public function name(string $name): self
	{
		$this->setName($name);
		
		return $this;
	}
	/**
	 * Setter function for name
	 * 
	 * @param string $name
	 * 
	 * @return void
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}
	/**
	 * Getter function for name
	 * 
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Builder function for agencyAddress
	 * 
	 * @param AgencyAddress $agencyAddress
	 * 
	 * @return TravelAgency
	 */
	public function agencyAddress(AgencyAddress $agencyAddress): self
	{
		$this->setAgencyAddress($agencyAddress);
		
		return $this;
	}
	/**
	 * Setter function for agencyAddress
	 * 
	 * @param AgencyAddress $agencyAddress
	 * 
	 * @return void
	 */
	public function setAgencyAddress(AgencyAddress $agencyAddress): void
	{
		$this->agencyAddress = $agencyAddress;
	}
	/**
	 * Getter function for agencyAddress
	 * 
	 * @return AgencyAddress
	 */
	public function getAgencyAddress(): AgencyAddress
	{
		return $this->agencyAddress;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class TravelAgency {" . PHP_EOL .
			"	code: " . $this->toIndentedString($this->code) . PHP_EOL .
			"	name: " . $this->toIndentedString($this->name) . PHP_EOL .
			"	agencyAddress: " . $this->toIndentedString($this->agencyAddress) . PHP_EOL .
		"}";
	}
}
