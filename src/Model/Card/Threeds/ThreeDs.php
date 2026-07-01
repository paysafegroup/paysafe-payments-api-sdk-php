<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Threeds;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\BillingCycle;


/**
 * 3D Secure authentication details. You need to send this object when you want to process CARD transaction with 3DS. Required if account is enabled for 3DS.
 */
class ThreeDs extends BaseModel
{
    /**
     * The unique ID returned in the response
     */
    private ?string $id = null;
    /**
     * Fully qualified URL of the merchant's commercial or customer care website
     */
    private ?string $merchantUrl = null;
    private ?string $deviceChannel = null;
    private ?string $requestorChallengePreference = null;
    private ?string $messageCategory = null;
    private ?string $authenticationPurpose = null;
    private ?string $transactionIntent = null;
    /**
     * Indicator representing whether to call authenticate endpoint or not
     */
    private ?bool $process = null;
    /**
     * UUID used with device fingerprinting
     */
    private ?string $deviceFingerprintingId = null;
    /**
     * Maximum number of authorizations for instalment payment
     */
    private ?int $maxAuthorizationsForInstalmentPayment = null;
    /**
     * Indicates whether the 3DS Requestor has experienced suspicious activity on the cardholder account
     */
    private ?bool $suspiciousAccountActivity = null;
    /**
     * Transaction count for last 6 months
     */
    private ?int $totalPurchasesSixMonthCount = null;
    /**
     * Number of transactions in the previous day
     */
    private ?int $transactionCountForPreviousDay = null;
    /**
     * Number of transactions in the previous year
     */
    private ?int $transactionCountForPreviousYear = null;
    /**
     * Date and time of the transaction
     */
    private ?string $txnTime = null;
    /**
     * Date and time of the initial purchase. <b>Note:</b> This element is required only if messageCategory=NON_PAYMENT and authenticationPurpose=INSTALMENT_TRANSACTION or RECURRING_TRANSACTION
     */
    private ?string $initialPurchaseTime = null;
    private ?BillingCycle $billingCycle = null;
    private ?BrowserDetails $browserDetails = null;
    private ?OrderItemDetails $orderItemDetails = null;
    private ?PurchasedGiftCardDetails $purchasedGiftCardDetails = null;
    private ?UserAccountDetails $userAccountDetails = null;
    private ?ShippingDetailsUsage $shippingDetailsUsage = null;
    private ?TravelDetails $travelDetails = null;
    private ?UserLogin $userLogin = null;
    private ?ElectronicDelivery $electronicDelivery = null;

    /**
     * Builder function for id
     *
     * @param string $id
     *
     * @return $this
     */
    public function id(?string $id): self
    {
        $this->setId($id);

        return $this;
    }

    /**
     * Setter function for id
     *
     * @param string $id
     *
     * @return void
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter function for id
     *
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * Builder function for merchantUrl
     *
     * @param string $merchantUrl
     *
     * @return $this
     */
    public function merchantUrl(?string $merchantUrl): self
    {
        $this->setMerchantUrl($merchantUrl);

        return $this;
    }

    /**
     * Setter function for merchantUrl
     *
     * @param string $merchantUrl
     *
     * @return void
     */
    public function setMerchantUrl(?string $merchantUrl): void
    {
        $this->merchantUrl = $merchantUrl;
    }

    /**
     * Getter function for merchantUrl
     *
     * @return ?string
     */
    public function getMerchantUrl(): ?string
    {
        return $this->merchantUrl;
    }
    /**
     * Builder function for deviceChannel
     *
     * @param string $deviceChannel
     *
     * @return $this
     */
    public function deviceChannel(?string $deviceChannel): self
    {
        $this->setDeviceChannel($deviceChannel);

        return $this;
    }

    /**
     * Setter function for deviceChannel
     *
     * @param string $deviceChannel
     *
     * @return void
     */
    public function setDeviceChannel(?string $deviceChannel): void
    {
        $this->deviceChannel = $deviceChannel;
    }

