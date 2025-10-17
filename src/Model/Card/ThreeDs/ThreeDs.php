<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\BillingCycle;

/**
 * This is the threeDs object.
 * You need to send this object when you want to process CARD transaction with 3DS.
 * Required if account is enabled for 3DS. <br />
 * Not required if account is non-3DS. <br />
 * If you are using your own 3DS service provider. Please refer 'authentication' object
 * if you are using your own 3DS service provider.
 * <ul>
 *   <li>
 *     <b>id:</b> This is the unique ID returned in the response.
 *   </li>
 *   <li>
 *     <b>deviceFingerprintingId:</b> This is the UUID used with device fingerprinting.
 *   </li>
 *   <li>
 *     <b>merchantRefNum:</b> This is the merchant reference number created by the merchant
 *      and submitted as part of the request.
 *     It must be unique for each request. <br />
 *     Example: fc5b62df1202e491475d
 *   </li>
 *   <li>
 *     <b>process:</b> This is an indicator representing whether to call authenticate end point or not.
 *   </li>
 *   <li>
 *     <b>merchantUrl:</b> This is the fully qualified URL of the merchant's commercial or customer care website.
 *      <br />
 *     Example: https://api.qa.paysafe.com/checkout/v2/demo-store/index.html
 *   </li>
 *   <li>
 *     <b>deviceChannel:</b> This is the type of channel interface used to initiate the transaction. <br />
 *     <i>Allowed values: BROWSER, SDK, 3RI</i>
 *   </li>
 *   <li>
 *     <b>requestorChallengePreference:</b> This indicates whether a challenge is requested for this transaction.
 *      <br />
 *     <i>Allowed values: NO_PREFERENCE, NO_CHALLENGE_REQUESTED, CHALLENGE_REQUESTED, CHALLENGE_MANDATED</i>
 *   </li>
 *   <li>
 *     <b>messageCategory:</b> This is the category of the message for a specific use case. <br />
 *     <i>Allowed values: PAYMENT, NON_PAYMENT</i>
 *   </li>
 *   <li>
 *     <b>transactionIntent:</b> This identifies the type of transaction being authenticated. <br />
 *     <i>Allowed values: GOODS_OR_SERVICE_PURCHASE, CHECK_ACCEPTANCE, ACCOUNT_FUNDING, QUASI_CASH_TRANSACTION,
 *     PREPAID_ACTIVATION</i>
 *   </li>
 *   <li>
 *     <b>authenticationPurpose:</b> This is the type of Authentication request. This data element provides additional
 *     information to the ACS to determine the best approach for handling an authentication request. <br />
 *     <i>Allowed values: PAYMENT_TRANSACTION, RECURRING_TRANSACTION, INSTALMENT_TRANSACTION, ADD_CARD, MAINTAIN_CARD
 *     EMV_TOKEN_VERIFICATION</i>
 *   </li>
 *   <li>
 *     <b>billingCycle:</b> Details of the billing cycle information for recurring payments. <br />
 *     <b>Note:<b> This object is required if authenticationPurpose = INSTALMENT_TRANSACTION or RECURRING_TRANSACTION.
 *   </li>
 *   <li>
 *     <b>orderItemDetails:</b> Order item details. <br />
 *   </li>
 *   <li>
 *     <b>purchasedGiftCardDetails:</b> Purchased gift card details.
 *   </li>
 *   <li>
 *     <b>userAccountDetails:</b> These are the user account details from the merchant website.
 *   </li>
 *   <li>
 *     <b>priorThreeDSAuthentication:</b> This is the previous authentication information used with current merchant,
 *      cardholder, and card.
 *   </li>
 *   <li>
 *     <b>shippingDetailsUsage:</b> This is the shipping usage information.
 *   </li>
 *   <li>
 *     <b>suspiciousAccountActivity:</b> This indicates whether the 3DS Requestor has experienced suspicious activity,
 *     including previous fraud, on the cardholder account.
 *   </li>
 *   <li>
 *     <b>totalPurchasesSixMonthCount:</b> Transaction count for last 6 months.
 *   </li>
 *   <li>
 *     <b>transactionCountForPreviousDay:</b> Transaction count for last 24 hours.
 *   </li>
 *   <li>
 *     <b>transactionCountForPreviousYear:</b> Transaction count for last 1 year.
 *   </li>
 *   <li>
 *     <b>travelDetails:</b> These are the Amex-specific travel details.
 *   </li>
 *   <li>
 *     <b>userLogin:</b> This is the cardholder login information.
 *   </li>
 *   <li>
 *     <b>browserDetails:</b> These are the browser details. <br />
 *     <b>Note:<b> This object is not required if the Paysafe SDK is used for device fingerprinting.
 *   </li>
 *   <li>
 *     <b>cavv:</b> This is the Cardholder Authentication Verification Value, indicating that
 *      the transaction has been authenticated.
 *   </li>
 *   <li>
 *     <b>eci:</b> This is the Electronic Commerce Indicator code, which gets returned by the card issuer indicating
 *     whether the cardholder was successfully authenticated.
 *   </li>
 *   <li>
 *     <b>status:</b> This is the status of the authentication request. <br />
 *     <i>Allowed values: COMPLETED, PENDING, FAILED</i>
 *   </li>
 *   <li>
 *     <b>threeDResult:</b> ThreeDResult values. <br />
 *     <i>Allowed values: Y, A, N, U, E, C, R</i>
 *   </li>
 *   <li>
 *     <b>txnTime:</b> This is the date and time the request was processed.
 *     The ISO 8601 date format is expected, i.e., YYYY-MM-DD-THH:MM:SSZ.
 *   </li>
 *   <li>
 *     <b>directoryServerTransactionId:</b> This is the directory server transaction ID required for Mastercard.
 *      <br />
 *     <b>Note:<b> This exists only for 3D Secure 2.
 *   </li>
 *   <li>
 *     <b>threeDSecureVersion:</b> This is the 3D Secure protocol version, returned in the response. <br />
 *     <b>Note:<b> If version 2 is not available for the card provided, the value defaults to 1.0.2.
 *   </li>
 *   <li>
 *     <b>acsUrl:</b> This is the fully qualified URL to redirect the consumer to complete
 *      the payer authentication transaction.
 *   </li>
 *   <li>
 *     <b>payload:</b> This is the encoded Payment Authentication Request generated by
 *      the merchant authentication processing system (MAPS).
 *   </li>
 *   <li>
 *     <b>sdkChallengePayload:</b> This is a payload that, if returned,
 *      should be passed to the challenge function of the JavaScrip
 *     SDK to continue with the challenge.
 *   </li>
 *   <li>
 *     <b>xid:</b> This is the transaction identifier returned by the card issuer. <br />
 *     <b>Note:<b> This exists only for 3DS 1.0.2.
 *   </li>
 *   <li>
 *     <b>threeDEnrollment:</b> ThreeDEnrollment values. <br />
 *     <i>Allowed valued: Y, N, U</i>
 *   </li>
 *   <li>
 *     <b>maxAuthorizationsForInstalmentPayment:</b>
 *      This is the maxAuthorizationsForInstalmentPayment of the request, in minor units.
 *   </li>
 *   <li>
 *     <b>electronicDelivery:</b> Electronic delivery.
 *   </li>
 *   <li>
 *     <b>initialPurchaseTime:</b> This is the date and time of the purchase.
 *     The ISO 8601 date format is expected, i.e., YYYY-MM-DD-THH:MM:SSZ. <br />
 *     <b>Note:<b> This element is required only if messageCategory=NON_PAYMENT and
 *     authenticationPurpose=INSTALMENT_TRANSACTION or RECURRING_TRANSACTION.
 *   </li>
 *   <li>
 *     <b>amount:</b> This is the amount of the request, in minor units.
 *   </li>
 * </ul>
 */
