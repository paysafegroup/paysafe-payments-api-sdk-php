<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Passenger information.
 */
class Passenger extends BaseModel
{
    /**
     * Identifies the ticket for this passenger only
     */
    private ?string $ticketNumber = null;
    /**
     * Passenger's first name
     */
    private ?string $firstName = null;
    /**
     * Passenger's last name
     */
    private ?string $lastName = null;
    /**
     * Passenger's phone number
     */
    private ?string $phoneNumber = null;
    /**
     * Code that identifies a type of passenger. For example 'INF' which indicates a child traveling on parent's lap
     */
    private ?string $passengerCode = null;
    private ?string $gender = null;

    /**
     * Builder function for ticketNumber
     *
     * @param string $ticketNumber
     *
     * @return $this
     */
    public function ticketNumber(?string $ticketNumber): self
    {
        $this->setTicketNumber($ticketNumber);

        return $this;
    }

    /**
     * Setter function for ticketNumber
     *
     * @param string $ticketNumber
     *
     * @return void
     */
    public function setTicketNumber(?string $ticketNumber): void
    {
        $this->ticketNumber = $ticketNumber;
    }

    /**
     * Getter function for ticketNumber
     *
     * @return ?string
     */
    public function getTicketNumber(): ?string
    {
        return $this->ticketNumber;
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
     * Builder function for phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return $this
     */
    public function phoneNumber(?string $phoneNumber): self
    {
        $this->setPhoneNumber($phoneNumber);

        return $this;
    }

    /**
     * Setter function for phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return void
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Getter function for phoneNumber
     *
     * @return ?string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
    /**
     * Builder function for passengerCode
     *
     * @param string $passengerCode
     *
     * @return $this
     */
    public function passengerCode(?string $passengerCode): self
    {
        $this->setPassengerCode($passengerCode);

        return $this;
    }

    /**
     * Setter function for passengerCode
     *
     * @param string $passengerCode
     *
     * @return void
     */
    public function setPassengerCode(?string $passengerCode): void
    {
        $this->passengerCode = $passengerCode;
    }

    /**
     * Getter function for passengerCode
     *
     * @return ?string
     */
    public function getPassengerCode(): ?string
    {
        return $this->passengerCode;
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
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class Passenger {" . PHP_EOL
            . "    ticketNumber: " . $this->toIndentedString($this->ticketNumber ?? null) . PHP_EOL
            . "    firstName: " . $this->toIndentedString($this->firstName ?? null) . PHP_EOL
            . "    lastName: " . $this->toIndentedString($this->lastName ?? null) . PHP_EOL
            . "    phoneNumber: " . $this->toIndentedString($this->phoneNumber ?? null) . PHP_EOL
            . "    passengerCode: " . $this->toIndentedString($this->passengerCode ?? null) . PHP_EOL
            . "    gender: " . $this->toIndentedString($this->gender ?? null) . PHP_EOL
            . "}";
    }
}
