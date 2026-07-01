<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\PaymentFacilitator;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Payment\Payment;


/**
 * Contains information for Payment facilitator sub-merchant.
 */
class SubMerchant extends BaseModel
{
    /**
     * Field contains an identifier of the actual merchant
     */
    private ?string $id = null;
    /**
     * Field contains the name of the actual merchant
     */
    private ?string $name = null;
    /**
     * Field contains the phone number of the actual merchant
     */
    private ?string $phone = null;
    /**
     * Field contains the email address of the actual merchant
     */
    private ?string $email = null;
    /**
     * Field contains the url address of the actual merchant
     */
    private ?string $url = null;
    private ?SubMerchantAddress $address = null;

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
     * Builder function for name
     *
     * @param string $name
     *
     * @return $this
     */
    public function name(?string $name): self
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
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Getter function for name
     *
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
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
     * Builder function for url
     *
     * @param string $url
     *
     * @return $this
     */
    public function url(?string $url): self
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
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * Getter function for url
     *
     * @return ?string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }
    /**
     * Builder function for address
     *
     * @param SubMerchantAddress $address
     *
     * @return $this
     */
    public function address(?SubMerchantAddress $address): self
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
    public function setAddress(?SubMerchantAddress $address): void
    {
        $this->address = $address;
    }

    /**
     * Getter function for address
     *
     * @return ?SubMerchantAddress
     */
    public function getAddress(): ?SubMerchantAddress
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
        return "class SubMerchant {" . PHP_EOL
            . "    id: " . $this->toIndentedString($this->id ?? null) . PHP_EOL
            . "    name: " . $this->toIndentedString($this->name ?? null) . PHP_EOL
            . "    phone: " . $this->toIndentedString($this->phone ?? null) . PHP_EOL
            . "    email: " . $this->toIndentedString($this->email ?? null) . PHP_EOL
            . "    url: " . $this->toIndentedString($this->url ?? null) . PHP_EOL
            . "    address: " . $this->toIndentedString($this->address ?? null) . PHP_EOL
            . "}";
    }
}
