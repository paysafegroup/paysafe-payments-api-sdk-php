<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Payment;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\AcquirerData;
use Paysafe\PhpSdk\Model\Card\CardWithOptionalNetworkTokenOrApplePay;
use Paysafe\PhpSdk\Model\Card\MerchantDescriptor;
use Paysafe\PhpSdk\Model\Card\ThreeDs\Authentication;
use Paysafe\PhpSdk\Model\Card\ThreeDs\BrowserDetails;
use Paysafe\PhpSdk\Model\Card\ThreeDs\ThreeDs;
use Paysafe\PhpSdk\Model\Common\BillingDetails;
use Paysafe\PhpSdk\Model\Common\DeviceDetails;
use Paysafe\PhpSdk\Model\Common\Error\Error;
use Paysafe\PhpSdk\Model\Common\GatewayResponse;
use Paysafe\PhpSdk\Model\Common\Link;
use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Model\Common\PaymentDetails;
use Paysafe\PhpSdk\Model\Common\PaymentFacilitator\PaymentFacilitator;
use Paysafe\PhpSdk\Model\Common\Profile\Profile;
use Paysafe\PhpSdk\Model\Common\ReturnLink;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\AirlineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Carrental\CarRentalDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Cruise\CruiselineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Lodging\LodgingDetails;
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
use Paysafe\PhpSdk\Model\Settlement\Settlement;

/**
 * Represents the response of a payment transaction
 * <p>The {@code Payment} class captures essential data returned after processing a payment,
 * including transaction details, customer and billing information, and gateway responses.</p>
 * <p>Key fields:</p>
 * <ul>
 *   <li><strong>id:</strong> The unique identifier for the payment transaction.</li>
 *   <li><strong>availableToSettle:</strong> The amount available to settle from the payment.</li>
 *   <li><strong>childAccountNum:</strong> The child account number
 *      if the transaction is processed via a master account.</li>
 *   <li><strong>txnTime:</strong> The date and time of the transaction (e.g., "2023-12-20T15:00:00Z").</li>
 *   <li><strong>paymentType:</strong> The type of payment used (e.g., CREDIT_CARD, PAYPAL, etc.).</li>
 *   <li><strong>status:</strong> The current status of the payment transaction (e.g., "COMPLETED", "FAILED").</li>
 *   <li><strong>riskReasonCode:</strong> A list of risk-related reason codes.</li>
 *   <li><strong>settlements:</strong> A list of settlement objects associated with the payment.</li>
 *   <li><strong>error:</strong> Error details, if any, associated with the transaction.</li>
 *   <li><strong>statusReason:</strong> A description of the reason for the current status.</li>
 *   <li><strong>authenticationDetails:</strong> Details related to payment authentication, such as 3D Secure.</li>
 *   <li><strong>gatewayReconciliationId:</strong> The reconciliation ID returned by the gateway.</li>
 *   <li><strong>updatedTime:</strong> The date and time the payment response was last updated.</li>
 *   <li><strong>statusTime:</strong> The date and time the current status was assigned.</li>
 *   <li><strong>availableToRefund:</strong> The amount available for refund, expressed in minor units.</li>
 *   <li><strong>processingRails:</strong> The processing rails used for the transaction
 *      (e.g., Visa, Mastercard).</li>
 *   <li><strong>links:</strong> A list of links for further actions or details related to the transaction.</li>
 *   <li><strong>liveMode:</strong> Indicates whether the transaction was processed in live mode (true)
 *      or test mode (false).</li>
 *   <li><strong>billingDetails:</strong> Billing details associated with the payment.</li>
 *   <li><strong>customerProfile:</strong> Information about the customer's profile.</li>
 *   <li><strong>merchantRefNum:</strong> The merchant's reference number for the transaction.</li>
 *   <li><strong>amount:</strong> The total amount of the payment transaction, expressed in minor units.</li>
 *   <li><strong>dupCheck:</strong> Indicates whether duplicate transaction checking was applied.</li>
 *   <li><strong>settleWithAuth:</strong> Indicates whether the payment was settled with authorization.</li>
 *   <li><strong>paymentHandleToken:</strong> The token representing a payment handle for the transaction.</li>
 *   <li><strong>customerIp:</strong> The IP address of the customer making the payment.</li>
 *   <li><strong>currencyCode:</strong> The currency used for the transaction, in ISO 4217 format.</li>
 *   <li><strong>card:</strong> Card details used in the transaction, if applicable.</li>
 *   <li><strong>threeDs:</strong> 3D Secure details for authentication, if applicable.</li>
 *   <li><strong>paymentHandleTokenFrom:</strong> The token from which the payment handle was generated.</li>
 *   <li><strong>transactionIntent:</strong> The intent of the transaction (e.g., AUTHORIZATION, SALE).</li>
 *   <li><strong>gatewayResponse:</strong> The response returned by the payment gateway.</li>
 * </ul>
 */