    /**
     * Getter function for deviceChannel
     *
     * @return ?string
     */
    public function getDeviceChannel(): ?string
    {
        return $this->deviceChannel;
    }
    /**
     * Builder function for requestorChallengePreference
     *
     * @param string $requestorChallengePreference
     *
     * @return $this
     */
    public function requestorChallengePreference(?string $requestorChallengePreference): self
    {
        $this->setRequestorChallengePreference($requestorChallengePreference);

        return $this;
    }

    /**
     * Setter function for requestorChallengePreference
     *
     * @param string $requestorChallengePreference
     *
     * @return void
     */
    public function setRequestorChallengePreference(?string $requestorChallengePreference): void
    {
        $this->requestorChallengePreference = $requestorChallengePreference;
    }

    /**
     * Getter function for requestorChallengePreference
     *
     * @return ?string
     */
    public function getRequestorChallengePreference(): ?string
    {
        return $this->requestorChallengePreference;
    }
    /**
     * Builder function for messageCategory
     *
     * @param string $messageCategory
     *
     * @return $this
     */
    public function messageCategory(?string $messageCategory): self
    {
        $this->setMessageCategory($messageCategory);

        return $this;
    }

    /**
     * Setter function for messageCategory
     *
     * @param string $messageCategory
     *
     * @return void
     */
    public function setMessageCategory(?string $messageCategory): void
    {
        $this->messageCategory = $messageCategory;
    }

    /**
     * Getter function for messageCategory
     *
     * @return ?string
     */
    public function getMessageCategory(): ?string
    {
        return $this->messageCategory;
    }
    /**
     * Builder function for authenticationPurpose
     *
     * @param string $authenticationPurpose
     *
     * @return $this
     */
    public function authenticationPurpose(?string $authenticationPurpose): self
    {
        $this->setAuthenticationPurpose($authenticationPurpose);

        return $this;
    }

    /**
     * Setter function for authenticationPurpose
     *
     * @param string $authenticationPurpose
     *
     * @return void
     */
    public function setAuthenticationPurpose(?string $authenticationPurpose): void
    {
        $this->authenticationPurpose = $authenticationPurpose;
    }

