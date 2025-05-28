<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\ThreeDs\NetworkTokenCardObjectAuthentication;
use Paysafe\PhpSdk\Model\Card\ThreeDs\ThreeDs;
use Paysafe\PhpSdk\Model\Common\GatewayResponse;

/**
 * NetworkTokenCardObject
 */
class NetworkTokenCardObject extends BaseModel
{
	private CardWithOptionalNetworkTokenOrApplePay $card;
	private ThreeDs $threeDs;
	private NetworkTokenCardObjectAuthentication $authentication;
	private string $paymentHandleTokenFrom;
	private string $transactionIntent;
	private GatewayResponse $gatewayResponse;

	/**
	 * Builder function for card
	 * 
	 * @param CardWithOptionalNetworkTokenOrApplePay $card
	 * 
	 * @return $this
	 */
	public function card(CardWithOptionalNetworkTokenOrApplePay $card): self
	{
		$this->setCard($card);
		
		return $this;
	}

	/**
	 * Setter function for card
	 * 
	 * @param CardWithOptionalNetworkTokenOrApplePay $card
	 * 
	 * @return void
	 */
	public function setCard(CardWithOptionalNetworkTokenOrApplePay $card): void
	{
		$this->card = $card;
	}

	/**
	 * Get card
	 * 
	 * @return CardWithOptionalNetworkTokenOrApplePay
	 */
	public function getCard(): CardWithOptionalNetworkTokenOrApplePay
	{
		return $this->card;
	}

	/**
	 * Builder function for threeDs
	 * 
	 * @param ThreeDs $threeDs
	 * 
	 * @return $this
	 */
	public function threeDs(ThreeDs $threeDs): self
	{
		$this->setThreeDs($threeDs);
		
		return $this;
	}

	/**
	 * Setter function for threeDs
	 * 
	 * @param ThreeDs $threeDs
	 * 
	 * @return void
	 */
	public function setThreeDs(ThreeDs $threeDs): void
	{
		$this->threeDs = $threeDs;
	}

	/**
	 * This is the threeDs object. You need to send this object when you want to process CARD transaction with 3DS.
	 * Required if account is enabled for 3DS. < /br>
	 * Not required if account is non-3DS or if you are using your own 3DS service provider.
     * Please refer authentication
	 * object if you are using your own 3DS service provider.
	 * 
	 * @return ThreeDs
	 */
	public function getThreeDs(): ThreeDs
	{
		return $this->threeDs;
	}

	/**
	 * Builder function for authentication
	 * 
	 * @param NetworkTokenCardObjectAuthentication $authentication
	 * 
	 * @return $this
	 */
	public function authentication(NetworkTokenCardObjectAuthentication $authentication): self
	{
		$this->setAuthentication($authentication);
		
		return $this;
	}

	/**
	 * Setter function for authentication
	 * 
	 * @param NetworkTokenCardObjectAuthentication $authentication
	 * 
	 * @return void
	 */
	public function setAuthentication(NetworkTokenCardObjectAuthentication $authentication): void
	{
		$this->authentication = $authentication;
	}

	/**
	 * 3D Secure authentication details.
	 * 
	 * @return NetworkTokenCardObjectAuthentication
	 */
	public function getAuthentication(): NetworkTokenCardObjectAuthentication
	{
		return $this->authentication;
	}

	/**
	 * Builder function for paymentHandleTokenFrom
	 * 
	 * @param string $paymentHandleTokenFrom
	 * 
	 * @return $this
	 */
	public function paymentHandleTokenFrom(string $paymentHandleTokenFrom): self
	{
		$this->setPaymentHandleTokenFrom($paymentHandleTokenFrom);
		
		return $this;
	}

	/**
	 * Setter function for paymentHandleTokenFrom
	 * 
	 * @param string $paymentHandleTokenFrom
	 * 
	 * @return void
	 */
	public function setPaymentHandleTokenFrom(string $paymentHandleTokenFrom): void
	{
		$this->paymentHandleTokenFrom = $paymentHandleTokenFrom;
	}

	/**
	 * The response returns the original value from the request. This is used in Saved card flow.
     * You will pass this parameter when you want to create
	 * single use payment handle using the Saved-card (card-on-file) present in Paysafe customer vault. <br />
	 * This is an existing Customer Payment Handle, from which the payment instrument details
     * and profile details are retrieved. <br />
	 * If this parameter is included then you can omit the billingDetails object. <br />
	 * If you send a new billingDetails then same will be considered for the transaction,
     * however no change will be made in the billingDetails present
	 * against the Saved-card in customer vault.
	 * 
	 * @return string
	 */
	public function getPaymentHandleTokenFrom(): string
	{
		return $this->paymentHandleTokenFrom;
	}

	/**
	 * Builder function for transactionIntent
	 * 
	 * @param string $transactionIntent
	 * 
	 * @return $this
	 */
	public function transactionIntent(string $transactionIntent): self
	{
		$this->setTransactionIntent($transactionIntent);
		
		return $this;
	}

	/**
	 * Setter function for transactionIntent
	 * 
	 * @param string $transactionIntent
	 * 
	 * @return void
	 */
	public function setTransactionIntent(string $transactionIntent): void
	{
		$this->transactionIntent = $transactionIntent;
	}

	/**
	 * The transactionIntent property is used to identify the intent of the authorization requests.
	 * The value of the transactionIntent shows if the transaction is crypto or quasi-cash related one. <br />
	 * This field is mandatory for Visa card - cross-border fundingTransactions where the recipient is
     * from any of the
	 * following countries: India, Bangladesh, Argentina, and Egypt.<br />
	 * It is also required for specific use cases. Check
	 * <a href="https://developer.paysafe.com/en/payments-api/#/schemas/transactionIntent">
     *     on Transaction Intent reference page
     *     /a>
	 * for more information.
	 * 
	 * @return string
	 */
	public function getTransactionIntent(): string
	{
		return $this->transactionIntent;
	}

	/**
	 * Builder function for gatewayResponse
	 * 
	 * @param GatewayResponse $gatewayResponse
	 * 
	 * @return $this
	 */
	public function gatewayResponse(GatewayResponse $gatewayResponse): self
	{
		$this->setGatewayResponse($gatewayResponse);
		
		return $this;
	}

	/**
	 * Setter function for gatewayResponse
	 * 
	 * @param GatewayResponse $gatewayResponse
	 * 
	 * @return void
	 */
	public function setGatewayResponse(GatewayResponse $gatewayResponse): void
	{
		$this->gatewayResponse = $gatewayResponse;
	}

	/**
	 * This is the read-only raw response returned by an acquirer or PSP.
	 * 
	 * @return GatewayResponse
	 */
	public function getGatewayResponse(): GatewayResponse
	{
		return $this->gatewayResponse;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class NetworkTokenCardObject {" . PHP_EOL
			. "    card: " . $this->toIndentedString($this->card) . PHP_EOL
			. "    threeDs: " . $this->toIndentedString($this->threeDs) . PHP_EOL
			. "    authentication: " . $this->toIndentedString($this->authentication) . PHP_EOL
			. "    paymentHandleTokenFrom: " . $this->toIndentedString($this->paymentHandleTokenFrom) . PHP_EOL
			. "    transactionIntent: " . $this->toIndentedString($this->transactionIntent) . PHP_EOL
			. "    gatewayResponse: " . $this->toIndentedString($this->gatewayResponse) . PHP_EOL
			. "}";
	}
}
