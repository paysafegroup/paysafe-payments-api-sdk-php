<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\StandaloneCredit;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;


/**
 * StandaloneCreditList
 */
class StandaloneCreditList extends BaseModel
{
    private array $standaloneCredits = [];
    private ?Meta $meta = null;

    /**
     * Builder function for standaloneCredits
     *
     * @param StandaloneCredit[] $standaloneCredits
     *
     * @return $this
     */
    public function standaloneCredits(array $standaloneCredits): self
    {
        $this->setStandaloneCredits($standaloneCredits);

        return $this;
    }

    /**
     * Setter function for standaloneCredits
     *
     * @param StandaloneCredit[] $standaloneCredits
     *
     * @return void
     */
    public function setStandaloneCredits(array $standaloneCredits): void
    {
        $this->standaloneCredits = $standaloneCredits;
    }

    /**
     * Getter function for standaloneCredits
     *
     * @return StandaloneCredit[]
     */
    public function getStandaloneCredits(): array
    {
        return $this->standaloneCredits ?? [];
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
        return "class StandaloneCreditList {" . PHP_EOL
            . "    standaloneCredits: " . $this->toIndentedString($this->standaloneCredits ?? null) . PHP_EOL
            . "    meta: " . $this->toIndentedString($this->meta ?? null) . PHP_EOL
            . "}";
    }
}