    /**
     * Getter function for authenticationPurpose
     *
     * @return ?string
     */
    public function getAuthenticationPurpose(): ?string
    {
        return $this->authenticationPurpose;
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
     * Builder function for process
     *
     * @param bool $process
     *
     * @return $this
     */
    public function process(?bool $process): self
    {
        $this->setProcess($process);

        return $this;
    }

    /**
     * Setter function for process
     *
     * @param bool $process
     *
     * @return void
     */
    public function setProcess(?bool $process): void
    {
        $this->process = $process;
    }

    /**
     * Getter function for process
     *
     * @return ?bool
     */
    public function getProcess(): ?bool
    {
        return $this->process;
    }
    /**
     * Builder function for deviceFingerprintingId
     *
     * @param string $deviceFingerprintingId
     *
     * @return $this
     */
    public function deviceFingerprintingId(?string $deviceFingerprintingId): self
    {
        $this->setDeviceFingerprintingId($deviceFingerprintingId);

        return $this;
    }

    /**
     * Setter function for deviceFingerprintingId
     *
     * @param string $deviceFingerprintingId
     *
     * @return void
     */
    public function setDeviceFingerprintingId(?string $deviceFingerprintingId): void
    {
        $this->deviceFingerprintingId = $deviceFingerprintingId;
    }

    /**
     * Getter function for deviceFingerprintingId
     *
     * @return ?string
     */
    public function getDeviceFingerprintingId(): ?string
    {
        return $this->deviceFingerprintingId;
    }
    /**
     * Builder function for maxAuthorizationsForInstalmentPayment
     *
     * @param int $maxAuthorizationsForInstalmentPayment
     *
     * @return $this
     */
    public function maxAuthorizationsForInstalmentPayment(?int $maxAuthorizationsForInstalmentPayment): self
    {
        $this->setMaxAuthorizationsForInstalmentPayment($maxAuthorizationsForInstalmentPayment);

        return $this;
    }

    /**
     * Setter function for maxAuthorizationsForInstalmentPayment
     *
     * @param int $maxAuthorizationsForInstalmentPayment
     *
     * @return void
     */
    public function setMaxAuthorizationsForInstalmentPayment(?int $maxAuthorizationsForInstalmentPayment): void
    {
        $this->maxAuthorizationsForInstalmentPayment = $maxAuthorizationsForInstalmentPayment;
    }

    /**
     * Getter function for maxAuthorizationsForInstalmentPayment
     *
     * @return ?int
     */
    public function getMaxAuthorizationsForInstalmentPayment(): ?int
    {
        return $this->maxAuthorizationsForInstalmentPayment;
    }
    /**
     * Builder function for suspiciousAccountActivity
     *
     * @param bool $suspiciousAccountActivity
     *
     * @return $this
     */
    public function suspiciousAccountActivity(?bool $suspiciousAccountActivity): self
    {
        $this->setSuspiciousAccountActivity($suspiciousAccountActivity);

        return $this;
    }

    /**
     * Setter function for suspiciousAccountActivity
     *
     * @param bool $suspiciousAccountActivity
     *
     * @return void
     */
    public function setSuspiciousAccountActivity(?bool $suspiciousAccountActivity): void
    {
        $this->suspiciousAccountActivity = $suspiciousAccountActivity;
    }

    /**
     * Getter function for suspiciousAccountActivity
     *
     * @return ?bool
     */
    public function getSuspiciousAccountActivity(): ?bool
    {
        return $this->suspiciousAccountActivity;
    }
    /**
     * Builder function for totalPurchasesSixMonthCount
     *
     * @param int $totalPurchasesSixMonthCount
     *
     * @return $this
     */
    public function totalPurchasesSixMonthCount(?int $totalPurchasesSixMonthCount): self
    {
        $this->setTotalPurchasesSixMonthCount($totalPurchasesSixMonthCount);

        return $this;
    }

    /**
     * Setter function for totalPurchasesSixMonthCount
     *
     * @param int $totalPurchasesSixMonthCount
     *
     * @return void
     */
    public function setTotalPurchasesSixMonthCount(?int $totalPurchasesSixMonthCount): void
    {
        $this->totalPurchasesSixMonthCount = $totalPurchasesSixMonthCount;
    }

    /**
     * Getter function for totalPurchasesSixMonthCount
     *
     * @return ?int
     */
    public function getTotalPurchasesSixMonthCount(): ?int
    {
        return $this->totalPurchasesSixMonthCount;
    }
    /**
     * Builder function for transactionCountForPreviousDay
     *
     * @param int $transactionCountForPreviousDay
     *
     * @return $this
     */
    public function transactionCountForPreviousDay(?int $transactionCountForPreviousDay): self
    {
        $this->setTransactionCountForPreviousDay($transactionCountForPreviousDay);

        return $this;
    }

    /**
     * Setter function for transactionCountForPreviousDay
     *
     * @param int $transactionCountForPreviousDay
     *
     * @return void
     */
    public function setTransactionCountForPreviousDay(?int $transactionCountForPreviousDay): void
    {
        $this->transactionCountForPreviousDay = $transactionCountForPreviousDay;
    }

    /**
     * Getter function for transactionCountForPreviousDay
     *
     * @return ?int
     */
    public function getTransactionCountForPreviousDay(): ?int
    {
        return $this->transactionCountForPreviousDay;
    }
    /**
     * Builder function for transactionCountForPreviousYear
     *
     * @param int $transactionCountForPreviousYear
     *
     * @return $this
     */
    public function transactionCountForPreviousYear(?int $transactionCountForPreviousYear): self
    {
        $this->setTransactionCountForPreviousYear($transactionCountForPreviousYear);

        return $this;
    }

    /**
     * Setter function for transactionCountForPreviousYear
     *
     * @param int $transactionCountForPreviousYear
     *
     * @return void
     */
    public function setTransactionCountForPreviousYear(?int $transactionCountForPreviousYear): void
    {
        $this->transactionCountForPreviousYear = $transactionCountForPreviousYear;
    }

    /**
     * Getter function for transactionCountForPreviousYear
     *
     * @return ?int
     */
    public function getTransactionCountForPreviousYear(): ?int
    {
        return $this->transactionCountForPreviousYear;
    }
    /**
     * Builder function for txnTime
     *
     * @param string $txnTime
     *
     * @return $this
     */
    public function txnTime(?string $txnTime): self
    {
        $this->setTxnTime($txnTime);

        return $this;
    }

    /**
     * Setter function for txnTime
     *
     * @param string $txnTime
     *
     * @return void
     */
    public function setTxnTime(?string $txnTime): void
    {
        $this->txnTime = $txnTime;
    }

    /**
     * Getter function for txnTime
     *
     * @return ?string
     */
    public function getTxnTime(): ?string
    {
        return $this->txnTime;
    }
    /**
     * Builder function for initialPurchaseTime
     *
     * @param string $initialPurchaseTime
     *
     * @return $this
     */
    public function initialPurchaseTime(?string $initialPurchaseTime): self
    {
        $this->setInitialPurchaseTime($initialPurchaseTime);

        return $this;
    }

    /**
     * Setter function for initialPurchaseTime
     *
     * @param string $initialPurchaseTime
     *
     * @return void
     */
    public function setInitialPurchaseTime(?string $initialPurchaseTime): void
    {
        $this->initialPurchaseTime = $initialPurchaseTime;
    }

    /**
     * Getter function for initialPurchaseTime
     *
     * @return ?string
     */
    public function getInitialPurchaseTime(): ?string
    {
        return $this->initialPurchaseTime;
    }
    /**
     * Builder function for billingCycle
     *
     * @param BillingCycle $billingCycle
     *
     * @return $this
     */
    public function billingCycle(?BillingCycle $billingCycle): self
    {
        $this->setBillingCycle($billingCycle);

        return $this;
    }

    /**
     * Setter function for billingCycle
     *
     * @param BillingCycle $billingCycle
     *
     * @return void
     */
    public function setBillingCycle(?BillingCycle $billingCycle): void
    {
        $this->billingCycle = $billingCycle;
    }

    /**
     * Getter function for billingCycle
     *
     * @return ?BillingCycle
     */
    public function getBillingCycle(): ?BillingCycle
    {
        return $this->billingCycle;
    }
    /**
     * Builder function for browserDetails
     *
     * @param BrowserDetails $browserDetails
     *
     * @return $this
     */
    public function browserDetails(?BrowserDetails $browserDetails): self
    {
        $this->setBrowserDetails($browserDetails);

        return $this;
    }

    /**
     * Setter function for browserDetails
     *
     * @param BrowserDetails $browserDetails
     *
     * @return void
     */
    public function setBrowserDetails(?BrowserDetails $browserDetails): void
    {
        $this->browserDetails = $browserDetails;
    }

    /**
     * Getter function for browserDetails
     *
     * @return ?BrowserDetails
     */
    public function getBrowserDetails(): ?BrowserDetails
    {
        return $this->browserDetails;
    }
    /**
     * Builder function for orderItemDetails
     *
     * @param OrderItemDetails $orderItemDetails
     *
     * @return $this
     */
    public function orderItemDetails(?OrderItemDetails $orderItemDetails): self
    {
        $this->setOrderItemDetails($orderItemDetails);

        return $this;
    }

    /**
     * Setter function for orderItemDetails
     *
     * @param OrderItemDetails $orderItemDetails
     *
     * @return void
     */
    public function setOrderItemDetails(?OrderItemDetails $orderItemDetails): void
    {
        $this->orderItemDetails = $orderItemDetails;
    }

    /**
     * Getter function for orderItemDetails
     *
     * @return ?OrderItemDetails
     */
    public function getOrderItemDetails(): ?OrderItemDetails
    {
        return $this->orderItemDetails;
    }
    /**
     * Builder function for purchasedGiftCardDetails
     *
     * @param PurchasedGiftCardDetails $purchasedGiftCardDetails
     *
     * @return $this
     */
    public function purchasedGiftCardDetails(?PurchasedGiftCardDetails $purchasedGiftCardDetails): self
    {
        $this->setPurchasedGiftCardDetails($purchasedGiftCardDetails);

        return $this;
    }

    /**
     * Setter function for purchasedGiftCardDetails
     *
     * @param PurchasedGiftCardDetails $purchasedGiftCardDetails
     *
     * @return void
     */
    public function setPurchasedGiftCardDetails(?PurchasedGiftCardDetails $purchasedGiftCardDetails): void
    {
        $this->purchasedGiftCardDetails = $purchasedGiftCardDetails;
    }

    /**
     * Getter function for purchasedGiftCardDetails
     *
     * @return ?PurchasedGiftCardDetails
     */
    public function getPurchasedGiftCardDetails(): ?PurchasedGiftCardDetails
    {
        return $this->purchasedGiftCardDetails;
    }
    /**
     * Builder function for userAccountDetails
     *
     * @param UserAccountDetails $userAccountDetails
     *
     * @return $this
     */
    public function userAccountDetails(?UserAccountDetails $userAccountDetails): self
    {
        $this->setUserAccountDetails($userAccountDetails);

        return $this;
    }

    /**
     * Setter function for userAccountDetails
     *
     * @param UserAccountDetails $userAccountDetails
     *
     * @return void
     */
    public function setUserAccountDetails(?UserAccountDetails $userAccountDetails): void
    {
        $this->userAccountDetails = $userAccountDetails;
    }

    /**
     * Getter function for userAccountDetails
     *
     * @return ?UserAccountDetails
     */
    public function getUserAccountDetails(): ?UserAccountDetails
    {
        return $this->userAccountDetails;
    }
    /**
     * Builder function for shippingDetailsUsage
     *
     * @param ShippingDetailsUsage $shippingDetailsUsage
     *
     * @return $this
     */
    public function shippingDetailsUsage(?ShippingDetailsUsage $shippingDetailsUsage): self
    {
        $this->setShippingDetailsUsage($shippingDetailsUsage);

        return $this;
    }

    /**
     * Setter function for shippingDetailsUsage
     *
     * @param ShippingDetailsUsage $shippingDetailsUsage
     *
     * @return void
     */
    public function setShippingDetailsUsage(?ShippingDetailsUsage $shippingDetailsUsage): void
    {
        $this->shippingDetailsUsage = $shippingDetailsUsage;
    }

    /**
     * Getter function for shippingDetailsUsage
     *
     * @return ?ShippingDetailsUsage
     */
    public function getShippingDetailsUsage(): ?ShippingDetailsUsage
    {
        return $this->shippingDetailsUsage;
    }
    /**
     * Builder function for travelDetails
     *
     * @param TravelDetails $travelDetails
     *
     * @return $this
     */
    public function travelDetails(?TravelDetails $travelDetails): self
    {
        $this->setTravelDetails($travelDetails);

        return $this;
    }

    /**
     * Setter function for travelDetails
     *
     * @param TravelDetails $travelDetails
     *
     * @return void
     */
    public function setTravelDetails(?TravelDetails $travelDetails): void
    {
        $this->travelDetails = $travelDetails;
    }

    /**
     * Getter function for travelDetails
     *
     * @return ?TravelDetails
     */
    public function getTravelDetails(): ?TravelDetails
    {
        return $this->travelDetails;
    }
    /**
     * Builder function for userLogin
     *
     * @param UserLogin $userLogin
     *
     * @return $this
     */
    public function userLogin(?UserLogin $userLogin): self
    {
        $this->setUserLogin($userLogin);

        return $this;
    }

    /**
     * Setter function for userLogin
     *
     * @param UserLogin $userLogin
     *
     * @return void
     */
    public function setUserLogin(?UserLogin $userLogin): void
    {
        $this->userLogin = $userLogin;
    }

    /**
     * Getter function for userLogin
     *
     * @return ?UserLogin
     */
    public function getUserLogin(): ?UserLogin
    {
        return $this->userLogin;
    }
    /**
     * Builder function for electronicDelivery
     *
     * @param ElectronicDelivery $electronicDelivery
     *
     * @return $this
     */
    public function electronicDelivery(?ElectronicDelivery $electronicDelivery): self
    {
        $this->setElectronicDelivery($electronicDelivery);

        return $this;
    }

    /**
     * Setter function for electronicDelivery
     *
     * @param ElectronicDelivery $electronicDelivery
     *
     * @return void
     */
    public function setElectronicDelivery(?ElectronicDelivery $electronicDelivery): void
    {
        $this->electronicDelivery = $electronicDelivery;
    }

    /**
     * Getter function for electronicDelivery
     *
     * @return ?ElectronicDelivery
     */
    public function getElectronicDelivery(): ?ElectronicDelivery
    {
        return $this->electronicDelivery;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class ThreeDs {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id ?? null) . PHP_EOL
            . "    merchantUrl: " . $this->toIndentedString($this->merchantUrl ?? null) . PHP_EOL
            . "    deviceChannel: " . $this->toIndentedString($this->deviceChannel ?? null) . PHP_EOL
            . "    requestorChallengePreference: " . $this->toIndentedString($this->requestorChallengePreference ?? null) . PHP_EOL
            . "    messageCategory: " . $this->toIndentedString($this->messageCategory ?? null) . PHP_EOL
            . "    authenticationPurpose: " . $this->toIndentedString($this->authenticationPurpose ?? null) . PHP_EOL
            . "    transactionIntent: " . $this->toIndentedString($this->transactionIntent ?? null) . PHP_EOL
            . "    process: " . $this->toIndentedString($this->process ?? null) . PHP_EOL
            . "    deviceFingerprintingId: " . $this->toIndentedString($this->deviceFingerprintingId ?? null) . PHP_EOL
            . "    maxAuthorizationsForInstalmentPayment: " . $this->toIndentedString($this->maxAuthorizationsForInstalmentPayment ?? null) . PHP_EOL
            . "    suspiciousAccountActivity: " . $this->toIndentedString($this->suspiciousAccountActivity ?? null) . PHP_EOL
            . "    totalPurchasesSixMonthCount: " . $this->toIndentedString($this->totalPurchasesSixMonthCount ?? null) . PHP_EOL
            . "    transactionCountForPreviousDay: " . $this->toIndentedString($this->transactionCountForPreviousDay ?? null) . PHP_EOL
            . "    transactionCountForPreviousYear: " . $this->toIndentedString($this->transactionCountForPreviousYear ?? null) . PHP_EOL
            . "    txnTime: " . $this->toIndentedString($this->txnTime ?? null) . PHP_EOL
            . "    initialPurchaseTime: " . $this->toIndentedString($this->initialPurchaseTime ?? null) . PHP_EOL
            . "    billingCycle: " . $this->toIndentedString($this->billingCycle ?? null) . PHP_EOL
            . "    browserDetails: " . $this->toIndentedString($this->browserDetails ?? null) . PHP_EOL
            . "    orderItemDetails: " . $this->toIndentedString($this->orderItemDetails ?? null) . PHP_EOL
            . "    purchasedGiftCardDetails: " . $this->toIndentedString($this->purchasedGiftCardDetails ?? null) . PHP_EOL
            . "    userAccountDetails: " . $this->toIndentedString($this->userAccountDetails ?? null) . PHP_EOL
            . "    shippingDetailsUsage: " . $this->toIndentedString($this->shippingDetailsUsage ?? null) . PHP_EOL
            . "    travelDetails: " . $this->toIndentedString($this->travelDetails ?? null) . PHP_EOL
            . "    userLogin: " . $this->toIndentedString($this->userLogin ?? null) . PHP_EOL
            . "    electronicDelivery: " . $this->toIndentedString($this->electronicDelivery ?? null) . PHP_EOL
            . "}";
    }
}
