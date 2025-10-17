<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Customer;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Model\Lpm\Ach;
use Paysafe\PhpSdk\Model\Lpm\Bacs;
use Paysafe\PhpSdk\Model\Lpm\Eft;
use Paysafe\PhpSdk\Model\Lpm\Sepa;

/**
 * CustomerPaymentInstrument
 */
class CustomerPaymentInstrument extends BaseModel
{

	private UpdateCustomerRequestCard $card;
	private string $paymentHandleTokenFrom;
	private Eft $eft;
	private bool $dupCheck;
	private Ach $ach;
	private Bacs $bacs;
	private ?array $mandates = null;
	private Sepa $sepa;

	/**
	 * Builder function for card
	 * 
	 * @param UpdateCustomerRequestCard $card
	 * 
	 * @return $this
	 */
	public function card(UpdateCustomerRequestCard $card): self
	{
		$this->setCard($card);
		
		return $this;
	}

	/**
	 * Setter function for card
	 * 
	 * @param UpdateCustomerRequestCard $card
	 * 
	 * @return void
	 */
	public function setCard(UpdateCustomerRequestCard $card): void
	{
		$this->card = $card;
	}

	/**
	 * Card details to be used for the transaction
	 * 
	 * @return UpdateCustomerRequestCard
	 */
	public function getCard(): UpdateCustomerRequestCard
	{
		return $this->card;
	}

	/**
	 * Builder function for paymentHandleTokenFrom
	 * 
	 * @param string $paymentHandleTokenFrom
	 * 
	 * @return $this
	 */
	public function paymentHandleTokenFrom(string $paymentHandleTokenFrom): self
	{
		$this->setPaymentHandleTokenFrom($paymentHandleTokenFrom);
		
		return $this;
	}

	/**
	 * Setter function for paymentHandleTokenFrom
	 * 
	 * @param string $paymentHandleTokenFrom
	 * 
	 * @return void
	 */
	public function setPaymentHandleTokenFrom(string $paymentHandleTokenFrom): void
	{
		$this->paymentHandleTokenFrom = $paymentHandleTokenFrom;
	}

	/**
	 * This is an existing Customer Payment Handle, from which
     * the payment instrument and profile details are retrieved.
	 * If this parameter is included you can omit the billingDetails object.
	 * 
	 * @return string
	 */
	public function getPaymentHandleTokenFrom(): string
	{
		return $this->paymentHandleTokenFrom;
	}

	/**
	 * Builder function for eft
	 * 
	 * @param Eft $eft
	 * 
	 * @return $this
	 */
	public function eft(Eft $eft): self
	{
		$this->setEft($eft);
		
		return $this;
	}

	/**
	 * Setter function for eft
	 * 
	 * @param Eft $eft
	 * 
	 * @return void
	 */
	public function setEft(Eft $eft): void
	{
		$this->eft = $eft;
	}

	/**
	 * Details of the EFT account to be used for the transaction
	 * 
	 * @return Eft
	 */
	public function getEft(): Eft
	{
		return $this->eft;
	}

	/**
	 * Builder function for dupCheck
	 * 
	 * @param bool $dupCheck
	 * 
	 * @return $this
	 */
	public function dupCheck(bool $dupCheck): self
	{
		$this->setDupCheck($dupCheck);
		
		return $this;
	}

	/**
	 * Setter function for dupCheck
	 * 
	 * @param bool $dupCheck
	 * 
	 * @return void
	 */
	public function setDupCheck(bool $dupCheck): void
	{
		$this->dupCheck = $dupCheck;
	}

	/**
	 * Get dupCheck
	 * 
	 * @return bool
	 */
	public function getDupCheck(): bool
	{
		return $this->dupCheck;
	}

	/**
	 * Builder function for ach
	 * 
	 * @param Ach $ach
	 * 
	 * @return $this
	 */
	public function ach(Ach $ach): self
	{
		$this->setAch($ach);
		
		return $this;
	}

