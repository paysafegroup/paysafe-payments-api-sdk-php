<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * 	
Details of the interac E-Transfer used for the transaction. 
 */
class Interac extends BaseModel
{
	const TRANSFER_TYPE_ALIAS_REGULAR = 'ALIAS_REGULAR';
	const TRANSFER_TYPE_ALIAS_AUTODEPOSIT = 'ALIAS_AUTODEPOSIT';

	const FRAUD_STATUS_CONFIRM_FRAUD = 'CONFIRM_FRAUD';
	const FRAUD_STATUS_CONFIRM_LEGITIMATE = 'CONFIRM_LEGITIMATE';
	const FRAUD_STATUS_SCAM = 'SCAM';
	const FRAUD_STATUS_PRESUME_LEGITIMATE = 'PRESUME_LEGITIMATE';
	const FRAUD_STATUS_SUSPICIOUS = 'SUSPICIOUS';

	const FRAUD_TYPE_ACCOUNT_TAKEOVER = 'ACCOUNT_TAKEOVER';
	const FRAUD_TYPE_BAD_DEPOSIT = 'BAD_DEPOSIT';
	const FRAUD_TYPE_FIRST_PARTY_FRAUD = 'FIRST_PARTY_FRAUD';
	const FRAUD_TYPE_INTERCEPTED_PAYMENT = 'INTERCEPTED_PAYMENT';
	const FRAUD_TYPE_MERCHANT_DISPUTE = 'MERCHANT_DISPUTE';
	const FRAUD_TYPE_FAMILY_FRIEND_FRAUD = 'FAMILY_FRIEND_FRAUD';
	const FRAUD_TYPE_BUSINESS_EMAIL_COMPROMISE = 'BUSINESS_EMAIL_COMPROMISE';
	const FRAUD_TYPE_VENDOR_EMAIL_COMPROMISE = 'VENDOR_EMAIL_COMPROMISE';
	const FRAUD_TYPE_MALWARE = 'MALWARE';
	const FRAUD_TYPE_APPLICATION_FRAUD = 'APPLICATION_FRAUD';
	const FRAUD_TYPE_FRAUD_BUSINESS = 'FRAUD_BUSINESS';
	const FRAUD_TYPE_OTHER = 'OTHER';

	const METHOD_SEND_MONEY = 'SEND_MONEY';

	/**
	 * This is the merchant's unique identifier of the customer. Customer/end user email id or phone number,
     * from whom money has to be collected.
	 * Example: suresh@example.com
	 */
	private string $consumerId;


	/**
	 * Default value is EMAIL. To pass mobile number we 
	 * have to specify the type as PHONE. This is needed
	 * for deposit flow (not for withdrawal).
	 * Example: EMAIL
	 */
	private string $type;

	/**
	 * When customer is not registered for auto-deposit at interac online then Merchant
     * has to pass "question" parameter Mandatory in non-autodeposit withdrawal Payment Handle request flow.
	 * Example: what is your name?
	 */
	private string $question;

	/**
	 * When customer is not registered for auto-deposit at interac online then Merchant
     * has to pass "answer" parameter Mandatory in non-autodeposit withdrawal Payment Handle request flow.
	 * Example: suresh
	 */
	private string $answer;

	/**
	 * This parameter is used to to identify if user is registered for Interac E-Transfer.
	 */
	private string $transferType;

	/**
	 * Maximum amount that user can transfer.
	 */
	private int $maxAmount;


	/**
	 * This is the status of the Standalone Interac's Credit call response.
	 * 
	 * Possible values for the fraud status:
	 * 
	 * - CONFIRM_FRAUD - payment is confirmed fraud
	 * 
	 * - CONFIRM_LEGITIMATE - payment is confirmed legitimate
	 * 
	 * - SCAM - payment is scam
	 * 
	 * - PRESUME_LEGITIMATE - payment is presume legitimate
	 * 
	 * - SUSPICIOUS - payment is suspicious
	 */
	private string $fraudStatus;


