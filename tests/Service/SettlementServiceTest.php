<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Settlement\Settlement;
use Paysafe\PhpSdk\Model\Settlement\SettlementRequest;
use Paysafe\PhpSdk\Service\SettlementService;

class SettlementServiceTest extends BasePaysafeTest
{
    const PAYMENT_SETTLEMENT_ENDPOINT = "/paymenthub/v1/payments/%s/settlements";
    const SETTLEMENT_ENDPOINT = "/paymenthub/v1/settlements";

    const PAYMENT_ID = "9b84dedd-2a92-47bf-a8ee-131e2d898105";
    const SETTLEMENT_ID = "8d951743-78e5-4fa5-aa15-2c42f0c05228";
    const MERCHANT_REF_NUM = "a9318b525273ee3cda79a2f947a9";

    private SettlementService $settlementService;

    public function setUp(): void
    {
        parent::setUp();

        $this->settlementService = new SettlementService($this->paysafeApiClient);
    }


    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\SettlementService::processSettlement
     *
     * @return void
     */
    public function testProcessSettlement_isSuccessful(): void
    {
        $settlementService = clone $this->settlementService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockSettlementResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
        $doReplaceService();

        $settlementRequest = (new SettlementRequest())
            ->merchantRefNum("test-merchantRefNum")
            ->amount(500);

        $response = $settlementService->processSettlement(self::PAYMENT_ID, $settlementRequest);

        $this->assertNotNull($response);
        $this->assertEquals(self::SETTLEMENT_ID, $response->getId());
        $this->assertEquals("COMPLETED", $response->getStatus());
        $this->assertEquals(500, $response->getAvailableToRefund());
    }


    /**
    * @test
    * @covers \Paysafe\PhpSdk\Service\SettlementService::processSettlement
    *
    * @return void
    */
    public function testProcessSettlement_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $settlementService = clone $this->settlementService;

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
            $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
            $doReplaceService();

