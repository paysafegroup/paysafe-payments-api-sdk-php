<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Customer;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Profile\DateOfBirth;

/**
 * Customer details including saved addresses and payment handles
 */
class CustomerResponse extends BaseModel
{

	private string $merchantCustomerId;
	private string $locale;
	private string $firstName;
	private string $middleName;
	private string $lastName;
	private string $gender;
	private DateOfBirth $dateOfBirth;
	private string $email;
	private string $phone;
	private string $cellPhone;
	private string $nationality;
	private string $ip;
	private string $paymentHandleTokenFrom;
	private string $accountId;
	private string $id;
	private string $status = 'ACTIVE';
	private string $paymentToken;
	private ?array $addresses = null;
	private ?array $paymentHandles = null;

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
	 * This is a customer ID that the merchant provides with the request
     * for their own internal customer identification.
	 * This value must be unique for each customer belonging to a merchant.
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
	 * This indicates the language of the customer.
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
	 * Builder function for middleName
	 * 
	 * @param string $middleName
	 * 
	 * @return $this
	 */
	public function middleName(string $middleName): self
	{
		$this->setMiddleName($middleName);
		
		return $this;
	}

	/**
	 * Setter function for middleName
	 * 
	 * @param string $middleName
	 * 
	 * @return void
	 */
	public function setMiddleName(string $middleName): void
	{
		$this->middleName = $middleName;
	}

