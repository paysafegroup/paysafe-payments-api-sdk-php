<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the details of the SafetyPay Bank Transfer account used for the request.
 * Only one payment instrument object (for example, card or SafetyPay
 * Bank Transfer) can be included in the request.
 */
class SafetyPayBankTransfer extends BaseModel
{

	private string $consumerId;
	private int $minAgeRestriction;
	private string $kycLevelRestriction;
	private string $submerchantId;
	private string $expirationTime;
	private ?array $barcodes = null;

	/**
	 * Builder function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return $this
	 */
	public function consumerId(string $consumerId): self
	{
		$this->setConsumerId($consumerId);
		
		return $this;
	}

	/**
	 * Setter function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return void
	 */
	public function setConsumerId(string $consumerId): void
	{
		$this->consumerId = $consumerId;
	}

	/**
	 * The ID of the consumer at the merchant site
	 * 
	 * @return string
	 */
	public function getConsumerId(): string
	{
		return $this->consumerId;
	}

	/**
	 * Builder function for minAgeRestriction
	 * 
	 * @param int $minAgeRestriction
	 * 
	 * @return $this
	 */
	public function minAgeRestriction(int $minAgeRestriction): self
	{
		$this->setMinAgeRestriction($minAgeRestriction);
		
		return $this;
	}

	/**
	 * Setter function for minAgeRestriction
	 * 
	 * @param int $minAgeRestriction
	 * 
	 * @return void
	 */
	public function setMinAgeRestriction(int $minAgeRestriction): void
	{
		$this->minAgeRestriction = $minAgeRestriction;
	}

	/**
	 * payment can be restricted for a certain minimum consumer age
     * (implicitly restricts payment to registered consumers only)
	 * minimum: 1
	 * maximum: 99
	 * 
	 * @return int
	 */
	public function getMinAgeRestriction(): int
	{
		return $this->minAgeRestriction;
	}

	/**
	 * Builder function for kycLevelRestriction
	 * 
	 * @param string $kycLevelRestriction
	 * 
	 * @return $this
	 */
	public function kycLevelRestriction(string $kycLevelRestriction): self
	{
		$this->setKycLevelRestriction($kycLevelRestriction);
		
		return $this;
	}

	/**
	 * Setter function for kycLevelRestriction
	 * 
	 * @param string $kycLevelRestriction
	 * 
	 * @return void
	 */
	public function setKycLevelRestriction(string $kycLevelRestriction): void
	{
		$this->kycLevelRestriction = $kycLevelRestriction;
	}

	/**
	 * payment can be restricted for a certain minimum kyc level
     * (implicitly restricts payment to registered consumers only)
	 * 
	 * @return string
	 */
	public function getKycLevelRestriction(): string
	{
		return $this->kycLevelRestriction;
	}

	/**
	 * Builder function for submerchantId
	 * 
	 * @param string $submerchantId
	 * 
	 * @return $this
	 */
	public function submerchantId(string $submerchantId): self
	{
		$this->setSubmerchantId($submerchantId);
		
		return $this;
	}

	/**
	 * Setter function for submerchantId
	 * 
	 * @param string $submerchantId
	 * 
	 * @return void
	 */
	public function setSubmerchantId(string $submerchantId): void
	{
		$this->submerchantId = $submerchantId;
	}

	/**
	 * sub-merchant id of APM customer
	 * 
	 * @return string
	 */
	public function getSubmerchantId(): string
	{
		return $this->submerchantId;
	}

	/**
	 * Builder function for expirationTime
	 * 
	 * @param string $expirationTime
	 * 
	 * @return $this
	 */
	public function expirationTime(string $expirationTime): self
	{
		$this->setExpirationTime($expirationTime);
		
		return $this;
	}

	/**
	 * Setter function for expirationTime
	 * 
	 * @param string $expirationTime
	 * 
	 * @return void
	 */
	public function setExpirationTime(string $expirationTime): void
	{
		$this->expirationTime = $expirationTime;
	}

	/**
	 * expiration time in minutes
	 * 
	 * @return string
	 */
	public function getExpirationTime(): string
	{
		return $this->expirationTime;
	}

	/**
	 * Builder function for barcodes
	 * 
	 * @param PagoefectivoBarcodesInner[] $barcodes
	 * 
	 * @return $this
	 */
	public function barcodes(array $barcodes): self
	{
		$this->setBarcodes($barcodes);
		
		return $this;
	}

	/**
	 * Setter function for barcodes
	 * 
	 * @param PagoefectivoBarcodesInner[] $barcodes
	 * 
	 * @return void
	 */
	public function setBarcodes(array $barcodes): void
	{
		$this->barcodes = $barcodes;
	}

	/**
	 * Get barcodes
	 * 
	 * @return PagoefectivoBarcodesInner[]|null
	 */
	public function getBarcodes(): array
	{
		return $this->barcodes;
	}

	/**
	 * Add new barcodesItem
	 * 
	 * @param PagoefectivoBarcodesInner $barcodesItem
	 * 
	 * @return $this
	 */
	public function addBarcodesItem(PagoefectivoBarcodesInner $barcodesItem): self
	{
		if ($this->barcodes === null) {
			$this->setBarcodes([$barcodesItem]);
			
			return $this;
		}
		
		$barcodes = $this->getBarcodes();
		$barcodes[] = $barcodesItem;
		$this->setBarcodes($barcodes);
		
		return $this;
	}

	/**
	 * Remove barcodesItem
	 * 
	 * @param PagoefectivoBarcodesInner $barcodesItem
	 * 
	 * @return $this
	 */
	public function removeBarcodesItem(PagoefectivoBarcodesInner $barcodesItem): self
	{
		$this->setBarcodes(array_diff($this->getBarcodes(), [$barcodesItem]));
		
		return $this;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class SafetyPayBankTransfer {" . PHP_EOL
			. "    consumerId: " . $this->toIndentedString($this->consumerId) . PHP_EOL
			. "    minAgeRestriction: " . $this->toIndentedString($this->minAgeRestriction) . PHP_EOL
			. "    kycLevelRestriction: " . $this->toIndentedString($this->kycLevelRestriction) . PHP_EOL
			. "    submerchantId: " . $this->toIndentedString($this->submerchantId) . PHP_EOL
			. "    expirationTime: " . $this->toIndentedString($this->expirationTime) . PHP_EOL
			. "    barcodes: " . $this->toIndentedString($this->barcodes) . PHP_EOL
			. "}";
	}
}
