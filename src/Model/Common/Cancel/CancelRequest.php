<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Common\Cancel;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Model\Payment\Payment;
use Paysafe\PhpSdk\Model\Refund\Refund;
use Paysafe\PhpSdk\Model\Settlement\Settlement;


/**
 * This class contains the internal details required for processing a cancel request. This object represents the request body for following operations: - Cancel Payment - Cancel Settlement - Cancel Refund - Cancel Standalone Credit - Cancel Original Credit - Cancel Mandate  Allowed value for status: CANCELLED
 */
class CancelRequest extends BaseModel
{
    private ?string $status = null;

    /**
     * Builder function for status
     *
     * @param string $status
     *
     * @return $this
     */
    public function status(?string $status): self
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
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Getter function for status
     *
     * @return ?string
     */
    public function getStatus(): ?string
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
            . "    status: " . $this->toIndentedString($this->status ?? null) . PHP_EOL
            . "}";
    }
}
