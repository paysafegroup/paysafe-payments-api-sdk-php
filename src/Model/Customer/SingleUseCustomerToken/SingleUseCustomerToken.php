<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Customer\SingleUseCustomerToken;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Profile\DateOfBirth;
use Paysafe\PhpSdk\Model\Customer\Address;
use Paysafe\PhpSdk\Model\Customer\CustomerPaymentHandle;

/**
 * SingleUseCustomerToken
 */
class SingleUseCustomerToken extends BaseModel
{

	private string $merchantRefNum;
	private ?array $paymentType = null;
	private string $id;
	private int $timeToLiveSeconds;
	private string $status;
	private string $singleUseCustomerToken;
	private string $locale;
	private string $firstName;
	private string $middleName;
	private string $lastname;
	private DateOfBirth $dateOfBirth;
	private string $email;
	private string $phone;
	private string $ip;
	private string $nationality;
	private ?array $addresses = null;
	private ?array $paymentHandles = null;
	private string $customerId;

	/**
	 * Builder function for merchantRefNum
	 * 
	 * @param string $merchantRefNum
	 * 
	 * @return $this
	 */
	public function merchantRefNum(string $merchantRefNum): self
	{
		$this->setMerchantRefNum($merchantRefNum);
		
		return $this;
	}

	/**
	 * Setter function for merchantRefNum
	 * 
	 * @param string $merchantRefNum
	 * 
	 * @return void
	 */
	public function setMerchantRefNum(string $merchantRefNum): void
	{
		$this->merchantRefNum = $merchantRefNum;
	}

	/**
	 * This is the merchant reference number created by the merchant and submitted as part of the request.
     * It must be unique for each request.
	 * 
	 * @return string
	 */
	public function getMerchantRefNum(): string
	{
		return $this->merchantRefNum;
	}

	/**
	 * Builder function for paymentType
	 * 
	 * @param string[] $paymentType
	 * 
	 * @return $this
	 */
	public function paymentType(array $paymentType): self
	{
		$this->setPaymentType($paymentType);
		
		return $this;
	}

	/**
	 * Setter function for paymentType
	 * 
	 * @param string[] $paymentType
	 * 
	 * @return void
	 */
	public function setPaymentType(array $paymentType): void
	{
		$this->paymentType = $paymentType;
	}

	/**
	 * This specifies the payment type for which you are creating the single-use token. Possible values:
	 * • CARD <br />
	 * • EFT <br />
	 * • ACH <br />
	 * • BACS <br />
	 * • SEPA <br />
	 * 
	 * @return string[]|null
	 */
	public function getPaymentType(): array
	{
		return $this->paymentType;
	}

	/**
	 * Add new paymentTypeItem
	 * 
	 * @param string $paymentTypeItem
	 * 
	 * @return $this
	 */
	public function addPaymentTypeItem(string $paymentTypeItem): self
	{
		if ($this->paymentType === null) {
			$this->setPaymentType([$paymentTypeItem]);
			
			return $this;
		}
		
		$paymentType = $this->getPaymentType();
		$paymentType[] = $paymentTypeItem;
		$this->setPaymentType($paymentType);
		
		return $this;
	}

