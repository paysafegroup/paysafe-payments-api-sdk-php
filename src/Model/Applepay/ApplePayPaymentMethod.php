<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Applepay;

use Paysafe\PhpSdk\Model\BaseModel;

class ApplePayPaymentMethod extends BaseModel
{
	private string $displayName;
	private string $network;
	private string $type;

	/**
	 * Builder function for displayName
	 * 
	 * @param string $displayName
	 * 
	 * @return $this
	 */
	public function displayName(string $displayName): self
	{
		$this->setDisplayName($displayName);
		
		return $this;
	}

	/**
	 * Setter function for displayName
	 * 
	 * @param string $displayName
	 * 
	 * @return void
	 */
	public function setDisplayName(string $displayName): void
	{
		$this->displayName = $displayName;
	}

	/**
	 * Getter function for displayName
	 * 
	 * @return string
	 */
	public function getDisplayName(): string
	{
		return $this->displayName;
	}

	/**
	 * Builder function for network
	 * 
	 * @param string $network
	 * 
	 * @return $this
	 */
	public function network(string $network): self
	{
		$this->setNetwork($network);
		
		return $this;
	}

	/**
	 * Setter function for network
	 * 
	 * @param string $network
	 * 
	 * @return void
	 */
	public function setNetwork(string $network): void
	{
		$this->network = $network;
	}

	/**
	 * Getter function for network
	 * 
	 * @return string
	 */
	public function getNetwork(): string
	{
		return $this->network;
	}

	/**
	 * Builder function for type
	 * 
	 * @param string $type
	 * 
	 * @return $this
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
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ApplePayPaymentMethod {" . PHP_EOL
			. "    displayName: " . $this->toIndentedString($this->displayName) . PHP_EOL
			. "    network: " . $this->toIndentedString($this->network) . PHP_EOL
			. "    type: " . $this->toIndentedString($this->type) . PHP_EOL
			. "}";
	}
}
