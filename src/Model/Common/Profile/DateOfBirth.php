<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Profile;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Customer\Customer;


/**
 * Customer's date of birth information
 */
class DateOfBirth extends BaseModel
{
    /**
     * Day of birth
     */
    private ?int $day = null;
    /**
     * Month of birth
     */
    private ?int $month = null;
    /**
     * Year of birth
     */
    private ?int $year = null;

    /**
     * Builder function for day
     *
     * @param int $day
     *
     * @return $this
     */
    public function day(?int $day): self
    {
        $this->setDay($day);

        return $this;
    }

    /**
     * Setter function for day
     *
     * @param int $day
     *
     * @return void
     */
    public function setDay(?int $day): void
    {
        $this->day = $day;
    }

    /**
     * Getter function for day
     *
     * @return ?int
     */
    public function getDay(): ?int
    {
        return $this->day;
    }
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
        return "class DateOfBirth {" . PHP_EOL
            . "    day: " . $this->toIndentedString($this->day ?? null) . PHP_EOL
            . "    month: " . $this->toIndentedString($this->month ?? null) . PHP_EOL
            . "    year: " . $this->toIndentedString($this->year ?? null) . PHP_EOL
            . "}";
    }
}
