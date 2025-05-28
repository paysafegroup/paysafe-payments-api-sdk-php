<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Customer;

use Paysafe\PhpSdk\Model\Card\Card;
use Paysafe\PhpSdk\Model\Card\MerchantDescriptor;
use Paysafe\PhpSdk\Model\Card\ThreeDs\Authentication;
use Paysafe\PhpSdk\Model\Card\ThreeDs\ThreeDs;
use Paysafe\PhpSdk\Model\Common\BillingDetails;
use Paysafe\PhpSdk\Model\Common\GatewayResponse;
use Paysafe\PhpSdk\Model\Common\ShippingDetails;
use Paysafe\PhpSdk\Model\Lpm\Eft;
use Paysafe\PhpSdk\Model\Common\Profile\Profile;
use Paysafe\PhpSdk\Model\Lpm\Ach;
use Paysafe\PhpSdk\Model\Lpm\Bacs;
use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Model\Lpm\Sepa;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * customerPaymentHandle
 */
class CustomerPaymentHandle extends BaseModel
{
	const STATUS_INITIATED = 'INITIATED';
	const STATUS_PAYABLE = 'PAYABLE';
	const STATUS_PROCESSING = 'PROCESSING';
	const STATUS_FAILED = 'FAILED';
	const STATUS_EXPIRED = 'EXPIRED';
	const STATUS_COMPLETED = 'COMPLETED';

	const USAGE_SINGLE_USE = 'SINGLE_USE';
	const USAGE_MULTI_USE = 'MULTI_USE';

	const ACTION_NONE = 'NONE';
	const ACTION_REDIRECT = 'REDIRECT';
	const ACTION_LOOKUP = 'LOOKUP';


    private string $id;
    private string $status;
    private string $usage;
    private string $action;
    private string $currencyCode;
    private string $paymentHandleToken;
    private string $customerId;
    private string $merchantRefNum;
    private string $paymentType;
    private int $amount;
    private string $customerIp;
    private BillingDetails $billingDetails;
    private MerchantDescriptor $merchantDescriptor;
    private string $billingDetailsId;
    private string $paymentHandleTokenFrom;
    private Card $card;
    private Profile $profile;
    private ThreeDs $threeDs;
    private Authentication $authentication;
    private string $transactionIntent;
    private GatewayResponse $gatewayResponse;
    private ShippingDetails $shippingDetails;
    private Eft $eft;
    private bool $dupCheck;
    private Ach $ach;
    private Bacs $bacs;
    private ?array $mandates = null;
    private Sepa $sepa;


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
     * Setter function id
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
     * Setter function status
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
     * Setter function usage
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
     * Setter function action
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
     * Setter function currencyCode
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
     * Getter function for currencyCode
     *
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
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
     * Setter function paymentHandleToken
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
     * Builder function for customerId
     *
     * @param string $customerId
     *
     * @return $this
     */
    public function customerId(string $customerId): self
    {
        $this->setCustomerId($customerId);

        return $this;
    }

