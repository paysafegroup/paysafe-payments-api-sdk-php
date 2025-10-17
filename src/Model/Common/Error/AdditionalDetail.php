<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Error;

use Paysafe\PhpSdk\Model\BaseModel;

class AdditionalDetail extends BaseModel
{
	private string $type;
	private string $code;
	private string $message;

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
	 * Builder function for code
	 * 
	 * @param string $code
	 * 
	 * @return $this
	 */
	public function code(string $code): self
	{
		$this->setCode($code);
		
		return $this;
	}

	/**
	 * Setter function for code
	 * 
	 * @param string $code
	 * 
	 * @return void
	 */
	public function setCode(string $code): void
	{
		$this->code = $code;
	}

	/**
	 * Getter function for code
	 * 
	 * @return string
	 */
	public function getCode(): string
	{
		return $this->code;
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
	 * Getter function for message
	 * 
	 * @return string
	 */
	public function getMessage(): string
	{
		return $this->message;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class AdditionalDetail {" . PHP_EOL
			. "    type: " . $this->toIndentedString($this->type) . PHP_EOL
			. "    code: " . $this->toIndentedString($this->code) . PHP_EOL
			. "    message: " . $this->toIndentedString($this->message) . PHP_EOL
			. "}";
	}
}
