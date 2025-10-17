<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Verification;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;

/**
 * VerificationList
 */
class VerificationList extends BaseModel
{

	private ?array $verifications = null;
	private Meta $meta;

	/**
	 * Builder function for verifications
	 * 
	 * @param Verification[] $verifications
	 * 
	 * @return $this
	 */
	public function verifications(array $verifications): self
	{
		$this->setVerifications($verifications);
		
		return $this;
	}

	/**
	 * Setter function for verifications
	 * 
	 * @param Verification[] $verifications
	 * 
	 * @return void
	 */
	public function setVerifications(array $verifications): void
	{
		$this->verifications = $verifications;
	}

	/**
	 * An array of Verifications.
	 * 
	 * @return Verification[]|null
	 */
	public function getVerifications(): array
	{
		return $this->verifications;
	}

	/**
	 * Add new verificationsItem
	 * 
	 * @param Verification $verificationsItem
	 * 
	 * @return $this
	 */
	public function addVerificationsItem(Verification $verificationsItem): self
	{
		if ($this->verifications === null) {
			$this->setVerifications([$verificationsItem]);
			
			return $this;
		}
		
		$verifications = $this->getVerifications();
		$verifications[] = $verificationsItem;
		$this->setVerifications($verifications);
		
		return $this;
	}

	/**
	 * Remove verificationsItem
	 * 
	 * @param Verification $verificationsItem
	 * 
	 * @return $this
	 */
	public function removeVerificationsItem(Verification $verificationsItem): self
	{
		$this->setVerifications(array_diff($this->getVerifications(), [$verificationsItem]));
		
		return $this;
	}

	/**
	 * Builder function for meta
	 * 
	 * @param Meta $meta
	 * 
	 * @return $this
	 */
	public function meta(Meta $meta): self
	{
		$this->setMeta($meta);
		
		return $this;
	}

	/**
	 * Setter function for meta
	 * 
	 * @param Meta $meta
	 * 
	 * @return void
	 */
	public function setMeta(Meta $meta): void
	{
		$this->meta = $meta;
	}

	/**
	 * Contains meta info for the pagination APIs
	 * 
	 * @return Meta
	 */
	public function getMeta(): Meta
	{
		return $this->meta;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class VerificationList {" . PHP_EOL
			. "    verifications: " . $this->toIndentedString($this->verifications) . PHP_EOL
			. "    meta: " . $this->toIndentedString($this->meta) . PHP_EOL
			. "}";
	}
}
