<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Googlepay;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * It has GooglePay details.
 */
class GooglePay extends BaseModel
{
	private GooglePayPaymentToken $googlePayPaymentToken;

	/**
	 * Builder function for googlePayPaymentToken
	 * 
	 * @param GooglePayPaymentToken $googlePayPaymentToken
	 * 
	 * @return $this
	 */
	public function googlePayPaymentToken(GooglePayPaymentToken $googlePayPaymentToken): self
	{
		$this->setGooglePayPaymentToken($googlePayPaymentToken);
		
		return $this;
	}

	/**
	 * Setter function for googlePayPaymentToken
	 * 
	 * @param GooglePayPaymentToken $googlePayPaymentToken
	 * 
	 * @return void
	 */
	public function setGooglePayPaymentToken(GooglePayPaymentToken $googlePayPaymentToken): void
	{
		$this->googlePayPaymentToken = $googlePayPaymentToken;
	}

	/**
	 * Get googlePayPaymentToken
	 * 
	 * @return GooglePayPaymentToken
	 */
	public function getGooglePayPaymentToken(): GooglePayPaymentToken
	{
		return $this->googlePayPaymentToken;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class GooglePay {" . PHP_EOL
			. "    googlePayPaymentToken: " . $this->toIndentedString($this->googlePayPaymentToken) . PHP_EOL
			. "}";
	}
}
