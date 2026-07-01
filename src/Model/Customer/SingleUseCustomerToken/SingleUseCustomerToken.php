<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Customer\SingleUseCustomerToken;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Profile\DateOfBirth;
use Paysafe\PhpSdk\Model\Customer\Address;
use Paysafe\PhpSdk\Model\Customer\CustomerPaymentHandle;
use Paysafe\PhpSdk\Model\Customer\Enums\SingleUseTokenPaymentType;
use Paysafe\PhpSdk\Model\Payment\Payment;


/**
 * SingleUseCustomerToken
 */
class SingleUseCustomerToken extends BaseModel
{
    /**
     * This is the merchant reference number created by the merchant and submitted as part of the request. It must be unique for each request.
     */
    private ?string $merchantRefNum = null;
    /**
     * This specifies the payment type for which you are creating the single-use token.
     */
    private array $paymentType = [];
    /**
     * This is the ID returned in the response. This ID can be used for future associated requests, e.g., to look up the Payment Handle.
     */
    private ?string $id = null;
    /**
     * This is the period of time, in seconds, the singleUseCustomerToken is valid before expiration.
     */
    private ?int $timeToLiveSeconds = null;
    private ?string $status = null;
    /**
     * This token can be used in the Payments Checkout to populate the checkout with customer information.
     */
    private ?string $singleUseCustomerToken = null;
    private ?string $locale = null;
    /**
     * This is the customer's first name
     */
    private ?string $firstName = null;
    /**
     * This is the customer's middle name
     */
    private ?string $middleName = null;
    /**
     * This is the customer's last name
     */
    private ?string $lastname = null;
    private ?DateOfBirth $dateOfBirth = null;
    /**
     * This is the customer's email address
     */
    private ?string $email = null;
    /**
     * This is the customer's phone number
     */
    private ?string $phone = null;
    /**
     * This is the customer's IP address
     */
    private ?string $ip = null;
    /**
     * This is the customer's nationality
     */
    private ?string $nationality = null;
    /**
     * This is an array of addresses associated with the customer
     */
    private array $addresses = [];
    /**
     * This is an array of payment handles associated with the customer
     */
    private array $paymentHandles = [];
    /**
     * This is the ID of the customer profile used for this request.
     */
    private ?string $customerId = null;

    /**
     * Builder function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return $this
     */
    public function merchantRefNum(?string $merchantRefNum): self
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
    public function setMerchantRefNum(?string $merchantRefNum): void
    {
        $this->merchantRefNum = $merchantRefNum;
    }

    /**
     * Getter function for merchantRefNum
     *
     * @return ?string
     */
    public function getMerchantRefNum(): ?string
    {
        return $this->merchantRefNum;
    }
    /**
     * Builder function for paymentType
     *
     * @param SingleUseTokenPaymentType[] $paymentType
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
     * @param SingleUseTokenPaymentType[] $paymentType
     *
     * @return void
     */
    public function setPaymentType(array $paymentType): void
    {
        $this->paymentType = $paymentType;
    }

    /**
     * Getter function for paymentType
     *
     * @return SingleUseTokenPaymentType[]
     */
    public function getPaymentType(): array
    {
        return $this->paymentType ?? [];
    }
    /**
     * Builder function for id
     *
     * @param string $id
     *
     * @return $this
     */
    public function id(?string $id): self
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
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Getter function for id
     *
     * @return ?string
     */
    public function getId(): ?string
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
    public function timeToLiveSeconds(?int $timeToLiveSeconds): self
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
    public function setTimeToLiveSeconds(?int $timeToLiveSeconds): void
    {
        $this->timeToLiveSeconds = $timeToLiveSeconds;
    }

    /**
     * Getter function for timeToLiveSeconds
     *
     * @return ?int
     */
    public function getTimeToLiveSeconds(): ?int
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
    public function status(?string $status): self
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
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Getter function for status
     *
     * @return ?string
     */
    public function getStatus(): ?string
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
    public function singleUseCustomerToken(?string $singleUseCustomerToken): self
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
    public function setSingleUseCustomerToken(?string $singleUseCustomerToken): void
    {
        $this->singleUseCustomerToken = $singleUseCustomerToken;
    }

