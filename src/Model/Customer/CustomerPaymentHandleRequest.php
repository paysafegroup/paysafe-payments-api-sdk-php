<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Model\Customer;

use Paysafe\PhpSdk\Model\BaseModel;
use Paysafe\PhpSdk\Model\Card\CardBillingDetailsRequest;
use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Model\Lpm\Ach;
use Paysafe\PhpSdk\Model\Lpm\Bacs;
use Paysafe\PhpSdk\Model\Lpm\Eft;
use Paysafe\PhpSdk\Model\Lpm\Sepa;

/**
 * CustomerPaymentHandleRequest
 */
class CustomerPaymentHandleRequest extends BaseModel
{

	private string $merchantRefNum;
	private string $customerIp;
	private CardBillingDetailsRequest $billingDetails;
	private string $billingDetailsId;
	private UpdateCustomerRequestCard $card;
	private int $amount;
	private string $currencyCode;
	private string $paymentHandleTokenFrom;
	private Eft $eft;
	private bool $dupCheck;
	private Ach $ach;
	private Bacs $bacs;
	private ?array $mandates = null;
	private Sepa $sepa;
	private string $paymentType;
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
	 * Builder function for customerIp
	 * 
	 * @param string $customerIp
	 * 
	 * @return $this
	 */
	public function customerIp(string $customerIp): self
	{
		$this->setCustomerIp($customerIp);
		
		return $this;
	}

	/**
	 * Setter function for customerIp
	 * 
	 * @param string $customerIp
	 * 
	 * @return void
	 */
	public function setCustomerIp(string $customerIp): void
	{
		$this->customerIp = $customerIp;
	}

	/**
	 * This is the customer's IP address.
	 * 
	 * @return string
	 */
	public function getCustomerIp(): string
	{
		return $this->customerIp;
	}

	/**
	 * Builder function for billingDetails
	 * 
	 * @param CardBillingDetailsRequest $billingDetails
	 * 
	 * @return $this
	 */
	public function billingDetails(CardBillingDetailsRequest $billingDetails): self
	{
		$this->setBillingDetails($billingDetails);
		
		return $this;
	}

	/**
	 * Setter function for billingDetails
	 * 
	 * @param CardBillingDetailsRequest $billingDetails
	 * 
	 * @return void
	 */
	public function setBillingDetails(CardBillingDetailsRequest $billingDetails): void
	{
		$this->billingDetails = $billingDetails;
	}

	/**
	 * Customer's billing details
	 * 
	 * @return CardBillingDetailsRequest
	 */
	public function getBillingDetails(): CardBillingDetailsRequest
	{
		return $this->billingDetails;
	}

	/**
	 * Builder function for billingDetailsId
	 * 
	 * @param string $billingDetailsId
	 * 
	 * @return $this
	 */
	public function billingDetailsId(string $billingDetailsId): self
	{
		$this->setBillingDetailsId($billingDetailsId);
		
		return $this;
	}

	/**
	 * Setter function for billingDetailsId
	 * 
	 * @param string $billingDetailsId
	 * 
	 * @return void
	 */
	public function setBillingDetailsId(string $billingDetailsId): void
	{
		$this->billingDetailsId = $billingDetailsId;
	}

	/**
	 * This is the ID returned in the response to the [address creation request](/operations/create-address).
	 * 
	 * @return string
	 */
	public function getBillingDetailsId(): string
	{
		return $this->billingDetailsId;
	}

	/**
	 * Builder function for card
	 * 
	 * @param UpdateCustomerRequestCard $card
	 * 
	 * @return $this
	 */
	public function card(UpdateCustomerRequestCard $card): self
	{
		$this->setCard($card);
		
		return $this;
	}

	/**
	 * Setter function for card
	 * 
	 * @param UpdateCustomerRequestCard $card
	 * 
	 * @return void
	 */
	public function setCard(UpdateCustomerRequestCard $card): void
	{
		$this->card = $card;
	}

	/**
	 * Card details to be used for the transaction
	 * 
	 * @return UpdateCustomerRequestCard
	 */
	public function getCard(): UpdateCustomerRequestCard
	{
		return $this->card;
	}

	/**
	 * Builder function for amount
	 * 
	 * @param int $amount
	 * 
	 * @return $this
	 */
	public function amount(int $amount): self
	{
		$this->setAmount($amount);
		
		return $this;
	}

	/**
	 * Setter function for amount
	 * 
	 * @param int $amount
	 * 
	 * @return void
	 */
	public function setAmount(int $amount): void
	{
		$this->amount = $amount;
	}

