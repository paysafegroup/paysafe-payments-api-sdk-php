<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\BillingDetails;
use Paysafe\PhpSdk\Model\Common\Link;
use Paysafe\PhpSdk\Model\Common\Profile\Profile;
use Paysafe\PhpSdk\Model\Common\ReturnLink;

/**
 * SightlineRegistration
 */
class SightlineRegistration extends BaseModel
{

	private string $merchantRefNum;
	private string $paymentType;
	private Profile $profile;
	private BillingDetails $billingDetails;
	private array $returnLinks;
	private Sightline $sightline;
	private string $id;
	private string $txnTime;
	private string $status;
	private ?array $links = null;
	private bool $liveMode;

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
	 * This is the payment type. Possible values: SIGHTLINE
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
	 * Getter function for returnLinks
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
	 * Builder function for id
	 * 
	 * @param string $id
	 * 
	 * @return $this
	 */
	public function id(string $id): self
	{
		$this->setId($id);
		
		return $this;
	}

	/**
	 * Setter function for id
	 * 
	 * @param string $id
	 * 
	 * @return void
	 */
	public function setId(string $id): void
	{
		$this->id = $id;
	}

	/**
	 * This is the ID returned in the response. This ID can be used for future associated requests.
	 * 
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * Builder function for txnTime
	 * 
	 * @param string $txnTime
	 * 
	 * @return $this
	 */
	public function txnTime(string $txnTime): self
	{
		$this->setTxnTime($txnTime);
		
		return $this;
	}

	/**
	 * Setter function for txnTime
	 * 
	 * @param string $txnTime
	 * 
	 * @return void
	 */
	public function setTxnTime(string $txnTime): void
	{
		$this->txnTime = $txnTime;
	}

	/**
	 * This is the date and time the request was processed. For example: 2014-01-26T10:32:28Z
	 * 
	 * @return string
	 */
	public function getTxnTime(): string
	{
		return $this->txnTime;
	}

	/**
	 * Builder function for status
	 * 
	 * @param string $status
	 * 
	 * @return $this
	 */
	public function status(string $status): self
	{
		$this->setStatus($status);
		
		return $this;
	}

	/**
	 * Setter function for status
	 * 
	 * @param string $status
	 * 
	 * @return void
	 */
	public function setStatus(string $status): void
	{
		$this->status = $status;
	}

	/**
	 * This is the status of the transaction request. Possible values are:  <br />
	 * • INITIATED - The transaction has been initiated.  <br />
	 * • RECEIVED – Our system has received the request and is
     *      waiting for the downstream processor’s response.  <br />
	 * • COMPLETED – The transaction has been completed. <br />
	 * • PENDING – Our system has received the request but it has not yet been batched. <br />
	 * • FAILED – The transaction failed, due to either an error or being declined. <br />
	 * • CANCELLED – The request has been fully voided (reversed).
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Builder function for links
	 * 
	 * @param Link[] $links
	 * 
	 * @return $this
	 */
	public function links(array $links): self
	{
		$this->setLinks($links);
		
		return $this;
	}

	/**
	 * Setter function for links
	 * 
	 * @param Link[] $links
	 * 
	 * @return void
	 */
	public function setLinks(array $links): void
	{
		$this->links = $links;
	}

	/**
	 * Getter function for links
	 * 
	 * @return Link[]|null
	 */
	public function getLinks(): array
	{
		return $this->links;
	}

	/**
	 * Add new linksItem
	 * 
	 * @param Link $linksItem
	 * 
	 * @return $this
	 */
	public function addLinksItem(Link $linksItem): self
	{
		if ($this->links === null) {
			$this->setLinks([$linksItem]);
			
			return $this;
		}
		
		$links = $this->getLinks();
		$links[] = $linksItem;
		$this->setLinks($links);
		
		return $this;
	}

	/**
	 * Remove linksItem
	 * 
	 * @param Link $linksItem
	 * 
	 * @return $this
	 */
	public function removeLinksItem(Link $linksItem): self
	{
		$this->setLinks(array_diff($this->getLinks(), [$linksItem]));
		
		return $this;
	}

	/**
	 * Builder function for liveMode
	 * 
	 * @param bool $liveMode
	 * 
	 * @return $this
	 */
	public function liveMode(bool $liveMode): self
	{
		$this->setLiveMode($liveMode);
		
		return $this;
	}

	/**
	 * Setter function for liveMode
	 * 
	 * @param bool $liveMode
	 * 
	 * @return void
	 */
	public function setLiveMode(bool $liveMode): void
	{
		$this->liveMode = $liveMode;
	}

	/**
	 * This flag indicates the environment.  - true - Production - false - Non-Production
	 * 
	 * @return bool
	 */
	public function getLiveMode(): bool
	{
		return $this->liveMode;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class SightlineRegistration {" . PHP_EOL
			. "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL
			. "    paymentType: " . $this->toIndentedString($this->paymentType) . PHP_EOL
			. "    profile: " . $this->toIndentedString($this->profile) . PHP_EOL
			. "    billingDetails: " . $this->toIndentedString($this->billingDetails) . PHP_EOL
			. "    returnLinks: " . $this->toIndentedString($this->returnLinks) . PHP_EOL
			. "    sightline: " . $this->toIndentedString($this->sightline) . PHP_EOL
			. "    id: " . $this->toIndentedString($this->id) . PHP_EOL
			. "    txnTime: " . $this->toIndentedString($this->txnTime) . PHP_EOL
			. "    status: " . $this->toIndentedString($this->status) . PHP_EOL
			. "    links: " . $this->toIndentedString($this->links) . PHP_EOL
			. "    liveMode: " . $this->toIndentedString($this->liveMode) . PHP_EOL
			. "}";
	}
}
