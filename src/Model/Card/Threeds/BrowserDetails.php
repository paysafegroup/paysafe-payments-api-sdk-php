<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card\Threeds;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Details about the customer's browser.
 */
class BrowserDetails extends BaseModel
{
    /**
     * This is the exact content of the HTTP accept header as sent to the 3DS Requestor from the cardholder’s browser.
     */
    private ?string $acceptHeader = null;
    private ?string $colorDepthBits = null;
    /**
     * Indicates if Java is enabled in the browser
     */
    private ?bool $javaEnabled = null;
    /**
     * Indicates if JavaScript is enabled in the browser
     */
    private ?bool $javaScriptEnabled = null;
    /**
     * The browser language
     */
    private ?string $language = null;
    /**
     * The screen height in pixels
     */
    private ?int $screenHeight = null;
    /**
     * The screen width in pixels
     */
    private ?int $screenWidth = null;
    /**
     * This is the date and time the request was processed. The ISO 8601 date format is expected, i.e., YYYY-MM-DD-THH:MM:SSZ.
     */
    private ?int $timeZoneOffset = null;
    /**
     * The browser user agent string
     */
    private ?string $userAgent = null;

    /**
     * Builder function for acceptHeader
     *
     * @param string $acceptHeader
     *
     * @return $this
     */
    public function acceptHeader(?string $acceptHeader): self
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
    public function setAcceptHeader(?string $acceptHeader): void
    {
        $this->acceptHeader = $acceptHeader;
    }

    /**
     * Getter function for acceptHeader
     *
     * @return ?string
     */
    public function getAcceptHeader(): ?string
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
    public function colorDepthBits(?string $colorDepthBits): self
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
    public function setColorDepthBits(?string $colorDepthBits): void
    {
        $this->colorDepthBits = $colorDepthBits;
    }

    /**
     * Getter function for colorDepthBits
     *
     * @return ?string
     */
    public function getColorDepthBits(): ?string
    {
        return $this->colorDepthBits;
    }
    /**
     * Builder function for javaEnabled
     *
     * @param bool $javaEnabled
     *
     * @return $this
     */
    public function javaEnabled(?bool $javaEnabled): self
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
    public function setJavaEnabled(?bool $javaEnabled): void
    {
        $this->javaEnabled = $javaEnabled;
    }

    /**
     * Getter function for javaEnabled
     *
     * @return ?bool
     */
    public function getJavaEnabled(): ?bool
    {
        return $this->javaEnabled;
    }
    /**
     * Builder function for javaScriptEnabled
     *
     * @param bool $javaScriptEnabled
     *
     * @return $this
     */
    public function javaScriptEnabled(?bool $javaScriptEnabled): self
    {
        $this->setJavaScriptEnabled($javaScriptEnabled);

        return $this;
    }

    /**
     * Setter function for javaScriptEnabled
     *
     * @param bool $javaScriptEnabled
     *
     * @return void
     */
    public function setJavaScriptEnabled(?bool $javaScriptEnabled): void
    {
        $this->javaScriptEnabled = $javaScriptEnabled;
    }

    /**
     * Getter function for javaScriptEnabled
     *
     * @return ?bool
     */
    public function getJavaScriptEnabled(): ?bool
    {
        return $this->javaScriptEnabled;
    }
    /**
     * Builder function for language
     *
     * @param string $language
     *
     * @return $this
     */
    public function language(?string $language): self
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
    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

    /**
     * Getter function for language
     *
     * @return ?string
     */
    public function getLanguage(): ?string
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
    public function screenHeight(?int $screenHeight): self
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
    public function setScreenHeight(?int $screenHeight): void
    {
        $this->screenHeight = $screenHeight;
    }

    /**
     * Getter function for screenHeight
     *
     * @return ?int
     */
    public function getScreenHeight(): ?int
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
    public function screenWidth(?int $screenWidth): self
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
    public function setScreenWidth(?int $screenWidth): void
    {
        $this->screenWidth = $screenWidth;
    }

    /**
     * Getter function for screenWidth
     *
     * @return ?int
     */
    public function getScreenWidth(): ?int
    {
        return $this->screenWidth;
    }
    /**
     * Builder function for timeZoneOffset
     *
     * @param int $timeZoneOffset
     *
     * @return $this
     */
    public function timeZoneOffset(?int $timeZoneOffset): self
    {
        $this->setTimeZoneOffset($timeZoneOffset);

        return $this;
    }

    /**
     * Setter function for timeZoneOffset
     *
     * @param int $timeZoneOffset
     *
     * @return void
     */
    public function setTimeZoneOffset(?int $timeZoneOffset): void
    {
        $this->timeZoneOffset = $timeZoneOffset;
    }

    /**
     * Getter function for timeZoneOffset
     *
     * @return ?int
     */
    public function getTimeZoneOffset(): ?int
    {
        return $this->timeZoneOffset;
    }
    /**
     * Builder function for userAgent
     *
     * @param string $userAgent
     *
     * @return $this
     */
    public function userAgent(?string $userAgent): self
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
    public function setUserAgent(?string $userAgent): void
    {
        $this->userAgent = $userAgent;
    }

    /**
     * Getter function for userAgent
     *
     * @return ?string
     */
    public function getUserAgent(): ?string
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
            . "    acceptHeader: " . $this->toIndentedString($this->acceptHeader ?? null) . PHP_EOL
            . "    colorDepthBits: " . $this->toIndentedString($this->colorDepthBits ?? null) . PHP_EOL
            . "    javaEnabled: " . $this->toIndentedString($this->javaEnabled ?? null) . PHP_EOL
            . "    javaScriptEnabled: " . $this->toIndentedString($this->javaScriptEnabled ?? null) . PHP_EOL
            . "    language: " . $this->toIndentedString($this->language ?? null) . PHP_EOL
            . "    screenHeight: " . $this->toIndentedString($this->screenHeight ?? null) . PHP_EOL
            . "    screenWidth: " . $this->toIndentedString($this->screenWidth ?? null) . PHP_EOL
            . "    timeZoneOffset: " . $this->toIndentedString($this->timeZoneOffset ?? null) . PHP_EOL
            . "    userAgent: " . $this->toIndentedString($this->userAgent ?? null) . PHP_EOL
            . "}";
    }
}
