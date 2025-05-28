<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Applepay;

use Paysafe\PhpSdk\Model\BaseModel;

class ApplePayTokenHeader extends BaseModel
{
	private string $transactionId;
	private string $ephemeralPublicKey;
	private string $publicKeyHash;

	/**
	 * Builder function for transactionId
	 * 
	 * @param string $transactionId
	 * 
	 * @return $this
	 */
	public function transactionId(string $transactionId): self
	{
		$this->setTransactionId($transactionId);
		
		return $this;
	}

	/**
	 * Setter function for transactionId
	 * 
	 * @param string $transactionId
	 * 
	 * @return void
	 */
	public function setTransactionId(string $transactionId): void
	{
		$this->transactionId = $transactionId;
	}

	/**
	 * Getter function for transactionId
	 * 
	 * @return string
	 */
	public function getTransactionId(): string
	{
		return $this->transactionId;
	}

	/**
	 * Builder function for ephemeralPublicKey
	 * 
	 * @param string $ephemeralPublicKey
	 * 
	 * @return $this
	 */
	public function ephemeralPublicKey(string $ephemeralPublicKey): self
	{
		$this->setEphemeralPublicKey($ephemeralPublicKey);
		
		return $this;
	}

	/**
	 * Setter function for ephemeralPublicKey
	 * 
	 * @param string $ephemeralPublicKey
	 * 
	 * @return void
	 */
	public function setEphemeralPublicKey(string $ephemeralPublicKey): void
	{
		$this->ephemeralPublicKey = $ephemeralPublicKey;
	}

	/**
	 * Getter function for ephemeralPublicKey
	 * 
	 * @return string
	 */
	public function getEphemeralPublicKey(): string
	{
		return $this->ephemeralPublicKey;
	}

	/**
	 * Builder function for publicKeyHash
	 * 
	 * @param string $publicKeyHash
	 * 
	 * @return $this
	 */
	public function publicKeyHash(string $publicKeyHash): self
	{
		$this->setPublicKeyHash($publicKeyHash);
		
		return $this;
	}

	/**
	 * Setter function for publicKeyHash
	 * 
	 * @param string $publicKeyHash
	 * 
	 * @return void
	 */
	public function setPublicKeyHash(string $publicKeyHash): void
	{
		$this->publicKeyHash = $publicKeyHash;
	}

	/**
	 * Getter function for publicKeyHash
	 * 
	 * @return string
	 */
	public function getPublicKeyHash(): string
	{
		return $this->publicKeyHash;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ApplePayTokenHeader {" . PHP_EOL
			. "    transactionId: " . $this->toIndentedString($this->transactionId) . PHP_EOL
			. "    ephemeralPublicKey: " . $this->toIndentedString($this->ephemeralPublicKey) . PHP_EOL
			. "    publicKeyHash: " . $this->toIndentedString($this->publicKeyHash) . PHP_EOL
			. "}";
	}
}
