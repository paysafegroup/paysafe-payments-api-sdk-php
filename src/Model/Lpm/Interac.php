<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Lpm;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Customer\Customer;
use Paysafe\PhpSdk\Model\Payment\Payment;


/**
 * Details of the interac E-Transfer used for the transaction.
 */
class Interac extends BaseModel
{
    /**
     * This is the merchant's unique identifier of the customer. Customer/end user email id or phone number, from whom money has to be collected
     */
    private ?string $consumerId = null;
    /**
     * Default value is EMAIL. To pass mobile number we have to specify the type as PHONE. This is needed for deposit flow (not for withdrawal)
     */
    private ?string $type = null;
    /**
     * When customer is not registered for auto-deposit at interac online then Merchant has to pass \"question\" parameter. Mandatory in non-autodeposit withdrawal Payment Handle request flow
     */
    private ?string $question = null;
    /**
     * When customer is not registered for auto-deposit at interac online then Merchant has to pass \"answer\" parameter. Mandatory in non-autodeposit withdrawal Payment Handle request flow\\
     */
    private ?string $answer = null;
    private ?string $transferType = null;
    /**
     * Maximum amount that user can transfer
     */
    private ?int $maxAmount = null;
    private ?string $fraudStatus = null;
    private ?string $fraudType = null;
    /**
     * It is the Payment Reference Number at interac E-Transfer
     */
    private ?string $paymentReference = null;
    private ?string $method = null;
    /**
     * Interac E-Transfer transaction expiry time in minutes
     */
    private ?int $paymentRefExpiryMinutes = null;

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
     * Builder function for type
     *
     * @param string $type
     *
     * @return $this
     */
    public function type(?string $type): self
    {
        $this->setType($type);

        return $this;
    }

    /**
     * Setter function for type
     *
     * @param string $type
     *
     * @return void
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Getter function for type
     *
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Builder function for question
     *
     * @param string $question
     *
     * @return $this
     */
    public function question(?string $question): self
    {
        $this->setQuestion($question);

        return $this;
    }

    /**
     * Setter function for question
     *
     * @param string $question
     *
     * @return void
     */
    public function setQuestion(?string $question): void
    {
        $this->question = $question;
    }

    /**
     * Getter function for question
     *
     * @return ?string
     */
    public function getQuestion(): ?string
    {
        return $this->question;
    }
    /**
     * Builder function for answer
     *
     * @param string $answer
     *
     * @return $this
     */
    public function answer(?string $answer): self
    {
        $this->setAnswer($answer);

        return $this;
    }

    /**
     * Setter function for answer
     *
     * @param string $answer
     *
     * @return void
     */
    public function setAnswer(?string $answer): void
    {
        $this->answer = $answer;
    }

    /**
     * Getter function for answer
     *
     * @return ?string
     */
    public function getAnswer(): ?string
    {
        return $this->answer;
    }
    /**
     * Builder function for transferType
     *
     * @param string $transferType
     *
     * @return $this
     */
    public function transferType(?string $transferType): self
    {
        $this->setTransferType($transferType);

        return $this;
    }

    /**
     * Setter function for transferType
     *
     * @param string $transferType
     *
     * @return void
     */
    public function setTransferType(?string $transferType): void
    {
        $this->transferType = $transferType;
    }

    /**
     * Getter function for transferType
     *
     * @return ?string
     */
    public function getTransferType(): ?string
    {
        return $this->transferType;
    }
    /**
     * Builder function for maxAmount
     *
     * @param int $maxAmount
     *
     * @return $this
     */
    public function maxAmount(?int $maxAmount): self
    {
        $this->setMaxAmount($maxAmount);

        return $this;
    }

    /**
     * Setter function for maxAmount
     *
     * @param int $maxAmount
     *
     * @return void
     */
    public function setMaxAmount(?int $maxAmount): void
    {
        $this->maxAmount = $maxAmount;
    }

    /**
     * Getter function for maxAmount
     *
     * @return ?int
     */
    public function getMaxAmount(): ?int
    {
        return $this->maxAmount;
    }
    /**
     * Builder function for fraudStatus
     *
     * @param string $fraudStatus
     *
     * @return $this
     */
    public function fraudStatus(?string $fraudStatus): self
    {
        $this->setFraudStatus($fraudStatus);

        return $this;
    }

