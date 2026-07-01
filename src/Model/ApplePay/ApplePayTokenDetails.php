<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\ApplePay;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\CardExpiry;


/**
 * Apple Pay token information. Returned when the stored payment method is an Apple Pay token and token_type is APPLE_PAY.
 */
class ApplePayTokenDetails extends BaseModel
{
    /**
     * The first 6 digits of the Apple Pay's DPAN (Device Primary Account Number) - Bank Identification Number (BIN)
     */
    private ?string $bin = null;
    /**
     * This is the last digits of the Apple Pay's token
     */
    private ?string $lastDigits = null;
    private ?CardExpiry $expiry = null;
    private ?string $status = null;
    private ?string $subtype = null;

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
     * Builder function for subtype
     *
     * @param string $subtype
     *
     * @return $this
     */
    public function subtype(?string $subtype): self
    {
        $this->setSubtype($subtype);

        return $this;
    }

    /**
     * Setter function for subtype
     *
     * @param string $subtype
     *
     * @return void
     */
    public function setSubtype(?string $subtype): void
    {
        $this->subtype = $subtype;
    }

    /**
     * Getter function for subtype
     *
     * @return ?string
     */
    public function getSubtype(): ?string
    {
        return $this->subtype;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class ApplePayTokenDetails {" . PHP_EOL
            . "    bin: " . $this->toIndentedString($this->bin ?? null) . PHP_EOL
            . "    lastDigits: " . $this->toIndentedString($this->lastDigits ?? null) . PHP_EOL
            . "    expiry: " . $this->toIndentedString($this->expiry ?? null) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status ?? null) . PHP_EOL
            . "    subtype: " . $this->toIndentedString($this->subtype ?? null) . PHP_EOL
            . "}";
    }
}
