<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentHandle;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\PaymentDetails;

class OnlineBankTransferViaSafetyPay extends BaseModel
{
	private PaymentDetails $paymentDetails;
	private int $paymentExpiryInMinutes;

	/**
	 * Builder function for paymentDetails
	 * 
	 * @param PaymentDetails $paymentDetails
	 * 
	 * @return $this
	 */
	public function paymentDetails(PaymentDetails $paymentDetails): self
	{
		$this->setPaymentDetails($paymentDetails);
		
		return $this;
	}

	/**
	 * Setter function for paymentDetails
	 * 
	 * @param PaymentDetails $paymentDetails
	 * 
	 * @return void
	 */
	public function setPaymentDetails(PaymentDetails $paymentDetails): void
	{
		$this->paymentDetails = $paymentDetails;
	}

	/**
	 * Getter function for paymentDetails
	 * 
	 * @return PaymentDetails
	 */
	public function getPaymentDetails(): PaymentDetails
	{
		return $this->paymentDetails;
	}

	/**
	 * Builder function for paymentExpiryInMinutes
	 * 
	 * @param int $paymentExpiryInMinutes
	 * 
	 * @return $this
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
		return "class OnlineBankTransferViaSafetyPay {" . PHP_EOL
			. "    paymentDetails: " . $this->toIndentedString($this->paymentDetails) . PHP_EOL
			. "    paymentExpiryInMinutes: " . $this->toIndentedString($this->paymentExpiryInMinutes) . PHP_EOL
			. "}";
	}
}
