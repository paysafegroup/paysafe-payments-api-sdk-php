<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the details of the skrill 1-Tap account used for the transaction.
 */
class Skrill1Tap extends BaseModel
{

	/**
	 * Unique ID of the user which is used to identify to account and user in subsequent calls.
	 * Example: 102932
	 */
	private string $consumerId;


	/**
	 * Text shown to the customer in the payment confirmation email as the reason for the Skrill 1-Tap payment.
     * Email is sent by Skrill platform.
	 * > Mandatory for 1st transaction
	 * Example: Recipient Description
	 */
	private string $recipientDescription;

	/**
	 * This acts as an upper limit, any subsequent transactions for this subscription cannot
     * be more than the maxAmount set.
     * This is in minor unit.
     * If you want to send limit as $10 then you should pass value as 1000 in request.
	 * Example: 1000
	 */
	private int $maxAmount;


	/**
	 * Builder function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return Skrill1Tap
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
	 * Builder function for recipientDescription
	 * 
	 * @param string $recipientDescription
	 * 
	 * @return Skrill1Tap
	 */
	public function recipientDescription(string $recipientDescription): self
	{
		$this->setRecipientDescription($recipientDescription);
		
		return $this;
	}
	/**
	 * Setter function for recipientDescription
	 * 
	 * @param string $recipientDescription
	 * 
	 * @return void
	 */
	public function setRecipientDescription(string $recipientDescription): void
	{
		$this->recipientDescription = $recipientDescription;
	}
	/**
	 * Getter function for recipientDescription
	 * 
	 * @return string
	 */
	public function getRecipientDescription(): string
	{
		return $this->recipientDescription;
	}

	/**
	 * Builder function for maxAmount
	 * 
	 * @param int $maxAmount
	 * 
	 * @return Skrill1Tap
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
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Skrill1Tap {" . PHP_EOL .
			"	consumerId: " . $this->toIndentedString($this->consumerId) . PHP_EOL .
			"	recipientDescription: " . $this->toIndentedString($this->recipientDescription) . PHP_EOL .
			"	maxAmount: " . $this->toIndentedString($this->maxAmount) . PHP_EOL .
		"}";
	}
}
