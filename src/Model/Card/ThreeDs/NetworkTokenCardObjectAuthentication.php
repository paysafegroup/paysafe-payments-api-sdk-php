<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

use Paysafe\PhpSdk\Model\BaseModel;

class NetworkTokenCardObjectAuthentication extends BaseModel
{

	private ?string $eci = null;
	private ?string $cavv = null;
	private ?string $threeDResult = null;
	private ?string $directoryServerTransactionId = null;
	private ?string $threeDSecureVersion = null;
	private ?string $exemptionIndicator = null;

	/**
	 * Builder function for eci
	 * 
	 * @param string $eci
	 * 
	 * @return $this
	 */
	public function eci(string $eci): self
	{
		$this->setEci($eci);
		
		return $this;
	}

	/**
	 * Setter function for eci
	 * 
	 * @param string $eci
	 * 
	 * @return void
	 */
	public function setEci(string $eci): void
	{
		$this->eci = $eci;
	}

	/**
	 * Getter function for eci
	 * 
	 * @return string|null
	 */
	public function getEci(): string
	{
		return $this->eci;
	}

	/**
	 * Builder function for cavv
	 * 
	 * @param string $cavv
	 * 
	 * @return $this
	 */
	public function cavv(string $cavv): self
	{
		$this->setCavv($cavv);
		
		return $this;
	}

	/**
	 * Setter function for cavv
	 * 
	 * @param string $cavv
	 * 
	 * @return void
	 */
	public function setCavv(string $cavv): void
	{
		$this->cavv = $cavv;
	}

	/**
	 * Getter function for cavv
	 * 
	 * @return string|null
	 */
	public function getCavv(): string
	{
		return $this->cavv;
	}

	/**
	 * Builder function for threeDResult
	 * 
	 * @param string $threeDResult
	 * 
	 * @return $this
	 */
	public function threeDResult(string $threeDResult): self
	{
		$this->setThreeDResult($threeDResult);
		
		return $this;
	}

	/**
	 * Setter function for threeDResult
	 * 
	 * @param string $threeDResult
	 * 
	 * @return void
	 */
	public function setThreeDResult(string $threeDResult): void
	{
		$this->threeDResult = $threeDResult;
	}

	/**
	 * Getter function for threeDResult
	 * 
	 * @return string|null
	 */
	public function getThreeDResult(): string
	{
		return $this->threeDResult;
	}

	/**
	 * Builder function for directoryServerTransactionId
	 * 
	 * @param string $directoryServerTransactionId
	 * 
	 * @return $this
	 */
	public function directoryServerTransactionId(string $directoryServerTransactionId): self
	{
		$this->setDirectoryServerTransactionId($directoryServerTransactionId);
		
		return $this;
	}

	/**
	 * Setter function for directoryServerTransactionId
	 * 
	 * @param string $directoryServerTransactionId
	 * 
	 * @return void
	 */
	public function setDirectoryServerTransactionId(string $directoryServerTransactionId): void
	{
		$this->directoryServerTransactionId = $directoryServerTransactionId;
	}

	/**
	 * Getter function for directoryServerTransactionId
	 * 
	 * @return string|null
	 */
	public function getDirectoryServerTransactionId(): string
	{
		return $this->directoryServerTransactionId;
	}

	/**
	 * Builder function for threeDSecureVersion
	 * 
	 * @param string $threeDSecureVersion
	 * 
	 * @return $this
	 */
	public function threeDSecureVersion(string $threeDSecureVersion): self
	{
		$this->setThreeDSecureVersion($threeDSecureVersion);
		
		return $this;
	}

	/**
	 * Setter function for threeDSecureVersion
	 * 
	 * @param string $threeDSecureVersion
	 * 
	 * @return void
	 */
	public function setThreeDSecureVersion(string $threeDSecureVersion): void
	{
		$this->threeDSecureVersion = $threeDSecureVersion;
	}

	/**
	 * Getter function for threeDSecureVersion
	 * 
	 * @return string|null
	 */
	public function getThreeDSecureVersion(): string
	{
		return $this->threeDSecureVersion;
	}

	/**
	 * Builder function for exemptionIndicator
	 * 
	 * @param string $exemptionIndicator
	 * 
	 * @return $this
	 */
	public function exemptionIndicator(string $exemptionIndicator): self
	{
		$this->setExemptionIndicator($exemptionIndicator);
		
		return $this;
	}

	/**
	 * Setter function for exemptionIndicator
	 * 
	 * @param string $exemptionIndicator
	 * 
	 * @return void
	 */
	public function setExemptionIndicator(string $exemptionIndicator): void
	{
		$this->exemptionIndicator = $exemptionIndicator;
	}

	/**
	 * Getter function for exemptionIndicator
	 * 
	 * @return string|null
	 */
	public function getExemptionIndicator(): string
	{
		return $this->exemptionIndicator;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class NetworkTokenCardObjectAuthentication {" . PHP_EOL
			. "    eci: " . $this->toIndentedString($this->eci) . PHP_EOL
			. "    cavv: " . $this->toIndentedString($this->cavv) . PHP_EOL
			. "    threeDResult: " . $this->toIndentedString($this->threeDResult) . PHP_EOL
			. "    directoryServerTransactionId: "
            . $this->toIndentedString($this->directoryServerTransactionId) . PHP_EOL
			. "    threeDSecureVersion: " . $this->toIndentedString($this->threeDSecureVersion) . PHP_EOL
			. "    exemptionIndicator: " . $this->toIndentedString($this->exemptionIndicator) . PHP_EOL
			. "}";
	}
}
