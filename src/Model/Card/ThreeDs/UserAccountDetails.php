<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the user account details from the merchant website.
 * <ul>
 *   <li>
 *     <b>addCardAttemptsForLastDay:</b> This is the number of Add Card attempts in the last 24 hours.
 *   </li>
 *   <li>
 *     <b>changedDate:</b> This is the date that the cardholder’s account with the 3DS Requestor was last changed.
 *     The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
 *   </li>
 *   <li>
 *     <b>changedRange:</b>
 *      This is the length of time between the most recent change to the cardholder’s account information
 *     and the API call of the current transaction. <br />
 *     <i>Allowed values: DURING_TRANSACTION, LESS_THAN_THIRTY_DAYS, THIRTY_TO_SIXTY_DAYS, MORE_THAN_SIXTY_DAYS</i>
 *   </li>
 *   <li>
 *     <b>createdDate:</b> This is the date when the cardholder opened the account with the 3DS Requestor.
 *     The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
 *   </li>
 *   <li>
 *     <b>createdRange:</b>
 *      This is the length of time between the cardholder opening the account with the 3DS Requestor
 *     and the API call of the current transaction. <br />
 *     <i>Allowed values: NO_ACCOUNT, DURING_TRANSACTION,
 *      LESS_THAN_THIRTY_DAYS, THIRTY_TO_SIXTY_DAYS, MORE_THAN_SIXTY_DAYS</i>
 *   </li>
 *   <li>
 *     <b>passwordChangedDate:</b> This is the date when the cardholder’s account was reset
 *      or the password was changed.
 *     The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
 *   </li>
 *   <li>
 *     <b>passwordChangedRange:</b> This is the length of time between
 *      the most recent password change or cardholder account reset
 *     and the API call of the current transaction. <br />
 *     <i>Allowed values: NO_CHANGE, DURING_TRANSACTION, LESS_THAN_THIRTY_DAYS,
 *      THIRTY_TO_SIXTY_DAYS, MORE_THAN_SIXTY_DAYS</i>
 *   </li>
 *   <li>
 *     <b>suspiciousAccountActivity:</b> This indicates whether the 3DS Requestor has experienced suspicious activity,
 *     including previous fraud, on the cardholder account.
 *   </li>
 *   <li>
 *     <b>totalPurchasesSixMonthCount:</b>
 *      This is the total number of purchases from this cardholder account in the previous six months.
 *   </li>
 *   <li>
 *     <b>transactionCountForPreviousDay:</b>
 *      This is the number of transactions (successful and abandoned) for this cardholder account
 *     with the 3DS Requestor across all payment accounts in the previous 24 hours.
 *   </li>
 *   <li>
 *     <b>transactionCountForPreviousYear:</b>
 *      This is the number of transactions (successful and abandoned) for this cardholder account
 *     with the 3DS Requestor across all payment accounts in the previous year.
 *   </li>
 *   <li>
 *     <b>shippingDetailsUsage:</b> This is the shipping usage information.
 *   </li>
 *   <li>
 *     <b>userLogin:</b> This is the cardholder login information.
 *   </li>
 *   <li>
 *     <b>paymentAccountDetails:</b> These are the details of the current payment account of the cardholder.
 *   </li>
 *   <li>
 *     <b>priorThreeDSAuthentication:</b>
 *      This is the previous authentication information used with current merchant, cardholder, and card.
 *   </li>
 *   <li>
 *     <b>travelDetails:</b> These are the Amex-specific travel details.
 *   </li>
 * </ul>
 */
class UserAccountDetails extends BaseModel
{

	private int $addCardAttemptsForLastDay;
	private string $changedDate;
	private string $changedRange;
	private string $createdDate;
	private string $createdRange;
	private string $passwordChangedDate;
	private string $passwordChangedRange;
	private bool $suspiciousAccountActivity;
	private int $totalPurchasesSixMonthCount;
	private int $transactionCountForPreviousDay;
	private int $transactionCountForPreviousYear;
	private ShippingDetailsUsage $shippingDetailsUsage;
	private UserLogin $userLogin;
	private PaymentAccountDetails $paymentAccountDetails;
	private PriorThreeDsAuthentication $priorThreeDSAuthentication;
	private TravelDetails $travelDetails;

	/**
	 * Builder function for addCardAttemptsForLastDay
	 * 
	 * @param int $addCardAttemptsForLastDay
	 * 
	 * @return $this
	 */
	public function addCardAttemptsForLastDay(int $addCardAttemptsForLastDay): self
	{
		$this->setAddCardAttemptsForLastDay($addCardAttemptsForLastDay);
		
		return $this;
	}