	/**
	 * This is the customer’s middle name.
	 * 
	 * @return string
	 */
	public function getMiddleName(): string
	{
		return $this->middleName;
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
	 * This is the customer’s gender. Possible values are:  - M - Male  - F - Female
	 * 
	 * @return string
	 */
	public function getGender(): string
	{
		return $this->gender;
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
	 * This is the recipient's date of birth.  <b>Note:<b> Required for Pay by Bank.
	 * 
	 * @return DateOfBirth
	 */
	public function getDateOfBirth(): DateOfBirth
	{
		return $this->dateOfBirth;
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
	 * This is the customer's email address.
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
	 * This is the customer's phone number.
	 * 
	 * @return string
	 */
	public function getPhone(): string
	{
		return $this->phone;
	}

	/**
	 * Builder function for cellPhone
	 * 
	 * @param string $cellPhone
	 * 
	 * @return $this
	 */
	public function cellPhone(string $cellPhone): self
	{
		$this->setCellPhone($cellPhone);
		
		return $this;
	}

	/**
	 * Setter function for cellPhone
	 * 
	 * @param string $cellPhone
	 * 
	 * @return void
	 */
	public function setCellPhone(string $cellPhone): void
	{
		$this->cellPhone = $cellPhone;
	}

	/**
	 * This is the customer's cell phone number.
	 * 
	 * @return string
	 */
	public function getCellPhone(): string
	{
		return $this->cellPhone;
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
	 * This is the customer’s nationality.
	 * 
	 * @return string
	 */
	public function getNationality(): string
	{
		return $this->nationality;
	}

	/**
	 * Builder function for ip
	 * 
	 * @param string $ip
	 * 
	 * @return $this
	 */
	public function ip(string $ip): self
	{
		$this->setIp($ip);
		
		return $this;
	}

	/**
	 * Setter function for ip
	 * 
	 * @param string $ip
	 * 
	 * @return void
	 */
	public function setIp(string $ip): void
	{
		$this->ip = $ip;
	}

	/**
	 * This is the customer’s IP address.
	 * 
	 * @return string
	 */
	public function getIp(): string
	{
		return $this->ip;
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
	 * This is the paymentHandleToken that is present in the response to a
     * Single-use Payment Handle creation request.
	 * <b>Note:<b> It is a mandatory field only if we are trying to Create a Customer Using
     * a Single-Use Payment Handle Token.
	 * 
	 * @return string
	 */
	public function getPaymentHandleTokenFrom(): string
	{
		return $this->paymentHandleTokenFrom;
	}

	/**
	 * Builder function for accountId
	 * 
	 * @param string $accountId
	 * 
	 * @return $this
	 */
	public function accountId(string $accountId): self
	{
		$this->setAccountId($accountId);
		
		return $this;
	}

	/**
	 * Setter function for accountId
	 * 
	 * @param string $accountId
	 * 
	 * @return void
	 */
	public function setAccountId(string $accountId): void
	{
		$this->accountId = $accountId;
	}

	/**
	 * Account Id in the paysafe system.
	 * 
	 * @return string
	 */
	public function getAccountId(): string
	{
		return $this->accountId;
	}

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
	 * This is the ID returned in the response.
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
	 * This is the status of the customer. Possible values are:  <br />
	 * • INITIAL <br />
	 * • ACTIVE <br />
	 * <br />
	 * By default the system automatically sets the customer status to an ACTIVE state.
     * If you want to prevent the customer from being used for payments,
	 * you can set the status to an INITIAL state (e.g., in cases where you first want to validate the customer).
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Builder function for paymentToken
	 * 
	 * @param string $paymentToken
	 * 
	 * @return $this
	 */
	public function paymentToken(string $paymentToken): self
	{
		$this->setPaymentToken($paymentToken);
		
		return $this;
	}

	/**
	 * Setter function for paymentToken
	 * 
	 * @param string $paymentToken
	 * 
	 * @return void
	 */
	public function setPaymentToken(string $paymentToken): void
	{
		$this->paymentToken = $paymentToken;
	}

	/**
	 * It is the customer profile Identifier at the paysafe end.
	 * 
	 * @return string
	 */
	public function getPaymentToken(): string
	{
		return $this->paymentToken;
	}

	/**
	 * Builder function for addresses
	 * 
	 * @param Address[] $addresses
	 * 
	 * @return $this
	 */
	public function addresses(array $addresses): self
	{
		$this->setAddresses($addresses);
		
		return $this;
	}

	/**
	 * Setter function for addresses
	 * 
	 * @param Address[] $addresses
	 * 
	 * @return void
	 */
	public function setAddresses(array $addresses): void
	{
		$this->addresses = $addresses;
	}

	/**
	 * Get addresses
	 * 
	 * @return Address[]|null
	 */
	public function getAddresses(): array
	{
		return $this->addresses ?? [];
	}

	/**
	 * Add new addressesItem
	 * 
	 * @param Address $addressesItem
	 * 
	 * @return $this
	 */
	public function addAddressesItem(Address $addressesItem): self
	{
		if ($this->addresses === null) {
			$this->setAddresses([$addressesItem]);
			
			return $this;
		}
		
		$addresses = $this->getAddresses();
		$addresses[] = $addressesItem;
		$this->setAddresses($addresses);
		
		return $this;
	}

	/**
	 * Remove addressesItem
	 * 
	 * @param Address $addressesItem
	 * 
	 * @return $this
	 */
	public function removeAddressesItem(Address $addressesItem): self
	{
		$this->setAddresses(array_diff($this->getAddresses(), [$addressesItem]));
		
		return $this;
	}

	/**
	 * Builder function for paymentHandles
	 * 
	 * @param CustomerPaymentHandle[] $paymentHandles
	 * 
	 * @return $this
	 */
	public function paymentHandles(array $paymentHandles): self
	{
		$this->setPaymentHandles($paymentHandles);
		
		return $this;
	}

	/**
	 * Setter function for paymentHandles
	 * 
	 * @param CustomerPaymentHandle[] $paymentHandles
	 * 
	 * @return void
	 */
	public function setPaymentHandles(array $paymentHandles): void
	{
		$this->paymentHandles = $paymentHandles;
	}

	/**
	 * Get paymentHandles
	 * 
	 * @return CustomerPaymentHandle[]
	 */
	public function getPaymentHandles(): array
	{
		return $this->paymentHandles ?? [];
	}

	/**
	 * Add new paymentHandlesItem
	 * 
	 * @param CustomerPaymentHandle $paymentHandlesItem
	 * 
	 * @return $this
	 */
	public function addPaymentHandlesItem(CustomerPaymentHandle $paymentHandlesItem): self
	{
		if ($this->paymentHandles === null) {
			$this->setPaymentHandles([$paymentHandlesItem]);
			
			return $this;
		}
		
		$paymentHandles = $this->getPaymentHandles();
		$paymentHandles[] = $paymentHandlesItem;
		$this->setPaymentHandles($paymentHandles);
		
		return $this;
	}

	/**
	 * Remove paymentHandlesItem
	 * 
	 * @param CustomerPaymentHandle $paymentHandlesItem
	 * 
	 * @return $this
	 */
	public function removePaymentHandlesItem(CustomerPaymentHandle $paymentHandlesItem): self
	{
		$this->setPaymentHandles(array_diff($this->getPaymentHandles(), [$paymentHandlesItem]));
		
		return $this;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class CustomerResponse {" . PHP_EOL
			. "    merchantCustomerId: " . $this->toIndentedString($this->merchantCustomerId) . PHP_EOL
			. "    locale: " . $this->toIndentedString($this->locale) . PHP_EOL
			. "    firstName: " . $this->toIndentedString($this->firstName) . PHP_EOL
			. "    middleName: " . $this->toIndentedString($this->middleName) . PHP_EOL
			. "    lastName: " . $this->toIndentedString($this->lastName) . PHP_EOL
			. "    gender: " . $this->toIndentedString($this->gender) . PHP_EOL
			. "    dateOfBirth: " . $this->toIndentedString($this->dateOfBirth) . PHP_EOL
			. "    email: " . $this->toIndentedString($this->email) . PHP_EOL
			. "    phone: " . $this->toIndentedString($this->phone) . PHP_EOL
			. "    cellPhone: " . $this->toIndentedString($this->cellPhone) . PHP_EOL
			. "    nationality: " . $this->toIndentedString($this->nationality) . PHP_EOL
			. "    ip: " . $this->toIndentedString($this->ip) . PHP_EOL
			. "    paymentHandleTokenFrom: " . $this->toIndentedString($this->paymentHandleTokenFrom) . PHP_EOL
			. "    accountId: " . $this->toIndentedString($this->accountId) . PHP_EOL
			. "    id: " . $this->toIndentedString($this->id) . PHP_EOL
			. "    status: " . $this->toIndentedString($this->status) . PHP_EOL
			. "    paymentToken: " . $this->toIndentedString($this->paymentToken) . PHP_EOL
			. "    addresses: " . $this->toIndentedString($this->addresses) . PHP_EOL
			. "    paymentHandles: " . $this->toIndentedString($this->paymentHandles) . PHP_EOL
			. "}";
	}
}
