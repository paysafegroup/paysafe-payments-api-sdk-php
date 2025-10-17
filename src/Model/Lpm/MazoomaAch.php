<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

class MazoomaAch extends BaseModel
{
	private string $paymentHandleToken;

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
	 * Getter function for paymentHandleToken
	 * 
	 * @return string
	 */
	public function getPaymentHandleToken(): string
	{
		return $this->paymentHandleToken;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class MazoomaAch {" . PHP_EOL
			. "    paymentHandleToken: " . $this->toIndentedString($this->paymentHandleToken) . PHP_EOL
			. "}";
	}
}
