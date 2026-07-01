<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * This object should be used only for Splitpay transactions. It is an array containing the linked accounts and the amount shared with each. You must include either amount or percent. However, you cannot include both values.
 */
class Splitpay extends BaseModel
{
    /**
     * This is the ID of the linked account. This account must already be linked to the merchant account.
     */
    private ?string $linkedAccount = null;
    /**
     * This is the amount to transfer to the linked account in minor currency units. The total amount to all linked accounts cannot exceed the transaction total.
     */
    private ?int $amount = null;
    /**
     * This is the percentage of the total transaction amount to transfer to that account. The total percentage to all linked accounts cannot exceed 100%.
     */
    private ?int $percent = null;

    /**
     * Builder function for linkedAccount
     *
     * @param string $linkedAccount
     *
     * @return $this
     */
    public function linkedAccount(?string $linkedAccount): self
    {
        $this->setLinkedAccount($linkedAccount);

        return $this;
    }

    /**
     * Setter function for linkedAccount
     *
     * @param string $linkedAccount
     *
     * @return void
     */
    public function setLinkedAccount(?string $linkedAccount): void
    {
        $this->linkedAccount = $linkedAccount;
    }

    /**
     * Getter function for linkedAccount
     *
     * @return ?string
     */
    public function getLinkedAccount(): ?string
    {
        return $this->linkedAccount;
    }
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
     * Builder function for percent
     *
     * @param int $percent
     *
     * @return $this
     */
    public function percent(?int $percent): self
    {
        $this->setPercent($percent);

        return $this;
    }

    /**
     * Setter function for percent
     *
     * @param int $percent
     *
     * @return void
     */
    public function setPercent(?int $percent): void
    {
        $this->percent = $percent;
    }

    /**
     * Getter function for percent
     *
     * @return ?int
     */
    public function getPercent(): ?int
    {
        return $this->percent;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Splitpay {" . PHP_EOL
            . "    linkedAccount: " . $this->toIndentedString($this->linkedAccount ?? null) . PHP_EOL
            . "    amount: " . $this->toIndentedString($this->amount ?? null) . PHP_EOL
            . "    percent: " . $this->toIndentedString($this->percent ?? null) . PHP_EOL
            . "}";
    }
}
