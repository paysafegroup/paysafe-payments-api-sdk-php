<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Settlement\SettlementRequest;
use Paysafe\PhpSdk\Service\SettlementService;

class SettlementServiceTest extends BasePaysafeService
{
    const PAYMENT_SETTLEMENT_ENDPOINT = "/paymenthub/v1/payments/%s/settlements";
    const SETTLEMENT_ENDPOINT = "/paymenthub/v1/settlements";

    const PAYMENT_ID = "9b84dedd-2a92-47bf-a8ee-131e2d898105";
    const SETTLEMENT_ID = "25f6dadf-176a-415f-95c9-6ff39ff697ba";
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
                    $this->get_resource_json('settlement/process_settlement_card_response.json')
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
        $this->assertEquals("PENDING", $response->getStatus());
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
                        $this->get_resource_json('error/403_unauthorized_response.json')
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
                        $this->get_resource_json('error/401_invalid_credentials_response.json')
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
                    $this->get_resource_json('settlement/get_settlement_by_id_response.json')
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
                        $this->get_resource_json('error/403_unauthorized_response.json')
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
                        $this->get_resource_json('error/401_invalid_credentials_response.json')
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
                    $this->get_resource_json('settlement/get_settlement_using_merchant_ref_number_response.json')
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
                        $this->get_resource_json('error/401_invalid_credentials_response.json')
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
                        $this->get_resource_json('error/403_unauthorized_response.json')
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
                    $this->get_resource_json('settlement/cancel_settlement_response.json')
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
                        $this->get_resource_json('error/401_invalid_credentials_response.json')
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
                        $this->get_resource_json('error/403_unauthorized_response.json')
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
}
