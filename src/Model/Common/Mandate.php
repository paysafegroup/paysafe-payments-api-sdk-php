<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Customer\Customer;


/**
 * Customer bank's mandate details for recurring payments
 */
class Mandate extends BaseModel
{
    /**
     * The id of the mandate that got created
     */
    private ?string $id = null;
    /**
     * The identifier of the mandate in the banking system
     */
    private ?string $reference = null;
    private ?string $status = null;
    private ?string $statusReason = null;

    /**
     * Builder function for id
     *
     * @param string $id
     *
     * @return $this
     */
    public function id(?string $id): self
    {
        $this->setId($id);

        return $this;
    }

    /**
     * Setter function for id
     *
     * @param string $id
     *
     * @return void
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter function for id
     *
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Builder function for reference
     *
     * @param string $reference
     *
     * @return $this
     */
    public function reference(?string $reference): self
    {
        $this->setReference($reference);

        return $this;
    }

    /**
     * Setter function for reference
     *
     * @param string $reference
     *
     * @return void
     */
    public function setReference(?string $reference): void
    {
        $this->reference = $reference;
    }

    /**
     * Getter function for reference
     *
     * @return ?string
     */
    public function getReference(): ?string
    {
        return $this->reference;
    }
    /**
     * Builder function for status
     *
     * @param string $status
     *
     * @return $this
     */
    public function status(?string $status): self
    {
        $this->setStatus($status);

        return $this;
    }

    /**
     * Setter function for status
     *
     * @param string $status
     *
     * @return void
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Getter function for status
     *
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * Builder function for statusReason
     *
     * @param string $statusReason
     *
     * @return $this
     */
    public function statusReason(?string $statusReason): self
    {
        $this->setStatusReason($statusReason);

        return $this;
    }

    /**
     * Setter function for statusReason
     *
     * @param string $statusReason
     *
     * @return void
     */
    public function setStatusReason(?string $statusReason): void
    {
        $this->statusReason = $statusReason;
    }

    /**
     * Getter function for statusReason
     *
     * @return ?string
     */
    public function getStatusReason(): ?string
    {
        return $this->statusReason;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Mandate {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id ?? null) . PHP_EOL
            . "    reference: " . $this->toIndentedString($this->reference ?? null) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status ?? null) . PHP_EOL
            . "    statusReason: " . $this->toIndentedString($this->statusReason ?? null) . PHP_EOL
            . "}";
    }
}
