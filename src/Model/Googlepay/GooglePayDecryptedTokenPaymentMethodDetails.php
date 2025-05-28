<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Googlepay;

use Paysafe\PhpSdk\Model\BaseModel;

class GooglePayDecryptedTokenPaymentMethodDetails extends BaseModel
{
	private string $authMethod;
	private string $pan;
	private int $expirationMonth;
	private int $expirationYear;
	private string $cryptogram;
	private string $eciIndicator;

	/**
	 * Builder function for authMethod
	 * 
	 * @param string $authMethod
	 * 
	 * @return $this
	 */
	public function authMethod(string $authMethod): self
	{
		$this->setAuthMethod($authMethod);
		
		return $this;
	}

	/**
	 * Setter function for authMethod
	 * 
	 * @param string $authMethod
	 * 
	 * @return void
	 */
	public function setAuthMethod(string $authMethod): void
	{
		$this->authMethod = $authMethod;
	}

	/**
	 * Getter function for authMethod
	 * 
	 * @return string
	 */
	public function getAuthMethod(): string
	{
		return $this->authMethod;
	}

	/**
	 * Builder function for pan
	 * 
	 * @param string $pan
	 * 
	 * @return $this
	 */
	public function pan(string $pan): self
	{
		$this->setPan($pan);
		
		return $this;
	}

	/**
	 * Setter function for pan
	 * 
	 * @param string $pan
	 * 
	 * @return void
	 */
	public function setPan(string $pan): void
	{
		$this->pan = $pan;
	}

	/**
	 * Getter function for pan
	 * 
	 * @return string
	 */
	public function getPan(): string
	{
		return $this->pan;
	}

	/**
	 * Builder function for expirationMonth
	 * 
	 * @param int $expirationMonth
	 * 
	 * @return $this
	 */
	public function expirationMonth(int $expirationMonth): self
	{
		$this->setExpirationMonth($expirationMonth);
		
		return $this;
	}

	/**
	 * Setter function for expirationMonth
	 * 
	 * @param int $expirationMonth
	 * 
	 * @return void
	 */
	public function setExpirationMonth(int $expirationMonth): void
	{
		$this->expirationMonth = $expirationMonth;
	}

	/**
	 * Getter function for expirationMonth
	 * 
	 * @return int
	 */
	public function getExpirationMonth(): int
	{
		return $this->expirationMonth;
	}

	/**
	 * Builder function for expirationYear
	 * 
	 * @param int $expirationYear
	 * 
	 * @return $this
	 */
	public function expirationYear(int $expirationYear): self
	{
		$this->setExpirationYear($expirationYear);
		
		return $this;
	}

	/**
	 * Setter function for expirationYear
	 * 
	 * @param int $expirationYear
	 * 
	 * @return void
	 */
	public function setExpirationYear(int $expirationYear): void
	{
		$this->expirationYear = $expirationYear;
	}

	/**
	 * Getter function for expirationYear
	 * 
	 * @return int
	 */
	public function getExpirationYear(): int
	{
		return $this->expirationYear;
	}

	/**
	 * Builder function for cryptogram
	 * 
	 * @param string $cryptogram
	 * 
	 * @return $this
	 */
	public function cryptogram(string $cryptogram): self
	{
		$this->setCryptogram($cryptogram);
		
		return $this;
	}

	/**
	 * Setter function for cryptogram
	 * 
	 * @param string $cryptogram
	 * 
	 * @return void
	 */
	public function setCryptogram(string $cryptogram): void
	{
		$this->cryptogram = $cryptogram;
	}

	/**
	 * Getter function for cryptogram
	 * 
	 * @return string
	 */
	public function getCryptogram(): string
	{
		return $this->cryptogram;
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
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class GooglePayDecryptedTokenPaymentMethodDetails {" . PHP_EOL
			. "    authMethod: " . $this->toIndentedString($this->authMethod) . PHP_EOL
			. "    pan: " . $this->toIndentedString($this->pan) . PHP_EOL
			. "    expirationMonth: " . $this->toIndentedString($this->expirationMonth) . PHP_EOL
			. "    expirationYear: " . $this->toIndentedString($this->expirationYear) . PHP_EOL
			. "    cryptogram: " . $this->toIndentedString($this->cryptogram) . PHP_EOL
			. "    eciIndicator: " . $this->toIndentedString($this->eciIndicator) . PHP_EOL
			. "}";
	}
}
