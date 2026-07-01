<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Cruise;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Information about the Cruise line Ticket Number and if the ticket is restricted. Required during settlement. <br>**Note:** This object is only for Cruise line Merchants.
 */
class CruiselineTicket extends BaseModel
{
    /**
     * Cruise ticket number. Required during settlement
     */
    private ?string $ticketNumber = null;
    /**
     * Indicates whether this ticket is non-refundable. false - No restriction (default), true - Restricted (non-refundable) ticket. Required during settlement request for integration with TSYS processor
     */
    private ?bool $isRestrictedTicket = null;

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
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class CruiselineTicket {" . PHP_EOL
            . "    ticketNumber: " . $this->toIndentedString($this->ticketNumber ?? null) . PHP_EOL
            . "    isRestrictedTicket: " . $this->toIndentedString($this->isRestrictedTicket ?? null) . PHP_EOL
            . "}";
    }
}
