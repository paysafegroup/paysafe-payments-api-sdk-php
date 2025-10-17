<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\Profile;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This is customer's profile details. Required for fundingTransaction in CARD payments.
 * Also required for VIP Preferred, Play+ Registration,
 * paysafecard Payout. Optional for Skrill Payment.
 * <ul>
 *   <li>
 *     <b>id:</b> The customer's profile id in the system. If this is present rest all other fields are not required.
 *   </li>
 *   <li>
 *     <b>status:</b> The status of customer in the system, returned in the response.
 *   </li>
 *   <li>
 *     <b>merchantCustomerId:</b> This is the reference number for the customer created by the merchant and submitted
 *     as part of the request. It must be unique for each customer.<br />
 *     <b>Note:<b> This value is mandatory when <i>fundingTransaction</i> is used. <br />
 *   </li>
 *   <li>
 *     <b>locale:</b> This indicates the customer's locale preference. <br />
 *     <i>Allowed values: en_US, fr_CA, en_GB, en_CA</i>
 *   </li>
 *   <li>
 *     <b>firstName:</b> This is the customer’s first name. <br />
 *     Example: Venkata Suresh
 *   </li>
 *   <li>
 *     <b>lastName:</b> This is the customer’s last name. <br />
 *     Example: Chagalamarri
 *   </li>
 *   <li>
 *     <b>email:</b> This is the customer's email address. <br />
 *     Example: paysafe@gmail.com
 *   </li>
 *   <li>
 *     <b>phone:</b> This is the customer's phone number. <br />
 *     Example: 1234567891
 *   </li>
 *   <li>
 *     <b>emailVerified:</b> Is the customer’s email ID verified by merchant or not? <br />
 *     <b>Note:<b> EmailVerified is optional for Pay by Bank. If this value is not provided,
 *      the default value will be set to NOT_VERIFIED. <br />
 *     <i>Allowed values: NOT_VERIFIED, VERIFIED</i>
 *   </li>
 *   <li>
 *     <b>phoneVerified:</b> Is the customer’s phone number verified by merchant or not? <br />
 *     <b>Note:<b> PhoneVerified is optional for Pay by Bank. If this value is not provided,
 *      the default value will be set to NOT_VERIFIED. <br />
 *     <i>Allowed values: NOT_VERIFIED, VERIFIED</i>
 *   </li>
 *   <li>
 *     <b>dateOfBirth:</b> Customer's date of birth. <br />
 *     <b>Note:<b> Required for Pay by Bank.
 *   </li>
 *   <li>
 *     <b>mobile:</b> Customer's mobile number. <br />
 *     Example: 9846573804
 *   </li>
 *   <li>
 *     <b>gender:</b> This field indicates the Customer's gender. <br />
 *     <i>Allowed values: M, F</i>
 *   </li>
 *   <li>
 *     <b>nationality:</b> This field indicates the Customer's nationality. <br />
 *     Example: Indian
 *   </li>
 *   <li>
 *     <b>identityDocuments:</b> Required if at time of onboarding with Paysafe enrolmentType is selected
 *     as "OPEN_LOOP" else optional. <br />
 *   </li>
 * </ul>
 */
class Profile extends BaseModel
{

	private string $id;
	private string $status;
	private string $merchantCustomerId;
	private string $locale;
	private string $firstName;
	private string $lastName;
	private string $email;
	private string $phone;
	private string $emailVerified;
	private string $phoneVerified;
	private DateOfBirth $dateOfBirth;
	private string $gender;
	private string $nationality;
	private ?array $identityDocuments = null;

	/**
	 * Builder function for id
	 * 
	 * @param string $id
	 * 
	 * @return $this
	 */
	public function id(string $id): self
	{
		$this->setId($id);
		
		return $this;
	}

	/**
	 * Setter function for id
	 * 
	 * @param string $id
	 * 
	 * @return void
	 */
	public function setId(string $id): void
	{
		$this->id = $id;
	}

	/**
	 * This is returned in Response. The customer's profile id in the system.
     * If this is present rest all other fields are not required.
	 * 
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * Builder function for status
	 * 
	 * @param string $status
	 * 
	 * @return $this
	 */
	public function status(string $status): self
	{
		$this->setStatus($status);
		
		return $this;
	}

	/**
	 * Setter function for status
	 * 
	 * @param string $status
	 * 
	 * @return void
	 */
	public function setStatus(string $status): void
	{
		$this->status = $status;
	}

	/**
	 * The status of customer in the system, returned in the response.
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Builder function for merchantCustomerId
	 * 
	 * @param string $merchantCustomerId
	 * 
	 * @return $this
	 */
	public function merchantCustomerId(string $merchantCustomerId): self
	{
		$this->setMerchantCustomerId($merchantCustomerId);
		
		return $this;
	}

	/**
	 * Setter function for merchantCustomerId
	 * 
	 * @param string $merchantCustomerId
	 * 
	 * @return void
	 */
	public function setMerchantCustomerId(string $merchantCustomerId): void
	{
		$this->merchantCustomerId = $merchantCustomerId;
	}

