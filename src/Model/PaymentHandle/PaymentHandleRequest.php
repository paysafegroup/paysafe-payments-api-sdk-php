<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Paymenthandle;
use Paysafe\PhpSdk\Model\ApplePay\ApplePay;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\Card;
use Paysafe\PhpSdk\Model\Card\CardAuthentication;
use Paysafe\PhpSdk\Model\Card\MerchantDescriptor;
use Paysafe\PhpSdk\Model\Card\Threeds\ThreeDs;
use Paysafe\PhpSdk\Model\Common\BillingDetails;
use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Model\Common\Profile\Profile;
use Paysafe\PhpSdk\Model\Common\ReturnLink;
use Paysafe\PhpSdk\Model\Common\ShippingDetails;
use Paysafe\PhpSdk\Model\Customer\Customer;
use Paysafe\PhpSdk\Model\GooglePay\GooglePay;
use Paysafe\PhpSdk\Model\Lpm\Ach;
use Paysafe\PhpSdk\Model\Lpm\Bacs;
use Paysafe\PhpSdk\Model\Lpm\Eft;
use Paysafe\PhpSdk\Model\Lpm\Interac;
use Paysafe\PhpSdk\Model\Lpm\Mazooma;
use Paysafe\PhpSdk\Model\Lpm\Neteller;
use Paysafe\PhpSdk\Model\Lpm\PayByBank;
use Paysafe\PhpSdk\Model\Lpm\Paypal;
use Paysafe\PhpSdk\Model\Lpm\Paysafecard;
use Paysafe\PhpSdk\Model\Lpm\Paysafecash;
use Paysafe\PhpSdk\Model\Lpm\RapidTransfer;
use Paysafe\PhpSdk\Model\Lpm\SafetyPayCash;
use Paysafe\PhpSdk\Model\Lpm\Sepa;
use Paysafe\PhpSdk\Model\Lpm\Sightline;
use Paysafe\PhpSdk\Model\Lpm\Skrill1Tap;
use Paysafe\PhpSdk\Model\Lpm\Skrill;
use Paysafe\PhpSdk\Model\Lpm\Venmo;
use Paysafe\PhpSdk\Model\Lpm\Vippreferred;
use Paysafe\PhpSdk\Model\Payment\Payment;


/**
 * Request to create a payment handle for tokenizing payment information
 */
