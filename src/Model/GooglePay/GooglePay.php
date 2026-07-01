<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\GooglePay;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Google Pay payment details
 */
class GooglePay extends BaseModel
{
    private ?GooglePayPaymentToken $googlePayPaymentToken = null;

    /**
     * Builder function for googlePayPaymentToken
     *
     * @param GooglePayPaymentToken $googlePayPaymentToken
     *
     * @return $this
     */
    public function googlePayPaymentToken(?GooglePayPaymentToken $googlePayPaymentToken): self
    {
        $this->setGooglePayPaymentToken($googlePayPaymentToken);

        return $this;
    }

    /**
     * Setter function for googlePayPaymentToken
     *
     * @param GooglePayPaymentToken $googlePayPaymentToken
     *
     * @return void
     */
    public function setGooglePayPaymentToken(?GooglePayPaymentToken $googlePayPaymentToken): void
    {
        $this->googlePayPaymentToken = $googlePayPaymentToken;
    }

    /**
     * Getter function for googlePayPaymentToken
     *
     * @return ?GooglePayPaymentToken
     */
    public function getGooglePayPaymentToken(): ?GooglePayPaymentToken
    {
        return $this->googlePayPaymentToken;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class GooglePay {" . PHP_EOL
            . "    googlePayPaymentToken: " . $this->toIndentedString($this->googlePayPaymentToken ?? null) . PHP_EOL
            . "}";
    }
}
