<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Customer;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\BillingDetails;
use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Model\Lpm\Ach;
use Paysafe\PhpSdk\Model\Lpm\Bacs;
use Paysafe\PhpSdk\Model\Lpm\Eft;
use Paysafe\PhpSdk\Model\Lpm\Sepa;
use Paysafe\PhpSdk\Model\Payment\Payment;


/**
 * Payload required for creating Payment Handle for a customer.
 */
class CustomerPaymentHandleRequest extends BaseModel
{
    /**
     * This is the merchant reference number created by the merchant and submitted as part of the request. It must be unique for each request.
     */
    private ?string $merchantRefNum = null;
    /**
     * This is the customer's IP address
     */
    private ?string $customerIp = null;
    private ?BillingDetails $billingDetails = null;
    /**
     * This is the ID returned in the response to the address creation request.
     */
    private ?string $billingDetailsId = null;
    private ?UpdateCustomerRequestCard $card = null;
    /**
     * This is the amount of the request, in minor units. For example, to process US $10.99, this value should be 1099. **Note:** The amount specified in the Payment request must match the amount specified in the Payment Handle request from which the paymentHandleToken is taken.
     */
    private ?int $amount = null;
    private ?string $currencyCode = null;
    /**
     * This is an existing Customer Payment Handle, from which the payment instrument and profile details are retrieved. If this parameter is included you can omit the billingDetails object.
     */
    private ?string $paymentHandleTokenFrom = null;
    private ?Eft $eft = null;
    /**
     * Duplicate check flag
     */
    private ?bool $dupCheck = null;
    private ?Ach $ach = null;
    private ?Bacs $bacs = null;
    private array $mandates = [];
    private ?Sepa $sepa = null;
    private ?string $paymentType = null;

    /**
     * Builder function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return $this
     */
    public function merchantRefNum(?string $merchantRefNum): self
    {
        $this->setMerchantRefNum($merchantRefNum);

        return $this;
    }

    /**
     * Setter function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return void
     */
    public function setMerchantRefNum(?string $merchantRefNum): void
    {
        $this->merchantRefNum = $merchantRefNum;
    }

    /**
     * Getter function for merchantRefNum
     *
     * @return ?string
     */
    public function getMerchantRefNum(): ?string
    {
        return $this->merchantRefNum;
    }
    /**
     * Builder function for customerIp
     *
     * @param string $customerIp
     *
     * @return $this
     */
    public function customerIp(?string $customerIp): self
    {
        $this->setCustomerIp($customerIp);

        return $this;
    }

    /**
     * Setter function for customerIp
     *
     * @param string $customerIp
     *
     * @return void
     */
    public function setCustomerIp(?string $customerIp): void
    {
        $this->customerIp = $customerIp;
    }

    /**
     * Getter function for customerIp
     *
     * @return ?string
     */
    public function getCustomerIp(): ?string
    {
        return $this->customerIp;
    }
    /**
     * Builder function for billingDetails
     *
     * @param BillingDetails $billingDetails
     *
     * @return $this
     */
    public function billingDetails(?BillingDetails $billingDetails): self
    {
        $this->setBillingDetails($billingDetails);

        return $this;
    }

    /**
     * Setter function for billingDetails
     *
     * @param BillingDetails $billingDetails
     *
     * @return void
     */
    public function setBillingDetails(?BillingDetails $billingDetails): void
    {
        $this->billingDetails = $billingDetails;
    }

    /**
     * Getter function for billingDetails
     *
     * @return ?BillingDetails
     */
    public function getBillingDetails(): ?BillingDetails
    {
        return $this->billingDetails;
    }
    /**
     * Builder function for billingDetailsId
     *
     * @param string $billingDetailsId
     *
     * @return $this
     */
    public function billingDetailsId(?string $billingDetailsId): self
    {
        $this->setBillingDetailsId($billingDetailsId);

        return $this;
    }

    /**
     * Setter function for billingDetailsId
     *
     * @param string $billingDetailsId
     *
     * @return void
     */
    public function setBillingDetailsId(?string $billingDetailsId): void
    {
        $this->billingDetailsId = $billingDetailsId;
    }

