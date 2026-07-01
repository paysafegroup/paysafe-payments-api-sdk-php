<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Verification;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;


/**
 * VerificationList
 */
class VerificationList extends BaseModel
{
    private array $verifications = [];
    private ?Meta $meta = null;

    /**
     * Builder function for verifications
     *
     * @param Verification[] $verifications
     *
     * @return $this
     */
    public function verifications(array $verifications): self
    {
        $this->setVerifications($verifications);

        return $this;
    }

    /**
     * Setter function for verifications
     *
     * @param Verification[] $verifications
     *
     * @return void
     */
    public function setVerifications(array $verifications): void
    {
        $this->verifications = $verifications;
    }

    /**
     * Getter function for verifications
     *
     * @return Verification[]
     */
    public function getVerifications(): array
    {
        return $this->verifications ?? [];
    }
    /**
     * Builder function for meta
     *
     * @param Meta $meta
     *
     * @return $this
     */
    public function meta(?Meta $meta): self
    {
        $this->setMeta($meta);

        return $this;
    }

    /**
     * Setter function for meta
     *
     * @param Meta $meta
     *
     * @return void
     */
    public function setMeta(?Meta $meta): void
    {
        $this->meta = $meta;
    }

    /**
     * Getter function for meta
     *
     * @return ?Meta
     */
    public function getMeta(): ?Meta
    {
        return $this->meta;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class VerificationList {" . PHP_EOL
            . "    verifications: " . $this->toIndentedString($this->verifications ?? null) . PHP_EOL
            . "    meta: " . $this->toIndentedString($this->meta ?? null) . PHP_EOL
            . "}";
    }
}
