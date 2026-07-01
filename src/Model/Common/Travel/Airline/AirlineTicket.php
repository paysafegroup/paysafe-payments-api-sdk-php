<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Information about the Airline Ticket Number and if the ticket is restricted.
 */
class AirlineTicket extends BaseModel
{
    /**
     * Airline ticket number
     */
    private ?string $ticketNumber = null;
    /**
     * Indicates whether this ticket is non-refundable. false - No restriction (default), true - Restricted (non-refundable) ticket
     */
    private ?bool $isRestrictedTicket = null;
    /**
     * City where the ticket was issued
     */
    private ?string $cityOfTicketIssuing = null;
    private ?string $ticketDeliveryMethod = null;
    /**
     * Specifies whether the purchaser is the ticket holder or agency
     */
    private ?bool $isAgencyCard = null;
    /**
     * Ticket's issue date. Date format YYYY-MM-DD, ISO 8601, e.g., 2021-01-26
     */
    private ?string $ticketIssueDate = null;
    /**
     * Price for one ticket
     */
    private ?float $ticketPrice = null;
    /**
     * The number of the passengers which tickets are with the same PNR. Required during settlement request with TSYS processor
     */
    private ?int $numberOfPax = null;

    /**
     * Builder function for ticketNumber
     *
     * @param string $ticketNumber
     *
     * @return $this
     */
    public function ticketNumber(?string $ticketNumber): self
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
    public function setTicketNumber(?string $ticketNumber): void
    {
        $this->ticketNumber = $ticketNumber;
    }

    /**
     * Getter function for ticketNumber
     *
     * @return ?string
     */
    public function getTicketNumber(): ?string
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
    public function isRestrictedTicket(?bool $isRestrictedTicket): self
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
    public function setIsRestrictedTicket(?bool $isRestrictedTicket): void
    {
        $this->isRestrictedTicket = $isRestrictedTicket;
    }

    /**
     * Getter function for isRestrictedTicket
     *
     * @return ?bool
     */
    public function getIsRestrictedTicket(): ?bool
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
    public function cityOfTicketIssuing(?string $cityOfTicketIssuing): self
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
    public function setCityOfTicketIssuing(?string $cityOfTicketIssuing): void
    {
        $this->cityOfTicketIssuing = $cityOfTicketIssuing;
    }

    /**
     * Getter function for cityOfTicketIssuing
     *
     * @return ?string
     */
    public function getCityOfTicketIssuing(): ?string
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
    public function ticketDeliveryMethod(?string $ticketDeliveryMethod): self
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
    public function setTicketDeliveryMethod(?string $ticketDeliveryMethod): void
    {
        $this->ticketDeliveryMethod = $ticketDeliveryMethod;
    }

    /**
     * Getter function for ticketDeliveryMethod
     *
     * @return ?string
     */
    public function getTicketDeliveryMethod(): ?string
    {
        return $this->ticketDeliveryMethod;
    }
    /**
     * Builder function for isAgencyCard
     *
     * @param bool $isAgencyCard
     *
     * @return $this
     */
    public function isAgencyCard(?bool $isAgencyCard): self
    {
        $this->setIsAgencyCard($isAgencyCard);

        return $this;
    }

    /**
     * Setter function for isAgencyCard
     *
     * @param bool $isAgencyCard
     *
     * @return void
     */
    public function setIsAgencyCard(?bool $isAgencyCard): void
    {
        $this->isAgencyCard = $isAgencyCard;
    }

    /**
     * Getter function for isAgencyCard
     *
     * @return ?bool
     */
    public function getIsAgencyCard(): ?bool
    {
        return $this->isAgencyCard;
    }
    /**
     * Builder function for ticketIssueDate
     *
     * @param string $ticketIssueDate
     *
     * @return $this
     */
    public function ticketIssueDate(?string $ticketIssueDate): self
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
    public function setTicketIssueDate(?string $ticketIssueDate): void
    {
        $this->ticketIssueDate = $ticketIssueDate;
    }

    /**
     * Getter function for ticketIssueDate
     *
     * @return ?string
     */
    public function getTicketIssueDate(): ?string
    {
        return $this->ticketIssueDate;
    }
    /**
     * Builder function for ticketPrice
     *
     * @param float $ticketPrice
     *
     * @return $this
     */
    public function ticketPrice(?float $ticketPrice): self
    {
        $this->setTicketPrice($ticketPrice);

        return $this;
    }

    /**
     * Setter function for ticketPrice
     *
     * @param float $ticketPrice
     *
     * @return void
     */
    public function setTicketPrice(?float $ticketPrice): void
    {
        $this->ticketPrice = $ticketPrice;
    }

    /**
     * Getter function for ticketPrice
     *
     * @return ?float
     */
    public function getTicketPrice(): ?float
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
    public function numberOfPax(?int $numberOfPax): self
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
    public function setNumberOfPax(?int $numberOfPax): void
    {
        $this->numberOfPax = $numberOfPax;
    }

    /**
     * Getter function for numberOfPax
     *
     * @return ?int
     */
    public function getNumberOfPax(): ?int
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
        return "class AirlineTicket {" . PHP_EOL
            . "    ticketNumber: " . $this->toIndentedString($this->ticketNumber ?? null) . PHP_EOL
            . "    isRestrictedTicket: " . $this->toIndentedString($this->isRestrictedTicket ?? null) . PHP_EOL
            . "    cityOfTicketIssuing: " . $this->toIndentedString($this->cityOfTicketIssuing ?? null) . PHP_EOL
            . "    ticketDeliveryMethod: " . $this->toIndentedString($this->ticketDeliveryMethod ?? null) . PHP_EOL
            . "    isAgencyCard: " . $this->toIndentedString($this->isAgencyCard ?? null) . PHP_EOL
            . "    ticketIssueDate: " . $this->toIndentedString($this->ticketIssueDate ?? null) . PHP_EOL
            . "    ticketPrice: " . $this->toIndentedString($this->ticketPrice ?? null) . PHP_EOL
            . "    numberOfPax: " . $this->toIndentedString($this->numberOfPax ?? null) . PHP_EOL
            . "}";
    }
}
