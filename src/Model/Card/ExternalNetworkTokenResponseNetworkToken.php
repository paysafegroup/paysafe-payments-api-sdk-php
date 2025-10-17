<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

class ExternalNetworkTokenResponseNetworkToken extends BaseModel
{

	private string $lastDigits;
	private CardExpiry $expiry;

	/**
	 * Builder function for lastDigits
	 * 
	 * @param string $lastDigits
	 * 
	 * @return $this
	 */
	public function lastDigits(string $lastDigits): self
	{
		$this->setLastDigits($lastDigits);
		
		return $this;
	}

	/**
	 * Setter function for lastDigits
	 * 
	 * @param string $lastDigits
	 * 
	 * @return void
	 */
	public function setLastDigits(string $lastDigits): void
	{
		$this->lastDigits = $lastDigits;
	}

	/**
	 * Getter function for lastDigits
	 * 
	 * @return string
	 */
	public function getLastDigits(): string
	{
		return $this->lastDigits;
	}

	/**
	 * Builder function for expiry
	 * 
	 * @param CardExpiry $expiry
	 * 
	 * @return $this
	 */
	public function expiry(CardExpiry $expiry): self
	{
		$this->setExpiry($expiry);
		
		return $this;
	}

	/**
	 * Setter function for expiry
	 * 
	 * @param CardExpiry $expiry
	 * 
	 * @return void
	 */
	public function setExpiry(CardExpiry $expiry): void
	{
		$this->expiry = $expiry;
	}

	/**
	 * Getter function for expiry
	 * 
	 * @return CardExpiry
	 */
	public function getExpiry(): CardExpiry
	{
		return $this->expiry;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ExternalNetworkTokenResponseNetworkToken {" . PHP_EOL
			. "    lastDigits: " . $this->toIndentedString($this->lastDigits) . PHP_EOL
			. "    expiry: " . $this->toIndentedString($this->expiry) . PHP_EOL
			. "}";
	}
}