class ThreeDs extends BaseModel
{

	private string $id;
	private string $deviceFingerprintingId;
	private string $merchantUrl;
	private string $deviceChannel;
	private string $requestorChallengePreference;
	private string $messageCategory;
	private string $transactionIntent;
	private string $authenticationPurpose;
	private BillingCycle $billingCycle;
	private OrderItemDetails $orderItemDetails;
	private PurchasedGiftCardDetails $purchasedGiftCardDetails;
	private UserAccountDetails $userAccountDetails;
	private PriorThreeDsAuthentication $priorThreeDSAuthentication;
	private ShippingDetailsUsage $shippingDetailsUsage;
	private bool $suspiciousAccountActivity;
	private int $totalPurchasesSixMonthCount;
	private int $transactionCountForPreviousDay;
	private int $transactionCountForPreviousYear;
	private TravelDetails $travelDetails;
	private UserLogin $userLogin;
	private BrowserDetails $browserDetails;
	private string $txnTime;
	private int $maxAuthorizationsForInstalmentPayment;
	private ElectronicDelivery $electronicDelivery;
	private string $initialPurchaseTime;

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
	 * This is the unique ID returned in the response.
	 * 
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * Builder function for deviceFingerprintingId
	 * 
	 * @param string $deviceFingerprintingId
	 * 
	 * @return $this
	 */
	public function deviceFingerprintingId(string $deviceFingerprintingId): self
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
	public function setDeviceFingerprintingId(string $deviceFingerprintingId): void
	{
		$this->deviceFingerprintingId = $deviceFingerprintingId;
	}

