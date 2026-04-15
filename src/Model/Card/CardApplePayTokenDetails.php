<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\Applepay\ApplePayTokenDetails;
use Paysafe\PhpSdk\Model\BaseModel;

class CardApplePayTokenDetails extends BaseModel
{

	private ApplePayTokenDetails $applePay;

	/**
	 * Builder function for applePay
	 * 
	 * @param ApplePayTokenDetails $applePay
	 * 
	 * @return $this
	 */
	public function applePay(ApplePayTokenDetails $applePay): self
	{
		$this->setApplePay($applePay);
		
		return $this;
	}

	/**
	 * Setter function for applePay
	 * 
	 * @param ApplePayTokenDetails $applePay
	 * 
	 * @return void
	 */
	public function setApplePay(ApplePayTokenDetails $applePay): void
	{
		$this->applePay = $applePay;
	}

	/**
	 * Getter function for applePay
	 * 
	 * @return ApplePayTokenDetails
	 */
	public function getApplePay(): ApplePayTokenDetails
	{
		return $this->applePay;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class CardApplePayTokenDetails {" . PHP_EOL
			. "    applePay: " . $this->toIndentedString($this->applePay) . PHP_EOL
			. "}";
	}
}
