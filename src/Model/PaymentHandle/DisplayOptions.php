<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\PaymentHandle;

use Paysafe\PhpSdk\Model\BaseModel;

class DisplayOptions extends BaseModel
{
	private string $name;
	private string $value;
	private string $displayLabel;

	/**
	 * Builder function for name
	 * 
	 * @param string $name
	 * 
	 * @return $this
	 */
	public function name(string $name): self
	{
		$this->setName($name);
		
		return $this;
	}

	/**
	 * Setter function for name
	 * 
	 * @param string $name
	 * 
	 * @return void
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}

	/**
	 * Getter function for name
	 * 
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Builder function for value
	 * 
	 * @param string $value
	 * 
	 * @return $this
	 */
	public function value(string $value): self
	{
		$this->setValue($value);
		
		return $this;
	}

	/**
	 * Setter function for value
	 * 
	 * @param string $value
	 * 
	 * @return void
	 */
	public function setValue(string $value): void
	{
		$this->value = $value;
	}

	/**
	 * Getter function for value
	 * 
	 * @return string
	 */
	public function getValue(): string
	{
		return $this->value;
	}

	/**
	 * Builder function for displayLabel
	 * 
	 * @param string $displayLabel
	 * 
	 * @return $this
	 */
	public function displayLabel(string $displayLabel): self
	{
		$this->setDisplayLabel($displayLabel);
		
		return $this;
	}

	/**
	 * Setter function for displayLabel
	 * 
	 * @param string $displayLabel
	 * 
	 * @return void
	 */
	public function setDisplayLabel(string $displayLabel): void
	{
		$this->displayLabel = $displayLabel;
	}

	/**
	 * Getter function for displayLabel
	 * 
	 * @return string
	 */
	public function getDisplayLabel(): string
	{
		return $this->displayLabel;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class DisplayOptions {" . PHP_EOL
			. "    name: " . $this->toIndentedString($this->name) . PHP_EOL
			. "    value: " . $this->toIndentedString($this->value) . PHP_EOL
			. "    displayLabel: " . $this->toIndentedString($this->displayLabel) . PHP_EOL
			. "}";
	}
}
