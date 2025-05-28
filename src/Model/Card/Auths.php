<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\Card\FundingTransaction;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * **Note:**

- Not all processing gateways support this parameter.

- To use the fundingTransaction object your account must be configured by Paysafe.

- If you want to support funding transactions for additional MCCs, please contact Paysafe's operational support.
 */
class Auths extends BaseModel
{

	private FundingTransaction $fundingTransaction;

	/**
	 * Builder function for fundingTransaction
	 * 
	 * @param FundingTransaction $fundingTransaction
	 * 
	 * @return Auths
	 */
	public function fundingTransaction(FundingTransaction $fundingTransaction): self
	{
		$this->setFundingTransaction($fundingTransaction);
		
		return $this;
	}
	/**
	 * Setter function for fundingTransaction
	 * 
	 * @param FundingTransaction $fundingTransaction
	 * 
	 * @return void
	 */
	public function setFundingTransaction(FundingTransaction $fundingTransaction): void
	{
		$this->fundingTransaction = $fundingTransaction;
	}
	/**
	 * Getter function for fundingTransaction
	 * 
	 * @return FundingTransaction
	 */
	public function getFundingTransaction(): FundingTransaction
	{
		return $this->fundingTransaction;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Auths {" . PHP_EOL . 
			"	fundingTransaction: " . $this->toIndentedString($this->fundingTransaction) . PHP_EOL .
		"}";
	}
}
