<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\Lpm\Ach;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This object should be used only for pay by bank transactions.
 */
class PayByBank extends BaseModel
{

	/**
	 * This is your identifier for your consumer and must be unique per consumer.
	 * Example: PP_100222
	 */
	private string $consumerId;

	/**
	 * Paysafe’s unique identifier for your consumer.
	 * Example: 5008f12884-7c26-4af2-e063-ac0e1a0a7533
	 */
	private string $registrationId;

	/**
	 * This is to identify whether the transaction was processed via ACH or RTP network.
     * Allowed values: ACH, RTP.  Example: ACH
	 */
	private string $scheme;

	/**
	 * This is an array containing a list of bank accounts that the consumer
     * has linked in order to make Pay by Bank payments, along with additional information about those accounts.
	 */
	private Ach $ach;


	/**
	 * Builder function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return PayByBank
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
	 * Builder function for registrationId
	 * 
	 * @param string $registrationId
	 * 
	 * @return PayByBank
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
	 * Getter function for registrationId
	 * 
	 * @return string
	 */
	public function getRegistrationId(): string
	{
		return $this->registrationId;
	}

	/**
	 * Builder function for scheme
	 * 
	 * @param string $scheme
	 * 
	 * @return PayByBank
	 */
	public function scheme(string $scheme): self
	{
		$this->setScheme($scheme);
		
		return $this;
	}
	/**
	 * Setter function for scheme
	 * 
	 * @param string $scheme
	 * 
	 * @return void
	 */
	public function setScheme(string $scheme): void
	{
		$this->scheme = $scheme;
	}
	/**
	 * Getter function for scheme
	 * 
	 * @return string
	 */
	public function getScheme(): string
	{
		return $this->scheme;
	}

	/**
	 * Builder function for ach
	 * 
	 * @param Ach $ach
	 * 
	 * @return PayByBank
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
	 * Getter function for ach
	 * 
	 * @return Ach
	 */
	public function getAch(): Ach
	{
		return $this->ach;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class PayByBank {" . PHP_EOL . 
			"	consumerId: " . $this->toIndentedString($this->consumerId) . PHP_EOL .
			"	registrationId: " . $this->toIndentedString($this->registrationId) . PHP_EOL .
			"	scheme: " . $this->toIndentedString($this->scheme) . PHP_EOL .
			"	ach: " . $this->toIndentedString($this->ach) . PHP_EOL .
		"}";
	}
}