class PaymentHandleRequest extends BaseModel
{
    /**
     * The merchant reference number created by the merchant and submitted as part of the request. It must be unique for each request
     */
    private ?string $merchantRefNum = null;
    private ?string $transactionType = null;
    /**
     * This validates that this request is not a duplicate. A duplicate request is when the merchantRefNum has already been used in a previous request within the past 90 days.
     */
    private ?bool $dupCheck = null;
    /**
     * Required if you have more than one account configured for the same payment method and currency
     */
    private ?string $accountId = null;
    private ?string $paymentType = null;
    /**
     * The amount of the request in minor units (e.g., $10.99 = 1099)
     */
    private ?int $amount = null;
    /**
     * merchantAccountId determines which of your accounts with Paysafe should be debited or credited for this transaction. It gives you greater control over how you manage your Paysafe balances. Currently, this field is conditional; it should be left null in all cases, except when all the following conditions are met: - You are executing a payout to a Skrill wallet that might not be registered (i.e. the payee may not already have a Skrill wallet ). - You must populate this field if these conditions are met.<br> **Note:** Only applicable for SKRILL SCT.
     */
    private ?string $merchantAccountId = null;
    private ?string $currencyCode = null;
    private ?Card $card = null;
    private ?ApplePay $applePay = null;
    private ?GooglePay $googlePay = null;
    private ?BillingDetails $billingDetails = null;
    private ?ShippingDetails $shippingDetails = null;
    private ?Profile $profile = null;
    private ?MerchantDescriptor $merchantDescriptor = null;
    /**
     * The customer's IP address
     */
    private ?string $customerIp = null;
    /**
     * URL endpoints to redirect the customer after a redirection to an alternative payment or 3D Secure site
     */
    private array $returnLinks = [];
    private ?ThreeDs $threeDs = null;
    /**
     * List of mandates associated with the payment handle. This is the identifier of the mandate in the banking system.
     */
    private array $mandates = [];
    private ?CardAuthentication $authentication = null;
    /**
     * An existing Customer Payment Handle from which the payment instrument and profile details are retrieved
     */
    private ?string $paymentHandleTokenFrom = null;
    private ?string $transactionIntent = null;
    private ?Skrill $skrill = null;
    private ?Neteller $neteller = null;
    private ?Paysafecash $paysafecash = null;
    private ?Paysafecard $paysafecard = null;
    private ?Paypal $payPal = null;
    private ?Venmo $venmo = null;
    private ?Vippreferred $vippreferred = null;
    private ?Mazooma $mazooma = null;
    private ?Sightline $sightline = null;
    private ?PayByBank $payByBank = null;
    private ?Interac $interacETransfer = null;
    private ?RapidTransfer $rapidTransfer = null;
    private ?Skrill1Tap $skrill1Tap = null;
    private ?Ach $ach = null;
    private ?Eft $eft = null;
    private ?Bacs $bacs = null;
    private ?Sepa $sepa = null;
    private ?SafetyPayCash $safetyPayCash = null;

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
     * Builder function for transactionType
     *
     * @param string $transactionType
     *
     * @return $this
     */
    public function transactionType(?string $transactionType): self
    {
        $this->setTransactionType($transactionType);

        return $this;
    }

    /**
     * Setter function for transactionType
     *
     * @param string $transactionType
     *
     * @return void
     */
    public function setTransactionType(?string $transactionType): void
    {
        $this->transactionType = $transactionType;
    }

