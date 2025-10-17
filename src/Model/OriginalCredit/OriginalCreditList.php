<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\OriginalCredit;

use Paysafe\PhpSdk\Model\Common\Meta;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * OriginalCreditList
 */
class OriginalCreditList extends BaseModel
{

    /**
     * @var OriginalCredit[]|null $originalCredit
     */
	private ?array $originalCredits = null;
	private Meta $meta;

	/**
	 * Builder function for originalCredit
	 * 
	 * @param OriginalCredit[] $originalCredits
	 * 
	 * @return OriginalCreditList
	 */
	public function originalCredits(array $originalCredits): self
	{
		$this->setOriginalCredits($originalCredits);
		
		return $this;
	}
	/**
	 * Setter function for originalCredits
	 * 
	 * @param OriginalCredit[] $originalCredits
	 * 
	 * @return void
	 */
	public function setOriginalCredits(array $originalCredits): void
	{
		$this->originalCredits = $originalCredits;
	}
	/**
	 * Getter function for originalCredits
	 * 
	 * @return OriginalCredit[]
	 */
	public function getOriginalCredits(): array
	{
		return $this->originalCredits ?? [];
	}

    /**
     * Add a new original credit item to the original credit list
     *
     * @param OriginalCredit $originalCreditItem
     *
     * @return $this
     */
    public function addOriginalCreditItem(OriginalCredit $originalCreditItem): self
    {
        if ($this->originalCredit === null) {
            $this->originalCredit = [];
        }

        $this->originalCredit[] = $originalCreditItem;

        return $this;
    }

    /**
     * Remove one of the original credit items from the original credit list
     *
     * @param OriginalCredit $originalCreditItem
     *
     * @return $this
     */
    public function removeOriginalCreditItem(OriginalCredit $originalCreditItem): self
    {
        $this->setOriginalCredits(array_diff($this->getOriginalCredits(), [$originalCreditItem]));

        return $this;
    }

	/**
	 * Builder function for meta
	 * 
	 * @param Meta $meta
	 * 
	 * @return OriginalCreditList
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
	 * Getter function for meta
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
		return "class OriginalCreditList {" . PHP_EOL .
			"	originalCredits: " . $this->toIndentedString($this->originalCredits) . PHP_EOL .
			"	meta: " . $this->toIndentedString($this->meta) . PHP_EOL .
		"}";
	}
}
