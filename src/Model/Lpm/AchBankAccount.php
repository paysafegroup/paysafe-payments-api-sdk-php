<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * This are the bank details which requires in case of enrollment/payments/payouts.
 */
class AchBankAccount extends BaseModel
{
    /**
     * The id of this bank resource
     */
    private ?string $id = null;
    /**
     * The customers bank account name
     */
    private ?string $bankName = null;
    /**
     * The corresponding registrationId associated with this bank account
     */
    private ?string $registrationId = null;
    /**
     * The routing number of the bank
     */
    private ?string $routingNumber = null;
    /**
     * The customers bank account number
     */
    private ?string $accountNumber = null;
    /**
     * The last digits of bank account number
     */
    private ?string $lastDigits = null;
    /**
     * The unique token associated with this bank account
     */
    private ?string $paymentToken = null;
    /**
     * The unique token associated with this bank account
     */
    private ?string $paymentHandleToken = null;

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
     * Builder function for bankName
     *
     * @param string $bankName
     *
     * @return $this
     */
    public function bankName(?string $bankName): self
    {
        $this->setBankName($bankName);

        return $this;
    }

    /**
     * Setter function for bankName
     *
     * @param string $bankName
     *
     * @return void
     */
    public function setBankName(?string $bankName): void
    {
        $this->bankName = $bankName;
    }

    /**
     * Getter function for bankName
     *
     * @return ?string
     */
    public function getBankName(): ?string
    {
        return $this->bankName;
    }
    /**
     * Builder function for registrationId
     *
     * @param string $registrationId
     *
     * @return $this
     */
    public function registrationId(?string $registrationId): self
    {
        $this->setRegistrationId($registrationId);

        return $this;
    }

    /**
     * Setter function for registrationId
     *
     * @param string $registrationId
     *
     * @return void
     */
    public function setRegistrationId(?string $registrationId): void
    {
        $this->registrationId = $registrationId;
    }

    /**
     * Getter function for registrationId
     *
     * @return ?string
     */
    public function getRegistrationId(): ?string
    {
        return $this->registrationId;
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
     * Builder function for paymentToken
     *
     * @param string $paymentToken
     *
     * @return $this
     */
    public function paymentToken(?string $paymentToken): self
    {
        $this->setPaymentToken($paymentToken);

        return $this;
    }

    /**
     * Setter function for paymentToken
     *
     * @param string $paymentToken
     *
     * @return void
     */
    public function setPaymentToken(?string $paymentToken): void
    {
        $this->paymentToken = $paymentToken;
    }

    /**
     * Getter function for paymentToken
     *
     * @return ?string
     */
    public function getPaymentToken(): ?string
    {
        return $this->paymentToken;
    }
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
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class AchBankAccount {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id ?? null) . PHP_EOL
            . "    bankName: " . $this->toIndentedString($this->bankName ?? null) . PHP_EOL
            . "    registrationId: " . $this->toIndentedString($this->registrationId ?? null) . PHP_EOL
            . "    routingNumber: " . $this->toIndentedString($this->routingNumber ?? null) . PHP_EOL
            . "    accountNumber: " . $this->toIndentedString($this->accountNumber ?? null) . PHP_EOL
            . "    lastDigits: " . $this->toIndentedString($this->lastDigits ?? null) . PHP_EOL
            . "    paymentToken: " . $this->toIndentedString($this->paymentToken ?? null) . PHP_EOL
            . "    paymentHandleToken: " . $this->toIndentedString($this->paymentHandleToken ?? null) . PHP_EOL
            . "}";
    }
}
