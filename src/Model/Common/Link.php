<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common;

use Paysafe\PhpSdk\Model\BaseModel;

class Link extends BaseModel
{
	private string $rel;
	private string $href;
	private string $method;

	/**
	 * Builder function for rel
	 * 
	 * @param string $rel
	 * 
	 * @return $this
	 */
	public function rel(string $rel): self
	{
		$this->setRel($rel);
		
		return $this;
	}

	/**
	 * Setter function for rel
	 * 
	 * @param string $rel
	 * 
	 * @return void
	 */
	public function setRel(string $rel): void
	{
		$this->rel = $rel;
	}

	/**
	 * Getter function for rel
	 * 
	 * @return string
	 */
	public function getRel(): string
	{
		return $this->rel;
	}

	/**
	 * Builder function for href
	 * 
	 * @param string $href
	 * 
	 * @return $this
	 */
	public function href(string $href): self
	{
		$this->setHref($href);
		
		return $this;
	}

	/**
	 * Setter function for href
	 * 
	 * @param string $href
	 * 
	 * @return void
	 */
	public function setHref(string $href): void
	{
		$this->href = $href;
	}

	/**
	 * Getter function for href
	 * 
	 * @return string
	 */
	public function getHref(): string
	{
		return $this->href;
	}

	/**
	 * Builder function for method
	 * 
	 * @param string $method
	 * 
	 * @return $this
	 */
	public function method(string $method): self
	{
		$this->setMethod($method);
		
		return $this;
	}

	/**
	 * Setter function for method
	 * 
	 * @param string $method
	 * 
	 * @return void
	 */
	public function setMethod(string $method): void
	{
		$this->method = $method;
	}

	/**
	 * Getter function for method
	 * 
	 * @return string
	 */
	public function getMethod(): string
	{
		return $this->method;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Link {" . PHP_EOL
			. "    rel: " . $this->toIndentedString($this->rel) . PHP_EOL
			. "    href: " . $this->toIndentedString($this->href) . PHP_EOL
			. "    method: " . $this->toIndentedString($this->method) . PHP_EOL
			. "}";
	}
}
