<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Common\PaymentFacilitator;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * Contains information about Payment facilitator.
 *
* >**Note:** This object is only for Payment facilitator merchants.
 */
class PaymentFacilitator extends BaseModel
{

    private SubMerchant $subMerchant;

    /**
     * Builder function for subMerchant
     *
     * @param SubMerchant $subMerchant
     *
     * @return PaymentFacilitator
     */
    public function subMerchant(SubMerchant $subMerchant): self
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
    public function setSubMerchant(SubMerchant $subMerchant): void
    {
        $this->subMerchant = $subMerchant;
    }

    /**
     * Getter function for subMerchant
     *
     * @return SubMerchant
     */
    public function getSubMerchant(): SubMerchant
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
        return "class PaymentFacilitator {" . PHP_EOL .
            "	subMerchant: " . $this->toIndentedString($this->subMerchant) . PHP_EOL .
            "}";
    }
}