	/**
	 * This is the reference number for the customer created by the merchant and submitted as part of the request.
     * It must be unique for each customer.<br />
	 * <b>Note: </b> This value is mandatory when <i>fundingTransaction</i> is used.
	 * 
	 * @return string
	 */
	public function getMerchantCustomerId(): string
	{
		return $this->merchantCustomerId;
	}

	/**
	 * Builder function for locale
	 * 
	 * @param string $locale
	 * 
	 * @return $this
	 */
	public function locale(string $locale): self
	{
		$this->setLocale($locale);
		
		return $this;
	}

	/**
	 * Setter function for locale
	 * 
	 * @param string $locale
	 * 
	 * @return void
	 */
	public function setLocale(string $locale): void
	{
		$this->locale = $locale;
	}

	/**
	 * This indicates the customer's locale preference.
	 * 
	 * @return string
	 */
	public function getLocale(): string
	{
		return $this->locale;
	}

	/**
	 * Builder function for firstName
	 * 
	 * @param string $firstName
	 * 
	 * @return $this
	 */
	public function firstName(string $firstName): self
	{
		$this->setFirstName($firstName);
		
		return $this;
	}

	/**
	 * Setter function for firstName
	 * 
	 * @param string $firstName
	 * 
	 * @return void
	 */
	public function setFirstName(string $firstName): void
	{
		$this->firstName = $firstName;
	}

	/**
	 * This is the customer’s first name.
	 * 
	 * @return string
	 */
	public function getFirstName(): string
	{
		return $this->firstName;
	}

	/**
	 * Builder function for lastName
	 * 
	 * @param string $lastName
	 * 
	 * @return $this
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
	 * This is the customer’s last name.
	 * 
	 * @return string
	 */
	public function getLastName(): string
	{
		return $this->lastName;
	}

	/**
	 * Builder function for email
	 * 
	 * @param string $email
	 * 
	 * @return $this
	 */
	public function email(string $email): self
	{
		$this->setEmail($email);
		
		return $this;
	}

	/**
	 * Setter function for email
	 * 
	 * @param string $email
	 * 
	 * @return void
	 */
	public function setEmail(string $email): void
	{
		$this->email = $email;
	}

	/**
	 * This is the customer's email address. Max length 40 characters. <br />
	 * 3DS flow: For VISA card, it is recommended to send either email or phone in the API request.
	 * 
	 * @return string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * Builder function for phone
	 * 
	 * @param string $phone
	 * 
	 * @return $this
	 */
	public function phone(string $phone): self
	{
		$this->setPhone($phone);
		
		return $this;
	}

	/**
	 * Setter function for phone
	 * 
	 * @param string $phone
	 * 
	 * @return void
	 */
	public function setPhone(string $phone): void
	{
		$this->phone = $phone;
	}

	/**
	 * This is the customer's phone number. Max length 40 characters. <br />
	 * 3DS flow: For VISA card, it is recommended to send either email or phone in the API request
	 * 
	 * @return string
	 */
	public function getPhone(): string
	{
		return $this->phone;
	}

	/**
	 * Builder function for emailVerified
	 * 
	 * @param string $emailVerified
	 * 
	 * @return $this
	 */
	public function emailVerified(string $emailVerified): self
	{
		$this->setEmailVerified($emailVerified);
		
		return $this;
	}

	/**
	 * Setter function for emailVerified
	 * 
	 * @param string $emailVerified
	 * 
	 * @return void
	 */
	public function setEmailVerified(string $emailVerified): void
	{
		$this->emailVerified = $emailVerified;
	}

	/**
	 * <b>Note:</b> For PAY BY BANK payment method only.
     * Defines if the customer’s email ID is verified by merchant or not.<br />
	 * If not sent, default value will be set to NOT_VERIFIED.
	 * Be aware that unverified email may lead to request failures,
     * as this is the part of our risk check parameters. <br />
	 * 
	 * @return string
	 */
	public function getEmailVerified(): string
	{
		return $this->emailVerified;
	}

	/**
	 * Builder function for phoneVerified
	 * 
	 * @param string $phoneVerified
	 * 
	 * @return $this
	 */
	public function phoneVerified(string $phoneVerified): self
	{
		$this->setPhoneVerified($phoneVerified);
		
		return $this;
	}

	/**
	 * Setter function for phoneVerified
	 * 
	 * @param string $phoneVerified
	 * 
	 * @return void
	 */
	public function setPhoneVerified(string $phoneVerified): void
	{
		$this->phoneVerified = $phoneVerified;
	}

	/**
	 * For PAY BY BANK payment method only.<br /> Is the customer’s phone number verified by merchant or not? <br />
	 * If not sent, default value will be set to NOT_VERIFIED. <br />
	 * Be aware that unverified email may lead to request failures, as this is the part of our risk check.
	 * 
	 * @return string
	 */
	public function getPhoneVerified(): string
	{
		return $this->phoneVerified;
	}

