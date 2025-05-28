<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Discretionary Data consists of three user-defined data fields containing
 * additional information about your card acquirer. Contact your account manager for more information.
 */
class DiscretionaryData extends BaseModel
{

	/**
	 * Example: CustomField1
	 */
	private string $field1;

	/**
	 * Example: CustomField2
	 */
	private string $field2;

	/**
	 * Example: CustomField3
	 */
	private string $field3;


	/**
	 * Builder function for field1
	 * 
	 * @param string $field1
	 * 
	 * @return DiscretionaryData
	 */
	public function field1(string $field1): self
	{
		$this->setField1($field1);
		
		return $this;
	}
	/**
	 * Setter function for field1
	 * 
	 * @param string $field1
	 * 
	 * @return void
	 */
	public function setField1(string $field1): void
	{
		$this->field1 = $field1;
	}
	/**
	 * Getter function for field1
	 * 
	 * @return string
	 */
	public function getField1(): string
	{
		return $this->field1;
	}

	/**
	 * Builder function for field2
	 * 
	 * @param string $field2
	 * 
	 * @return DiscretionaryData
	 */
	public function field2(string $field2): self
	{
		$this->setField2($field2);
		
		return $this;
	}
	/**
	 * Setter function for field2
	 * 
	 * @param string $field2
	 * 
	 * @return void
	 */
	public function setField2(string $field2): void
	{
		$this->field2 = $field2;
	}
	/**
	 * Getter function for field2
	 * 
	 * @return string
	 */
	public function getField2(): string
	{
		return $this->field2;
	}

	/**
	 * Builder function for field3
	 * 
	 * @param string $field3
	 * 
	 * @return DiscretionaryData
	 */
	public function field3(string $field3): self
	{
		$this->setField3($field3);
		
		return $this;
	}
	/**
	 * Setter function for field3
	 * 
	 * @param string $field3
	 * 
	 * @return void
	 */
	public function setField3(string $field3): void
	{
		$this->field3 = $field3;
	}
	/**
	 * Getter function for field3
	 * 
	 * @return string
	 */
	public function getField3(): string
	{
		return $this->field3;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class DiscretionaryData {" . PHP_EOL .
			"	field1: " . $this->toIndentedString($this->field1) . PHP_EOL .
			"	field2: " . $this->toIndentedString($this->field2) . PHP_EOL .
			"	field3: " . $this->toIndentedString($this->field3) . PHP_EOL .
		"}";
	}
}
