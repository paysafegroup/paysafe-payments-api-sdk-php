<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\GooglePay;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\CardExpiry;


/**
 * Google Pay token information. Returned when the stored payment method is a Google Pay token and token_type is GOOGLE_PAY.
 */
class GooglePayTokenDetails extends BaseModel
{
    /**
     * The first 6 digits of the Google Pay's DPAN (Device Primary Account Number) - Bank Identification Number (BIN)
     */
    private ?string $bin = null;
    /**
     * This is the last digits of the Apple Pay's token
     */
    private ?string $lastDigits = null;
    private ?CardExpiry $expiry = null;

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
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class GooglePayTokenDetails {" . PHP_EOL
            . "    bin: " . $this->toIndentedString($this->bin ?? null) . PHP_EOL
            . "    lastDigits: " . $this->toIndentedString($this->lastDigits ?? null) . PHP_EOL
            . "    expiry: " . $this->toIndentedString($this->expiry ?? null) . PHP_EOL
            . "}";
    }
}
