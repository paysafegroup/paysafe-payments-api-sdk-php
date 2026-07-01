<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Model\Customer\SingleUseCustomerToken;
use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Customer\Enums\SingleUseTokenPaymentType;


/**
 * SingleUseCustomerTokenRequest
 */
class SingleUseCustomerTokenRequest extends BaseModel
{
    /**
     * This is the merchant reference number created by the merchant and submitted as part of the request. It must be unique for each request.
     */
    private ?string $merchantRefNum = null;
    /**
     * This specifies the payment type for which you are creating the single-use token.
     */
    private array $paymentType = [];

    /**
     * Builder function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return $this
     */
    public function merchantRefNum(?string $merchantRefNum): self
    {
        $this->setMerchantRefNum($merchantRefNum);

        return $this;
    }

    /**
     * Setter function for merchantRefNum
     *
     * @param string $merchantRefNum
     *
     * @return void
     */
    public function setMerchantRefNum(?string $merchantRefNum): void
    {
        $this->merchantRefNum = $merchantRefNum;
    }

    /**
     * Getter function for merchantRefNum
     *
     * @return ?string
     */
    public function getMerchantRefNum(): ?string
    {
        return $this->merchantRefNum;
    }
    /**
     * Builder function for paymentType
     *
     * @param SingleUseTokenPaymentType[] $paymentType
     *
     * @return $this
     */
    public function paymentType(array $paymentType): self
    {
        $this->setPaymentType($paymentType);

        return $this;
    }

    /**
     * Setter function for paymentType
     *
     * @param SingleUseTokenPaymentType[] $paymentType
     *
     * @return void
     */
    public function setPaymentType(array $paymentType): void
    {
        $this->paymentType = $paymentType;
    }

    /**
     * Getter function for paymentType
     *
     * @return SingleUseTokenPaymentType[]
     */
    public function getPaymentType(): array
    {
        return $this->paymentType ?? [];
    }
    /**
     * Convert the object to a string representation.
     *
     * @return string
     */
    public function __toString(): string
    {
        return "class SingleUseCustomerTokenRequest {" . PHP_EOL
            . "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum ?? null) . PHP_EOL
            . "    paymentType: " . $this->toIndentedString($this->paymentType ?? null) . PHP_EOL
            . "}";
    }
    private ?array $additionalParameters = null;

    /**
     * This map holds additional parameters for features not yet available in this library.
     * Each key-value pair is serialized as a top-level field in the request/response.
     *
     * @return array|null
     */
    public function getAdditionalParameters(): ?array
    {
        return $this->additionalParameters;
    }

    public function setAdditionalParameters(array $additionalParameters): void
    {
        $this->additionalParameters = $additionalParameters;
    }

    public function addAdditionalParameter(string $key, $value): self
    {
        if ($this->additionalParameters === null) {
            $this->additionalParameters = [];
        }
        $this->additionalParameters[$key] = $value;
        return $this;
    }


}
