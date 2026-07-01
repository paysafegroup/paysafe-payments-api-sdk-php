<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\VoidAuthorization;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Meta;


/**
 * These are internal details of the void authorization response.
 */
class VoidAuthorizationsList extends BaseModel
{
    private array $voidAuths = [];
    private ?Meta $meta = null;

    /**
     * Builder function for voidAuths
     *
     * @param VoidAuthorization[] $voidAuths
     *
     * @return $this
     */
    public function voidAuths(array $voidAuths): self
    {
        $this->setVoidAuths($voidAuths);

        return $this;
    }

    /**
     * Setter function for voidAuths
     *
     * @param VoidAuthorization[] $voidAuths
     *
     * @return void
     */
    public function setVoidAuths(array $voidAuths): void
    {
        $this->voidAuths = $voidAuths;
    }

    /**
     * Getter function for voidAuths
     *
     * @return VoidAuthorization[]
     */
    public function getVoidAuths(): array
    {
        return $this->voidAuths ?? [];
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
        return "class VoidAuthorizationsList {" . PHP_EOL
            . "    voidAuths: " . $this->toIndentedString($this->voidAuths ?? null) . PHP_EOL
            . "    meta: " . $this->toIndentedString($this->meta ?? null) . PHP_EOL
            . "}";
    }
}