	/**
	 * This is the amount of the request, in minor units. For example, to process US $10.99,
     * this value  should be 1099.
	 * <b>Note:<b> The amount specified in the Payment request must match the amount specified
     * in the Payment Handle request
	 * from which the paymentHandleToken is taken.
	 * maximum: 99999999999
	 * 
	 * @return int
	 */
	public function getAmount(): int
	{
		return $this->amount;
	}

	/**
	 * Builder function for currencyCode
	 * 
	 * @param string $currencyCode
	 * 
	 * @return $this
	 */
	public function currencyCode(string $currencyCode): self
	{
		$this->setCurrencyCode($currencyCode);
		
		return $this;
	}

	/**
	 * Setter function for currencyCode
	 * 
	 * @param string $currencyCode
	 * 
	 * @return void
	 */
	public function setCurrencyCode(string $currencyCode): void
	{
		$this->currencyCode = $currencyCode;
	}

	/**
	 * This is the currency of the merchant account.
	 * 
	 * @return string
	 */
	public function getCurrencyCode(): string
	{
		return $this->currencyCode;
	}

	/**
	 * Builder function for paymentHandleTokenFrom
	 * 
	 * @param string $paymentHandleTokenFrom
	 * 
	 * @return $this
	 */
	public function paymentHandleTokenFrom(string $paymentHandleTokenFrom): self
	{
		$this->setPaymentHandleTokenFrom($paymentHandleTokenFrom);
		
		return $this;
	}

	/**
	 * Setter function for paymentHandleTokenFrom
	 * 
	 * @param string $paymentHandleTokenFrom
	 * 
	 * @return void
	 */
	public function setPaymentHandleTokenFrom(string $paymentHandleTokenFrom): void
	{
		$this->paymentHandleTokenFrom = $paymentHandleTokenFrom;
	}

	/**
	 * This is an existing Customer Payment Handle, from which the payment instrument
     * and profile details are retrieved.
	 * If this parameter is included you can omit the billingDetails object.
	 * 
	 * @return string
	 */
	public function getPaymentHandleTokenFrom(): string
	{
		return $this->paymentHandleTokenFrom;
	}

	/**
	 * Builder function for eft
	 * 
	 * @param Eft $eft
	 * 
	 * @return $this
	 */
	public function eft(Eft $eft): self
	{
		$this->setEft($eft);
		
		return $this;
	}

	/**
	 * Setter function for eft
	 * 
	 * @param Eft $eft
	 * 
	 * @return void
	 */
	public function setEft(Eft $eft): void
	{
		$this->eft = $eft;
	}

	/**
	 * Details of the EFT account to be used for the transaction
	 * 
	 * @return Eft
	 */
	public function getEft(): Eft
	{
		return $this->eft;
	}

	/**
	 * Builder function for dupCheck
	 * 
	 * @param bool $dupCheck
	 * 
	 * @return $this
	 */
	public function dupCheck(bool $dupCheck): self
	{
		$this->setDupCheck($dupCheck);
		
		return $this;
	}

	/**
	 * Setter function for dupCheck
	 * 
	 * @param bool $dupCheck
	 * 
	 * @return void
	 */
	public function setDupCheck(bool $dupCheck): void
	{
		$this->dupCheck = $dupCheck;
	}

	/**
	 * Get dupCheck
	 * 
	 * @return bool
	 */
	public function getDupCheck(): bool
	{
		return $this->dupCheck;
	}

	/**
	 * Builder function for ach
	 * 
	 * @param Ach $ach
	 * 
	 * @return $this
	 */
	public function ach(Ach $ach): self
	{
		$this->setAch($ach);
		
		return $this;
	}

	/**
	 * Setter function for ach
	 * 
	 * @param Ach $ach
	 * 
	 * @return void
	 */
	public function setAch(Ach $ach): void
	{
		$this->ach = $ach;
	}

	/**
	 * Details of the ach account to be used for the transaction.
	 * 
	 * @return Ach
	 */
	public function getAch(): Ach
	{
		return $this->ach;
	}

	/**
	 * Builder function for bacs
	 * 
	 * @param Bacs $bacs
	 * 
	 * @return $this
	 */
	public function bacs(Bacs $bacs): self
	{
		$this->setBacs($bacs);
		
		return $this;
	}

	/**
	 * Setter function for bacs
	 * 
	 * @param Bacs $bacs
	 * 
	 * @return void
	 */
	public function setBacs(Bacs $bacs): void
	{
		$this->bacs = $bacs;
	}