    /**
     * Getter function for billingDetailsId
     *
     * @return ?string
     */
    public function getBillingDetailsId(): ?string
    {
        return $this->billingDetailsId;
    }
    /**
     * Builder function for card
     *
     * @param UpdateCustomerRequestCard $card
     *
     * @return $this
     */
    public function card(?UpdateCustomerRequestCard $card): self
    {
        $this->setCard($card);

        return $this;
    }

    /**
     * Setter function for card
     *
     * @param UpdateCustomerRequestCard $card
     *
     * @return void
     */
    public function setCard(?UpdateCustomerRequestCard $card): void
    {
        $this->card = $card;
    }

    /**
     * Getter function for card
     *
     * @return ?UpdateCustomerRequestCard
     */
    public function getCard(): ?UpdateCustomerRequestCard
    {
        return $this->card;
    }
    /**
     * Builder function for amount
     *
     * @param int $amount
     *
     * @return $this
     */
    public function amount(?int $amount): self
    {
        $this->setAmount($amount);

        return $this;
    }

    /**
     * Setter function for amount
     *
     * @param int $amount
     *
     * @return void
     */
    public function setAmount(?int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Getter function for amount
     *
     * @return ?int
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }
    /**
     * Builder function for currencyCode
     *
     * @param string $currencyCode
     *
     * @return $this
     */
    public function currencyCode(?string $currencyCode): self
    {
        $this->setCurrencyCode($currencyCode);

        return $this;
    }

    /**
     * Setter function for currencyCode
     *
     * @param string $currencyCode
     *
     * @return void
     */
    public function setCurrencyCode(?string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * Getter function for currencyCode
     *
     * @return ?string
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }
    /**
     * Builder function for paymentHandleTokenFrom
     *
     * @param string $paymentHandleTokenFrom
     *
     * @return $this
     */
    public function paymentHandleTokenFrom(?string $paymentHandleTokenFrom): self
    {
        $this->setPaymentHandleTokenFrom($paymentHandleTokenFrom);

        return $this;
    }

    /**
     * Setter function for paymentHandleTokenFrom
     *
     * @param string $paymentHandleTokenFrom
     *
     * @return void
     */
    public function setPaymentHandleTokenFrom(?string $paymentHandleTokenFrom): void
    {
        $this->paymentHandleTokenFrom = $paymentHandleTokenFrom;
    }

    /**
     * Getter function for paymentHandleTokenFrom
     *
     * @return ?string
     */
    public function getPaymentHandleTokenFrom(): ?string
    {
        return $this->paymentHandleTokenFrom;
    }
    /**
     * Builder function for eft
     *
     * @param Eft $eft
     *
     * @return $this
     */
    public function eft(?Eft $eft): self
    {
        $this->setEft($eft);

        return $this;
    }

    /**
     * Setter function for eft
     *
     * @param Eft $eft
     *
     * @return void
     */
    public function setEft(?Eft $eft): void
    {
        $this->eft = $eft;
    }

    /**
     * Getter function for eft
     *
     * @return ?Eft
     */
    public function getEft(): ?Eft
    {
        return $this->eft;
    }
    /**
     * Builder function for dupCheck
     *
     * @param bool $dupCheck
     *
     * @return $this
     */
    public function dupCheck(?bool $dupCheck): self
    {
        $this->setDupCheck($dupCheck);

        return $this;
    }

    /**
     * Setter function for dupCheck
     *
     * @param bool $dupCheck
     *
     * @return void
     */
    public function setDupCheck(?bool $dupCheck): void
    {
        $this->dupCheck = $dupCheck;
    }

    /**
     * Getter function for dupCheck
     *
     * @return ?bool
     */
    public function getDupCheck(): ?bool
    {
        return $this->dupCheck;
    }
    /**
     * Builder function for ach
     *
     * @param Ach $ach
     *
     * @return $this
     */
    public function ach(?Ach $ach): self
    {
        $this->setAch($ach);

        return $this;
    }

    /**
     * Setter function for ach
     *
     * @param Ach $ach
     *
     * @return void
     */
    public function setAch(?Ach $ach): void
    {
        $this->ach = $ach;
    }

    /**
     * Getter function for ach
     *
     * @return ?Ach
     */
    public function getAch(): ?Ach
    {
        return $this->ach;
    }
    /**
     * Builder function for bacs
     *
     * @param Bacs $bacs
     *
     * @return $this
     */
    public function bacs(?Bacs $bacs): self
    {
        $this->setBacs($bacs);

        return $this;
    }

