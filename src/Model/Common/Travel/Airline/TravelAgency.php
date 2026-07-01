<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Travel\Airline;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Information about the travel agency if the ticket was issued by a travel agency.
 */
class TravelAgency extends BaseModel
{
    /**
     * Code identifying travel agency if the ticket was issued by a travel agency
     */
    private ?string $code = null;
    /**
     * Name of the travel agency
     */
    private ?string $name = null;
    private ?AgencyAddress $agencyAddress = null;

    /**
     * Builder function for code
     *
     * @param string $code
     *
     * @return $this
     */
    public function code(?string $code): self
    {
        $this->setCode($code);

        return $this;
    }

    /**
     * Setter function for code
     *
     * @param string $code
     *
     * @return void
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * Getter function for code
     *
     * @return ?string
     */
    public function getCode(): ?string
    {
        return $this->code;
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
     * Builder function for agencyAddress
     *
     * @param AgencyAddress $agencyAddress
     *
     * @return $this
     */
    public function agencyAddress(?AgencyAddress $agencyAddress): self
    {
        $this->setAgencyAddress($agencyAddress);

        return $this;
    }

    /**
     * Setter function for agencyAddress
     *
     * @param AgencyAddress $agencyAddress
     *
     * @return void
     */
    public function setAgencyAddress(?AgencyAddress $agencyAddress): void
    {
        $this->agencyAddress = $agencyAddress;
    }

    /**
     * Getter function for agencyAddress
     *
     * @return ?AgencyAddress
     */
    public function getAgencyAddress(): ?AgencyAddress
    {
        return $this->agencyAddress;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class TravelAgency {" . PHP_EOL
            . "    code: " . $this->toIndentedString($this->code ?? null) . PHP_EOL
            . "    name: " . $this->toIndentedString($this->name ?? null) . PHP_EOL
            . "    agencyAddress: " . $this->toIndentedString($this->agencyAddress ?? null) . PHP_EOL
            . "}";
    }
}
