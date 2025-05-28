<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Profile;

use Paysafe\PhpSdk\Model\BaseModel;

class IdentityDocument extends BaseModel
{
	private string $type;
	private string $documentNumber;

	/**
	 * Builder function for type
	 * 
	 * @param string $type
	 * 
	 * @return $this
	 */
	public function type(string $type): self
	{
		$this->setType($type);
		
		return $this;
	}

	/**
	 * Setter function for type
	 * 
	 * @param string $type
	 * 
	 * @return void
	 */
	public function setType(string $type): void
	{
		$this->type = $type;
	}

	/**
	 * Getter function for type
	 * 
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * Builder function for documentNumber
	 * 
	 * @param string $documentNumber
	 * 
	 * @return $this
	 */
	public function documentNumber(string $documentNumber): self
	{
		$this->setDocumentNumber($documentNumber);
		
		return $this;
	}

	/**
	 * Setter function for documentNumber
	 * 
	 * @param string $documentNumber
	 * 
	 * @return void
	 */
	public function setDocumentNumber(string $documentNumber): void
	{
		$this->documentNumber = $documentNumber;
	}

	/**
	 * Getter function for documentNumber
	 * 
	 * @return string
	 */
	public function getDocumentNumber(): string
	{
		return $this->documentNumber;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class IdentityDocument {" . PHP_EOL
			. "    type: " . $this->toIndentedString($this->type) . PHP_EOL
			. "    documentNumber: " . $this->toIndentedString($this->documentNumber) . PHP_EOL
			. "}";
	}
}
