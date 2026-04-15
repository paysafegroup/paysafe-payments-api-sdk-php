<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * step
 */
class Step extends BaseModel
{

	/**
	 * Example: 1
	 */
	private int $number;

	/**
	 * Example: Log on to online banking for Scotiabank as usual.
	 */
	private string $instruction;


	/**
	 * Builder function for number
	 * 
	 * @param int $number
	 * 
	 * @return Step
	 */
	public function number(int $number): self
	{
		$this->setNumber($number);
		
		return $this;
	}
	/**
	 * Setter function for number
	 * 
	 * @param int $number
	 * 
	 * @return void
	 */
	public function setNumber(int $number): void
	{
		$this->number = $number;
	}
	/**
	 * Getter function for number
	 * 
	 * @return int
	 */
	public function getNumber(): int
	{
		return $this->number;
	}

	/**
	 * Builder function for instruction
	 * 
	 * @param string $instruction
	 * 
	 * @return Step
	 */
	public function instruction(string $instruction): self
	{
		$this->setInstruction($instruction);
		
		return $this;
	}
	/**
	 * Setter function for instruction
	 * 
	 * @param string $instruction
	 * 
	 * @return void
	 */
	public function setInstruction(string $instruction): void
	{
		$this->instruction = $instruction;
	}
	/**
	 * Getter function for instruction
	 * 
	 * @return string
	 */
	public function getInstruction(): string
	{
		return $this->instruction;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Step {" . PHP_EOL . 
			"	number: " . $this->toIndentedString($this->number) . PHP_EOL .
			"	instruction: " . $this->toIndentedString($this->instruction) . PHP_EOL .
		"}";
	}
}
