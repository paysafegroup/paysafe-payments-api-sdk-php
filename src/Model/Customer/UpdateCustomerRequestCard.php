<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Customer;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\CardExpiry;

/**
 * Card details to be used for the transaction
 */
class UpdateCustomerRequestCard extends BaseModel
{

	private string $cardNum;
	private string $cardCategory;
	private string $cardId;
	private CardExpiry $cardExpiry;
	private string $cvv;
	private string $holderName;
	private string $cardType;
	private string $lastDigits;
	private string $cardBin;
	private string $issuingCountry;
	private string $status;

	/**
	 * Builder function for cardNum
	 * 
	 * @param string $cardNum
	 * 
	 * @return $this
	 */
	public function cardNum(string $cardNum): self
	{
		$this->setCardNum($cardNum);
		
		return $this;
	}

	/**
	 * Setter function for cardNum
	 * 
	 * @param string $cardNum
	 * 
	 * @return void
	 */
	public function setCardNum(string $cardNum): void
	{
		$this->cardNum = $cardNum;
	}

	/**
	 * This is the card number.
	 * 
	 * @return string
	 */
	public function getCardNum(): string
	{
		return $this->cardNum;
	}

	/**
	 * Builder function for cardCategory
	 * 
	 * @param string $cardCategory
	 * 
	 * @return $this
	 */
	public function cardCategory(string $cardCategory): self
	{
		$this->setCardCategory($cardCategory);
		
		return $this;
	}

	/**
	 * Setter function for cardCategory
	 * 
	 * @param string $cardCategory
	 * 
	 * @return void
	 */
	public function setCardCategory(string $cardCategory): void
	{
		$this->cardCategory = $cardCategory;
	}

	/**
	 * DEBIT or CREDIT.
	 * 
	 * @return string
	 */
	public function getCardCategory(): string
	{
		return $this->cardCategory;
	}

	/**
	 * Builder function for cardId
	 * 
	 * @param string $cardId
	 * 
	 * @return $this
	 */
	public function cardId(string $cardId): self
	{
		$this->setCardId($cardId);
		
		return $this;
	}

	/**
	 * Setter function for cardId
	 * 
	 * @param string $cardId
	 * 
	 * @return void
	 */
	public function setCardId(string $cardId): void
	{
		$this->cardId = $cardId;
	}

	/**
	 * This is the card id returned in the response during save card flow.
	 * 
	 * @return string
	 */
	public function getCardId(): string
	{
		return $this->cardId;
	}

	/**
	 * Builder function for cardExpiry
	 * 
	 * @param CardExpiry $cardExpiry
	 * 
	 * @return $this
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
	 * This is the card's expiry date.
	 * 
	 * @return CardExpiry
	 */
	public function getCardExpiry(): CardExpiry
	{
		return $this->cardExpiry;
	}

	/**
	 * Builder function for cvv
	 * 
	 * @param string $cvv
	 * 
	 * @return $this
	 */
	public function cvv(string $cvv): self
	{
		$this->setCvv($cvv);
		
		return $this;
	}

	/**
	 * Setter function for cvv
	 * 
	 * @param string $cvv
	 * 
	 * @return void
	 */
	public function setCvv(string $cvv): void
	{
		$this->cvv = $cvv;
	}

	/**
	 * This is the 3- or 4-digit security code that appears on the card following the card number.
	 * 
	 * @return string
	 */
	public function getCvv(): string
	{
		return $this->cvv;
	}

	/**
	 * Builder function for holderName
	 * 
	 * @param string $holderName
	 * 
	 * @return $this
	 */
	public function holderName(string $holderName): self
	{
		$this->setHolderName($holderName);
		
		return $this;
	}

	/**
	 * Setter function for holderName
	 * 
	 * @param string $holderName
	 * 
	 * @return void
	 */
	public function setHolderName(string $holderName): void
	{
		$this->holderName = $holderName;
	}

	/**
	 * This is the name of the card holder. <b>Note:</b> Holder name must contain only Latin characters
     * (English Alphabet), Space, Apostrophe('), Dot(.)
	 * or Hyphen(-).<br /> Unicode normalization is done.
	 * 
	 * @return string
	 */
	public function getHolderName(): string
	{
		return $this->holderName;
	}

	/**
	 * Builder function for cardType
	 * 
	 * @param string $cardType
	 * 
	 * @return $this
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
	 * This is type of card used for the request.    <br />
	 * • AM – American Express   <br />
	 * • DI – Discover   <br />
	 * • JC – JCB    <br />
	 * • MC – Mastercard    <br />
	 * • MD – Maestro    <br />
	 * • SO – Solo    <br />
	 * • VI – Visa    <br />
	 * • VD – Visa Debit   <br />
	 * • VE – Visa Electron
	 * 
	 * @return string
	 */
	public function getCardType(): string
	{
		return $this->cardType;
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
	 * These are the last four digits of the card used for the request.
	 * 
	 * @return string
	 */
	public function getLastDigits(): string
	{
		return $this->lastDigits;
	}

	/**
	 * Builder function for cardBin
	 * 
	 * @param string $cardBin
	 * 
	 * @return $this
	 */
	public function cardBin(string $cardBin): self
	{
		$this->setCardBin($cardBin);
		
		return $this;
	}

	/**
	 * Setter function for cardBin
	 * 
	 * @param string $cardBin
	 * 
	 * @return void
	 */
	public function setCardBin(string $cardBin): void
	{
		$this->cardBin = $cardBin;
	}

	/**
	 * These are the first 6 digits of the card Bank Identification Number (BIN),
     * for example: the first 6 digits of the card number.
	 * 
	 * @return string
	 */
	public function getCardBin(): string
	{
		return $this->cardBin;
	}

	/**
	 * Builder function for issuingCountry
	 * 
	 * @param string $issuingCountry
	 * 
	 * @return $this
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
	 * This is the card issuing country.
	 * 
	 * @return string
	 */
	public function getIssuingCountry(): string
	{
		return $this->issuingCountry;
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
	 * Optional.  Present only if the card is part of a Customer.
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class UpdateCustomerRequestCard {" . PHP_EOL
			. "    cardNum: " . $this->toIndentedString($this->cardNum) . PHP_EOL
			. "    cardCategory: " . $this->toIndentedString($this->cardCategory) . PHP_EOL
			. "    cardId: " . $this->toIndentedString($this->cardId) . PHP_EOL
			. "    cardExpiry: " . $this->toIndentedString($this->cardExpiry) . PHP_EOL
			. "    cvv: " . $this->toIndentedString($this->cvv) . PHP_EOL
			. "    holderName: " . $this->toIndentedString($this->holderName) . PHP_EOL
			. "    cardType: " . $this->toIndentedString($this->cardType) . PHP_EOL
			. "    lastDigits: " . $this->toIndentedString($this->lastDigits) . PHP_EOL
			. "    cardBin: " . $this->toIndentedString($this->cardBin) . PHP_EOL
			. "    issuingCountry: " . $this->toIndentedString($this->issuingCountry) . PHP_EOL
			. "    status: " . $this->toIndentedString($this->status) . PHP_EOL
			. "}";
	}
}
