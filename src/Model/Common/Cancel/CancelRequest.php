<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2023. For more information see LICENSE
 *
 */

namespace Paysafe\PhpSdk\Model\Common\Cancel;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * This class contains the internal details required for processing a cancel request.
 * This object represents the request body for following operations:
 * <li>Cancel Payment</li>
 * <li>Cancel Settlement</li>
 * <li>Cancel Refund</li>
 * <li>Cancel Standalone Credit</li>
 * <li>Cancel Original Credit</li>
 * <li>Cancel Mandate</li>
 *
 * <p>
 * Allowed value for status: <code>CANCELLED</code>
 * </p>
 */
class CancelRequest extends BaseModel
{
    private string $status;

    /**
     * Builder function for status
     *
     * @param string $status
     *
     * @return $this
     */
    public function status(string $status): self
    {
        $this->setStatus($status);

        return $this;
    }

    /**
     * Setter function for status
     *
     * @param string $status
     *
     * @return void
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * Getter function for status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }


    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class CancelRequest {" . PHP_EOL
            . "    status: " . $this->toIndentedString($this->status) . "\n"
            . "}";
    }
}
