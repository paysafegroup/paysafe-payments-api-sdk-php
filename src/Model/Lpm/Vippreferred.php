<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the details of the vip preferred account used for the transaction.
 */
class Vippreferred extends BaseModel
{

	private string $consumerId;
	private string $registrationId;
	private string $paymentHandleToken;
	private AchBankAccount $ach;
	private ?array $achBankAccounts = null;

	/**
	 * Builder function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return $this
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
	 * The is the consumer social security number (SSN). As it is sensitive data the consumerId
     * will not be passed in the response.
	 * Last 4 digits will be passed as lastDigits.
	 * 
	 * @return string
	 */
	public function getConsumerId(): string
	{
		return $this->consumerId;
	}

	/**
	 * Builder function for registrationId
	 * 
	 * @param string $registrationId
	 * 
	 * @return $this
	 */
	public function registrationId(string $registrationId): self
	{
		$this->setRegistrationId($registrationId);
		
		return $this;
	}

	/**
	 * Setter function for registrationId
	 * 
	 * @param string $registrationId
	 * 
	 * @return void
	 */
	public function setRegistrationId(string $registrationId): void
	{
		$this->registrationId = $registrationId;
	}

	/**
	 * This is the registrationId of the consumer. You can pass the registrationId in place of consumerId
     * in the setup option call..
	 * 
	 * @return string
	 */
	public function getRegistrationId(): string
	{
		return $this->registrationId;
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
	 * This is the bank token of the registered bank account. The bank token is returned in
     * the Verification API response.
	 * 
	 * @return string
	 */
	public function getPaymentHandleToken(): string
	{
		return $this->paymentHandleToken;
	}

	/**
	 * Builder function for ach
	 * 
	 * @param AchBankAccount $ach
	 * 
	 * @return $this
	 */
	public function ach(AchBankAccount $ach): self
	{
		$this->setAch($ach);
		
		return $this;
	}

	/**
	 * Setter function for ach
	 * 
	 * @param AchBankAccount $ach
	 * 
	 * @return void
	 */
	public function setAch(AchBankAccount $ach): void
	{
		$this->ach = $ach;
	}

	/**
	 * This are the bank details which requires in case of enrollment/payments/payouts
	 * 
	 * @return AchBankAccount
	 */
	public function getAch(): AchBankAccount
	{
		return $this->ach;
	}

	/**
	 * Builder function for achBankAccounts
	 * 
	 * @param AchBankAccount[] $achBankAccounts
	 * 
	 * @return $this
	 */
	public function achBankAccounts(array $achBankAccounts): self
	{
		$this->setAchBankAccounts($achBankAccounts);
		
		return $this;
	}

	/**
	 * Setter function for achBankAccounts
	 * 
	 * @param AchBankAccount[] $achBankAccounts
	 * 
	 * @return void
	 */
	public function setAchBankAccounts(array $achBankAccounts): void
	{
		$this->achBankAccounts = $achBankAccounts;
	}

	/**
	 * This contains all the registered ach bank accounts.
	 * 
	 * @return AchBankAccount[]|null
	 */
	public function getAchBankAccounts(): array
	{
		return $this->achBankAccounts;
	}

	/**
	 * Add new achBankAccountsItem
	 * 
	 * @param AchBankAccount $achBankAccountsItem
	 * 
	 * @return $this
	 */
	public function addAchBankAccountsItem(AchBankAccount $achBankAccountsItem): self
	{
		if ($this->achBankAccounts === null) {
			$this->setAchBankAccounts([$achBankAccountsItem]);
			
			return $this;
		}
		
		$achBankAccounts = $this->getAchBankAccounts();
		$achBankAccounts[] = $achBankAccountsItem;
		$this->setAchBankAccounts($achBankAccounts);
		
		return $this;
	}

	/**
	 * Remove achBankAccountsItem
	 * 
	 * @param AchBankAccount $achBankAccountsItem
	 * 
	 * @return $this
	 */
	public function removeAchBankAccountsItem(AchBankAccount $achBankAccountsItem): self
	{
		$this->setAchBankAccounts(array_diff($this->getAchBankAccounts(), [$achBankAccountsItem]));
		
		return $this;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Vippreferred {" . PHP_EOL
			. "    consumerId: " . $this->toIndentedString($this->consumerId) . PHP_EOL
			. "    registrationId: " . $this->toIndentedString($this->registrationId) . PHP_EOL
			. "    paymentHandleToken: " . $this->toIndentedString($this->paymentHandleToken) . PHP_EOL
			. "    ach: " . $this->toIndentedString($this->ach) . PHP_EOL
			. "    achBankAccounts: " . $this->toIndentedString($this->achBankAccounts) . PHP_EOL
			. "}";
	}
}
