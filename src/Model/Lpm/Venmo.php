<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

class Venmo extends BaseModel
{


	/**
	 * This is your identifier for your consumer and must be unique per consumer.\
	 * We store this after your first successful Venmo transaction for a given consumer
     * (during this first transaction the consumer agrees to link their Venmo wallet for future transactions);
     * when you subsequently send in the same consumerId, we debit the consumer’s wallet directly
     * without the consumer having to agree to each transaction.
	 * Example: consumer@thisemail.com
	 */
	private string $consumerId;


	/**
	 * You can set up multiple accounts with Braintree,
     * and each account can settle funds into a different bank account.
     * This parameter therefore allows you to control which of your bank accounts is used to receive settlement.\
	 * This only applies to pay-ins and not payouts.  If you pass it for payouts the value will be ignored.\
	 * If not supplied for pay-ins, your default Braintree account will be used.
	 * Example: BankAccount2
	 */
	private string $merchantAccountId;


	/**
	 * You can set up multiple profiles with Braintree,
     * where each profile shows the consumer a different logo and description during checkout on the Venmo app,
     * and on the Venmo statement.  This parameter therefore allows you to vary the consumer experience
     * (for example, if you have multiple brands, you can display a different logo for each).\
	 * This only applies to pay-ins and not payouts.  If you pass it for payouts the value will be ignored.
     * If not supplied for pay-ins, your default profile will be used.
	 * Example: 1953896702662410200
	 */
	private string $profileId;

	/**
	 * Builder function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return Venmo
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
	 * Builder function for merchantAccountId
	 * 
	 * @param string $merchantAccountId
	 * 
	 * @return Venmo
	 */
	public function merchantAccountId(string $merchantAccountId): self
	{
		$this->setMerchantAccountId($merchantAccountId);
		
		return $this;
	}
	/**
	 * Setter function for merchantAccountId
	 * 
	 * @param string $merchantAccountId
	 * 
	 * @return void
	 */
	public function setMerchantAccountId(string $merchantAccountId): void
	{
		$this->merchantAccountId = $merchantAccountId;
	}
	/**
	 * Getter function for merchantAccountId
	 * 
	 * @return string
	 */
	public function getMerchantAccountId(): string
	{
		return $this->merchantAccountId;
	}

	/**
	 * Builder function for profileId
	 * 
	 * @param string $profileId
	 * 
	 * @return Venmo
	 */
	public function profileId(string $profileId): self
	{
		$this->setProfileId($profileId);
		
		return $this;
	}
	/**
	 * Setter function for profileId
	 * 
	 * @param string $profileId
	 * 
	 * @return void
	 */
	public function setProfileId(string $profileId): void
	{
		$this->profileId = $profileId;
	}
	/**
	 * Getter function for profileId
	 * 
	 * @return string
	 */
	public function getProfileId(): string
	{
		return $this->profileId;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Venmo {" . PHP_EOL .
			"	consumerId: " . $this->toIndentedString($this->consumerId) . PHP_EOL .
			"	merchantAccountId: " . $this->toIndentedString($this->merchantAccountId) . PHP_EOL .
			"	profileId: " . $this->toIndentedString($this->profileId) . PHP_EOL .
		"}";
	}
}
