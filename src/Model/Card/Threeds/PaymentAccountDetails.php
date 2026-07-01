<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Threeds;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Details of the current payment account of the cardholder
 */
class PaymentAccountDetails extends BaseModel
{
    private ?string $createdRange = null;
    /**
     * Date that the cardholder opened the account with the 3DS Requestor (ISO 8601 format)
     */
    private ?string $createdDate = null;

    /**
     * Builder function for createdRange
     *
     * @param string $createdRange
     *
     * @return $this
     */
    public function createdRange(?string $createdRange): self
    {
        $this->setCreatedRange($createdRange);

        return $this;
    }

    /**
     * Setter function for createdRange
     *
     * @param string $createdRange
     *
     * @return void
     */
    public function setCreatedRange(?string $createdRange): void
    {
        $this->createdRange = $createdRange;
    }

    /**
     * Getter function for createdRange
     *
     * @return ?string
     */
    public function getCreatedRange(): ?string
    {
        return $this->createdRange;
    }
    /**
     * Builder function for createdDate
     *
     * @param string $createdDate
     *
     * @return $this
     */
    public function createdDate(?string $createdDate): self
    {
        $this->setCreatedDate($createdDate);

        return $this;
    }

    /**
     * Setter function for createdDate
     *
     * @param string $createdDate
     *
     * @return void
     */
    public function setCreatedDate(?string $createdDate): void
    {
        $this->createdDate = $createdDate;
    }

    /**
     * Getter function for createdDate
     *
     * @return ?string
     */
    public function getCreatedDate(): ?string
    {
        return $this->createdDate;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class PaymentAccountDetails {" . PHP_EOL
            . "    createdRange: " . $this->toIndentedString($this->createdRange ?? null) . PHP_EOL
            . "    createdDate: " . $this->toIndentedString($this->createdDate ?? null) . PHP_EOL
            . "}";
    }
}
