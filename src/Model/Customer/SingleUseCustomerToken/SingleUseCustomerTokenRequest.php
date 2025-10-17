<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Customer\SingleUseCustomerToken;

use Paysafe\PhpSdk\Model\BaseModel;

/**
 * SingleUseCustomerTokenRequest
 */
class SingleUseCustomerTokenRequest extends BaseModel
{

	private string $merchantRefNum;
	private ?array $paymentType = null;
	private array $additionalParameters;

	/**
	 * Builder function for merchantRefNum
	 * 
	 * @param string $merchantRefNum
	 * 
	 * @return $this
	 */
	public function merchantRefNum(string $merchantRefNum): self
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
	public function setMerchantRefNum(string $merchantRefNum): void
	{
		$this->merchantRefNum = $merchantRefNum;
	}

	/**
	 * This is the merchant reference number created by the merchant and submitted as part of the request.
     * It must be unique for each request.
	 * 
	 * @return string
	 */
	public function getMerchantRefNum(): string
	{
		return $this->merchantRefNum;
	}

	/**
	 * Builder function for paymentType
	 * 
	 * @param string[] $paymentType
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
	 * @param string[] $paymentType
	 * 
	 * @return void
	 */
	public function setPaymentType(array $paymentType): void
	{
		$this->paymentType = $paymentType;
	}

	/**
	 * This specifies the payment type for which you are creating the single-use token.
	 * 
	 * @return string[]|null
	 */
	public function getPaymentType(): array
	{
		return $this->paymentType;
	}

	/**
	 * Add new paymentTypeItem
	 * 
	 * @param string $paymentTypeItem
	 * 
	 * @return $this
	 */
	public function addPaymentTypeItem(string $paymentTypeItem): self
	{
		if ($this->paymentType === null) {
			$this->setPaymentType([$paymentTypeItem]);
			
			return $this;
		}
		
		$paymentType = $this->getPaymentType();
		$paymentType[] = $paymentTypeItem;
		$this->setPaymentType($paymentType);
		
		return $this;
	}

	/**
	 * Remove paymentTypeItem
	 * 
	 * @param string $paymentTypeItem
	 * 
	 * @return $this
	 */
	public function removePaymentTypeItem(string $paymentTypeItem): self
	{
		$this->setPaymentType(array_diff($this->getPaymentType(), [$paymentTypeItem]));
		
		return $this;
	}

	/**
	 * Builder function for additionalParameters
	 * 
	 * @param array $additionalParameters
	 * 
	 * @return $this
	 */
	public function additionalParameters(array $additionalParameters): self
	{
		$this->setAdditionalParameters($additionalParameters);
		
		return $this;
	}

	/**
	 * Setter function for additionalParameters
	 * 
	 * @param array $additionalParameters
	 * 
	 * @return void
	 */
	public function setAdditionalParameters(array $additionalParameters): void
	{
		$this->additionalParameters = $additionalParameters;
	}

	/**
	 * Getter function for additionalParameters
	 * 
	 * @return array
	 */
	public function getAdditionalParameters(): array
	{
		return $this->additionalParameters;
	}

    /**
     * Add a new additional parameter
     *
     * @param string $key
     * @param object $value
     *
     * @return $this
     */
    public function addAdditionalParameter(string $key, object $value): self
    {
        if ($this->additionalParameters === null) {
            $this->additionalParameters = [];
        }

        $this->additionalParameters[$key] = $value;

        return $this;
    }

    /**
	 * Convert the object to a string representation.
	 * 
	 * @return string
	 */
	public function __toString(): string
	{
		return "class SingleUseCustomerTokenRequest {" . PHP_EOL
			. "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL
			. "    paymentType: " . $this->toIndentedString($this->paymentType) . PHP_EOL
			. "    additionalParameters: " . $this->toIndentedString($this->additionalParameters) . PHP_EOL
			. "}";
	}
}
