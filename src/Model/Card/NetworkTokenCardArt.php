<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

class NetworkTokenCardArt extends BaseModel
{

	private string $cardArtUrl;
	private bool $isCobranded;

	/**
	 * Builder function for cardArtUrl
	 * 
	 * @param string $cardArtUrl
	 * 
	 * @return $this
	 */
	public function cardArtUrl(string $cardArtUrl): self
	{
		$this->setCardArtUrl($cardArtUrl);
		
		return $this;
	}

	/**
	 * Setter function for cardArtUrl
	 * 
	 * @param string $cardArtUrl
	 * 
	 * @return void
	 */
	public function setCardArtUrl(string $cardArtUrl): void
	{
		$this->cardArtUrl = $cardArtUrl;
	}

	/**
	 * Getter function for cardArtUrl
	 * 
	 * @return string
	 */
	public function getCardArtUrl(): string
	{
		return $this->cardArtUrl;
	}

	/**
	 * Builder function for isCobranded
	 * 
	 * @param bool $isCobranded
	 * 
	 * @return $this
	 */
	public function isCobranded(bool $isCobranded): self
	{
		$this->setIsCobranded($isCobranded);
		
		return $this;
	}

	/**
	 * Setter function for isCobranded
	 * 
	 * @param bool $isCobranded
	 * 
	 * @return void
	 */
	public function setIsCobranded(bool $isCobranded): void
	{
		$this->isCobranded = $isCobranded;
	}

	/**
	 * Getter function for isCobranded
	 * 
	 * @return bool
	 */
	public function getIsCobranded(): bool
	{
		return $this->isCobranded;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class NetworkTokenCardArt {" . PHP_EOL
			. "    cardArtUrl: " . $this->toIndentedString($this->cardArtUrl) . PHP_EOL
			. "    isCobranded: " . $this->toIndentedString($this->isCobranded) . PHP_EOL
			. "}";
	}
}
