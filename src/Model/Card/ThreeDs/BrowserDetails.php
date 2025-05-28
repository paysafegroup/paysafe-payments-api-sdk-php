<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * **For Interac e-Transfer withdrawal only** <br>
 * This is part of Interac e-Transfer withdrawal payment handle request. It is used for risk assessment by Interac.
 * |REQUIRED|CONDITION
 * |-|-
 * |Conditional|This parameter is mandatory if "deviceDetails" object
 * is not passed as a part of Interac e-Transfer withdrawal payment handle request.
 */
class BrowserDetails extends BaseModel
{

	private string $acceptHeader;
	private string $colorDepthBits;
	private string $customerIp;
	private bool $javaEnabled;
	private bool $javascriptEnabled;
	private string $language;
	private int $screenHeight;
	private int $screenWidth;
	private int $timezoneOffset;
	private string $userAgent;

	/**
	 * Builder function for acceptHeader
	 * 
	 * @param string $acceptHeader
	 * 
	 * @return $this
	 */
	public function acceptHeader(string $acceptHeader): self
	{
		$this->setAcceptHeader($acceptHeader);
		
		return $this;
	}

	/**
	 * Setter function for acceptHeader
	 * 
	 * @param string $acceptHeader
	 * 
	 * @return void
	 */
	public function setAcceptHeader(string $acceptHeader): void
	{
		$this->acceptHeader = $acceptHeader;
	}

	/**
	 * This is the exact content of the HTTP accept header as sent to the 3DS Requestor from the cardholder’s browser.
	 * 
	 * @return string
	 */
	public function getAcceptHeader(): string
	{
		return $this->acceptHeader;
	}

	/**
	 * Builder function for colorDepthBits
	 * 
	 * @param string $colorDepthBits
	 * 
	 * @return $this
	 */
	public function colorDepthBits(string $colorDepthBits): self
	{
		$this->setColorDepthBits($colorDepthBits);
		
		return $this;
	}

	/**
	 * Setter function for colorDepthBits
	 * 
	 * @param string $colorDepthBits
	 * 
	 * @return void
	 */
	public function setColorDepthBits(string $colorDepthBits): void
	{
		$this->colorDepthBits = $colorDepthBits;
	}

	/**
	 * This is the bit depth of the color palette for displaying images, in bits per pixel.
	 * 
	 * @return string
	 */
	public function getColorDepthBits(): string
	{
		return $this->colorDepthBits;
	}

	/**
	 * Builder function for customerIp
	 * 
	 * @param string $customerIp
	 * 
	 * @return $this
	 */
	public function customerIp(string $customerIp): self
	{
		$this->setCustomerIp($customerIp);
		
		return $this;
	}

	/**
	 * Setter function for customerIp
	 * 
	 * @param string $customerIp
	 * 
	 * @return void
	 */
	public function setCustomerIp(string $customerIp): void
	{
		$this->customerIp = $customerIp;
	}

	/**
	 * This is the customer's IP address. Valid Ip address format are IPv4 / IPv6.
	 * 
	 * @return string
	 */
	public function getCustomerIp(): string
	{
		return $this->customerIp;
	}

	/**
	 * Builder function for javaEnabled
	 * 
	 * @param bool $javaEnabled
	 * 
	 * @return $this
	 */
	public function javaEnabled(bool $javaEnabled): self
	{
		$this->setJavaEnabled($javaEnabled);
		
		return $this;
	}

	/**
	 * Setter function for javaEnabled
	 * 
	 * @param bool $javaEnabled
	 * 
	 * @return void
	 */
	public function setJavaEnabled(bool $javaEnabled): void
	{
		$this->javaEnabled = $javaEnabled;
	}

	/**
	 * This indicates whether the cardholder's browser is able to execute Java.
	 * 
	 * @return bool
	 */
	public function getJavaEnabled(): bool
	{
		return $this->javaEnabled;
	}

	/**
	 * Builder function for javascriptEnabled
	 * 
	 * @param bool $javascriptEnabled
	 * 
	 * @return $this
	 */
	public function javascriptEnabled(bool $javascriptEnabled): self
	{
		$this->setJavascriptEnabled($javascriptEnabled);
		
		return $this;
	}

	/**
	 * Setter function for javascriptEnabled
	 * 
	 * @param bool $javascriptEnabled
	 * 
	 * @return void
	 */
	public function setJavascriptEnabled(bool $javascriptEnabled): void
	{
		$this->javascriptEnabled = $javascriptEnabled;
	}

	/**
	 * This indicates whether the cardholder's browser is able to execute JavaScript.
	 * 
	 * @return bool
	 */
	public function getJavascriptEnabled(): bool
	{
		return $this->javascriptEnabled;
	}

