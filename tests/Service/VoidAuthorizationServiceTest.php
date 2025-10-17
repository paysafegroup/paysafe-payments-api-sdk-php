<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\ExceptionBuilder;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Exception\RequestConflictException;
use Paysafe\PhpSdk\Model\VoidAuthorization\VoidAuthorizationRequest;
use Paysafe\PhpSdk\Service\VoidAuthorizationService;

class VoidAuthorizationServiceTest extends BasePaysafeTest
{
    const VOID_AUTHORIZATION_ENDPOINT = "/paymenthub/v1/payments/%s/voidauths";
    const VOID_AUTHORIZATION_GET_ENDPOINT = "/paymenthub/v1/voidauths";

    const PAYMENT_ID = "9b84f316-e120-4948-97f6-c97d5a305eb3";
    const VOID_ID = "8b84f316-e120-4948-97f6-c97d5a305ee5";
    const MERCHANT_REF_NUM = "a85c6ed15955adeed35e";

    private VoidAuthorizationService $voidAuthService;

    public function setUp(): void
    {
        parent::setUp();

        $this->voidAuthService = new VoidAuthorizationService($this->paysafeApiClient);
    }


    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::voidAuthorization
     *
     * @return void
     */
    public function testVoidAuthorization_isSuccessful(): void
    {
        $voidAuthService = clone $this->voidAuthService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockVoidAuthorizationResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($voidAuthService, VoidAuthorizationService::class);
        $doReplaceService();

        $voidAuthRequest = (new VoidAuthorizationRequest())
            ->merchantRefNum(self::MERCHANT_REF_NUM)
            ->amount(500);

        $response = $voidAuthService->voidAuthorization(self::PAYMENT_ID, $voidAuthRequest);

        $this->assertNotNull($response);
        $this->assertEquals(500, $response->getAmount());
        $this->assertEquals("a85c6ed15955adeed35e", $response->getMerchantRefNum());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::voidAuthorization
     *
     * @return void
     */
    public function testVoidAuthorization_invalidCredentials_throwsPaysafeSdkException(): void
    {
        try {
            $voidAuthService = clone $this->voidAuthService;

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
            $doReplaceService = $replaceService->bindTo($voidAuthService, VoidAuthorizationService::class);
            $doReplaceService();

            $voidAuthService->voidAuthorization(self::PAYMENT_ID, new VoidAuthorizationRequest());

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
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
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::voidAuthorization
     *
     * @return void
     */
    public function testVoidAuthorization_unauthorizedAccess_throwsPaysafeSdkException(): void
    {
        try {
            $voidAuthService = clone $this->voidAuthService;

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
            $doReplaceService = $replaceService->bindTo($voidAuthService, VoidAuthorizationService::class);
            $doReplaceService();

            $voidAuthService->voidAuthorization(self::PAYMENT_ID, new VoidAuthorizationRequest());

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
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::voidAuthorization
     *
     * @return void
     */
    public function testVoidAuthorization_throwsApiConnectionException(): void
    {
        try {
            $voidAuthService = clone $this->voidAuthService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePost')
                ->willReturn(
                    new Response(400)
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($voidAuthService, VoidAuthorizationService::class);
            $doReplaceService();

            $voidAuthService->voidAuthorization(self::PAYMENT_ID, new VoidAuthorizationRequest());

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->assertEquals(400, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertNull($exception->getError());
        }
    }


    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::getVoidAuthorizationById
     *
     * @return void
     */
    public function testGetVoidAuthorizationById(): void
    {
        try {
            $voidAuthService = clone $this->voidAuthService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        200,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->mockGetVoidAuthorizationByIdResponse()
                    )
                );
            $replaceService = function() use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($voidAuthService, VoidAuthorizationService::class);
            $doReplaceService();

            $response = $voidAuthService->getVoidAuthorizationById(self::VOID_ID);

            $this->assertNotNull($response);
            $this->assertEquals(500, $response->getAmount());
            $this->assertEquals(self::MERCHANT_REF_NUM, $response->getMerchantRefNum());
            $this->assertEquals(self::VOID_ID, $response->getId());
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }


    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::getVoidAuthorizationById
     *
     * @return void
     */
    public function testGetVoidAuthorizationById_badId_throwsPaysafeSdkException(): void
    {
        try {
            $voidAuthService = clone $this->voidAuthService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        404,
                        [
                            'Content-Type' => 'application/json',
                            ExceptionBuilder::HEADER_X_INTERNAL_CORRELATION_ID => 'random_correlation_id',
                        ],
                        self::ENTITY_NOT_FOUND_ERROR_RESPONSE
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($voidAuthService, VoidAuthorizationService::class);
            $doReplaceService();

            $voidAuthService->getVoidAuthorizationById(self::VOID_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals("random_correlation_id", $exception->getInternalCorrelationId());
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
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::getVoidAuthorizationById
     *
     * @return void
     */
    public function testGetVoidAuthorizationById_invalidCredentials_throwsPaysafeSdkException(): void
    {
        try {
            $voidAuthService = clone $this->voidAuthService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        401,
                        [
                            'Content-Type' => 'application/json',
                            ExceptionBuilder::HEADER_X_INTERNAL_CORRELATION_ID => 'random_correlation_id',
                        ],
                        self::INVALID_CREDENTIALS_ERROR_RESPONSE
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($voidAuthService, VoidAuthorizationService::class);
            $doReplaceService();

            $voidAuthService->getVoidAuthorizationById(self::VOID_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals("random_correlation_id", $exception->getInternalCorrelationId());
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
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::getVoidAuthorizationById
     *
     * @return void
     */
    public function testGetVoidAuthorizationById_unauthorizedAccess_throwsPaysafeSdkException(): void
    {
        try {
            $voidAuthService = clone $this->voidAuthService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        403,
                        [
                            'Content-Type' => 'application/json',
                            ExceptionBuilder::HEADER_X_INTERNAL_CORRELATION_ID => 'random_correlation_id',
                        ],
                        self::UNAUTHORIZED_ACCESS_ERROR_RESPONSE
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($voidAuthService, VoidAuthorizationService::class);
            $doReplaceService();

            $voidAuthService->getVoidAuthorizationById(self::VOID_ID);

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
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::getVoidAuthorizationById
     *
     * @return void
     */
    public function testGetVoidAuthorizationById_ioException_throwsPaysafeSdkException(): void
    {
        try {
            $voidAuthService = clone $this->voidAuthService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(400)
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($voidAuthService, VoidAuthorizationService::class);
            $doReplaceService();

            $voidAuthService->getVoidAuthorizationById(self::VOID_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->assertEquals(400, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertNull($exception->getError());
        }
    }


    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::getVoidAuthorizationUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetVoidAuthorizationUsingMerchantReferenceNumber(): void
    {
        try {
            $voidAuthService = clone $this->voidAuthService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
                ->willReturn(
                    new Response(
                        200,
                        [
                            'Content-Type' => 'application/json',
                        ],
                        $this->mockGetVoidAuthorizationUsingMerchantReferenceNumberResponse()
                    )
                );
            $replaceService = function() use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($voidAuthService, VoidAuthorizationService::class);
            $doReplaceService();

            $response = $voidAuthService->getVoidAuthorizationUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

            $this->assertNotNull($response);
            $this->assertNotNull($response->getVoidAuths());
            $this->assertNotNull($response->getMeta());

            $meta = $response->getMeta();
            $this->assertEquals(1, $meta->getNumberOfRecords());
            $this->assertEquals(10, $meta->getLimit());
            $this->assertEquals(1, $meta->getPage());
            $this->assertCount(1, $response->getVoidAuths());
            $this->assertEquals(500, $response->getVoidAuths()[0]->getAmount());
            $this->assertEquals(
                self::MERCHANT_REF_NUM,
                $response->getVoidAuths()[0]->getMerchantRefNum()
            );
            $this->assertEquals(self::VOID_ID, $response->getVoidAuths()[0]->getId());
            $this->assertEquals('COMPLETED', $response->getVoidAuths()[0]->getStatus());
            $this->assertEquals("2023-01-20T05:51:42Z", $response->getVoidAuths()[0]->getTxnTime());
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }


    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\VoidAuthorizationService::voidAuthorization
     *
     * @return void
     */
    public function testCreateVoidAuthorization_throwsRequestConflictException(): void
    {
        try {
            $voidAuthService = clone $this->voidAuthService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePost')
                ->willReturn(
                    new Response(
                        409,
                        [
                            'Content-Type' => 'application/json',
                            ExceptionBuilder::HEADER_X_INTERNAL_CORRELATION_ID => 'random_correlation_id',
                        ],
                        self::REQUEST_CONFLICT_ERROR_RESPONSE
                    )
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($voidAuthService, VoidAuthorizationService::class);
            $doReplaceService();

            $voidAuthRequest = (new VoidAuthorizationRequest())
                ->amount(500)
                ->merchantRefNum(self::MERCHANT_REF_NUM);
            $voidAuthService->voidAuthorization(self::PAYMENT_ID, $voidAuthRequest);

            $this->fail('Exception not thrown');
        } catch (RequestConflictException $exception) {
            $this->assertEquals("random_correlation_id", $exception->getInternalCorrelationId());
            $this->assertEquals("DW-CUSTOMER-CONFLICT", $exception->getError()->getCode());
            $this->assertEquals("Customer conflict", $exception->getError()->getMessage());

            $this->assertCount(1, $exception->getError()->getAdditionalDetails());
            $this->assertEquals(
                "Customer already exists.",
                $exception->getError()->getAdditionalDetails()[0]->getMessage()
            );
            $this->assertEquals("22", $exception->getError()->getAdditionalDetails()[0]->getCode());
            $this->assertEquals("Duplication", $exception->getError()->getAdditionalDetails()[0]->getType());

            $this->assertEmpty($exception->getError()->getFieldErrors());
            $this->assertEmpty($exception->getError()->getDetails());
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @return string
     */
    private function mockVoidAuthorizationResponse(): string
    {
        return "{\n"
            . "  \"id\": \"9b84f316-e120-4948-97f6-c97d5a305eb3\",\n"
            . "  \"merchantRefNum\": \"a85c6ed15955adeed35e\",\n"
            . "  \"txnTime\": \"2023-01-20T05:51:42Z\",\n"
            . "  \"status\": \"COMPLETED\",\n"
            . "  \"amount\": 500\n"
            . "}";
    }

    /**
     * @return string
     */
    private function mockGetVoidAuthorizationByIdResponse(): string
    {
        return "{\n"
            . "  \"id\": \"8b84f316-e120-4948-97f6-c97d5a305ee5\",\n"
            . "  \"merchantRefNum\": \"a85c6ed15955adeed35e\",\n"
            . "  \"txnTime\": \"2023-01-20T05:51:42Z\",\n"
            . "  \"status\": \"COMPLETED\",\n"
            . "  \"amount\": 500\n"
            . "}";
    }

    /**
     * @return string
     */
    private function mockGetVoidAuthorizationUsingMerchantReferenceNumberResponse(): string
    {
        return "{\n"
            . "  \"meta\": {\n"
            . "    \"numberOfRecords\": 1,\n"
            . "    \"limit\": 10,\n"
            . "    \"page\": 1\n"
            . "  },\n"
            . "  \"voidAuths\": [\n"
            . "    {\n"
            . "      \"id\": \"8b84f316-e120-4948-97f6-c97d5a305ee5\",\n"
            . "      \"merchantRefNum\": \"a85c6ed15955adeed35e\",\n"
            . "      \"amount\": 500,\n"
            . "      \"txnTime\": \"2023-01-20T05:51:42Z\",\n"
            . "      \"status\": \"COMPLETED\"\n"
            . "    }\n"
            . "  ]\n"
            . "}";
    }

}
