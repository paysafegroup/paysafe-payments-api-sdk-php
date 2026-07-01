<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;

use Exception;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandleRequest;
use Paysafe\PhpSdk\PaysafeClient;

class LpmPaymentHandlesE2eTest extends BasePaysafeE2e
{
    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        $configFile = realpath(__DIR__ . "/resources/application.properties");

        if (!file_exists($configFile)) {
            throw new Exception("Configuration file not found: application.properties");
        }

        $properties = parse_ini_file($configFile);
        $this->baseUrl = $properties['paysafe_base_url'] ?? '';
        $this->apiKey = $properties['paysafe_lpm_api_key'] ?? '';

        $this->paysafeClient = new PaysafeClient($this->apiKey);
        $this->paysafeClient->overrideBaseUrl($this->baseUrl);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function createPaymentHandle_skrill_isSuccessful(): void
    {
        /** @var PaymentHandleRequest $request */
        $request = $this->readObjectFromFile(
            "json/paymenthandle/create_paymenthandle_request_skrill.json",
            PaymentHandleRequest::class
        );
        $request->setMerchantRefNum((string)uniqid());

        $paymentHandle = $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);

        $this->assertNotNull($paymentHandle);
        $this->assertNotNull($paymentHandle->getId());
        $this->assertNotNull($paymentHandle->getPaymentHandleToken());
        $this->assertNotNull($paymentHandle->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function createPaymentHandle_neteller_isSuccessful(): void
    {
        /** @var PaymentHandleRequest $request */
        $request = $this->readObjectFromFile(
            "json/paymenthandle/create_paymenthandle_request_neteller.json",
            PaymentHandleRequest::class
        );
        $request->setMerchantRefNum((string)uniqid());

        $paymentHandle = $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);

        $this->assertNotNull($paymentHandle);
        $this->assertNotNull($paymentHandle->getId());
        $this->assertNotNull($paymentHandle->getPaymentHandleToken());
        $this->assertNotNull($paymentHandle->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function createPaymentHandle_paysafecash_isSuccessful(): void
    {
        /** @var PaymentHandleRequest $request */
        $request = $this->readObjectFromFile(
            "json/paymenthandle/create_paymenthandle_request_paysafecash.json",
            PaymentHandleRequest::class
        );
        $request->setMerchantRefNum((string)uniqid());

        $paymentHandle = $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);

        $this->assertNotNull($paymentHandle);
        $this->assertNotNull($paymentHandle->getId());
        $this->assertNotNull($paymentHandle->getPaymentHandleToken());
        $this->assertNotNull($paymentHandle->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function createPaymentHandle_paysafecard_isSuccessful(): void
    {
        /** @var PaymentHandleRequest $request */
        $request = $this->readObjectFromFile(
            "json/paymenthandle/create_paymenthandle_request_paysafecard.json",
            PaymentHandleRequest::class
        );
        $request->setMerchantRefNum((string)uniqid());

        $paymentHandle = $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);

        $this->assertNotNull($paymentHandle);
        $this->assertNotNull($paymentHandle->getId());
        $this->assertNotNull($paymentHandle->getPaymentHandleToken());
        $this->assertNotNull($paymentHandle->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentHandleService::createPaymentHandle
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function createPaymentHandle_paypal_isSuccessful(): void
    {
        /** @var PaymentHandleRequest $request */
        $request = $this->readObjectFromFile(
            "json/paymenthandle/create_paymenthandle_request_paypal.json",
            PaymentHandleRequest::class
        );
        $request->setMerchantRefNum((string)uniqid());

        $paymentHandle = $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);

        $this->assertNotNull($paymentHandle);
        $this->assertNotNull($paymentHandle->getId());
        $this->assertNotNull($paymentHandle->getPaymentHandleToken());
        $this->assertNotNull($paymentHandle->getStatus());
    }

}
