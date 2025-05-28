<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the details of the Boleto Bancario account used for the request.
 */
class BoletoBancario extends BaseModel
{

	/**
	 * It is the transaction expiry in minutes at Safetypay.
	 */
	private int $paymentExpiryInMinutes;


	/**
	 * Builder function for paymentExpiryInMinutes
	 * 
	 * @param int $paymentExpiryInMinutes
	 * 
	 * @return BoletoBancario
	 */
	public function paymentExpiryInMinutes(int $paymentExpiryInMinutes): self
	{
		$this->setPaymentExpiryInMinutes($paymentExpiryInMinutes);
		
		return $this;
	}
	/**
	 * Setter function for paymentExpiryInMinutes
	 * 
	 * @param int $paymentExpiryInMinutes
	 * 
	 * @return void
	 */
	public function setPaymentExpiryInMinutes(int $paymentExpiryInMinutes): void
	{
		$this->paymentExpiryInMinutes = $paymentExpiryInMinutes;
	}
	/**
	 * Getter function for paymentExpiryInMinutes
	 * 
	 * @return int
	 */
	public function getPaymentExpiryInMinutes(): int
	{
		return $this->paymentExpiryInMinutes;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class BoletoBancario {" . PHP_EOL . 
			"	paymentExpiryInMinutes: " . $this->toIndentedString($this->paymentExpiryInMinutes) . PHP_EOL .
		"}";
	}
}
