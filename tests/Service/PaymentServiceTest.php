<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Card\MerchantDescriptor;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\AirlineTicket;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\AirlineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\Passenger;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\Passengers;
use Paysafe\PhpSdk\Model\Payment\PaymentRequest;
use Paysafe\PhpSdk\Service\PaymentService;

class PaymentServiceTest extends BasePaysafeService
{
    const PAYMENT_ENDPOINT = "/paymenthub/v1/payments";
    const PAYMENT_ID = "3aeb9c63-6386-46a3-9f8e-f452e722228a";
    const MERCHANT_REF_NUM = "MerchantRefNum-145";

    private PaymentService $paymentService;

    public function setUp(): void
    {
        parent::setUp();

        $this->paymentService = new PaymentService($this->paysafeApiClient);
    }

    /**
     * @return AirlineTravelDetails
     */
    private function createAirlineTravelDetails(): AirlineTravelDetails
    {
        return (new AirlineTravelDetails())
            ->passengerName("John Smith")
            ->departureDate("2023-05-25")
            ->origin("YUL")
            ->customerReferenceNumber("123456")
            ->passengerNameRecord("passNamRec")
            ->additionalBookingReference("additionalBookingRef")
            ->totalFare(1000)
            ->totalFee(100)
            ->totalTaxes(10)
            ->ticket((new AirlineTicket())
                ->ticketNumber("198J8928")
                ->isRestrictedTicket(false))
            ->passengers((new Passengers())
                ->passenger1((new Passenger())
                    ->ticketNumber("56827")
                    ->firstName("Suzy")
                    ->lastName("Doe")
                    ->phoneNumber("7181855783")
                    ->passengerCode("INF")
                    ->gender('M'))
                ->passenger2((new Passenger())
                    ->ticketNumber("56828")
                    ->firstName("John")
                    ->lastName("Doe")
                    ->phoneNumber("7181855785")
                    ->passengerCode("INF")
                    ->gender('M')
                )
            );
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentById
     *
     * @return void
     */
    public function testGetPaymentById_isSuccessful(): void
    {
        $paymentService = clone $this->paymentService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('payment/get_payment_by_id_response.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
        $doReplaceService();

        $response = $paymentService->getPaymentById(self::PAYMENT_ID);

        $this->assertNotNull($response);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentById
     *
     * @return void
     */
    public function testGetPaymentById_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $paymentService = clone $this->paymentService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        403,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/403_unauthorized_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
            $doReplaceService();

            $paymentService->getPaymentById(self::PAYMENT_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals("5270", $exception->getError()->getCode());
            $this->assertEquals("Unauthorized access", $exception->getError()->getMessage());
            $this->assertEquals(
                "The credentials do not have permission to access the requested data.",
                $exception->getError()->getDetails()[0]
            );
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentById
     *
     * @return void
     */
    public function testGetPaymentById_throwsExceptionOnInvalidCredentialsError(): void
    {
        try {
            $paymentService = clone $this->paymentService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        401,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/401_invalid_credentials_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
            $doReplaceService();

            $paymentService->getPaymentById(self::PAYMENT_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(401, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertEquals("5279", $exception->getError()->getCode());
            $this->assertEquals("Invalid credentials", $exception->getError()->getMessage());
            $this->assertEquals(
                "The authentication credentials are invalid.",
                $exception->getError()->getDetails()[0]
            );
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentById
     *
     * @return void
     */
    public function testGetPaymentById_throwsPaysafeSdkExceptionOnIOError(): void
    {
        try {
            $paymentService = clone $this->paymentService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(400)
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
            $doReplaceService();

            $paymentService->getPaymentById(self::PAYMENT_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->assertEquals(400, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertNull($exception->getError());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentsUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetPaymentsUsingMerchantReferenceNumber_isSuccessful(): void
    {
        $paymentService = clone $this->paymentService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('payment/get_payment_using_merchant_ref_number_response.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
        $doReplaceService();

        $response = $paymentService->getPaymentsUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

        $this->assertNotNull($response);
        $this->assertNotNull($response->getMeta());
        $this->assertNotNull($response->getPayments());
        $this->assertNotEmpty($response->getPayments());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentsUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetPaymentsUsingMerchantReferenceNumber_throwsExceptionOnInvalidCredentialsError(): void
    {
        try {
            $paymentService = clone $this->paymentService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        401,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/401_invalid_credentials_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
            $doReplaceService();

            $paymentService->getPaymentsUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(401, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertEquals("5279", $exception->getError()->getCode());
            $this->assertEquals("Invalid credentials", $exception->getError()->getMessage());
            $this->assertEquals(
                "The authentication credentials are invalid.",
                $exception->getError()->getDetails()[0]
            );
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentsUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetPaymentsUsingMerchantReferenceNumber_throwsPaysafeSdkExceptionOnIOError(): void
    {
        try {
            $paymentService = clone $this->paymentService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(400)
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
            $doReplaceService();

            $paymentService->getPaymentsUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->assertEquals(400, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertNull($exception->getError());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::getPaymentsUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetPaymentsUsingMerchantReferenceNumber_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $paymentService = clone $this->paymentService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        403,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/403_unauthorized_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
            $doReplaceService();

            $paymentService->getPaymentsUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(403, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertEquals("5270", $exception->getError()->getCode());
            $this->assertEquals("Unauthorized access", $exception->getError()->getMessage());
            $this->assertEquals(
                "The credentials do not have permission to access the requested data.",
                $exception->getError()->getDetails()[0]
            );
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::cancelPayment
     *
     * @return void
     */
    public function testCancelPayment_isSuccessful(): void
    {
        $paymentService = clone $this->paymentService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePut')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('payment/cancel_payment_response.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
        $doReplaceService();

        $cancelPaymentRequest = (new CancelRequest())->status('CANCELLED');
        $response = $paymentService->cancelPayment(self::PAYMENT_ID, $cancelPaymentRequest);

        $this->assertNotNull($response);
        $this->assertEquals(self::PAYMENT_ID, $response->getId());
        $this->assertEquals("CANCELLED", $response->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::cancelPayment
     *
     * @return void
     */
    public function testCancelPayment_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $paymentService = clone $this->paymentService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePut')
                ->willReturn(
                    new Response(
                        403,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/403_unauthorized_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
            $doReplaceService();

            $cancelPaymentRequest = (new CancelRequest())->status('CANCELLED');
            $response = $paymentService->cancelPayment(self::PAYMENT_ID, $cancelPaymentRequest);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(403, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertEquals("5270", $exception->getError()->getCode());
            $this->assertEquals("Unauthorized access", $exception->getError()->getMessage());
            $this->assertEquals(
                "The credentials do not have permission to access the requested data.",
                $exception->getError()->getDetails()[0]
            );
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::cancelPayment
     *
     * @return void
     */
    public function testCancelPayment_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $paymentService = clone $this->paymentService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePut')
                ->willReturn(
                    new Response(
                        404,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json("error/404_entity_not_found_response.json")
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
            $doReplaceService();

            $cancelPaymentRequest = (new CancelRequest())->status('CANCELLED');
            $response = $paymentService->cancelPayment(self::PAYMENT_ID, $cancelPaymentRequest);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
            $this->assertEquals(
                "The ID(s) specified in the URL do not correspond to the values in the system.",
                $exception->getError()->getDetails()[0]
            );
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::cancelPayment
     *
     * @return void
     */
    public function testCancelPayment_throwsPaysafeSdkExceptionOnIOError(): void
    {
        try {
            $paymentService = clone $this->paymentService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePut')
                ->willReturn(
                    new Response(400)
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
            $doReplaceService();

            $cancelPaymentRequest = (new CancelRequest())->status('CANCELLED');
            $response = $paymentService->cancelPayment(self::PAYMENT_ID, $cancelPaymentRequest);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->assertEquals(400, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertNull($exception->getError());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::processPayment
     *
     * @return void
     */
    public function testProcessPayment_isSuccessful(): void
    {
        $paymentService = clone $this->paymentService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('payment/process_payment_card_with_airline_travel_details_response.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
        $doReplaceService();

        $paymentRequest = (new PaymentRequest())
            ->merchantRefNum("fc5b62df1202e491475d")
            ->amount(500)
            ->settleWithAuth(true)
            ->paymentHandleToken("SC2INoYvSe2MzQuB")
            ->customerIp("172->0->0->1")
            ->currencyCode("USD")
            ->merchantDescriptor(
                (new MerchantDescriptor())
                    ->dynamicDescriptor("100,test")
                    ->phone("1000000000")
            )
            ->airlineTravelDetails($this->createAirlineTravelDetails())
            ->merchantRefNum("fc5b62df1202e491475d")
            ->amount(500)
            ->settleWithAuth(true)
            ->paymentHandleToken("SC2INoYvSe2MzQuB")
            ->customerIp("172->0->0->1")
            ->currencyCode("USD")
            ->preAuth(false);

        $response = $paymentService->processPayment($paymentRequest);

        $this->assertNotNull($response);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::processPayment
     *
     * @return void
     */
    public function testProcessPayment_throwsExceptionOnInvalidCredentialsError(): void
    {
        try {
            $paymentService = clone $this->paymentService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePost')
                ->willReturn(
                    new Response(
                        401,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/401_invalid_credentials_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
            $doReplaceService();

            $paymentService->processPayment(new PaymentRequest());

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(401, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertEquals("5279", $exception->getError()->getCode());
            $this->assertEquals("Invalid credentials", $exception->getError()->getMessage());
            $this->assertEquals(
                "The authentication credentials are invalid.",
                $exception->getError()->getDetails()[0]
            );
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::processPayment
     *
     * @return void
     */
    public function testProcessPayment_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $paymentService = clone $this->paymentService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePost')
                ->willReturn(
                    new Response(
                        403,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->get_resource_json('error/403_unauthorized_response.json')
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
            $doReplaceService();

            $paymentService->processPayment(new PaymentRequest());

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(403, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertEquals("5270", $exception->getError()->getCode());
            $this->assertEquals("Unauthorized access", $exception->getError()->getMessage());
            $this->assertEquals(
                "The credentials do not have permission to access the requested data.",
                $exception->getError()->getDetails()[0]
            );
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::processPayment
     *
     * @return void
     */
    public function testProcessPayment_throwsApiConnectionException(): void
    {
        try {
            $paymentService = clone $this->paymentService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePost')
                ->willReturn(
                    new Response(400)
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($paymentService, PaymentService::class);
            $doReplaceService();

            $paymentService->processPayment(new PaymentRequest());

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->assertEquals(400, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertNull($exception->getError());
        }
    }
}
