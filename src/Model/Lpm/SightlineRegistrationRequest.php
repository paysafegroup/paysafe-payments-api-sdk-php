<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\BillingDetails;
use Paysafe\PhpSdk\Model\Common\Profile\Profile;
use Paysafe\PhpSdk\Model\Common\ReturnLink;

/**
 * SightlineRegistrationRequest
 */
class SightlineRegistrationRequest extends BaseModel
{

	private string $merchantRefNum;
	private string $paymentType;
	private Profile $profile;
	private BillingDetails $billingDetails;
	private array $returnLinks;
	private Sightline $sightline;

	/**
	 * Builder function for merchantRefNum
	 *
	 * @param string $merchantRefNum
	 *
	 * @return $this
	 */
	public function merchantRefNum(string $merchantRefNum): self
	{
		$this->setMerchantRefNum($merchantRefNum);

		return $this;
	}

	/**
	 * Setter function for merchantRefNum
	 *
	 * @param string $merchantRefNum
	 *
	 * @return void
	 */
	public function setMerchantRefNum(string $merchantRefNum): void
	{
		$this->merchantRefNum = $merchantRefNum;
	}

	/**
	 * This is the reference number for the merchant.
	 *
	 * @return string
	 */
	public function getMerchantRefNum(): string
	{
		return $this->merchantRefNum;
	}

	/**
	 * Builder function for paymentType
	 *
	 * @param string $paymentType
	 *
	 * @return $this
	 */
	public function paymentType(string $paymentType): self
	{
		$this->setPaymentType($paymentType);

		return $this;
	}

	/**
	 * Setter function for paymentType
	 *
	 * @param string $paymentType
	 *
	 * @return void
	 */
	public function setPaymentType(string $paymentType): void
	{
		$this->paymentType = $paymentType;
	}

	/**
	 * This is the payment type. Possible value: SIGHTLINE
	 *
	 * @return string
	 */
	public function getPaymentType(): string
	{
		return $this->paymentType;
	}

	/**
	 * Builder function for profile
	 *
	 * @param Profile $profile
	 *
	 * @return $this
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
	 * This is customer's profile details.
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
	 * @return $this
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
	 * Customer's billing details. Required if AVS (Address verification) is enabled.<br />
	 * If included in the request, this will serve as the billing address for transaction processing. <br />
	 * Any billing details returned in Apple Pay Token by Apple Pay will be ignored. <br />
	 * 3DS Flow: It is recommended to send billingDetails to improve acceptance rate.
	 *
	 * @return BillingDetails
	 */
	public function getBillingDetails(): BillingDetails
	{
		return $this->billingDetails;
	}

	/**
	 * Builder function for returnLinks
	 *
	 * @param ReturnLink[] $returnLinks
	 *
	 * @return $this
	 */
	public function returnLinks(array $returnLinks): self
	{
		$this->setReturnLinks($returnLinks);

		return $this;
	}

	/**
	 * Setter function for returnLinks
	 *
	 * @param ReturnLink[] $returnLinks
	 *
	 * @return void
	 */
	public function setReturnLinks(array $returnLinks): void
	{
		$this->returnLinks = $returnLinks;
	}

	/**
	 * The URL endpoints to redirect the customer to after a redirection to an alternative payment
     * or 3D Secure site.
	 * You can customize the return URL based on the transaction status.
	 * 
	 * @return ReturnLink[]
	 */
	public function getReturnLinks(): array
	{
		return $this->returnLinks;
	}

	/**
	 * Add new returnLinksItem
	 * 
	 * @param ReturnLink $returnLinksItem
	 * 
	 * @return $this
	 */
	public function addReturnLinksItem(ReturnLink $returnLinksItem): self
	{
		if ($this->returnLinks === null) {
			$this->setReturnLinks([$returnLinksItem]);
			
			return $this;
		}
		
		$returnLinks = $this->getReturnLinks();
		$returnLinks[] = $returnLinksItem;
		$this->setReturnLinks($returnLinks);
		
		return $this;
	}

	/**
	 * Remove returnLinksItem
	 * 
	 * @param ReturnLink $returnLinksItem
	 * 
	 * @return $this
	 */
	public function removeReturnLinksItem(ReturnLink $returnLinksItem): self
	{
		$this->setReturnLinks(array_diff($this->getReturnLinks(), [$returnLinksItem]));
		
		return $this;
	}

	/**
	 * Builder function for sightline
	 * 
	 * @param Sightline $sightline
	 * 
	 * @return $this
	 */
	public function sightline(Sightline $sightline): self
	{
		$this->setSightline($sightline);
		
		return $this;
	}

	/**
	 * Setter function for sightline
	 * 
	 * @param Sightline $sightline
	 * 
	 * @return void
	 */
	public function setSightline(Sightline $sightline): void
	{
		$this->sightline = $sightline;
	}

	/**
	 * These are the details of the Play+ (Sightline) used for the transaction.
	 * 
	 * @return Sightline
	 */
	public function getSightline(): Sightline
	{
		return $this->sightline;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class SightlineRegistrationRequest {" . PHP_EOL
			. "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL
			. "    paymentType: " . $this->toIndentedString($this->paymentType) . PHP_EOL
			. "    profile: " . $this->toIndentedString($this->profile) . PHP_EOL
			. "    billingDetails: " . $this->toIndentedString($this->billingDetails) . PHP_EOL
			. "    returnLinks: " . $this->toIndentedString($this->returnLinks) . PHP_EOL
			. "    sightline: " . $this->toIndentedString($this->sightline) . PHP_EOL
			. "}";
	}
}
