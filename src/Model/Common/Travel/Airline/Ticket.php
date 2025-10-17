<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Information about the Airline Ticket.
 */
class Ticket extends BaseModel
{

	private string $ticketNumber;
	private bool $isRestrictedTicket;
	private string $cityOfTicketIssuing;
	private string $ticketDeliveryMethod;
	private bool $agencyCard;
	private string $ticketIssueDate;
	private int $ticketPrice;
	private int $numberOfPax;

	/**
	 * Builder function for ticketNumber
	 * 
	 * @param string $ticketNumber
	 * 
	 * @return $this
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
	 * Airline ticket number
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
	 * @return $this
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
	 * Indicates whether this ticket is non-refundable.
     * This entry should be supplied on CPS/Passenger Transport 1 or 2 transactions if
	 * the ticket was purchased as a non-refundable ticket. Valid values are: <br />
	 * - false - No restriction (default) <br />
	 * - true - Restricted (non-refundable) ticket
	 * 
	 * @return bool
	 */
	public function getIsRestrictedTicket(): bool
	{
		return $this->isRestrictedTicket;
	}

	/**
	 * Builder function for cityOfTicketIssuing
	 * 
	 * @param string $cityOfTicketIssuing
	 * 
	 * @return $this
	 */
	public function cityOfTicketIssuing(string $cityOfTicketIssuing): self
	{
		$this->setCityOfTicketIssuing($cityOfTicketIssuing);
		
		return $this;
	}

	/**
	 * Setter function for cityOfTicketIssuing
	 * 
	 * @param string $cityOfTicketIssuing
	 * 
	 * @return void
	 */
	public function setCityOfTicketIssuing(string $cityOfTicketIssuing): void
	{
		$this->cityOfTicketIssuing = $cityOfTicketIssuing;
	}

	/**
	 * Place of issue for the ticket for this passenger. Required during settlement request with TSYS processor.
	 * 
	 * @return string
	 */
	public function getCityOfTicketIssuing(): string
	{
		return $this->cityOfTicketIssuing;
	}

	/**
	 * Builder function for ticketDeliveryMethod
	 * 
	 * @param string $ticketDeliveryMethod
	 * 
	 * @return $this
	 */
	public function ticketDeliveryMethod(string $ticketDeliveryMethod): self
	{
		$this->setTicketDeliveryMethod($ticketDeliveryMethod);
		
		return $this;
	}

	/**
	 * Setter function for ticketDeliveryMethod
	 * 
	 * @param string $ticketDeliveryMethod
	 * 
	 * @return void
	 */
	public function setTicketDeliveryMethod(string $ticketDeliveryMethod): void
	{
		$this->ticketDeliveryMethod = $ticketDeliveryMethod;
	}

	/**
	 * Way of delivering the ticket. Required during settlement request with TSYS processor.
	 * 
	 * @return string
	 */
	public function getTicketDeliveryMethod(): string
	{
		return $this->ticketDeliveryMethod;
	}

	/**
	 * Builder function for agencyCard
	 * 
	 * @param bool $agencyCard
	 * 
	 * @return $this
	 */
	public function agencyCard(bool $agencyCard): self
	{
		$this->setAgencyCard($agencyCard);
		
		return $this;
	}

	/**
	 * Setter function for agencyCard
	 * 
	 * @param bool $agencyCard
	 * 
	 * @return void
	 */
	public function setAgencyCard(bool $agencyCard): void
	{
		$this->agencyCard = $agencyCard;
	}

	/**
	 * Getter function for agencyCard
	 * 
	 * @return bool
	 */
	public function getAgencyCard(): bool
	{
		return $this->agencyCard;
	}

	/**
	 * Builder function for ticketIssueDate
	 * 
	 * @param string $ticketIssueDate
	 * 
	 * @return $this
	 */
	public function ticketIssueDate(string $ticketIssueDate): self
	{
		$this->setTicketIssueDate($ticketIssueDate);
		
		return $this;
	}

	/**
	 * Setter function for ticketIssueDate
	 * 
	 * @param string $ticketIssueDate
	 * 
	 * @return void
	 */
	public function setTicketIssueDate(string $ticketIssueDate): void
	{
		$this->ticketIssueDate = $ticketIssueDate;
	}

	/**
	 * Ticket's issue date. Sometime it is different that the date of the transaction (can be before that).
	 * Date format = YYYY-MM-DD, ISO 8601, i.e. 2021-01-26
	 * 
	 * @return string
	 */
	public function getTicketIssueDate(): string
	{
		return $this->ticketIssueDate;
	}

	/**
	 * Builder function for ticketPrice
	 * 
	 * @param int $ticketPrice
	 * 
	 * @return $this
	 */
	public function ticketPrice(int $ticketPrice): self
	{
		$this->setTicketPrice($ticketPrice);
		
		return $this;
	}

	/**
	 * Setter function for ticketPrice
	 * 
	 * @param int $ticketPrice
	 * 
	 * @return void
	 */
	public function setTicketPrice(int $ticketPrice): void
	{
		$this->ticketPrice = $ticketPrice;
	}

	/**
	 * Price for one ticket.
	 * 
	 * @return int
	 */
	public function getTicketPrice(): int
	{
		return $this->ticketPrice;
	}

	/**
	 * Builder function for numberOfPax
	 * 
	 * @param int $numberOfPax
	 * 
	 * @return $this
	 */
	public function numberOfPax(int $numberOfPax): self
	{
		$this->setNumberOfPax($numberOfPax);
		
		return $this;
	}

	/**
	 * Setter function for numberOfPax
	 * 
	 * @param int $numberOfPax
	 * 
	 * @return void
	 */
	public function setNumberOfPax(int $numberOfPax): void
	{
		$this->numberOfPax = $numberOfPax;
	}

	/**
	 * The number of the passengers which tickets are with the same PNR.
     * Required during settlement request with TSYS processor.
	 * 
	 * @return int
	 */
	public function getNumberOfPax(): int
	{
		return $this->numberOfPax;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Ticket {" . PHP_EOL
			. "    ticketNumber: " . $this->toIndentedString($this->ticketNumber) . PHP_EOL
			. "    isRestrictedTicket: " . $this->toIndentedString($this->isRestrictedTicket) . PHP_EOL
			. "    cityOfTicketIssuing: " . $this->toIndentedString($this->cityOfTicketIssuing) . PHP_EOL
			. "    ticketDeliveryMethod: " . $this->toIndentedString($this->ticketDeliveryMethod) . PHP_EOL
			. "    agencyCard: " . $this->toIndentedString($this->agencyCard) . PHP_EOL
			. "    ticketIssueDate: " . $this->toIndentedString($this->ticketIssueDate) . PHP_EOL
			. "    ticketPrice: " . $this->toIndentedString($this->ticketPrice) . PHP_EOL
			. "    numberOfPax: " . $this->toIndentedString($this->numberOfPax) . PHP_EOL
			. "}";
	}
}
