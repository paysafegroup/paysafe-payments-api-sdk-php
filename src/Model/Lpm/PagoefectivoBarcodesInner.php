<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

class PagoefectivoBarcodesInner extends BaseModel
{
	private string $barcode;
	private string $visualization;
	private string $country;
	private string $expiresAt;
	private string $message;
	private string $code;

	/**
	 * Builder function for barcode
	 * 
	 * @param string $barcode
	 * 
	 * @return $this
	 */
	public function barcode(string $barcode): self
	{
		$this->setBarcode($barcode);
		
		return $this;
	}

	/**
	 * Setter function for barcode
	 * 
	 * @param string $barcode
	 * 
	 * @return void
	 */
	public function setBarcode(string $barcode): void
	{
		$this->barcode = $barcode;
	}

	/**
	 * Getter function for barcode
	 * 
	 * @return string
	 */
	public function getBarcode(): string
	{
		return $this->barcode;
	}

	/**
	 * Builder function for visualization
	 * 
	 * @param string $visualization
	 * 
	 * @return $this
	 */
	public function visualization(string $visualization): self
	{
		$this->setVisualization($visualization);
		
		return $this;
	}

	/**
	 * Setter function for visualization
	 * 
	 * @param string $visualization
	 * 
	 * @return void
	 */
	public function setVisualization(string $visualization): void
	{
		$this->visualization = $visualization;
	}

	/**
	 * Getter function for visualization
	 * 
	 * @return string
	 */
	public function getVisualization(): string
	{
		return $this->visualization;
	}

	/**
	 * Builder function for country
	 * 
	 * @param string $country
	 * 
	 * @return $this
	 */
	public function country(string $country): self
	{
		$this->setCountry($country);
		
		return $this;
	}

	/**
	 * Setter function for country
	 * 
	 * @param string $country
	 * 
	 * @return void
	 */
	public function setCountry(string $country): void
	{
		$this->country = $country;
	}

	/**
	 * Getter function for country
	 * 
	 * @return string
	 */
	public function getCountry(): string
	{
		return $this->country;
	}

	/**
	 * Builder function for expiresAt
	 * 
	 * @param string $expiresAt
	 * 
	 * @return $this
	 */
	public function expiresAt(string $expiresAt): self
	{
		$this->setExpiresAt($expiresAt);
		
		return $this;
	}

	/**
	 * Setter function for expiresAt
	 * 
	 * @param string $expiresAt
	 * 
	 * @return void
	 */
	public function setExpiresAt(string $expiresAt): void
	{
		$this->expiresAt = $expiresAt;
	}

	/**
	 * Getter function for expiresAt
	 * 
	 * @return string
	 */
	public function getExpiresAt(): string
	{
		return $this->expiresAt;
	}

	/**
	 * Builder function for message
	 * 
	 * @param string $message
	 * 
	 * @return $this
	 */
	public function message(string $message): self
	{
		$this->setMessage($message);
		
		return $this;
	}

	/**
	 * Setter function for message
	 * 
	 * @param string $message
	 * 
	 * @return void
	 */
	public function setMessage(string $message): void
	{
		$this->message = $message;
	}

	/**
	 * Getter function for message
	 * 
	 * @return string
	 */
	public function getMessage(): string
	{
		return $this->message;
	}

	/**
	 * Builder function for code
	 * 
	 * @param string $code
	 * 
	 * @return $this
	 */
	public function code(string $code): self
	{
		$this->setCode($code);
		
		return $this;
	}

	/**
	 * Setter function for code
	 * 
	 * @param string $code
	 * 
	 * @return void
	 */
	public function setCode(string $code): void
	{
		$this->code = $code;
	}

	/**
	 * Getter function for code
	 * 
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class PagoefectivoBarcodesInner {" . PHP_EOL
			. "    barcode: " . $this->toIndentedString($this->barcode) . PHP_EOL
			. "    visualization: " . $this->toIndentedString($this->visualization) . PHP_EOL
			. "    country: " . $this->toIndentedString($this->country) . PHP_EOL
			. "    expiresAt: " . $this->toIndentedString($this->expiresAt) . PHP_EOL
			. "    message: " . $this->toIndentedString($this->message) . PHP_EOL
			. "    code: " . $this->toIndentedString($this->code) . PHP_EOL
			. "}";
	}
}