    /**
     * Getter function for singleUseCustomerToken
     *
     * @return ?string
     */
    public function getSingleUseCustomerToken(): ?string
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
    public function locale(?string $locale): self
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
    public function setLocale(?string $locale): void
    {
        $this->locale = $locale;
    }

    /**
     * Getter function for locale
     *
     * @return ?string
     */
    public function getLocale(): ?string
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
    public function firstName(?string $firstName): self
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
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * Getter function for firstName
     *
     * @return ?string
     */
    public function getFirstName(): ?string
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
    public function middleName(?string $middleName): self
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
    public function setMiddleName(?string $middleName): void
    {
        $this->middleName = $middleName;
    }

    /**
     * Getter function for middleName
     *
     * @return ?string
     */
    public function getMiddleName(): ?string
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
    public function lastname(?string $lastname): self
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
    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * Getter function for lastname
     *
     * @return ?string
     */
    public function getLastname(): ?string
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
    public function dateOfBirth(?DateOfBirth $dateOfBirth): self
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
    public function setDateOfBirth(?DateOfBirth $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * Getter function for dateOfBirth
     *
     * @return ?DateOfBirth
     */
    public function getDateOfBirth(): ?DateOfBirth
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
    public function email(?string $email): self
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
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * Getter function for email
     *
     * @return ?string
     */
    public function getEmail(): ?string
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
    public function phone(?string $phone): self
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
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * Getter function for phone
     *
     * @return ?string
     */
    public function getPhone(): ?string
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
    public function ip(?string $ip): self
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
    public function setIp(?string $ip): void
    {
        $this->ip = $ip;
    }

    /**
     * Getter function for ip
     *
     * @return ?string
     */
    public function getIp(): ?string
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
    public function nationality(?string $nationality): self
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
    public function setNationality(?string $nationality): void
    {
        $this->nationality = $nationality;
    }

    /**
     * Getter function for nationality
     *
     * @return ?string
     */
    public function getNationality(): ?string
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
     * Getter function for addresses
     *
     * @return Address[]
     */
    public function getAddresses(): array
    {
        return $this->addresses ?? [];
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
     * Getter function for paymentHandles
     *
     * @return CustomerPaymentHandle[]
     */
    public function getPaymentHandles(): array
    {
        return $this->paymentHandles ?? [];
    }
    /**
     * Builder function for customerId
     *
     * @param string $customerId
     *
     * @return $this
     */
    public function customerId(?string $customerId): self
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
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Getter function for customerId
     *
     * @return ?string
     */
    public function getCustomerId(): ?string
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
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum ?? null) . PHP_EOL
            . "    paymentType: " . $this->toIndentedString($this->paymentType ?? null) . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id ?? null) . PHP_EOL
            . "    timeToLiveSeconds: " . $this->toIndentedString($this->timeToLiveSeconds ?? null) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status ?? null) . PHP_EOL
            . "    singleUseCustomerToken: " . $this->toIndentedString($this->singleUseCustomerToken ?? null) . PHP_EOL
            . "    locale: " . $this->toIndentedString($this->locale ?? null) . PHP_EOL
            . "    firstName: " . $this->toIndentedString($this->firstName ?? null) . PHP_EOL
            . "    middleName: " . $this->toIndentedString($this->middleName ?? null) . PHP_EOL
            . "    lastname: " . $this->toIndentedString($this->lastname ?? null) . PHP_EOL
            . "    dateOfBirth: " . $this->toIndentedString($this->dateOfBirth ?? null) . PHP_EOL
            . "    email: " . $this->toIndentedString($this->email ?? null) . PHP_EOL
            . "    phone: " . $this->toIndentedString($this->phone ?? null) . PHP_EOL
            . "    ip: " . $this->toIndentedString($this->ip ?? null) . PHP_EOL
            . "    nationality: " . $this->toIndentedString($this->nationality ?? null) . PHP_EOL
            . "    addresses: " . $this->toIndentedString($this->addresses ?? null) . PHP_EOL
            . "    paymentHandles: " . $this->toIndentedString($this->paymentHandles ?? null) . PHP_EOL
            . "    customerId: " . $this->toIndentedString($this->customerId ?? null) . PHP_EOL
            . "}";
    }
}
