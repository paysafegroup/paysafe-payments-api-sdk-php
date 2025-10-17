<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentHandle;

use Paysafe\PhpSdk\Model\Applepay\ApplePay;
use Paysafe\PhpSdk\Model\BaseApiResponse;
use Paysafe\PhpSdk\Model\Card\CardWithOptionalNetworkTokenOrApplePay;
use Paysafe\PhpSdk\Model\Card\MerchantDescriptor;
use Paysafe\PhpSdk\Model\Card\ThreeDs\BrowserDetails;
use Paysafe\PhpSdk\Model\Card\ThreeDs\NetworkTokenCardObjectAuthentication;
use Paysafe\PhpSdk\Model\Card\ThreeDs\ThreeDs;
use Paysafe\PhpSdk\Model\Common\BillingDetails;
use Paysafe\PhpSdk\Model\Common\DeviceDetails;
use Paysafe\PhpSdk\Model\Common\GatewayResponse;
use Paysafe\PhpSdk\Model\Common\Link;
use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Model\Common\PaymentDetails;
use Paysafe\PhpSdk\Model\Common\Profile\Profile;
use Paysafe\PhpSdk\Model\Common\ReturnLink;
use Paysafe\PhpSdk\Model\Common\ShippingDetails;
use Paysafe\PhpSdk\Model\Googlepay\GooglePay;
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
use Paysafe\PhpSdk\Model\Lpm\Skrill;
use Paysafe\PhpSdk\Model\Lpm\Skrill1Tap;
use Paysafe\PhpSdk\Model\Lpm\Venmo;
use Paysafe\PhpSdk\Model\Lpm\Vippreferred;


/**
 * A Payment Handle represents tokenized information about the payment method that you set up for a customer.
 * Once the Payment Handle is created, you then include the paymentHandleToken in a new Payment / Standalone Credit /
 * Original Credit / Verification request.
 */
class PaymentHandle extends BaseApiResponse
{

    private string $id;
    private string $paymentHandleToken;
    private string $txnTime;
    private string $status;
    private bool $liveMode;
    private string $usage;
    private string $action;
    private string $executionMode;
    private int $timeToLiveSeconds;
    private string $gatewayReconciliationId;
    private string $updatedTime;
    private string $statusTime;
    private array $links;
    private string $merchantRefNum;
    private string $transactionType;
    private string $accountId;
    private string $paymentType;
    private int $amount;
    private string $currencyCode;
    private Profile $profile;
    private BillingDetails $billingDetails;
    private MerchantDescriptor $merchantDescriptor;
    private array $returnLinks;
    private string $customerIp;
    private ShippingDetails $shippingDetails;
    private CardWithOptionalNetworkTokenOrApplePay $card;
    private bool $skip3ds;
    private ThreeDs $threeDs;
    private NetworkTokenCardObjectAuthentication $authentication;
    private string $paymentHandleTokenFrom;
    private string $transactionIntent;
    private GatewayResponse $gatewayResponse;
    private ApplePay $applePay;
    private GooglePay $googlePay;
    private Skrill $skrill;
    private Neteller $neteller;
    private Paysafecash $paysafecash;
    private Paysafecard $paysafecard;
    private Paypal $payPal;
    private Venmo $venmo;
    private Vippreferred $vippreferred;
    private Mazooma $mazooma;
    private Sightline $sightline;
    private PayByBank $payByBank;
    private Interac $interacETransfer;
    private ?BrowserDetails $browserDetails = null;
    private DeviceDetails $deviceDetails;
    private RapidTransfer $rapidTransfer;
    private Skrill1Tap $skrill1Tap;
    private Ach $ach;
    private Eft $eft;
    private bool $dupCheck;
    private Bacs $bacs;
    private ?array $mandates = null;
    private Sepa $sepa;
    private SafetyPayCash $safetyPayCash;
    private int $paymentExpiryInMinutes;
    private PaymentDetails $paymentDetails;
    private int $paymentExpiryMinutes;

    /**
     * Builder function for id
     *
     * @param string $id
     *
     * @return $this
     */
    public function id(string $id): self
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
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter function for id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Builder function for paymentHandleToken
     *
     * @param string $paymentHandleToken
     *
     * @return $this
     */
    public function paymentHandleToken(string $paymentHandleToken): self
    {
        $this->setPaymentHandleToken($paymentHandleToken);

        return $this;
    }

    /**
     * Setter function for paymentHandleToken
     *
     * @param string $paymentHandleToken
     *
     * @return void
     */
    public function setPaymentHandleToken(string $paymentHandleToken): void
    {
        $this->paymentHandleToken = $paymentHandleToken;
    }

    /**
     * Getter function for paymentHandleToken
     *
     * @return string
     */
    public function getPaymentHandleToken(): string
    {
        return $this->paymentHandleToken;
    }

