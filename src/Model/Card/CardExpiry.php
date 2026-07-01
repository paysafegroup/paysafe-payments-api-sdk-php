<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Card expiration details.
 */
class CardExpiry extends BaseModel
{
    /**
     * The expiry month of the card (1-12)
     */
    private ?int $month = null;
    /**
     * The expiry year of the card (e.g., 2025)
     */
    private ?int $year = null;

    /**
     * Builder function for month
     *
     * @param int $month
     *
     * @return $this
     */
    public function month(?int $month): self
    {
        $this->setMonth($month);

        return $this;
    }

    /**
     * Setter function for month
     *
     * @param int $month
     *
     * @return void
     */
    public function setMonth(?int $month): void
    {
        $this->month = $month;
    }

    /**
     * Getter function for month
     *
     * @return ?int
     */
    public function getMonth(): ?int
    {
        return $this->month;
    }
    /**
     * Builder function for year
     *
     * @param int $year
     *
     * @return $this
     */
    public function year(?int $year): self
    {
        $this->setYear($year);

        return $this;
    }

    /**
     * Setter function for year
     *
     * @param int $year
     *
     * @return void
     */
    public function setYear(?int $year): void
    {
        $this->year = $year;
    }

    /**
     * Getter function for year
     *
     * @return ?int
     */
    public function getYear(): ?int
    {
        return $this->year;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class CardExpiry {" . PHP_EOL
            . "    month: " . $this->toIndentedString($this->month ?? null) . PHP_EOL
            . "    year: " . $this->toIndentedString($this->year ?? null) . PHP_EOL
            . "}";
    }
}
