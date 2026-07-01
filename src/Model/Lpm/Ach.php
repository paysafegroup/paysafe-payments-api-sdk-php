<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Details of the ach account to be used for the transaction.
 */
class Ach extends BaseModel
{
    /**
     * This is the name of the customer or company.
     */
    private ?string $accountHolderName = null;
    private ?string $payMethod = null;
    private ?string $accountType = null;
    /**
     * This is the bank account number.
     */
    private ?string $accountNumber = null;
    /**
     * For USD accounts, this is the 9-digit routing number of the bank.
     */
    private ?string $routingNumber = null;
    /**
     * This is returned in response. It contains only last 2 digits of bank account.
     */
    private ?string $lastDigits = null;

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
     * Builder function for payMethod
     *
     * @param string $payMethod
     *
     * @return $this
     */
    public function payMethod(?string $payMethod): self
    {
        $this->setPayMethod($payMethod);

        return $this;
    }

    /**
     * Setter function for payMethod
     *
     * @param string $payMethod
     *
     * @return void
     */
    public function setPayMethod(?string $payMethod): void
    {
        $this->payMethod = $payMethod;
    }

    /**
     * Getter function for payMethod
     *
     * @return ?string
     */
    public function getPayMethod(): ?string
    {
        return $this->payMethod;
    }
    /**
     * Builder function for accountType
     *
     * @param string $accountType
     *
     * @return $this
     */
    public function accountType(?string $accountType): self
    {
        $this->setAccountType($accountType);

        return $this;
    }

    /**
     * Setter function for accountType
     *
     * @param string $accountType
     *
     * @return void
     */
    public function setAccountType(?string $accountType): void
    {
        $this->accountType = $accountType;
    }

    /**
     * Getter function for accountType
     *
     * @return ?string
     */
    public function getAccountType(): ?string
    {
        return $this->accountType;
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
     * Builder function for routingNumber
     *
     * @param string $routingNumber
     *
     * @return $this
     */
    public function routingNumber(?string $routingNumber): self
    {
        $this->setRoutingNumber($routingNumber);

        return $this;
    }

    /**
     * Setter function for routingNumber
     *
     * @param string $routingNumber
     *
     * @return void
     */
    public function setRoutingNumber(?string $routingNumber): void
    {
        $this->routingNumber = $routingNumber;
    }

    /**
     * Getter function for routingNumber
     *
     * @return ?string
     */
    public function getRoutingNumber(): ?string
    {
        return $this->routingNumber;
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
        return "class Ach {" . PHP_EOL
            . "    accountHolderName: " . $this->toIndentedString($this->accountHolderName ?? null) . PHP_EOL
            . "    payMethod: " . $this->toIndentedString($this->payMethod ?? null) . PHP_EOL
            . "    accountType: " . $this->toIndentedString($this->accountType ?? null) . PHP_EOL
            . "    accountNumber: " . $this->toIndentedString($this->accountNumber ?? null) . PHP_EOL
            . "    routingNumber: " . $this->toIndentedString($this->routingNumber ?? null) . PHP_EOL
            . "    lastDigits: " . $this->toIndentedString($this->lastDigits ?? null) . PHP_EOL
            . "}";
    }
}
