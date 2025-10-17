<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Payment;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\AccordD;
use Paysafe\PhpSdk\Model\Card\AcquirerData;
use Paysafe\PhpSdk\Model\Card\FundingTransaction;
use Paysafe\PhpSdk\Model\Card\Level2Level3;
use Paysafe\PhpSdk\Model\Card\MerchantDescriptor;
use Paysafe\PhpSdk\Model\Card\Recipient;
use Paysafe\PhpSdk\Model\Common\PaymentFacilitator\PaymentFacilitator;
use Paysafe\PhpSdk\Model\Common\StoredCredential;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\AirlineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Carrental\CarRentalDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Cruise\CruiselineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Lodging\LodgingDetails;
use Paysafe\PhpSdk\Model\Lpm\Splitpay;

/**
 * Represents the body of a payment request, containing all the necessary details for processing a transaction.
 * <p>The {@code PaymentReqBody} class includes fields related to the payment amount, merchant information,
 * customer data, transaction details, and specific travel or service-related details.</p>
 * <p>Key fields:</p>
 * <ul>
 *   <li><strong>merchantRefNum:</strong> The merchant's unique reference number for the transaction.</li>
 *   <li><strong>amount:</strong> The amount for the transaction, expressed in minor units.</li>
 *   <li><strong>dupCheck:</strong> This validates that this request is not a duplicate.
 *   A duplicate request is when the merchantRefNum has already been
 *      used in a previous request within the past 90 days.</li>
 *   <li><strong>settleWithAuth:</strong> A flag indicating whether
 *      the transaction should be settled with authorization.</li>
 *   <li><strong>paymentHandleToken:</strong> The token that represents a payment handle for the transaction.</li>
 *   <li><strong>customerIp:</strong> The IP address of the customer making the payment.</li>
 *   <li><strong>currencyCode:</strong> The currency code used for the transaction.</li>
 *   <li><strong>preAuth:</strong> A flag indicating whether this is a pre-authorization transaction.</li>
 *   <li><strong>description:</strong> A description of the transaction.</li>
 *   <li><strong>level2Level3TransactionDetails:</strong> Additional transaction
 *      details for Level 2 and Level 3 processing.</li>
 *   <li><strong>financingDetails:</strong> Details related to financing options for the transaction.</li>
 *   <li><strong>recipient:</strong> Information about the recipient of the payment.</li>
 *   <li><strong>splitPay:</strong> Details about how the payment should be split across multiple recipients.</li>
 *   <li><strong>StoredCredential:</strong> Details of the stored credentials for recurring payments.</li>
 *   <li><strong>airlineTravelDetails:</strong> Details related to airline travel transactions.</li>
 *   <li><strong>fundingTransaction:</strong> Details for a funding transaction in the payment request.</li>
 *   <li><strong>cruiseLineTravelDetails:</strong> Details related to cruise line travel transactions.</li>
 *   <li><strong>lodgingDetails:</strong> Details related to lodging transactions, including hotel stays.</li>
 *   <li><strong>carRentalDetails:</strong> Details related to car rental transactions.</li>
 *   <li><strong>paymentFacilitator:</strong> Information about the payment
 *      facilitator handling the transaction.</li>
 *   <li><strong>merchantDescriptor:</strong> Describes the merchant details for the transaction.</li>
 *   <li><strong>acquirerData:</strong> Data from the acquirer associated with the transaction.</li>
 * </ul>
 */
class PaymentRequest extends BaseModel
{

