<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * These are the details of the skrill 1-Tap account used for the transaction.
 */
class Skrill1Tap extends BaseModel
{
    /**
     * Unique ID of the user which is used to identify to account and user in subsequent calls
     */
    private ?string $consumerId = null;
    /**
     * This is a description to be shown on the Skrill payment page in the logo area if there is no logo url parameter. If no value is submitted and there is no logo, the pay_to_email value is shown as the recipient of the payment
     */
    private ?string $recipientDescription = null;
    /**
     * This acts as an upper limit, any subsequent transactions for this subscription cannot be more than the maxAmount set
     */
    private ?int $maxAmount = null;

    /**
     * Builder function for consumerId
     *
     * @param string $consumerId
     *
     * @return $this
     */
    public function consumerId(?string $consumerId): self
    {
        $this->setConsumerId($consumerId);

        return $this;
    }

    /**
     * Setter function for consumerId
     *
     * @param string $consumerId
     *
     * @return void
     */
    public function setConsumerId(?string $consumerId): void
    {
        $this->consumerId = $consumerId;
    }

    /**
     * Getter function for consumerId
     *
     * @return ?string
     */
    public function getConsumerId(): ?string
    {
        return $this->consumerId;
    }
    /**
     * Builder function for recipientDescription
     *
     * @param string $recipientDescription
     *
     * @return $this
     */
    public function recipientDescription(?string $recipientDescription): self
    {
        $this->setRecipientDescription($recipientDescription);

        return $this;
    }

    /**
     * Setter function for recipientDescription
     *
     * @param string $recipientDescription
     *
     * @return void
     */
    public function setRecipientDescription(?string $recipientDescription): void
    {
        $this->recipientDescription = $recipientDescription;
    }

    /**
     * Getter function for recipientDescription
     *
     * @return ?string
     */
    public function getRecipientDescription(): ?string
    {
        return $this->recipientDescription;
    }
    /**
     * Builder function for maxAmount
     *
     * @param int $maxAmount
     *
     * @return $this
     */
    public function maxAmount(?int $maxAmount): self
    {
        $this->setMaxAmount($maxAmount);

        return $this;
    }

    /**
     * Setter function for maxAmount
     *
     * @param int $maxAmount
     *
     * @return void
     */
    public function setMaxAmount(?int $maxAmount): void
    {
        $this->maxAmount = $maxAmount;
    }

    /**
     * Getter function for maxAmount
     *
     * @return ?int
     */
    public function getMaxAmount(): ?int
    {
        return $this->maxAmount;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Skrill1Tap {" . PHP_EOL
            . "    consumerId: " . $this->toIndentedString($this->consumerId ?? null) . PHP_EOL
            . "    recipientDescription: " . $this->toIndentedString($this->recipientDescription ?? null) . PHP_EOL
            . "    maxAmount: " . $this->toIndentedString($this->maxAmount ?? null) . PHP_EOL
            . "}";
    }
}
