<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Lpm;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * These are the details of the PayPal account used for the transaction.
 */
class Paypal extends BaseModel
{
	const LANGUAGE_AT = 'AT';
	const LANGUAGE_AU = 'AU';
	const LANGUAGE_BE = 'BE';
	const LANGUAGE_BR = 'BR';
	const LANGUAGE_CA = 'CA';
	const LANGUAGE_CH = 'CH';
	const LANGUAGE_CN = 'CN';
	const LANGUAGE_DE = 'DE';
	const LANGUAGE_ES = 'ES';
	const LANGUAGE_FR = 'FR';
	const LANGUAGE_GB = 'GB';
	const LANGUAGE_IT = 'IT';
	const LANGUAGE_NL = 'NL';
	const LANGUAGE_PL = 'PL';
	const LANGUAGE_PT = 'PT';
	const LANGUAGE_RU = 'RU';
	const LANGUAGE_US = 'US';
	const LANGUAGE_DA_DK = 'da_DK';
	const LANGUAGE_HE_IL = 'he_IL';
	const LANGUAGE_ID_ID = 'id_ID';
	const LANGUAGE_JA_JP = 'ja_JP';
	const LANGUAGE_NO_NO = 'no_NO';
	const LANGUAGE_PT_BR = 'pt_BR';
	const LANGUAGE_RU_RU = 'ru_RU';
	const LANGUAGE_SV_SE = 'sv_SE';
	const LANGUAGE_TH_TH = 'th_TH';
	const LANGUAGE_ZH_CN = 'zh_CN';
	const LANGUAGE_ZH_HK = 'zh_HK';
	const LANGUAGE_ZH_TW = 'zh_TW';

	const SHIPPING_PREFERENCE_GET_FROM_FILE = 'GET_FROM_FILE';
	const SHIPPING_PREFERENCE_NO_SHIPPING = 'NO_SHIPPING';
	const SHIPPING_PREFERENCE_SET_PROVIDED_ADDRESS = 'SET_PROVIDED_ADDRESS';

	const RECIPIENT_TYPE_EMAIL = 'EMAIL';
	const RECIPIENT_TYPE_PHONE = 'PHONE';
	const RECIPIENT_TYPE_PAYPAL_ID = 'PAYPAL_ID';
	const RECIPIENT_TYPE_USER_ID = 'USER_ID';

	/**
	 * The email address of the consumer or payer.
	 * Example: consumer@gmail.com
	 */
	private string $consumerId;


	/**
	 * A label that overrides the business name in the 
	 * merchant's PayPal account on the PayPal checkout 
	 * pages.
	 * Example: My store description
	 */
	private string $recipientDescription;

	/**
	 * The 2-character preferred language code for the consumer
     * (e.g., AU, AT, BE, BR, CA, CH, CN, DE, ES, GB, FR, IT, NL, PL, PT, RU, or US.)
     * or A five-character code is also valid for languages in these countries
     * (e.g: da_DK, he_IL, id_ID, ja_JP, no_NO, pt_BR, ru_RU, sv_SE, th_TH, zh_CN, zh_HK, and zh_TW).
	 */
	private string $language;


	/**
	 * The shipping preference. The possible values are:
	 * 
	 *  - NO_SHIPPING - Redacts the shipping address from the PayPal pages. Recommended for digital goods.
	 * 
	 *  - GET_FROM_FILE - Uses the customer-selected shipping address on PayPal pages.
	 * 
	 *  - SET_PROVIDED_ADDRESS.
     *      If available, uses the merchant-provided shipping address, which the customer cannot change
     *      on the PayPal pages. If the merchant does not provide an address,
     *      the customer can enter the address on PayPal pages.
	 */
	private string $shippingPreference;

	/**
	 * Note to be displayed on the PayPal page.
	 * Example: My note to payer
	 */
	private string $consumerMessage;

	/**
	 * Order description to display on PayPal page.
     * If merchant does not set this field it defaults to 'Payment for order'.
	 * Example: My order description
	 */
	private string $orderDescription;

	/**
	 * Type of payout recipient. The only supported value is 'PAYPAL_ID'.
	 */
	private string $recipientType;


