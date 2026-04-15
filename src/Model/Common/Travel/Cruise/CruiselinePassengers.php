<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Cruise;

use Paysafe\PhpSdk\Model\Common\Travel\Cruise\CruiselinePassenger;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * A grouping of up to ten [cruise line passengers](/schemas/cruiselinePassengers).

**Note** This object is only for Cruise line Merchants
 */
class CruiselinePassengers extends BaseModel
{

	private CruiselinePassenger $passenger1;
	private CruiselinePassenger $passenger2;
	private CruiselinePassenger $passenger3;
	private CruiselinePassenger $passenger4;
	private CruiselinePassenger $passenger5;
	private CruiselinePassenger $passenger6;
	private CruiselinePassenger $passenger7;
	private CruiselinePassenger $passenger8;
	private CruiselinePassenger $passenger9;
	private CruiselinePassenger $passenger10;

	/**
	 * Builder function for passenger1
	 * 
	 * @param CruiselinePassenger $passenger1
	 * 
	 * @return CruiselinePassengers
	 */
	public function passenger1(CruiselinePassenger $passenger1): self
	{
		$this->setPassenger1($passenger1);
		
		return $this;
	}
	/**
	 * Setter function for passenger1
	 * 
	 * @param CruiselinePassenger $passenger1
	 * 
	 * @return void
	 */
	public function setPassenger1(CruiselinePassenger $passenger1): void
	{
		$this->passenger1 = $passenger1;
	}
	/**
	 * Getter function for passenger1
	 * 
	 * @return CruiselinePassenger
	 */
	public function getPassenger1(): CruiselinePassenger
	{
		return $this->passenger1;
	}

	/**
	 * Builder function for passenger2
	 * 
	 * @param CruiselinePassenger $passenger2
	 * 
	 * @return CruiselinePassengers
	 */
	public function passenger2(CruiselinePassenger $passenger2): self
	{
		$this->setPassenger2($passenger2);
		
		return $this;
	}
	/**
	 * Setter function for passenger2
	 * 
	 * @param CruiselinePassenger $passenger2
	 * 
	 * @return void
	 */
	public function setPassenger2(CruiselinePassenger $passenger2): void
	{
		$this->passenger2 = $passenger2;
	}
	/**
	 * Getter function for passenger2
	 * 
	 * @return CruiselinePassenger
	 */
	public function getPassenger2(): CruiselinePassenger
	{
		return $this->passenger2;
	}

	/**
	 * Builder function for passenger3
	 * 
	 * @param CruiselinePassenger $passenger3
	 * 
	 * @return CruiselinePassengers
	 */
	public function passenger3(CruiselinePassenger $passenger3): self
	{
		$this->setPassenger3($passenger3);
		
		return $this;
	}
	/**
	 * Setter function for passenger3
	 * 
	 * @param CruiselinePassenger $passenger3
	 * 
	 * @return void
	 */
	public function setPassenger3(CruiselinePassenger $passenger3): void
	{
		$this->passenger3 = $passenger3;
	}
	/**
	 * Getter function for passenger3
	 * 
	 * @return CruiselinePassenger
	 */
	public function getPassenger3(): CruiselinePassenger
	{
		return $this->passenger3;
	}

	/**
	 * Builder function for passenger4
	 * 
	 * @param CruiselinePassenger $passenger4
	 * 
	 * @return CruiselinePassengers
	 */
	public function passenger4(CruiselinePassenger $passenger4): self
	{
		$this->setPassenger4($passenger4);
		
		return $this;
	}
	/**
	 * Setter function for passenger4
	 * 
	 * @param CruiselinePassenger $passenger4
	 * 
	 * @return void
	 */
	public function setPassenger4(CruiselinePassenger $passenger4): void
	{
		$this->passenger4 = $passenger4;
	}
	/**
	 * Getter function for passenger4
	 * 
	 * @return CruiselinePassenger
	 */
	public function getPassenger4(): CruiselinePassenger
	{
		return $this->passenger4;
	}

	/**
	 * Builder function for passenger5
	 * 
	 * @param CruiselinePassenger $passenger5
	 * 
	 * @return CruiselinePassengers
	 */
	public function passenger5(CruiselinePassenger $passenger5): self
	{
		$this->setPassenger5($passenger5);
		
		return $this;
	}
	/**
	 * Setter function for passenger5
	 * 
	 * @param CruiselinePassenger $passenger5
	 * 
	 * @return void
	 */
	public function setPassenger5(CruiselinePassenger $passenger5): void
	{
		$this->passenger5 = $passenger5;
	}
	/**
	 * Getter function for passenger5
	 * 
	 * @return CruiselinePassenger
	 */
	public function getPassenger5(): CruiselinePassenger
	{
		return $this->passenger5;
	}