    /**
     * Builder function for txnTime
     *
     * @param string $txnTime
     *
     * @return $this
     */
    public function txnTime(string $txnTime): self
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
    public function setTxnTime(string $txnTime): void
    {
        $this->txnTime = $txnTime;
    }

    /**
     * Getter function for txnTime
     *
     * @return string
     */
    public function getTxnTime(): string
    {
        return $this->txnTime;
    }

    /**
     * Builder function for status
     *
     * @param string $status
     *
     * @return $this
     */
    public function status(string $status): self
    {
        $this->setStatus($status);

        return $this;
    }

    /**
     * Setter function for status
     *
     * @param string $status
     *
     * @return void
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * Getter function for status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Builder function for liveMode
     *
     * @param bool $liveMode
     *
     * @return $this
     */
    public function liveMode(bool $liveMode): self
    {
        $this->setLiveMode($liveMode);

        return $this;
    }

    /**
     * Setter function for liveMode
     *
     * @param bool $liveMode
     *
     * @return void
     */
    public function setLiveMode(bool $liveMode): void
    {
        $this->liveMode = $liveMode;
    }

    /**
     * Getter function for liveMode
     *
     * @return bool
     */
    public function getLiveMode(): bool
    {
        return $this->liveMode;
    }

    /**
     * Builder function for usage
     *
     * @param string $usage
     *
     * @return $this
     */
    public function usage(string $usage): self
    {
        $this->setUsage($usage);

        return $this;
    }

    /**
     * Setter function for usage
     *
     * @param string $usage
     *
     * @return void
     */
    public function setUsage(string $usage): void
    {
        $this->usage = $usage;
    }

    /**
     * Getter function for usage
     *
     * @return string
     */
    public function getUsage(): string
    {
        return $this->usage;
    }

    /**
     * Builder function for action
     *
     * @param string $action
     *
     * @return $this
     */
    public function action(string $action): self
    {
        $this->setAction($action);

        return $this;
    }

    /**
     * Setter function for action
     *
     * @param string $action
     *
     * @return void
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    /**
     * Getter function for action
     *
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * Builder function for executionMode
     *
     * @param string $executionMode
     *
     * @return $this
     */
    public function executionMode(string $executionMode): self
    {
        $this->setExecutionMode($executionMode);

        return $this;
    }

    /**
     * Setter function for executionMode
     *
     * @param string $executionMode
     *
     * @return void
     */
    public function setExecutionMode(string $executionMode): void
    {
        $this->executionMode = $executionMode;
    }

    /**
     * Getter function for executionMode
     *
     * @return string
     */
    public function getExecutionMode(): string
    {
        return $this->executionMode;
    }

    /**
     * Builder function for timeToLiveSeconds
     *
     * @param int $timeToLiveSeconds
     *
     * @return $this
     */
    public function timeToLiveSeconds(int $timeToLiveSeconds): self
    {
        $this->setTimeToLiveSeconds($timeToLiveSeconds);

        return $this;
    }

    /**
     * Setter function for timeToLiveSeconds
     *
     * @param int $timeToLiveSeconds
     *
     * @return void
     */
    public function setTimeToLiveSeconds(int $timeToLiveSeconds): void
    {
        $this->timeToLiveSeconds = $timeToLiveSeconds;
    }

    /**
     * Getter function for timeToLiveSeconds
     *
     * @return int
     */
    public function getTimeToLiveSeconds(): int
    {
        return $this->timeToLiveSeconds;
    }

    /**
     * Builder function for gatewayReconciliationId
     *
     * @param string $gatewayReconciliationId
     *
     * @return $this
     */
    public function gatewayReconciliationId(string $gatewayReconciliationId): self
    {
        $this->setGatewayReconciliationId($gatewayReconciliationId);

        return $this;
    }

    /**
     * Setter function for gatewayReconciliationId
     *
     * @param string $gatewayReconciliationId
     *
     * @return void
     */
    public function setGatewayReconciliationId(string $gatewayReconciliationId): void
    {
        $this->gatewayReconciliationId = $gatewayReconciliationId;
    }

    /**
     * Getter function for gatewayReconciliationId
     *
     * @return string
     */
    public function getGatewayReconciliationId(): string
    {
        return $this->gatewayReconciliationId;
    }

    /**
     * Builder function for updatedTime
     *
     * @param string $updatedTime
     *
     * @return $this
     */
    public function updatedTime(string $updatedTime): self
    {
        $this->setUpdatedTime($updatedTime);

        return $this;
    }

    /**
     * Setter function for updatedTime
     *
     * @param string $updatedTime
     *
     * @return void
     */
    public function setUpdatedTime(string $updatedTime): void
    {
        $this->updatedTime = $updatedTime;
    }

    /**
     * Getter function for updatedTime
     *
     * @return string
     */
    public function getUpdatedTime(): string
    {
        return $this->updatedTime;
    }

