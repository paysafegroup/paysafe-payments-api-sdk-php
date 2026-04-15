<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\PaymentHandle\DisplayOptions;

/**
 * FundingInstruction
 */
class FundingInstruction extends BaseModel
{

	private string $bankName;
	private string $expirationTime;
	private ?array $displayOptions = null;
	private ?array $steps = null;

	/**
	 * Builder function for bankName
	 * 
	 * @param string $bankName
	 * 
	 * @return $this
	 */
	public function bankName(string $bankName): self
	{
		$this->setBankName($bankName);
		
		return $this;
	}

	/**
	 * Setter function for bankName
	 * 
	 * @param string $bankName
	 * 
	 * @return void
	 */
	public function setBankName(string $bankName): void
	{
		$this->bankName = $bankName;
	}

	/**
	 * Get bankName
	 * 
	 * @return string
	 */
	public function getBankName(): string
	{
		return $this->bankName;
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
	 * Get expirationTime
	 * 
	 * @return string
	 */
	public function getExpirationTime(): string
	{
		return $this->expirationTime;
	}

	/**
	 * Builder function for displayOptions
	 * 
	 * @param DisplayOptions[] $displayOptions
	 * 
	 * @return $this
	 */
	public function displayOptions(array $displayOptions): self
	{
		$this->setDisplayOptions($displayOptions);
		
		return $this;
	}

	/**
	 * Setter function for displayOptions
	 * 
	 * @param DisplayOptions[] $displayOptions
	 * 
	 * @return void
	 */
	public function setDisplayOptions(array $displayOptions): void
	{
		$this->displayOptions = $displayOptions;
	}

	/**
	 * Get displayOptions
	 * 
	 * @return DisplayOptions[]|null
	 */
	public function getDisplayOptions(): array
	{
		return $this->displayOptions;
	}

	/**
	 * Add new displayOptionsItem
	 * 
	 * @param DisplayOptions $displayOptionsItem
	 * 
	 * @return $this
	 */
	public function addDisplayOptionsItem(DisplayOptions $displayOptionsItem): self
	{
		if ($this->displayOptions === null) {
			$this->setDisplayOptions([$displayOptionsItem]);
			
			return $this;
		}
		
		$displayOptions = $this->getDisplayOptions();
		$displayOptions[] = $displayOptionsItem;
		$this->setDisplayOptions($displayOptions);
		
		return $this;
	}

	/**
	 * Remove displayOptionsItem
	 * 
	 * @param DisplayOptions $displayOptionsItem
	 * 
	 * @return $this
	 */
	public function removeDisplayOptionsItem(DisplayOptions $displayOptionsItem): self
	{
		$this->setDisplayOptions(array_diff($this->getDisplayOptions(), [$displayOptionsItem]));
		
		return $this;
	}

	/**
	 * Builder function for steps
	 * 
	 * @param Step[] $steps
	 * 
	 * @return $this
	 */
	public function steps(array $steps): self
	{
		$this->setSteps($steps);
		
		return $this;
	}

	/**
	 * Setter function for steps
	 * 
	 * @param Step[] $steps
	 * 
	 * @return void
	 */
	public function setSteps(array $steps): void
	{
		$this->steps = $steps;
	}

	/**
	 * Get steps
	 * 
	 * @return Step[]|null
	 */
	public function getSteps(): array
	{
		return $this->steps;
	}

	/**
	 * Add new stepsItem
	 * 
	 * @param Step $stepsItem
	 * 
	 * @return $this
	 */
	public function addStepsItem(Step $stepsItem): self
	{
		if ($this->steps === null) {
			$this->setSteps([$stepsItem]);
			
			return $this;
		}
		
		$steps = $this->getSteps();
		$steps[] = $stepsItem;
		$this->setSteps($steps);
		
		return $this;
	}

	/**
	 * Remove stepsItem
	 * 
	 * @param Step $stepsItem
	 * 
	 * @return $this
	 */
	public function removeStepsItem(Step $stepsItem): self
	{
		$this->setSteps(array_diff($this->getSteps(), [$stepsItem]));
		
		return $this;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class FundingInstruction {" . PHP_EOL
			. "    bankName: " . $this->toIndentedString($this->bankName) . PHP_EOL
			. "    expirationTime: " . $this->toIndentedString($this->expirationTime) . PHP_EOL
			. "    displayOptions: " . $this->toIndentedString($this->displayOptions) . PHP_EOL
			. "    steps: " . $this->toIndentedString($this->steps) . PHP_EOL
			. "}";
	}
}
