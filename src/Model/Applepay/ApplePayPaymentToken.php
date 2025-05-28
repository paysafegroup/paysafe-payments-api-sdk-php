<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Applepay;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * ApplePayPaymentToken
 */
class ApplePayPaymentToken extends BaseModel
{
	private ApplePayTokenData $token;
	private ApplePayBillingContact $billingContact;

	/**
	 * Builder function for token
	 * 
	 * @param ApplePayTokenData $token
	 * 
	 * @return $this
	 */
	public function token(ApplePayTokenData $token): self
	{
		$this->setToken($token);
		
		return $this;
	}

	/**
	 * Setter function for token
	 * 
	 * @param ApplePayTokenData $token
	 * 
	 * @return void
	 */
	public function setToken(ApplePayTokenData $token): void
	{
		$this->token = $token;
	}

	/**
	 * This object contains the user's payment credentials.
	 * 
	 * @return ApplePayTokenData
	 */
	public function getToken(): ApplePayTokenData
	{
		return $this->token;
	}

	/**
	 * Builder function for billingContact
	 * 
	 * @param ApplePayBillingContact $billingContact
	 * 
	 * @return $this
	 */
	public function billingContact(ApplePayBillingContact $billingContact): self
	{
		$this->setBillingContact($billingContact);
		
		return $this;
	}

	/**
	 * Setter function for billingContact
	 * 
	 * @param ApplePayBillingContact $billingContact
	 * 
	 * @return void
	 */
	public function setBillingContact(ApplePayBillingContact $billingContact): void
	{
		$this->billingContact = $billingContact;
	}

	/**
	 * The billing contact provided by the user for this transaction in Apple Pay wallet
	 * 
	 * @return ApplePayBillingContact
	 */
	public function getBillingContact(): ApplePayBillingContact
	{
		return $this->billingContact;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ApplePayPaymentToken {" . PHP_EOL
			. "    token: " . $this->toIndentedString($this->token) . PHP_EOL
			. "    billingContact: " . $this->toIndentedString($this->billingContact) . PHP_EOL
			. "}";
	}
}
