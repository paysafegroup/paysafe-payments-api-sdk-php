<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;

use Paysafe\PhpSdk\Model\Common\Travel\Airline\Leg;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * A grouping of four separate trip segments. Each leg contains detailed itinerary information.
 */
class TripLegs extends BaseModel
{

	private Leg $leg1;
	private Leg $leg2;
	private Leg $leg3;
	private Leg $leg4;

	/**
	 * Builder function for leg1
	 * 
	 * @param Leg $leg1
	 * 
	 * @return TripLegs
	 */
	public function leg1(Leg $leg1): self
	{
		$this->setLeg1($leg1);
		
		return $this;
	}
	/**
	 * Setter function for leg1
	 * 
	 * @param Leg $leg1
	 * 
	 * @return void
	 */
	public function setLeg1(Leg $leg1): void
	{
		$this->leg1 = $leg1;
	}
	/**
	 * Getter function for leg1
	 * 
	 * @return Leg
	 */
	public function getLeg1(): Leg
	{
		return $this->leg1;
	}

	/**
	 * Builder function for leg2
	 * 
	 * @param Leg $leg2
	 * 
	 * @return TripLegs
	 */
	public function leg2(Leg $leg2): self
	{
		$this->setLeg2($leg2);
		
		return $this;
	}
	/**
	 * Setter function for leg2
	 * 
	 * @param Leg $leg2
	 * 
	 * @return void
	 */
	public function setLeg2(Leg $leg2): void
	{
		$this->leg2 = $leg2;
	}
	/**
	 * Getter function for leg2
	 * 
	 * @return Leg
	 */
	public function getLeg2(): Leg
	{
		return $this->leg2;
	}

	/**
	 * Builder function for leg3
	 * 
	 * @param Leg $leg3
	 * 
	 * @return TripLegs
	 */
	public function leg3(Leg $leg3): self
	{
		$this->setLeg3($leg3);
		
		return $this;
	}
	/**
	 * Setter function for leg3
	 * 
	 * @param Leg $leg3
	 * 
	 * @return void
	 */
	public function setLeg3(Leg $leg3): void
	{
		$this->leg3 = $leg3;
	}
	/**
	 * Getter function for leg3
	 * 
	 * @return Leg
	 */
	public function getLeg3(): Leg
	{
		return $this->leg3;
	}

	/**
	 * Builder function for leg4
	 * 
	 * @param Leg $leg4
	 * 
	 * @return TripLegs
	 */
	public function leg4(Leg $leg4): self
	{
		$this->setLeg4($leg4);
		
		return $this;
	}
	/**
	 * Setter function for leg4
	 * 
	 * @param Leg $leg4
	 * 
	 * @return void
	 */
	public function setLeg4(Leg $leg4): void
	{
		$this->leg4 = $leg4;
	}
	/**
	 * Getter function for leg4
	 * 
	 * @return Leg
	 */
	public function getLeg4(): Leg
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
		return "class TripLegs {" . PHP_EOL . 
			"	leg1: " . $this->toIndentedString($this->leg1) . PHP_EOL .
			"	leg2: " . $this->toIndentedString($this->leg2) . PHP_EOL .
			"	leg3: " . $this->toIndentedString($this->leg3) . PHP_EOL .
			"	leg4: " . $this->toIndentedString($this->leg4) . PHP_EOL .
		"}";
	}
}
