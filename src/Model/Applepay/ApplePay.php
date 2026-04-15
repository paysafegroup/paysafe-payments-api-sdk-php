<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Applepay;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * ApplePayApplePayPaymentToken
 */
class ApplePay extends BaseModel
{

    private string $label;
    private bool $requestBillingAddress;
    private ApplePayPaymentToken $applePayPaymentToken;
    private ApplePayBillingContact $billingContact;

    /**
     * Builder function for label
     *
     * @param string $label
     *
     * @return $this
     */
    public function label(string $label): self
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
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * The billing contact provided by the user for this transaction in Apple Pay wallet
     *
     * @return string
     */
    public function getLabel(): string
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
    public function requestBillingAddress(bool $requestBillingAddress): self
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
    public function setRequestBillingAddress(bool $requestBillingAddress): void
    {
        $this->requestBillingAddress = $requestBillingAddress;
    }

    /**
     * The billing contact provided by the user for this transaction in Apple Pay wallet
     *
     * @return bool
     */
    public function getRequestBillingAddress(): bool
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
    public function applePayPaymentToken(ApplePayPaymentToken $applePayPaymentToken): self
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
    public function setApplePayPaymentToken(ApplePayPaymentToken $applePayPaymentToken): void
    {
        $this->applePayPaymentToken = $applePayPaymentToken;
    }

    /**
     * This object contains the user's payment credentials.
     *
     * @return ApplePayPaymentToken
     */
    public function getApplePayPaymentToken(): ApplePayPaymentToken
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
    public function billingContact(ApplePayBillingContact $billingContact): self
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
    public function setBillingContact(ApplePayBillingContact $billingContact): void
    {
        $this->billingContact = $billingContact;
    }

    /**
     * The billing contact provided by the user for this transaction in Apple Pay wallet
     *
     * @return ApplePayBillingContact
     */
    public function getBillingContact(): ApplePayBillingContact
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
            . "    label: " . $this->toIndentedString($this->label) . PHP_EOL
            . "    requestBillingAddress: " . $this->toIndentedString($this->requestBillingAddress) . PHP_EOL
            . "    applePayPaymentToken: " . $this->toIndentedString($this->applePayPaymentToken) . PHP_EOL
            . "    billingContact: " . $this->toIndentedString($this->billingContact) . PHP_EOL
            . "}";
    }
}
