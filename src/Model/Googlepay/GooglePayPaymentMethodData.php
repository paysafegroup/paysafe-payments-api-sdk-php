<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Googlepay;

use Paysafe\PhpSdk\Model\BaseModel;

class GooglePayPaymentMethodData extends BaseModel
{
	private string $description;
	private GooglePayPaymentMethodDataInfo $info;
	private GooglePayPaymentMethodDataTokenizationData $tokenizationData;
	private string $type;

	/**
	 * Builder function for description
	 * 
	 * @param string $description
	 * 
	 * @return $this
	 */
	public function description(string $description): self
	{
		$this->setDescription($description);
		
		return $this;
	}

	/**
	 * Setter function for description
	 * 
	 * @param string $description
	 * 
	 * @return void
	 */
	public function setDescription(string $description): void
	{
		$this->description = $description;
	}

	/**
	 * Getter function for description
	 * 
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * Builder function for info
	 * 
	 * @param GooglePayPaymentMethodDataInfo $info
	 * 
	 * @return $this
	 */
	public function info(GooglePayPaymentMethodDataInfo $info): self
	{
		$this->setInfo($info);
		
		return $this;
	}

	/**
	 * Setter function for info
	 * 
	 * @param GooglePayPaymentMethodDataInfo $info
	 * 
	 * @return void
	 */
	public function setInfo(GooglePayPaymentMethodDataInfo $info): void
	{
		$this->info = $info;
	}

	/**
	 * Getter function for info
	 * 
	 * @return GooglePayPaymentMethodDataInfo
	 */
	public function getInfo(): GooglePayPaymentMethodDataInfo
	{
		return $this->info;
	}

	/**
	 * Builder function for tokenizationData
	 * 
	 * @param GooglePayPaymentMethodDataTokenizationData $tokenizationData
	 * 
	 * @return $this
	 */
	public function tokenizationData(GooglePayPaymentMethodDataTokenizationData $tokenizationData): self
	{
		$this->setTokenizationData($tokenizationData);
		
		return $this;
	}

	/**
	 * Setter function for tokenizationData
	 * 
	 * @param GooglePayPaymentMethodDataTokenizationData $tokenizationData
	 * 
	 * @return void
	 */
	public function setTokenizationData(GooglePayPaymentMethodDataTokenizationData $tokenizationData): void
	{
		$this->tokenizationData = $tokenizationData;
	}

	/**
	 * Getter function for tokenizationData
	 * 
	 * @return GooglePayPaymentMethodDataTokenizationData
	 */
	public function getTokenizationData(): GooglePayPaymentMethodDataTokenizationData
	{
		return $this->tokenizationData;
	}

	/**
	 * Builder function for type
	 * 
	 * @param string $type
	 * 
	 * @return $this
	 */
	public function type(string $type): self
	{
		$this->setType($type);
		
		return $this;
	}

	/**
	 * Setter function for type
	 * 
	 * @param string $type
	 * 
	 * @return void
	 */
	public function setType(string $type): void
	{
		$this->type = $type;
	}

	/**
	 * Getter function for type
	 * 
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class GooglePayPaymentMethodData {" . PHP_EOL
			. "    description: " . $this->toIndentedString($this->description) . PHP_EOL
			. "    info: " . $this->toIndentedString($this->info) . PHP_EOL
			. "    tokenizationData: " . $this->toIndentedString($this->tokenizationData) . PHP_EOL
			. "    type: " . $this->toIndentedString($this->type) . PHP_EOL
			. "}";
	}
}