    /**
     * Setter function for fraudStatus
     *
     * @param string $fraudStatus
     *
     * @return void
     */
    public function setFraudStatus(?string $fraudStatus): void
    {
        $this->fraudStatus = $fraudStatus;
    }

    /**
     * Getter function for fraudStatus
     *
     * @return ?string
     */
    public function getFraudStatus(): ?string
    {
        return $this->fraudStatus;
    }
    /**
     * Builder function for fraudType
     *
     * @param string $fraudType
     *
     * @return $this
     */
    public function fraudType(?string $fraudType): self
    {
        $this->setFraudType($fraudType);

        return $this;
    }

    /**
     * Setter function for fraudType
     *
     * @param string $fraudType
     *
     * @return void
     */
    public function setFraudType(?string $fraudType): void
    {
        $this->fraudType = $fraudType;
    }

    /**
     * Getter function for fraudType
     *
     * @return ?string
     */
    public function getFraudType(): ?string
    {
        return $this->fraudType;
    }
    /**
     * Builder function for paymentReference
     *
     * @param string $paymentReference
     *
     * @return $this
     */
    public function paymentReference(?string $paymentReference): self
    {
        $this->setPaymentReference($paymentReference);

        return $this;
    }

    /**
     * Setter function for paymentReference
     *
     * @param string $paymentReference
     *
     * @return void
     */
    public function setPaymentReference(?string $paymentReference): void
    {
        $this->paymentReference = $paymentReference;
    }

    /**
     * Getter function for paymentReference
     *
     * @return ?string
     */
    public function getPaymentReference(): ?string
    {
        return $this->paymentReference;
    }
    /**
     * Builder function for method
     *
     * @param string $method
     *
     * @return $this
     */
    public function method(?string $method): self
    {
        $this->setMethod($method);

        return $this;
    }

    /**
     * Setter function for method
     *
     * @param string $method
     *
     * @return void
     */
    public function setMethod(?string $method): void
    {
        $this->method = $method;
    }

    /**
     * Getter function for method
     *
     * @return ?string
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }
    /**
     * Builder function for paymentRefExpiryMinutes
     *
     * @param int $paymentRefExpiryMinutes
     *
     * @return $this
     */
    public function paymentRefExpiryMinutes(?int $paymentRefExpiryMinutes): self
    {
        $this->setPaymentRefExpiryMinutes($paymentRefExpiryMinutes);

        return $this;
    }

    /**
     * Setter function for paymentRefExpiryMinutes
     *
     * @param int $paymentRefExpiryMinutes
     *
     * @return void
     */
    public function setPaymentRefExpiryMinutes(?int $paymentRefExpiryMinutes): void
    {
        $this->paymentRefExpiryMinutes = $paymentRefExpiryMinutes;
    }

    /**
     * Getter function for paymentRefExpiryMinutes
     *
     * @return ?int
     */
    public function getPaymentRefExpiryMinutes(): ?int
    {
        return $this->paymentRefExpiryMinutes;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Interac {" . PHP_EOL
            . "    consumerId: " . $this->toIndentedString($this->consumerId ?? null) . PHP_EOL
            . "    type: " . $this->toIndentedString($this->type ?? null) . PHP_EOL
            . "    question: " . $this->toIndentedString($this->question ?? null) . PHP_EOL
            . "    answer: " . $this->toIndentedString($this->answer ?? null) . PHP_EOL
            . "    transferType: " . $this->toIndentedString($this->transferType ?? null) . PHP_EOL
            . "    maxAmount: " . $this->toIndentedString($this->maxAmount ?? null) . PHP_EOL
            . "    fraudStatus: " . $this->toIndentedString($this->fraudStatus ?? null) . PHP_EOL
            . "    fraudType: " . $this->toIndentedString($this->fraudType ?? null) . PHP_EOL
            . "    paymentReference: " . $this->toIndentedString($this->paymentReference ?? null) . PHP_EOL
            . "    method: " . $this->toIndentedString($this->method ?? null) . PHP_EOL
            . "    paymentRefExpiryMinutes: " . $this->toIndentedString($this->paymentRefExpiryMinutes ?? null) . PHP_EOL
            . "}";
    }
}
