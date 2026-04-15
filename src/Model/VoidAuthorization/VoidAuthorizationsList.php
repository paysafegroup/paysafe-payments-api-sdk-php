<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\VoidAuthorization;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;

/**
 * These are internal details of the void authorization response.
 */
class VoidAuthorizationsList extends BaseModel
{

	private ?array $voidAuths = null;
	private Meta $meta;

	/**
	 * Builder function for voidAuths
	 * 
	 * @param VoidAuthorization[] $voidAuths
	 * 
	 * @return $this
	 */
	public function voidAuths(array $voidAuths): self
	{
		$this->setVoidAuths($voidAuths);
		
		return $this;
	}

	/**
	 * Setter function for voidAuths
	 * 
	 * @param VoidAuthorization[] $voidAuths
	 * 
	 * @return void
	 */
	public function setVoidAuths(array $voidAuths): void
	{
		$this->voidAuths = $voidAuths;
	}

	/**
	 * Get voidAuths
	 * 
	 * @return VoidAuthorization[]|null
	 */
	public function getVoidAuths(): array
	{
		return $this->voidAuths;
	}

	/**
	 * Add new voidAuthsItem
	 * 
	 * @param VoidAuthorization $voidAuthsItem
	 * 
	 * @return $this
	 */
	public function addVoidAuthsItem(VoidAuthorization $voidAuthsItem): self
	{
		if ($this->voidAuths === null) {
			$this->setVoidAuths([$voidAuthsItem]);
			
			return $this;
		}
		
		$voidAuths = $this->getVoidAuths();
		$voidAuths[] = $voidAuthsItem;
		$this->setVoidAuths($voidAuths);
		
		return $this;
	}

	/**
	 * Remove voidAuthsItem
	 * 
	 * @param VoidAuthorization $voidAuthsItem
	 * 
	 * @return $this
	 */
	public function removeVoidAuthsItem(VoidAuthorization $voidAuthsItem): self
	{
		$this->setVoidAuths(array_diff($this->getVoidAuths(), [$voidAuthsItem]));
		
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
		return "class VoidAuthorizationsList {" . PHP_EOL
			. "    voidAuths: " . $this->toIndentedString($this->voidAuths) . PHP_EOL
			. "    meta: " . $this->toIndentedString($this->meta) . PHP_EOL
			. "}";
	}
}