    /**
     * Setter function customerId
     *
     * @param string $customerId
     *
     * @return void
     */
    public function setCustomerId(string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Getter function for customerId
     *
     * @return string
     */
    public function getCustomerId(): string
    {
        return $this->customerId;
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
     * Setter function merchantRefNum
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
     * Setter function paymentType
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
     * Getter function for paymentType
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
     * Setter function amount
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
     * Getter function for amount
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
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
     * Setter function customerIp
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
     * Getter function for customerIp
     *
     * @return string
     */
    public function getCustomerIp(): string
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
    public function billingDetails(BillingDetails $billingDetails): self
    {
        $this->setBillingDetails($billingDetails);

        return $this;
    }

    /**
     * Setter function billingDetails
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
     * Getter function for billingDetails
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
     * Setter function merchantDescriptor
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
     * Getter function for merchantDescriptor
     *
     * @return MerchantDescriptor
     */
    public function getMerchantDescriptor(): MerchantDescriptor
    {
        return $this->merchantDescriptor;
    }

    /**
     * Builder function for billingDetailsId
     *
     * @param string $billingDetailsId
     *
     * @return $this
     */
    public function billingDetailsId(string $billingDetailsId): self
    {
        $this->setBillingDetailsId($billingDetailsId);

        return $this;
    }

    /**
     * Setter function billingDetailsId
     *
     * @param string $billingDetailsId
     *
     * @return void
     */
    public function setBillingDetailsId(string $billingDetailsId): void
    {
        $this->billingDetailsId = $billingDetailsId;
    }

    /**
     * Getter function for billingDetailsId
     *
     * @return string
     */
    public function getBillingDetailsId(): string
    {
        return $this->billingDetailsId;
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
     * Setter function paymentHandleTokenFrom
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
     * Builder function for card
     *
     * @param Card $card
     *
     * @return $this
     */
    public function card(Card $card): self
    {
        $this->setCard($card);

        return $this;
    }

    /**
     * Setter function card
     *
     * @param Card $card
     *
     * @return void
     */
    public function setCard(Card $card): void
    {
        $this->card = $card;
    }

    /**
     * Getter function for card
     *
     * @return Card
     */
    public function getCard(): Card
    {
        return $this->card;
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
     * Setter function profile
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
     * Getter function for profile
     *
     * @return Profile
     */
    public function getProfile(): Profile
    {
        return $this->profile;
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
     * Setter function threeDs
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
     * Getter function for threeDs
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
     * @param Authentication $authentication
     *
     * @return $this
     */
    public function authentication(Authentication $authentication): self
    {
        $this->setAuthentication($authentication);

        return $this;
    }

    /**
     * Setter function authentication
     *
     * @param Authentication $authentication
     *
     * @return void
     */
    public function setAuthentication(Authentication $authentication): void
    {
        $this->authentication = $authentication;
    }

    /**
     * Getter function for authentication
     *
     * @return Authentication
     */
    public function getAuthentication(): Authentication
    {
        return $this->authentication;
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
     * Setter function transactionIntent
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
     * Setter function gatewayResponse
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
     * Getter function for gatewayResponse
     *
     * @return GatewayResponse
     */
    public function getGatewayResponse(): GatewayResponse
    {
        return $this->gatewayResponse;
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
     * Setter function shippingDetails
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
     * Getter function for shippingDetails
     *
     * @return ShippingDetails
     */
    public function getShippingDetails(): ShippingDetails
    {
        return $this->shippingDetails;
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
     * Setter function eft
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
     * Getter function for eft
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
     * Setter function dupCheck
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
     * Getter function for dupCheck
     *
     * @return bool
     */
    public function getDupCheck(): bool
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
    public function ach(Ach $ach): self
    {
        $this->setAch($ach);

        return $this;
    }

    /**
     * Setter function ach
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
     * Getter function for ach
     *
     * @return Ach
     */
    public function getAch(): Ach
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
    public function bacs(Bacs $bacs): self
    {
        $this->setBacs($bacs);

        return $this;
    }

    /**
     * Setter function bacs
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
     * Getter function for bacs
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
     * Add a new Mandate Item
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
     * Remove a mandates item from the mandates list
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
     * Setter function mandates
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
        return $this->mandates;
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
     * Setter function sepa
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
     * Getter function for sepa
     *
     * @return Sepa
     */
    public function getSepa(): Sepa
    {
        return $this->sepa;
    }

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class CustomerPaymentHandle {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id) . "\n"
            . "    status: " . $this->toIndentedString($this->status) . "\n"
            . "    usage: " . $this->toIndentedString($this->usage) . "\n"
            . "    action: " . $this->toIndentedString($this->action) . "\n"
            . "    currencyCode: " . $this->toIndentedString($this->currencyCode) . "\n"
            . "    paymentHandleToken: " . $this->toIndentedString($this->paymentHandleToken) . "\n"
            . "    customerId: " . $this->toIndentedString($this->customerId) . "\n"
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . "\n"
            . "    paymentType: " . $this->toIndentedString($this->paymentType) . "\n"
            . "    amount: " . $this->toIndentedString($this->amount) . "\n"
            . "    customerIp: " . $this->toIndentedString($this->customerIp) . "\n"
            . "    billingDetails: " . $this->toIndentedString($this->billingDetails) . "\n"
            . "    merchantDescriptor: " . $this->toIndentedString($this->merchantDescriptor) . "\n"
            . "    billingDetailsId: " . $this->toIndentedString($this->billingDetailsId) . "\n"
            . "    paymentHandleTokenFrom: " . $this->toIndentedString($this->paymentHandleTokenFrom) . "\n"
            . "    card: " . $this->toIndentedString($this->card) . "\n"
            . "    profile: " . $this->toIndentedString($this->profile) . "\n"
            . "    threeDs: " . $this->toIndentedString($this->threeDs) . "\n"
            . "    authentication: " . $this->toIndentedString($this->authentication) . "\n"
            . "    transactionIntent: " . $this->toIndentedString($this->transactionIntent) . "\n"
            . "    gatewayResponse: " . $this->toIndentedString($this->gatewayResponse) . "\n"
            . "    shippingDetails: " . $this->toIndentedString($this->shippingDetails) . "\n"
            . "    eft: " . $this->toIndentedString($this->eft) . "\n"
            . "    dupCheck: " . $this->toIndentedString($this->dupCheck) . "\n"
            . "    ach: " . $this->toIndentedString($this->ach) . "\n"
            . "    bacs: " . $this->toIndentedString($this->bacs) . "\n"
            . "    mandates: " . $this->toIndentedString($this->mandates) . "\n"
            . "    sepa: " . $this->toIndentedString($this->sepa) . "\n"
		. "}";
	}
}
