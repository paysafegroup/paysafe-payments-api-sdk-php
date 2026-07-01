<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Customer\Customer;


/**
 * These are the details of the rapid transfer used for the transaction.
 */
class RapidTransfer extends BaseModel
{
    /**
     * Customer/end-user email id which will be the unique identifier of the user at Skrill end
     */
    private ?string $consumerId = null;
    /**
     * Two-digit unique country code to identify the area of operation of bank account and currency. See [Country codes](https://developer.paysafe.com/en/support/reference-information/codes/#country-codes)
     */
    private ?string $countryCode = null;

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
     * Builder function for countryCode
     *
     * @param string $countryCode
     *
     * @return $this
     */
    public function countryCode(?string $countryCode): self
    {
        $this->setCountryCode($countryCode);

        return $this;
    }

    /**
     * Setter function for countryCode
     *
     * @param string $countryCode
     *
     * @return void
     */
    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * Getter function for countryCode
     *
     * @return ?string
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class RapidTransfer {" . PHP_EOL
            . "    consumerId: " . $this->toIndentedString($this->consumerId ?? null) . PHP_EOL
            . "    countryCode: " . $this->toIndentedString($this->countryCode ?? null) . PHP_EOL
            . "}";
    }
}
