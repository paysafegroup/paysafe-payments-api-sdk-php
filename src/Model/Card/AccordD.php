<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are parameters for financing plans supported for certain merchant configurations.
Include this element only when instructed to do so by your account manager.

**Note:** Not all processing gateways support this parameter. Contact your account manager for more information.
 */
class AccordD extends BaseModel
{
	const FINANCING_TYPE_DEFERRED_PAYMENT = 'DEFERRED_PAYMENT';
	const FINANCING_TYPE_EQUAL_PAYMENT = 'EQUAL_PAYMENT';


	/**
	 * This is the type of financing offered.
	 * 
	 * - DEFERRED_PAYMENT – Deferred payment financing.
	 * - EQUAL_PAYMENT – Equal payment financing
	 */
	private string $financingType;

	/**
	 * This is the plan number for this financing transaction.
	 * Example: 124
	 */
	private string $plan;

	/**
	 * This is the grace period, in months, associated with deferred payment transactions.
	 * Example: 12
	 */
	private int $gracePeriod;

	/**
	 * This is the number of payments, in months, for equal payment transactions.
	 * Example: 12
	 */
	private int $term;


	/**
	 * Builder function for financingType
	 * 
	 * @param string $financingType
	 * 
	 * @return AccordD
	 */
	public function financingType(string $financingType): self
	{
		$this->setFinancingType($financingType);
		
		return $this;
	}
	/**
	 * Setter function for financingType
	 * 
	 * @param string $financingType
	 * 
	 * @return void
	 */
	public function setFinancingType(string $financingType): void
	{
		$this->financingType = $financingType;
	}
	/**
	 * Getter function for financingType
	 * 
	 * @return string
	 */
	public function getFinancingType(): string
	{
		return $this->financingType;
	}

	/**
	 * Builder function for plan
	 * 
	 * @param string $plan
	 * 
	 * @return AccordD
	 */
	public function plan(string $plan): self
	{
		$this->setPlan($plan);
		
		return $this;
	}
	/**
	 * Setter function for plan
	 * 
	 * @param string $plan
	 * 
	 * @return void
	 */
	public function setPlan(string $plan): void
	{
		$this->plan = $plan;
	}
	/**
	 * Getter function for plan
	 * 
	 * @return string
	 */
	public function getPlan(): string
	{
		return $this->plan;
	}

	/**
	 * Builder function for gracePeriod
	 * 
	 * @param int $gracePeriod
	 * 
	 * @return AccordD
	 */
	public function gracePeriod(int $gracePeriod): self
	{
		$this->setGracePeriod($gracePeriod);
		
		return $this;
	}
	/**
	 * Setter function for gracePeriod
	 * 
	 * @param int $gracePeriod
	 * 
	 * @return void
	 */
	public function setGracePeriod(int $gracePeriod): void
	{
		$this->gracePeriod = $gracePeriod;
	}
	/**
	 * Getter function for gracePeriod
	 * 
	 * @return int
	 */
	public function getGracePeriod(): int
	{
		return $this->gracePeriod;
	}

	/**
	 * Builder function for term
	 * 
	 * @param int $term
	 * 
	 * @return AccordD
	 */
	public function term(int $term): self
	{
		$this->setTerm($term);
		
		return $this;
	}
	/**
	 * Setter function for term
	 * 
	 * @param int $term
	 * 
	 * @return void
	 */
	public function setTerm(int $term): void
	{
		$this->term = $term;
	}
	/**
	 * Getter function for term
	 * 
	 * @return int
	 */
	public function getTerm(): int
	{
		return $this->term;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class AccordD {" . PHP_EOL . 
			"	financingType: " . $this->toIndentedString($this->financingType) . PHP_EOL .
			"	plan: " . $this->toIndentedString($this->plan) . PHP_EOL .
			"	gracePeriod: " . $this->toIndentedString($this->gracePeriod) . PHP_EOL .
			"	term: " . $this->toIndentedString($this->term) . PHP_EOL .
		"}";
	}
}
