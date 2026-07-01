<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Verification\Verification;


/**
 * These are the details of the vip preferred account used for the transaction.
 */
class Vippreferred extends BaseModel
{
    /**
     * The is the consumer social security number (SSN). As it is sensitive data the consumerId will not be passed in the response. Last 4 digits will be passed as lastDigits
     */
    private ?string $consumerId = null;
    /**
     * This is the registrationId of the consumer. You can pass the registrationId in place of consumerId in the setup option call
     */
    private ?string $registrationId = null;
    /**
     * This is the bank token of the registered bank account. The bank token is returned in the Verification API response
     */
    private ?string $paymentHandleToken = null;
    private ?AchBankAccount $ach = null;
    /**
     * This contains all the registered ach bank accounts
     */
    private array $achBankAccounts = [];

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
     * Builder function for ach
     *
     * @param AchBankAccount $ach
     *
     * @return $this
     */
    public function ach(?AchBankAccount $ach): self
    {
        $this->setAch($ach);

        return $this;
    }

    /**
     * Setter function for ach
     *
     * @param AchBankAccount $ach
     *
     * @return void
     */
    public function setAch(?AchBankAccount $ach): void
    {
        $this->ach = $ach;
    }

    /**
     * Getter function for ach
     *
     * @return ?AchBankAccount
     */
    public function getAch(): ?AchBankAccount
    {
        return $this->ach;
    }
    /**
     * Builder function for achBankAccounts
     *
     * @param AchBankAccount[] $achBankAccounts
     *
     * @return $this
     */
    public function achBankAccounts(array $achBankAccounts): self
    {
        $this->setAchBankAccounts($achBankAccounts);

        return $this;
    }

    /**
     * Setter function for achBankAccounts
     *
     * @param AchBankAccount[] $achBankAccounts
     *
     * @return void
     */
    public function setAchBankAccounts(array $achBankAccounts): void
    {
        $this->achBankAccounts = $achBankAccounts;
    }

    /**
     * Getter function for achBankAccounts
     *
     * @return AchBankAccount[]
     */
    public function getAchBankAccounts(): array
    {
        return $this->achBankAccounts ?? [];
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Vippreferred {" . PHP_EOL
            . "    consumerId: " . $this->toIndentedString($this->consumerId ?? null) . PHP_EOL
            . "    registrationId: " . $this->toIndentedString($this->registrationId ?? null) . PHP_EOL
            . "    paymentHandleToken: " . $this->toIndentedString($this->paymentHandleToken ?? null) . PHP_EOL
            . "    ach: " . $this->toIndentedString($this->ach ?? null) . PHP_EOL
            . "    achBankAccounts: " . $this->toIndentedString($this->achBankAccounts ?? null) . PHP_EOL
            . "}";
    }
}
