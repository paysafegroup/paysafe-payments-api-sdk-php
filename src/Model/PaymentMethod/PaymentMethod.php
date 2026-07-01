<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\PaymentMethod;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Represents a payment method used for processing transactions. <p> This class includes details such as the type of payment method, the currency code associated with the payment, and the account Id linked to the payment method. </p>
 */
class PaymentMethod extends BaseModel
{
    private ?string $paymentMethod = null;
    private ?string $currencyCode = null;
    /**
     * Account Id in the Paysafe system
     */
    private ?string $accountId = null;

    /**
     * Builder function for paymentMethod
     *
     * @param string $paymentMethod
     *
     * @return $this
     */
    public function paymentMethod(?string $paymentMethod): self
    {
        $this->setPaymentMethod($paymentMethod);

        return $this;
    }

    /**
     * Setter function for paymentMethod
     *
     * @param string $paymentMethod
     *
     * @return void
     */
    public function setPaymentMethod(?string $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * Getter function for paymentMethod
     *
     * @return ?string
     */
    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }
    /**
     * Builder function for currencyCode
     *
     * @param string $currencyCode
     *
     * @return $this
     */
    public function currencyCode(?string $currencyCode): self
    {
        $this->setCurrencyCode($currencyCode);

        return $this;
    }

    /**
     * Setter function for currencyCode
     *
     * @param string $currencyCode
     *
     * @return void
     */
    public function setCurrencyCode(?string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * Getter function for currencyCode
     *
     * @return ?string
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }
    /**
     * Builder function for accountId
     *
     * @param string $accountId
     *
     * @return $this
     */
    public function accountId(?string $accountId): self
    {
        $this->setAccountId($accountId);

        return $this;
    }

    /**
     * Setter function for accountId
     *
     * @param string $accountId
     *
     * @return void
     */
    public function setAccountId(?string $accountId): void
    {
        $this->accountId = $accountId;
    }

    /**
     * Getter function for accountId
     *
     * @return ?string
     */
    public function getAccountId(): ?string
    {
        return $this->accountId;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class PaymentMethod {" . PHP_EOL
            . "    paymentMethod: " . $this->toIndentedString($this->paymentMethod ?? null) . PHP_EOL
            . "    currencyCode: " . $this->toIndentedString($this->currencyCode ?? null) . PHP_EOL
            . "    accountId: " . $this->toIndentedString($this->accountId ?? null) . PHP_EOL
            . "}";
    }
}
