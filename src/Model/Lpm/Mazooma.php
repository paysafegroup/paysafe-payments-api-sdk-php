<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\Lpm\Ach;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Mazooma details to be used for the transaction 
 */
class Mazooma extends BaseModel
{

	/**
	 * This is a field identifying the customer.
	 */
	private string $consumerId;

	private Ach $ach;

	/**
	 * Builder function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return Mazooma
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
	 * Builder function for ach
	 * 
	 * @param Ach $ach
	 * 
	 * @return Mazooma
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
		return "class Mazooma {" . PHP_EOL . 
			"	consumerId: " . $this->toIndentedString($this->consumerId) . PHP_EOL .
			"	ach: " . $this->toIndentedString($this->ach) . PHP_EOL .
		"}";
	}
}
