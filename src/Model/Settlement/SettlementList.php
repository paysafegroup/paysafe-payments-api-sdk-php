<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Settlement;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;


/**
 * SettlementList
 */
class SettlementList extends BaseModel
{
    private array $settlements = [];
    private ?Meta $meta = null;

    /**
     * Builder function for settlements
     *
     * @param Settlement[] $settlements
     *
     * @return $this
     */
    public function settlements(array $settlements): self
    {
        $this->setSettlements($settlements);

        return $this;
    }

    /**
     * Setter function for settlements
     *
     * @param Settlement[] $settlements
     *
     * @return void
     */
    public function setSettlements(array $settlements): void
    {
        $this->settlements = $settlements;
    }

    /**
     * Getter function for settlements
     *
     * @return Settlement[]
     */
    public function getSettlements(): array
    {
        return $this->settlements ?? [];
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
        return "class SettlementList {" . PHP_EOL
            . "    settlements: " . $this->toIndentedString($this->settlements ?? null) . PHP_EOL
            . "    meta: " . $this->toIndentedString($this->meta ?? null) . PHP_EOL
            . "}";
    }
}
