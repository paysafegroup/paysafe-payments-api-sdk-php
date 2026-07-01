<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Paymenthandle;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;


/**
 * PaymentHandleList
 */
class PaymentHandleList extends BaseModel
{
    private array $paymentHandles = [];
    private ?Meta $meta = null;

    /**
     * Builder function for paymentHandles
     *
     * @param PaymentHandle[] $paymentHandles
     *
     * @return $this
     */
    public function paymentHandles(array $paymentHandles): self
    {
        $this->setPaymentHandles($paymentHandles);

        return $this;
    }

    /**
     * Setter function for paymentHandles
     *
     * @param PaymentHandle[] $paymentHandles
     *
     * @return void
     */
    public function setPaymentHandles(array $paymentHandles): void
    {
        $this->paymentHandles = $paymentHandles;
    }

    /**
     * Getter function for paymentHandles
     *
     * @return PaymentHandle[]
     */
    public function getPaymentHandles(): array
    {
        return $this->paymentHandles ?? [];
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
        return "class PaymentHandleList {" . PHP_EOL
            . "    paymentHandles: " . $this->toIndentedString($this->paymentHandles ?? null) . PHP_EOL
            . "    meta: " . $this->toIndentedString($this->meta ?? null) . PHP_EOL
            . "}";
    }
}