    /**
     * Getter function for transactionType
     *
     * @return ?string
     */
    public function getTransactionType(): ?string
    {
        return $this->transactionType;
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
     * Builder function for accountId
     *
     * @param string $accountId
     *
     * @return $this
     */
    public function accountId(?string $accountId): self
    {
        $this->setAccountId($accountId);

        return $this;
    }

    /**
     * Setter function for accountId
     *
     * @param string $accountId
     *
     * @return void
     */
    public function setAccountId(?string $accountId): void
    {
        $this->accountId = $accountId;
    }

    /**
     * Getter function for accountId
     *
     * @return ?string
     */
    public function getAccountId(): ?string
    {
        return $this->accountId;
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
     * Builder function for merchantAccountId
     *
     * @param string $merchantAccountId
     *
     * @return $this
     */
    public function merchantAccountId(?string $merchantAccountId): self
    {
        $this->setMerchantAccountId($merchantAccountId);

        return $this;
    }

    /**
     * Setter function for merchantAccountId
     *
     * @param string $merchantAccountId
     *
     * @return void
     */
    public function setMerchantAccountId(?string $merchantAccountId): void
    {
        $this->merchantAccountId = $merchantAccountId;
    }

    /**
     * Getter function for merchantAccountId
     *
     * @return ?string
     */
    public function getMerchantAccountId(): ?string
    {
        return $this->merchantAccountId;
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
     * Builder function for card
     *
     * @param Card $card
     *
     * @return $this
     */
    public function card(?Card $card): self
    {
        $this->setCard($card);

        return $this;
    }

    /**
     * Setter function for card
     *
     * @param Card $card
     *
     * @return void
     */
    public function setCard(?Card $card): void
    {
        $this->card = $card;
    }

    /**
     * Getter function for card
     *
     * @return ?Card
     */
    public function getCard(): ?Card
    {
        return $this->card;
    }
    /**
     * Builder function for applePay
     *
     * @param ApplePay $applePay
     *
     * @return $this
     */
    public function applePay(?ApplePay $applePay): self
    {
        $this->setApplePay($applePay);

        return $this;
    }

    /**
     * Setter function for applePay
     *
     * @param ApplePay $applePay
     *
     * @return void
     */
    public function setApplePay(?ApplePay $applePay): void
    {
        $this->applePay = $applePay;
    }

    /**
     * Getter function for applePay
     *
     * @return ?ApplePay
     */
    public function getApplePay(): ?ApplePay
    {
        return $this->applePay;
    }
    /**
     * Builder function for googlePay
     *
     * @param GooglePay $googlePay
     *
     * @return $this
     */
    public function googlePay(?GooglePay $googlePay): self
    {
        $this->setGooglePay($googlePay);

        return $this;
    }

    /**
     * Setter function for googlePay
     *
     * @param GooglePay $googlePay
     *
     * @return void
     */
    public function setGooglePay(?GooglePay $googlePay): void
    {
        $this->googlePay = $googlePay;
    }

    /**
     * Getter function for googlePay
     *
     * @return ?GooglePay
     */
    public function getGooglePay(): ?GooglePay
    {
        return $this->googlePay;
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
     * Builder function for shippingDetails
     *
     * @param ShippingDetails $shippingDetails
     *
     * @return $this
     */
    public function shippingDetails(?ShippingDetails $shippingDetails): self
    {
        $this->setShippingDetails($shippingDetails);

        return $this;
    }

    /**
     * Setter function for shippingDetails
     *
     * @param ShippingDetails $shippingDetails
     *
     * @return void
     */
    public function setShippingDetails(?ShippingDetails $shippingDetails): void
    {
        $this->shippingDetails = $shippingDetails;
    }

    /**
     * Getter function for shippingDetails
     *
     * @return ?ShippingDetails
     */
    public function getShippingDetails(): ?ShippingDetails
    {
        return $this->shippingDetails;
    }
    /**
     * Builder function for profile
     *
     * @param Profile $profile
     *
     * @return $this
     */
    public function profile(?Profile $profile): self
    {
        $this->setProfile($profile);

        return $this;
    }

    /**
     * Setter function for profile
     *
     * @param Profile $profile
     *
     * @return void
     */
    public function setProfile(?Profile $profile): void
    {
        $this->profile = $profile;
    }

    /**
     * Getter function for profile
     *
     * @return ?Profile
     */
    public function getProfile(): ?Profile
    {
        return $this->profile;
    }
    /**
     * Builder function for merchantDescriptor
     *
     * @param MerchantDescriptor $merchantDescriptor
     *
     * @return $this
     */
    public function merchantDescriptor(?MerchantDescriptor $merchantDescriptor): self
    {
        $this->setMerchantDescriptor($merchantDescriptor);

        return $this;
    }

    /**
     * Setter function for merchantDescriptor
     *
     * @param MerchantDescriptor $merchantDescriptor
     *
     * @return void
     */
    public function setMerchantDescriptor(?MerchantDescriptor $merchantDescriptor): void
    {
        $this->merchantDescriptor = $merchantDescriptor;
    }

    /**
     * Getter function for merchantDescriptor
     *
     * @return ?MerchantDescriptor
     */
    public function getMerchantDescriptor(): ?MerchantDescriptor
    {
        return $this->merchantDescriptor;
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
     * Builder function for returnLinks
     *
     * @param ReturnLink[] $returnLinks
     *
     * @return $this
     */
    public function returnLinks(array $returnLinks): self
    {
        $this->setReturnLinks($returnLinks);

        return $this;
    }

    /**
     * Setter function for returnLinks
     *
     * @param ReturnLink[] $returnLinks
     *
     * @return void
     */
    public function setReturnLinks(array $returnLinks): void
    {
        $this->returnLinks = $returnLinks;
    }

    /**
     * Getter function for returnLinks
     *
     * @return ReturnLink[]
     */
    public function getReturnLinks(): array
    {
        return $this->returnLinks ?? [];
    }
    /**
     * Builder function for threeDs
     *
     * @param ThreeDs $threeDs
     *
     * @return $this
     */
    public function threeDs(?ThreeDs $threeDs): self
    {
        $this->setThreeDs($threeDs);

        return $this;
    }

    /**
     * Setter function for threeDs
     *
     * @param ThreeDs $threeDs
     *
     * @return void
     */
    public function setThreeDs(?ThreeDs $threeDs): void
    {
        $this->threeDs = $threeDs;
    }

    /**
     * Getter function for threeDs
     *
     * @return ?ThreeDs
     */
    public function getThreeDs(): ?ThreeDs
    {
        return $this->threeDs;
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
     * Builder function for authentication
     *
     * @param CardAuthentication $authentication
     *
     * @return $this
     */
    public function authentication(?CardAuthentication $authentication): self
    {
        $this->setAuthentication($authentication);

        return $this;
    }

    /**
     * Setter function for authentication
     *
     * @param CardAuthentication $authentication
     *
     * @return void
     */
    public function setAuthentication(?CardAuthentication $authentication): void
    {
        $this->authentication = $authentication;
    }

    /**
     * Getter function for authentication
     *
     * @return ?CardAuthentication
     */
    public function getAuthentication(): ?CardAuthentication
    {
        return $this->authentication;
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
     * Builder function for transactionIntent
     *
     * @param string $transactionIntent
     *
     * @return $this
     */
    public function transactionIntent(?string $transactionIntent): self
    {
        $this->setTransactionIntent($transactionIntent);

        return $this;
    }

    /**
     * Setter function for transactionIntent
     *
     * @param string $transactionIntent
     *
     * @return void
     */
    public function setTransactionIntent(?string $transactionIntent): void
    {
        $this->transactionIntent = $transactionIntent;
    }

    /**
     * Getter function for transactionIntent
     *
     * @return ?string
     */
    public function getTransactionIntent(): ?string
    {
        return $this->transactionIntent;
    }
    /**
     * Builder function for skrill
     *
     * @param Skrill $skrill
     *
     * @return $this
     */
    public function skrill(?Skrill $skrill): self
    {
        $this->setSkrill($skrill);

        return $this;
    }

    /**
     * Setter function for skrill
     *
     * @param Skrill $skrill
     *
     * @return void
     */
    public function setSkrill(?Skrill $skrill): void
    {
        $this->skrill = $skrill;
    }

    /**
     * Getter function for skrill
     *
     * @return ?Skrill
     */
    public function getSkrill(): ?Skrill
    {
        return $this->skrill;
    }
    /**
     * Builder function for neteller
     *
     * @param Neteller $neteller
     *
     * @return $this
     */
    public function neteller(?Neteller $neteller): self
    {
        $this->setNeteller($neteller);

        return $this;
    }

    /**
     * Setter function for neteller
     *
     * @param Neteller $neteller
     *
     * @return void
     */
    public function setNeteller(?Neteller $neteller): void
    {
        $this->neteller = $neteller;
    }

    /**
     * Getter function for neteller
     *
     * @return ?Neteller
     */
    public function getNeteller(): ?Neteller
    {
        return $this->neteller;
    }
    /**
     * Builder function for paysafecash
     *
     * @param Paysafecash $paysafecash
     *
     * @return $this
     */
    public function paysafecash(?Paysafecash $paysafecash): self
    {
        $this->setPaysafecash($paysafecash);

        return $this;
    }

    /**
     * Setter function for paysafecash
     *
     * @param Paysafecash $paysafecash
     *
     * @return void
     */
    public function setPaysafecash(?Paysafecash $paysafecash): void
    {
        $this->paysafecash = $paysafecash;
    }

    /**
     * Getter function for paysafecash
     *
     * @return ?Paysafecash
     */
    public function getPaysafecash(): ?Paysafecash
    {
        return $this->paysafecash;
    }
    /**
     * Builder function for paysafecard
     *
     * @param Paysafecard $paysafecard
     *
     * @return $this
     */
    public function paysafecard(?Paysafecard $paysafecard): self
    {
        $this->setPaysafecard($paysafecard);

        return $this;
    }

    /**
     * Setter function for paysafecard
     *
     * @param Paysafecard $paysafecard
     *
     * @return void
     */
    public function setPaysafecard(?Paysafecard $paysafecard): void
    {
        $this->paysafecard = $paysafecard;
    }

    /**
     * Getter function for paysafecard
     *
     * @return ?Paysafecard
     */
    public function getPaysafecard(): ?Paysafecard
    {
        return $this->paysafecard;
    }
    /**
     * Builder function for payPal
     *
     * @param Paypal $payPal
     *
     * @return $this
     */
    public function payPal(?Paypal $payPal): self
    {
        $this->setPayPal($payPal);

        return $this;
    }

    /**
     * Setter function for payPal
     *
     * @param Paypal $payPal
     *
     * @return void
     */
    public function setPayPal(?Paypal $payPal): void
    {
        $this->payPal = $payPal;
    }

    /**
     * Getter function for payPal
     *
     * @return ?Paypal
     */
    public function getPayPal(): ?Paypal
    {
        return $this->payPal;
    }
    /**
     * Builder function for venmo
     *
     * @param Venmo $venmo
     *
     * @return $this
     */
    public function venmo(?Venmo $venmo): self
    {
        $this->setVenmo($venmo);

        return $this;
    }

    /**
     * Setter function for venmo
     *
     * @param Venmo $venmo
     *
     * @return void
     */
    public function setVenmo(?Venmo $venmo): void
    {
        $this->venmo = $venmo;
    }

    /**
     * Getter function for venmo
     *
     * @return ?Venmo
     */
    public function getVenmo(): ?Venmo
    {
        return $this->venmo;
    }
    /**
     * Builder function for vippreferred
     *
     * @param Vippreferred $vippreferred
     *
     * @return $this
     */
    public function vippreferred(?Vippreferred $vippreferred): self
    {
        $this->setVippreferred($vippreferred);

        return $this;
    }

    /**
     * Setter function for vippreferred
     *
     * @param Vippreferred $vippreferred
     *
     * @return void
     */
    public function setVippreferred(?Vippreferred $vippreferred): void
    {
        $this->vippreferred = $vippreferred;
    }

    /**
     * Getter function for vippreferred
     *
     * @return ?Vippreferred
     */
    public function getVippreferred(): ?Vippreferred
    {
        return $this->vippreferred;
    }
    /**
     * Builder function for mazooma
     *
     * @param Mazooma $mazooma
     *
     * @return $this
     */
    public function mazooma(?Mazooma $mazooma): self
    {
        $this->setMazooma($mazooma);

        return $this;
    }

    /**
     * Setter function for mazooma
     *
     * @param Mazooma $mazooma
     *
     * @return void
     */
    public function setMazooma(?Mazooma $mazooma): void
    {
        $this->mazooma = $mazooma;
    }

    /**
     * Getter function for mazooma
     *
     * @return ?Mazooma
     */
    public function getMazooma(): ?Mazooma
    {
        return $this->mazooma;
    }
    /**
     * Builder function for sightline
     *
     * @param Sightline $sightline
     *
     * @return $this
     */
    public function sightline(?Sightline $sightline): self
    {
        $this->setSightline($sightline);

        return $this;
    }

    /**
     * Setter function for sightline
     *
     * @param Sightline $sightline
     *
     * @return void
     */
    public function setSightline(?Sightline $sightline): void
    {
        $this->sightline = $sightline;
    }

    /**
     * Getter function for sightline
     *
     * @return ?Sightline
     */
    public function getSightline(): ?Sightline
    {
        return $this->sightline;
    }
    /**
     * Builder function for payByBank
     *
     * @param PayByBank $payByBank
     *
     * @return $this
     */
    public function payByBank(?PayByBank $payByBank): self
    {
        $this->setPayByBank($payByBank);

        return $this;
    }

    /**
     * Setter function for payByBank
     *
     * @param PayByBank $payByBank
     *
     * @return void
     */
    public function setPayByBank(?PayByBank $payByBank): void
    {
        $this->payByBank = $payByBank;
    }

    /**
     * Getter function for payByBank
     *
     * @return ?PayByBank
     */
    public function getPayByBank(): ?PayByBank
    {
        return $this->payByBank;
    }
    /**
     * Builder function for interacETransfer
     *
     * @param Interac $interacETransfer
     *
     * @return $this
     */
    public function interacETransfer(?Interac $interacETransfer): self
    {
        $this->setInteracETransfer($interacETransfer);

        return $this;
    }

    /**
     * Setter function for interacETransfer
     *
     * @param Interac $interacETransfer
     *
     * @return void
     */
    public function setInteracETransfer(?Interac $interacETransfer): void
    {
        $this->interacETransfer = $interacETransfer;
    }

    /**
     * Getter function for interacETransfer
     *
     * @return ?Interac
     */
    public function getInteracETransfer(): ?Interac
    {
        return $this->interacETransfer;
    }
    /**
     * Builder function for rapidTransfer
     *
     * @param RapidTransfer $rapidTransfer
     *
     * @return $this
     */
    public function rapidTransfer(?RapidTransfer $rapidTransfer): self
    {
        $this->setRapidTransfer($rapidTransfer);

        return $this;
    }

    /**
     * Setter function for rapidTransfer
     *
     * @param RapidTransfer $rapidTransfer
     *
     * @return void
     */
    public function setRapidTransfer(?RapidTransfer $rapidTransfer): void
    {
        $this->rapidTransfer = $rapidTransfer;
    }

    /**
     * Getter function for rapidTransfer
     *
     * @return ?RapidTransfer
     */
    public function getRapidTransfer(): ?RapidTransfer
    {
        return $this->rapidTransfer;
    }
    /**
     * Builder function for skrill1Tap
     *
     * @param Skrill1Tap $skrill1Tap
     *
     * @return $this
     */
    public function skrill1Tap(?Skrill1Tap $skrill1Tap): self
    {
        $this->setSkrill1Tap($skrill1Tap);

        return $this;
    }

    /**
     * Setter function for skrill1Tap
     *
     * @param Skrill1Tap $skrill1Tap
     *
     * @return void
     */
    public function setSkrill1Tap(?Skrill1Tap $skrill1Tap): void
    {
        $this->skrill1Tap = $skrill1Tap;
    }

    /**
     * Getter function for skrill1Tap
     *
     * @return ?Skrill1Tap
     */
    public function getSkrill1Tap(): ?Skrill1Tap
    {
        return $this->skrill1Tap;
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
     * Builder function for safetyPayCash
     *
     * @param SafetyPayCash $safetyPayCash
     *
     * @return $this
     */
    public function safetyPayCash(?SafetyPayCash $safetyPayCash): self
    {
        $this->setSafetyPayCash($safetyPayCash);

        return $this;
    }

    /**
     * Setter function for safetyPayCash
     *
     * @param SafetyPayCash $safetyPayCash
     *
     * @return void
     */
    public function setSafetyPayCash(?SafetyPayCash $safetyPayCash): void
    {
        $this->safetyPayCash = $safetyPayCash;
    }

    /**
     * Getter function for safetyPayCash
     *
     * @return ?SafetyPayCash
     */
    public function getSafetyPayCash(): ?SafetyPayCash
    {
        return $this->safetyPayCash;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class PaymentHandleRequest {" . PHP_EOL
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum ?? null) . PHP_EOL
            . "    transactionType: " . $this->toIndentedString($this->transactionType ?? null) . PHP_EOL
            . "    dupCheck: " . $this->toIndentedString($this->dupCheck ?? null) . PHP_EOL
            . "    accountId: " . $this->toIndentedString($this->accountId ?? null) . PHP_EOL
            . "    paymentType: " . $this->toIndentedString($this->paymentType ?? null) . PHP_EOL
            . "    amount: " . $this->toIndentedString($this->amount ?? null) . PHP_EOL
            . "    merchantAccountId: " . $this->toIndentedString($this->merchantAccountId ?? null) . PHP_EOL
            . "    currencyCode: " . $this->toIndentedString($this->currencyCode ?? null) . PHP_EOL
            . "    card: " . $this->toIndentedString($this->card ?? null) . PHP_EOL
            . "    applePay: " . $this->toIndentedString($this->applePay ?? null) . PHP_EOL
            . "    googlePay: " . $this->toIndentedString($this->googlePay ?? null) . PHP_EOL
            . "    billingDetails: " . $this->toIndentedString($this->billingDetails ?? null) . PHP_EOL
            . "    shippingDetails: " . $this->toIndentedString($this->shippingDetails ?? null) . PHP_EOL
            . "    profile: " . $this->toIndentedString($this->profile ?? null) . PHP_EOL
            . "    merchantDescriptor: " . $this->toIndentedString($this->merchantDescriptor ?? null) . PHP_EOL
            . "    customerIp: " . $this->toIndentedString($this->customerIp ?? null) . PHP_EOL
            . "    returnLinks: " . $this->toIndentedString($this->returnLinks ?? null) . PHP_EOL
            . "    threeDs: " . $this->toIndentedString($this->threeDs ?? null) . PHP_EOL
            . "    mandates: " . $this->toIndentedString($this->mandates ?? null) . PHP_EOL
            . "    authentication: " . $this->toIndentedString($this->authentication ?? null) . PHP_EOL
            . "    paymentHandleTokenFrom: " . $this->toIndentedString($this->paymentHandleTokenFrom ?? null) . PHP_EOL
            . "    transactionIntent: " . $this->toIndentedString($this->transactionIntent ?? null) . PHP_EOL
            . "    skrill: " . $this->toIndentedString($this->skrill ?? null) . PHP_EOL
            . "    neteller: " . $this->toIndentedString($this->neteller ?? null) . PHP_EOL
            . "    paysafecash: " . $this->toIndentedString($this->paysafecash ?? null) . PHP_EOL
            . "    paysafecard: " . $this->toIndentedString($this->paysafecard ?? null) . PHP_EOL
            . "    payPal: " . $this->toIndentedString($this->payPal ?? null) . PHP_EOL
            . "    venmo: " . $this->toIndentedString($this->venmo ?? null) . PHP_EOL
            . "    vippreferred: " . $this->toIndentedString($this->vippreferred ?? null) . PHP_EOL
            . "    mazooma: " . $this->toIndentedString($this->mazooma ?? null) . PHP_EOL
            . "    sightline: " . $this->toIndentedString($this->sightline ?? null) . PHP_EOL
            . "    payByBank: " . $this->toIndentedString($this->payByBank ?? null) . PHP_EOL
            . "    interacETransfer: " . $this->toIndentedString($this->interacETransfer ?? null) . PHP_EOL
            . "    rapidTransfer: " . $this->toIndentedString($this->rapidTransfer ?? null) . PHP_EOL
            . "    skrill1Tap: " . $this->toIndentedString($this->skrill1Tap ?? null) . PHP_EOL
            . "    ach: " . $this->toIndentedString($this->ach ?? null) . PHP_EOL
            . "    eft: " . $this->toIndentedString($this->eft ?? null) . PHP_EOL
            . "    bacs: " . $this->toIndentedString($this->bacs ?? null) . PHP_EOL
            . "    sepa: " . $this->toIndentedString($this->sepa ?? null) . PHP_EOL
            . "    safetyPayCash: " . $this->toIndentedString($this->safetyPayCash ?? null) . PHP_EOL
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