            $settlementService->processSettlement(self::PAYMENT_ID, new SettlementRequest());

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
    * @covers \Paysafe\PhpSdk\Service\SettlementService::processSettlement
    *
    * @return void
    */
    public function testProcessSettlement_throwsExceptionOnInvalidCredentialsError(): void
    {
        try {
            $settlementService = clone $this->settlementService;

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
            $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
            $doReplaceService();

            $settlementService->processSettlement(self::PAYMENT_ID, new SettlementRequest());

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
    * @covers \Paysafe\PhpSdk\Service\SettlementService::processSettlement
    *
    * @return void
    */
    public function testProcessSettlement_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $settlementService = clone $this->settlementService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePost')
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
            $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
            $doReplaceService();

            $settlementService->processSettlement(self::PAYMENT_ID, new SettlementRequest());

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }


    /**
    * @test
    * @covers \Paysafe\PhpSdk\Service\SettlementService::processSettlement
    *
    * @return void
    */
    public function testProcessSettlement_throwsPaysafeSdkExceptionOnIOError(): void
    {
        try {
            $settlementService = clone $this->settlementService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePost')
                ->willReturn(
                    new Response(400)
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
            $doReplaceService();

            $settlementService->processSettlement(self::PAYMENT_ID, new SettlementRequest());

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->assertEquals($exception->getCode(), 400);
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertNull($exception->getError());
        }
    }


    /**
    * @test
    * @covers \Paysafe\PhpSdk\Service\SettlementService::getSettlementById
    *
    * @return void
    */
    public function testGetSettlementById_isSuccessful(): void
    {
        $settlementService = clone $this->settlementService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockSettlementResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
        $doReplaceService();

        $response = $settlementService->getSettlementById(self::SETTLEMENT_ID);

        $this->assertNotNull($response);
        $this->assertEquals(self::SETTLEMENT_ID, $response->getId());
    }


    /**
    * @test
    * @covers \Paysafe\PhpSdk\Service\SettlementService::getSettlementById
    *
    * @return void
    */
    public function testGetSettlementById_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $settlementService = clone $this->settlementService;

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
            $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
            $doReplaceService();

            $settlementService->getSettlementById(self::SETTLEMENT_ID);

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
    * @covers \Paysafe\PhpSdk\Service\SettlementService::getSettlementById
    *
    * @return void
    */
    public function testGetSettlementById_throwsExceptionOnInvalidCredentialsError(): void
    {
        try {
            $settlementService = clone $this->settlementService;

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
            $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
            $doReplaceService();

            $settlementService->getSettlementById(self::SETTLEMENT_ID);

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
    * @covers \Paysafe\PhpSdk\Service\SettlementService::getSettlementById
    *
    * @return void
    */
    public function testGetSettlementById_throwsPaysafeSdkExceptionOnIOError(): void
    {
        try {
            $settlementService = clone $this->settlementService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(400)
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
            $doReplaceService();

            $settlementService->getSettlementById(self::SETTLEMENT_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals($exception->getCode(), 400);
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertNull($exception->getError());
        }
    }


    /**
    * @test
    * @covers \Paysafe\PhpSdk\Service\SettlementService::getSettlementsUsingMerchantReferenceNumber
    *
    * @return void
    */
    public function testGetSettlementsByMerchantReferenceNumber_isSuccessful(): void
    {
        $settlementService = clone $this->settlementService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockGetSettlementsUsingMerchantReferenceNumberResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
        $doReplaceService();

        $response = $settlementService->getSettlementsUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

        $this->assertNotNull($response);
        $this->assertNotNull($response->getMeta());
        $this->assertNotNull($response->getSettlements());
        $this->assertNotEmpty($response->getSettlements());
    }


    /**
    * @test
    * @covers \Paysafe\PhpSdk\Service\SettlementService::getSettlementsUsingMerchantReferenceNumber
    *
    * @return void
    */
    public function testGetSettlementsByMerchantReferenceNumber_throwsExceptionOnInvalidCredentialsError(): void
    {
        try {
            $settlementService = clone $this->settlementService;

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
            $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
            $doReplaceService();

            $settlementService->getSettlementsUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

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
    * @covers \Paysafe\PhpSdk\Service\SettlementService::getSettlementsUsingMerchantReferenceNumber
    *
    * @return void
    */
    public function testGetSettlementsByMerchantReferenceNumber_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $settlementService = clone $this->settlementService;

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
            $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
            $doReplaceService();

            $settlementService->getSettlementsUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

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
    * @covers \Paysafe\PhpSdk\Service\SettlementService::cancelSettlement
    *
    * @return void
    */
    public function testCancelSettlement_isSuccessful(): void
    {
        $settlementService = clone $this->settlementService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePut')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockCancelSettlementResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
        $doReplaceService();

        $cancelRequest = (new CancelRequest())->status('CANCELLED');
        $response = $settlementService->cancelSettlement(self::SETTLEMENT_ID, $cancelRequest);

        $this->assertNotNull($response);
        $this->assertEquals(self::SETTLEMENT_ID, $response->getId());
        $this->assertEquals("CANCELLED", $response->getStatus());
    }


    /**
    * @test
    * @covers \Paysafe\PhpSdk\Service\SettlementService::cancelSettlement
    *
    * @return void
    */
    public function testCancelSettlement_throwsExceptionOnInvalidCredentialsError(): void
    {
        try {
            $settlementService = clone $this->settlementService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePut')
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
            $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
            $doReplaceService();

            $cancelRequest = (new CancelRequest())->status('CANCELLED');
            $settlementService->cancelSettlement(self::SETTLEMENT_ID, $cancelRequest);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(401, $exception->getCode());
            $this->assertEquals("5279", $exception->getError()->getCode());
            $this->assertEquals("Invalid credentials", $exception->getError()->getMessage());
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }


    /**
    * @test
    * @covers \Paysafe\PhpSdk\Service\SettlementService::cancelSettlement
    *
    * @return void
    */
    public function testCancelSettlement_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $settlementService = clone $this->settlementService;

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
            $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
            $doReplaceService();

            $cancelRequest = (new CancelRequest())->status('CANCELLED');
            $settlementService->cancelSettlement(self::SETTLEMENT_ID, $cancelRequest);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(403, $exception->getCode());
            $this->assertEquals("5270", $exception->getError()->getCode());
            $this->assertEquals("Unauthorized access", $exception->getError()->getMessage());
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }


    /**
    * @test
    * @covers \Paysafe\PhpSdk\Service\SettlementService::cancelSettlement
    *
    * @return void
    */
    public function testCancelSettlement_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $settlementService = clone $this->settlementService;

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
            $doReplaceService = $replaceService->bindTo($settlementService, SettlementService::class);
            $doReplaceService();

            $cancelRequest = (new CancelRequest())->status('CANCELLED');
            $settlementService->cancelSettlement('invalid-settlement-id', $cancelRequest);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @return string
     */
    private function mockSettlementResponse(): string
    {
        return "{\n" .
        "  \"id\": \"" . self::SETTLEMENT_ID . "\",\n" .
        "  \"paymentType\": \"CARD\",\n" .
        "  \"availableToRefund\": 500,\n" .
        "  \"childAccountNum\": \"3216549877\",\n" .
        "  \"txnTime\": " . strtotime("2023-01-27T10:14:26Z") . ",\n" .
        "  \"status\": \"COMPLETED\",\n" .
        "  \"merchantRefNum\": \"test-merchantRefNum\",\n" .
        "  \"amount\": 500,\n" .
        "  \"dupCheck\": true\n" .
        "}";
    }

    /**
     * @return string
     */
    private function mockSettlementGetResponse(): string
    {
        return "{\n" .
        "  \"id\": \"" . self::SETTLEMENT_ID . "\",\n" .
        "  \"paymentType\": \"PAYSAFECARD\",\n" .
        "  \"merchantRefNum\": \"dc48762fb7c30c2ae975754348e8\",\n" .
        "  \"txnTime\": " . strtotime("2023-01-20T04:35:19Z") . ",\n" .
        "  \"status\": \"COMPLETED\",\n" .
        "  \"gatewayReconciliationId\": \"adcf19cf-39c5-4eb4-a65d-7f50cd1aebd6\",\n" .
        "  \"amount\": 500,\n" .
        "  \"liveMode\": false,\n" .
        "  \"updatedTime\": \"2023-01-20T04:35:19Z\",\n" .
        "  \"statusTime\": \"2023-01-20T04:35:19Z\",\n" .
        "  \"availableToRefund\": 500,\n" .
        "  \"gatewayResponse\": {\n" .
        "    \"id\": \"adcf19cf-39c5-4eb4-a65d-7f50cd1aebd6\",\n" .
        "    \"processor\": \"PAYSAFECARD\"\n" .
        "  }\n" .
        "}";
    }

    /**
     * @return string
     */
    private function mockGetSettlementsUsingMerchantReferenceNumberResponse(): string
    {
        return "{\n" .
        "  \"meta\": {\n" .
        "    \"numberOfRecords\": 1,\n" .
        "    \"limit\": 10,\n" .
        "    \"page\": 1\n" .
        "  },\n" .
        "  \"settlements\": [\n" .
        "    {\n" .
        "      \"id\": \"8d951743-78e5-4fa5-aa15-2c42f0c05228\",\n" .
        "      \"paymentType\": \"PAYSAFECASH\",\n" .
        "      \"merchantRefNum\": \"a9318b525273ee3cda79a2f947a9\",\n" .
        "      \"currencyCode\": \"USD\",\n" .
        "      \"txnTime\": " . strtotime("2023-01-20T04:20:31Z") . ",\n" .
        "      \"status\": \"COMPLETED\",\n" .
        "      \"gatewayReconciliationId\": \"6eac96d8-b42e-4bc2-b0c8-b0cf19318113\",\n" .
        "      \"amount\": 500,\n" .
        "      \"liveMode\": false,\n" .
        "      \"updatedTime\": \"2023-01-20T04:20:31Z\",\n" .
        "      \"statusTime\": \"2023-01-20T04:20:31Z\",\n" .
        "      \"availableToRefund\": 500,\n" .
        "      \"gatewayResponse\": {\n" .
        "        \"id\": \"6eac96d8-b42e-4bc2-b0c8-b0cf19318113\",\n" .
        "        \"processor\": \"PAYSAFECASH\"\n" .
        "      }\n" .
        "    }\n" .
        "  ]\n" .
        "}";
    }

    /**
     * @return string
     */
    private function mockCancelSettlementResponse(): string
    {
        return "{\n" .
        "  \"id\": \"" . self::SETTLEMENT_ID . "\",\n" .
        "  \"txnTime\": \"2025-02-10T12:34:56Z\",\n" .
        "  \"status\": \"CANCELLED\"\n" .
        "}";
    }

}
