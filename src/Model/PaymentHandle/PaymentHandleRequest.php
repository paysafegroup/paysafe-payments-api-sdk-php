<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentHandle;

use Paysafe\PhpSdk\Model\Applepay\ApplePay;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\Card;
use Paysafe\PhpSdk\Model\Card\CardAuthentication;
use Paysafe\PhpSdk\Model\Card\MerchantDescriptor;
use Paysafe\PhpSdk\Model\Card\ThreeDs\BrowserDetails;
use Paysafe\PhpSdk\Model\Card\ThreeDs\ThreeDs;
use Paysafe\PhpSdk\Model\Common\BillingDetails;
use Paysafe\PhpSdk\Model\Common\DeviceDetails;
use Paysafe\PhpSdk\Model\Common\GatewayResponse;
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
 * Payment handle request body details.
 * <ul>
 *   <li>
 *     <b>merchantRefNum:</b> This is the merchant reference number created by
 *      the merchant and submitted as part of the request.
 *     It must be unique for each request. <br />
 *     Example: merchantRefNum-101
 *   </li>
 *   <li>
 *     <b>transactionType:</b> This specifies the transaction type for which the Payment Handle is created. <br />
 *     <i>Allowed values: PAYMENT, STANDALONE_CREDIT, ORIGINAL_CREDIT, VERIFICATION</i>
 *   </li>
 *   <li>
 *     <b>accountId:</b> If you are a merchant, then this field is required only
 *      if you have more than one account configured
 *     for the same payment method and currency. If you are a partner using a shared API key,
 *      then this field is mandatory. <br />
 *     Example: 9876543210
 *   </li>
 *   <li>
 *     <b>paymentType:</b> This is the payment type associated with the Payment Handle used for this request. <br />
 *     <i>Allowed values: CARD, APPLEPAY, SKRILL, NETELLER, PAYSAFECASH, PAYSAFECARD, PAYPAL, PAY BY BANK, VENMO
 *     VIPPREFERRED, MAZOOMA, MBWAY, MULTIBANCO, SIGHTLINE, INTERAC_ETRANSFER, RAPID_TRANSFER, SKRILL1TAP, ACH,
 *     EFT, BACS, SEPA, ONLINE_BANK_TRANSFER, PIX, KHIPU, MACH, BOLETO_BANCARIO, SAFETYPAY_CASH</i>
 *   </li>
 *   <li>
 *     <b>amount:</b> This is the amount of the request, in minor units. See
 *     <a href="This is the amount of the request, in minor units. See Currency Codes.">Currency Codes.</a> <br />
 *     <b>Note:<b> This field is mandatory if transactionType is included.
 *      The amount specified in the Payment Handle request
 *     must match the amount specified in the Payments API request the paymentHandleToken is used for. <br />
 *     Example: 500
 *   </li>
 *   <li>
 *     <b>currencyCode:</b> This is the currency of the merchant account, e.g., USD or CAD. <br />
 *     <b>Note:<b> This field is mandatory if transactionType is included.
 *      The currencyCode specified in the Payment Handle
 *     request must match the currencyCode specified in
 *      the Payments API request the paymentHandleToken is used for. <br />
 *     Example: USD
 *   </li>
 *   <li>
 *     <b>profile:</b> This is customer's profile details.
 *   </li>
 *   <li>
 *     <b>billingDetails:</b> Customer's billing details. <br />
 *     <b>Note:<b> For single-use Payment Handles,
 *      this address information will be ignored if the paymentHandleTokenFrom parameter
 *     is included in the Payment Handle creation request and there
 *      is already address information associated with that customer.
 *   </li>
 *   <li>
 *     <b>merchantDescriptor:</b> This is the merchant descriptor that will be displayed on the
 *     customer's card or bank statement. <br />
 *   </li>
 *   <li>
 *     <b>returnLinks:</b> The URL endpoints to redirect the customer
 *      to after a redirection to an alternative payment or
 *     3D Secure site. You can customize the return URL based on the transaction status.
 *   </li>
 *   <li>
 *     <b>customerIp:</b> This is the customer's IP address. <br />
 *     Example: 111.111.111.111
 *   </li>
 *   <li>
 *     <b>singleUseCustomerToken:</b> This is the single use customer token
 *      of the profile on which customer operation
 *     (ADD/EDIT/DELETE) needs to be done. <br />
 *     <b>Note:<b> Mandatory, if customerOperation is EDIT or DELETE.
 *   </li>
 *   <li>
 *     <b>deviceDetails:</b> This is part of Interac e-Transfer withdrawal Payment Handle request.
 *     It is used by Interac Online for risk assessment. <br />
 *   </li>
 *   <li>
 *     <b>shippingDetails:</b> Details about the shipping.
 *   </li>
 *   <li>
 *     <b>card:</b> Card details <br />
 *   </li>
 *   <li>
 *     <b>splitPay:</b> This object should be used only for Splitpay transactions only,
 *      an array containing the linked accounts
 *     and the amount shared with each. You must include either amount or percent. However,
 *      you cannot include both values.
 *   </li>
 *   <li>
 *     <b>threeDs:</b> Denotes the status of threeDs object.
 *      If true and is configured in the backend for the respective accountId,
 *     it is mandatory to pass these parameters. If false, parameters need not to be passed.
 *   </li>
 *   <li>
 *     <b>authentication:</b> 3D Secure authentication details.
 *   </li>
 *   <li>
 *     <b>paymentHandleTokenFrom:</b> This is an existing
 *     <a href=https://developer.paysafe.com/en/payments-api/#/operations/create-payment-handle-for-customer">
 *     Customer Payment Handle</a>, from which the payment instrument and profile details are retrieved.
 *     If this parameter is included you can omit the billingDetails object.
 *   </li>
 *   <li>
 *     <b>transactionIntent:</b>
 *      The transactionIntent property is used to identify the intent of the authorization requests.
 *     The value of the transactionIntent shows if the transaction is crypto or quasi-cash related one. <br />
 *   </li>
 * </ul>
 */