	/**
	 * Setter function for ach
	 * 
	 * @param Ach $ach
	 * 
	 * @return void
	 */
	public function setAch(Ach $ach): void
	{
		$this->ach = $ach;
	}

	/**
	 * Details of the ach account to be used for the transaction.
	 * 
	 * @return Ach
	 */
	public function getAch(): Ach
	{
		return $this->ach;
	}

	/**
	 * Builder function for bacs
	 * 
	 * @param Bacs $bacs
	 * 
	 * @return $this
	 */
	public function bacs(Bacs $bacs): self
	{
		$this->setBacs($bacs);
		
		return $this;
	}

	/**
	 * Setter function for bacs
	 * 
	 * @param Bacs $bacs
	 * 
	 * @return void
	 */
	public function setBacs(Bacs $bacs): void
	{
		$this->bacs = $bacs;
	}

	/**
	 * Details of the bacs account to be used for the transaction.
	 * 
	 * @return Bacs
	 */
	public function getBacs(): Bacs
	{
		return $this->bacs;
	}

	/**
	 * Builder function for mandates
	 * 
	 * @param Mandate[] $mandates
	 * 
	 * @return $this
	 */
	public function mandates(array $mandates): self
	{
		$this->setMandates($mandates);
		
		return $this;
	}

	/**
	 * Setter function for mandates
	 * 
	 * @param Mandate[] $mandates
	 * 
	 * @return void
	 */
	public function setMandates(array $mandates): void
	{
		$this->mandates = $mandates;
	}

	/**
	 * Get mandates
	 * 
	 * @return Mandate[]|null
	 */
	public function getMandates(): array
	{
		return $this->mandates;
	}

	/**
	 * Add new mandatesItem
	 * 
	 * @param Mandate $mandatesItem
	 * 
	 * @return $this
	 */
	public function addMandatesItem(Mandate $mandatesItem): self
	{
		if ($this->mandates === null) {
			$this->setMandates([$mandatesItem]);
			
			return $this;
		}
		
		$mandates = $this->getMandates();
		$mandates[] = $mandatesItem;
		$this->setMandates($mandates);
		
		return $this;
	}

	/**
	 * Remove mandatesItem
	 * 
	 * @param Mandate $mandatesItem
	 * 
	 * @return $this
	 */
	public function removeMandatesItem(Mandate $mandatesItem): self
	{
		$this->setMandates(array_diff($this->getMandates(), [$mandatesItem]));
		
		return $this;
	}

	/**
	 * Builder function for sepa
	 * 
	 * @param Sepa $sepa
	 * 
	 * @return $this
	 */
	public function sepa(Sepa $sepa): self
	{
		$this->setSepa($sepa);
		
		return $this;
	}

	/**
	 * Setter function for sepa
	 * 
	 * @param Sepa $sepa
	 * 
	 * @return void
	 */
	public function setSepa(Sepa $sepa): void
	{
		$this->sepa = $sepa;
	}

	/**
	 * These are the details of the sepa account used for the transaction.
	 * 
	 * @return Sepa
	 */
	public function getSepa(): Sepa
	{
		return $this->sepa;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class CustomerPaymentInstrument {" . PHP_EOL
			. "    card: " . $this->toIndentedString($this->card) . PHP_EOL
			. "    paymentHandleTokenFrom: " . $this->toIndentedString($this->paymentHandleTokenFrom) . PHP_EOL
			. "    eft: " . $this->toIndentedString($this->eft) . PHP_EOL
			. "    dupCheck: " . $this->toIndentedString($this->dupCheck) . PHP_EOL
			. "    ach: " . $this->toIndentedString($this->ach) . PHP_EOL
			. "    bacs: " . $this->toIndentedString($this->bacs) . PHP_EOL
			. "    mandates: " . $this->toIndentedString($this->mandates) . PHP_EOL
			. "    sepa: " . $this->toIndentedString($this->sepa) . PHP_EOL
			. "}";
	}
}