	/**
	 * Setter function for addCardAttemptsForLastDay
	 * 
	 * @param int $addCardAttemptsForLastDay
	 * 
	 * @return void
	 */
	public function setAddCardAttemptsForLastDay(int $addCardAttemptsForLastDay): void
	{
		$this->addCardAttemptsForLastDay = $addCardAttemptsForLastDay;
	}

	/**
	 * This is the number of Add Card attempts in the last 24 hours. <br />
	 * Maximum: 999
	 * 
	 * @return int
	 */
	public function getAddCardAttemptsForLastDay(): int
	{
		return $this->addCardAttemptsForLastDay;
	}

	/**
	 * Builder function for changedDate
	 * 
	 * @param string $changedDate
	 * 
	 * @return $this
	 */
	public function changedDate(string $changedDate): self
	{
		$this->setChangedDate($changedDate);
		
		return $this;
	}

	/**
	 * Setter function for changedDate
	 * 
	 * @param string $changedDate
	 * 
	 * @return void
	 */
	public function setChangedDate(string $changedDate): void
	{
		$this->changedDate = $changedDate;
	}

	/**
	 * This is the date that the cardholder’s account with the 3DS Requestor was last changed.
     * The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
	 * 
	 * @return string
	 */
	public function getChangedDate(): string
	{
		return $this->changedDate;
	}

	/**
	 * Builder function for changedRange
	 * 
	 * @param string $changedRange
	 * 
	 * @return $this
	 */
	public function changedRange(string $changedRange): self
	{
		$this->setChangedRange($changedRange);
		
		return $this;
	}

	/**
	 * Setter function for changedRange
	 * 
	 * @param string $changedRange
	 * 
	 * @return void
	 */
	public function setChangedRange(string $changedRange): void
	{
		$this->changedRange = $changedRange;
	}

	/**
	 * This is the length of time between the most recent change to the cardholder’s account information
     * and the API call of the current transaction.
	 * 
	 * @return string
	 */
	public function getChangedRange(): string
	{
		return $this->changedRange;
	}

	/**
	 * Builder function for createdDate
	 * 
	 * @param string $createdDate
	 * 
	 * @return $this
	 */
	public function createdDate(string $createdDate): self
	{
		$this->setCreatedDate($createdDate);
		
		return $this;
	}

	/**
	 * Setter function for createdDate
	 * 
	 * @param string $createdDate
	 * 
	 * @return void
	 */
	public function setCreatedDate(string $createdDate): void
	{
		$this->createdDate = $createdDate;
	}

	/**
	 * This is the date when the cardholder opened the account with the 3DS Requestor.
     * The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
	 * 
	 * @return string
	 */
	public function getCreatedDate(): string
	{
		return $this->createdDate;
	}

	/**
	 * Builder function for createdRange
	 * 
	 * @param string $createdRange
	 * 
	 * @return $this
	 */
	public function createdRange(string $createdRange): self
	{
		$this->setCreatedRange($createdRange);
		
		return $this;
	}

	/**
	 * Setter function for createdRange
	 * 
	 * @param string $createdRange
	 * 
	 * @return void
	 */
	public function setCreatedRange(string $createdRange): void
	{
		$this->createdRange = $createdRange;
	}

	/**
	 * This is the length of time between the cardholder opening the account with the 3DS Requestor
     * and the API call of the current transaction.
	 * 
	 * @return string
	 */
	public function getCreatedRange(): string
	{
		return $this->createdRange;
	}

	/**
	 * Builder function for passwordChangedDate
	 * 
	 * @param string $passwordChangedDate
	 * 
	 * @return $this
	 */
	public function passwordChangedDate(string $passwordChangedDate): self
	{
		$this->setPasswordChangedDate($passwordChangedDate);
		
		return $this;
	}

	/**
	 * Setter function for passwordChangedDate
	 * 
	 * @param string $passwordChangedDate
	 * 
	 * @return void
	 */
	public function setPasswordChangedDate(string $passwordChangedDate): void
	{
		$this->passwordChangedDate = $passwordChangedDate;
	}

	/**
	 * This is the date when the cardholder’s account was reset or the password was changed.
     * The ISO 8601 date format is expected, i.e., YYYY-MM-DD.
	 * 
	 * @return string
	 */
	public function getPasswordChangedDate(): string
	{
		return $this->passwordChangedDate;
	}

