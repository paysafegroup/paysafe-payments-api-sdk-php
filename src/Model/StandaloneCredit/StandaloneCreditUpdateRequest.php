<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\StandaloneCredit;

use Paysafe\PhpSdk\Model\Lpm\Interac;
use Paysafe\PhpSdk\Model\BaseModel;

class StandaloneCreditUpdateRequest extends BaseModel
{

    // This is the merchant reference number created by the merchant and submitted as part of the request.
    // Example: merchantRefNum-101
	private string $merchantRefNum;
	private Interac $interacEtransfer;

	/**
	 * Builder function for merchantRefNum
	 * 
	 * @param string $merchantRefNum
	 * 
	 * @return StandaloneCreditUpdateRequest
	 */
	public function merchantRefNum(string $merchantRefNum): self
	{
		$this->setMerchantRefNum($merchantRefNum);
		
		return $this;
	}
	/**
	 * Setter function for merchantRefNum
	 * 
	 * @param string $merchantRefNum
	 * 
	 * @return void
	 */
	public function setMerchantRefNum(string $merchantRefNum): void
	{
		$this->merchantRefNum = $merchantRefNum;
	}
	/**
	 * Getter function for merchantRefNum
	 * 
	 * @return string
	 */
	public function getMerchantRefNum(): string
	{
		return $this->merchantRefNum;
	}

	/**
	 * Builder function for interacEtransfer
	 * 
	 * @param Interac $interacEtransfer
	 * 
	 * @return StandaloneCreditUpdateRequest
	 */
	public function interacEtransfer(Interac $interacEtransfer): self
	{
		$this->setInteracEtransfer($interacEtransfer);
		
		return $this;
	}
	/**
	 * Setter function for interacEtransfer
	 * 
	 * @param Interac $interacEtransfer
	 * 
	 * @return void
	 */
	public function setInteracEtransfer(Interac $interacEtransfer): void
	{
		$this->interacEtransfer = $interacEtransfer;
	}
	/**
	 * Getter function for interacEtransfer
	 * 
	 * @return Interac
	 */
	public function getInteracEtransfer(): Interac
	{
		return $this->interacEtransfer;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class StandaloneCreditUpdateRequest {" . PHP_EOL . 
			"	merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL .
			"	interacEtransfer: " . $this->toIndentedString($this->interacEtransfer) . PHP_EOL .
		"}";
	}
}
