<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Card;

use Paysafe\PhpSdk\Model\Common\Profile\DateOfBirth;
use Paysafe\PhpSdk\Model\BaseModel;

/**
 * The recipient is deemed to be the person or party who has the contractual relationship
 * with the merchant / financial institution.
 * This may be different from the cardholder,
 * e.g., in the case of a parent topping up a child's savings account.
 * Therefore, the fields should not be collected on the same page as cardholder information,
 * but instead be passed in the background from the merchant's records.
 *
 * **Note:** You can include recipient elements in your
 * [authorization request](https://developer.paysafe.com/en/cards-api/#/operations/authorization)
 * **only if** your Merchant Category Code is **6012** and your registered trading address is in the United Kingdom.
 * All fields are optional. However, scheme fines may apply if data is consistently not supplied
 * and chargebacks persist.
 * If you have any questions, contact your account manager.
 * If you are using a payment token for an Authorization request and there is already recipient data
 * for the consumer profile associated with the payment token, then if you include the recipient object
 * in the Authorization, this data will override the recipient data already in the profile.
 *
 * If you [look up an authorization request](https://developer.paysafe.com/en/cards-api/#/operations/get-authorization)
 * that used the visaAdditionalAuthData parameter (now deprecated), the response will contain the relevant data
 * in both the recipient and the visaAdditionalAuthData objects.
 */
class Recipient extends BaseModel
{

	private DateOfBirth $dateOfBirth;

	/**
	 * This is the zip/postal code of the recipient.
	 * 
	 * **Note:** The last 3 characters are not sent to the banking network.
	 * Example: CB24 9AD
	 */
	private string $zip;


	/**
	 * This is the recipient's last name.
	 * 
	 * **Note:** Only the first 6 characters are sent to the banking network.
	 * Example: Chagalamarri
	 */
	private string $lastName;


	/**
	 * This is the recipient's account number, e.g., a 
	 * loan agreement number or customer ID. In the case where the recipient account is a prepaid card, the
	 * card number may be sent in full.
	 * 
	 * **Note:** Only the first 6 and last 4 characters are sent to the banking network and will be masked accordingly
     * within the back office and any other reports, to comply with PCI regulations.
	 * Example: ABC1234567890
	 */
	private string $accountNumber;


	/**
	 * Builder function for dateOfBirth
	 * 
	 * @param DateOfBirth $dateOfBirth
	 * 
	 * @return Recipient
	 */
	public function dateOfBirth(DateOfBirth $dateOfBirth): self
	{
		$this->setDateOfBirth($dateOfBirth);
		
		return $this;
	}
	/**
	 * Setter function for dateOfBirth
	 * 
	 * @param DateOfBirth $dateOfBirth
	 * 
	 * @return void
	 */
	public function setDateOfBirth(DateOfBirth $dateOfBirth): void
	{
		$this->dateOfBirth = $dateOfBirth;
	}
	/**
	 * Getter function for dateOfBirth
	 * 
	 * @return DateOfBirth
	 */
	public function getDateOfBirth(): DateOfBirth
	{
		return $this->dateOfBirth;
	}

	/**
	 * Builder function for zip
	 * 
	 * @param string $zip
	 * 
	 * @return Recipient
	 */
	public function zip(string $zip): self
	{
		$this->setZip($zip);
		
		return $this;
	}
	/**
	 * Setter function for zip
	 * 
	 * @param string $zip
	 * 
	 * @return void
	 */
	public function setZip(string $zip): void
	{
		$this->zip = $zip;
	}
	/**
	 * Getter function for zip
	 * 
	 * @return string
	 */
	public function getZip(): string
	{
		return $this->zip;
	}

	/**
	 * Builder function for lastName
	 * 
	 * @param string $lastName
	 * 
	 * @return Recipient
	 */
	public function lastName(string $lastName): self
	{
		$this->setLastName($lastName);
		
		return $this;
	}
	/**
	 * Setter function for lastName
	 * 
	 * @param string $lastName
	 * 
	 * @return void
	 */
	public function setLastName(string $lastName): void
	{
		$this->lastName = $lastName;
	}
	/**
	 * Getter function for lastName
	 * 
	 * @return string
	 */
	public function getLastName(): string
	{
		return $this->lastName;
	}

	/**
	 * Builder function for accountNumber
	 * 
	 * @param string $accountNumber
	 * 
	 * @return Recipient
	 */
	public function accountNumber(string $accountNumber): self
	{
		$this->setAccountNumber($accountNumber);
		
		return $this;
	}
	/**
	 * Setter function for accountNumber
	 * 
	 * @param string $accountNumber
	 * 
	 * @return void
	 */
	public function setAccountNumber(string $accountNumber): void
	{
		$this->accountNumber = $accountNumber;
	}
	/**
	 * Getter function for accountNumber
	 * 
	 * @return string
	 */
	public function getAccountNumber(): string
	{
		return $this->accountNumber;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Recipient {" . PHP_EOL . 
			"	dateOfBirth: " . $this->toIndentedString($this->dateOfBirth) . PHP_EOL .
			"	zip: " . $this->toIndentedString($this->zip) . PHP_EOL .
			"	lastName: " . $this->toIndentedString($this->lastName) . PHP_EOL .
			"	accountNumber: " . $this->toIndentedString($this->accountNumber) . PHP_EOL .
		"}";
	}
}
