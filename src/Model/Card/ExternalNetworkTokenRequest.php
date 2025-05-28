<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\Card\CardExpiry;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Network Token Request
 */
class ExternalNetworkTokenRequest extends BaseModel
{

	/**
	 * This is the actual network token.
	 * Example: 4111111111111111
	 */
	private string $token;

	/**
	 * This is the cryptogram that will be used.
	 * Example: AAUAUSAEHSAOUTAOSUAOHEA
	 */
	private string $cryptogram;

	private CardExpiry $expiry;

	/**
	 * Builder function for token
	 * 
	 * @param string $token
	 * 
	 * @return ExternalNetworkTokenRequest
	 */
	public function token(string $token): self
	{
		$this->setToken($token);
		
		return $this;
	}
	/**
	 * Setter function for token
	 * 
	 * @param string $token
	 * 
	 * @return void
	 */
	public function setToken(string $token): void
	{
		$this->token = $token;
	}
	/**
	 * Getter function for token
	 * 
	 * @return string
	 */
	public function getToken(): string
	{
		return $this->token;
	}

	/**
	 * Builder function for cryptogram
	 * 
	 * @param string $cryptogram
	 * 
	 * @return ExternalNetworkTokenRequest
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
	 * Builder function for expiry
	 * 
	 * @param CardExpiry $expiry
	 * 
	 * @return ExternalNetworkTokenRequest
	 */
	public function expiry(CardExpiry $expiry): self
	{
		$this->setExpiry($expiry);
		
		return $this;
	}
	/**
	 * Setter function for expiry
	 * 
	 * @param CardExpiry $expiry
	 * 
	 * @return void
	 */
	public function setExpiry(CardExpiry $expiry): void
	{
		$this->expiry = $expiry;
	}
	/**
	 * Getter function for expiry
	 * 
	 * @return CardExpiry
	 */
	public function getExpiry(): CardExpiry
	{
		return $this->expiry;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class ExternalNetworkTokenRequest {" . PHP_EOL .
			"	token: " . $this->toIndentedString($this->token) . PHP_EOL .
			"	cryptogram: " . $this->toIndentedString($this->cryptogram) . PHP_EOL .
			"	expiry: " . $this->toIndentedString($this->expiry) . PHP_EOL .
		"}";
	}
}
