<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Applepay;

use Paysafe\PhpSdk\Model\BaseModel;

class ApplePayTokenPaymentData extends BaseModel
{
	private string $version;
	private string $data;
	private string $signature;
	private ApplePayTokenHeader $header;
	private ApplePayDecryptedData $decryptedData;

	/**
	 * Builder function for version
	 * 
	 * @param string $version
	 * 
	 * @return $this
	 */
	public function version(string $version): self
	{
		$this->setVersion($version);
		
		return $this;
	}

	/**
	 * Setter function for version
	 * 
	 * @param string $version
	 * 
	 * @return void
	 */
	public function setVersion(string $version): void
	{
		$this->version = $version;
	}

	/**
	 * Getter function for version
	 * 
	 * @return string
	 */
	public function getVersion(): string
	{
		return $this->version;
	}

	/**
	 * Builder function for data
	 * 
	 * @param string $data
	 * 
	 * @return $this
	 */
	public function data(string $data): self
	{
		$this->setData($data);
		
		return $this;
	}

	/**
	 * Setter function for data
	 * 
	 * @param string $data
	 * 
	 * @return void
	 */
	public function setData(string $data): void
	{
		$this->data = $data;
	}

	/**
	 * Getter function for data
	 * 
	 * @return string
	 */
	public function getData(): string
	{
		return $this->data;
	}

	/**
	 * Builder function for signature
	 * 
	 * @param string $signature
	 * 
	 * @return $this
	 */
	public function signature(string $signature): self
	{
		$this->setSignature($signature);
		
		return $this;
	}

	/**
	 * Setter function for signature
	 * 
	 * @param string $signature
	 * 
	 * @return void
	 */
	public function setSignature(string $signature): void
	{
		$this->signature = $signature;
	}

	/**
	 * Getter function for signature
	 * 
	 * @return string
	 */
	public function getSignature(): string
	{
		return $this->signature;
	}

	/**
	 * Builder function for header
	 * 
	 * @param ApplePayTokenHeader $header
	 * 
	 * @return $this
	 */
	public function header(ApplePayTokenHeader $header): self
	{
		$this->setHeader($header);
		
		return $this;
	}

	/**
	 * Setter function for header
	 * 
	 * @param ApplePayTokenHeader $header
	 * 
	 * @return void
	 */
	public function setHeader(ApplePayTokenHeader $header): void
	{
		$this->header = $header;
	}

	/**
	 * Getter function for header
	 * 
	 * @return ApplePayTokenHeader
	 */
	public function getHeader(): ApplePayTokenHeader
	{
		return $this->header;
	}

	/**
	 * Builder function for decryptedData
	 * 
	 * @param ApplePayDecryptedData $decryptedData
	 * 
	 * @return $this
	 */
	public function decryptedData(ApplePayDecryptedData $decryptedData): self
	{
		$this->setDecryptedData($decryptedData);
		
		return $this;
	}

	/**
	 * Setter function for decryptedData
	 * 
	 * @param ApplePayDecryptedData $decryptedData
	 * 
	 * @return void
	 */
	public function setDecryptedData(ApplePayDecryptedData $decryptedData): void
	{
		$this->decryptedData = $decryptedData;
	}

	/**
	 * Getter function for decryptedData
	 * 
	 * @return ApplePayDecryptedData
	 */
	public function getDecryptedData(): ApplePayDecryptedData
	{
		return $this->decryptedData;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ApplePayTokenPaymentData {" . PHP_EOL
			. "    version: " . $this->toIndentedString($this->version) . PHP_EOL
			. "    data: " . $this->toIndentedString($this->data) . PHP_EOL
			. "    signature: " . $this->toIndentedString($this->signature) . PHP_EOL
			. "    header: " . $this->toIndentedString($this->header) . PHP_EOL
			. "    decryptedData: " . $this->toIndentedString($this->decryptedData) . PHP_EOL
			. "}";
	}
}
