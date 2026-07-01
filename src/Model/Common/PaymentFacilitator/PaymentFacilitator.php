<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\PaymentFacilitator;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Payment\Payment;


/**
 * Contains informaion regarding the Payment facilitator
 */
class PaymentFacilitator extends BaseModel
{
    private ?SubMerchant $subMerchant = null;

    /**
     * Builder function for subMerchant
     *
     * @param SubMerchant $subMerchant
     *
     * @return $this
     */
    public function subMerchant(?SubMerchant $subMerchant): self
    {
        $this->setSubMerchant($subMerchant);

        return $this;
    }

    /**
     * Setter function for subMerchant
     *
     * @param SubMerchant $subMerchant
     *
     * @return void
     */
    public function setSubMerchant(?SubMerchant $subMerchant): void
    {
        $this->subMerchant = $subMerchant;
    }

    /**
     * Getter function for subMerchant
     *
     * @return ?SubMerchant
     */
    public function getSubMerchant(): ?SubMerchant
    {
        return $this->subMerchant;
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class PaymentFacilitator {" . PHP_EOL
            . "    subMerchant: " . $this->toIndentedString($this->subMerchant ?? null) . PHP_EOL
            . "}";
    }
}
