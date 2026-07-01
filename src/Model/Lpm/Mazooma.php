<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Mazooma details to be used for the transaction.
 */
class Mazooma extends BaseModel
{
    /**
     * This is a field identifying the customer
     */
    private ?string $consumerId = null;
    private ?MazoomaAch $ach = null;

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
     * Builder function for ach
     *
     * @param MazoomaAch $ach
     *
     * @return $this
     */
    public function ach(?MazoomaAch $ach): self
    {
        $this->setAch($ach);

        return $this;
    }

    /**
     * Setter function for ach
     *
     * @param MazoomaAch $ach
     *
     * @return void
     */
    public function setAch(?MazoomaAch $ach): void
    {
        $this->ach = $ach;
    }

    /**
     * Getter function for ach
     *
     * @return ?MazoomaAch
     */
    public function getAch(): ?MazoomaAch
    {
        return $this->ach;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Mazooma {" . PHP_EOL
            . "    consumerId: " . $this->toIndentedString($this->consumerId ?? null) . PHP_EOL
            . "    ach: " . $this->toIndentedString($this->ach ?? null) . PHP_EOL
            . "}";
    }
}
