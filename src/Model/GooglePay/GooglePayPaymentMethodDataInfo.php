<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\GooglePay;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\Card;
use Paysafe\PhpSdk\Model\Payment\Payment;


/**
 * Payment method information for Google Pay
 */
class GooglePayPaymentMethodDataInfo extends BaseModel
{
    private ?GooglePayBillingAddress $billingAddress = null;
    /**
     * Card details
     */
    private ?int $cardDetails = null;
    /**
     * This describes the type of card used for the request
     */
    private ?string $cardNetwork = null;

    /**
     * Builder function for billingAddress
     *
     * @param GooglePayBillingAddress $billingAddress
     *
     * @return $this
     */
    public function billingAddress(?GooglePayBillingAddress $billingAddress): self
    {
        $this->setBillingAddress($billingAddress);

        return $this;
    }

    /**
     * Setter function for billingAddress
     *
     * @param GooglePayBillingAddress $billingAddress
     *
     * @return void
     */
    public function setBillingAddress(?GooglePayBillingAddress $billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * Getter function for billingAddress
     *
     * @return ?GooglePayBillingAddress
     */
    public function getBillingAddress(): ?GooglePayBillingAddress
    {
        return $this->billingAddress;
    }
    /**
     * Builder function for cardDetails
     *
     * @param int $cardDetails
     *
     * @return $this
     */
    public function cardDetails(?int $cardDetails): self
    {
        $this->setCardDetails($cardDetails);

        return $this;
    }

    /**
     * Setter function for cardDetails
     *
     * @param int $cardDetails
     *
     * @return void
     */
    public function setCardDetails(?int $cardDetails): void
    {
        $this->cardDetails = $cardDetails;
    }

    /**
     * Getter function for cardDetails
     *
     * @return ?int
     */
    public function getCardDetails(): ?int
    {
        return $this->cardDetails;
    }
    /**
     * Builder function for cardNetwork
     *
     * @param string $cardNetwork
     *
     * @return $this
     */
    public function cardNetwork(?string $cardNetwork): self
    {
        $this->setCardNetwork($cardNetwork);

        return $this;
    }

    /**
     * Setter function for cardNetwork
     *
     * @param string $cardNetwork
     *
     * @return void
     */
    public function setCardNetwork(?string $cardNetwork): void
    {
        $this->cardNetwork = $cardNetwork;
    }

    /**
     * Getter function for cardNetwork
     *
     * @return ?string
     */
    public function getCardNetwork(): ?string
    {
        return $this->cardNetwork;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class GooglePayPaymentMethodDataInfo {" . PHP_EOL
            . "    billingAddress: " . $this->toIndentedString($this->billingAddress ?? null) . PHP_EOL
            . "    cardDetails: " . $this->toIndentedString($this->cardDetails ?? null) . PHP_EOL
            . "    cardNetwork: " . $this->toIndentedString($this->cardNetwork ?? null) . PHP_EOL
            . "}";
    }
}
