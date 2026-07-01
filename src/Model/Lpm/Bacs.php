<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Mandate;


/**
 * Details of the bacs account to be used for the transaction.
 */
class Bacs extends BaseModel
{
    /**
     * This is an alias for this bank account.
     */
    private ?string $nickName = null;
    /**
     * This is the name of the customer or company that owns the bank account.
     */
    private ?string $accountHolderName = null;
    /**
     * This is the bank account number.
     */
    private ?string $accountNumber = null;
    /**
     * This is the 6-digit sort code that identifies the financial institution and branch of the customer's bank.
     */
    private ?string $sortCode = null;
    private ?Mandate $mandate = null;
    /**
     * These are the last two digits of the account number.
     */
    private ?string $lastDigits = null;

    /**
     * Builder function for nickName
     *
     * @param string $nickName
     *
     * @return $this
     */
    public function nickName(?string $nickName): self
    {
        $this->setNickName($nickName);

        return $this;
    }

    /**
     * Setter function for nickName
     *
     * @param string $nickName
     *
     * @return void
     */
    public function setNickName(?string $nickName): void
    {
        $this->nickName = $nickName;
    }

    /**
     * Getter function for nickName
     *
     * @return ?string
     */
    public function getNickName(): ?string
    {
        return $this->nickName;
    }
    /**
     * Builder function for accountHolderName
     *
     * @param string $accountHolderName
     *
     * @return $this
     */
    public function accountHolderName(?string $accountHolderName): self
    {
        $this->setAccountHolderName($accountHolderName);

        return $this;
    }

    /**
     * Setter function for accountHolderName
     *
     * @param string $accountHolderName
     *
     * @return void
     */
    public function setAccountHolderName(?string $accountHolderName): void
    {
        $this->accountHolderName = $accountHolderName;
    }

    /**
     * Getter function for accountHolderName
     *
     * @return ?string
     */
    public function getAccountHolderName(): ?string
    {
        return $this->accountHolderName;
    }
    /**
     * Builder function for accountNumber
     *
     * @param string $accountNumber
     *
     * @return $this
     */
    public function accountNumber(?string $accountNumber): self
    {
        $this->setAccountNumber($accountNumber);

        return $this;
    }

    /**
     * Setter function for accountNumber
     *
     * @param string $accountNumber
     *
     * @return void
     */
    public function setAccountNumber(?string $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * Getter function for accountNumber
     *
     * @return ?string
     */
    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }
    /**
     * Builder function for sortCode
     *
     * @param string $sortCode
     *
     * @return $this
     */
    public function sortCode(?string $sortCode): self
    {
        $this->setSortCode($sortCode);

        return $this;
    }

    /**
     * Setter function for sortCode
     *
     * @param string $sortCode
     *
     * @return void
     */
    public function setSortCode(?string $sortCode): void
    {
        $this->sortCode = $sortCode;
    }

    /**
     * Getter function for sortCode
     *
     * @return ?string
     */
    public function getSortCode(): ?string
    {
        return $this->sortCode;
    }
    /**
     * Builder function for mandate
     *
     * @param Mandate $mandate
     *
     * @return $this
     */
    public function mandate(?Mandate $mandate): self
    {
        $this->setMandate($mandate);

        return $this;
    }

    /**
     * Setter function for mandate
     *
     * @param Mandate $mandate
     *
     * @return void
     */
    public function setMandate(?Mandate $mandate): void
    {
        $this->mandate = $mandate;
    }

    /**
     * Getter function for mandate
     *
     * @return ?Mandate
     */
    public function getMandate(): ?Mandate
    {
        return $this->mandate;
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
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Bacs {" . PHP_EOL
            . "    nickName: " . $this->toIndentedString($this->nickName ?? null) . PHP_EOL
            . "    accountHolderName: " . $this->toIndentedString($this->accountHolderName ?? null) . PHP_EOL
            . "    accountNumber: " . $this->toIndentedString($this->accountNumber ?? null) . PHP_EOL
            . "    sortCode: " . $this->toIndentedString($this->sortCode ?? null) . PHP_EOL
            . "    mandate: " . $this->toIndentedString($this->mandate ?? null) . PHP_EOL
            . "    lastDigits: " . $this->toIndentedString($this->lastDigits ?? null) . PHP_EOL
            . "}";
    }
}
