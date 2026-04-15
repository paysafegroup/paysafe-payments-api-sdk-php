<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Applepay;

use Paysafe\PhpSdk\Model\BaseModel;

class ApplePayDecryptedTokenPaymentData extends BaseModel
{
	private string $onlinePaymentCryptogram;
	private string $eciIndicator;
	private string $emvData;

	/**
	 * Builder function for onlinePaymentCryptogram
	 * 
	 * @param string $onlinePaymentCryptogram
	 * 
	 * @return $this
	 */
	public function onlinePaymentCryptogram(string $onlinePaymentCryptogram): self
	{
		$this->setOnlinePaymentCryptogram($onlinePaymentCryptogram);
		
		return $this;
	}

	/**
	 * Setter function for onlinePaymentCryptogram
	 * 
	 * @param string $onlinePaymentCryptogram
	 * 
	 * @return void
	 */
	public function setOnlinePaymentCryptogram(string $onlinePaymentCryptogram): void
	{
		$this->onlinePaymentCryptogram = $onlinePaymentCryptogram;
	}

	/**
	 * Getter function for onlinePaymentCryptogram
	 * 
	 * @return string
	 */
	public function getOnlinePaymentCryptogram(): string
	{
		return $this->onlinePaymentCryptogram;
	}

	/**
	 * Builder function for eciIndicator
	 * 
	 * @param string $eciIndicator
	 * 
	 * @return $this
	 */
	public function eciIndicator(string $eciIndicator): self
	{
		$this->setEciIndicator($eciIndicator);
		
		return $this;
	}

	/**
	 * Setter function for eciIndicator
	 * 
	 * @param string $eciIndicator
	 * 
	 * @return void
	 */
	public function setEciIndicator(string $eciIndicator): void
	{
		$this->eciIndicator = $eciIndicator;
	}

	/**
	 * Getter function for eciIndicator
	 * 
	 * @return string
	 */
	public function getEciIndicator(): string
	{
		return $this->eciIndicator;
	}

	/**
	 * Builder function for emvData
	 * 
	 * @param string $emvData
	 * 
	 * @return $this
	 */
	public function emvData(string $emvData): self
	{
		$this->setEmvData($emvData);
		
		return $this;
	}

	/**
	 * Setter function for emvData
	 * 
	 * @param string $emvData
	 * 
	 * @return void
	 */
	public function setEmvData(string $emvData): void
	{
		$this->emvData = $emvData;
	}

	/**
	 * Getter function for emvData
	 * 
	 * @return string
	 */
	public function getEmvData(): string
	{
		return $this->emvData;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ApplePayDecryptedTokenPaymentData {" . PHP_EOL
			. "    onlinePaymentCryptogram: " . $this->toIndentedString($this->onlinePaymentCryptogram) . PHP_EOL
			. "    eciIndicator: " . $this->toIndentedString($this->eciIndicator) . PHP_EOL
			. "    emvData: " . $this->toIndentedString($this->emvData) . PHP_EOL
			. "}";
	}
}
