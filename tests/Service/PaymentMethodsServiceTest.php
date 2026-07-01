<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Service\PaymentMethodsService;

class PaymentMethodsServiceTest extends BasePaysafeService
{
    const PAYMENT_METHODS_ENDPOINT = "/paymenthub/v1/paymentmethods";

    private PaymentMethodsService $paymentMethodsService;

    public function setUp(): void
    {
        parent::setUp();

        $this->paymentMethodsService = new PaymentMethodsService($this->paysafeApiClient);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentMethodsService::lookUpPaymentMethods
     *
     * @return void
     */
    public function testLookUpPaymentMethods_isSuccessful(): void
    {
        $paymentMethodService = clone $this->paymentMethodsService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                  200,
                  [
                      'Content-Type' => 'application/json',
                  ],
                  $this->get_resource_json("payment_methods/payment_methods_response.json")
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentMethodService, PaymentMethodsService::class);
        $doReplaceService();

        $response = $paymentMethodService->lookUpPaymentMethods("USD");

        $this->assertCount(2, $response->getPaymentMethods());
        $this->assertEquals("USD", $response->getPaymentMethods()[0]->getCurrencyCode());
        $this->assertEquals("12345", $response->getPaymentMethods()[0]->getAccountId());
        $this->assertEquals('CARD', $response->getPaymentMethods()[0]->getPaymentMethod());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentMethodsService::lookUpPaymentMethods
     *
     * @return void
     */
    public function testLookUpPaymentMethods_throwsExceptionOnError(): void
    {
        try {
            $paymentMethodService = clone $this->paymentMethodsService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        400,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json("error/400_bad_request_invalid_currency_response.json")
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentMethodService, PaymentMethodsService::class);
            $doReplaceService();

            $paymentMethodService->lookUpPaymentMethods("INVALID");

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(400, $exception->getCode());
            $this->assertEquals("5001", $exception->getError()->getCode());
            $this->assertEquals("Invalid currency", $exception->getError()->getMessage());
            $this->assertEquals("currencyCode INVALID is not valid", $exception->getError()->getDetails()[0]);
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }
}
