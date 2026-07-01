<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Card;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * Acquirer data is additional information about your card acquirer. This is applicable **only when** you are using Worldpay (VAN) as your acquirer for authorizations. Contact your account manager for more information.
 */
class AcquirerData extends BaseModel
{
    /**
     * Code for your card acquirer
     */
    private ?string $code = null;
    private ?DiscretionaryData $discretionaryData = null;

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
     * Builder function for discretionaryData
     *
     * @param DiscretionaryData $discretionaryData
     *
     * @return $this
     */
    public function discretionaryData(?DiscretionaryData $discretionaryData): self
    {
        $this->setDiscretionaryData($discretionaryData);

        return $this;
    }

    /**
     * Setter function for discretionaryData
     *
     * @param DiscretionaryData $discretionaryData
     *
     * @return void
     */
    public function setDiscretionaryData(?DiscretionaryData $discretionaryData): void
    {
        $this->discretionaryData = $discretionaryData;
    }

    /**
     * Getter function for discretionaryData
     *
     * @return ?DiscretionaryData
     */
    public function getDiscretionaryData(): ?DiscretionaryData
    {
        return $this->discretionaryData;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class AcquirerData {" . PHP_EOL
            . "    code: " . $this->toIndentedString($this->code ?? null) . PHP_EOL
            . "    discretionaryData: " . $this->toIndentedString($this->discretionaryData ?? null) . PHP_EOL
            . "}";
    }
}
