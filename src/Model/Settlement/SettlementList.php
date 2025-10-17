<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Settlement;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;

/**
 * SettlementList
 */
class SettlementList extends BaseModel
{

	private ?array $settlements = null;
	private Meta $meta;

	/**
	 * Builder function for settlements
	 * 
	 * @param Settlement[] $settlements
	 * 
	 * @return $this
	 */
	public function settlements(array $settlements): self
	{
		$this->setSettlements($settlements);
		
		return $this;
	}

	/**
	 * Setter function for settlements
	 * 
	 * @param Settlement[] $settlements
	 * 
	 * @return void
	 */
	public function setSettlements(array $settlements): void
	{
		$this->settlements = $settlements;
	}

	/**
	 * An array of Settlements.
	 * 
	 * @return Settlement[]|null
	 */
	public function getSettlements(): array
	{
		return $this->settlements;
	}

	/**
	 * Add new settlementsItem
	 * 
	 * @param Settlement $settlementsItem
	 * 
	 * @return $this
	 */
	public function addSettlementsItem(Settlement $settlementsItem): self
	{
		if ($this->settlements === null) {
			$this->setSettlements([$settlementsItem]);
			
			return $this;
		}
		
		$settlements = $this->getSettlements();
		$settlements[] = $settlementsItem;
		$this->setSettlements($settlements);
		
		return $this;
	}

	/**
	 * Remove settlementsItem
	 * 
	 * @param Settlement $settlementsItem
	 * 
	 * @return $this
	 */
	public function removeSettlementsItem(Settlement $settlementsItem): self
	{
		$this->setSettlements(array_diff($this->getSettlements(), [$settlementsItem]));
		
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
		return "class SettlementList {" . PHP_EOL
			. "    settlements: " . $this->toIndentedString($this->settlements) . PHP_EOL
			. "    meta: " . $this->toIndentedString($this->meta) . PHP_EOL
			. "}";
	}
}
