<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the details of the customer used for the transaction.
 */
class Skrill extends BaseModel
{

	private string $consumerId;
	private string $emailSubject;
	private string $emailMessage;
	private string $recipientDescription;
	private string $language;
	private string $logoUrl;
	private string $detail1Description;
	private string $detail1Text;
	private string $countryCode;

	/**
	 * Builder function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return $this
	 */
	public function consumerId(string $consumerId): self
	{
		$this->setConsumerId($consumerId);
		
		return $this;
	}

	/**
	 * Setter function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return void
	 */
	public function setConsumerId(string $consumerId): void
	{
		$this->consumerId = $consumerId;
	}

	/**
	 * This is the email address of the customer who is  making or receiving the payment.
     * This is to be provided by merchant.
	 * This is sent as \"pay_from_email\" to Skrill.
	 * 
	 * @return string
	 */
	public function getConsumerId(): string
	{
		return $this->consumerId;
	}

	/**
	 * Builder function for emailSubject
	 * 
	 * @param string $emailSubject
	 * 
	 * @return $this
	 */
	public function emailSubject(string $emailSubject): self
	{
		$this->setEmailSubject($emailSubject);
		
		return $this;
	}

	/**
	 * Setter function for emailSubject
	 * 
	 * @param string $emailSubject
	 * 
	 * @return void
	 */
	public function setEmailSubject(string $emailSubject): void
	{
		$this->emailSubject = $emailSubject;
	}

	/**
	 * <b>Note:<b> Mandatory field for payout only. This is the Subject line to use in the customer email.
	 * This is to be provided by merchant while making a payout.
	 * 
	 * @return string
	 */
	public function getEmailSubject(): string
	{
		return $this->emailSubject;
	}

	/**
	 * Builder function for emailMessage
	 * 
	 * @param string $emailMessage
	 * 
	 * @return $this
	 */
	public function emailMessage(string $emailMessage): self
	{
		$this->setEmailMessage($emailMessage);
		
		return $this;
	}

	/**
	 * Setter function for emailMessage
	 * 
	 * @param string $emailMessage
	 * 
	 * @return void
	 */
	public function setEmailMessage(string $emailMessage): void
	{
		$this->emailMessage = $emailMessage;
	}

	/**
	 * <b>Note:<b> Mandatory field for payout. This is the message to use in the customer email.
     * This is to be provided by merchant while  making a payout.
	 * 
	 * @return string
	 */
	public function getEmailMessage(): string
	{
		return $this->emailMessage;
	}

	/**
	 * Builder function for recipientDescription
	 * 
	 * @param string $recipientDescription
	 * 
	 * @return $this
	 */
	public function recipientDescription(string $recipientDescription): self
	{
		$this->setRecipientDescription($recipientDescription);
		
		return $this;
	}

	/**
	 * Setter function for recipientDescription
	 * 
	 * @param string $recipientDescription
	 * 
	 * @return void
	 */
	public function setRecipientDescription(string $recipientDescription): void
	{
		$this->recipientDescription = $recipientDescription;
	}

