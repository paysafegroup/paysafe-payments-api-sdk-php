<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\StandaloneCredit;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * The Sender is deemed to be the person or party who has the contractual relationship with the end customer. **Note:** In case of Visa Direct with use cases Account to Account, Wallet transfer or Funds Transfer, the sender name should be the same as the recipient name.
 */
class Sender extends BaseModel
{
    /**
     * Sender's first name.
     */
    private ?string $firstName = null;
    /**
     * Sender's last name.
     */
    private ?string $lastName = null;
    /**
     * This is the sender's account number, e.g., a loan agreement number or customer ID.
     */
    private ?string $accountNumber = null;
    private ?SenderAddress $address = null;

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
     * Builder function for accountNumber
     *
     * @param string $accountNumber
     *
     * @return $this
     */
    public function accountNumber(?string $accountNumber): self
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
    public function setAccountNumber(?string $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * Getter function for accountNumber
     *
     * @return ?string
     */
    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }
    /**
     * Builder function for address
     *
     * @param SenderAddress $address
     *
     * @return $this
     */
    public function address(?SenderAddress $address): self
    {
        $this->setAddress($address);

        return $this;
    }

    /**
     * Setter function for address
     *
     * @param SenderAddress $address
     *
     * @return void
     */
    public function setAddress(?SenderAddress $address): void
    {
        $this->address = $address;
    }

    /**
     * Getter function for address
     *
     * @return ?SenderAddress
     */
    public function getAddress(): ?SenderAddress
    {
        return $this->address;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Sender {" . PHP_EOL
            . "    firstName: " . $this->toIndentedString($this->firstName ?? null) . PHP_EOL
            . "    lastName: " . $this->toIndentedString($this->lastName ?? null) . PHP_EOL
            . "    accountNumber: " . $this->toIndentedString($this->accountNumber ?? null) . PHP_EOL
            . "    address: " . $this->toIndentedString($this->address ?? null) . PHP_EOL
            . "}";
    }
}
