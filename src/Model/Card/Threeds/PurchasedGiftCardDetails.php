<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Threeds;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Details about purchased gift cards
 */
class PurchasedGiftCardDetails extends BaseModel
{
    /**
     * Amount of the gift card in minor units\\
     */
    private ?int $amount = null;
    /**
     * Number of gift cards purchased
     */
    private ?int $count = null;
    private ?string $currency = null;

    /**
     * Builder function for amount
     *
     * @param int $amount
     *
     * @return $this
     */
    public function amount(?int $amount): self
    {
        $this->setAmount($amount);

        return $this;
    }

    /**
     * Setter function for amount
     *
     * @param int $amount
     *
     * @return void
     */
    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Getter function for amount
     *
     * @return ?int
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }
    /**
     * Builder function for count
     *
     * @param int $count
     *
     * @return $this
     */
    public function count(?int $count): self
    {
        $this->setCount($count);

        return $this;
    }

    /**
     * Setter function for count
     *
     * @param int $count
     *
     * @return void
     */
    public function setCount(?int $count): void
    {
        $this->count = $count;
    }

    /**
     * Getter function for count
     *
     * @return ?int
     */
    public function getCount(): ?int
    {
        return $this->count;
    }
    /**
     * Builder function for currency
     *
     * @param string $currency
     *
     * @return $this
     */
    public function currency(?string $currency): self
    {
        $this->setCurrency($currency);

        return $this;
    }

    /**
     * Setter function for currency
     *
     * @param string $currency
     *
     * @return void
     */
    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * Getter function for currency
     *
     * @return ?string
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class PurchasedGiftCardDetails {" . PHP_EOL
            . "    amount: " . $this->toIndentedString($this->amount ?? null) . PHP_EOL
            . "    count: " . $this->toIndentedString($this->count ?? null) . PHP_EOL
            . "    currency: " . $this->toIndentedString($this->currency ?? null) . PHP_EOL
            . "}";
    }
}
