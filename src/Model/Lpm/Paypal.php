<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Payment\Payment;


/**
 * These are the details of the PayPal account used for the transaction.
 */
class Paypal extends BaseModel
{
    /**
     * The email address of the consumer or payer
     */
    private ?string $consumerId = null;
    /**
     * A label that overrides the business name in the merchant's PayPal account on the PayPal checkout pages
     */
    private ?string $recipientDescription = null;
    private ?string $language = null;
    private ?string $shippingPreference = null;
    /**
     * Note to be displayed on the PayPal page
     */
    private ?string $consumerMessage = null;
    /**
     * Order description to display on PayPal page. If merchant does not set this field it defaults to 'Payment for order'
     */
    private ?string $orderDescription = null;
    private ?string $recipientType = null;

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
     * Builder function for recipientDescription
     *
     * @param string $recipientDescription
     *
     * @return $this
     */
    public function recipientDescription(?string $recipientDescription): self
    {
        $this->setRecipientDescription($recipientDescription);

        return $this;
    }

    /**
     * Setter function for recipientDescription
     *
     * @param string $recipientDescription
     *
     * @return void
     */
    public function setRecipientDescription(?string $recipientDescription): void
    {
        $this->recipientDescription = $recipientDescription;
    }

    /**
     * Getter function for recipientDescription
     *
     * @return ?string
     */
    public function getRecipientDescription(): ?string
    {
        return $this->recipientDescription;
    }
    /**
     * Builder function for language
     *
     * @param string $language
     *
     * @return $this
     */
    public function language(?string $language): self
    {
        $this->setLanguage($language);

        return $this;
    }

    /**
     * Setter function for language
     *
     * @param string $language
     *
     * @return void
     */
    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

    /**
     * Getter function for language
     *
     * @return ?string
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }
    /**
     * Builder function for shippingPreference
     *
     * @param string $shippingPreference
     *
     * @return $this
     */
    public function shippingPreference(?string $shippingPreference): self
    {
        $this->setShippingPreference($shippingPreference);

        return $this;
    }

    /**
     * Setter function for shippingPreference
     *
     * @param string $shippingPreference
     *
     * @return void
     */
    public function setShippingPreference(?string $shippingPreference): void
    {
        $this->shippingPreference = $shippingPreference;
    }

    /**
     * Getter function for shippingPreference
     *
     * @return ?string
     */
    public function getShippingPreference(): ?string
    {
        return $this->shippingPreference;
    }
    /**
     * Builder function for consumerMessage
     *
     * @param string $consumerMessage
     *
     * @return $this
     */
    public function consumerMessage(?string $consumerMessage): self
    {
        $this->setConsumerMessage($consumerMessage);

        return $this;
    }

    /**
     * Setter function for consumerMessage
     *
     * @param string $consumerMessage
     *
     * @return void
     */
    public function setConsumerMessage(?string $consumerMessage): void
    {
        $this->consumerMessage = $consumerMessage;
    }

    /**
     * Getter function for consumerMessage
     *
     * @return ?string
     */
    public function getConsumerMessage(): ?string
    {
        return $this->consumerMessage;
    }
    /**
     * Builder function for orderDescription
     *
     * @param string $orderDescription
     *
     * @return $this
     */
    public function orderDescription(?string $orderDescription): self
    {
        $this->setOrderDescription($orderDescription);

        return $this;
    }

    /**
     * Setter function for orderDescription
     *
     * @param string $orderDescription
     *
     * @return void
     */
    public function setOrderDescription(?string $orderDescription): void
    {
        $this->orderDescription = $orderDescription;
    }

    /**
     * Getter function for orderDescription
     *
     * @return ?string
     */
    public function getOrderDescription(): ?string
    {
        return $this->orderDescription;
    }
    /**
     * Builder function for recipientType
     *
     * @param string $recipientType
     *
     * @return $this
     */
    public function recipientType(?string $recipientType): self
    {
        $this->setRecipientType($recipientType);

        return $this;
    }

    /**
     * Setter function for recipientType
     *
     * @param string $recipientType
     *
     * @return void
     */
    public function setRecipientType(?string $recipientType): void
    {
        $this->recipientType = $recipientType;
    }

    /**
     * Getter function for recipientType
     *
     * @return ?string
     */
    public function getRecipientType(): ?string
    {
        return $this->recipientType;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Paypal {" . PHP_EOL
            . "    consumerId: " . $this->toIndentedString($this->consumerId ?? null) . PHP_EOL
            . "    recipientDescription: " . $this->toIndentedString($this->recipientDescription ?? null) . PHP_EOL
            . "    language: " . $this->toIndentedString($this->language ?? null) . PHP_EOL
            . "    shippingPreference: " . $this->toIndentedString($this->shippingPreference ?? null) . PHP_EOL
            . "    consumerMessage: " . $this->toIndentedString($this->consumerMessage ?? null) . PHP_EOL
            . "    orderDescription: " . $this->toIndentedString($this->orderDescription ?? null) . PHP_EOL
            . "    recipientType: " . $this->toIndentedString($this->recipientType ?? null) . PHP_EOL
            . "}";
    }
}