	/**
	 * Builder function for passenger6
	 * 
	 * @param CruiselinePassenger $passenger6
	 * 
	 * @return CruiselinePassengers
	 */
	public function passenger6(CruiselinePassenger $passenger6): self
	{
		$this->setPassenger6($passenger6);
		
		return $this;
	}
	/**
	 * Setter function for passenger6
	 * 
	 * @param CruiselinePassenger $passenger6
	 * 
	 * @return void
	 */
	public function setPassenger6(CruiselinePassenger $passenger6): void
	{
		$this->passenger6 = $passenger6;
	}
	/**
	 * Getter function for passenger6
	 * 
	 * @return CruiselinePassenger
	 */
	public function getPassenger6(): CruiselinePassenger
	{
		return $this->passenger6;
	}

	/**
	 * Builder function for passenger7
	 * 
	 * @param CruiselinePassenger $passenger7
	 * 
	 * @return CruiselinePassengers
	 */
	public function passenger7(CruiselinePassenger $passenger7): self
	{
		$this->setPassenger7($passenger7);
		
		return $this;
	}
	/**
	 * Setter function for passenger7
	 * 
	 * @param CruiselinePassenger $passenger7
	 * 
	 * @return void
	 */
	public function setPassenger7(CruiselinePassenger $passenger7): void
	{
		$this->passenger7 = $passenger7;
	}
	/**
	 * Getter function for passenger7
	 * 
	 * @return CruiselinePassenger
	 */
	public function getPassenger7(): CruiselinePassenger
	{
		return $this->passenger7;
	}

	/**
	 * Builder function for passenger8
	 * 
	 * @param CruiselinePassenger $passenger8
	 * 
	 * @return CruiselinePassengers
	 */
	public function passenger8(CruiselinePassenger $passenger8): self
	{
		$this->setPassenger8($passenger8);
		
		return $this;
	}
	/**
	 * Setter function for passenger8
	 * 
	 * @param CruiselinePassenger $passenger8
	 * 
	 * @return void
	 */
	public function setPassenger8(CruiselinePassenger $passenger8): void
	{
		$this->passenger8 = $passenger8;
	}
	/**
	 * Getter function for passenger8
	 * 
	 * @return CruiselinePassenger
	 */
	public function getPassenger8(): CruiselinePassenger
	{
		return $this->passenger8;
	}

	/**
	 * Builder function for passenger9
	 * 
	 * @param CruiselinePassenger $passenger9
	 * 
	 * @return CruiselinePassengers
	 */
	public function passenger9(CruiselinePassenger $passenger9): self
	{
		$this->setPassenger9($passenger9);
		
		return $this;
	}
	/**
	 * Setter function for passenger9
	 * 
	 * @param CruiselinePassenger $passenger9
	 * 
	 * @return void
	 */
	public function setPassenger9(CruiselinePassenger $passenger9): void
	{
		$this->passenger9 = $passenger9;
	}
	/**
	 * Getter function for passenger9
	 * 
	 * @return CruiselinePassenger
	 */
	public function getPassenger9(): CruiselinePassenger
	{
		return $this->passenger9;
	}

	/**
	 * Builder function for passenger10
	 * 
	 * @param CruiselinePassenger $passenger10
	 * 
	 * @return CruiselinePassengers
	 */
	public function passenger10(CruiselinePassenger $passenger10): self
	{
		$this->setPassenger10($passenger10);
		
		return $this;
	}
	/**
	 * Setter function for passenger10
	 * 
	 * @param CruiselinePassenger $passenger10
	 * 
	 * @return void
	 */
	public function setPassenger10(CruiselinePassenger $passenger10): void
	{
		$this->passenger10 = $passenger10;
	}
	/**
	 * Getter function for passenger10
	 * 
	 * @return CruiselinePassenger
	 */
	public function getPassenger10(): CruiselinePassenger
	{
		return $this->passenger10;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class CruiselinePassengers {" . PHP_EOL .
			"	passenger1: " . $this->toIndentedString($this->passenger1) . PHP_EOL .
			"	passenger2: " . $this->toIndentedString($this->passenger2) . PHP_EOL .
			"	passenger3: " . $this->toIndentedString($this->passenger3) . PHP_EOL .
			"	passenger4: " . $this->toIndentedString($this->passenger4) . PHP_EOL .
			"	passenger5: " . $this->toIndentedString($this->passenger5) . PHP_EOL .
			"	passenger6: " . $this->toIndentedString($this->passenger6) . PHP_EOL .
			"	passenger7: " . $this->toIndentedString($this->passenger7) . PHP_EOL .
			"	passenger8: " . $this->toIndentedString($this->passenger8) . PHP_EOL .
			"	passenger9: " . $this->toIndentedString($this->passenger9) . PHP_EOL .
			"	passenger10: " . $this->toIndentedString($this->passenger10) . PHP_EOL .
		"}";
	}
}
