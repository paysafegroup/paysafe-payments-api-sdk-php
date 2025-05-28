<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\Card\DiscretionaryData;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Acquirer data is additional information about your card acquirer,
 * applicable **only when** you are using Worldpay (VAN) as your acquirer for authorizations.
 * Contact your account manager for more information.
 */
class AcquirerData extends BaseModel
{
	const CODE_VAN = 'VAN';

	/**
	 * This is the code for your card acquirer.
	 */
	private string $code;

	private DiscretionaryData $discretionaryData;

	/**
	 * Builder function for code
	 * 
	 * @param string $code
	 * 
	 * @return AcquirerData
	 */
	public function code(string $code): self
	{
		$this->setCode($code);
		
		return $this;
	}
	/**
	 * Setter function for code
	 * 
	 * @param string $code
	 * 
	 * @return void
	 */
	public function setCode(string $code): void
	{
		$this->code = $code;
	}
	/**
	 * Getter function for code
	 * 
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * Builder function for discretionaryData
	 * 
	 * @param DiscretionaryData $discretionaryData
	 * 
	 * @return AcquirerData
	 */
	public function discretionaryData(DiscretionaryData $discretionaryData): self
	{
		$this->setDiscretionaryData($discretionaryData);
		
		return $this;
	}
	/**
	 * Setter function for discretionaryData
	 * 
	 * @param DiscretionaryData $discretionaryData
	 * 
	 * @return void
	 */
	public function setDiscretionaryData(DiscretionaryData $discretionaryData): void
	{
		$this->discretionaryData = $discretionaryData;
	}
	/**
	 * Getter function for discretionaryData
	 * 
	 * @return DiscretionaryData
	 */
	public function getDiscretionaryData(): DiscretionaryData
	{
		return $this->discretionaryData;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class AcquirerData {" . PHP_EOL .
			"	code: " . $this->toIndentedString($this->code) . PHP_EOL .
			"	discretionaryData: " . $this->toIndentedString($this->discretionaryData) . PHP_EOL .
		"}";
	}
}