	/**
	 * Details of the bacs account to be used for the transaction.
	 * 
	 * @return Bacs
	 */
	public function getBacs(): Bacs
	{
		return $this->bacs;
	}

	/**
	 * Builder function for mandates
	 * 
	 * @param Mandate[] $mandates
	 * 
	 * @return $this
	 */
	public function mandates(array $mandates): self
	{
		$this->setMandates($mandates);
		
		return $this;
	}

	/**
	 * Setter function for mandates
	 * 
	 * @param Mandate[] $mandates
	 * 
	 * @return void
	 */
	public function setMandates(array $mandates): void
	{
		$this->mandates = $mandates;
	}

	/**
	 * Get mandates
	 * 
	 * @return Mandate[]|null
	 */
	public function getMandates(): array
	{
		return $this->mandates;
	}

	/**
	 * Add new mandatesItem
	 * 
	 * @param Mandate $mandatesItem
	 * 
	 * @return $this
	 */
	public function addMandatesItem(Mandate $mandatesItem): self
	{
		if ($this->mandates === null) {
			$this->setMandates([$mandatesItem]);
			
			return $this;
		}
		
		$mandates = $this->getMandates();
		$mandates[] = $mandatesItem;
		$this->setMandates($mandates);
		
		return $this;
	}

	/**
	 * Remove mandatesItem
	 * 
	 * @param Mandate $mandatesItem
	 * 
	 * @return $this
	 */
	public function removeMandatesItem(Mandate $mandatesItem): self
	{
		$this->setMandates(array_diff($this->getMandates(), [$mandatesItem]));
		
		return $this;
	}

	/**
	 * Builder function for sepa
	 * 
	 * @param Sepa $sepa
	 * 
	 * @return $this
	 */
	public function sepa(Sepa $sepa): self
	{
		$this->setSepa($sepa);
		
		return $this;
	}

	/**
	 * Setter function for sepa
	 * 
	 * @param Sepa $sepa
	 * 
	 * @return void
	 */
	public function setSepa(Sepa $sepa): void
	{
		$this->sepa = $sepa;
	}

	/**
	 * These are the details of the sepa account used for the transaction.
	 * 
	 * @return Sepa
	 */
	public function getSepa(): Sepa
	{
		return $this->sepa;
	}

	/**
	 * Builder function for paymentType
	 * 
	 * @param string $paymentType
	 * 
	 * @return $this
	 */
	public function paymentType(string $paymentType): self
	{
		$this->setPaymentType($paymentType);
		
		return $this;
	}

	/**
	 * Setter function for paymentType
	 * 
	 * @param string $paymentType
	 * 
	 * @return void
	 */
	public function setPaymentType(string $paymentType): void
	{
		$this->paymentType = $paymentType;
	}

	/**
	 * This is the payment type.
	 * 
	 * @return string
	 */
	public function getPaymentType(): string
	{
		return $this->paymentType;
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
		return "class CustomerPaymentHandleRequest {" . PHP_EOL
			. "    merchantRefNum: " . $this->toIndentedString($this->merchantRefNum) . PHP_EOL
			. "    customerIp: " . $this->toIndentedString($this->customerIp) . PHP_EOL
			. "    billingDetails: " . $this->toIndentedString($this->billingDetails) . PHP_EOL
			. "    billingDetailsId: " . $this->toIndentedString($this->billingDetailsId) . PHP_EOL
			. "    card: " . $this->toIndentedString($this->card) . PHP_EOL
			. "    amount: " . $this->toIndentedString($this->amount) . PHP_EOL
			. "    currencyCode: " . $this->toIndentedString($this->currencyCode) . PHP_EOL
			. "    paymentHandleTokenFrom: " . $this->toIndentedString($this->paymentHandleTokenFrom) . PHP_EOL
			. "    eft: " . $this->toIndentedString($this->eft) . PHP_EOL
			. "    dupCheck: " . $this->toIndentedString($this->dupCheck) . PHP_EOL
			. "    ach: " . $this->toIndentedString($this->ach) . PHP_EOL
			. "    bacs: " . $this->toIndentedString($this->bacs) . PHP_EOL
			. "    mandates: " . $this->toIndentedString($this->mandates) . PHP_EOL
			. "    sepa: " . $this->toIndentedString($this->sepa) . PHP_EOL
			. "    paymentType: " . $this->toIndentedString($this->paymentType) . PHP_EOL
			. "    additionalParameters: " . $this->toIndentedString($this->additionalParameters) . PHP_EOL
			. "}";
	}
}
