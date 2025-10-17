<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Applepay;

use Paysafe\PhpSdk\Model\Card\TokenExpiry;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Apple Pay token information. Returned when the stored payment method is an Apple Pay token. <br />
 * <ul>
 *   <li>
 *     <b>bin:</b> The first 6 digits of the Apple Pay's DPAN (Device Primary Account Number) -
 * Bank Identification Number (BIN) <br />
 *     Example: 411111
 *   </li>
 *   <li>
 *     <b>lastDigits:</b> This is the last digits of the Apple Pay's token.
 *   </li>
 *   <li>
 *     <b>expiry:</b> This is the expiry date of the DPAN (the token). <br />
 *   </li>
 *   <li>
 *     <b>status:</b> This is the status of the token. <br />
 *     <i>Allowed values: ACTIVE, EXPIRED, DISABLED</i>
 *   </li>
 * </ul>
 */
class ApplePayTokenDetails extends BaseModel
{
    private string $bin;
    private string $lastDigits;
    private TokenExpiry $expiry;
    private string $status;

    /**
     * Builder function for bin
     *
     * @param string $bin
     *
     * @return $this
     */
    public function bin(string $bin): self
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
    public function setBin(string $bin): void
    {
        $this->bin = $bin;
    }

    /**
     * Getter function for bin
     *
     * @return string
     */
    public function getBin(): string
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
    public function lastDigits(string $lastDigits): self
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
    public function setLastDigits(string $lastDigits): void
    {
        $this->lastDigits = $lastDigits;
    }

    /**
     * Getter function for lastDigits
     *
     * @return string
     */
    public function getLastDigits(): string
    {
        return $this->lastDigits;
    }

    /**
     * Builder function for expiry
     *
     * @param TokenExpiry $expiry
     *
     * @return $this
     */
    public function expiry(TokenExpiry $expiry): self
    {
        $this->setExpiry($expiry);
        return $this;
    }

    /**
     * Setter function for expiry
     *
     * @param TokenExpiry $expiry
     *
     * @return void
     */
    public function setExpiry(TokenExpiry $expiry): void
    {
        $this->expiry = $expiry;
    }

    /**
     * Getter function for expiry
     *
     * @return TokenExpiry
     */
    public function getExpiry(): TokenExpiry
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
    public function status(string $status): self
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
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * Getter function for status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class ApplePayTokenDetails {" . PHP_EOL
            . "    bin: " . $this->toIndentedString($this->bin) . PHP_EOL
            . "    lastDigits: " . $this->toIndentedString($this->lastDigits) . PHP_EOL
            . "    expiry: " . $this->toIndentedString($this->expiry) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status) . PHP_EOL
            . "}";
    }
}
