<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\Card\CardExpiry;
use Paysafe\PhpSdk\Model\Card\NetworkToken;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Card with External Network Token
 */
class ExternalNetworkTokenResponse extends BaseModel
{
	const CARD_TYPE_AM = 'AM';
	const CARD_TYPE_DI = 'DI';
	const CARD_TYPE_JC = 'JC';
	const CARD_TYPE_MC = 'MC';
	const CARD_TYPE_MD = 'MD';
	const CARD_TYPE_SO = 'SO';
	const CARD_TYPE_VI = 'VI';
	const CARD_TYPE_VD = 'VD';
	const CARD_TYPE_VE = 'VE';

	const TOKEN_TYPE_NETWORK_TOKEN = 'NETWORK_TOKEN';

	/**
	 * These are the last four digits of the network token.
	 */
	private string $lastDigits;

	private CardExpiry $cardExpiry;
	private string $cardType;

	/**
	 * This is the card issuing country.
	 * Example: US
	 */
	private string $issuingCountry;

	private string $tokenType;

	/**
	 * Holds the external network token fields
	 */
	private NetworkToken $networkToken;


	/**
	 * Builder function for lastDigits
	 * 
	 * @param string $lastDigits
	 * 
	 * @return ExternalNetworkTokenResponse
	 */
	public function lastDigits(string $lastDigits): self
	{
		$this->setLastDigits($lastDigits);
		
		return $this;
	}
	/**
	 * Setter function for lastDigits
	 * 
	 * @param string $lastDigits
	 * 
	 * @return void
	 */
	public function setLastDigits(string $lastDigits): void
	{
		$this->lastDigits = $lastDigits;
	}
	/**
	 * Getter function for lastDigits
	 * 
	 * @return string
	 */
	public function getLastDigits(): string
	{
		return $this->lastDigits;
	}

	/**
	 * Builder function for cardExpiry
	 * 
	 * @param CardExpiry $cardExpiry
	 * 
	 * @return ExternalNetworkTokenResponse
	 */
	public function cardExpiry(CardExpiry $cardExpiry): self
	{
		$this->setCardExpiry($cardExpiry);
		
		return $this;
	}
	/**
	 * Setter function for cardExpiry
	 * 
	 * @param CardExpiry $cardExpiry
	 * 
	 * @return void
	 */
	public function setCardExpiry(CardExpiry $cardExpiry): void
	{
		$this->cardExpiry = $cardExpiry;
	}
	/**
	 * Getter function for cardExpiry
	 * 
	 * @return CardExpiry
	 */
	public function getCardExpiry(): CardExpiry
	{
		return $this->cardExpiry;
	}

	/**
	 * Builder function for cardType
	 * 
	 * @param string $cardType
	 * 
	 * @return ExternalNetworkTokenResponse
	 */
	public function cardType(string $cardType): self
	{
		$this->setCardType($cardType);
		
		return $this;
	}
	/**
	 * Setter function for cardType
	 * 
	 * @param string $cardType
	 * 
	 * @return void
	 */
	public function setCardType(string $cardType): void
	{
		$this->cardType = $cardType;
	}
	/**
	 * Getter function for cardType
	 * 
	 * @return string
	 */
	public function getCardType(): string
	{
		return $this->cardType;
	}

	/**
	 * Builder function for issuingCountry
	 * 
	 * @param string $issuingCountry
	 * 
	 * @return ExternalNetworkTokenResponse
	 */
	public function issuingCountry(string $issuingCountry): self
	{
		$this->setIssuingCountry($issuingCountry);
		
		return $this;
	}
	/**
	 * Setter function for issuingCountry
	 * 
	 * @param string $issuingCountry
	 * 
	 * @return void
	 */
	public function setIssuingCountry(string $issuingCountry): void
	{
		$this->issuingCountry = $issuingCountry;
	}
	/**
	 * Getter function for issuingCountry
	 * 
	 * @return string
	 */
	public function getIssuingCountry(): string
	{
		return $this->issuingCountry;
	}

	/**
	 * Builder function for tokenType
	 * 
	 * @param string $tokenType
	 * 
	 * @return ExternalNetworkTokenResponse
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
	 * @param NetworkToken $networkToken
	 * 
	 * @return ExternalNetworkTokenResponse
	 */
	public function networkToken(NetworkToken $networkToken): self
	{
		$this->setNetworkToken($networkToken);
		
		return $this;
	}
	/**
	 * Setter function for networkToken
	 * 
	 * @param NetworkToken $networkToken
	 * 
	 * @return void
	 */
	public function setNetworkToken(NetworkToken $networkToken): void
	{
		$this->networkToken = $networkToken;
	}
	/**
	 * Getter function for networkToken
	 * 
	 * @return NetworkToken
	 */
	public function getNetworkToken(): NetworkToken
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
		return "class ExternalNetworkTokenResponse {" . PHP_EOL . 
			"	lastDigits: " . $this->toIndentedString($this->lastDigits) . PHP_EOL .
			"	cardExpiry: " . $this->toIndentedString($this->cardExpiry) . PHP_EOL .
			"	cardType: " . $this->toIndentedString($this->cardType) . PHP_EOL .
			"	issuingCountry: " . $this->toIndentedString($this->issuingCountry) . PHP_EOL .
			"	tokenType: " . $this->toIndentedString($this->tokenType) . PHP_EOL .
			"	networkToken: " . $this->toIndentedString($this->networkToken) . PHP_EOL .
		"}";
	}
}