class PaymentHandleRequest extends BaseModel
{

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
	private Card $card;
	private ThreeDs $threeDs;
	private CardAuthentication $authentication;
	private string $paymentHandleTokenFrom;
	private string $transactionIntent;
	private ApplePay $applePay;
	private GooglePay $googlePay;
	private Skrill $skrill;
	private GatewayResponse $gatewayResponse;
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

    private bool $skip3ds;
	private ?array $additionalParameters = null;

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
	 * This is the merchant reference number created by the merchant and submitted as part of the request.
     * It must be unique for each request.
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
	 * This specifies the transaction type for which the Payment Handle is created. <br />
	 * - PAYMENT - Payment Handle is created to continue the Payment. <br />
	 * - STANDALONE_CREDIT - Payment Handle is created to continue the Standalone Credit. <br />
	 * - ORIGINAL_CREDIT - Payment Handle is created to continue the Original Credit. <br />
	 * - VERIFICATION - Payment Handle is created to continue the Verification request.
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
	 * If you are a merchant, then this field is required only if you have more than one account configured
     * for the same payment method and currency. <br />
	 * If you are a partner/ISV using a shared API key, then this field is mandatory.
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
     * For Apple Pay and Google Pay, paymentType is 'CARD'
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
	 * This is the currency of the merchant account, e.g., USD or CAD. See
	 * <a
     * href="https://developer.paysafe.com/en/support/reference-information/codes/#currency-codes"
     * >Currency Codes.</a>
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
	 * This is customer's profile details.
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
	 * Customer's billing details. Required if AVS (Address verification) is enabled.<br />
	 * If included in the request, this will serve as the billing address for transaction processing. <br />
	 * Any billing details returned in Apple Pay Token by Apple Pay will be ignored. <br />
	 * 3DS Flow: It is recommended to send billingDetails to improve acceptance rate.
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
	 * For Card payment method only. This is the merchant descriptor that will
     * be displayed on the customer's card or bank statement.
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
	 * The URL endpoints to redirect the customer to after a redirection
     * to an alternative payment or 3D Secure site.
	 * You can customize the return URL based on the transaction status.
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
	 * This is the customer's IP address. Optional. <br />
	 * If included in request, this is used as Customer's IP. <br />
	 * If not sent in request, IP value is taken from request headers.
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
	 * Get shippingDetails
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
	 * Setter function for card
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
	 * Card details to be used for the transaction
	 * 
	 * @return Card
	 */
	public function getCard(): Card
	{
		return $this->card;
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
	 * This is the threeDs object. You need to send this object when
     * you want to process CARD transaction with 3DS.
	 * Required if account is enabled for 3DS. < /br>
	 * Not required if account is non-3DS or if you are using your own 3DS service provider.
     * Please refer authentication
	 * object if you are using your own 3DS service provider.
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
	 * @param CardAuthentication $authentication
	 * 
	 * @return $this
	 */
	public function authentication(CardAuthentication $authentication): self
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
	public function setAuthentication(CardAuthentication $authentication): void
	{
		$this->authentication = $authentication;
	}

	/**
	 * These are 3D Secure authentication details.If you are using your own 3D Secure service provider
     * and you want to
	 * process Card transaction with 3DS then you need to pass Authetication object in Payment handle request.
	 * 
	 * @return CardAuthentication
	 */
	public function getAuthentication(): CardAuthentication
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
	 * This is used in Saved card flow. You will pass this parameter when you want
     * to create single use payment handle using the Saved-card (card-on-file)
	 * present in Paysafe customer vault. <br />
	 * This is an existing Customer Payment Handle, from which the payment instrument details
     * and profile details are retrieved. <br />
	 * If this parameter is included then you can omit the billingDetails object. <br />
	 * If you send a new billingDetails then same will be considered for the transaction,
     * however no change will be made in the billingDetails
	 * present against the Saved-card in customer vault.
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
	 * The transactionIntent property is used to identify the intent of the authorization requests.
	 * The value of the transactionIntent shows if the transaction is crypto or quasi-cash related one. <br />
	 * This field is mandatory for Visa card - cross-border fundingTransactions
     * where the recipient is from any of the
	 * following countries: India, Bangladesh, Argentina, and Egypt.<br />
	 * It is also required for specific use cases. Check
	 * <a href="https://developer.paysafe.com/en/payments-api/#/schemas/transactionIntent">
     *     on Transaction Intent reference page
     * </a>
	 * for more information.
	 * 
	 * @return string
	 */
	public function getTransactionIntent(): string
	{
		return $this->transactionIntent;
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
	 * Get applePay
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
	 * It has GooglePay details.
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
	 * These are the details of the customer used for the transaction.
	 * 
	 * @return Skrill
	 */
	public function getSkrill(): Skrill
	{
		return $this->skrill;
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
	 * This contains parameters returned by gateway
	 * 
	 * @return GatewayResponse
	 */
	public function getGatewayResponse(): GatewayResponse
	{
		return $this->gatewayResponse;
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
	 * Neteller details to be used for the request
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
	 * These are the details of the paysafecash account used for the transaction.
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
	 * These are the details of the paysafecard used for the transaction.
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
	 * These are the details of the PayPal account used for the transaction.
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
	 * Get venmo
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
	public function getBrowserDetails(): ?BrowserDetails
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
	 * For Interac e-Transfer withdrawal only.<br />
     * This is part of Interac e-Transfer withdrawal payment handle request.
	 * It is used for risk assessment by Interac. <br />
	 * This parameter is mandatory if browserDetails object is not passed as a part
     * of Interac e-Transfer withdrawal payment handle request.
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
	 * Details of the EFT account to be used for the transaction
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
	 * Builder function for additionalParameters
	 * 
	 * @param array $additionalParameters
	 * 
	 * @return $this
	 */
	public function additionalParameters(array $additionalParameters): self
	{
		$this->setAdditionalParameters($additionalParameters);
		
		return $this;
	}

	/**
	 * Setter function for additionalParameters
	 * 
	 * @param array $additionalParameters
	 * 
	 * @return void
	 */
	public function setAdditionalParameters(array $additionalParameters): void
	{
		$this->additionalParameters = $additionalParameters;
	}

	/**
	 * Getter function for additionalParameters
	 * 
	 * @return array
	 */
	public function getAdditionalParameters(): array
	{
		return $this->additionalParameters;
	}

    /**
     * Add a new additional parameter
     *
     * @param string $key
     * @param mixed $value
     *
     * @return $this
     */
    public function addAdditionalParameter(string $key, $value): self
    {
        if ($this->additionalParameters === null) {
            $this->additionalParameters = [];
        }

        $this->additionalParameters[$key] = $value;

        return $this;
    }

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class PaymentHandleRequest {" . PHP_EOL
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
			. "    threeDs: " . $this->toIndentedString($this->threeDs) . PHP_EOL
			. "    authentication: " . $this->toIndentedString($this->authentication) . PHP_EOL
			. "    paymentHandleTokenFrom: " . $this->toIndentedString($this->paymentHandleTokenFrom) . PHP_EOL
			. "    transactionIntent: " . $this->toIndentedString($this->transactionIntent) . PHP_EOL
			. "    applePay: " . $this->toIndentedString($this->applePay) . PHP_EOL
			. "    googlePay: " . $this->toIndentedString($this->googlePay) . PHP_EOL
			. "    skrill: " . $this->toIndentedString($this->skrill) . PHP_EOL
			. "    gatewayResponse: " . $this->toIndentedString($this->gatewayResponse) . PHP_EOL
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
			. "    additionalParameters: " . $this->toIndentedString($this->additionalParameters) . PHP_EOL
			. "}";
	}
}