	/**
	 * This is the type of fraudulent transaction that was carried out with the intention of financial gain.
	 * 
	 * Possible values for the fraud type:
	 * 
	 * - ACCOUNT_TAKEOVER - Account Takeover
	 * 
	 * - BAD_DEPOSIT - Proceeds of Bad Deposit
	 * 
	 * - FIRST_PARTY_FRAUD - First Party Fraud
	 * 
	 * - INTERCEPTED_PAYMENT - Intercepted Transfer
	 * 
	 * - MERCHANT_DISPUTE - Merchant Dispute
	 * 
	 * - FAMILY_FRIEND_FRAUD - Family/Friendly Fraud
	 * 
	 * - BUSINESS_EMAIL_COMPROMISE - Business Email Compromise
	 * 
	 * - VENDOR_EMAIL_COMPROMISE - Vendor Email Compromise
	 * 
	 * - MALWARE - Malware
	 * 
	 * - APPLICATION_FRAUD - Application Fraud
	 * 
	 * - FRAUD_BUSINESS - Fraudulent Business
	 * 
	 * - OTHER - Other fraud type
	 */
	private string $fraudType;

	/**
	 * It is the Payment Reference Number at interac E-Transfer.
	 * Example: cefa75308b000d6e12a0
	 */
	private string $paymentReference;

	/**
	 * Interac E-Transfer transaction type.
	 */
	private string $method;

	/**
	 * Interac E-Transfer transaction expiry time in minutes.
	 */
	private int $paymentRefExpiryMinutes;


	/**
	 * Builder function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return Interac
	 */
	public function consumerId(string $consumerId): self
	{
		$this->setConsumerId($consumerId);
		
		return $this;
	}
	/**
	 * Setter function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return void
	 */
	public function setConsumerId(string $consumerId): void
	{
		$this->consumerId = $consumerId;
	}
	/**
	 * Getter function for consumerId
	 * 
	 * @return string
	 */
	public function getConsumerId(): string
	{
		return $this->consumerId;
	}

	/**
	 * Builder function for type
	 * 
	 * @param string $type
	 * 
	 * @return Interac
	 */
	public function type(string $type): self
	{
		$this->setType($type);
		
		return $this;
	}
	/**
	 * Setter function for type
	 * 
	 * @param string $type
	 * 
	 * @return void
	 */
	public function setType(string $type): void
	{
		$this->type = $type;
	}
	/**
	 * Getter function for type
	 * 
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * Builder function for question
	 * 
	 * @param string $question
	 * 
	 * @return Interac
	 */
	public function question(string $question): self
	{
		$this->setQuestion($question);
		
		return $this;
	}
	/**
	 * Setter function for question
	 * 
	 * @param string $question
	 * 
	 * @return void
	 */
	public function setQuestion(string $question): void
	{
		$this->question = $question;
	}
	/**
	 * Getter function for question
	 * 
	 * @return string
	 */
	public function getQuestion(): string
	{
		return $this->question;
	}

	/**
	 * Builder function for answer
	 * 
	 * @param string $answer
	 * 
	 * @return Interac
	 */
	public function answer(string $answer): self
	{
		$this->setAnswer($answer);
		
		return $this;
	}
	/**
	 * Setter function for answer
	 * 
	 * @param string $answer
	 * 
	 * @return void
	 */
	public function setAnswer(string $answer): void
	{
		$this->answer = $answer;
	}
	/**
	 * Getter function for answer
	 * 
	 * @return string
	 */
	public function getAnswer(): string
	{
		return $this->answer;
	}

	/**
	 * Builder function for transferType
	 * 
	 * @param string $transferType
	 * 
	 * @return Interac
	 */
	public function transferType(string $transferType): self
	{
		$this->setTransferType($transferType);
		
		return $this;
	}
	/**
	 * Setter function for transferType
	 * 
	 * @param string $transferType
	 * 
	 * @return void
	 */
	public function setTransferType(string $transferType): void
	{
		$this->transferType = $transferType;
	}
	/**
	 * Getter function for transferType
	 * 
	 * @return string
	 */
	public function getTransferType(): string
	{
		return $this->transferType;
	}

	/**
	 * Builder function for maxAmount
	 * 
	 * @param int $maxAmount
	 * 
	 * @return Interac
	 */
	public function maxAmount(int $maxAmount): self
	{
		$this->setMaxAmount($maxAmount);
		
		return $this;
	}
	/**
	 * Setter function for maxAmount
	 * 
	 * @param int $maxAmount
	 * 
	 * @return void
	 */
	public function setMaxAmount(int $maxAmount): void
	{
		$this->maxAmount = $maxAmount;
	}
	/**
	 * Getter function for maxAmount
	 * 
	 * @return int
	 */
	public function getMaxAmount(): int
	{
		return $this->maxAmount;
	}