	/**
	 * Remove paymentTypeItem
	 * 
	 * @param string $paymentTypeItem
	 * 
	 * @return $this
	 */
	public function removePaymentTypeItem(string $paymentTypeItem): self
	{
		$this->setPaymentType(array_diff($this->getPaymentType(), [$paymentTypeItem]));
		
		return $this;
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
	 * This is the ID returned in the response. This ID can be used for future associated requests,
     * e.g., to look up the Payment Handle.
	 * 
	 * @return string
	 */
	public function getId(): string
	{
		return $this->id;
	}

	/**
	 * Builder function for timeToLiveSeconds
	 * 
	 * @param int $timeToLiveSeconds
	 * 
	 * @return $this
	 */
	public function timeToLiveSeconds(int $timeToLiveSeconds): self
	{
		$this->setTimeToLiveSeconds($timeToLiveSeconds);
		
		return $this;
	}

	/**
	 * Setter function for timeToLiveSeconds
	 * 
	 * @param int $timeToLiveSeconds
	 * 
	 * @return void
	 */
	public function setTimeToLiveSeconds(int $timeToLiveSeconds): void
	{
		$this->timeToLiveSeconds = $timeToLiveSeconds;
	}

	/**
	 * This is the period of time, in seconds, the singleUseCustomerToken is valid before expiration. <br />
	 * Maximum: 899
	 * 
	 * @return int
	 */
	public function getTimeToLiveSeconds(): int
	{
		return $this->timeToLiveSeconds;
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
	 * This is the status of the single-use customer token.
	 * 
	 * @return string
	 */
	public function getStatus(): string
	{
		return $this->status;
	}

	/**
	 * Builder function for singleUseCustomerToken
	 * 
	 * @param string $singleUseCustomerToken
	 * 
	 * @return $this
	 */
	public function singleUseCustomerToken(string $singleUseCustomerToken): self
	{
		$this->setSingleUseCustomerToken($singleUseCustomerToken);
		
		return $this;
	}

	/**
	 * Setter function for singleUseCustomerToken
	 * 
	 * @param string $singleUseCustomerToken
	 * 
	 * @return void
	 */
	public function setSingleUseCustomerToken(string $singleUseCustomerToken): void
	{
		$this->singleUseCustomerToken = $singleUseCustomerToken;
	}

	/**
	 * This token can be used in the Payments Checkout to populate the checkout with customer information.
	 * 
	 * @return string
	 */
	public function getSingleUseCustomerToken(): string
	{
		return $this->singleUseCustomerToken;
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
	 * This indicates the customer's locale.
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
	 * Builder function for lastname
	 * 
	 * @param string $lastname
	 * 
	 * @return $this
	 */
	public function lastname(string $lastname): self
	{
		$this->setLastname($lastname);
		
		return $this;
	}

	/**
	 * Setter function for lastname
	 * 
	 * @param string $lastname
	 * 
	 * @return void
	 */
	public function setLastname(string $lastname): void
	{
		$this->lastname = $lastname;
	}

	/**
	 * This is the customer's last name.
	 * 
	 * @return string
	 */
	public function getLastname(): string
	{
		return $this->lastname;
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
	 * This is the customer’s IP address
	 * 
	 * @return string
	 */
	public function getIp(): string
	{
		return $this->ip;
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
	 * This is an array of addresses associated with the customer.
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
	 * This is an array of payment handles associated with the customer.
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
	 * Builder function for customerId
	 * 
	 * @param string $customerId
	 * 
	 * @return $this
	 */
	public function customerId(string $customerId): self
	{
		$this->setCustomerId($customerId);
		
		return $this;
	}

	/**
	 * Setter function for customerId
	 * 
	 * @param string $customerId
	 * 
	 * @return void
	 */
	public function setCustomerId(string $customerId): void
	{
		$this->customerId = $customerId;
	}

	/**
	 * This is the ID of the customer profile used for this request.
	 * 
	 * @return string
	 */
	public function getCustomerId(): string
	{
		return $this->customerId;
	}

	/**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class SingleUseCustomerToken {" . PHP_EOL
			. "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL
			. "    paymentType: " . $this->toIndentedString($this->paymentType) . PHP_EOL
			. "    id: " . $this->toIndentedString($this->id) . PHP_EOL
			. "    timeToLiveSeconds: " . $this->toIndentedString($this->timeToLiveSeconds) . PHP_EOL
			. "    status: " . $this->toIndentedString($this->status) . PHP_EOL
			. "    singleUseCustomerToken: " . $this->toIndentedString($this->singleUseCustomerToken) . PHP_EOL
			. "    locale: " . $this->toIndentedString($this->locale) . PHP_EOL
			. "    firstName: " . $this->toIndentedString($this->firstName) . PHP_EOL
			. "    middleName: " . $this->toIndentedString($this->middleName) . PHP_EOL
			. "    lastname: " . $this->toIndentedString($this->lastname) . PHP_EOL
			. "    dateOfBirth: " . $this->toIndentedString($this->dateOfBirth) . PHP_EOL
			. "    email: " . $this->toIndentedString($this->email) . PHP_EOL
			. "    phone: " . $this->toIndentedString($this->phone) . PHP_EOL
			. "    ip: " . $this->toIndentedString($this->ip) . PHP_EOL
			. "    nationality: " . $this->toIndentedString($this->nationality) . PHP_EOL
			. "    addresses: " . $this->toIndentedString($this->addresses) . PHP_EOL
			. "    paymentHandles: " . $this->toIndentedString($this->paymentHandles) . PHP_EOL
			. "    customerId: " . $this->toIndentedString($this->customerId) . PHP_EOL
			. "}";
	}
}