	/**
	 * Builder function for consumerId
	 * 
	 * @param string $consumerId
	 * 
	 * @return Paypal
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
	 * Getter function for consumerId
	 * 
	 * @return string
	 */
	public function getConsumerId(): string
	{
		return $this->consumerId;
	}

	/**
	 * Builder function for recipientDescription
	 * 
	 * @param string $recipientDescription
	 * 
	 * @return Paypal
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
	 * Getter function for recipientDescription
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
	 * @return Paypal
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
	 * Getter function for language
	 * 
	 * @return string
	 */
	public function getLanguage(): string
	{
		return $this->language;
	}

	/**
	 * Builder function for shippingPreference
	 * 
	 * @param string $shippingPreference
	 * 
	 * @return Paypal
	 */
	public function shippingPreference(string $shippingPreference): self
	{
		$this->setShippingPreference($shippingPreference);
		
		return $this;
	}
	/**
	 * Setter function for shippingPreference
	 * 
	 * @param string $shippingPreference
	 * 
	 * @return void
	 */
	public function setShippingPreference(string $shippingPreference): void
	{
		$this->shippingPreference = $shippingPreference;
	}
	/**
	 * Getter function for shippingPreference
	 * 
	 * @return string
	 */
	public function getShippingPreference(): string
	{
		return $this->shippingPreference;
	}

	/**
	 * Builder function for consumerMessage
	 * 
	 * @param string $consumerMessage
	 * 
	 * @return Paypal
	 */
	public function consumerMessage(string $consumerMessage): self
	{
		$this->setConsumerMessage($consumerMessage);
		
		return $this;
	}
	/**
	 * Setter function for consumerMessage
	 * 
	 * @param string $consumerMessage
	 * 
	 * @return void
	 */
	public function setConsumerMessage(string $consumerMessage): void
	{
		$this->consumerMessage = $consumerMessage;
	}
	/**
	 * Getter function for consumerMessage
	 * 
	 * @return string
	 */
	public function getConsumerMessage(): string
	{
		return $this->consumerMessage;
	}

	/**
	 * Builder function for orderDescription
	 * 
	 * @param string $orderDescription
	 * 
	 * @return Paypal
	 */
	public function orderDescription(string $orderDescription): self
	{
		$this->setOrderDescription($orderDescription);
		
		return $this;
	}
	/**
	 * Setter function for orderDescription
	 * 
	 * @param string $orderDescription
	 * 
	 * @return void
	 */
	public function setOrderDescription(string $orderDescription): void
	{
		$this->orderDescription = $orderDescription;
	}
	/**
	 * Getter function for orderDescription
	 * 
	 * @return string
	 */
	public function getOrderDescription(): string
	{
		return $this->orderDescription;
	}

	/**
	 * Builder function for recipientType
	 * 
	 * @param string $recipientType
	 * 
	 * @return Paypal
	 */
	public function recipientType(string $recipientType): self
	{
		$this->setRecipientType($recipientType);
		
		return $this;
	}
	/**
	 * Setter function for recipientType
	 * 
	 * @param string $recipientType
	 * 
	 * @return void
	 */
	public function setRecipientType(string $recipientType): void
	{
		$this->recipientType = $recipientType;
	}
	/**
	 * Getter function for recipientType
	 * 
	 * @return string
	 */
	public function getRecipientType(): string
	{
		return $this->recipientType;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Paypal {" . PHP_EOL . 
			"	consumerId: " . $this->toIndentedString($this->consumerId) . PHP_EOL .
			"	recipientDescription: " . $this->toIndentedString($this->recipientDescription) . PHP_EOL .
			"	language: " . $this->toIndentedString($this->language) . PHP_EOL .
			"	shippingPreference: " . $this->toIndentedString($this->shippingPreference) . PHP_EOL .
			"	consumerMessage: " . $this->toIndentedString($this->consumerMessage) . PHP_EOL .
			"	orderDescription: " . $this->toIndentedString($this->orderDescription) . PHP_EOL .
			"	recipientType: " . $this->toIndentedString($this->recipientType) . PHP_EOL .
		"}";
	}
}
