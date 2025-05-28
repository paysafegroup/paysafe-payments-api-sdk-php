<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\StandaloneCredit;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;

/**
 * StandaloneCreditList
 */
class StandaloneCreditList extends BaseModel
{

	private ?array $standaloneCredits = null;
	private Meta $meta;

	/**
	 * Builder function for standaloneCredits
	 * 
	 * @param StandaloneCredit[] $standaloneCredits
	 * 
	 * @return $this
	 */
	public function standaloneCredits(array $standaloneCredits): self
	{
		$this->setStandaloneCredits($standaloneCredits);
		
		return $this;
	}

	/**
	 * Setter function for standaloneCredits
	 * 
	 * @param StandaloneCredit[] $standaloneCredits
	 * 
	 * @return void
	 */
	public function setStandaloneCredits(array $standaloneCredits): void
	{
		$this->standaloneCredits = $standaloneCredits;
	}

	/**
	 * An array of Standalone Credits.
	 * 
	 * @return StandaloneCredit[]|null
	 */
	public function getStandaloneCredits(): array
	{
		return $this->standaloneCredits;
	}

	/**
	 * Add new standaloneCreditsItem
	 * 
	 * @param StandaloneCredit $standaloneCreditsItem
	 * 
	 * @return $this
	 */
	public function addStandaloneCreditsItem(StandaloneCredit $standaloneCreditsItem): self
	{
		if ($this->standaloneCredits === null) {
			$this->setStandaloneCredits([$standaloneCreditsItem]);
			
			return $this;
		}
		
		$standaloneCredits = $this->getStandaloneCredits();
		$standaloneCredits[] = $standaloneCreditsItem;
		$this->setStandaloneCredits($standaloneCredits);
		
		return $this;
	}

	/**
	 * Remove standaloneCreditsItem
	 * 
	 * @param StandaloneCredit $standaloneCreditsItem
	 * 
	 * @return $this
	 */
	public function removeStandaloneCreditsItem(StandaloneCredit $standaloneCreditsItem): self
	{
		$this->setStandaloneCredits(array_diff($this->getStandaloneCredits(), [$standaloneCreditsItem]));
		
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
		return "class StandaloneCreditList {" . PHP_EOL
			. "    standaloneCredits: " . $this->toIndentedString($this->standaloneCredits) . PHP_EOL
			. "    meta: " . $this->toIndentedString($this->meta) . PHP_EOL
			. "}";
	}
}
