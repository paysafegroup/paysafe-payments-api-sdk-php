<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Threeds;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Information about electronic delivery of goods or services
 */
class ElectronicDelivery extends BaseModel
{
    /**
     * Whether the delivery is electronic
     */
    private ?bool $isElectronicDelivery = null;
    /**
     * Email address for electronic delivery
     */
    private ?string $email = null;

    /**
     * Builder function for isElectronicDelivery
     *
     * @param bool $isElectronicDelivery
     *
     * @return $this
     */
    public function isElectronicDelivery(?bool $isElectronicDelivery): self
    {
        $this->setIsElectronicDelivery($isElectronicDelivery);

        return $this;
    }

    /**
     * Setter function for isElectronicDelivery
     *
     * @param bool $isElectronicDelivery
     *
     * @return void
     */
    public function setIsElectronicDelivery(?bool $isElectronicDelivery): void
    {
        $this->isElectronicDelivery = $isElectronicDelivery;
    }

    /**
     * Getter function for isElectronicDelivery
     *
     * @return ?bool
     */
    public function getIsElectronicDelivery(): ?bool
    {
        return $this->isElectronicDelivery;
    }
    /**
     * Builder function for email
     *
     * @param string $email
     *
     * @return $this
     */
    public function email(?string $email): self
    {
        $this->setEmail($email);

        return $this;
    }

    /**
     * Setter function for email
     *
     * @param string $email
     *
     * @return void
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * Getter function for email
     *
     * @return ?string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class ElectronicDelivery {" . PHP_EOL
            . "    isElectronicDelivery: " . $this->toIndentedString($this->isElectronicDelivery ?? null) . PHP_EOL
            . "    email: " . $this->toIndentedString($this->email ?? null) . PHP_EOL
            . "}";
    }
}
