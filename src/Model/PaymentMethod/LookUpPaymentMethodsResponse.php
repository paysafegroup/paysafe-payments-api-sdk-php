<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\PaymentMethod;
use Paysafe\PhpSdk\Model\BaseModel;


/**
 * The response returned by /v1/paymentmethods endpoint.
 */
class LookUpPaymentMethodsResponse extends BaseModel
{
    private array $paymentMethods = [];

    /**
     * Builder function for paymentMethods
     *
     * @param PaymentMethod[] $paymentMethods
     *
     * @return $this
     */
    public function paymentMethods(array $paymentMethods): self
    {
        $this->setPaymentMethods($paymentMethods);

        return $this;
    }

    /**
     * Setter function for paymentMethods
     *
     * @param PaymentMethod[] $paymentMethods
     *
     * @return void
     */
    public function setPaymentMethods(array $paymentMethods): void
    {
        $this->paymentMethods = $paymentMethods;
    }

    /**
     * Getter function for paymentMethods
     *
     * @return PaymentMethod[]
     */
    public function getPaymentMethods(): array
    {
        return $this->paymentMethods ?? [];
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class LookUpPaymentMethodsResponse {" . PHP_EOL
            . "    paymentMethods: " . $this->toIndentedString($this->paymentMethods ?? null) . PHP_EOL
            . "}";
    }
}
