<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\GooglePay;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Google Pay payment token
 */
class GooglePayPaymentToken extends BaseModel
{
    /**
     * Major API version. The value is 2 for this specification
     */
    private ?int $apiVersion = null;
    /**
     * Minor API version. The value is 0 for this specification
     */
    private ?int $apiVersionMinor = null;
    private ?GooglePayPaymentMethodData $paymentMethodData = null;

    /**
     * Builder function for apiVersion
     *
     * @param int $apiVersion
     *
     * @return $this
     */
    public function apiVersion(?int $apiVersion): self
    {
        $this->setApiVersion($apiVersion);

        return $this;
    }

    /**
     * Setter function for apiVersion
     *
     * @param int $apiVersion
     *
     * @return void
     */
    public function setApiVersion(?int $apiVersion): void
    {
        $this->apiVersion = $apiVersion;
    }

    /**
     * Getter function for apiVersion
     *
     * @return ?int
     */
    public function getApiVersion(): ?int
    {
        return $this->apiVersion;
    }
    /**
     * Builder function for apiVersionMinor
     *
     * @param int $apiVersionMinor
     *
     * @return $this
     */
    public function apiVersionMinor(?int $apiVersionMinor): self
    {
        $this->setApiVersionMinor($apiVersionMinor);

        return $this;
    }

    /**
     * Setter function for apiVersionMinor
     *
     * @param int $apiVersionMinor
     *
     * @return void
     */
    public function setApiVersionMinor(?int $apiVersionMinor): void
    {
        $this->apiVersionMinor = $apiVersionMinor;
    }

    /**
     * Getter function for apiVersionMinor
     *
     * @return ?int
     */
    public function getApiVersionMinor(): ?int
    {
        return $this->apiVersionMinor;
    }
    /**
     * Builder function for paymentMethodData
     *
     * @param GooglePayPaymentMethodData $paymentMethodData
     *
     * @return $this
     */
    public function paymentMethodData(?GooglePayPaymentMethodData $paymentMethodData): self
    {
        $this->setPaymentMethodData($paymentMethodData);

        return $this;
    }

    /**
     * Setter function for paymentMethodData
     *
     * @param GooglePayPaymentMethodData $paymentMethodData
     *
     * @return void
     */
    public function setPaymentMethodData(?GooglePayPaymentMethodData $paymentMethodData): void
    {
        $this->paymentMethodData = $paymentMethodData;
    }

    /**
     * Getter function for paymentMethodData
     *
     * @return ?GooglePayPaymentMethodData
     */
    public function getPaymentMethodData(): ?GooglePayPaymentMethodData
    {
        return $this->paymentMethodData;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class GooglePayPaymentToken {" . PHP_EOL
            . "    apiVersion: " . $this->toIndentedString($this->apiVersion ?? null) . PHP_EOL
            . "    apiVersionMinor: " . $this->toIndentedString($this->apiVersionMinor ?? null) . PHP_EOL
            . "    paymentMethodData: " . $this->toIndentedString($this->paymentMethodData ?? null) . PHP_EOL
            . "}";
    }
}