	/**
	 * This is a description to be shown on the Skrill payment page in the logo area
     * if there is no logo_url parameter.
	 * If no value is submitted and  there is no logo, the pay_to_email value is shown
     * as the recipient of the payment.
	 * 
	 * @return string
	 */
	public function getRecipientDescription(): string
	{
		return $this->recipientDescription;
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
	 * The 2-character preferred language code for the consumer
     * (e.g. AU, AT, BE, BR, CA, CH, CN, DE, ES, GB, FR, IT, NL, PL, PT, RU, or US.)
	 * or A five-character code is also valid for languages in these countries
     * (e.g. da_DK, he_IL, id_ID, ja_JP, no_NO, pt_BR, ru_RU, sv_SE,
	 * th_TH, zh_CN, zh_HK, and zh_TW). <br />
	 * 
	 * @return string
	 */
	public function getLanguage(): string
	{
		return $this->language;
	}

	/**
	 * Builder function for logoUrl
	 * 
	 * @param string $logoUrl
	 * 
	 * @return $this
	 */
	public function logoUrl(string $logoUrl): self
	{
		$this->setLogoUrl($logoUrl);
		
		return $this;
	}

	/**
	 * Setter function for logoUrl
	 * 
	 * @param string $logoUrl
	 * 
	 * @return void
	 */
	public function setLogoUrl(string $logoUrl): void
	{
		$this->logoUrl = $logoUrl;
	}

	/**
	 * This is the URL of the logo that you would like to appear in the top right of the Skrill.
     * The logo must be accessible via HTTPS or it will not be shown.
	 * The logo will be resized to fit. To avoid scaling distortion,
     * the minimum size should be as  follows: <br />
	 * If the logo width > height - at least 107px wide. <br />
	 * If logo width > height - at least 65px high. <br />
	 * Avoid large images (much greater than 256 by 256px) to minimize the page loading time.
	 * 
	 * @return string
	 */
	public function getLogoUrl(): string
	{
		return $this->logoUrl;
	}

	/**
	 * Builder function for detail1Description
	 * 
	 * @param string $detail1Description
	 * 
	 * @return $this
	 */
	public function detail1Description(string $detail1Description): self
	{
		$this->setDetail1Description($detail1Description);
		
		return $this;
	}

	/**
	 * Setter function for detail1Description
	 * 
	 * @param string $detail1Description
	 * 
	 * @return void
	 */
	public function setDetail1Description(string $detail1Description): void
	{
		$this->detail1Description = $detail1Description;
	}

	/**
	 * You can show additional details about the product  in the More information section in the header.
	 * 
	 * @return string
	 */
	public function getDetail1Description(): string
	{
		return $this->detail1Description;
	}

	/**
	 * Builder function for detail1Text
	 * 
	 * @param string $detail1Text
	 * 
	 * @return $this
	 */
	public function detail1Text(string $detail1Text): self
	{
		$this->setDetail1Text($detail1Text);
		
		return $this;
	}

	/**
	 * Setter function for detail1Text
	 * 
	 * @param string $detail1Text
	 * 
	 * @return void
	 */
	public function setDetail1Text(string $detail1Text): void
	{
		$this->detail1Text = $detail1Text;
	}

	/**
	 * The detail1Text is shown next to the  detail1Description in the More Information section
     * in the header of the payment form with the other payment details.
	 * The detail1Description combined with the detail1Text is shown in the more information field
     * of the merchant account history CSV file.
	 * 
	 * @return string
	 */
	public function getDetail1Text(): string
	{
		return $this->detail1Text;
	}

	/**
	 * Builder function for countryCode
	 * 
	 * @param string $countryCode
	 * 
	 * @return $this
	 */
	public function countryCode(string $countryCode): self
	{
		$this->setCountryCode($countryCode);
		
		return $this;
	}

	/**
	 * Setter function for countryCode
	 * 
	 * @param string $countryCode
	 * 
	 * @return void
	 */
	public function setCountryCode(string $countryCode): void
	{
		$this->countryCode = $countryCode;
	}

	/**
	 * This is Customer's country of residence
	 * 
	 * @return string
	 */
	public function getCountryCode(): string
	{
		return $this->countryCode;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Skrill {" . PHP_EOL
			. "    consumerId: " . $this->toIndentedString($this->consumerId) . PHP_EOL
			. "    emailSubject: " . $this->toIndentedString($this->emailSubject) . PHP_EOL
			. "    emailMessage: " . $this->toIndentedString($this->emailMessage) . PHP_EOL
			. "    recipientDescription: " . $this->toIndentedString($this->recipientDescription) . PHP_EOL
			. "    language: " . $this->toIndentedString($this->language) . PHP_EOL
			. "    logoUrl: " . $this->toIndentedString($this->logoUrl) . PHP_EOL
			. "    detail1Description: " . $this->toIndentedString($this->detail1Description) . PHP_EOL
			. "    detail1Text: " . $this->toIndentedString($this->detail1Text) . PHP_EOL
			. "    countryCode: " . $this->toIndentedString($this->countryCode) . PHP_EOL
			. "}";
	}
}
