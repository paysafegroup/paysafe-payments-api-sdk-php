<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * This object should be used only for pay by bank transactions.
 */
class PayByBank extends BaseModel
{
    /**
     * This is your identifier for your consumer and must be unique per consumer
     */
    private ?string $consumerId = null;
    /**
     * Paysafe's unique identifier for your consumer
     */
    private ?string $registrationId = null;
    private ?string $scheme = null;
    private ?PayByBankAch $ach = null;

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
     * Builder function for registrationId
     *
     * @param string $registrationId
     *
     * @return $this
     */
    public function registrationId(?string $registrationId): self
    {
        $this->setRegistrationId($registrationId);

        return $this;
    }

    /**
     * Setter function for registrationId
     *
     * @param string $registrationId
     *
     * @return void
     */
    public function setRegistrationId(?string $registrationId): void
    {
        $this->registrationId = $registrationId;
    }

    /**
     * Getter function for registrationId
     *
     * @return ?string
     */
    public function getRegistrationId(): ?string
    {
        return $this->registrationId;
    }
    /**
     * Builder function for scheme
     *
     * @param string $scheme
     *
     * @return $this
     */
    public function scheme(?string $scheme): self
    {
        $this->setScheme($scheme);

        return $this;
    }

    /**
     * Setter function for scheme
     *
     * @param string $scheme
     *
     * @return void
     */
    public function setScheme(?string $scheme): void
    {
        $this->scheme = $scheme;
    }

    /**
     * Getter function for scheme
     *
     * @return ?string
     */
    public function getScheme(): ?string
    {
        return $this->scheme;
    }
    /**
     * Builder function for ach
     *
     * @param PayByBankAch $ach
     *
     * @return $this
     */
    public function ach(?PayByBankAch $ach): self
    {
        $this->setAch($ach);

        return $this;
    }

    /**
     * Setter function for ach
     *
     * @param PayByBankAch $ach
     *
     * @return void
     */
    public function setAch(?PayByBankAch $ach): void
    {
        $this->ach = $ach;
    }

    /**
     * Getter function for ach
     *
     * @return ?PayByBankAch
     */
    public function getAch(): ?PayByBankAch
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
        return "class PayByBank {" . PHP_EOL
            . "    consumerId: " . $this->toIndentedString($this->consumerId ?? null) . PHP_EOL
            . "    registrationId: " . $this->toIndentedString($this->registrationId ?? null) . PHP_EOL
            . "    scheme: " . $this->toIndentedString($this->scheme ?? null) . PHP_EOL
            . "    ach: " . $this->toIndentedString($this->ach ?? null) . PHP_EOL
            . "}";
    }
}
