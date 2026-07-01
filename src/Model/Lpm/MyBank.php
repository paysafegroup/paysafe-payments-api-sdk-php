<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * These are the details of the customer used for the transaction.
 */
class MyBank extends BaseModel
{
    /**
     * This is the bank identifier used by the PSP. This is to be provided by merchant.
     */
    private ?string $bankId = null;
    /**
     * This is an identifier of the website.
     */
    private ?string $websiteId = null;
    /**
     * This is the ID returned in the response of the [Payments](/operations/process-payment) request. This is to be provided by merchant.
     */
    private ?string $paymentId = null;
    /**
     * This is the Subject line to use in the customer email. This is to be provided by merchant while making a payout.
     */
    private ?string $emailSubject = null;
    /**
     * This is the message to use in the customer email. This is to be provided by merchant while making a payout.
     */
    private ?string $emailMessage = null;

    /**
     * Builder function for bankId
     *
     * @param string $bankId
     *
     * @return $this
     */
    public function bankId(?string $bankId): self
    {
        $this->setBankId($bankId);

        return $this;
    }

    /**
     * Setter function for bankId
     *
     * @param string $bankId
     *
     * @return void
     */
    public function setBankId(?string $bankId): void
    {
        $this->bankId = $bankId;
    }

    /**
     * Getter function for bankId
     *
     * @return ?string
     */
    public function getBankId(): ?string
    {
        return $this->bankId;
    }
    /**
     * Builder function for websiteId
     *
     * @param string $websiteId
     *
     * @return $this
     */
    public function websiteId(?string $websiteId): self
    {
        $this->setWebsiteId($websiteId);

        return $this;
    }

    /**
     * Setter function for websiteId
     *
     * @param string $websiteId
     *
     * @return void
     */
    public function setWebsiteId(?string $websiteId): void
    {
        $this->websiteId = $websiteId;
    }

    /**
     * Getter function for websiteId
     *
     * @return ?string
     */
    public function getWebsiteId(): ?string
    {
        return $this->websiteId;
    }
    /**
     * Builder function for paymentId
     *
     * @param string $paymentId
     *
     * @return $this
     */
    public function paymentId(?string $paymentId): self
    {
        $this->setPaymentId($paymentId);

        return $this;
    }

    /**
     * Setter function for paymentId
     *
     * @param string $paymentId
     *
     * @return void
     */
    public function setPaymentId(?string $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Getter function for paymentId
     *
     * @return ?string
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }
    /**
     * Builder function for emailSubject
     *
     * @param string $emailSubject
     *
     * @return $this
     */
    public function emailSubject(?string $emailSubject): self
    {
        $this->setEmailSubject($emailSubject);

        return $this;
    }

    /**
     * Setter function for emailSubject
     *
     * @param string $emailSubject
     *
     * @return void
     */
    public function setEmailSubject(?string $emailSubject): void
    {
        $this->emailSubject = $emailSubject;
    }

    /**
     * Getter function for emailSubject
     *
     * @return ?string
     */
    public function getEmailSubject(): ?string
    {
        return $this->emailSubject;
    }
    /**
     * Builder function for emailMessage
     *
     * @param string $emailMessage
     *
     * @return $this
     */
    public function emailMessage(?string $emailMessage): self
    {
        $this->setEmailMessage($emailMessage);

        return $this;
    }

    /**
     * Setter function for emailMessage
     *
     * @param string $emailMessage
     *
     * @return void
     */
    public function setEmailMessage(?string $emailMessage): void
    {
        $this->emailMessage = $emailMessage;
    }

    /**
     * Getter function for emailMessage
     *
     * @return ?string
     */
    public function getEmailMessage(): ?string
    {
        return $this->emailMessage;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class MyBank {" . PHP_EOL
            . "    bankId: " . $this->toIndentedString($this->bankId ?? null) . PHP_EOL
            . "    websiteId: " . $this->toIndentedString($this->websiteId ?? null) . PHP_EOL
            . "    paymentId: " . $this->toIndentedString($this->paymentId ?? null) . PHP_EOL
            . "    emailSubject: " . $this->toIndentedString($this->emailSubject ?? null) . PHP_EOL
            . "    emailMessage: " . $this->toIndentedString($this->emailMessage ?? null) . PHP_EOL
            . "}";
    }
}
