<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\ApplePay;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * This object contains the user's payment credentials
 */
class ApplePayTokenData extends BaseModel
{
    private ?ApplePayTokenPaymentData $paymentData = null;
    private ?ApplePayPaymentMethod $paymentMethod = null;
    /**
     * Transaction identifier parameter returned by Apple Pay JS
     */
    private ?string $transactionIdentifier = null;

    /**
     * Builder function for paymentData
     *
     * @param ApplePayTokenPaymentData $paymentData
     *
     * @return $this
     */
    public function paymentData(?ApplePayTokenPaymentData $paymentData): self
    {
        $this->setPaymentData($paymentData);

        return $this;
    }

    /**
     * Setter function for paymentData
     *
     * @param ApplePayTokenPaymentData $paymentData
     *
     * @return void
     */
    public function setPaymentData(?ApplePayTokenPaymentData $paymentData): void
    {
        $this->paymentData = $paymentData;
    }

    /**
     * Getter function for paymentData
     *
     * @return ?ApplePayTokenPaymentData
     */
    public function getPaymentData(): ?ApplePayTokenPaymentData
    {
        return $this->paymentData;
    }
    /**
     * Builder function for paymentMethod
     *
     * @param ApplePayPaymentMethod $paymentMethod
     *
     * @return $this
     */
    public function paymentMethod(?ApplePayPaymentMethod $paymentMethod): self
    {
        $this->setPaymentMethod($paymentMethod);

        return $this;
    }

    /**
     * Setter function for paymentMethod
     *
     * @param ApplePayPaymentMethod $paymentMethod
     *
     * @return void
     */
    public function setPaymentMethod(?ApplePayPaymentMethod $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * Getter function for paymentMethod
     *
     * @return ?ApplePayPaymentMethod
     */
    public function getPaymentMethod(): ?ApplePayPaymentMethod
    {
        return $this->paymentMethod;
    }
    /**
     * Builder function for transactionIdentifier
     *
     * @param string $transactionIdentifier
     *
     * @return $this
     */
    public function transactionIdentifier(?string $transactionIdentifier): self
    {
        $this->setTransactionIdentifier($transactionIdentifier);

        return $this;
    }

    /**
     * Setter function for transactionIdentifier
     *
     * @param string $transactionIdentifier
     *
     * @return void
     */
    public function setTransactionIdentifier(?string $transactionIdentifier): void
    {
        $this->transactionIdentifier = $transactionIdentifier;
    }

    /**
     * Getter function for transactionIdentifier
     *
     * @return ?string
     */
    public function getTransactionIdentifier(): ?string
    {
        return $this->transactionIdentifier;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class ApplePayTokenData {" . PHP_EOL
            . "    paymentData: " . $this->toIndentedString($this->paymentData ?? null) . PHP_EOL
            . "    paymentMethod: " . $this->toIndentedString($this->paymentMethod ?? null) . PHP_EOL
            . "    transactionIdentifier: " . $this->toIndentedString($this->transactionIdentifier ?? null) . PHP_EOL
            . "}";
    }
}
