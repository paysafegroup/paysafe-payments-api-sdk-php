<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\PaymentFacilitator;

use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Contains information for Payment facilitator sub-merchant.

 **Note** This object is only for Payment facilitator merchants.
 */
class SubMerchant extends BaseModel
{

    /**
     *  This field contains an identifier of the actual merchant. Example: 123456789
     */
    private string $id;

    /**
     *  This field must contain the name of the actual merchant. Example: Submerchant Name
     */
    private string $name;

    /**
     *  This field must contain the phone number of the actual merchant. Example: 5555555555
     */
    private string $phone;

    /**
     *  This field must contain the email address of the actual merchant. Example: submerchant@mail.com
     */
    private string $email;

    /**
     *  This field must contain the url address of the actual merchant. Example: www.paysafe.com
     */
    private string $url;

    private SubMerchantAddress $address;

    /**
     * Builder function for id
     *
     * @param string $id
     *
     * @return SubMerchant
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
     * Getter function for id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Builder function for name
     *
     * @param string $name
     *
     * @return SubMerchant
     */
    public function name(string $name): self
    {
        $this->setName($name);

        return $this;
    }
    /**
     * Setter function for name
     *
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    /**
     * Getter function for name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Builder function for phone
     *
     * @param string $phone
     *
     * @return SubMerchant
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
     * Getter function for phone
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Builder function for email
     *
     * @param string $email
     *
     * @return SubMerchant
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
     * Getter function for email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Builder function for url
     *
     * @param string $url
     *
     * @return SubMerchant
     */
    public function url(string $url): self
    {
        $this->setUrl($url);

        return $this;
    }
    /**
     * Setter function for url
     *
     * @param string $url
     *
     * @return void
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
    /**
     * Getter function for url
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Builder function for address
     *
     * @param SubMerchantAddress $address
     *
     * @return SubMerchant
     */
    public function address(SubMerchantAddress $address): self
    {
        $this->setAddress($address);

        return $this;
    }
    /**
     * Setter function for address
     *
     * @param SubMerchantAddress $address
     *
     * @return void
     */
    public function setAddress(SubMerchantAddress $address): void
    {
        $this->address = $address;
    }
    /**
     * Getter function for address
     *
     * @return SubMerchantAddress
     */
    public function getAddress(): SubMerchantAddress
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
        return "class SubMerchant {" . PHP_EOL .
            "	id: " . $this->toIndentedString($this->id) . PHP_EOL .
            "	name: " . $this->toIndentedString($this->name) . PHP_EOL .
            "	phone: " . $this->toIndentedString($this->phone) . PHP_EOL .
            "	email: " . $this->toIndentedString($this->email) . PHP_EOL .
            "	url: " . $this->toIndentedString($this->url) . PHP_EOL .
            "	address: " . $this->toIndentedString($this->address) . PHP_EOL .
            "}";
    }
}
