<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Card\MerchantDescriptor;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\AirlineTravelDetails;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\Passenger;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\Passengers;
use Paysafe\PhpSdk\Model\Common\Travel\Airline\Ticket;
use Paysafe\PhpSdk\Model\Payment\PaymentRequest;
use Paysafe\PhpSdk\Service\PaymentService;

class PaymentServiceTest extends BasePaysafeTest
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
            ->ticket((new Ticket())
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
                    $this->mockResponse()
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
                        self::UNAUTHORIZED_ACCESS_ERROR_RESPONSE
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
                        self::INVALID_CREDENTIALS_ERROR_RESPONSE
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
                    $this->mockGetPaymentByMerchantRefNumResponse()
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
                        self::INVALID_CREDENTIALS_ERROR_RESPONSE
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
                        self::UNAUTHORIZED_ACCESS_ERROR_RESPONSE
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
                    $this->mockCancelResponse()
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
                        self::UNAUTHORIZED_ACCESS_ERROR_RESPONSE
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
                        self::ENTITY_NOT_FOUND_ERROR_RESPONSE
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
                    $this->mockProcessPaymentResponse()
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
                        self::INVALID_CREDENTIALS_ERROR_RESPONSE
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
                        self::UNAUTHORIZED_ACCESS_ERROR_RESPONSE
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

    /**
     * @return string
     */
    private function mockResponse(): string
    {
        return "{\n" .
            "  \"id\": \"3aeb9c63-6386-46a3-9f8e-f452e722228a\",\n" .
            "  \"availableToSettle\": 1900,\n" .
            "  \"childAccountNum\": \"123456789\",\n" .
            "  \"txnTime\": \"2023-01-27T10:14:26Z\",\n" .
            "  \"paymentType\": \"CARD\",\n" .
            "  \"status\": \"COMPLETED\",\n" .
            "  \"riskReasonCode\": [101, 102],\n" .
            "  \"settlements\": [\n" .
            "    {\n" .
            "      \"id\": \"25f6dadf-176a-415f-95c9-6ff39ff697ba\",\n" .
            "      \"paymentType\": \"CARD\",\n" .
            "      \"availableToRefund\": 500,\n" .
            "      \"childAccountNum\": \"3216549877\",\n" .
            "      \"txnTime\": " . strtotime("2023-01-27T10:14:26Z") . ",\n" .
            "      \"status\": \"COMPLETED\"\n" .
            "    }\n" .
            "  ],\n" .
            "  \"error\": null,\n" .
            "  \"statusReason\": \"None\",\n" .
            "  \"authentication\": {\n" .
            "    \"exemptionIndicator\": \"LOW_VALUE_EXEMPTION\"\n" .
            "  },\n" .
            "  \"gatewayReconciliationId\": \"a5c80e61-e747-455f-843d-2b9526f9963e\",\n" .
            "  \"updatedTime\": \"2023-01-27T10:14:26Z\",\n" .
            "  \"statusTime\": \"2023-01-27T10:14:26Z\",\n" .
            "  \"availableToRefund\": 1900,\n" .
            "  \"processingRails\": \"PINLESS\"," .
            "  \"returnLinks\":\n" .
            "    [{\n" .
            "      \"rel\": \"default\",\n" .
            "      \"href\": \"https://usgaminggamblig.com/payment/return/\"\n" .
            "    }]\n" .
            "  ,\n" .
            "  \"liveMode\": true,\n" .
            "  \"billingDetails\": {\n" .
            "    \"nickName\": \"Home\",\n" .
            "    \"street\": \"TEST\",\n" .
            "    \"city\": \"CA\",\n" .
            "    \"zip\": \"94404\",\n" .
            "    \"state\": \"CA\",\n" .
            "    \"country\": \"US\"\n" .
            "  },\n" .
            "  \"customerProfile\": {\n" .
            "    \"merchantCustomerId\": \"abc123\",\n" .
            "    \"firstName\": \"John\",\n" .
            "    \"lastName\": \"Doe\",\n" .
            "    \"email\": \"john.doe@example.com\",\n" .
            "    \"phone\": \"1234567890\"\n" .
            "  },\n" .
            "  \"merchantRefNum\": \"fc5b62df1202e491475d\",\n" .
            "  \"amount\": 500,\n" .
            "  \"dupCheck\": true,\n" .
            "  \"settleWithAuth\": false,\n" .
            "  \"paymentHandleToken\": \"SC2INoYvSe2MzQuB\",\n" .
            "  \"customerIp\": \"10.195.93.117\",\n" .
            "  \"currencyCode\": \"USD\",\n" .
            "  \"card\": {\n" .
            "    \"cardExpiry\": {\n" .
            "      \"month\": \"10\",\n" .
            "      \"year\": \"2025\"\n" .
            "    },\n" .
            "    \"holderName\": \"Dilip\",\n" .
            "    \"cardType\": \"VI\",\n" .
            "    \"cardBin\": \"400000\",\n" .
            "    \"lastDigits\": \"1026\",\n" .
            "    \"cardCategory\": \"CREDIT\",\n" .
            "    \"issuingCountry\": \"US\"\n" .
            "  },\n" .
            "  \"threeDs\": {\n" .
            "    \"merchantUrl\": \"https://api.qa.paysafe.com/checkout/v2/index.html#/desktop\",\n" .
            "    \"deviceChannel\": \"BROWSER\",\n" .
            "    \"requestorChallengePreference\": \"NO_PREFERENCE\",\n" .
            "    \"messageCategory\": \"PAYMENT\",\n" .
            "    \"transactionIntent\": \"CHECK_ACCEPTANCE\",\n" .
            "    \"authenticationPurpose\": \"PAYMENT_TRANSACTION\"\n" .
            "  },\n" .
            "  \"paymentHandleTokenFrom\": \"existing_token\",\n" .
            "  \"transactionIntent\": \"BUY_WITH_CRYPTO\",\n" .
            "  \"gatewayResponse\": {\n" .
            "    \"authCode\": \"135880\",\n" .
            "    \"avsResponse\": \"MATCH\",\n" .
            "    \"cvvVerification\": \"MATCH\"\n" .
            "  }\n" .
            "}";
    }

    /**
     * @return string
     */
    private function mockGetPaymentByMerchantRefNumResponse(): string
    {
        return "{\n" .
            "  \"meta\": {\n" .
            "    \"numberOfRecords\": 1,\n" .
            "    \"limit\": 10,\n" .
            "    \"page\": 1\n" .
            "  },\n" .
            "  \"payments\": [\n" .
            "    {\n" .
            "      \"id\": \"3aeb9c63-6386-46a3-9f8e-f452e722228a\",\n" .
            "      \"availableToSettle\": 1900,\n" .
            "      \"childAccountNum\": \"123456789\",\n" .
            "      \"txnTime\": \"2023-01-27T10:14:26Z\",\n" .
            "      \"paymentType\": \"CARD\",\n" .
            "      \"status\": \"COMPLETED\",\n" .
            "      \"riskReasonCode\": [101, 102],\n" .
            "      \"settlements\": [\n" .
            "        {\n" .
            "          \"id\": \"25f6dadf-176a-415f-95c9-6ff39ff697ba\",\n" .
            "          \"paymentType\": \"CARD\",\n" .
            "          \"availableToRefund\": 500,\n" .
            "          \"childAccountNum\": \"3216549877\",\n" .
            "          \"txnTime\": " . strtotime("2023-01-27T10:14:26Z") . ",\n" .
            "          \"status\": \"COMPLETED\"\n" .
            "        }\n" .
            "      ],\n" .
            "      \"error\": null,\n" .
            "      \"statusReason\": \"None\",\n" .
            "      \"authentication\": {\n" .
            "        \"exemptionIndicator\": \"LOW_VALUE_EXEMPTION\"\n" .
            "      },\n" .
            "      \"gatewayReconciliationId\": \"a5c80e61-e747-455f-843d-2b9526f9963e\",\n" .
            "      \"updatedTime\": \"2023-01-27T10:14:26Z\",\n" .
            "      \"statusTime\": \"2023-01-27T10:14:26Z\",\n" .
            "      \"availableToRefund\": 1900,\n" .
            "      \"processingRails\": \"PINLESS\",\n" .
            "      \"links\": \n" .
            "        {\n" .
            "          \"rel\": \"default\",\n" .
            "          \"href\": \"https://usgaminggamblig.com/payment/return/\"\n" .
            "        }\n" .
            "      ,\n" .
            "      \"liveMode\": true,\n" .
            "      \"billingDetails\": {\n" .
            "        \"nickName\": \"Home\",\n" .
            "        \"street\": \"TEST\",\n" .
            "        \"city\": \"CA\",\n" .
            "        \"zip\": \"94404\",\n" .
            "        \"state\": \"CA\",\n" .
            "        \"country\": \"US\"\n" .
            "      },\n" .
            "      \"customerProfile\": {\n" .
            "        \"merchantCustomerId\": \"abc123\",\n" .
            "        \"firstName\": \"John\",\n" .
            "        \"lastName\": \"Doe\",\n" .
            "        \"email\": \"john.doe@example.com\",\n" .
            "        \"phone\": \"1234567890\"\n" .
            "      },\n" .
            "      \"merchantRefNum\": \"fc5b62df1202e491475d\",\n" .
            "      \"amount\": 500,\n" .
            "      \"dupCheck\": true,\n" .
            "      \"settleWithAuth\": false,\n" .
            "      \"paymentHandleToken\": \"SC2INoYvSe2MzQuB\",\n" .
            "      \"customerIp\": \"10.195.93.117\",\n" .
            "      \"currencyCode\": \"USD\",\n" .
            "      \"card\": {\n" .
            "        \"cardExpiry\": {\n" .
            "          \"month\": \"10\",\n" .
            "          \"year\": \"2025\"\n" .
            "        },\n" .
            "        \"holderName\": \"Dilip\",\n" .
            "        \"cardType\": \"VI\",\n" .
            "        \"cardBin\": \"400000\",\n" .
            "        \"lastDigits\": \"1026\",\n" .
            "        \"cardCategory\": \"CREDIT\",\n" .
            "        \"issuingCountry\": \"US\",\n" .
            "        \"networkToken\": {\n" .
            "          \"bin\": \"400000\",\n" .
            "          \"lastDigits\": \"1026\",\n" .
            "          \"status\": \"INACTIVE\",\n" .
            "          \"expiry\": {\n" .
            "            \"month\": \"10\",\n" .
            "            \"year\": \"2025\"\n" .
            "          },\n" .
            "          \"cardArt\": {\n" .
            "            \"cardArtUrl\": ".
            "\"https://hosted.qa.ies.paysafe.cloud/networktoken/card-art/visa/example.png\",\n" .
            "            \"isCobranded\": false\n" .
            "          }\n" .
            "        },\n" .
            "        \"tokenType\": \"NETWORK_TOKEN\"\n" .
            "      },\n" .
            "      \"threeDs\": {\n" .
            "        \"merchantUrl\": \"https://api.qa.paysafe.com/checkout/v2/index.html#/desktop\",\n" .
            "        \"deviceChannel\": \"BROWSER\",\n" .
            "        \"requestorChallengePreference\": \"NO_PREFERENCE\",\n" .
            "        \"messageCategory\": \"PAYMENT\",\n" .
            "        \"transactionIntent\": \"CHECK_ACCEPTANCE\",\n" .
            "        \"authenticationPurpose\": \"PAYMENT_TRANSACTION\"\n" .
            "      },\n" .
            "      \"paymentHandleTokenFrom\": \"existing_token\",\n" .
            "      \"transactionIntent\": \"BUY_WITH_CRYPTO\",\n" .
            "      \"gatewayResponse\": {\n" .
            "        \"authCode\": \"135880\",\n" .
            "        \"avsResponse\": \"MATCH\",\n" .
            "        \"cvvVerification\": \"MATCH\"\n" .
            "      }\n" .
            "    }\n" .
            "  ]\n" .
            "}";
    }

    /**
     * @return string
     */
    private function mockCancelResponse(): string
    {
        return "{\n" .
            "  \"id\": \"3aeb9c63-6386-46a3-9f8e-f452e722228a\",\n" .
            "  \"txnTime\": \"2023-01-10T12:57:22Z\",\n" .
            "  \"status\": \"CANCELLED\"\n" .
            "}";
    }

    /**
     * @return string
     */
    private function mockProcessPaymentResponse(): string
    {
        return "{\n" .
            "  \"id\": \"398e086d-f47b-4b3f-8a18-621e7ed35378\",\n" .
            "  \"paymentType\": \"CARD\",\n" .
            "  \"paymentHandleToken\": \"SC2INoYvSe2MzQuB\",\n" .
            "  \"merchantRefNum\": \"fc5b62df1202e491475d\",\n" .
            "  \"currencyCode\": \"USD\",\n" .
            "  \"settleWithAuth\": true,\n" .
            "  \"txnTime\": \"2023-01-27T10:15:29Z\",\n" .
            "  \"billingDetails\": {\n" .
            "    \"nickName\": \"Home\",\n" .
            "    \"street\": \"TEST\",\n" .
            "    \"city\": \"CA\",\n" .
            "    \"zip\": \"94404\",\n" .
            "    \"state\": \"CA\",\n" .
            "    \"country\": \"US\"\n" .
            "  },\n" .
            "  \"customerIp\": \"172.0.0.1\",\n" .
            "  \"status\": \"COMPLETED\",\n" .
            "  \"amount\": 500,\n" .
            "  \"availableToSettle\": 0,\n" .
            "  \"gatewayResponse\": {\n" .
            "    \"code\": \"VPS\",\n" .
            "    \"responseCode\": \"00\",\n" .
            "    \"description\": \"Approved and completed\",\n" .
            "    \"avsCode\": \"X\",\n" .
            "    \"authCode\": \"130416\",\n" .
            "    \"avsResponse\": \"MATCH\",\n" .
            "    \"cvvVerification\": \"MATCH\"\n" .
            "  },\n" .
            "  \"settlements\": [\n" .
            "    {\n" .
            "      \"merchantRefNum\": \"fc5b62df1202e491475d\",\n" .
            "      \"amount\": 500,\n" .
            "      \"id\": \"398e086d-f47b-4b3f-8a18-621e7ed35378\",\n" .
            "      \"availableToRefund\": 500,\n" .
            "      \"txnTime\": " . strtotime("2023-01-27T10:15:29Z") . ",\n" .
            "      \"status\": \"PENDING\"\n" .
            "    }\n" .
            "  ],\n" .
            "  \"card\": {\n" .
            "    \"cardExpiry\": {\n" .
            "      \"month\": \"10\",\n" .
            "      \"year\": \"2025\"\n" .
            "    },\n" .
            "    \"holderName\": \"Dilip\",\n" .
            "    \"cardType\": \"VI\",\n" .
            "    \"cardBin\": \"400000\",\n" .
            "    \"lastDigits\": \"1026\",\n" .
            "    \"cardCategory\": \"CREDIT\",\n" .
            "    \"issuingCountry\": \"US\"\n" .
            "  },\n" .
            "  \"airlineTravelDetails\": {\n" .
            "    \"passengerName\": \"John Smith\",\n" .
            "    \"departureDate\": \"2023-05-25\",\n" .
            "    \"origin\": \"YUL\",\n" .
            "    \"computerizedReservationSystem\": \"BLAN\",\n" .
            "    \"customerReferenceNumber\": \"123456\",\n" .
            "    \"passengerNameRecord\": \"passNamRec\",\n" .
            "    \"additionalBookingReference\": \"additionalBookingRef\",\n" .
            "    \"totalFare\": 1000,\n" .
            "    \"totalFee\": 100,\n" .
            "    \"totalTaxes\": 10,\n" .
            "    \"ticket\": {\n" .
            "      \"ticketNumber\": \"198J8928\",\n" .
            "      \"isRestrictedTicket\": false\n" .
            "    },\n" .
            "    \"passengers\": {\n" .
            "      \"passenger1\": {\n" .
            "        \"ticketNumber\": \"56827\",\n" .
            "        \"firstName\": \"firstName\",\n" .
            "        \"lastName\": \"lastName\",\n" .
            "        \"phoneNumber\": \"7181855783\",\n" .
            "        \"passengerCode\": \"INF\",\n" .
            "        \"gender\": \"M\"\n" .
            "      },\n" .
            "      \"passenger2\": {\n" .
            "        \"ticketNumber\": \"56827\",\n" .
            "        \"firstName\": \"firstName\",\n" .
            "        \"lastName\": \"lastName\",\n" .
            "        \"phoneNumber\": \"7181855783\",\n" .
            "        \"passengerCode\": \"INF\",\n" .
            "        \"gender\": \"M\"\n" .
            "      }\n" .
            "    },\n" .
            "    \"travelAgency\": {\n" .
            "      \"code\": \"AGCODE\",\n" .
            "      \"name\": \"Agency name\"\n" .
            "    },\n" .
            "    \"tripLegs\": {\n" .
            "      \"leg1\": {\n" .
            "        \"serviceClass\": \"F\",\n" .
            "        \"isStopOverAllowed\": false,\n" .
            "        \"destination\": \"CDG\",\n" .
            "        \"fareBasis\": \"VMAY\",\n" .
            "        \"departureDate\": \"2023-05-25\",\n" .
            "        \"serviceClassFee\": \"10\",\n" .
            "        \"departureAirport\": \"SOF\",\n" .
            "        \"departureDate\": \"2022-01-26T11:32:29Z\",\n" .
            "        \"arrivalTime\": \"2022-01-28T11:32:29Z\",\n" .
            "        \"conjunctionTicket\": \"T124\",\n" .
            "        \"couponNumber\": \"COUPON123\",\n" .
            "        \"notation\": \"sample\",\n" .
            "        \"taxes\": \"10\",\n" .
            "        \"flight\": {\n" .
            "          \"carrierCode\": \"TS\",\n" .
            "          \"flightNumber\": \"937\"\n" .
            "        }\n" .
            "      }\n" .
            "    }\n" .
            "  }\n" .
            "}";
    }
}
