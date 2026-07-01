<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\ApplePay;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * The Apple Pay payment token containing encrypted payment credentials
 */
class ApplePayPaymentToken extends BaseModel
{
    private ?ApplePayTokenData $token = null;
    private ?ApplePayBillingContact $billingContact = null;

    /**
     * Builder function for token
     *
     * @param ApplePayTokenData $token
     *
     * @return $this
     */
    public function token(?ApplePayTokenData $token): self
    {
        $this->setToken($token);

        return $this;
    }

    /**
     * Setter function for token
     *
     * @param ApplePayTokenData $token
     *
     * @return void
     */
    public function setToken(?ApplePayTokenData $token): void
    {
        $this->token = $token;
    }

    /**
     * Getter function for token
     *
     * @return ?ApplePayTokenData
     */
    public function getToken(): ?ApplePayTokenData
    {
        return $this->token;
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
        return "class ApplePayPaymentToken {" . PHP_EOL
            . "    token: " . $this->toIndentedString($this->token ?? null) . PHP_EOL
            . "    billingContact: " . $this->toIndentedString($this->billingContact ?? null) . PHP_EOL
            . "}";
    }
}
