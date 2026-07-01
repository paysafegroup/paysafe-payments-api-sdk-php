<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * This is an array containing a list of bank accounts that the consumer has linked in order to make Pay by Bank payments, along with additional information about those accounts
 */
class PayByBankAch extends BaseModel
{
    /**
     * This is a token representing an individual bank account that the consumer has linked in order to make Pay by Bank payments
     */
    private ?string $paymentHandleToken = null;
    private ?string $accountType = null;
    /**
     * This is the 9-digit routing number of the bank
     */
    private ?string $routingNumber = null;
    /**
     * This is returned in response. It contains only last 2 digits of bank account
     */
    private ?string $lastDigits = null;

    /**
     * Builder function for paymentHandleToken
     *
     * @param string $paymentHandleToken
     *
     * @return $this
     */
    public function paymentHandleToken(?string $paymentHandleToken): self
    {
        $this->setPaymentHandleToken($paymentHandleToken);

        return $this;
    }

    /**
     * Setter function for paymentHandleToken
     *
     * @param string $paymentHandleToken
     *
     * @return void
     */
    public function setPaymentHandleToken(?string $paymentHandleToken): void
    {
        $this->paymentHandleToken = $paymentHandleToken;
    }

    /**
     * Getter function for paymentHandleToken
     *
     * @return ?string
     */
    public function getPaymentHandleToken(): ?string
    {
        return $this->paymentHandleToken;
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
        return "class PayByBankAch {" . PHP_EOL
            . "    paymentHandleToken: " . $this->toIndentedString($this->paymentHandleToken ?? null) . PHP_EOL
            . "    accountType: " . $this->toIndentedString($this->accountType ?? null) . PHP_EOL
            . "    routingNumber: " . $this->toIndentedString($this->routingNumber ?? null) . PHP_EOL
            . "    lastDigits: " . $this->toIndentedString($this->lastDigits ?? null) . PHP_EOL
            . "}";
    }
}
