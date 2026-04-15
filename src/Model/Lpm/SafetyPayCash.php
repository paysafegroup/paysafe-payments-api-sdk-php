<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

class SafetyPayCash extends BaseModel
{

	private string $countryCode;
	private ?array $bankNameCodes = null;

	/**
	 * Builder function for countryCode
	 * 
	 * @param string $countryCode
	 * 
	 * @return $this
	 */
	public function countryCode(string $countryCode): self
	{
		$this->setCountryCode($countryCode);
		
		return $this;
	}

	/**
	 * Setter function for countryCode
	 * 
	 * @param string $countryCode
	 * 
	 * @return void
	 */
	public function setCountryCode(string $countryCode): void
	{
		$this->countryCode = $countryCode;
	}

	/**
	 * Get countryCode.
	 * 
	 * @return string
	 */
	public function getCountryCode(): string
	{
		return $this->countryCode;
	}

	/**
	 * Builder function for bankNameCodes
	 * 
	 * @param string[] $bankNameCodes
	 * 
	 * @return $this
	 */
	public function bankNameCodes(array $bankNameCodes): self
	{
		$this->setBankNameCodes($bankNameCodes);
		
		return $this;
	}

	/**
	 * Setter function for bankNameCodes
	 * 
	 * @param string[] $bankNameCodes
	 * 
	 * @return void
	 */
	public function setBankNameCodes(array $bankNameCodes): void
	{
		$this->bankNameCodes = $bankNameCodes;
	}

	/**
	 * Get bankNameCodes.
	 * 
	 * @return string[]|null
	 */
	public function getBankNameCodes(): array
	{
		return $this->bankNameCodes;
	}

	/**
	 * Add new bankNameCodesItem
	 * 
	 * @param string $bankNameCodesItem
	 * 
	 * @return $this
	 */
	public function addBankNameCodesItem(string $bankNameCodesItem): self
	{
		if ($this->bankNameCodes === null) {
			$this->setBankNameCodes([$bankNameCodesItem]);
			
			return $this;
		}
		
		$bankNameCodes = $this->getBankNameCodes();
		$bankNameCodes[] = $bankNameCodesItem;
		$this->setBankNameCodes($bankNameCodes);
		
		return $this;
	}

	/**
	 * Remove bankNameCodesItem
	 * 
	 * @param string $bankNameCodesItem
	 * 
	 * @return $this
	 */
	public function removeBankNameCodesItem(string $bankNameCodesItem): self
	{
		$this->setBankNameCodes(array_diff($this->getBankNameCodes(), [$bankNameCodesItem]));
		
		return $this;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class SafetyPayCash {" . PHP_EOL
			. "    countryCode: " . $this->toIndentedString($this->countryCode) . PHP_EOL
			. "    bankNameCodes: " . $this->toIndentedString($this->bankNameCodes) . PHP_EOL
			. "}";
	}
}