    /**
     * Builder function for statusTime
     *
     * @param string $statusTime
     *
     * @return $this
     */
    public function statusTime(string $statusTime): self
    {
        $this->setStatusTime($statusTime);

        return $this;
    }

    /**
     * Setter function for statusTime
     *
     * @param string $statusTime
     *
     * @return void
     */
    public function setStatusTime(string $statusTime): void
    {
        $this->statusTime = $statusTime;
    }

    /**
     * Getter function for statusTime
     *
     * @return string
     */
    public function getStatusTime(): string
    {
        return $this->statusTime;
    }

    /**
     * Builder function for links
     *
     * @param Link[] $links
     *
     * @return $this
     */
    public function links(array $links): self
    {
        $this->setLinks($links);

        return $this;
    }

    /**
     * Setter function for links
     *
     * @param Link[] $links
     *
     * @return void
     */
    public function setLinks(array $links): void
    {
        $this->links = $links;
    }

    /**
     * Getter function for links
     *
     * @return Link[]
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * Add new linksItem
     *
     * @param Link $linksItem
     *
     * @return $this
     */
    public function addLinksItem(Link $linksItem): self
    {
        if ($this->links === null) {
            $this->setLinks([$linksItem]);

            return $this;
        }

        $links = $this->getLinks();
        $links[] = $linksItem;
        $this->setLinks($links);

        return $this;
    }

    /**
     * Remove linksItem
     *
     * @param Link $linksItem
     *
     * @return $this
     */
    public function removeLinksItem(Link $linksItem): self
    {
        $this->setLinks(array_diff($this->getLinks(), [$linksItem]));

        return $this;
    }

    /**
     * Builder function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return $this
     */
    public function merchantRefNum(string $merchantRefNum): self
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
    public function setMerchantRefNum(string $merchantRefNum): void
    {
        $this->merchantRefNum = $merchantRefNum;
    }

    /**
     * Getter function for merchantRefNum
     *
     * @return string
     */
    public function getMerchantRefNum(): string
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
    public function transactionType(string $transactionType): self
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
    public function setTransactionType(string $transactionType): void
    {
        $this->transactionType = $transactionType;
    }

    /**
     * This specifies the transaction type for which the Payment Handle is created.
     * <br>**Same as request**.
     *
     * @return string
     */
    public function getTransactionType(): string
    {
        return $this->transactionType;
    }

    /**
     * Builder function for accountId
     *
     * @param string $accountId
     *
     * @return $this
     */
    public function accountId(string $accountId): self
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
    public function setAccountId(string $accountId): void
    {
        $this->accountId = $accountId;
    }

    /**
     * This is the accountId which is sent in the Payment handle request.
     * <br>**Same as request**.
     *
     * @return string
     */
    public function getAccountId(): string
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
    public function paymentType(string $paymentType): self
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
    public function setPaymentType(string $paymentType): void
    {
        $this->paymentType = $paymentType;
    }