	/**
	 * Builder function for fraudStatus
	 * 
	 * @param string $fraudStatus
	 * 
	 * @return Interac
	 */
	public function fraudStatus(string $fraudStatus): self
	{
		$this->setFraudStatus($fraudStatus);
		
		return $this;
	}
	/**
	 * Setter function for fraudStatus
	 * 
	 * @param string $fraudStatus
	 * 
	 * @return void
	 */
	public function setFraudStatus(string $fraudStatus): void
	{
		$this->fraudStatus = $fraudStatus;
	}
	/**
	 * Getter function for fraudStatus
	 * 
	 * @return string
	 */
	public function getFraudStatus(): string
	{
		return $this->fraudStatus;
	}

	/**
	 * Builder function for fraudType
	 * 
	 * @param string $fraudType
	 * 
	 * @return Interac
	 */
	public function fraudType(string $fraudType): self
	{
		$this->setFraudType($fraudType);
		
		return $this;
	}
	/**
	 * Setter function for fraudType
	 * 
	 * @param string $fraudType
	 * 
	 * @return void
	 */
	public function setFraudType(string $fraudType): void
	{
		$this->fraudType = $fraudType;
	}
	/**
	 * Getter function for fraudType
	 * 
	 * @return string
	 */
	public function getFraudType(): string
	{
		return $this->fraudType;
	}

	/**
	 * Builder function for paymentReference
	 * 
	 * @param string $paymentReference
	 * 
	 * @return Interac
	 */
	public function paymentReference(string $paymentReference): self
	{
		$this->setPaymentReference($paymentReference);
		
		return $this;
	}
	/**
	 * Setter function for paymentReference
	 * 
	 * @param string $paymentReference
	 * 
	 * @return void
	 */
	public function setPaymentReference(string $paymentReference): void
	{
		$this->paymentReference = $paymentReference;
	}
	/**
	 * Getter function for paymentReference
	 * 
	 * @return string
	 */
	public function getPaymentReference(): string
	{
		return $this->paymentReference;
	}

	/**
	 * Builder function for method
	 * 
	 * @param string $method
	 * 
	 * @return Interac
	 */
	public function method(string $method): self
	{
		$this->setMethod($method);
		
		return $this;
	}
	/**
	 * Setter function for method
	 * 
	 * @param string $method
	 * 
	 * @return void
	 */
	public function setMethod(string $method): void
	{
		$this->method = $method;
	}
	/**
	 * Getter function for method
	 * 
	 * @return string
	 */
	public function getMethod(): string
	{
		return $this->method;
	}

	/**
	 * Builder function for paymentRefExpiryMinutes
	 * 
	 * @param int $paymentRefExpiryMinutes
	 * 
	 * @return Interac
	 */
	public function paymentRefExpiryMinutes(int $paymentRefExpiryMinutes): self
	{
		$this->setPaymentRefExpiryMinutes($paymentRefExpiryMinutes);
		
		return $this;
	}
	/**
	 * Setter function for paymentRefExpiryMinutes
	 * 
	 * @param int $paymentRefExpiryMinutes
	 * 
	 * @return void
	 */
	public function setPaymentRefExpiryMinutes(int $paymentRefExpiryMinutes): void
	{
		$this->paymentRefExpiryMinutes = $paymentRefExpiryMinutes;
	}
	/**
	 * Getter function for paymentRefExpiryMinutes
	 * 
	 * @return int
	 */
	public function getPaymentRefExpiryMinutes(): int
	{
		return $this->paymentRefExpiryMinutes;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Interac {" . PHP_EOL . 
			"	consumerId: " . $this->toIndentedString($this->consumerId) . PHP_EOL .
			"	type: " . $this->toIndentedString($this->type) . PHP_EOL .
			"	question: " . $this->toIndentedString($this->question) . PHP_EOL .
			"	answer: " . $this->toIndentedString($this->answer) . PHP_EOL .
			"	transferType: " . $this->toIndentedString($this->transferType) . PHP_EOL .
			"	maxAmount: " . $this->toIndentedString($this->maxAmount) . PHP_EOL .
			"	fraudStatus: " . $this->toIndentedString($this->fraudStatus) . PHP_EOL .
			"	fraudType: " . $this->toIndentedString($this->fraudType) . PHP_EOL .
			"	paymentReference: " . $this->toIndentedString($this->paymentReference) . PHP_EOL .
			"	method: " . $this->toIndentedString($this->method) . PHP_EOL .
			"	paymentRefExpiryMinutes: " . $this->toIndentedString($this->paymentRefExpiryMinutes) . PHP_EOL .
		"}";
	}
}
