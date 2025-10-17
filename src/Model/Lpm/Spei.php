<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\FundingInstruction;

/**
 * These are the details of the spei account used for the request.
 * Only one payment instrument object (for example, card or spei)
 * can be included in the request.
 */
class Spei extends BaseModel
{

	private ?array $fundingInstructions = null;

	/**
	 * Builder function for fundingInstructions
	 * 
	 * @param FundingInstruction[] $fundingInstructions
	 * 
	 * @return $this
	 */
	public function fundingInstructions(array $fundingInstructions): self
	{
		$this->setFundingInstructions($fundingInstructions);
		
		return $this;
	}

	/**
	 * Setter function for fundingInstructions
	 * 
	 * @param FundingInstruction[] $fundingInstructions
	 * 
	 * @return void
	 */
	public function setFundingInstructions(array $fundingInstructions): void
	{
		$this->fundingInstructions = $fundingInstructions;
	}

	/**
	 * Get fundingInstructions
	 * 
	 * @return FundingInstruction[]|null
	 */
	public function getFundingInstructions(): array
	{
		return $this->fundingInstructions;
	}

	/**
	 * Add new fundingInstructionsItem
	 * 
	 * @param FundingInstruction $fundingInstructionsItem
	 * 
	 * @return $this
	 */
	public function addFundingInstructionsItem(FundingInstruction $fundingInstructionsItem): self
	{
		if ($this->fundingInstructions === null) {
			$this->setFundingInstructions([$fundingInstructionsItem]);
			
			return $this;
		}
		
		$fundingInstructions = $this->getFundingInstructions();
		$fundingInstructions[] = $fundingInstructionsItem;
		$this->setFundingInstructions($fundingInstructions);
		
		return $this;
	}

	/**
	 * Remove fundingInstructionsItem
	 * 
	 * @param FundingInstruction $fundingInstructionsItem
	 * 
	 * @return $this
	 */
	public function removeFundingInstructionsItem(FundingInstruction $fundingInstructionsItem): self
	{
		$this->setFundingInstructions(array_diff($this->getFundingInstructions(), [$fundingInstructionsItem]));
		
		return $this;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Spei {" . PHP_EOL
			. "    fundingInstructions: " . $this->toIndentedString($this->fundingInstructions) . PHP_EOL
			. "}";
	}
}