class Payment extends BaseModel
{

	private string $merchantRefNum;
	private int $amount;
	private bool $dupCheck;
	private bool $settleWithAuth;
	private string $paymentHandleToken;
	private string $customerIp;
	private string $currencyCode;
	private CardWithOptionalNetworkTokenOrApplePay $card;
	private ThreeDs $threeDs;
	private Authentication $authentication;
	private bool $preAuth;
	private string $paymentHandleTokenFrom;
	private string $transactionIntent;
	private GatewayResponse $gatewayResponse;
	private Skrill $skrill;
	private Neteller $neteller;
	private Paysafecash $paysafecash;
	private Paysafecard $paysafecard;
	private Paypal $payPal;
	private array $returnLinks;
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
	private Bacs $bacs;
	private ?array $mandates = null;
	private Sepa $sepa;
	private SafetyPayCash $safetyPayCash;
	private int $paymentExpiryInMinutes;
	private PaymentDetails $paymentDetails;
	private int $paymentExpiryMinutes;
	private string $id;
	private int $availableToSettle;
	private string $childAccountNum;
	private string $txnTime;
	private string $paymentType;
	private string $status;
	private ?array $riskReasonCode = null;
	private array $settlements;
	private Error $error;
	private string $statusReason;
	private string $gatewayReconciliationId;
	private string $updatedTime;
	private string $statusTime;
	private int $availableToRefund;
	private string $processingRails;
	private Link $link;
	private bool $liveMode;
	private BillingDetails $billingDetails;
	private Profile $customerProfile;
	private AcquirerData $acquirerData;
	private PaymentFacilitator $paymentFacilitator;
	private AirlineTravelDetails $airlineTravelDetails;
	private LodgingDetails $lodgingDetails;
	private CarRentalDetails $carRentalDetails;
	private CruiselineTravelDetails $cruiselineTravelDetails;
	private MerchantDescriptor $merchantDescriptor;
	private array $keywords;
	private string $description;

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
	 * This is the merchant reference number created by the merchant and submitted as part of the request.<br />
	 * It must be unique for each request if dupCheck parameter is sent as "true".
	 * 
	 * @return string
	 */
	public function getMerchantRefNum(): string
	{
		return $this->merchantRefNum;
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
	 * This is the amount of the request, in minor units. For example,
     * to process US $10.99, this value  should be 1099.
	 * <b>Note:<b> The amount specified in the Payment request must match
     * the amount specified in the Payment Handle request
	 * from which the paymentHandleToken is taken.<br />
	 * Maximum: 99999999999
	 * 
	 * @return int
	 */
	public function getAmount(): int
	{
		return $this->amount;
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
	 * Builder function for settleWithAuth
	 * 
	 * @param bool $settleWithAuth
	 * 
	 * @return $this
	 */
	public function settleWithAuth(bool $settleWithAuth): self
	{
		$this->setSettleWithAuth($settleWithAuth);
		
		return $this;
	}

	/**
	 * Setter function for settleWithAuth
	 * 
	 * @param bool $settleWithAuth
	 * 
	 * @return void
	 */
	public function setSettleWithAuth(bool $settleWithAuth): void
	{
		$this->settleWithAuth = $settleWithAuth;
	}

	/**
	 * This indicates whether the request is an  Authorization only (no Settlement),
     * or a Purchase (Authorization and Settlement). <br />
	 * - false – The request is not settled  <br />
	 * - true – The request is settled  <br />
	 * <b>Note:<b> Defaults to false for cards and true for APMs.
	 * 
	 * @return bool
	 */
	public function getSettleWithAuth(): bool
	{
		return $this->settleWithAuth;
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
	 * This is the payment token generated by Paysafe that will be used for the Payment request.
     * > For Payment, Payment handle must be in PAYABLE state
	 * 
	 * @return string
	 */
	public function getPaymentHandleToken(): string
	{
		return $this->paymentHandleToken;
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
	 * This is the currency of the merchant account, e.g., USD or CAD, returned in the request response.
	 * <b>Note:<b> The currencyCode specified in the Payment request must match
     * the currencyCode specified in the Payment Handle request from which
	 * the paymentHandleToken is taken.
	 * 
	 * @return string
	 */
	public function getCurrencyCode(): string
	{
		return $this->currencyCode;
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
	 * Get card
	 * 
	 * @return CardWithOptionalNetworkTokenOrApplePay
	 */
	public function getCard(): CardWithOptionalNetworkTokenOrApplePay
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
	 * This is the threeDs object. You need to send this object when you want to process CARD transaction with 3DS.
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
	 * Setter function for authentication
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
	 * 3D Secure authentication details.
	 * 
	 * @return Authentication
	 */
	public function getAuthentication(): Authentication
	{
		return $this->authentication;
	}

	/**
	 * Builder function for preAuth
	 * 
	 * @param bool $preAuth
	 * 
	 * @return $this
	 */
	public function preAuth(bool $preAuth): self
	{
		$this->setPreAuth($preAuth);
		
		return $this;
	}

	/**
	 * Setter function for preAuth
	 * 
	 * @param bool $preAuth
	 * 
	 * @return void
	 */
	public function setPreAuth(bool $preAuth): void
	{
		$this->preAuth = $preAuth;
	}

	/**
	 * This indicates whether the Authorization request should be sent as a Pre-Authorization.
	 * <b>Note:<b> You should use the preAuth element in cases where you are not sure
     * that you can fully settle the Authorization within 4 days.
	 * Contact your account manager for more information.
	 * 
	 * @return bool
	 */
	public function getPreAuth(): bool
	{
		return $this->preAuth;
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
	 * The response returns the original value from the request. This is used in Saved card flow.
     * You will pass this parameter when you want to create
	 * single use payment handle using the Saved-card (card-on-file) present in Paysafe customer vault. <br />
	 * This is an existing Customer Payment Handle,
     * from which the payment instrument details and profile details are retrieved. <br />
	 * If this parameter is included then you can omit the billingDetails object. <br />
	 * If you send a new billingDetails then same will be considered for the transaction,
     * however no change will be made in the billingDetails present
	 * against the Saved-card in customer vault.
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
	 * This field is mandatory for Visa card - cross-border fundingTransactions where the recipient is from any of the
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
	 * This contains parameters returned by Skrill gateway
	 * 
	 * @return GatewayResponse
	 */
	public function getGatewayResponse(): GatewayResponse
	{
		return $this->gatewayResponse;
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
	 * This is the ID returned in the response. This ID  can be used for future associated requests.
	 * 
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * Builder function for availableToSettle
	 * 
	 * @param int $availableToSettle
	 * 
	 * @return $this
	 */
	public function availableToSettle(int $availableToSettle): self
	{
		$this->setAvailableToSettle($availableToSettle);
		
		return $this;
	}

	/**
	 * Setter function for availableToSettle
	 * 
	 * @param int $availableToSettle
	 * 
	 * @return void
	 */
	public function setAvailableToSettle(int $availableToSettle): void
	{
		$this->availableToSettle = $availableToSettle;
	}

	/**
	 * This is the amount of the Authorization remaining  to settle, in minor units.
	 * 
	 * @return int
	 */
	public function getAvailableToSettle(): int
	{
		return $this->availableToSettle;
	}

	/**
	 * Builder function for childAccountNum
	 * 
	 * @param string $childAccountNum
	 * 
	 * @return $this
	 */
	public function childAccountNum(string $childAccountNum): self
	{
		$this->setChildAccountNum($childAccountNum);
		
		return $this;
	}

	/**
	 * Setter function for childAccountNum
	 * 
	 * @param string $childAccountNum
	 * 
	 * @return void
	 */
	public function setChildAccountNum(string $childAccountNum): void
	{
		$this->childAccountNum = $childAccountNum;
	}

	/**
	 * This is the child merchant account number.
     * It is  returned only if the transaction was processed via a master account.
	 * 
	 * @return string
	 */
	public function getChildAccountNum(): string
	{
		return $this->childAccountNum;
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
	 * This is the date and time the request was  processed. For example: 2022-12-16T17:45:28Z
	 * 
	 * @return string
	 */
	public function getTxnTime(): string
	{
		return $this->txnTime;
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
	 * 
	 * @return string
	 */
	public function getPaymentType(): string
	{
		return $this->paymentType;
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
	 * This is the status of the transaction request.
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Builder function for riskReasonCode
	 * 
	 * @param int[] $riskReasonCode
	 * 
	 * @return $this
	 */
	public function riskReasonCode(array $riskReasonCode): self
	{
		$this->setRiskReasonCode($riskReasonCode);
		
		return $this;
	}

	/**
	 * Setter function for riskReasonCode
	 * 
	 * @param int[] $riskReasonCode
	 * 
	 * @return void
	 */
	public function setRiskReasonCode(array $riskReasonCode): void
	{
		$this->riskReasonCode = $riskReasonCode;
	}

	/**
	 * For CARD. An array of integers is returned, displaying the
     * detailed Risk reason codes if your transaction was declined.
	 * It is returned only if your account is configured accordingly.
	 * 
	 * @return int[]|null
	 */
	public function getRiskReasonCode(): array
	{
		return $this->riskReasonCode;
	}

	/**
	 * Add new riskReasonCodeItem
	 * 
	 * @param int $riskReasonCodeItem
	 * 
	 * @return $this
	 */
	public function addRiskReasonCodeItem(int $riskReasonCodeItem): self
	{
		if ($this->riskReasonCode === null) {
			$this->setRiskReasonCode([$riskReasonCodeItem]);
			
			return $this;
		}
		
		$riskReasonCode = $this->getRiskReasonCode();
		$riskReasonCode[] = $riskReasonCodeItem;
		$this->setRiskReasonCode($riskReasonCode);
		
		return $this;
	}

	/**
	 * Remove riskReasonCodeItem
	 * 
	 * @param int $riskReasonCodeItem
	 * 
	 * @return $this
	 */
	public function removeRiskReasonCodeItem(int $riskReasonCodeItem): self
	{
		$this->setRiskReasonCode(array_diff($this->getRiskReasonCode(), [$riskReasonCodeItem]));
		
		return $this;
	}

	/**
	 * Builder function for settlements
	 * 
	 * @param Settlement[] $settlements
	 * 
	 * @return $this
	 */
	public function settlements(array $settlements): self
	{
		$this->setSettlements($settlements);
		
		return $this;
	}

	/**
	 * Setter function for settlements
	 * 
	 * @param Settlement[] $settlements
	 * 
	 * @return void
	 */
	public function setSettlements(array $settlements): void
	{
		$this->settlements = $settlements;
	}

	/**
	 * Get settlements
	 * 
	 * @return Settlement[]
	 */
	public function getSettlements(): array
	{
		return $this->settlements;
	}

	/**
	 * Add new settlementsItem
	 * 
	 * @param Settlement $settlementsItem
	 * 
	 * @return $this
	 */
	public function addSettlementsItem(Settlement $settlementsItem): self
	{
		if ($this->settlements === null) {
			$this->setSettlements([$settlementsItem]);
			
			return $this;
		}
		
		$settlements = $this->getSettlements();
		$settlements[] = $settlementsItem;
		$this->setSettlements($settlements);
		
		return $this;
	}

	/**
	 * Remove settlementsItem
	 * 
	 * @param Settlement $settlementsItem
	 * 
	 * @return $this
	 */
	public function removeSettlementsItem(Settlement $settlementsItem): self
	{
		$this->setSettlements(array_diff($this->getSettlements(), [$settlementsItem]));
		
		return $this;
	}

	/**
	 * Builder function for error
	 * 
	 * @param Error $error
	 * 
	 * @return $this
	 */
	public function error(Error $error): self
	{
		$this->setError($error);
		
		return $this;
	}

	/**
	 * Setter function for error
	 * 
	 * @param Error $error
	 * 
	 * @return void
	 */
	public function setError(Error $error): void
	{
		$this->error = $error;
	}

	/**
	 * Details of the error.
	 * 
	 * @return Error
	 */
	public function getError(): Error
	{
		return $this->error;
	}

	/**
	 * Builder function for statusReason
	 * 
	 * @param string $statusReason
	 * 
	 * @return $this
	 */
	public function statusReason(string $statusReason): self
	{
		$this->setStatusReason($statusReason);
		
		return $this;
	}

	/**
	 * Setter function for statusReason
	 * 
	 * @param string $statusReason
	 * 
	 * @return void
	 */
	public function setStatusReason(string $statusReason): void
	{
		$this->statusReason = $statusReason;
	}

	/**
	 * This is reason for the status. This is present in the case where status is ERROR, FAILURE, or HELD.
	 * 
	 * @return string
	 */
	public function getStatusReason(): string
	{
		return $this->statusReason;
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
	 * Not for CARD. Transaction identifier that can be used to reconcile this transaction with the provider gateway.
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
	 * ISO 8601 format (UTC) This is the date and time the resource was last updated, e.g., 2014-01-26T10:32:28Z
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
	 * ISO 8601 format (UTC) This is the date and time the resource status was last updated,
     * e.g., 2014-01-26T10:32:28Z
	 * 
	 * @return string
	 */
	public function getStatusTime(): string
	{
		return $this->statusTime;
	}

	/**
	 * Builder function for availableToRefund
	 * 
	 * @param int $availableToRefund
	 * 
	 * @return $this
	 */
	public function availableToRefund(int $availableToRefund): self
	{
		$this->setAvailableToRefund($availableToRefund);
		
		return $this;
	}

	/**
	 * Setter function for availableToRefund
	 * 
	 * @param int $availableToRefund
	 * 
	 * @return void
	 */
	public function setAvailableToRefund(int $availableToRefund): void
	{
		$this->availableToRefund = $availableToRefund;
	}

	/**
	 * This is the amount of this Settlement that is available to Refund, in minor units.
     * For example, US $10.99 would be 1099. <br />
	 * Maximum: 99999999999
	 * 
	 * @return int
	 */
	public function getAvailableToRefund(): int
	{
		return $this->availableToRefund;
	}

	/**
	 * Builder function for processingRails
	 * 
	 * @param string $processingRails
	 * 
	 * @return $this
	 */
	public function processingRails(string $processingRails): self
	{
		$this->setProcessingRails($processingRails);
		
		return $this;
	}

	/**
	 * Setter function for processingRails
	 * 
	 * @param string $processingRails
	 * 
	 * @return void
	 */
	public function setProcessingRails(string $processingRails): void
	{
		$this->processingRails = $processingRails;
	}

	/**
	 * For CARD.Defines the processing rails options used for this transaction,
     * indicating whether it is processed via pinless or regular card scheme network.
	 * Possible values: PINLESS, CARD_SCHEME_ROUTED
	 * 
	 * @return string
	 */
	public function getProcessingRails(): string
	{
		return $this->processingRails;
	}

	/**
	 * Builder function for link
	 * 
	 * @param Link $link
	 * 
	 * @return $this
	 */
	public function link(Link $link): self
	{
		$this->setLink($link);
		
		return $this;
	}

	/**
	 * Setter function for link
	 * 
	 * @param Link $link
	 * 
	 * @return void
	 */
	public function setLink(Link $link): void
	{
		$this->link = $link;
	}

	/**
	 * URL links to redirect customer during transaction flow
	 * 
	 * @return Link
	 */
	public function getLink(): Link
	{
		return $this->link;
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
	 * This flag indicates the environment.  - true - production - false - Non-Production
	 * 
	 * @return bool
	 */
	public function getLiveMode(): bool
	{
		return $this->liveMode;
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
	 * Builder function for customerProfile
	 * 
	 * @param Profile $customerProfile
	 * 
	 * @return $this
	 */
	public function customerProfile(Profile $customerProfile): self
	{
		$this->setCustomerProfile($customerProfile);
		
		return $this;
	}

	/**
	 * Setter function for customerProfile
	 * 
	 * @param Profile $customerProfile
	 * 
	 * @return void
	 */
	public function setCustomerProfile(Profile $customerProfile): void
	{
		$this->customerProfile = $customerProfile;
	}

	/**
	 * This is customer's profile details. <br />**Same as request**.
	 * 
	 * @return Profile
	 */
	public function getCustomerProfile(): Profile
	{
		return $this->customerProfile;
	}

	/**
	 * Builder function for acquirerData
	 * 
	 * @param AcquirerData $acquirerData
	 * 
	 * @return $this
	 */
	public function acquirerData(AcquirerData $acquirerData): self
	{
		$this->setAcquirerData($acquirerData);
		
		return $this;
	}

	/**
	 * Setter function for acquirerData
	 * 
	 * @param AcquirerData $acquirerData
	 * 
	 * @return void
	 */
	public function setAcquirerData(AcquirerData $acquirerData): void
	{
		$this->acquirerData = $acquirerData;
	}

	/**
	 * This is customer's profile details. <br />**Same as request**.
	 * 
	 * @return AcquirerData
	 */
	public function getAcquirerData(): AcquirerData
	{
		return $this->acquirerData;
	}

	/**
	 * Builder function for paymentFacilitator
	 * 
	 * @param PaymentFacilitator $paymentFacilitator
	 * 
	 * @return $this
	 */
	public function paymentFacilitator(PaymentFacilitator $paymentFacilitator): self
	{
		$this->setPaymentFacilitator($paymentFacilitator);
		
		return $this;
	}

	/**
	 * Setter function for paymentFacilitator
	 * 
	 * @param PaymentFacilitator $paymentFacilitator
	 * 
	 * @return void
	 */
	public function setPaymentFacilitator(PaymentFacilitator $paymentFacilitator): void
	{
		$this->paymentFacilitator = $paymentFacilitator;
	}

	/**
	 * This is customer's profile details. <br />**Same as request**.
	 * 
	 * @return PaymentFacilitator
	 */
	public function getPaymentFacilitator(): PaymentFacilitator
	{
		return $this->paymentFacilitator;
	}

	/**
	 * Builder function for airlineTravelDetails
	 * 
	 * @param AirlineTravelDetails $airlineTravelDetails
	 * 
	 * @return $this
	 */
	public function airlineTravelDetails(AirlineTravelDetails $airlineTravelDetails): self
	{
		$this->setAirlineTravelDetails($airlineTravelDetails);
		
		return $this;
	}

	/**
	 * Setter function for airlineTravelDetails
	 * 
	 * @param AirlineTravelDetails $airlineTravelDetails
	 * 
	 * @return void
	 */
	public function setAirlineTravelDetails(AirlineTravelDetails $airlineTravelDetails): void
	{
		$this->airlineTravelDetails = $airlineTravelDetails;
	}

	/**
	 * This is customer's profile details. <br />**Same as request**.
	 * 
	 * @return AirlineTravelDetails
	 */
	public function getAirlineTravelDetails(): AirlineTravelDetails
	{
		return $this->airlineTravelDetails;
	}

	/**
	 * Builder function for lodgingDetails
	 * 
	 * @param LodgingDetails $lodgingDetails
	 * 
	 * @return $this
	 */
	public function lodgingDetails(LodgingDetails $lodgingDetails): self
	{
		$this->setLodgingDetails($lodgingDetails);
		
		return $this;
	}

	/**
	 * Setter function for lodgingDetails
	 * 
	 * @param LodgingDetails $lodgingDetails
	 * 
	 * @return void
	 */
	public function setLodgingDetails(LodgingDetails $lodgingDetails): void
	{
		$this->lodgingDetails = $lodgingDetails;
	}

	/**
	 * Same as in PaymentRequest.
	 * 
	 * @return LodgingDetails
	 */
	public function getLodgingDetails(): LodgingDetails
	{
		return $this->lodgingDetails;
	}

	/**
	 * Builder function for carRentalDetails
	 * 
	 * @param CarRentalDetails $carRentalDetails
	 * 
	 * @return $this
	 */
	public function carRentalDetails(CarRentalDetails $carRentalDetails): self
	{
		$this->setCarRentalDetails($carRentalDetails);
		
		return $this;
	}

	/**
	 * Setter function for carRentalDetails
	 * 
	 * @param CarRentalDetails $carRentalDetails
	 * 
	 * @return void
	 */
	public function setCarRentalDetails(CarRentalDetails $carRentalDetails): void
	{
		$this->carRentalDetails = $carRentalDetails;
	}

	/**
	 * Same as in PaymentRequest.
	 * 
	 * @return CarRentalDetails
	 */
	public function getCarRentalDetails(): CarRentalDetails
	{
		return $this->carRentalDetails;
	}

	/**
	 * Builder function for cruiselineTravelDetails
	 * 
	 * @param CruiselineTravelDetails $cruiselineTravelDetails
	 * 
	 * @return $this
	 */
	public function cruiselineTravelDetails(CruiselineTravelDetails $cruiselineTravelDetails): self
	{
		$this->setCruiselineTravelDetails($cruiselineTravelDetails);
		
		return $this;
	}

	/**
	 * Setter function for cruiselineTravelDetails
	 * 
	 * @param CruiselineTravelDetails $cruiselineTravelDetails
	 * 
	 * @return void
	 */
	public function setCruiselineTravelDetails(CruiselineTravelDetails $cruiselineTravelDetails): void
	{
		$this->cruiselineTravelDetails = $cruiselineTravelDetails;
	}

	/**
	 * Same as in PaymentRequest.
	 * 
	 * @return CruiselineTravelDetails
	 */
	public function getCruiselineTravelDetails(): CruiselineTravelDetails
	{
		return $this->cruiselineTravelDetails;
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
	 * This is the merchant descriptor that will be displayed on the customer's card or bank statement.
	 * 
	 * @return MerchantDescriptor
	 */
	public function getMerchantDescriptor(): MerchantDescriptor
	{
		return $this->merchantDescriptor;
	}

	/**
	 * Builder function for keywords
	 * 
	 * @param string[] $keywords
	 * 
	 * @return $this
	 */
	public function keywords(array $keywords): self
	{
		$this->setKeywords($keywords);
		
		return $this;
	}

	/**
	 * Setter function for keywords
	 * 
	 * @param string[] $keywords
	 * 
	 * @return void
	 */
	public function setKeywords(array $keywords): void
	{
		$this->keywords = $keywords;
	}

	/**
	 * This is the merchant descriptor that will be displayed on the customer's card or bank statement.
	 * 
	 * @return string[]
	 */
	public function getKeywords(): array
	{
		return $this->keywords;
	}

	/**
	 * Add new keywordsItem
	 * 
	 * @param string $keywordsItem
	 * 
	 * @return $this
	 */
	public function addKeywordsItem(string $keywordsItem): self
	{
		if ($this->keywords === null) {
			$this->setKeywords([$keywordsItem]);
			
			return $this;
		}
		
		$keywords = $this->getKeywords();
		$keywords[] = $keywordsItem;
		$this->setKeywords($keywords);
		
		return $this;
	}

	/**
	 * Remove keywordsItem
	 * 
	 * @param string $keywordsItem
	 * 
	 * @return $this
	 */
	public function removeKeywordsItem(string $keywordsItem): self
	{
		$this->setKeywords(array_diff($this->getKeywords(), [$keywordsItem]));
		
		return $this;
	}

	/**
	 * Builder function for description
	 * 
	 * @param string $description
	 * 
	 * @return $this
	 */
	public function description(string $description): self
	{
		$this->setDescription($description);
		
		return $this;
	}

	/**
	 * Setter function for description
	 * 
	 * @param string $description
	 * 
	 * @return void
	 */
	public function setDescription(string $description): void
	{
		$this->description = $description;
	}

	/**
	 * Same as in PaymentRequest.
	 * 
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Payment {" . PHP_EOL
			. "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL
			. "    amount: " . $this->toIndentedString($this->amount) . PHP_EOL
			. "    dupCheck: " . $this->toIndentedString($this->dupCheck) . PHP_EOL
			. "    settleWithAuth: " . $this->toIndentedString($this->settleWithAuth) . PHP_EOL
			. "    paymentHandleToken: " . $this->toIndentedString($this->paymentHandleToken) . PHP_EOL
			. "    customerIp: " . $this->toIndentedString($this->customerIp) . PHP_EOL
			. "    currencyCode: " . $this->toIndentedString($this->currencyCode) . PHP_EOL
			. "    card: " . $this->toIndentedString($this->card) . PHP_EOL
			. "    threeDs: " . $this->toIndentedString($this->threeDs) . PHP_EOL
			. "    authentication: " . $this->toIndentedString($this->authentication) . PHP_EOL
			. "    preAuth: " . $this->toIndentedString($this->preAuth) . PHP_EOL
			. "    paymentHandleTokenFrom: " . $this->toIndentedString($this->paymentHandleTokenFrom) . PHP_EOL
			. "    transactionIntent: " . $this->toIndentedString($this->transactionIntent) . PHP_EOL
			. "    gatewayResponse: " . $this->toIndentedString($this->gatewayResponse) . PHP_EOL
			. "    skrill: " . $this->toIndentedString($this->skrill) . PHP_EOL
			. "    neteller: " . $this->toIndentedString($this->neteller) . PHP_EOL
			. "    paysafecash: " . $this->toIndentedString($this->paysafecash) . PHP_EOL
			. "    paysafecard: " . $this->toIndentedString($this->paysafecard) . PHP_EOL
			. "    payPal: " . $this->toIndentedString($this->payPal) . PHP_EOL
			. "    returnLinks: " . $this->toIndentedString($this->returnLinks) . PHP_EOL
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
			. "    bacs: " . $this->toIndentedString($this->bacs) . PHP_EOL
			. "    mandates: " . $this->toIndentedString($this->mandates) . PHP_EOL
			. "    sepa: " . $this->toIndentedString($this->sepa) . PHP_EOL
			. "    safetyPayCash: " . $this->toIndentedString($this->safetyPayCash) . PHP_EOL
			. "    paymentExpiryInMinutes: " . $this->toIndentedString($this->paymentExpiryInMinutes) . PHP_EOL
			. "    paymentDetails: " . $this->toIndentedString($this->paymentDetails) . PHP_EOL
			. "    paymentExpiryMinutes: " . $this->toIndentedString($this->paymentExpiryMinutes) . PHP_EOL
			. "    id: " . $this->toIndentedString($this->id) . PHP_EOL
			. "    availableToSettle: " . $this->toIndentedString($this->availableToSettle) . PHP_EOL
			. "    childAccountNum: " . $this->toIndentedString($this->childAccountNum) . PHP_EOL
			. "    txnTime: " . $this->toIndentedString($this->txnTime) . PHP_EOL
			. "    paymentType: " . $this->toIndentedString($this->paymentType) . PHP_EOL
			. "    status: " . $this->toIndentedString($this->status) . PHP_EOL
			. "    riskReasonCode: " . $this->toIndentedString($this->riskReasonCode) . PHP_EOL
			. "    settlements: " . $this->toIndentedString($this->settlements) . PHP_EOL
			. "    error: " . $this->toIndentedString($this->error) . PHP_EOL
			. "    statusReason: " . $this->toIndentedString($this->statusReason) . PHP_EOL
			. "    gatewayReconciliationId: " . $this->toIndentedString($this->gatewayReconciliationId) . PHP_EOL
			. "    updatedTime: " . $this->toIndentedString($this->updatedTime) . PHP_EOL
			. "    statusTime: " . $this->toIndentedString($this->statusTime) . PHP_EOL
			. "    availableToRefund: " . $this->toIndentedString($this->availableToRefund) . PHP_EOL
			. "    processingRails: " . $this->toIndentedString($this->processingRails) . PHP_EOL
			. "    link: " . $this->toIndentedString($this->link) . PHP_EOL
			. "    liveMode: " . $this->toIndentedString($this->liveMode) . PHP_EOL
			. "    billingDetails: " . $this->toIndentedString($this->billingDetails) . PHP_EOL
			. "    customerProfile: " . $this->toIndentedString($this->customerProfile) . PHP_EOL
			. "    acquirerData: " . $this->toIndentedString($this->acquirerData) . PHP_EOL
			. "    paymentFacilitator: " . $this->toIndentedString($this->paymentFacilitator) . PHP_EOL
			. "    airlineTravelDetails: " . $this->toIndentedString($this->airlineTravelDetails) . PHP_EOL
			. "    lodgingDetails: " . $this->toIndentedString($this->lodgingDetails) . PHP_EOL
			. "    carRentalDetails: " . $this->toIndentedString($this->carRentalDetails) . PHP_EOL
			. "    cruiselineTravelDetails: " . $this->toIndentedString($this->cruiselineTravelDetails) . PHP_EOL
			. "    merchantDescriptor: " . $this->toIndentedString($this->merchantDescriptor) . PHP_EOL
			. "    keywords: " . $this->toIndentedString($this->keywords) . PHP_EOL
			. "    description: " . $this->toIndentedString($this->description) . PHP_EOL
			. "}";
	}
}
