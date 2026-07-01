<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Profile;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\CardExpiry;
use Paysafe\PhpSdk\Model\Customer\Customer;


/**
 * Customer identity document information
 */
class IdentityDocument extends BaseModel
{
    private ?string $type = null;
    /**
     * The number associated with ID.
     */
    private ?string $documentNumber = null;
    /**
     * Value will always be \"US\".
     */
    private ?string $issuingCountry = null;
    private ?CardExpiry $expiryDate = null;
    private ?CardExpiry $issueDate = null;

    /**
     * Builder function for type
     *
     * @param string $type
     *
     * @return $this
     */
    public function type(?string $type): self
    {
        $this->setType($type);

        return $this;
    }

    /**
     * Setter function for type
     *
     * @param string $type
     *
     * @return void
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Getter function for type
     *
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * Builder function for documentNumber
     *
     * @param string $documentNumber
     *
     * @return $this
     */
    public function documentNumber(?string $documentNumber): self
    {
        $this->setDocumentNumber($documentNumber);

        return $this;
    }

    /**
     * Setter function for documentNumber
     *
     * @param string $documentNumber
     *
     * @return void
     */
    public function setDocumentNumber(?string $documentNumber): void
    {
        $this->documentNumber = $documentNumber;
    }

    /**
     * Getter function for documentNumber
     *
     * @return ?string
     */
    public function getDocumentNumber(): ?string
    {
        return $this->documentNumber;
    }
    /**
     * Builder function for issuingCountry
     *
     * @param string $issuingCountry
     *
     * @return $this
     */
    public function issuingCountry(?string $issuingCountry): self
    {
        $this->setIssuingCountry($issuingCountry);

        return $this;
    }

    /**
     * Setter function for issuingCountry
     *
     * @param string $issuingCountry
     *
     * @return void
     */
    public function setIssuingCountry(?string $issuingCountry): void
    {
        $this->issuingCountry = $issuingCountry;
    }

    /**
     * Getter function for issuingCountry
     *
     * @return ?string
     */
    public function getIssuingCountry(): ?string
    {
        return $this->issuingCountry;
    }
    /**
     * Builder function for expiryDate
     *
     * @param CardExpiry $expiryDate
     *
     * @return $this
     */
    public function expiryDate(?CardExpiry $expiryDate): self
    {
        $this->setExpiryDate($expiryDate);

        return $this;
    }

    /**
     * Setter function for expiryDate
     *
     * @param CardExpiry $expiryDate
     *
     * @return void
     */
    public function setExpiryDate(?CardExpiry $expiryDate): void
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * Getter function for expiryDate
     *
     * @return ?CardExpiry
     */
    public function getExpiryDate(): ?CardExpiry
    {
        return $this->expiryDate;
    }
    /**
     * Builder function for issueDate
     *
     * @param CardExpiry $issueDate
     *
     * @return $this
     */
    public function issueDate(?CardExpiry $issueDate): self
    {
        $this->setIssueDate($issueDate);

        return $this;
    }

    /**
     * Setter function for issueDate
     *
     * @param CardExpiry $issueDate
     *
     * @return void
     */
    public function setIssueDate(?CardExpiry $issueDate): void
    {
        $this->issueDate = $issueDate;
    }

    /**
     * Getter function for issueDate
     *
     * @return ?CardExpiry
     */
    public function getIssueDate(): ?CardExpiry
    {
        return $this->issueDate;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class IdentityDocument {" . PHP_EOL
            . "    type: " . $this->toIndentedString($this->type ?? null) . PHP_EOL
            . "    documentNumber: " . $this->toIndentedString($this->documentNumber ?? null) . PHP_EOL
            . "    issuingCountry: " . $this->toIndentedString($this->issuingCountry ?? null) . PHP_EOL
            . "    expiryDate: " . $this->toIndentedString($this->expiryDate ?? null) . PHP_EOL
            . "    issueDate: " . $this->toIndentedString($this->issueDate ?? null) . PHP_EOL
            . "}";
    }
}
