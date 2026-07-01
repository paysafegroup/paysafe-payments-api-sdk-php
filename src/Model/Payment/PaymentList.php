<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Payment;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;


/**
 * PaymentList
 */
class PaymentList extends BaseModel
{
    private array $payments = [];
    private ?Meta $meta = null;

    /**
     * Builder function for payments
     *
     * @param Payment[] $payments
     *
     * @return $this
     */
    public function payments(array $payments): self
    {
        $this->setPayments($payments);

        return $this;
    }

    /**
     * Setter function for payments
     *
     * @param Payment[] $payments
     *
     * @return void
     */
    public function setPayments(array $payments): void
    {
        $this->payments = $payments;
    }

    /**
     * Getter function for payments
     *
     * @return Payment[]
     */
    public function getPayments(): array
    {
        return $this->payments ?? [];
    }
    /**
     * Builder function for meta
     *
     * @param Meta $meta
     *
     * @return $this
     */
    public function meta(?Meta $meta): self
    {
        $this->setMeta($meta);

        return $this;
    }

    /**
     * Setter function for meta
     *
     * @param Meta $meta
     *
     * @return void
     */
    public function setMeta(?Meta $meta): void
    {
        $this->meta = $meta;
    }

    /**
     * Getter function for meta
     *
     * @return ?Meta
     */
    public function getMeta(): ?Meta
    {
        return $this->meta;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class PaymentList {" . PHP_EOL
            . "    payments: " . $this->toIndentedString($this->payments ?? null) . PHP_EOL
            . "    meta: " . $this->toIndentedString($this->meta ?? null) . PHP_EOL
            . "}";
    }
}