	/**
	 * This is the unique ID returned in the response.
	 * 
	 * @return string
	 */
	public function getDeviceFingerprintingId(): string
	{
		return $this->deviceFingerprintingId;
	}

	/**
	 * Builder function for merchantUrl
	 * 
	 * @param string $merchantUrl
	 * 
	 * @return $this
	 */
	public function merchantUrl(string $merchantUrl): self
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
	public function setMerchantUrl(string $merchantUrl): void
	{
		$this->merchantUrl = $merchantUrl;
	}

	/**
	 * This is the fully qualified URL of the merchant's commercial or customer care website.
	 * 
	 * @return string
	 */
	public function getMerchantUrl(): string
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
	public function deviceChannel(string $deviceChannel): self
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
	public function setDeviceChannel(string $deviceChannel): void
	{
		$this->deviceChannel = $deviceChannel;
	}

	/**
	 * This is the type of channel interface used to initiate the transaction.
	 * 
	 * @return string
	 */
	public function getDeviceChannel(): string
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
	public function requestorChallengePreference(string $requestorChallengePreference): self
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
	public function setRequestorChallengePreference(string $requestorChallengePreference): void
	{
		$this->requestorChallengePreference = $requestorChallengePreference;
	}

	/**
	 * This indicates whether a challenge is requested for this transaction.
	 * 
	 * @return string
	 */
	public function getRequestorChallengePreference(): string
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
	public function messageCategory(string $messageCategory): self
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
	public function setMessageCategory(string $messageCategory): void
	{
		$this->messageCategory = $messageCategory;
	}