    /**
     * This is the payment type associated with the Payment Handle used for this request.
     * <br>**Same as request**.
     *
     * @return string
     */
    public function getPaymentType(): string
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
    public function amount(int $amount): self
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
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * This is the amount of the request, in minor units.
     * Maximum: 99999999999
     *
     * @return int
     */
    public function getAmount(): int
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
    public function currencyCode(string $currencyCode): self
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
    public function setCurrencyCode(string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * This is the currency of the merchant account, e.g., USD or CAD.
     *
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    /**
     * Builder function for profile
     *
     * @param Profile $profile
     *
     * @return $this
     */
    public function profile(Profile $profile): self
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
    public function setProfile(Profile $profile): void
    {
        $this->profile = $profile;
    }

    /**
     * This is customer's profile details.<br>**Same as request**.
     *
     * @return Profile
     */
    public function getProfile(): Profile
    {
        return $this->profile;
    }

    /**
     * Builder function for billingDetails
     *
     * @param BillingDetails $billingDetails
     *
     * @return $this
     */
    public function billingDetails(BillingDetails $billingDetails): self
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
    public function setBillingDetails(BillingDetails $billingDetails): void
    {
        $this->billingDetails = $billingDetails;
    }

    /**
     * Customer's billing details.<br>**Same as request**.  > **3DS Flow**:
     * It is recommended to send \"billingDetails\" to improve acceptance rate
     *
     * @return BillingDetails
     */
    public function getBillingDetails(): BillingDetails
    {
        return $this->billingDetails;
    }

    /**
     * Builder function for merchantDescriptor
     *
     * @param MerchantDescriptor $merchantDescriptor
     *
     * @return $this
     */
    public function merchantDescriptor(MerchantDescriptor $merchantDescriptor): self
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
    public function setMerchantDescriptor(MerchantDescriptor $merchantDescriptor): void
    {
        $this->merchantDescriptor = $merchantDescriptor;
    }

    /**
     * This is the merchant descriptor that will be displayed on the customer's card
     * or bank statement.<br>
     *
     * @return MerchantDescriptor
     */
    public function getMerchantDescriptor(): MerchantDescriptor
    {
        return $this->merchantDescriptor;
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
     * The URL endpoints to redirect the customer to after a redirection to an
     * alternative payment or 3D Secure site.
     *
     * @return ReturnLink[]
     */
    public function getReturnLinks(): array
    {
        return $this->returnLinks;
    }

    /**
     * Add new returnLinksItem
     *
     * @param ReturnLink $returnLinksItem
     *
     * @return $this
     */
    public function addReturnLinksItem(ReturnLink $returnLinksItem): self
    {
        if ($this->returnLinks === null) {
            $this->setReturnLinks([$returnLinksItem]);

            return $this;
        }

        $returnLinks = $this->getReturnLinks();
        $returnLinks[] = $returnLinksItem;
        $this->setReturnLinks($returnLinks);

        return $this;
    }

    /**
     * Remove returnLinksItem
     *
     * @param ReturnLink $returnLinksItem
     *
     * @return $this
     */
    public function removeReturnLinksItem(ReturnLink $returnLinksItem): self
    {
        $this->setReturnLinks(array_diff($this->getReturnLinks(), [$returnLinksItem]));

        return $this;
    }

    /**
     * Builder function for customerIp
     *
     * @param string $customerIp
     *
     * @return $this
     */
    public function customerIp(string $customerIp): self
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
    public function setCustomerIp(string $customerIp): void
    {
        $this->customerIp = $customerIp;
    }

    /**
     * This is the customer's IP address.
     *
     * @return string
     */
    public function getCustomerIp(): string
    {
        return $this->customerIp;
    }

    /**
     * Builder function for shippingDetails
     *
     * @param ShippingDetails $shippingDetails
     *
     * @return $this
     */
    public function shippingDetails(ShippingDetails $shippingDetails): self
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
    public function setShippingDetails(ShippingDetails $shippingDetails): void
    {
        $this->shippingDetails = $shippingDetails;
    }

    /**
     * Customer's shipping details.
     *
     * @return ShippingDetails
     */
    public function getShippingDetails(): ShippingDetails
    {
        return $this->shippingDetails;
    }

    /**
     * Builder function for card
     *
     * @param CardWithOptionalNetworkTokenOrApplePay $card
     *
     * @return $this
     */
    public function card(CardWithOptionalNetworkTokenOrApplePay $card): self
    {
        $this->setCard($card);

        return $this;
    }

    /**
     * Setter function for card
     *
     * @param CardWithOptionalNetworkTokenOrApplePay $card
     *
     * @return void
     */
    public function setCard(CardWithOptionalNetworkTokenOrApplePay $card): void
    {
        $this->card = $card;
    }

    /**
     * Getter function for card
     *
     * @return CardWithOptionalNetworkTokenOrApplePay
     */
    public function getCard(): CardWithOptionalNetworkTokenOrApplePay
    {
        return $this->card;
    }

    /**
     * Builder function for skip3ds
     *
     * @param bool $skip3ds
     *
     * @return $this
     */
    public function skip3ds(bool $skip3ds): self
    {
        $this->setSkip3ds($skip3ds);

        return $this;
    }

    /**
     * Setter function for skip3ds
     *
     * @param bool $skip3ds
     *
     * @return void
     */
    public function setSkip3ds(bool $skip3ds): void
    {
        $this->skip3ds = $skip3ds;
    }

    /**
     * Getter function for skip3ds
     *
     * @return bool
     */
    public function getSkip3ds(): bool
    {
        return $this->skip3ds;
    }

    /**
     * Builder function for threeDs
     *
     * @param ThreeDs $threeDs
     *
     * @return $this
     */
    public function threeDs(ThreeDs $threeDs): self
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
    public function setThreeDs(ThreeDs $threeDs): void
    {
        $this->threeDs = $threeDs;
    }

    /**
     * This is the threeDs object.
     * You need to send this object when you want to process CARD transaction with 3DS.
     *
     * @return ThreeDs
     */
    public function getThreeDs(): ThreeDs
    {
        return $this->threeDs;
    }

    /**
     * Builder function for authentication
     *
     * @param NetworkTokenCardObjectAuthentication $authentication
     *
     * @return $this
     */
    public function authentication(NetworkTokenCardObjectAuthentication $authentication): self
    {
        $this->setAuthentication($authentication);

        return $this;
    }

    /**
     * Setter function for authentication
     *
     * @param NetworkTokenCardObjectAuthentication $authentication
     *
     * @return void
     */
    public function setAuthentication(NetworkTokenCardObjectAuthentication $authentication): void
    {
        $this->authentication = $authentication;
    }

    /**
     * Getter function for authentication
     *
     * @return NetworkTokenCardObjectAuthentication
     */
    public function getAuthentication(): NetworkTokenCardObjectAuthentication
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
    public function paymentHandleTokenFrom(string $paymentHandleTokenFrom): self
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
    public function setPaymentHandleTokenFrom(string $paymentHandleTokenFrom): void
    {
        $this->paymentHandleTokenFrom = $paymentHandleTokenFrom;
    }

    /**
     * Getter function for paymentHandleTokenFrom
     *
     * @return string
     */
    public function getPaymentHandleTokenFrom(): string
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
    public function transactionIntent(string $transactionIntent): self
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
    public function setTransactionIntent(string $transactionIntent): void
    {
        $this->transactionIntent = $transactionIntent;
    }

    /**
     * Getter function for transactionIntent
     *
     * @return string
     */
    public function getTransactionIntent(): string
    {
        return $this->transactionIntent;
    }

    /**
     * Builder function for gatewayResponse
     *
     * @param GatewayResponse $gatewayResponse
     *
     * @return $this
     */
    public function gatewayResponse(GatewayResponse $gatewayResponse): self
    {
        $this->setGatewayResponse($gatewayResponse);

        return $this;
    }

    /**
     * Setter function for gatewayResponse
     *
     * @param GatewayResponse $gatewayResponse
     *
     * @return void
     */
    public function setGatewayResponse(GatewayResponse $gatewayResponse): void
    {
        $this->gatewayResponse = $gatewayResponse;
    }

    /**
     * This contains parameters returned by Skrill gateway.
     *
     * @return GatewayResponse
     */
    public function getGatewayResponse(): GatewayResponse
    {
        return $this->gatewayResponse;
    }

    /**
     * Builder function for applePay
     *
     * @param ApplePay $applePay
     *
     * @return $this
     */
    public function applePay(ApplePay $applePay): self
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
    public function setApplePay(ApplePay $applePay): void
    {
        $this->applePay = $applePay;
    }

    /**
     * Getter function for applePay
     *
     * @return ApplePay
     */
    public function getApplePay(): ApplePay
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
    public function googlePay(GooglePay $googlePay): self
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
    public function setGooglePay(GooglePay $googlePay): void
    {
        $this->googlePay = $googlePay;
    }

    /**
     * Getter function for googlePay
     *
     * @return GooglePay
     */
    public function getGooglePay(): GooglePay
    {
        return $this->googlePay;
    }

    /**
     * Builder function for skrill
     *
     * @param Skrill $skrill
     *
     * @return $this
     */
    public function skrill(Skrill $skrill): self
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
    public function setSkrill(Skrill $skrill): void
    {
        $this->skrill = $skrill;
    }

    /**
     * Getter function for skrill
     *
     * @return Skrill
     */
    public function getSkrill(): Skrill
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
    public function neteller(Neteller $neteller): self
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
    public function setNeteller(Neteller $neteller): void
    {
        $this->neteller = $neteller;
    }

    /**
     * Getter function for neteller
     *
     * @return Neteller
     */
    public function getNeteller(): Neteller
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
    public function paysafecash(Paysafecash $paysafecash): self
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
    public function setPaysafecash(Paysafecash $paysafecash): void
    {
        $this->paysafecash = $paysafecash;
    }

    /**
     * Getter function for paysafecash
     *
     * @return Paysafecash
     */
    public function getPaysafecash(): Paysafecash
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
    public function paysafecard(Paysafecard $paysafecard): self
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
    public function setPaysafecard(Paysafecard $paysafecard): void
    {
        $this->paysafecard = $paysafecard;
    }

    /**
     * Getter function for paysafecard
     *
     * @return Paysafecard
     */
    public function getPaysafecard(): Paysafecard
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
    public function payPal(Paypal $payPal): self
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
    public function setPayPal(Paypal $payPal): void
    {
        $this->payPal = $payPal;
    }

    /**
     * Getter function for payPal
     *
     * @return Paypal
     */
    public function getPayPal(): Paypal
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
    public function venmo(Venmo $venmo): self
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
    public function setVenmo(Venmo $venmo): void
    {
        $this->venmo = $venmo;
    }

    /**
     * Getter function for venmo
     *
     * @return Venmo
     */
    public function getVenmo(): Venmo
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
    public function vippreferred(Vippreferred $vippreferred): self
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
    public function setVippreferred(Vippreferred $vippreferred): void
    {
        $this->vippreferred = $vippreferred;
    }

    /**
     * These are the details of the vip preferred account used for the transaction.
     *
     * @return Vippreferred
     */
    public function getVippreferred(): Vippreferred
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
    public function mazooma(Mazooma $mazooma): self
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
    public function setMazooma(Mazooma $mazooma): void
    {
        $this->mazooma = $mazooma;
    }

    /**
     * Mazooma details to be used for the transaction
     *
     * @return Mazooma
     */
    public function getMazooma(): Mazooma
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
    public function sightline(Sightline $sightline): self
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
    public function setSightline(Sightline $sightline): void
    {
        $this->sightline = $sightline;
    }

    /**
     * These are the details of the Play+ (Sightline) used for the transaction.
     *
     * @return Sightline
     */
    public function getSightline(): Sightline
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
    public function payByBank(PayByBank $payByBank): self
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
    public function setPayByBank(PayByBank $payByBank): void
    {
        $this->payByBank = $payByBank;
    }

    /**
     * This object should be used only for pay by bank transactions.
     *
     * @return PayByBank
     */
    public function getPayByBank(): PayByBank
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
    public function interacETransfer(Interac $interacETransfer): self
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
    public function setInteracETransfer(Interac $interacETransfer): void
    {
        $this->interacETransfer = $interacETransfer;
    }

    /**
     * Details of the interac E-Transfer used for the transaction.
     *
     * @return Interac
     */
    public function getInteracETransfer(): Interac
    {
        return $this->interacETransfer;
    }

    /**
     * Builder function for browserDetails
     *
     * @param BrowserDetails $browserDetails
     *
     * @return $this
     */
    public function browserDetails(BrowserDetails $browserDetails): self
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
    public function setBrowserDetails(BrowserDetails $browserDetails): void
    {
        $this->browserDetails = $browserDetails;
    }

    /**
     * Get browserDetails
     *
     * @return BrowserDetails|null
     */
    public function getBrowserDetails(): BrowserDetails
    {
        return $this->browserDetails;
    }

    /**
     * Builder function for deviceDetails
     *
     * @param DeviceDetails $deviceDetails
     *
     * @return $this
     */
    public function deviceDetails(DeviceDetails $deviceDetails): self
    {
        $this->setDeviceDetails($deviceDetails);

        return $this;
    }

    /**
     * Setter function for deviceDetails
     *
     * @param DeviceDetails $deviceDetails
     *
     * @return void
     */
    public function setDeviceDetails(DeviceDetails $deviceDetails): void
    {
        $this->deviceDetails = $deviceDetails;
    }

    /**
     * **For Interac e-Transfer withdrawal only**
     * This is part of Interac e-Transfer withdrawal payment handle request.
     * It is used for risk assessment by Interac.
     * |REQUIRED|CONDITION|
     * |-|-|
     * |Conditional|This parameter is mandatory if "browserDetails" object is not passed
     * as a part of Interac e-Transfer withdrawal payment handle request.|
     *
     * @return DeviceDetails
     */
    public function getDeviceDetails(): DeviceDetails
    {
        return $this->deviceDetails;
    }

    /**
     * Builder function for rapidTransfer
     *
     * @param RapidTransfer $rapidTransfer
     *
     * @return $this
     */
    public function rapidTransfer(RapidTransfer $rapidTransfer): self
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
    public function setRapidTransfer(RapidTransfer $rapidTransfer): void
    {
        $this->rapidTransfer = $rapidTransfer;
    }

    /**
     * These are the details of the rapid transfer used for the transaction.
     *
     * @return RapidTransfer
     */
    public function getRapidTransfer(): RapidTransfer
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
    public function skrill1Tap(Skrill1Tap $skrill1Tap): self
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
    public function setSkrill1Tap(Skrill1Tap $skrill1Tap): void
    {
        $this->skrill1Tap = $skrill1Tap;
    }

    /**
     * These are the details of the skrill 1-Tap account used for the transaction.
     *
     * @return Skrill1Tap
     */
    public function getSkrill1Tap(): Skrill1Tap
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
    public function ach(Ach $ach): self
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
    public function setAch(Ach $ach): void
    {
        $this->ach = $ach;
    }

    /**
     * Details of the ach account to be used for the transaction.
     *
     * @return Ach
     */
    public function getAch(): Ach
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
    public function eft(Eft $eft): self
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
    public function setEft(Eft $eft): void
    {
        $this->eft = $eft;
    }

    /**
     * Details of the EFT account to be used for the transaction.
     *
     * @return Eft
     */
    public function getEft(): Eft
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
    public function dupCheck(bool $dupCheck): self
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
    public function setDupCheck(bool $dupCheck): void
    {
        $this->dupCheck = $dupCheck;
    }

    /**
     * Get dupCheck
     *
     * @return bool
     */
    public function getDupCheck(): bool
    {
        return $this->dupCheck;
    }

    /**
     * Builder function for bacs
     *
     * @param Bacs $bacs
     *
     * @return $this
     */
    public function bacs(Bacs $bacs): self
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
    public function setBacs(Bacs $bacs): void
    {
        $this->bacs = $bacs;
    }

    /**
     * Details of the bacs account to be used for the transaction.
     *
     * @return Bacs
     */
    public function getBacs(): Bacs
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
     * Get mandates
     *
     * @return Mandate[]|null
     */
    public function getMandates(): array
    {
        return $this->mandates;
    }

    /**
     * Add new mandatesItem
     *
     * @param Mandate $mandatesItem
     *
     * @return $this
     */
    public function addMandatesItem(Mandate $mandatesItem): self
    {
        if ($this->mandates === null) {
            $this->setMandates([$mandatesItem]);

            return $this;
        }

        $mandates = $this->getMandates();
        $mandates[] = $mandatesItem;
        $this->setMandates($mandates);

        return $this;
    }

    /**
     * Remove mandatesItem
     *
     * @param Mandate $mandatesItem
     *
     * @return $this
     */
    public function removeMandatesItem(Mandate $mandatesItem): self
    {
        $this->setMandates(array_diff($this->getMandates(), [$mandatesItem]));

        return $this;
    }

    /**
     * Builder function for sepa
     *
     * @param Sepa $sepa
     *
     * @return $this
     */
    public function sepa(Sepa $sepa): self
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
    public function setSepa(Sepa $sepa): void
    {
        $this->sepa = $sepa;
    }

    /**
     * These are the details of the sepa account used for the transaction.
     *
     * @return Sepa
     */
    public function getSepa(): Sepa
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
    public function safetyPayCash(SafetyPayCash $safetyPayCash): self
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
    public function setSafetyPayCash(SafetyPayCash $safetyPayCash): void
    {
        $this->safetyPayCash = $safetyPayCash;
    }

    /**
     * Getter function for safetyPayCash
     *
     * @return SafetyPayCash
     */
    public function getSafetyPayCash(): SafetyPayCash
    {
        return $this->safetyPayCash;
    }

    /**
     * Builder function for paymentExpiryInMinutes
     *
     * @param int $paymentExpiryInMinutes
     *
     * @return $this
     */
    public function paymentExpiryInMinutes(int $paymentExpiryInMinutes): self
    {
        $this->setPaymentExpiryInMinutes($paymentExpiryInMinutes);

        return $this;
    }

    /**
     * Setter function for paymentExpiryInMinutes
     *
     * @param int $paymentExpiryInMinutes
     *
     * @return void
     */
    public function setPaymentExpiryInMinutes(int $paymentExpiryInMinutes): void
    {
        $this->paymentExpiryInMinutes = $paymentExpiryInMinutes;
    }

    /**
     * It is the transaction expiry in minutes at Safetypay.
     *
     * @return int
     */
    public function getPaymentExpiryInMinutes(): int
    {
        return $this->paymentExpiryInMinutes;
    }

    /**
     * Builder function for paymentDetails
     *
     * @param PaymentDetails $paymentDetails
     *
     * @return $this
     */
    public function paymentDetails(PaymentDetails $paymentDetails): self
    {
        $this->setPaymentDetails($paymentDetails);

        return $this;
    }

    /**
     * Setter function for paymentDetails
     *
     * @param PaymentDetails $paymentDetails
     *
     * @return void
     */
    public function setPaymentDetails(PaymentDetails $paymentDetails): void
    {
        $this->paymentDetails = $paymentDetails;
    }

    /**
     * Get paymentDetails
     *
     * @return PaymentDetails
     */
    public function getPaymentDetails(): PaymentDetails
    {
        return $this->paymentDetails;
    }

    /**
     * Builder function for paymentExpiryMinutes
     *
     * @param int $paymentExpiryMinutes
     *
     * @return $this
     */
    public function paymentExpiryMinutes(int $paymentExpiryMinutes): self
    {
        $this->setPaymentExpiryMinutes($paymentExpiryMinutes);

        return $this;
    }

    /**
     * Setter function for paymentExpiryMinutes
     *
     * @param int $paymentExpiryMinutes
     *
     * @return void
     */
    public function setPaymentExpiryMinutes(int $paymentExpiryMinutes): void
    {
        $this->paymentExpiryMinutes = $paymentExpiryMinutes;
    }

    /**
     * It is the transaction expiry in minutes at Safetypay.
     *
     * @return int
     */
    public function getPaymentExpiryMinutes(): int
    {
        return $this->paymentExpiryMinutes;
    }

    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class PaymentHandle {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id) . PHP_EOL
            . "    paymentHandleToken: " . $this->toIndentedString($this->paymentHandleToken) . PHP_EOL
            . "    txnTime: " . $this->toIndentedString($this->txnTime) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status) . PHP_EOL
            . "    liveMode: " . $this->toIndentedString($this->liveMode) . PHP_EOL
            . "    usage: " . $this->toIndentedString($this->usage) . PHP_EOL
            . "    action: " . $this->toIndentedString($this->action) . PHP_EOL
            . "    executionMode: " . $this->toIndentedString($this->executionMode) . PHP_EOL
            . "    timeToLiveSeconds: " . $this->toIndentedString($this->timeToLiveSeconds) . PHP_EOL
            . "    gatewayReconciliationId: " . $this->toIndentedString($this->gatewayReconciliationId) . PHP_EOL
            . "    updatedTime: " . $this->toIndentedString($this->updatedTime) . PHP_EOL
            . "    statusTime: " . $this->toIndentedString($this->statusTime) . PHP_EOL
            . "    links: " . $this->toIndentedString($this->links) . PHP_EOL
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL
            . "    transactionType: " . $this->toIndentedString($this->transactionType) . PHP_EOL
            . "    accountId: " . $this->toIndentedString($this->accountId) . PHP_EOL
            . "    paymentType: " . $this->toIndentedString($this->paymentType) . PHP_EOL
            . "    amount: " . $this->toIndentedString($this->amount) . PHP_EOL
            . "    currencyCode: " . $this->toIndentedString($this->currencyCode) . PHP_EOL
            . "    profile: " . $this->toIndentedString($this->profile) . PHP_EOL
            . "    billingDetails: " . $this->toIndentedString($this->billingDetails) . PHP_EOL
            . "    merchantDescriptor: " . $this->toIndentedString($this->merchantDescriptor) . PHP_EOL
            . "    returnLinks: " . $this->toIndentedString($this->returnLinks) . PHP_EOL
            . "    customerIp: " . $this->toIndentedString($this->customerIp) . PHP_EOL
            . "    shippingDetails: " . $this->toIndentedString($this->shippingDetails) . PHP_EOL
            . "    card: " . $this->toIndentedString($this->card) . PHP_EOL
            . "    skip3ds: " . $this->toIndentedString($this->skip3ds) . PHP_EOL
            . "    threeDs: " . $this->toIndentedString($this->threeDs) . PHP_EOL
            . "    authentication: " . $this->toIndentedString($this->authentication) . PHP_EOL
            . "    paymentHandleTokenFrom: " . $this->toIndentedString($this->paymentHandleTokenFrom) . PHP_EOL
            . "    transactionIntent: " . $this->toIndentedString($this->transactionIntent) . PHP_EOL
            . "    gatewayResponse: " . $this->toIndentedString($this->gatewayResponse) . PHP_EOL
            . "    applePay: " . $this->toIndentedString($this->applePay) . PHP_EOL
            . "    googlePay: " . $this->toIndentedString($this->googlePay) . PHP_EOL
            . "    skrill: " . $this->toIndentedString($this->skrill) . PHP_EOL
            . "    neteller: " . $this->toIndentedString($this->neteller) . PHP_EOL
            . "    paysafecash: " . $this->toIndentedString($this->paysafecash) . PHP_EOL
            . "    paysafecard: " . $this->toIndentedString($this->paysafecard) . PHP_EOL
            . "    payPal: " . $this->toIndentedString($this->payPal) . PHP_EOL
            . "    venmo: " . $this->toIndentedString($this->venmo) . PHP_EOL
            . "    vippreferred: " . $this->toIndentedString($this->vippreferred) . PHP_EOL
            . "    mazooma: " . $this->toIndentedString($this->mazooma) . PHP_EOL
            . "    sightline: " . $this->toIndentedString($this->sightline) . PHP_EOL
            . "    payByBank: " . $this->toIndentedString($this->payByBank) . PHP_EOL
            . "    interacETransfer: " . $this->toIndentedString($this->interacETransfer) . PHP_EOL
            . "    browserDetails: " . $this->toIndentedString($this->browserDetails) . PHP_EOL
            . "    deviceDetails: " . $this->toIndentedString($this->deviceDetails) . PHP_EOL
            . "    rapidTransfer: " . $this->toIndentedString($this->rapidTransfer) . PHP_EOL
            . "    skrill1Tap: " . $this->toIndentedString($this->skrill1Tap) . PHP_EOL
            . "    ach: " . $this->toIndentedString($this->ach) . PHP_EOL
            . "    eft: " . $this->toIndentedString($this->eft) . PHP_EOL
            . "    dupCheck: " . $this->toIndentedString($this->dupCheck) . PHP_EOL
            . "    bacs: " . $this->toIndentedString($this->bacs) . PHP_EOL
            . "    mandates: " . $this->toIndentedString($this->mandates) . PHP_EOL
            . "    sepa: " . $this->toIndentedString($this->sepa) . PHP_EOL
            . "    safetyPayCash: " . $this->toIndentedString($this->safetyPayCash) . PHP_EOL
            . "    paymentExpiryInMinutes: " . $this->toIndentedString($this->paymentExpiryInMinutes) . PHP_EOL
            . "    paymentDetails: " . $this->toIndentedString($this->paymentDetails) . PHP_EOL
            . "    paymentExpiryMinutes: " . $this->toIndentedString($this->paymentExpiryMinutes) . PHP_EOL
            . "}";
    }
}
