<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Lpm\Enums\BankNameCode;


/**
 * SafetyPayCash.
 */
class SafetyPayCash extends BaseModel
{
    private ?string $countryCode = null;
    /**
     * Get bankNameCodes
     */
    private array $bankNameCodes = [];

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
     * Builder function for bankNameCodes
     *
     * @param BankNameCode[] $bankNameCodes
     *
     * @return $this
     */
    public function bankNameCodes(array $bankNameCodes): self
    {
        $this->setBankNameCodes($bankNameCodes);

        return $this;
    }

    /**
     * Setter function for bankNameCodes
     *
     * @param BankNameCode[] $bankNameCodes
     *
     * @return void
     */
    public function setBankNameCodes(array $bankNameCodes): void
    {
        $this->bankNameCodes = $bankNameCodes;
    }

    /**
     * Getter function for bankNameCodes
     *
     * @return BankNameCode[]
     */
    public function getBankNameCodes(): array
    {
        return $this->bankNameCodes ?? [];
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class SafetyPayCash {" . PHP_EOL
            . "    countryCode: " . $this->toIndentedString($this->countryCode ?? null) . PHP_EOL
            . "    bankNameCodes: " . $this->toIndentedString($this->bankNameCodes ?? null) . PHP_EOL
            . "}";
    }
}
