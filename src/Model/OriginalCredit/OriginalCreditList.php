<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\OriginalCredit;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;


/**
 * OriginalCreditList
 */
class OriginalCreditList extends BaseModel
{
    private array $originalCredits = [];
    private ?Meta $meta = null;

    /**
     * Builder function for originalCredits
     *
     * @param OriginalCredit[] $originalCredits
     *
     * @return $this
     */
    public function originalCredits(array $originalCredits): self
    {
        $this->setOriginalCredits($originalCredits);

        return $this;
    }

    /**
     * Setter function for originalCredits
     *
     * @param OriginalCredit[] $originalCredits
     *
     * @return void
     */
    public function setOriginalCredits(array $originalCredits): void
    {
        $this->originalCredits = $originalCredits;
    }

    /**
     * Getter function for originalCredits
     *
     * @return OriginalCredit[]
     */
    public function getOriginalCredits(): array
    {
        return $this->originalCredits ?? [];
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
        return "class OriginalCreditList {" . PHP_EOL
            . "    originalCredits: " . $this->toIndentedString($this->originalCredits ?? null) . PHP_EOL
            . "    meta: " . $this->toIndentedString($this->meta ?? null) . PHP_EOL
            . "}";
    }
}
