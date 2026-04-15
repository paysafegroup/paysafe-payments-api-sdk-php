<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Googlepay;

use Paysafe\PhpSdk\Model\BaseModel;

class GooglePayDecryptedToken extends BaseModel
{
	private string $gatewayMerchantId;
	private string $messageId;
	private string $messageExpiration;
	private GooglePayDecryptedTokenPaymentMethodDetails $paymentMethodDetails;

	/**
	 * Builder function for gatewayMerchantId
	 * 
	 * @param string $gatewayMerchantId
	 * 
	 * @return $this
	 */
	public function gatewayMerchantId(string $gatewayMerchantId): self
	{
		$this->setGatewayMerchantId($gatewayMerchantId);
		
		return $this;
	}

	/**
	 * Setter function for gatewayMerchantId
	 * 
	 * @param string $gatewayMerchantId
	 * 
	 * @return void
	 */
	public function setGatewayMerchantId(string $gatewayMerchantId): void
	{
		$this->gatewayMerchantId = $gatewayMerchantId;
	}

	/**
	 * Getter function for gatewayMerchantId
	 * 
	 * @return string
	 */
	public function getGatewayMerchantId(): string
	{
		return $this->gatewayMerchantId;
	}

	/**
	 * Builder function for messageId
	 * 
	 * @param string $messageId
	 * 
	 * @return $this
	 */
	public function messageId(string $messageId): self
	{
		$this->setMessageId($messageId);
		
		return $this;
	}

	/**
	 * Setter function for messageId
	 * 
	 * @param string $messageId
	 * 
	 * @return void
	 */
	public function setMessageId(string $messageId): void
	{
		$this->messageId = $messageId;
	}

	/**
	 * Getter function for messageId
	 * 
	 * @return string
	 */
	public function getMessageId(): string
	{
		return $this->messageId;
	}

	/**
	 * Builder function for messageExpiration
	 * 
	 * @param string $messageExpiration
	 * 
	 * @return $this
	 */
	public function messageExpiration(string $messageExpiration): self
	{
		$this->setMessageExpiration($messageExpiration);
		
		return $this;
	}

	/**
	 * Setter function for messageExpiration
	 * 
	 * @param string $messageExpiration
	 * 
	 * @return void
	 */
	public function setMessageExpiration(string $messageExpiration): void
	{
		$this->messageExpiration = $messageExpiration;
	}

	/**
	 * Getter function for messageExpiration
	 * 
	 * @return string
	 */
	public function getMessageExpiration(): string
	{
		return $this->messageExpiration;
	}

	/**
	 * Builder function for paymentMethodDetails
	 * 
	 * @param GooglePayDecryptedTokenPaymentMethodDetails $paymentMethodDetails
	 * 
	 * @return $this
	 */
	public function paymentMethodDetails(GooglePayDecryptedTokenPaymentMethodDetails $paymentMethodDetails): self
	{
		$this->setPaymentMethodDetails($paymentMethodDetails);
		
		return $this;
	}

	/**
	 * Setter function for paymentMethodDetails
	 * 
	 * @param GooglePayDecryptedTokenPaymentMethodDetails $paymentMethodDetails
	 * 
	 * @return void
	 */
	public function setPaymentMethodDetails(GooglePayDecryptedTokenPaymentMethodDetails $paymentMethodDetails): void
	{
		$this->paymentMethodDetails = $paymentMethodDetails;
	}

	/**
	 * Getter function for paymentMethodDetails
	 * 
	 * @return GooglePayDecryptedTokenPaymentMethodDetails
	 */
	public function getPaymentMethodDetails(): GooglePayDecryptedTokenPaymentMethodDetails
	{
		return $this->paymentMethodDetails;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class GooglePayDecryptedToken {" . PHP_EOL
			. "    gatewayMerchantId: " . $this->toIndentedString($this->gatewayMerchantId) . PHP_EOL
			. "    messageId: " . $this->toIndentedString($this->messageId) . PHP_EOL
			. "    messageExpiration: " . $this->toIndentedString($this->messageExpiration) . PHP_EOL
			. "    paymentMethodDetails: " . $this->toIndentedString($this->paymentMethodDetails) . PHP_EOL
			. "}";
	}
}
