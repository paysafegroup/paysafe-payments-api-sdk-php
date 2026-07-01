<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Profile;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Customer\Customer;


/**
 * Customer profile information - required for fundingTransaction in CARD payments, VIP Preferred, Play+ Registration, and paysafecard Payout
 */
class Profile extends BaseModel
{
    /**
     * The customer's profile ID in the system. If this is present, other fields are not required
     */
    private ?string $id = null;
    /**
     * The status of customer in the system, returned in the response
     */
    private ?string $status = null;
    /**
     * Reference number for the customer created by the merchant. Must be unique for each customer
     */
    private ?string $merchantCustomerId = null;
    private ?string $locale = null;
    /**
     * The customer's first name
     */
    private ?string $firstName = null;
    /**
     * The customer's last name
     */
    private ?string $lastName = null;
    /**
     * The customer's email address
     */
    private ?string $email = null;
    /**
     * The customer's phone number
     */
    private ?string $phone = null;
    private ?string $emailVerified = null;
    private ?string $phoneVerified = null;
    private ?DateOfBirth $dateOfBirth = null;
    private ?string $gender = null;
    /**
     * The customer's nationality
     */
    private ?string $nationality = null;
    /**
     * Customer's identity documents
     */
    private array $identityDocuments = [];
    private ?string $kycStatus = null;

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
     * Builder function for merchantCustomerId
     *
     * @param string $merchantCustomerId
     *
     * @return $this
     */
    public function merchantCustomerId(?string $merchantCustomerId): self
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
    public function setMerchantCustomerId(?string $merchantCustomerId): void
    {
        $this->merchantCustomerId = $merchantCustomerId;
    }

    /**
     * Getter function for merchantCustomerId
     *
     * @return ?string
     */
    public function getMerchantCustomerId(): ?string
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
     * Builder function for lastName
     *
     * @param string $lastName
     *
     * @return $this
     */
    public function lastName(?string $lastName): self
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
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * Getter function for lastName
     *
     * @return ?string
     */
    public function getLastName(): ?string
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
     * Builder function for emailVerified
     *
     * @param string $emailVerified
     *
     * @return $this
     */
    public function emailVerified(?string $emailVerified): self
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
    public function setEmailVerified(?string $emailVerified): void
    {
        $this->emailVerified = $emailVerified;
    }

    /**
     * Getter function for emailVerified
     *
     * @return ?string
     */
    public function getEmailVerified(): ?string
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
    public function phoneVerified(?string $phoneVerified): self
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
    public function setPhoneVerified(?string $phoneVerified): void
    {
        $this->phoneVerified = $phoneVerified;
    }

    /**
     * Getter function for phoneVerified
     *
     * @return ?string
     */
    public function getPhoneVerified(): ?string
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
     * Builder function for gender
     *
     * @param string $gender
     *
     * @return $this
     */
    public function gender(?string $gender): self
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
    public function setGender(?string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * Getter function for gender
     *
     * @return ?string
     */
    public function getGender(): ?string
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
     * Getter function for identityDocuments
     *
     * @return IdentityDocument[]
     */
    public function getIdentityDocuments(): array
    {
        return $this->identityDocuments ?? [];
    }
    /**
     * Builder function for kycStatus
     *
     * @param string $kycStatus
     *
     * @return $this
     */
    public function kycStatus(?string $kycStatus): self
    {
        $this->setKycStatus($kycStatus);

        return $this;
    }

    /**
     * Setter function for kycStatus
     *
     * @param string $kycStatus
     *
     * @return void
     */
    public function setKycStatus(?string $kycStatus): void
    {
        $this->kycStatus = $kycStatus;
    }

    /**
     * Getter function for kycStatus
     *
     * @return ?string
     */
    public function getKycStatus(): ?string
    {
        return $this->kycStatus;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Profile {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id ?? null) . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status ?? null) . PHP_EOL
            . "    merchantCustomerId: " . $this->toIndentedString($this->merchantCustomerId ?? null) . PHP_EOL
            . "    locale: " . $this->toIndentedString($this->locale ?? null) . PHP_EOL
            . "    firstName: " . $this->toIndentedString($this->firstName ?? null) . PHP_EOL
            . "    lastName: " . $this->toIndentedString($this->lastName ?? null) . PHP_EOL
            . "    email: " . $this->toIndentedString($this->email ?? null) . PHP_EOL
            . "    phone: " . $this->toIndentedString($this->phone ?? null) . PHP_EOL
            . "    emailVerified: " . $this->toIndentedString($this->emailVerified ?? null) . PHP_EOL
            . "    phoneVerified: " . $this->toIndentedString($this->phoneVerified ?? null) . PHP_EOL
            . "    dateOfBirth: " . $this->toIndentedString($this->dateOfBirth ?? null) . PHP_EOL
            . "    gender: " . $this->toIndentedString($this->gender ?? null) . PHP_EOL
            . "    nationality: " . $this->toIndentedString($this->nationality ?? null) . PHP_EOL
            . "    identityDocuments: " . $this->toIndentedString($this->identityDocuments ?? null) . PHP_EOL
            . "    kycStatus: " . $this->toIndentedString($this->kycStatus ?? null) . PHP_EOL
            . "}";
    }
}
