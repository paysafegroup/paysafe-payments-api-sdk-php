<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\Card;
use Paysafe\PhpSdk\Model\Customer\Customer;
use Paysafe\PhpSdk\Model\Payment\Payment;


/**
 * 'The storedCredential object is used to identify [authorization requests] that use stored credentials for a consumer, in order to improve authorization rates and reduce fraud. Stored credentials can be used in two cases: - Using a payment token : An authorization request that uses a paymentToken from the [Customer Vault API] - Using a card number : An authorization request that uses a credit card number stored by the merchant. **Notes:** - If you use a paymentToken in the authorization request but do not include the storedCredential object, Paysafe will provide default information taken from Customer Vault data. - You cannot include both the storedCredential object and the recurring parameter in the same authorization request. Paysafe recommends using the storedCredential object. - The cvv parameter of the [card object] is required when the occurrence parameteris set to INITIAL. However, cvv is not required when the occurrence parameter is set to SUBSEQUENT. - The storedCredential object cannot be used for Apple Pay or Google Pay transactions.'
 */
class StoredCredential extends BaseModel
{
    private ?string $type = null;
    private ?string $occurrence = null;
    /**
     * 'Id of the initial Recurring Payment transaction. This id should be stored from the auth response of the transaction indicated as initial with the following: type=RECURRING/TOPUP/ADHOC, occurrence=INITIAL. This reference should be provided when:   - type = RECURRING and occurrence = SUBSEQUENT   - type = TOPUP and occurrence = SUBSEQUENT   - type = ADHOC and occurrence = SUBSEQUENT **Note:** This reference is a must to meet PSD 2 authentication process requirements for merchant initiated transactions successfully.'
     */
    private ?string $initialTransactionId = null;
    /**
     * 'Card Scheme Transaction Id of the initial payment transaction in the recurring plan when it was processed through external service provider. This reference should be provided only when:   - type=RECURRING and occurrence=SUBSEQUENT   - type=TOPUP and occurrence=SUBSEQUENT **Note:** This reference cannot be provided along with initialTransactionId.  Expected format by scheme (examples):   - Amex: 15 digits (for example, 012345678901234)   - Mastercard: 9 characters + 4 digits + 2 spaces (for example, MCC9999991231 )   - Visa: 15 digits (for example, 306123456789012) '
     */
    private ?string $externalInitialTransactionId = null;

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
     * Builder function for occurrence
     *
     * @param string $occurrence
     *
     * @return $this
     */
    public function occurrence(?string $occurrence): self
    {
        $this->setOccurrence($occurrence);

        return $this;
    }

    /**
     * Setter function for occurrence
     *
     * @param string $occurrence
     *
     * @return void
     */
    public function setOccurrence(?string $occurrence): void
    {
        $this->occurrence = $occurrence;
    }

    /**
     * Getter function for occurrence
     *
     * @return ?string
     */
    public function getOccurrence(): ?string
    {
        return $this->occurrence;
    }
    /**
     * Builder function for initialTransactionId
     *
     * @param string $initialTransactionId
     *
     * @return $this
     */
    public function initialTransactionId(?string $initialTransactionId): self
    {
        $this->setInitialTransactionId($initialTransactionId);

        return $this;
    }

    /**
     * Setter function for initialTransactionId
     *
     * @param string $initialTransactionId
     *
     * @return void
     */
    public function setInitialTransactionId(?string $initialTransactionId): void
    {
        $this->initialTransactionId = $initialTransactionId;
    }

    /**
     * Getter function for initialTransactionId
     *
     * @return ?string
     */
    public function getInitialTransactionId(): ?string
    {
        return $this->initialTransactionId;
    }
    /**
     * Builder function for externalInitialTransactionId
     *
     * @param string $externalInitialTransactionId
     *
     * @return $this
     */
    public function externalInitialTransactionId(?string $externalInitialTransactionId): self
    {
        $this->setExternalInitialTransactionId($externalInitialTransactionId);

        return $this;
    }

    /**
     * Setter function for externalInitialTransactionId
     *
     * @param string $externalInitialTransactionId
     *
     * @return void
     */
    public function setExternalInitialTransactionId(?string $externalInitialTransactionId): void
    {
        $this->externalInitialTransactionId = $externalInitialTransactionId;
    }

    /**
     * Getter function for externalInitialTransactionId
     *
     * @return ?string
     */
    public function getExternalInitialTransactionId(): ?string
    {
        return $this->externalInitialTransactionId;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class StoredCredential {" . PHP_EOL
            . "    type: " . $this->toIndentedString($this->type ?? null) . PHP_EOL
            . "    occurrence: " . $this->toIndentedString($this->occurrence ?? null) . PHP_EOL
            . "    initialTransactionId: " . $this->toIndentedString($this->initialTransactionId ?? null) . PHP_EOL
            . "    externalInitialTransactionId: " . $this->toIndentedString($this->externalInitialTransactionId ?? null) . PHP_EOL
            . "}";
    }
}
