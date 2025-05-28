<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * StoreDetails
 */
class StoreDetails extends BaseModel
{

	private ?array $storeDetailsList = null;
	private string $message;
	private string $status;
	private string $errorCode;

	/**
	 * Builder function for storeDetailsList
	 * 
	 * @param StoreDetailsInner[] $storeDetailsList
	 * 
	 * @return $this
	 */
	public function storeDetailsList(array $storeDetailsList): self
	{
		$this->setStoreDetailsList($storeDetailsList);
		
		return $this;
	}

	/**
	 * Setter function for storeDetailsList
	 * 
	 * @param StoreDetailsInner[] $storeDetailsList
	 * 
	 * @return void
	 */
	public function setStoreDetailsList(array $storeDetailsList): void
	{
		$this->storeDetailsList = $storeDetailsList;
	}

	/**
	 * Get storeDetailsList
	 * 
	 * @return StoreDetailsInner[]|null
	 */
	public function getStoreDetailsList(): array
	{
		return $this->storeDetailsList;
	}

	/**
	 * Add new storeDetailsListItem
	 * 
	 * @param StoreDetailsInner $storeDetailsListItem
	 * 
	 * @return $this
	 */
	public function addStoreDetailsListItem(StoreDetailsInner $storeDetailsListItem): self
	{
		if ($this->storeDetailsList === null) {
			$this->setStoreDetailsList([$storeDetailsListItem]);
			
			return $this;
		}
		
		$storeDetailsList = $this->getStoreDetailsList();
		$storeDetailsList[] = $storeDetailsListItem;
		$this->setStoreDetailsList($storeDetailsList);
		
		return $this;
	}

	/**
	 * Remove storeDetailsListItem
	 * 
	 * @param StoreDetailsInner $storeDetailsListItem
	 * 
	 * @return $this
	 */
	public function removeStoreDetailsListItem(StoreDetailsInner $storeDetailsListItem): self
	{
		$this->setStoreDetailsList(array_diff($this->getStoreDetailsList(), [$storeDetailsListItem]));
		
		return $this;
	}

	/**
	 * Builder function for message
	 * 
	 * @param string $message
	 * 
	 * @return $this
	 */
	public function message(string $message): self
	{
		$this->setMessage($message);
		
		return $this;
	}

	/**
	 * Setter function for message
	 * 
	 * @param string $message
	 * 
	 * @return void
	 */
	public function setMessage(string $message): void
	{
		$this->message = $message;
	}

	/**
	 * Get message
	 * 
	 * @return string
	 */
	public function getMessage(): string
	{
		return $this->message;
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
	 * Get status
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Builder function for errorCode
	 * 
	 * @param string $errorCode
	 * 
	 * @return $this
	 */
	public function errorCode(string $errorCode): self
	{
		$this->setErrorCode($errorCode);
		
		return $this;
	}

	/**
	 * Setter function for errorCode
	 * 
	 * @param string $errorCode
	 * 
	 * @return void
	 */
	public function setErrorCode(string $errorCode): void
	{
		$this->errorCode = $errorCode;
	}

	/**
	 * Get errorCode
	 * 
	 * @return string
	 */
	public function getErrorCode(): string
	{
		return $this->errorCode;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class StoreDetails {" . PHP_EOL
			. "    storeDetailsList: " . $this->toIndentedString($this->storeDetailsList) . PHP_EOL
			. "    message: " . $this->toIndentedString($this->message) . PHP_EOL
			. "    status: " . $this->toIndentedString($this->status) . PHP_EOL
			. "    errorCode: " . $this->toIndentedString($this->errorCode) . PHP_EOL
			. "}";
	}
}
