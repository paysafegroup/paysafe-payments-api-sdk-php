<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * The URL endpoints to redirect the customer to after a redirection to an alternative payment or 3D Secure site.
 * You can customize the return URL based on the transaction status.
 */
class ReturnLink extends BaseModel
{
	const REL_DEFAULT = 'default';
	const REL_ON_COMPLETED = 'on_completed';
	const REL_ON_FAILED = 'on_failed';
	const REL_ON_CANCELLED = 'on_cancelled';


	/**
	 * This is the link type that allows different endpoints
     * to be targeted depending on the end state of the transaction.
	 * > The default return URL is mandatory
	 * - on_completed - Paysafe will return to this merchant url post successful payment.
	 * - on_failed - Paysafe will return to this merchant url post if payment is failed.
	 * - on_cancelled - Paysafe will return to this merchant url post if payment is cancelled.
	 * - default - The default return URL that will be used if specific status return URL is not defined.
	 */
	private string $rel;


	/**
	 * This is the URI of the resource.<br>
	 * **Supported protocols**: `http` and `https`
	 * Example: https://US_commerce_site/payment/return/success
	 */
	private string $href;

	/**
	 * This is the HTTP method.
	 * Example: GET
	 */
	private string $method;



	/**
	 * Builder function for rel
	 * 
	 * @param string $rel
	 * 
	 * @return ReturnLink
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
	 * @return ReturnLink
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
	 * @return ReturnLink
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
		return "class ReturnLink {" . PHP_EOL .
			"	rel: " . $this->toIndentedString($this->rel) . PHP_EOL .
			"	href: " . $this->toIndentedString($this->href) . PHP_EOL .
			"	method: " . $this->toIndentedString($this->method) . PHP_EOL .
		"}";
	}
}