    /**
     * Setter function for bacs
     *
     * @param Bacs $bacs
     *
     * @return void
     */
    public function setBacs(?Bacs $bacs): void
    {
        $this->bacs = $bacs;
    }

    /**
     * Getter function for bacs
     *
     * @return ?Bacs
     */
    public function getBacs(): ?Bacs
    {
        return $this->bacs;
    }
    /**
     * Builder function for mandates
     *
     * @param Mandate[] $mandates
     *
     * @return $this
     */
    public function mandates(array $mandates): self
    {
        $this->setMandates($mandates);

        return $this;
    }

    /**
     * Setter function for mandates
     *
     * @param Mandate[] $mandates
     *
     * @return void
     */
    public function setMandates(array $mandates): void
    {
        $this->mandates = $mandates;
    }

    /**
     * Getter function for mandates
     *
     * @return Mandate[]
     */
    public function getMandates(): array
    {
        return $this->mandates ?? [];
    }
    /**
     * Builder function for sepa
     *
     * @param Sepa $sepa
     *
     * @return $this
     */
    public function sepa(?Sepa $sepa): self
    {
        $this->setSepa($sepa);

        return $this;
    }

    /**
     * Setter function for sepa
     *
     * @param Sepa $sepa
     *
     * @return void
     */
    public function setSepa(?Sepa $sepa): void
    {
        $this->sepa = $sepa;
    }

    /**
     * Getter function for sepa
     *
     * @return ?Sepa
     */
    public function getSepa(): ?Sepa
    {
        return $this->sepa;
    }
    /**
     * Builder function for paymentType
     *
     * @param string $paymentType
     *
     * @return $this
     */
    public function paymentType(?string $paymentType): self
    {
        $this->setPaymentType($paymentType);

        return $this;
    }

    /**
     * Setter function for paymentType
     *
     * @param string $paymentType
     *
     * @return void
     */
    public function setPaymentType(?string $paymentType): void
    {
        $this->paymentType = $paymentType;
    }

    /**
     * Getter function for paymentType
     *
     * @return ?string
     */
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class CustomerPaymentHandleRequest {" . PHP_EOL
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum ?? null) . PHP_EOL
            . "    customerIp: " . $this->toIndentedString($this->customerIp ?? null) . PHP_EOL
            . "    billingDetails: " . $this->toIndentedString($this->billingDetails ?? null) . PHP_EOL
            . "    billingDetailsId: " . $this->toIndentedString($this->billingDetailsId ?? null) . PHP_EOL
            . "    card: " . $this->toIndentedString($this->card ?? null) . PHP_EOL
            . "    amount: " . $this->toIndentedString($this->amount ?? null) . PHP_EOL
            . "    currencyCode: " . $this->toIndentedString($this->currencyCode ?? null) . PHP_EOL
            . "    paymentHandleTokenFrom: " . $this->toIndentedString($this->paymentHandleTokenFrom ?? null) . PHP_EOL
            . "    eft: " . $this->toIndentedString($this->eft ?? null) . PHP_EOL
            . "    dupCheck: " . $this->toIndentedString($this->dupCheck ?? null) . PHP_EOL
            . "    ach: " . $this->toIndentedString($this->ach ?? null) . PHP_EOL
            . "    bacs: " . $this->toIndentedString($this->bacs ?? null) . PHP_EOL
            . "    mandates: " . $this->toIndentedString($this->mandates ?? null) . PHP_EOL
            . "    sepa: " . $this->toIndentedString($this->sepa ?? null) . PHP_EOL
            . "    paymentType: " . $this->toIndentedString($this->paymentType ?? null) . PHP_EOL
            . "}";
    }
    private ?array $additionalParameters = null;

    /**
     * This map holds additional parameters for features not yet available in this library.
     * Each key-value pair is serialized as a top-level field in the request/response.
     *
     * @return array|null
     */
    public function getAdditionalParameters(): ?array
    {
        return $this->additionalParameters;
    }

    public function setAdditionalParameters(array $additionalParameters): void
    {
        $this->additionalParameters = $additionalParameters;
    }

    public function addAdditionalParameter(string $key, $value): self
    {
        if ($this->additionalParameters === null) {
            $this->additionalParameters = [];
        }
        $this->additionalParameters[$key] = $value;
        return $this;
    }


}