	private string $merchantRefNum;
	private int $amount;
	private bool $dupCheck;
	private bool $settleWithAuth;
	private string $paymentHandleToken;
	private string $customerIp;
	private string $currencyCode;
	private bool $preAuth;
	private string $description;
	private Level2Level3 $level2level3;
	private AccordD $accordD;
	private Recipient $recipient;
	private Splitpay $splitpay;
	private StoredCredential $storedCredentialDetails;
	private AirlineTravelDetails $airlineTravelDetails;
	private FundingTransaction $fundingTransaction;
	private CruiselineTravelDetails $cruiselineTravelDetails;
	private LodgingDetails $lodgingDetails;
	private CarRentalDetails $carRentalDetails;
	private PaymentFacilitator $paymentFacilitator;
	private MerchantDescriptor $merchantDescriptor;
	private AcquirerData $acquirerData;
	private array $keywords;
	private array $additionalParameters;

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
	 * This is the amount of the request, in minor units.
     * For example, to process US $10.99, this value  should be 1099.
	 * <b>Note:<b> The amount specified in the Payment request must match the amount specified
     * in the Payment Handle request from which the
	 * paymentHandleToken is taken.
	 * maximum: 99999999999
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
	 * This validates that this request is not a duplicate.
     * A duplicate request is when the merchantRefNum has already been used in a previous request
	 * within the past 90 days.
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
	 * - false – The request is not settled <br />
	 * - true – The request is settled <br />
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
     * the currencyCode specified in the Payment Handle request from
	 * which the paymentHandleToken is taken.
	 * 
	 * @return string
	 */
	public function getCurrencyCode(): string
	{
		return $this->currencyCode;
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
	 * <b>Note:<b> You should use the preAuth element in cases where you
     * are not sure that you can fully settle the Authorization within 4 days.
	 * Contact your account manager for more information.
	 * 
	 * @return bool
	 */
	public function getPreAuth(): bool
	{
		return $this->preAuth;
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
	 * This is a description of the transaction, provided by the merchant.
	 * 
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * Builder function for level2level3
	 * 
	 * @param Level2Level3 $level2level3
	 * 
	 * @return $this
	 */
	public function level2level3(Level2Level3 $level2level3): self
	{
		$this->setLevel2level3($level2level3);
		
		return $this;
	}

	/**
	 * Setter function for level2level3
	 * 
	 * @param Level2Level3 $level2level3
	 * 
	 * @return void
	 */
	public function setLevel2level3(Level2Level3 $level2level3): void
	{
		$this->level2level3 = $level2level3;
	}

	/**
	 * Level 2 and Level 3 (L2/L3) credit card processing refers to certain B2B card transactions
     * for which the merchant might be eligible for
	 * lower credit card interchange rates. The lower rates may be available for merchants
     * who provide more detailed information when processing
	 * card-not-present transactions. In order to be eligible for L2/L3 transactions: <br />
	 * - Your merchant account must be properly configured by Paysafe. <br />
	 * - The BIN of the credit card used for the transaction must be eligible
     *  – typically,these are government-issued credit cards. <br />
	 * <b>Note:<b> Not all processing gateways support this parameter.
     * Contact your account manager for more information.
	 * 
	 * @return Level2Level3
	 */
	public function getLevel2level3(): Level2Level3
	{
		return $this->level2level3;
	}

	/**
	 * Builder function for accordD
	 * 
	 * @param AccordD $accordD
	 * 
	 * @return $this
	 */
	public function accordD(AccordD $accordD): self
	{
		$this->setAccordD($accordD);
		
		return $this;
	}

	/**
	 * Setter function for accordD
	 * 
	 * @param AccordD $accordD
	 * 
	 * @return void
	 */
	public function setAccordD(AccordD $accordD): void
	{
		$this->accordD = $accordD;
	}

	/**
	 * These are parameters for financing plans supported for certain merchant configurations.
     * Include this element only when instructed to do so by
	 * your account manager. <br />
	 * <b>Note:<b> Not all processing gateways support this parameter.
     * Contact your account manager for more information.
	 * 
	 * @return AccordD
	 */
	public function getAccordD(): AccordD
	{
		return $this->accordD;
	}

	/**
	 * Builder function for recipient
	 * 
	 * @param Recipient $recipient
	 * 
	 * @return $this
	 */
	public function recipient(Recipient $recipient): self
	{
		$this->setRecipient($recipient);
		
		return $this;
	}

	/**
	 * Setter function for recipient
	 * 
	 * @param Recipient $recipient
	 * 
	 * @return void
	 */
	public function setRecipient(Recipient $recipient): void
	{
		$this->recipient = $recipient;
	}

	/**
	 * <p>The recipient is deemed to be the person or party who has the contractual
     * relationship with the merchant / financial institution.
	 * This may be different from the cardholder, e.g., in the case of a parent topping up a child's savings account.
	 * Therefore, the fields should not be collected on the same page as cardholder information,
     * but instead be passed in the background from the
	 * merchant's records.</p>
	 * <b>Note:</b> You can include recipient elements in your
     * <a href="https://developer.paysafe.com/en/cards-api/#/operations/authorization">
	 * Authorization request</a> only if your Merchant Category Code is <b>6012</b>
     * and your registered trading address is in the United Kingdom.
	 * <p>All fields are optional. However, scheme fines may apply
     * if data is consistently not supplied and chargebacks persist.
	 * If you have any questions, contact your account manager. </p>
	 * <p>If you are using a payment token for an Authorization request and there is already recipient data
     * for the consumer profile associated with the
	 * payment token, then if you include the recipient object in the Authorization,
     * this data will override the recipient data already in the profile.</p>
	 * <p>If you
     *      <a href="https://developer.paysafe.com/en/cards-api/#/operations/get-authorization">
     *      look up an Authorization request
     *     </a>,
	 * that used the visaAdditionalAuthData parameter (now deprecated),
     * the response will contain the relevant data in both the recipient and the
	 * visaAdditionalAuthData objects.
	 * 
	 * @return Recipient
	 */
	public function getRecipient(): Recipient
	{
		return $this->recipient;
	}

	/**
	 * Builder function for splitpay
	 * 
	 * @param Splitpay $splitpay
	 * 
	 * @return $this
	 */
	public function splitpay(Splitpay $splitpay): self
	{
		$this->setSplitpay($splitpay);
		
		return $this;
	}

	/**
	 * Setter function for splitpay
	 * 
	 * @param Splitpay $splitpay
	 * 
	 * @return void
	 */
	public function setSplitpay(Splitpay $splitpay): void
	{
		$this->splitpay = $splitpay;
	}

	/**
	 * This object should be used only for Splitpay transactions only, an array containing
     * the linked accounts and the amount shared with each.
	 * You must include either amount or percent. However, you cannot include both values.
	 * 
	 * @return Splitpay
	 */
	public function getSplitpay(): Splitpay
	{
		return $this->splitpay;
	}

	/**
	 * Builder function for storedCredentialDetails
	 * 
	 * @param StoredCredential $storedCredentialDetails
	 * 
	 * @return $this
	 */
	public function storedCredentialDetails(StoredCredential $storedCredentialDetails): self
	{
		$this->setStoredCredentialDetails($storedCredentialDetails);
		
		return $this;
	}

	/**
	 * Setter function for storedCredentialDetails
	 * 
	 * @param StoredCredential $storedCredentialDetails
	 * 
	 * @return void
	 */
	public function setStoredCredentialDetails(StoredCredential $storedCredentialDetails): void
	{
		$this->storedCredentialDetails = $storedCredentialDetails;
	}

	/**
	 * The storedCredential object is used to identify authorization requests
     * that use stored credentials for a consumer,
	 * in order to improve authorization rates and reduce fraud. Stored credentials can be used in two cases:<br />
	 * • Using a payment token – An authorization request that uses a paymentToken from the Customer Vault API <br />
	 * • Using a card number – An authorization request that uses a credit card number stored by the merchant. <br />
	 * <b>Notes: </b><br />
	 * • If you use a paymentToken in the authorization request but do not include the storedCredential object,
     * Paysafe will provide
	 * default information taken from Customer Vault data. <br />
	 * • You cannot include both the storedCredential object and the recurring parameter
     * in the same authorization request.Paysafe recommends
	 * using the storedCredential object.  <br />
	 * • The cvv parameter of the [card object] is required when the occurrence parameteris set to INITIAL.
     * However, cvv is not required
	 * when the occurrence parameter is set to SUBSEQUENT. <br />
	 * • The storedCredential object cannot be used for Apple Pay or Google Pay transactions.
	 * 
	 * @return StoredCredential
	 */
	public function getStoredCredentialDetails(): StoredCredential
	{
		return $this->storedCredentialDetails;
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
	 * Contains information about your airline travel. <br />
	 * <b>Notes:</b> <br />
	 * This object is only for Airline Merchants.<br />
	 * This field has to be passed only in case of card transactiions.*
	 * 
	 * @return AirlineTravelDetails
	 */
	public function getAirlineTravelDetails(): AirlineTravelDetails
	{
		return $this->airlineTravelDetails;
	}

	/**
	 * Builder function for fundingTransaction
	 * 
	 * @param FundingTransaction $fundingTransaction
	 * 
	 * @return $this
	 */
	public function fundingTransaction(FundingTransaction $fundingTransaction): self
	{
		$this->setFundingTransaction($fundingTransaction);
		
		return $this;
	}

	/**
	 * Setter function for fundingTransaction
	 * 
	 * @param FundingTransaction $fundingTransaction
	 * 
	 * @return void
	 */
	public function setFundingTransaction(FundingTransaction $fundingTransaction): void
	{
		$this->fundingTransaction = $fundingTransaction;
	}

	/**
	 * <b>Note:<b> Acquirers and processors do not necessarily support all available MCCs; before integrating,
     * you should contact
	 * <a href="https://developer.paysafe.com/en/support/">Integration Support</a> for details.
	 * <p></p>
	 * The fundingTransaction object is used to identify authorization requests
     * that are categorized as funding transactions by the merchant
	 * in order to provide additional information for the purpose of a transaction.
     * It can be used by merchants registered with MCC 4722, 4829,
	 * 6012, 6051, 6211, 6540, 7800, 7801, 7802, 7994, 7995 or 9406.
	 * The relevant value will be assigned automatically by the Payments API as per
     * the merchant registration with card schemes and his applicable MCC.
	 * </p>
	 * More information can be found on
	 * <a href="https://developer.paysafe.com/en/payments-api/#/schemas/fundingTransaction">
     *     Funding Transaction reference
     * </a> page.
	 * 
	 * @return FundingTransaction
	 */
	public function getFundingTransaction(): FundingTransaction
	{
		return $this->fundingTransaction;
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
	 * Contains information about your cruise line travel. <br /> <b>Note:</b>
     * This object is only for Cruise line Merchants.
	 * This field has to be passed only in case of card transactions.
	 * 
	 * @return CruiselineTravelDetails
	 */
	public function getCruiselineTravelDetails(): CruiselineTravelDetails
	{
		return $this->cruiselineTravelDetails;
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
	 * Contains information about lodging details.  <br /> <b>Note:</b> This object is only for Airline Merchants.
	 * This field has to be passed only in case of card transactions.
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
	 * Contains information about your car rental. <br /> <b>Note:</b> This object is only for Car rental Merchants.
	 * This field has to be passed only in case of card transactions.
	 * 
	 * @return CarRentalDetails
	 */
	public function getCarRentalDetails(): CarRentalDetails
	{
		return $this->carRentalDetails;
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
	 * Contains information about Payment facilitator.  <b>Note:<b>
     *     This object is only for Payment facilitator merchants.
	 * 
	 * @return PaymentFacilitator
	 */
	public function getPaymentFacilitator(): PaymentFacilitator
	{
		return $this->paymentFacilitator;
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
	 * For Card payment method only. This is the merchant descriptor that will be displayed on
     * the customer's card or bank statement.
	 * 
	 * @return MerchantDescriptor
	 */
	public function getMerchantDescriptor(): MerchantDescriptor
	{
		return $this->merchantDescriptor;
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
	 * Acquirer data is additional information about your card acquirer,
     * applicable only when you are using Worldpay (VAN) as your acquirer for authorizations.
	 * Contact your account manager for more information.
	 * 
	 * @return AcquirerData
	 */
	public function getAcquirerData(): AcquirerData
	{
		return $this->acquirerData;
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
	 * Convert the given object to string with each line indented by 4 spaces
	 * (except the first line).
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
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class PaymentRequest {" . PHP_EOL
			. "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL
			. "    amount: " . $this->toIndentedString($this->amount) . PHP_EOL
			. "    dupCheck: " . $this->toIndentedString($this->dupCheck) . PHP_EOL
			. "    settleWithAuth: " . $this->toIndentedString($this->settleWithAuth) . PHP_EOL
			. "    paymentHandleToken: " . $this->toIndentedString($this->paymentHandleToken) . PHP_EOL
			. "    customerIp: " . $this->toIndentedString($this->customerIp) . PHP_EOL
			. "    currencyCode: " . $this->toIndentedString($this->currencyCode) . PHP_EOL
			. "    preAuth: " . $this->toIndentedString($this->preAuth) . PHP_EOL
			. "    description: " . $this->toIndentedString($this->description) . PHP_EOL
			. "    level2level3: " . $this->toIndentedString($this->level2level3) . PHP_EOL
			. "    accordD: " . $this->toIndentedString($this->accordD) . PHP_EOL
			. "    recipient: " . $this->toIndentedString($this->recipient) . PHP_EOL
			. "    splitpay: " . $this->toIndentedString($this->splitpay) . PHP_EOL
			. "    storedCredentialDetails: " . $this->toIndentedString($this->storedCredentialDetails) . PHP_EOL
			. "    airlineTravelDetails: " . $this->toIndentedString($this->airlineTravelDetails) . PHP_EOL
			. "    fundingTransaction: " . $this->toIndentedString($this->fundingTransaction) . PHP_EOL
			. "    cruiselineTravelDetails: " . $this->toIndentedString($this->cruiselineTravelDetails) . PHP_EOL
			. "    lodgingDetails: " . $this->toIndentedString($this->lodgingDetails) . PHP_EOL
			. "    carRentalDetails: " . $this->toIndentedString($this->carRentalDetails) . PHP_EOL
			. "    paymentFacilitator: " . $this->toIndentedString($this->paymentFacilitator) . PHP_EOL
			. "    merchantDescriptor: " . $this->toIndentedString($this->merchantDescriptor) . PHP_EOL
			. "    acquirerData: " . $this->toIndentedString($this->acquirerData) . PHP_EOL
			. "    keywords: " . $this->toIndentedString($this->keywords) . PHP_EOL
			. "    additionalParameters: " . $this->toIndentedString($this->additionalParameters) . PHP_EOL
			. "}";
	}
}