	/**
	 * Builder function for language
	 * 
	 * @param string $language
	 * 
	 * @return $this
	 */
	public function language(string $language): self
	{
		$this->setLanguage($language);
		
		return $this;
	}

	/**
	 * Setter function for language
	 * 
	 * @param string $language
	 * 
	 * @return void
	 */
	public function setLanguage(string $language): void
	{
		$this->language = $language;
	}

	/**
	 * This is the language in the browser.
	 * 
	 * @return string
	 */
	public function getLanguage(): string
	{
		return $this->language;
	}

	/**
	 * Builder function for screenHeight
	 * 
	 * @param int $screenHeight
	 * 
	 * @return $this
	 */
	public function screenHeight(int $screenHeight): self
	{
		$this->setScreenHeight($screenHeight);
		
		return $this;
	}

	/**
	 * Setter function for screenHeight
	 * 
	 * @param int $screenHeight
	 * 
	 * @return void
	 */
	public function setScreenHeight(int $screenHeight): void
	{
		$this->screenHeight = $screenHeight;
	}

	/**
     * This is the total height of the cardholder’s screen in pixels. <br />
     * Maximum: 999999
     *
	 * @return int
	 */
	public function getScreenHeight(): int
	{
		return $this->screenHeight;
	}

	/**
	 * Builder function for screenWidth
	 * 
	 * @param int $screenWidth
	 * 
	 * @return $this
	 */
	public function screenWidth(int $screenWidth): self
	{
		$this->setScreenWidth($screenWidth);
		
		return $this;
	}

	/**
	 * Setter function for screenWidth
	 * 
	 * @param int $screenWidth
	 * 
	 * @return void
	 */
	public function setScreenWidth(int $screenWidth): void
	{
		$this->screenWidth = $screenWidth;
	}

	/**
     * This is the total width of the cardholder’s screen in pixels. <br />
     * Maximum: 999999
     *
	 * @return int
	 */
	public function getScreenWidth(): int
	{
		return $this->screenWidth;
	}

	/**
	 * Builder function for timezoneOffset
	 * 
	 * @param int $timezoneOffset
	 * 
	 * @return $this
	 */
	public function timezoneOffset(int $timezoneOffset): self
	{
		$this->setTimezoneOffset($timezoneOffset);
		
		return $this;
	}

	/**
	 * Setter function for timezoneOffset
	 * 
	 * @param int $timezoneOffset
	 * 
	 * @return void
	 */
	public function setTimezoneOffset(int $timezoneOffset): void
	{
		$this->timezoneOffset = $timezoneOffset;
	}

	/**
     * This is the time-zone offset in minutes between UTC and the local time of the cardholder's browser. <br />
     * Maximum: 99999
     *
	 * @return int
	 */
	public function getTimezoneOffset(): int
	{
		return $this->timezoneOffset;
	}

	/**
	 * Builder function for userAgent
	 * 
	 * @param string $userAgent
	 * 
	 * @return $this
	 */
	public function userAgent(string $userAgent): self
	{
		$this->setUserAgent($userAgent);
		
		return $this;
	}

	/**
	 * Setter function for userAgent
	 * 
	 * @param string $userAgent
	 * 
	 * @return void
	 */
	public function setUserAgent(string $userAgent): void
	{
		$this->userAgent = $userAgent;
	}

	/**
     * This is the User-Agent header from the customer's browser. For example:<br />
     * Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125
     * Safari/537.36
     *
	 * @return string
	 */
	public function getUserAgent(): string
	{
		return $this->userAgent;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class BrowserDetails {" . PHP_EOL
			. "    acceptHeader: " . $this->toIndentedString($this->acceptHeader) . PHP_EOL
			. "    colorDepthBits: " . $this->toIndentedString($this->colorDepthBits) . PHP_EOL
			. "    customerIp: " . $this->toIndentedString($this->customerIp) . PHP_EOL
			. "    javaEnabled: " . $this->toIndentedString($this->javaEnabled) . PHP_EOL
			. "    javascriptEnabled: " . $this->toIndentedString($this->javascriptEnabled) . PHP_EOL
			. "    language: " . $this->toIndentedString($this->language) . PHP_EOL
			. "    screenHeight: " . $this->toIndentedString($this->screenHeight) . PHP_EOL
			. "    screenWidth: " . $this->toIndentedString($this->screenWidth) . PHP_EOL
			. "    timezoneOffset: " . $this->toIndentedString($this->timezoneOffset) . PHP_EOL
			. "    userAgent: " . $this->toIndentedString($this->userAgent) . PHP_EOL
			. "}";
	}
}
