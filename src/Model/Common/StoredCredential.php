<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * The storedCredential object is used to identify [authorization requests] that use stored credentials
 * for a consumer, in order to improve authorization rates and reduce fraud.
 * Stored credentials can be used in two cases:
 * - Using a payment token – An authorization request that uses a paymentToken from the [Customer Vault API]
 * - Using a card number – An authorization request that uses a credit card number stored by the merchant.
 * **Notes:**
 * - If you use a paymentToken in the authorization request but do not include the storedCredential object,
 *      Paysafe will provide default information taken from Customer Vault data.
 * - You cannot include both the storedCredential object and the recurring parameter in the same authorization request.
 *      Paysafe recommends using the storedCredential object.
 * - The cvv parameter of the [card object] is required when the occurrence parameteris set to INITIAL.
 *      However, cvv is not required when the occurrence parameter is set to SUBSEQUENT.
 * - The storedCredential object cannot be used for Apple Pay or Google Pay transactions.
 */
class StoredCredential extends BaseModel
{
	const TYPE_ADHOC = 'ADHOC';
	const TYPE_TOPUP = 'TOPUP';
	const TYPE_RECURRING = 'RECURRING';

	const OCCURRENCE_INITIAL = 'INITIAL';
	const OCCURRENCE_SUBSEQUENT = 'SUBSEQUENT';


	/**
	 * This specifies the type of request being made. 
	 * Possible values are:
	 * 
	 * - ADHOC – Ad hoc consumer-initiated request
	 * 
	 * - TOPUP – Unscheduled merchant-iniitated request when a consumer balance is below a set limit.
	 * 
	 * - RECURRING – Scheduled, merchant-initiated recurring request.
	 * 
	 * **Note:** This value defaults to ADHOC.
	 */
	private string $type = "ADHOC";


	/**
	 * This specifies whether this stored credential request is initial or recurring. Possible values are:
	 * 
	 * - INITIAL – Used when this is the first time the consumer uses this credit card.
	 * 
	 * - SUBSEQUENT – Used when the consumer uses this credit card for subsquent requests.
	 * 
	 * **Note:** This value defaults to INITIAL.
	 */
	private string $occurrence = "INITIAL";


	/**
	 * Id of the initial Recurring Payment transaction.
     * This id should be stored from the auth response of the transaction indicated as initial with the following:
     * type=RECURRING/TOPUP, occurrence=INITIAL. This reference should be provided when:
	 * 
	 *  - type = RECURRING and occurrence = SUBSEQUENT
	 *  -type = TOPUP and occurrence = SUBSEQUENT
	 * 
	 * **Note:** This reference is a must to meet PSD 2 authentication process requirements
     * for merchant initiated transactions successfully.
	 */
	private string $initialTransactionId;


	/**
	 * Card Scheme Transaction Id of the initial payment transaction in the recurring plan
     * when it was processed through external service provider.
     *
     * This reference should be provided only when:
	 *  - type=RECURRING and occurrence=SUBSEQUENT
	 *  - type=TOPUP and occurrence=SUBSEQUENT
	 * **Note:** This reference cannot be provided along with initialTransactionId.
	 */
	private string $externalInitialTransactionId;


	/**
	 * Builder function for type
	 * 
	 * @param string $type
	 * 
	 * @return StoredCredential
	 */
	public function type(string $type = "ADHOC"): self
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
	public function setType(string $type = "ADHOC"): void
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
	 * Builder function for occurrence
	 * 
	 * @param string $occurrence
	 * 
	 * @return StoredCredential
	 */
	public function occurrence(string $occurrence = "INITIAL"): self
	{
		$this->setOccurrence($occurrence);
		
		return $this;
	}
	/**
	 * Setter function for occurrence
	 * 
	 * @param string $occurrence
	 * 
	 * @return void
	 */
	public function setOccurrence(string $occurrence = "INITIAL"): void
	{
		$this->occurrence = $occurrence;
	}
	/**
	 * Getter function for occurrence
	 * 
	 * @return string
	 */
	public function getOccurrence(): string
	{
		return $this->occurrence;
	}

	/**
	 * Builder function for initialTransactionId
	 * 
	 * @param string $initialTransactionId
	 * 
	 * @return StoredCredential
	 */
	public function initialTransactionId(string $initialTransactionId): self
	{
		$this->setInitialTransactionId($initialTransactionId);
		
		return $this;
	}
	/**
	 * Setter function for initialTransactionId
	 * 
	 * @param string $initialTransactionId
	 * 
	 * @return void
	 */
	public function setInitialTransactionId(string $initialTransactionId): void
	{
		$this->initialTransactionId = $initialTransactionId;
	}
	/**
	 * Getter function for initialTransactionId
	 * 
	 * @return string
	 */
	public function getInitialTransactionId(): string
	{
		return $this->initialTransactionId;
	}

	/**
	 * Builder function for externalInitialTransactionId
	 * 
	 * @param string $externalInitialTransactionId
	 * 
	 * @return StoredCredential
	 */
	public function externalInitialTransactionId(string $externalInitialTransactionId): self
	{
		$this->setExternalInitialTransactionId($externalInitialTransactionId);
		
		return $this;
	}
	/**
	 * Setter function for externalInitialTransactionId
	 * 
	 * @param string $externalInitialTransactionId
	 * 
	 * @return void
	 */
	public function setExternalInitialTransactionId(string $externalInitialTransactionId): void
	{
		$this->externalInitialTransactionId = $externalInitialTransactionId;
	}
	/**
	 * Getter function for externalInitialTransactionId
	 * 
	 * @return string
	 */
	public function getExternalInitialTransactionId(): string
	{
		return $this->externalInitialTransactionId;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class StoredCredential {" . PHP_EOL .
			"	type: " . $this->toIndentedString($this->type) . PHP_EOL .
			"	occurrence: " . $this->toIndentedString($this->occurrence) . PHP_EOL .
			"	initialTransactionId: " . $this->toIndentedString($this->initialTransactionId) . PHP_EOL .
			"	externalInitialTransactionId: " . $this->toIndentedString($this->externalInitialTransactionId) . PHP_EOL .
		"}";
	}
}
