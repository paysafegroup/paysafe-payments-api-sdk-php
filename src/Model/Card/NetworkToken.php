<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Holds network token fields <br />
 * <ul>
 *   <li>
 *     <b>bin:</b> These are the first 6 digits of the network token. <br />
 *     Example: 411111
 *   </li>
 *   <li>
 *     <b>lastDigits:</b> These are the last four digits of the network token. <br />
 *     Example: 6585
 *   </li>
 *   <li>
 *     <b>status:</b> The status of the network token. <br />
 *     <i>Allowed values: ACTIVE, INACTIVE, SUSPENDED</i>
 *   </li>
 *   <li>
 *     <b>expiry:</b> This is the card's expiry date.
 *   </li>
 *   <li>
 *     <b>cardArt:</b> Holds network token card art fields.
 *   </li>
 * </ul>
 */
class NetworkToken extends BaseModel
{

	private string $bin;
	private string $lastDigits;
	private string $status;
	private CardExpiry $expiry;
	private NetworkTokenCardArt $cardArt;

	/**
	 * Builder function for bin
	 * 
	 * @param string $bin
	 * 
	 * @return $this
	 */
	public function bin(string $bin): self
	{
		$this->setBin($bin);
		
		return $this;
	}

	/**
	 * Setter function for bin
	 * 
	 * @param string $bin
	 * 
	 * @return void
	 */
	public function setBin(string $bin): void
	{
		$this->bin = $bin;
	}

	/**
	 * These are the first 6 digits of the network token.
	 * 
	 * @return string
	 */
	public function getBin(): string
	{
		return $this->bin;
	}

	/**
	 * Builder function for lastDigits
	 * 
	 * @param string $lastDigits
	 * 
	 * @return $this
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
	 * These are the last four digits of the network token.
	 * 
	 * @return string
	 */
	public function getLastDigits(): string
	{
		return $this->lastDigits;
	}

	/**
	 * Builder function for status
	 * 
	 * @param string $status
	 * 
	 * @return $this
	 */
	public function status(string $status): self
	{
		$this->setStatus($status);
		
		return $this;
	}

	/**
	 * Setter function for status
	 * 
	 * @param string $status
	 * 
	 * @return void
	 */
	public function setStatus(string $status): void
	{
		$this->status = $status;
	}

	/**
	 * The status of the network token.
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Builder function for expiry
	 * 
	 * @param CardExpiry $expiry
	 * 
	 * @return $this
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
	 * This is the card's expiry date.
	 * 
	 * @return CardExpiry
	 */
	public function getExpiry(): CardExpiry
	{
		return $this->expiry;
	}

	/**
	 * Builder function for cardArt
	 * 
	 * @param NetworkTokenCardArt $cardArt
	 * 
	 * @return $this
	 */
	public function cardArt(NetworkTokenCardArt $cardArt): self
	{
		$this->setCardArt($cardArt);
		
		return $this;
	}

	/**
	 * Setter function for cardArt
	 * 
	 * @param NetworkTokenCardArt $cardArt
	 * 
	 * @return void
	 */
	public function setCardArt(NetworkTokenCardArt $cardArt): void
	{
		$this->cardArt = $cardArt;
	}

	/**
	 * Holds network token card art fields
	 * 
	 * @return NetworkTokenCardArt
	 */
	public function getCardArt(): NetworkTokenCardArt
	{
		return $this->cardArt;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class NetworkToken {" . PHP_EOL
			. "    bin: " . $this->toIndentedString($this->bin) . PHP_EOL
			. "    lastDigits: " . $this->toIndentedString($this->lastDigits) . PHP_EOL
			. "    status: " . $this->toIndentedString($this->status) . PHP_EOL
			. "    expiry: " . $this->toIndentedString($this->expiry) . PHP_EOL
			. "    cardArt: " . $this->toIndentedString($this->cardArt) . PHP_EOL
			. "}";
	}
}