	/**
	 * Builder function for dateOfBirth
	 * 
	 * @param DateOfBirth $dateOfBirth
	 * 
	 * @return $this
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
	 * Get dateOfBirth
	 * 
	 * @return DateOfBirth
	 */
	public function getDateOfBirth(): DateOfBirth
	{
		return $this->dateOfBirth;
	}

	/**
	 * Builder function for gender
	 * 
	 * @param string $gender
	 * 
	 * @return $this
	 */
	public function gender(string $gender): self
	{
		$this->setGender($gender);
		
		return $this;
	}

	/**
	 * Setter function for gender
	 * 
	 * @param string $gender
	 * 
	 * @return void
	 */
	public function setGender(string $gender): void
	{
		$this->gender = $gender;
	}

	/**
	 * This field indicates the Customer's gender. M - Male F - Female
	 * 
	 * @return string
	 */
	public function getGender(): string
	{
		return $this->gender;
	}

	/**
	 * Builder function for nationality
	 * 
	 * @param string $nationality
	 * 
	 * @return $this
	 */
	public function nationality(string $nationality): self
	{
		$this->setNationality($nationality);
		
		return $this;
	}

	/**
	 * Setter function for nationality
	 * 
	 * @param string $nationality
	 * 
	 * @return void
	 */
	public function setNationality(string $nationality): void
	{
		$this->nationality = $nationality;
	}

	/**
	 * This field indicates the Customer's nationality.
	 * 
	 * @return string
	 */
	public function getNationality(): string
	{
		return $this->nationality;
	}

	/**
	 * Builder function for identityDocuments
	 * 
	 * @param IdentityDocument[] $identityDocuments
	 * 
	 * @return $this
	 */
	public function identityDocuments(array $identityDocuments): self
	{
		$this->setIdentityDocuments($identityDocuments);
		
		return $this;
	}

	/**
	 * Setter function for identityDocuments
	 * 
	 * @param IdentityDocument[] $identityDocuments
	 * 
	 * @return void
	 */
	public function setIdentityDocuments(array $identityDocuments): void
	{
		$this->identityDocuments = $identityDocuments;
	}

	/**
	 * For PAY BY BANK and VIPPREFERRED payment methods. <br />
     * Required for PAY BY BANK Payment if at time of onboarding with Paysafe
	 * enrollmentType is selected as OPEN_LOOP.
	 * 
	 * @return IdentityDocument[]|null
	 */
	public function getIdentityDocuments(): array
	{
		return $this->identityDocuments;
	}

	/**
	 * Add new identityDocumentsItem
	 * 
	 * @param IdentityDocument $identityDocumentsItem
	 * 
	 * @return $this
	 */
	public function addIdentityDocumentsItem(IdentityDocument $identityDocumentsItem): self
	{
		if ($this->identityDocuments === null) {
			$this->setIdentityDocuments([$identityDocumentsItem]);
			
			return $this;
		}
		
		$identityDocuments = $this->getIdentityDocuments();
		$identityDocuments[] = $identityDocumentsItem;
		$this->setIdentityDocuments($identityDocuments);
		
		return $this;
	}

	/**
	 * Remove identityDocumentsItem
	 * 
	 * @param IdentityDocument $identityDocumentsItem
	 * 
	 * @return $this
	 */
	public function removeIdentityDocumentsItem(IdentityDocument $identityDocumentsItem): self
	{
		$this->setIdentityDocuments(array_diff($this->getIdentityDocuments(), [$identityDocumentsItem]));
		
		return $this;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class Profile {" . PHP_EOL
			. "    id: " . $this->toIndentedString($this->id) . PHP_EOL
			. "    status: " . $this->toIndentedString($this->status) . PHP_EOL
			. "    merchantCustomerId: " . $this->toIndentedString($this->merchantCustomerId) . PHP_EOL
			. "    locale: " . $this->toIndentedString($this->locale) . PHP_EOL
			. "    firstName: " . $this->toIndentedString($this->firstName) . PHP_EOL
			. "    lastName: " . $this->toIndentedString($this->lastName) . PHP_EOL
			. "    email: " . $this->toIndentedString($this->email) . PHP_EOL
			. "    phone: " . $this->toIndentedString($this->phone) . PHP_EOL
			. "    emailVerified: " . $this->toIndentedString($this->emailVerified) . PHP_EOL
			. "    phoneVerified: " . $this->toIndentedString($this->phoneVerified) . PHP_EOL
			. "    dateOfBirth: " . $this->toIndentedString($this->dateOfBirth) . PHP_EOL
			. "    gender: " . $this->toIndentedString($this->gender) . PHP_EOL
			. "    nationality: " . $this->toIndentedString($this->nationality) . PHP_EOL
			. "    identityDocuments: " . $this->toIndentedString($this->identityDocuments) . PHP_EOL
			. "}";
	}
}