	/**
	 * Builder function for passwordChangedRange
	 * 
	 * @param string $passwordChangedRange
	 * 
	 * @return $this
	 */
	public function passwordChangedRange(string $passwordChangedRange): self
	{
		$this->setPasswordChangedRange($passwordChangedRange);
		
		return $this;
	}

	/**
	 * Setter function for passwordChangedRange
	 * 
	 * @param string $passwordChangedRange
	 * 
	 * @return void
	 */
	public function setPasswordChangedRange(string $passwordChangedRange): void
	{
		$this->passwordChangedRange = $passwordChangedRange;
	}

	/**
	 * This is the length of time between the most recent password change or cardholder account reset
     * and the API call of the current transaction.
	 * 
	 * @return string
	 */
	public function getPasswordChangedRange(): string
	{
		return $this->passwordChangedRange;
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
	 * This is the total number of purchases from this cardholder account in the previous six months. <br />
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
	 * This is the number of transactions (successful and abandoned) for this cardholder account with
     * the 3DS Requestor across all payment accounts in
	 * the previous 24 hours. <br />
	 * Maximum: 999
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
	 * This is the number of transactions (successful and abandoned) for this cardholder account with
     * the 3DS Requestor across all payment accounts
	 * in the previous year. <br />
	 * Maximum: 999
	 * 
	 * @return int
	 */
	public function getTransactionCountForPreviousYear(): int
	{
		return $this->transactionCountForPreviousYear;
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
	 * Builder function for paymentAccountDetails
	 * 
	 * @param PaymentAccountDetails $paymentAccountDetails
	 * 
	 * @return $this
	 */
	public function paymentAccountDetails(PaymentAccountDetails $paymentAccountDetails): self
	{
		$this->setPaymentAccountDetails($paymentAccountDetails);
		
		return $this;
	}

	/**
	 * Setter function for paymentAccountDetails
	 * 
	 * @param PaymentAccountDetails $paymentAccountDetails
	 * 
	 * @return void
	 */
	public function setPaymentAccountDetails(PaymentAccountDetails $paymentAccountDetails): void
	{
		$this->paymentAccountDetails = $paymentAccountDetails;
	}

	/**
	 * These are the details of the current payment account of the cardholder.
	 * 
	 * @return PaymentAccountDetails
	 */
	public function getPaymentAccountDetails(): PaymentAccountDetails
	{
		return $this->paymentAccountDetails;
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
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class UserAccountDetails {" . PHP_EOL
			. "    addCardAttemptsForLastDay: "
            . $this->toIndentedString($this->addCardAttemptsForLastDay) . PHP_EOL
			. "    changedDate: " . $this->toIndentedString($this->changedDate) . PHP_EOL
			. "    changedRange: " . $this->toIndentedString($this->changedRange) . PHP_EOL
			. "    createdDate: " . $this->toIndentedString($this->createdDate) . PHP_EOL
			. "    createdRange: " . $this->toIndentedString($this->createdRange) . PHP_EOL
			. "    passwordChangedDate: " . $this->toIndentedString($this->passwordChangedDate) . PHP_EOL
			. "    passwordChangedRange: " . $this->toIndentedString($this->passwordChangedRange) . PHP_EOL
			. "    suspiciousAccountActivity: "
            . $this->toIndentedString($this->suspiciousAccountActivity) . PHP_EOL
			. "    totalPurchasesSixMonthCount: "
            . $this->toIndentedString($this->totalPurchasesSixMonthCount) . PHP_EOL
			. "    transactionCountForPreviousDay: "
            . $this->toIndentedString($this->transactionCountForPreviousDay) . PHP_EOL
			. "    transactionCountForPreviousYear: "
            . $this->toIndentedString($this->transactionCountForPreviousYear) . PHP_EOL
			. "    shippingDetailsUsage: " . $this->toIndentedString($this->shippingDetailsUsage) . PHP_EOL
			. "    userLogin: " . $this->toIndentedString($this->userLogin) . PHP_EOL
			. "    paymentAccountDetails: " . $this->toIndentedString($this->paymentAccountDetails) . PHP_EOL
			. "    priorThreeDSAuthentication: "
            . $this->toIndentedString($this->priorThreeDSAuthentication) . PHP_EOL
			. "    travelDetails: " . $this->toIndentedString($this->travelDetails) . PHP_EOL
			. "}";
	}
}
