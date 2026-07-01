<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Details of the billing cycle information for recurring payments. |REQUIRED|CONDITION |-|- |Conditional|Mandatory if authenticationPurpose = INSTALMENT_TRANSACTION or RECURRING_TRANSACTION
 */
class BillingCycle extends BaseModel
{
    /**
     * Frequency of the recurring payment
     */
    private ?int $frequency = null;
    /**
     * Date when the recurring payment will end
     */
    private ?string $endDate = null;

    /**
     * Builder function for frequency
     *
     * @param int $frequency
     *
     * @return $this
     */
    public function frequency(?int $frequency): self
    {
        $this->setFrequency($frequency);

        return $this;
    }

    /**
     * Setter function for frequency
     *
     * @param int $frequency
     *
     * @return void
     */
    public function setFrequency(?int $frequency): void
    {
        $this->frequency = $frequency;
    }

    /**
     * Getter function for frequency
     *
     * @return ?int
     */
    public function getFrequency(): ?int
    {
        return $this->frequency;
    }
    /**
     * Builder function for endDate
     *
     * @param string $endDate
     *
     * @return $this
     */
    public function endDate(?string $endDate): self
    {
        $this->setEndDate($endDate);

        return $this;
    }

    /**
     * Setter function for endDate
     *
     * @param string $endDate
     *
     * @return void
     */
    public function setEndDate(?string $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * Getter function for endDate
     *
     * @return ?string
     */
    public function getEndDate(): ?string
    {
        return $this->endDate;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class BillingCycle {" . PHP_EOL
            . "    frequency: " . $this->toIndentedString($this->frequency ?? null) . PHP_EOL
            . "    endDate: " . $this->toIndentedString($this->endDate ?? null) . PHP_EOL
            . "}";
    }
}
