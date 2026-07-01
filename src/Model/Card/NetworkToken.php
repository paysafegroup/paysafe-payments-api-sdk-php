<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Holds network token fields.
 */
class NetworkToken extends BaseModel
{
    /**
     * These are the first 6 digits of the network token. Example: 411111
     */
    private ?string $bin = null;
    /**
     * These are the last four digits of the network token. Example: 6585
     */
    private ?string $lastDigits = null;
    private ?string $status = null;
    private ?CardExpiry $expiry = null;
    private ?NetworkTokenCardArt $cardArt = null;

    /**
     * Builder function for bin
     *
     * @param string $bin
     *
     * @return $this
     */
    public function bin(?string $bin): self
    {
        $this->setBin($bin);

        return $this;
    }

    /**
     * Setter function for bin
     *
     * @param string $bin
     *
     * @return void
     */
    public function setBin(?string $bin): void
    {
        $this->bin = $bin;
    }

    /**
     * Getter function for bin
     *
     * @return ?string
     */
    public function getBin(): ?string
    {
        return $this->bin;
    }
    /**
     * Builder function for lastDigits
     *
     * @param string $lastDigits
     *
     * @return $this
     */
    public function lastDigits(?string $lastDigits): self
    {
        $this->setLastDigits($lastDigits);

        return $this;
    }

    /**
     * Setter function for lastDigits
     *
     * @param string $lastDigits
     *
     * @return void
     */
    public function setLastDigits(?string $lastDigits): void
    {
        $this->lastDigits = $lastDigits;
    }

    /**
     * Getter function for lastDigits
     *
     * @return ?string
     */
    public function getLastDigits(): ?string
    {
        return $this->lastDigits;
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
     * Builder function for expiry
     *
     * @param CardExpiry $expiry
     *
     * @return $this
     */
    public function expiry(?CardExpiry $expiry): self
    {
        $this->setExpiry($expiry);

        return $this;
    }

    /**
     * Setter function for expiry
     *
     * @param CardExpiry $expiry
     *
     * @return void
     */
    public function setExpiry(?CardExpiry $expiry): void
    {
        $this->expiry = $expiry;
    }

    /**
     * Getter function for expiry
     *
     * @return ?CardExpiry
     */
    public function getExpiry(): ?CardExpiry
    {
        return $this->expiry;
    }
    /**
     * Builder function for cardArt
     *
     * @param NetworkTokenCardArt $cardArt
     *
     * @return $this
     */
    public function cardArt(?NetworkTokenCardArt $cardArt): self
    {
        $this->setCardArt($cardArt);

        return $this;
    }

    /**
     * Setter function for cardArt
     *
     * @param NetworkTokenCardArt $cardArt
     *
     * @return void
     */
    public function setCardArt(?NetworkTokenCardArt $cardArt): void
    {
        $this->cardArt = $cardArt;
    }

    /**
     * Getter function for cardArt
     *
     * @return ?NetworkTokenCardArt
     */
    public function getCardArt(): ?NetworkTokenCardArt
    {
        return $this->cardArt;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class NetworkToken {" . PHP_EOL
            . "    bin: " . $this->toIndentedString($this->bin ?? null) . PHP_EOL
            . "    lastDigits: " . $this->toIndentedString($this->lastDigits ?? null) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status ?? null) . PHP_EOL
            . "    expiry: " . $this->toIndentedString($this->expiry ?? null) . PHP_EOL
            . "    cardArt: " . $this->toIndentedString($this->cardArt ?? null) . PHP_EOL
            . "}";
    }
}
