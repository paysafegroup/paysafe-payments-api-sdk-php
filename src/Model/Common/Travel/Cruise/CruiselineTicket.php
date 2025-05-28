<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Cruise;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Information about the [Cruise line Ticket](/schemas/cruiselineTicket) Number and if the ticket is restricted.
* Required during settlement

**Note** This object is only for Cruise line Merchants
 */
class CruiselineTicket extends BaseModel
{


	/**
	 * Cruise ticket number
	 * * Required during settlement
	 * Example: 1234567891011
	 */
	private string $ticketNumber;


	/**
	 * Indicates whether this ticket is non-refundable.
     * This entry should be supplied on CPS/Passenger Transport 1 or 2 transactions if the ticket was purchased
     * as a non-refundable ticket. Valid values are:
	 * 
	 * - false - No restriction (default)
	 * 
	 * - true - Restricted (non-refundable) ticket'
	 * 
	 * * Required during settlement request for integration with TSYS processor
	 */
	private bool $isRestrictedTicket;


	/**
	 * Builder function for ticketNumber
	 * 
	 * @param string $ticketNumber
	 * 
	 * @return CruiselineTicket
	 */
	public function ticketNumber(string $ticketNumber): self
	{
		$this->setTicketNumber($ticketNumber);
		
		return $this;
	}
	/**
	 * Setter function for ticketNumber
	 * 
	 * @param string $ticketNumber
	 * 
	 * @return void
	 */
	public function setTicketNumber(string $ticketNumber): void
	{
		$this->ticketNumber = $ticketNumber;
	}
	/**
	 * Getter function for ticketNumber
	 * 
	 * @return string
	 */
	public function getTicketNumber(): string
	{
		return $this->ticketNumber;
	}

	/**
	 * Builder function for isRestrictedTicket
	 * 
	 * @param bool $isRestrictedTicket
	 * 
	 * @return CruiselineTicket
	 */
	public function isRestrictedTicket(bool $isRestrictedTicket): self
	{
		$this->setIsRestrictedTicket($isRestrictedTicket);
		
		return $this;
	}
	/**
	 * Setter function for isRestrictedTicket
	 * 
	 * @param bool $isRestrictedTicket
	 * 
	 * @return void
	 */
	public function setIsRestrictedTicket(bool $isRestrictedTicket): void
	{
		$this->isRestrictedTicket = $isRestrictedTicket;
	}
	/**
	 * Getter function for isRestrictedTicket
	 * 
	 * @return bool
	 */
	public function getIsRestrictedTicket(): bool
	{
		return $this->isRestrictedTicket;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class CruiselineTicket {" . PHP_EOL .
			"	ticketNumber: " . $this->toIndentedString($this->ticketNumber) . PHP_EOL .
			"	isRestrictedTicket: " . $this->toIndentedString($this->isRestrictedTicket) . PHP_EOL .
		"}";
	}
}
