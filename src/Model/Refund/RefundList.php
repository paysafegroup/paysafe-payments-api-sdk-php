<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Refund;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;

/**
 * RefundList
 */
class RefundList extends BaseModel
{

	private ?array $refunds = null;
	private Meta $meta;

	/**
	 * Builder function for refunds
	 * 
	 * @param Refund[] $refunds
	 * 
	 * @return $this
	 */
	public function refunds(array $refunds): self
	{
		$this->setRefunds($refunds);
		
		return $this;
	}

	/**
	 * Setter function for refunds
	 * 
	 * @param Refund[] $refunds
	 * 
	 * @return void
	 */
	public function setRefunds(array $refunds): void
	{
		$this->refunds = $refunds;
	}

	/**
	 * Get refunds
	 * 
	 * @return Refund[]|null
	 */
	public function getRefunds(): array
	{
		return $this->refunds;
	}

	/**
	 * Add new refundsItem
	 * 
	 * @param Refund $refundsItem
	 * 
	 * @return $this
	 */
	public function addRefundsItem(Refund $refundsItem): self
	{
		if ($this->refunds === null) {
			$this->setRefunds([$refundsItem]);
			
			return $this;
		}
		
		$refunds = $this->getRefunds();
		$refunds[] = $refundsItem;
		$this->setRefunds($refunds);
		
		return $this;
	}

	/**
	 * Remove refundsItem
	 * 
	 * @param Refund $refundsItem
	 * 
	 * @return $this
	 */
	public function removeRefundsItem(Refund $refundsItem): self
	{
		$this->setRefunds(array_diff($this->getRefunds(), [$refundsItem]));
		
		return $this;
	}

	/**
	 * Builder function for meta
	 * 
	 * @param Meta $meta
	 * 
	 * @return $this
	 */
	public function meta(Meta $meta): self
	{
		$this->setMeta($meta);
		
		return $this;
	}

	/**
	 * Setter function for meta
	 * 
	 * @param Meta $meta
	 * 
	 * @return void
	 */
	public function setMeta(Meta $meta): void
	{
		$this->meta = $meta;
	}

	/**
	 * Contains meta info for the pagination APIs
	 * 
	 * @return Meta
	 */
	public function getMeta(): Meta
	{
		return $this->meta;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class RefundList {" . PHP_EOL
			. "    refunds: " . $this->toIndentedString($this->refunds) . PHP_EOL
			. "    meta: " . $this->toIndentedString($this->meta) . PHP_EOL
			. "}";
	}
}
