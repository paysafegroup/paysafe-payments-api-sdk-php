<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card\ThreeDs;

use Paysafe\PhpSdk\Model\BaseModel;


/**
 * This is the cardholder login information.
 * <ul>
 *   <li>
 *     <b>authenticationMethod:</b> This is the mechanism used by the cardholder to authenticate to the 3DS Requestor.
 *     <i>Allowed values: NO_LOGIN, INTERNAL_CREDENTIALS, FEDERATED_ID, ISSUER_CREDENTIALS, THIRD_PARY_AUTHENTICATION,
 *     FIDO_AUTHENTICATOR</i>
 *   </li>
 *   <li>
 *     <b>data:</b> This field is reserved for future iterations of 3D Secure 2. <br />
 *   </li>
 *   <li>
 *     <b>time:</b> This is the date and time of the cardholder authentication.
 *     The ISO 8601 date format is expected, i.e., YYYY-MM-DD-THH:MM:SSZ. <br />
 *   </li>
 * </ul>
 */
class UserLogin extends BaseModel
{
	const AUTHENTICATION_METHOD_NO_LOGIN = 'NO_LOGIN';
	const AUTHENTICATION_METHOD_INTERNAL_CREDENTIALS = 'INTERNAL_CREDENTIALS';
	const AUTHENTICATION_METHOD_FEDERATED_ID = 'FEDERATED_ID';
	const AUTHENTICATION_METHOD_ISSUER_CREDENTIALS = 'ISSUER_CREDENTIALS';
	const AUTHENTICATION_METHOD_THIRD_PARY_AUTHENTICATION = 'THIRD_PARY_AUTHENTICATION';
	const AUTHENTICATION_METHOD_FIDO_AUTHENTICATOR = 'FIDO_AUTHENTICATOR';

	/**
	 * This is the mechanism used by the cardholder to authenticate to the 3DS Requestor.
	 */
	private string $authenticationMethod;

	/**
	 * This field is reserved for future iterations of 3D Secure 2.
	 * Example: Some up to 2048 bytes undefined data
	 */
	private string $data;

	/**
	 * This is the date and time of the cardholder authentication.
     * The ISO 8601 date format is expected, i.e., YYYY-MM-DD-THH:MM:SSZ.
	 */
	private string $time;


	/**
	 * Builder function for authenticationMethod
	 *
	 * @param string $authenticationMethod
	 *
	 * @return UserLogin
	 */
	public function authenticationMethod(string $authenticationMethod): self
	{
		$this->setAuthenticationMethod($authenticationMethod);

		return $this;
	}
	/**
	 * Setter function for authenticationMethod
	 *
	 * @param string $authenticationMethod
	 *
	 * @return void
	 */
	public function setAuthenticationMethod(string $authenticationMethod): void
	{
		$this->authenticationMethod = $authenticationMethod;
	}
	/**
	 * Getter function for authenticationMethod
	 *
	 * @return string
	 */
	public function getAuthenticationMethod(): string
	{
		return $this->authenticationMethod;
	}

	/**
	 * Builder function for data
	 *
	 * @param string $data
	 *
	 * @return UserLogin
	 */
	public function data(string $data): self
	{
		$this->setData($data);

		return $this;
	}
	/**
	 * Setter function for data
	 *
	 * @param string $data
	 *
	 * @return void
	 */
	public function setData(string $data): void
	{
		$this->data = $data;
	}
	/**
	 * Getter function for data
	 *
	 * @return string
	 */
	public function getData(): string
	{
		return $this->data;
	}

	/**
	 * Builder function for time
	 *
	 * @param string $time
	 *
	 * @return UserLogin
	 */
	public function time(string $time): self
	{
		$this->setTime($time);

		return $this;
	}
	/**
	 * Setter function for time
	 *
	 * @param string $time
	 *
	 * @return void
	 */
	public function setTime(string $time): void
	{
		$this->time = $time;
	}
	/**
	 * Getter function for time
	 *
	 * @return string
	 */
	public function getTime(): string
	{
		return $this->time;
	}

	/**
	 * Convert the object to a string representation.
	 *
	 * @return string
	 */
	public function __toString(): string
	{
		return "class UserLogin {" . PHP_EOL .
			"	authenticationMethod: " . $this->toIndentedString($this->authenticationMethod) . PHP_EOL .
			"	data: " . $this->toIndentedString($this->data) . PHP_EOL .
			"	time: " . $this->toIndentedString($this->time) . PHP_EOL .
		"}";
	}
}
