<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Threeds;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Shipping usage information
 */
class ShippingDetailsUsage extends BaseModel
{
    /**
     * Whether the shipping name matches the cardholder name
     */
    private ?bool $cardHolderNameMatch = null;
    /**
     * Date when the shipping address was first used the 3DS Requestor
     */
    private ?string $initialUsageDate = null;
    private ?string $initialUsageRange = null;

    /**
     * Builder function for cardHolderNameMatch
     *
     * @param bool $cardHolderNameMatch
     *
     * @return $this
     */
    public function cardHolderNameMatch(?bool $cardHolderNameMatch): self
    {
        $this->setCardHolderNameMatch($cardHolderNameMatch);

        return $this;
    }

    /**
     * Setter function for cardHolderNameMatch
     *
     * @param bool $cardHolderNameMatch
     *
     * @return void
     */
    public function setCardHolderNameMatch(?bool $cardHolderNameMatch): void
    {
        $this->cardHolderNameMatch = $cardHolderNameMatch;
    }

    /**
     * Getter function for cardHolderNameMatch
     *
     * @return ?bool
     */
    public function getCardHolderNameMatch(): ?bool
    {
        return $this->cardHolderNameMatch;
    }
    /**
     * Builder function for initialUsageDate
     *
     * @param string $initialUsageDate
     *
     * @return $this
     */
    public function initialUsageDate(?string $initialUsageDate): self
    {
        $this->setInitialUsageDate($initialUsageDate);

        return $this;
    }

    /**
     * Setter function for initialUsageDate
     *
     * @param string $initialUsageDate
     *
     * @return void
     */
    public function setInitialUsageDate(?string $initialUsageDate): void
    {
        $this->initialUsageDate = $initialUsageDate;
    }

    /**
     * Getter function for initialUsageDate
     *
     * @return ?string
     */
    public function getInitialUsageDate(): ?string
    {
        return $this->initialUsageDate;
    }
    /**
     * Builder function for initialUsageRange
     *
     * @param string $initialUsageRange
     *
     * @return $this
     */
    public function initialUsageRange(?string $initialUsageRange): self
    {
        $this->setInitialUsageRange($initialUsageRange);

        return $this;
    }

    /**
     * Setter function for initialUsageRange
     *
     * @param string $initialUsageRange
     *
     * @return void
     */
    public function setInitialUsageRange(?string $initialUsageRange): void
    {
        $this->initialUsageRange = $initialUsageRange;
    }

    /**
     * Getter function for initialUsageRange
     *
     * @return ?string
     */
    public function getInitialUsageRange(): ?string
    {
        return $this->initialUsageRange;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class ShippingDetailsUsage {" . PHP_EOL
            . "    cardHolderNameMatch: " . $this->toIndentedString($this->cardHolderNameMatch ?? null) . PHP_EOL
            . "    initialUsageDate: " . $this->toIndentedString($this->initialUsageDate ?? null) . PHP_EOL
            . "    initialUsageRange: " . $this->toIndentedString($this->initialUsageRange ?? null) . PHP_EOL
            . "}";
    }
}
