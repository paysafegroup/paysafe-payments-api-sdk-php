<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\ApplePay;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Apple Pay payment method information for processing payments through the Paysafe platform. This contains all necessary information to process an Apple Pay transaction, including the payment token from Apple and optional billing information.
 */
class ApplePay extends BaseModel
{
    /**
     * The label displayed on the Apple Pay button. This text influences what users see during the Apple Pay flow. Recommended values: \"Buy with Apple Pay\", \"Pay with Apple Pay\", \"Donate with Apple Pay\"
     */
    private ?string $label = null;
    /**
     * Whether to request the billing address from the customer. Setting this to true will prompt the user to provide billing details during the Apple Pay checkout process.
     */
    private ?bool $requestBillingAddress = null;
    private ?ApplePayPaymentToken $applePayPaymentToken = null;
    private ?ApplePayBillingContact $billingContact = null;

    /**
     * Builder function for label
     *
     * @param string $label
     *
     * @return $this
     */
    public function label(?string $label): self
    {
        $this->setLabel($label);

        return $this;
    }

    /**
     * Setter function for label
     *
     * @param string $label
     *
     * @return void
     */
    public function setLabel(?string $label): void
    {
        $this->label = $label;
    }

    /**
     * Getter function for label
     *
     * @return ?string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }
    /**
     * Builder function for requestBillingAddress
     *
     * @param bool $requestBillingAddress
     *
     * @return $this
     */
    public function requestBillingAddress(?bool $requestBillingAddress): self
    {
        $this->setRequestBillingAddress($requestBillingAddress);

        return $this;
    }

    /**
     * Setter function for requestBillingAddress
     *
     * @param bool $requestBillingAddress
     *
     * @return void
     */
    public function setRequestBillingAddress(?bool $requestBillingAddress): void
    {
        $this->requestBillingAddress = $requestBillingAddress;
    }

    /**
     * Getter function for requestBillingAddress
     *
     * @return ?bool
     */
    public function getRequestBillingAddress(): ?bool
    {
        return $this->requestBillingAddress;
    }
    /**
     * Builder function for applePayPaymentToken
     *
     * @param ApplePayPaymentToken $applePayPaymentToken
     *
     * @return $this
     */
    public function applePayPaymentToken(?ApplePayPaymentToken $applePayPaymentToken): self
    {
        $this->setApplePayPaymentToken($applePayPaymentToken);

        return $this;
    }

    /**
     * Setter function for applePayPaymentToken
     *
     * @param ApplePayPaymentToken $applePayPaymentToken
     *
     * @return void
     */
    public function setApplePayPaymentToken(?ApplePayPaymentToken $applePayPaymentToken): void
    {
        $this->applePayPaymentToken = $applePayPaymentToken;
    }

    /**
     * Getter function for applePayPaymentToken
     *
     * @return ?ApplePayPaymentToken
     */
    public function getApplePayPaymentToken(): ?ApplePayPaymentToken
    {
        return $this->applePayPaymentToken;
    }
    /**
     * Builder function for billingContact
     *
     * @param ApplePayBillingContact $billingContact
     *
     * @return $this
     */
    public function billingContact(?ApplePayBillingContact $billingContact): self
    {
        $this->setBillingContact($billingContact);

        return $this;
    }

    /**
     * Setter function for billingContact
     *
     * @param ApplePayBillingContact $billingContact
     *
     * @return void
     */
    public function setBillingContact(?ApplePayBillingContact $billingContact): void
    {
        $this->billingContact = $billingContact;
    }

    /**
     * Getter function for billingContact
     *
     * @return ?ApplePayBillingContact
     */
    public function getBillingContact(): ?ApplePayBillingContact
    {
        return $this->billingContact;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class ApplePay {" . PHP_EOL
            . "    label: " . $this->toIndentedString($this->label ?? null) . PHP_EOL
            . "    requestBillingAddress: " . $this->toIndentedString($this->requestBillingAddress ?? null) . PHP_EOL
            . "    applePayPaymentToken: " . $this->toIndentedString($this->applePayPaymentToken ?? null) . PHP_EOL
            . "    billingContact: " . $this->toIndentedString($this->billingContact ?? null) . PHP_EOL
            . "}";
    }
}
