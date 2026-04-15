<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\Card\ExternalNetworkTokenRequest;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Card with External Network Token
 */
class CardExternalNetworkTokenRequest extends BaseModel
{
	const TOKEN_TYPE_NETWORK_TOKEN = 'NETWORK_TOKEN';

	private string $tokenType;
	private ExternalNetworkTokenRequest $networkToken;

	/**
	 * Builder function for tokenType
	 * 
	 * @param string $tokenType
	 * 
	 * @return CardExternalNetworkTokenRequest
	 */
	public function tokenType(string $tokenType): self
	{
		$this->setTokenType($tokenType);
		
		return $this;
	}
	/**
	 * Setter function for tokenType
	 * 
	 * @param string $tokenType
	 * 
	 * @return void
	 */
	public function setTokenType(string $tokenType): void
	{
		$this->tokenType = $tokenType;
	}
	/**
	 * Getter function for tokenType
	 * 
	 * @return string
	 */
	public function getTokenType(): string
	{
		return $this->tokenType;
	}

	/**
	 * Builder function for networkToken
	 * 
	 * @param ExternalNetworkTokenRequest $networkToken
	 * 
	 * @return CardExternalNetworkTokenRequest
	 */
	public function networkToken(ExternalNetworkTokenRequest $networkToken): self
	{
		$this->setNetworkToken($networkToken);
		
		return $this;
	}
	/**
	 * Setter function for networkToken
	 * 
	 * @param ExternalNetworkTokenRequest $networkToken
	 * 
	 * @return void
	 */
	public function setNetworkToken(ExternalNetworkTokenRequest $networkToken): void
	{
		$this->networkToken = $networkToken;
	}
	/**
	 * Getter function for networkToken
	 * 
	 * @return ExternalNetworkTokenRequest
	 */
	public function getNetworkToken(): ExternalNetworkTokenRequest
	{
		return $this->networkToken;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class CardExternalNetworkTokenRequest {" . PHP_EOL . 
			"	tokenType: " . $this->toIndentedString($this->tokenType) . PHP_EOL .
			"	networkToken: " . $this->toIndentedString($this->networkToken) . PHP_EOL .
		"}";
	}
}
