<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Googlepay;

use Paysafe\PhpSdk\Model\BaseModel;

class GooglePayPaymentMethodDataInfo extends BaseModel
{
	private GooglePayBillingAddress $billingAddress;
	private int $cardDetails;
	private string $cardNetwork;

	/**
	 * Builder function for billingAddress
	 * 
	 * @param GooglePayBillingAddress $billingAddress
	 * 
	 * @return $this
	 */
	public function billingAddress(GooglePayBillingAddress $billingAddress): self
	{
		$this->setBillingAddress($billingAddress);
		
		return $this;
	}

	/**
	 * Setter function for billingAddress
	 * 
	 * @param GooglePayBillingAddress $billingAddress
	 * 
	 * @return void
	 */
	public function setBillingAddress(GooglePayBillingAddress $billingAddress): void
	{
		$this->billingAddress = $billingAddress;
	}

	/**
	 * Getter function for billingAddress
	 * 
	 * @return GooglePayBillingAddress
	 */
	public function getBillingAddress(): GooglePayBillingAddress
	{
		return $this->billingAddress;
	}

	/**
	 * Builder function for cardDetails
	 * 
	 * @param int $cardDetails
	 * 
	 * @return $this
	 */
	public function cardDetails(int $cardDetails): self
	{
		$this->setCardDetails($cardDetails);
		
		return $this;
	}

	/**
	 * Setter function for cardDetails
	 * 
	 * @param int $cardDetails
	 * 
	 * @return void
	 */
	public function setCardDetails(int $cardDetails): void
	{
		$this->cardDetails = $cardDetails;
	}

	/**
	 * Getter function for cardDetails
	 * 
	 * @return int
	 */
	public function getCardDetails(): int
	{
		return $this->cardDetails;
	}

	/**
	 * Builder function for cardNetwork
	 * 
	 * @param string $cardNetwork
	 * 
	 * @return $this
	 */
	public function cardNetwork(string $cardNetwork): self
	{
		$this->setCardNetwork($cardNetwork);
		
		return $this;
	}

	/**
	 * Setter function for cardNetwork
	 * 
	 * @param string $cardNetwork
	 * 
	 * @return void
	 */
	public function setCardNetwork(string $cardNetwork): void
	{
		$this->cardNetwork = $cardNetwork;
	}

	/**
	 * Getter function for cardNetwork
	 * 
	 * @return string
	 */
	public function getCardNetwork(): string
	{
		return $this->cardNetwork;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class GooglePayPaymentMethodDataInfo {" . PHP_EOL
			. "    billingAddress: " . $this->toIndentedString($this->billingAddress) . PHP_EOL
			. "    cardDetails: " . $this->toIndentedString($this->cardDetails) . PHP_EOL
			. "    cardNetwork: " . $this->toIndentedString($this->cardNetwork) . PHP_EOL
			. "}";
	}
}
