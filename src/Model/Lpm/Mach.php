<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\Common\Profile\Profile;
use Paysafe\PhpSdk\Model\Common\BillingDetails;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * mach via Safetypay Express
 */
class Mach extends BaseModel
{

	private Profile $profile;
	private BillingDetails $billingDetails;

	/**
	 * It is the transaction expiry in minutes at Safetypay.
	 */
	private int $paymentExpiryMinutes;


	/**
	 * Builder function for profile
	 * 
	 * @param Profile $profile
	 * 
	 * @return Mach
	 */
	public function profile(Profile $profile): self
	{
		$this->setProfile($profile);
		
		return $this;
	}
	/**
	 * Setter function for profile
	 * 
	 * @param Profile $profile
	 * 
	 * @return void
	 */
	public function setProfile(Profile $profile): void
	{
		$this->profile = $profile;
	}
	/**
	 * Getter function for profile
	 * 
	 * @return Profile
	 */
	public function getProfile(): Profile
	{
		return $this->profile;
	}

	/**
	 * Builder function for billingDetails
	 * 
	 * @param BillingDetails $billingDetails
	 * 
	 * @return Mach
	 */
	public function billingDetails(BillingDetails $billingDetails): self
	{
		$this->setBillingDetails($billingDetails);
		
		return $this;
	}
	/**
	 * Setter function for billingDetails
	 * 
	 * @param BillingDetails $billingDetails
	 * 
	 * @return void
	 */
	public function setBillingDetails(BillingDetails $billingDetails): void
	{
		$this->billingDetails = $billingDetails;
	}
	/**
	 * Getter function for billingDetails
	 * 
	 * @return BillingDetails
	 */
	public function getBillingDetails(): BillingDetails
	{
		return $this->billingDetails;
	}

	/**
	 * Builder function for paymentExpiryMinutes
	 * 
	 * @param int $paymentExpiryMinutes
	 * 
	 * @return Mach
	 */
	public function paymentExpiryMinutes(int $paymentExpiryMinutes): self
	{
		$this->setPaymentExpiryMinutes($paymentExpiryMinutes);
		
		return $this;
	}
	/**
	 * Setter function for paymentExpiryMinutes
	 * 
	 * @param int $paymentExpiryMinutes
	 * 
	 * @return void
	 */
	public function setPaymentExpiryMinutes(int $paymentExpiryMinutes): void
	{
		$this->paymentExpiryMinutes = $paymentExpiryMinutes;
	}
	/**
	 * Getter function for paymentExpiryMinutes
	 * 
	 * @return int
	 */
	public function getPaymentExpiryMinutes(): int
	{
		return $this->paymentExpiryMinutes;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Mach {" . PHP_EOL . 
			"	profile: " . $this->toIndentedString($this->profile) . PHP_EOL .
			"	billingDetails: " . $this->toIndentedString($this->billingDetails) . PHP_EOL .
			"	paymentExpiryMinutes: " . $this->toIndentedString($this->paymentExpiryMinutes) . PHP_EOL .
		"}";
	}
}
