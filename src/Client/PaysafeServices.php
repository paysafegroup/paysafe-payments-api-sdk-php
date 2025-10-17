<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Client;

use Paysafe\PhpSdk\Service\CustomerAddressService;
use Paysafe\PhpSdk\Service\CustomerPaymentHandleService;
use Paysafe\PhpSdk\Service\CustomerService;
use Paysafe\PhpSdk\Service\CustomerSingleUseTokenService;
use Paysafe\PhpSdk\Service\LookUpPaymentMethodsService;
use Paysafe\PhpSdk\Service\MonitorService;
use Paysafe\PhpSdk\Service\OriginalCreditService;
use Paysafe\PhpSdk\Service\PaymentHandleService;
use Paysafe\PhpSdk\Service\PaymentService;
use Paysafe\PhpSdk\Service\RefundService;
use Paysafe\PhpSdk\Service\SettlementService;
use Paysafe\PhpSdk\Service\StandaloneCreditService;
use Paysafe\PhpSdk\Service\VerificationService;
use Paysafe\PhpSdk\Service\VoidAuthorizationService;

abstract class PaysafeServices
{
    protected PaysafeApiClient $paysafeApiClient;

    protected ?MonitorService $monitorService = null;
    protected ?LookUpPaymentMethodsService $lookUpPaymentMethodsService = null;
    protected ?PaymentHandleService $paymentHandleService = null;
    protected ?VerificationService $verificationService = null;
    protected ?VoidAuthorizationService $voidAuthorizationService = null;
    protected ?PaymentService $paymentService = null;
    protected ?SettlementService $settlementService = null;
    protected ?OriginalCreditService $originalCreditService = null;
    protected ?StandaloneCreditService $standaloneCreditService = null;
    protected ?CustomerService $customerService = null;
    protected ?CustomerAddressService $customerAddressService = null;
    protected ?CustomerPaymentHandleService $customerPaymentHandleService = null;
    protected ?CustomerSingleUseTokenService $customerSingleUseTokenService = null;
    protected ?RefundService $refundService = null;

    /**
     * Returns the MonitorService instance.
     *
     * @return MonitorService The MonitorService instance.
     */
    public function monitorService(): MonitorService
    {
        if ($this->monitorService === null) {
            $this->monitorService = new MonitorService($this->paysafeApiClient);
        }
        return $this->monitorService;
    }

    /**
     * Returns the LookUpPaymentMethodsService instance.
     *
     * @return LookUpPaymentMethodsService The LookUpPaymentMethodsService instance.
     */
    public function paymentMethodsService(): LookUpPaymentMethodsService
    {
        if ($this->lookUpPaymentMethodsService === null) {
            $this->lookUpPaymentMethodsService = new LookUpPaymentMethodsService($this->paysafeApiClient);
        }
        return $this->lookUpPaymentMethodsService;
    }

    /**
     * Returns the PaymentHandleService instance.
     *
     * @return PaymentHandleService The PaymentHandleService instance.
     */
    public function paymentHandleService(): PaymentHandleService
    {
        if ($this->paymentHandleService === null) {
            $this->paymentHandleService = new PaymentHandleService($this->paysafeApiClient);
        }
        return $this->paymentHandleService;
    }

    /**
     * Returns the VerificationService instance.
     *
     * @return VerificationService The VerificationService instance.
     */
    public function verificationService(): VerificationService
    {
        if ($this->verificationService === null) {
            $this->verificationService = new VerificationService($this->paysafeApiClient);
        }

        return $this->verificationService;
    }


    /**
     * Returns the PaymentService instance.
     * *
     * @return PaymentService
     */
    public function paymentService(): PaymentService
    {
        if ($this->paymentService == null) {
            $this->paymentService = new PaymentService($this->paysafeApiClient);
        }

        return $this->paymentService;
    }

    /**
     * Returns the VoidAuthorizationService instance.
     * *
     * @return VoidAuthorizationService
     */
    public function voidAuthorizationService(): VoidAuthorizationService
    {
        if ($this->voidAuthorizationService == null) {
            $this->voidAuthorizationService = new VoidAuthorizationService($this->paysafeApiClient);
        }

        return $this->voidAuthorizationService;
    }

    /**
     * Returns the SettlementService instance.
     * *
     * @return SettlementService
     */
    public function settlementService(): SettlementService
    {
        if ($this->settlementService == null) {
            $this->settlementService = new SettlementService($this->paysafeApiClient);
        }

        return $this->settlementService;
    }

    /**
     * Returns the OriginalCreditService() instance.
     * *
     * @return OriginalCreditService
     */
    public function originalCreditService(): OriginalCreditService
    {
        if ($this->originalCreditService == null) {
            $this->originalCreditService = new OriginalCreditService($this->paysafeApiClient);
        }

        return $this->originalCreditService;
    }

    /**
     * Returns the StandaloneCreditService() instance.
     * *
     * @return StandaloneCreditService
     */
    public function standaloneCreditService(): StandaloneCreditService
    {
        if ($this->standaloneCreditService == null) {
            $this->standaloneCreditService = new StandaloneCreditService($this->paysafeApiClient);
        }

        return $this->standaloneCreditService;
    }

    /**
     * Returns the CustomerService instance.
     * *
     * @return CustomerService
     */
    public function customerService(): CustomerService
    {
        if ($this->customerService == null) {
            $this->customerService = new CustomerService($this->paysafeApiClient);
        }

        return $this->customerService;
    }

    /**
     * Returns the CustomerAddressService instance.
     * *
     * @return CustomerAddressService
     */
    public function customerAddressService(): CustomerAddressService
    {
        if ($this->customerAddressService == null) {
            $this->customerAddressService = new CustomerAddressService($this->paysafeApiClient);
        }

        return $this->customerAddressService;
    }

    /**
     * Returns the CustomerPaymentHandleService instance.
     * *
     * @return CustomerPaymentHandleService
     */
    public function customerPaymentHandleService(): CustomerPaymentHandleService
    {
        if ($this->customerPaymentHandleService == null) {
            $this->customerPaymentHandleService = new CustomerPaymentHandleService($this->paysafeApiClient);
        }

        return $this->customerPaymentHandleService;
    }

    /**
     * Returns the CustomerSingleUseTokenService instance.
     * *
     * @return CustomerSingleUseTokenService
     */
    public function customerSingleUseTokenService(): CustomerSingleUseTokenService
    {
        if ($this->customerSingleUseTokenService == null) {
            $this->customerSingleUseTokenService = new CustomerSingleUseTokenService($this->paysafeApiClient);
        }

        return $this->customerSingleUseTokenService;
    }

    /**
     * Returns the RefundService instance.
     * *
     * @return RefundService
     */
    public function refundService(): RefundService
    {
        if ($this->refundService == null) {
            $this->refundService = new RefundService($this->paysafeApiClient);
        }

        return $this->refundService;
    }

}
