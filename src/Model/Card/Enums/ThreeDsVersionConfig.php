<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\Enums;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Map of CardBrand and its ThreeDsVersion.  Possible values for CardBrand are:
 * <ul>
 * <li> VI - Visa  </li>
 * <li> MC - MasterCard  </li>
 * <li> DI - Discover  </li>
 * <li> AM - American Express  </li>
 * <li> DC - Diners Club  </li>
 * <li> VE - Visa Electron  </li>
 * <li> MD - Maestro  </li>
 * </ul>
 * <p>
 * Possible values for ThreeDsVersion are:
 * <ul>
 * <li> SKIP_3DS  </li>
 * <li> THREE_D_S_ONE  </li>
 * <li> THREE_D_S_TWO  </li>
 * <li> EXTERNAL_3DS  </li>
 * </ul>
 */
class ThreeDsVersionConfig extends BaseModel
{
	private string $VI;
	private string $MC;
	private string $DI;
	private string $AM;
	private string $DC;
	private string $VE;
	private string $MD;

	/**
	 * Builder function for VI
	 * 
	 * @param string $VI
	 * 
	 * @return ThreeDsVersionConfig
	 */
	public function VI(string $VI): self
	{
		$this->setVI($VI);
		
		return $this;
	}

	/**
	 * Setter function for VI
	 * 
	 * @param string $VI
	 * 
	 * @return void
	 */
	public function setVI(string $VI): void
	{
		$this->VI = $VI;
	}

	/**
	 * Get VI
	 * 
	 * @return string
	 */
	public function getVI(): string
	{
		return $this->VI;
	}

	/**
	 * Builder function for MC
	 * 
	 * @param string $MC
	 * 
	 * @return $this
	 */
	public function MC(string $MC): self
	{
		$this->setMC($MC);
		
		return $this;
	}

	/**
	 * Setter function for MC
	 * 
	 * @param string $MC
	 * 
	 * @return void
	 */
	public function setMC(string $MC): void
	{
		$this->MC = $MC;
	}

	/**
	 * Get MC
	 * 
	 * @return string
	 */
	public function getMC(): string
	{
		return $this->MC;
	}

	/**
	 * Builder function for DI
	 * 
	 * @param string $DI
	 * 
	 * @return $this
	 */
	public function DI(string $DI): self
	{
		$this->setDI($DI);
		
		return $this;
	}

	/**
	 * Setter function for DI
	 * 
	 * @param string $DI
	 * 
	 * @return void
	 */
	public function setDI(string $DI): void
	{
		$this->DI = $DI;
	}

	/**
	 * Get DI
	 * 
	 * @return string
	 */
	public function getDI(): string
	{
		return $this->DI;
	}

	/**
	 * Builder function for AM
	 * 
	 * @param string $AM
	 * 
	 * @return $this
	 */
	public function AM(string $AM): self
	{
		$this->setAM($AM);
		
		return $this;
	}

	/**
	 * Setter function for AM
	 * 
	 * @param string $AM
	 * 
	 * @return void
	 */
	public function setAM(string $AM): void
	{
		$this->AM = $AM;
	}

	/**
	 * Get AM
	 * 
	 * @return string
	 */
	public function getAM(): string
	{
		return $this->AM;
	}

	/**
	 * Builder function for DC
	 * 
	 * @param string $DC
	 * 
	 * @return $this
	 */
	public function DC(string $DC): self
	{
		$this->setDC($DC);
		
		return $this;
	}

	/**
	 * Setter function for DC
	 * 
	 * @param string $DC
	 * 
	 * @return void
	 */
	public function setDC(string $DC): void
	{
		$this->DC = $DC;
	}

	/**
	 * Get DC
	 * 
	 * @return string
	 */
	public function getDC(): string
	{
		return $this->DC;
	}

	/**
	 * Builder function for VE
	 * 
	 * @param string $VE
	 * 
	 * @return $this
	 */
	public function VE(string $VE): self
	{
		$this->setVE($VE);
		
		return $this;
	}

	/**
	 * Setter function for VE
	 * 
	 * @param string $VE
	 * 
	 * @return void
	 */
	public function setVE(string $VE): void
	{
		$this->VE = $VE;
	}

	/**
	 * Get VE
	 * 
	 * @return string
	 */
	public function getVE(): string
	{
		return $this->VE;
	}

	/**
	 * Builder function for MD
	 * 
	 * @param string $MD
	 * 
	 * @return $this
	 */
	public function MD(string $MD): self
	{
		$this->setMD($MD);
		
		return $this;
	}

	/**
	 * Setter function for MD
	 * 
	 * @param string $MD
	 * 
	 * @return void
	 */
	public function setMD(string $MD): void
	{
		$this->MD = $MD;
	}

	/**
	 * Get MD
	 * 
	 * @return string
	 */
	public function getMD(): string
	{
		return $this->MD;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ThreeDsVersionConfig {" . PHP_EOL
			. "    VI: " . $this->toIndentedString($this->VI) . PHP_EOL
			. "    MC: " . $this->toIndentedString($this->MC) . PHP_EOL
			. "    DI: " . $this->toIndentedString($this->DI) . PHP_EOL
			. "    AM: " . $this->toIndentedString($this->AM) . PHP_EOL
			. "    DC: " . $this->toIndentedString($this->DC) . PHP_EOL
			. "    VE: " . $this->toIndentedString($this->VE) . PHP_EOL
			. "    MD: " . $this->toIndentedString($this->MD) . PHP_EOL
			. "}";
	}
}