	/**
	 * This is the category of the message for a specific use case. Values: PAYMENT, NON_PAYMENT
	 * 
	 * @return string
	 */
	public function getMessageCategory(): string
	{
		return $this->messageCategory;
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
	 * This identifies the type of transaction being authenticated.
	 * 
	 * @return string
	 */
	public function getTransactionIntent(): string
	{
		return $this->transactionIntent;
	}

	/**
	 * Builder function for authenticationPurpose
	 * 
	 * @param string $authenticationPurpose
	 * 
	 * @return $this
	 */
	public function authenticationPurpose(string $authenticationPurpose): self
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
	public function setAuthenticationPurpose(string $authenticationPurpose): void
	{
		$this->authenticationPurpose = $authenticationPurpose;
	}

	/**
	 * This is the type of Authentication request. This data element provides additional information to the ACS to
	 * determine the best approach for handling an authentication request.
	 * 
	 * @return string
	 */
	public function getAuthenticationPurpose(): string
	{
		return $this->authenticationPurpose;
	}

	/**
	 * Builder function for billingCycle
	 * 
	 * @param BillingCycle $billingCycle
	 * 
	 * @return $this
	 */
	public function billingCycle(BillingCycle $billingCycle): self
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
	public function setBillingCycle(BillingCycle $billingCycle): void
	{
		$this->billingCycle = $billingCycle;
	}

	/**
	 * Details of the billing cycle information for recurring payments.
	 * Mandatory if authenticationPurpose = INSTALMENT_TRANSACTION or RECURRING_TRANSACTION.
	 * 
	 * @return BillingCycle
	 */
	public function getBillingCycle(): BillingCycle
	{
		return $this->billingCycle;
	}

	/**
	 * Builder function for orderItemDetails
	 * 
	 * @param OrderItemDetails $orderItemDetails
	 * 
	 * @return $this
	 */
	public function orderItemDetails(OrderItemDetails $orderItemDetails): self
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
	public function setOrderItemDetails(OrderItemDetails $orderItemDetails): void
	{
		$this->orderItemDetails = $orderItemDetails;
	}

	/**
	 * Get orderItemDetails
	 * 
	 * @return OrderItemDetails
	 */
	public function getOrderItemDetails(): OrderItemDetails
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
	public function purchasedGiftCardDetails(PurchasedGiftCardDetails $purchasedGiftCardDetails): self
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
	public function setPurchasedGiftCardDetails(PurchasedGiftCardDetails $purchasedGiftCardDetails): void
	{
		$this->purchasedGiftCardDetails = $purchasedGiftCardDetails;
	}

	/**
	 * Get purchasedGiftCardDetails
	 * 
	 * @return PurchasedGiftCardDetails
	 */
	public function getPurchasedGiftCardDetails(): PurchasedGiftCardDetails
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
	public function userAccountDetails(UserAccountDetails $userAccountDetails): self
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
	public function setUserAccountDetails(UserAccountDetails $userAccountDetails): void
	{
		$this->userAccountDetails = $userAccountDetails;
	}

	/**
	 * These are the user account details from the merchant website.
	 * 
	 * @return UserAccountDetails
	 */
	public function getUserAccountDetails(): UserAccountDetails
	{
		return $this->userAccountDetails;
	}

	/**
	 * Builder function for priorThreeDSAuthentication
	 * 
	 * @param PriorThreeDsAuthentication $priorThreeDSAuthentication
	 * 
	 * @return $this
	 */
	public function priorThreeDSAuthentication(PriorThreeDsAuthentication $priorThreeDSAuthentication): self
	{
		$this->setPriorThreeDSAuthentication($priorThreeDSAuthentication);
		
		return $this;
	}

	/**
	 * Setter function for priorThreeDSAuthentication
	 * 
	 * @param PriorThreeDsAuthentication $priorThreeDSAuthentication
	 * 
	 * @return void
	 */
	public function setPriorThreeDSAuthentication(PriorThreeDsAuthentication $priorThreeDSAuthentication): void
	{
		$this->priorThreeDSAuthentication = $priorThreeDSAuthentication;
	}

	/**
	 * This is the previous authentication information used with current merchant, cardholder, and card.
	 * 
	 * @return PriorThreeDsAuthentication
	 */
	public function getPriorThreeDSAuthentication(): PriorThreeDsAuthentication
	{
		return $this->priorThreeDSAuthentication;
	}

	/**
	 * Builder function for shippingDetailsUsage
	 * 
	 * @param ShippingDetailsUsage $shippingDetailsUsage
	 * 
	 * @return $this
	 */
	public function shippingDetailsUsage(ShippingDetailsUsage $shippingDetailsUsage): self
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
	public function setShippingDetailsUsage(ShippingDetailsUsage $shippingDetailsUsage): void
	{
		$this->shippingDetailsUsage = $shippingDetailsUsage;
	}

	/**
	 * This is the shipping usage information.
	 * 
	 * @return ShippingDetailsUsage
	 */
	public function getShippingDetailsUsage(): ShippingDetailsUsage
	{
		return $this->shippingDetailsUsage;
	}

	/**
	 * Builder function for suspiciousAccountActivity
	 * 
	 * @param bool $suspiciousAccountActivity
	 * 
	 * @return $this
	 */
	public function suspiciousAccountActivity(bool $suspiciousAccountActivity): self
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
	public function setSuspiciousAccountActivity(bool $suspiciousAccountActivity): void
	{
		$this->suspiciousAccountActivity = $suspiciousAccountActivity;
	}

	/**
	 * This indicates whether the 3DS Requestor has experienced suspicious activity,
     * including previous fraud, on the cardholder account.
	 * 
	 * @return bool
	 */
	public function getSuspiciousAccountActivity(): bool
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
	public function totalPurchasesSixMonthCount(int $totalPurchasesSixMonthCount): self
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
	public function setTotalPurchasesSixMonthCount(int $totalPurchasesSixMonthCount): void
	{
		$this->totalPurchasesSixMonthCount = $totalPurchasesSixMonthCount;
	}

	/**
	 * Transaction count for last 6 months. <br />
	 * Maximum: 9999
	 * 
	 * @return int
	 */
	public function getTotalPurchasesSixMonthCount(): int
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
	public function transactionCountForPreviousDay(int $transactionCountForPreviousDay): self
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
	public function setTransactionCountForPreviousDay(int $transactionCountForPreviousDay): void
	{
		$this->transactionCountForPreviousDay = $transactionCountForPreviousDay;
	}

	/**
	 * Transaction count for last 24 hours
	 * maximum: 999
	 * 
	 * @return int
	 */
	public function getTransactionCountForPreviousDay(): int
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
	public function transactionCountForPreviousYear(int $transactionCountForPreviousYear): self
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
	public function setTransactionCountForPreviousYear(int $transactionCountForPreviousYear): void
	{
		$this->transactionCountForPreviousYear = $transactionCountForPreviousYear;
	}

	/**
	 * Transaction count for last 1 year. <br />
	 * Maximum: 999
	 * 
	 * @return int
	 */
	public function getTransactionCountForPreviousYear(): int
	{
		return $this->transactionCountForPreviousYear;
	}

	/**
	 * Builder function for travelDetails
	 * 
	 * @param TravelDetails $travelDetails
	 * 
	 * @return $this
	 */
	public function travelDetails(TravelDetails $travelDetails): self
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
	public function setTravelDetails(TravelDetails $travelDetails): void
	{
		$this->travelDetails = $travelDetails;
	}

	/**
	 * These are the Amex-specific travel details.
	 * 
	 * @return TravelDetails
	 */
	public function getTravelDetails(): TravelDetails
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
	public function userLogin(UserLogin $userLogin): self
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
	public function setUserLogin(UserLogin $userLogin): void
	{
		$this->userLogin = $userLogin;
	}

	/**
	 * This is the cardholder login information.
	 * 
	 * @return UserLogin
	 */
	public function getUserLogin(): UserLogin
	{
		return $this->userLogin;
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
	 * These are the browser details. <b>Note:<b> This object is not required
     * if the Paysafe SDK is used for device fingerprinting.
	 * 
	 * @return BrowserDetails
	 */
	public function getBrowserDetails(): BrowserDetails
	{
		return $this->browserDetails;
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
	 * This is the date and time the request was processed. The ISO 8601 date format is expected,
     * i.e., YYYY-MM-DD-THH:MM:SSZ.
	 * 
	 * @return string
	 */
	public function getTxnTime(): string
	{
		return $this->txnTime;
	}

	/**
	 * Builder function for maxAuthorizationsForInstalmentPayment
	 * 
	 * @param int $maxAuthorizationsForInstalmentPayment
	 * 
	 * @return $this
	 */
	public function maxAuthorizationsForInstalmentPayment(int $maxAuthorizationsForInstalmentPayment): self
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
	public function setMaxAuthorizationsForInstalmentPayment(int $maxAuthorizationsForInstalmentPayment): void
	{
		$this->maxAuthorizationsForInstalmentPayment = $maxAuthorizationsForInstalmentPayment;
	}

	/**
	 * This is the maxAuthorizationsForInstalmentPayment of the request, in minor units.<br />
	 * minimum: 1 <br />
	 * maximum: 999
	 * 
	 * @return int
	 */
	public function getMaxAuthorizationsForInstalmentPayment(): int
	{
		return $this->maxAuthorizationsForInstalmentPayment;
	}

	/**
	 * Builder function for electronicDelivery
	 * 
	 * @param ElectronicDelivery $electronicDelivery
	 * 
	 * @return $this
	 */
	public function electronicDelivery(ElectronicDelivery $electronicDelivery): self
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
	public function setElectronicDelivery(ElectronicDelivery $electronicDelivery): void
	{
		$this->electronicDelivery = $electronicDelivery;
	}

	/**
	 * Get electronicDelivery
	 * 
	 * @return ElectronicDelivery
	 */
	public function getElectronicDelivery(): ElectronicDelivery
	{
		return $this->electronicDelivery;
	}

	/**
	 * Builder function for initialPurchaseTime
	 * 
	 * @param string $initialPurchaseTime
	 * 
	 * @return $this
	 */
	public function initialPurchaseTime(string $initialPurchaseTime): self
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
	public function setInitialPurchaseTime(string $initialPurchaseTime): void
	{
		$this->initialPurchaseTime = $initialPurchaseTime;
	}

	/**
	 * This is the date and time of the purchase. The ISO 8601 date format is expected, i.e., YYYY-MM-DD-THH:MM:SSZ.
     * <b>Note:<b> This element is required only
	 * if messageCategory=NON_PAYMENT and authenticationPurpose=INSTALMENT_TRANSACTION or RECURRING_TRANSACTION.
	 * 
	 * @return string
	 */
	public function getInitialPurchaseTime(): string
	{
		return $this->initialPurchaseTime;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ThreeDs {" . PHP_EOL
			. "    id: " . $this->toIndentedString($this->id) . PHP_EOL
			. "    deviceFingerprintingId: " . $this->toIndentedString($this->deviceFingerprintingId) . PHP_EOL
			. "    merchantUrl: " . $this->toIndentedString($this->merchantUrl) . PHP_EOL
			. "    deviceChannel: " . $this->toIndentedString($this->deviceChannel) . PHP_EOL
			. "    requestorChallengePreference: "
            . $this->toIndentedString($this->requestorChallengePreference) . PHP_EOL
			. "    messageCategory: " . $this->toIndentedString($this->messageCategory) . PHP_EOL
			. "    transactionIntent: " . $this->toIndentedString($this->transactionIntent) . PHP_EOL
			. "    authenticationPurpose: " . $this->toIndentedString($this->authenticationPurpose) . PHP_EOL
			. "    billingCycle: " . $this->toIndentedString($this->billingCycle) . PHP_EOL
			. "    orderItemDetails: " . $this->toIndentedString($this->orderItemDetails) . PHP_EOL
			. "    purchasedGiftCardDetails: " . $this->toIndentedString($this->purchasedGiftCardDetails) . PHP_EOL
			. "    userAccountDetails: " . $this->toIndentedString($this->userAccountDetails) . PHP_EOL
			. "    priorThreeDSAuthentication: "
            . $this->toIndentedString($this->priorThreeDSAuthentication) . PHP_EOL
			. "    shippingDetailsUsage: " . $this->toIndentedString($this->shippingDetailsUsage) . PHP_EOL
			. "    suspiciousAccountActivity: "
            . $this->toIndentedString($this->suspiciousAccountActivity) . PHP_EOL
			. "    totalPurchasesSixMonthCount: "
            . $this->toIndentedString($this->totalPurchasesSixMonthCount) . PHP_EOL
			. "    transactionCountForPreviousDay: "
            . $this->toIndentedString($this->transactionCountForPreviousDay) . PHP_EOL
			. "    transactionCountForPreviousYear: "
            . $this->toIndentedString($this->transactionCountForPreviousYear) . PHP_EOL
			. "    travelDetails: " . $this->toIndentedString($this->travelDetails) . PHP_EOL
			. "    userLogin: " . $this->toIndentedString($this->userLogin) . PHP_EOL
			. "    browserDetails: " . $this->toIndentedString($this->browserDetails) . PHP_EOL
			. "    txnTime: " . $this->toIndentedString($this->txnTime) . PHP_EOL
			. "    maxAuthorizationsForInstalmentPayment: "
            . $this->toIndentedString($this->maxAuthorizationsForInstalmentPayment) . PHP_EOL
			. "    electronicDelivery: " . $this->toIndentedString($this->electronicDelivery) . PHP_EOL
			. "    initialPurchaseTime: " . $this->toIndentedString($this->initialPurchaseTime) . PHP_EOL
			. "}";
	}
}
