<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Refund;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;


/**
 * RefundList
 */
class RefundList extends BaseModel
{
    private array $refunds = [];
    private ?Meta $meta = null;

    /**
     * Builder function for refunds
     *
     * @param Refund[] $refunds
     *
     * @return $this
     */
    public function refunds(array $refunds): self
    {
        $this->setRefunds($refunds);

        return $this;
    }

    /**
     * Setter function for refunds
     *
     * @param Refund[] $refunds
     *
     * @return void
     */
    public function setRefunds(array $refunds): void
    {
        $this->refunds = $refunds;
    }

    /**
     * Getter function for refunds
     *
     * @return Refund[]
     */
    public function getRefunds(): array
    {
        return $this->refunds ?? [];
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
        return "class RefundList {" . PHP_EOL
            . "    refunds: " . $this->toIndentedString($this->refunds ?? null) . PHP_EOL
            . "    meta: " . $this->toIndentedString($this->meta ?? null) . PHP_EOL
            . "}";
    }
}
