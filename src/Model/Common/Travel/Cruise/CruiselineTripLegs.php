<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Cruise;

use Paysafe\PhpSdk\Model\Common\Travel\Cruise\CruiselineLeg;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * A grouping of up to four [cruise line legs](/schemas/cruiselineTripLegs). Each leg provides detailed itinerary data.

**Note** This object is only for Cruise line Merchants
 */
class CruiselineTripLegs extends BaseModel
{

	private CruiselineLeg $leg1;
	private CruiselineLeg $leg2;
	private CruiselineLeg $leg3;
	private CruiselineLeg $leg4;

	/**
	 * Builder function for leg1
	 * 
	 * @param CruiselineLeg $leg1
	 * 
	 * @return CruiselineTripLegs
	 */
	public function leg1(CruiselineLeg $leg1): self
	{
		$this->setLeg1($leg1);
		
		return $this;
	}
	/**
	 * Setter function for leg1
	 * 
	 * @param CruiselineLeg $leg1
	 * 
	 * @return void
	 */
	public function setLeg1(CruiselineLeg $leg1): void
	{
		$this->leg1 = $leg1;
	}
	/**
	 * Getter function for leg1
	 * 
	 * @return CruiselineLeg
	 */
	public function getLeg1(): CruiselineLeg
	{
		return $this->leg1;
	}

	/**
	 * Builder function for leg2
	 * 
	 * @param CruiselineLeg $leg2
	 * 
	 * @return CruiselineTripLegs
	 */
	public function leg2(CruiselineLeg $leg2): self
	{
		$this->setLeg2($leg2);
		
		return $this;
	}
	/**
	 * Setter function for leg2
	 * 
	 * @param CruiselineLeg $leg2
	 * 
	 * @return void
	 */
	public function setLeg2(CruiselineLeg $leg2): void
	{
		$this->leg2 = $leg2;
	}
	/**
	 * Getter function for leg2
	 * 
	 * @return CruiselineLeg
	 */
	public function getLeg2(): CruiselineLeg
	{
		return $this->leg2;
	}

	/**
	 * Builder function for leg3
	 * 
	 * @param CruiselineLeg $leg3
	 * 
	 * @return CruiselineTripLegs
	 */
	public function leg3(CruiselineLeg $leg3): self
	{
		$this->setLeg3($leg3);
		
		return $this;
	}
	/**
	 * Setter function for leg3
	 * 
	 * @param CruiselineLeg $leg3
	 * 
	 * @return void
	 */
	public function setLeg3(CruiselineLeg $leg3): void
	{
		$this->leg3 = $leg3;
	}
	/**
	 * Getter function for leg3
	 * 
	 * @return CruiselineLeg
	 */
	public function getLeg3(): CruiselineLeg
	{
		return $this->leg3;
	}

	/**
	 * Builder function for leg4
	 * 
	 * @param CruiselineLeg $leg4
	 * 
	 * @return CruiselineTripLegs
	 */
	public function leg4(CruiselineLeg $leg4): self
	{
		$this->setLeg4($leg4);
		
		return $this;
	}
	/**
	 * Setter function for leg4
	 * 
	 * @param CruiselineLeg $leg4
	 * 
	 * @return void
	 */
	public function setLeg4(CruiselineLeg $leg4): void
	{
		$this->leg4 = $leg4;
	}
	/**
	 * Getter function for leg4
	 * 
	 * @return CruiselineLeg
	 */
	public function getLeg4(): CruiselineLeg
	{
		return $this->leg4;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class CruiselineTripLegs {" . PHP_EOL . 
			"	leg1: " . $this->toIndentedString($this->leg1) . PHP_EOL .
			"	leg2: " . $this->toIndentedString($this->leg2) . PHP_EOL .
			"	leg3: " . $this->toIndentedString($this->leg3) . PHP_EOL .
			"	leg4: " . $this->toIndentedString($this->leg4) . PHP_EOL .
		"}";
	}
}
