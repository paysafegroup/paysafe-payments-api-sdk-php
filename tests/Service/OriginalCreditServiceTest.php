<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\OriginalCredit\OriginalCreditRequest;
use Paysafe\PhpSdk\Service\OriginalCreditService;

class OriginalCreditServiceTest extends BasePaysafeTest
{
    const ORIGINAL_CREDIT_ENDPOINT = "/paymenthub/v1/originalcredits";
    const ORIGINAL_CREDIT_ID = "eddbec36-6fc7-48fb-a694-dfc5b314ec0d";

    private OriginalCreditService $originalCreditService;

    public function setUp(): void
    {
        parent::setUp();

        $this->originalCreditService = new OriginalCreditService($this->paysafeApiClient);
    }


    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\OriginalCreditService::processOriginalCredit
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testProcessOriginalCredit_isSuccessful(): void
    {
        $originalCreditService = clone $this->originalCreditService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockProcessOriginalCreditResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($originalCreditService, OriginalCreditService::class);
        $doReplaceService();

        $ocRequest = (new OriginalCreditRequest())
            ->amount(100)
            ->merchantRefNum("05e19427-a3d1-46f7-8b2e-bdf8ced0341e")
            ->currencyCode("USD")
            ->customerIp("204.91.0.12")
            ->description("Winning payment from Loto 649");

        $response = $originalCreditService->processOriginalCredit($ocRequest);

        $this->assertNotNull($response);
        $this->assertEquals("05e19427-a3d1-46f7-8b2e-bdf8ced0341e", $response->getMerchantRefNum());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\OriginalCreditService::processOriginalCredit
     *
     * @return void
     */
    public function testProcessOriginalCredit_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $originalCreditService = clone $this->originalCreditService;

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
            $doReplaceService = $replaceService->bindTo($originalCreditService, OriginalCreditService::class);
            $doReplaceService();

            $ocRequest = (new OriginalCreditRequest())
                ->amount(100)
                ->merchantRefNum("invalid-merchant-ref-num")
                ->currencyCode("USD");

            $originalCreditService->processOriginalCredit($ocRequest);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\OriginalCreditService::getOriginalCreditById
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testGetOriginalCreditById_isSuccessful(): void
    {
        $originalCreditService = clone $this->originalCreditService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockGetOriginalCreditByIdResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($originalCreditService, OriginalCreditService::class);
        $doReplaceService();

        $response = $originalCreditService->getOriginalCreditById(self::ORIGINAL_CREDIT_ID);

        $this->assertNotNull($response);
        $this->assertEquals(self::ORIGINAL_CREDIT_ID, $response->getId());
        $this->assertEquals('CARD', $response->getPaymentType());
        $this->assertEquals("32be35aac78dbfe252a2", $response->getMerchantRefNum());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\OriginalCreditService::getOriginalCreditById
     *
     * @return void
     */
    public function testGetOriginalCreditById_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $originalCreditService = clone $this->originalCreditService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
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
            $doReplaceService = $replaceService->bindTo($originalCreditService, OriginalCreditService::class);
            $doReplaceService();

            $originalCreditService->getOriginalCreditById(self::ORIGINAL_CREDIT_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\OriginalCreditService::getOriginalCreditUsingMerchantReferenceNumber
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testGetOriginalCreditUsingMerchantReferenceNumber_isSuccessful(): void
    {
        $originalCreditService = clone $this->originalCreditService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockGetOriginalCreditByMerchantRefResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($originalCreditService, OriginalCreditService::class);
        $doReplaceService();

        $response = $originalCreditService
            ->getOriginalCreditUsingMerchantReferenceNumber("merchantRefNum-151");

        $this->assertNotNull($response);
        $this->assertEquals(1, $response->getMeta()->getNumberOfRecords());
        $this->assertNotEmpty($response->getOriginalCredits());
        $this->assertEquals("merchantRefNum-151", $response->getOriginalCredits()[0]->getMerchantRefNum());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\OriginalCreditService::getOriginalCreditUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetOriginalCreditUsingMerchantReferenceNumber_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $originalCreditService = clone $this->originalCreditService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executeGet')
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
            $doReplaceService = $replaceService->bindTo($originalCreditService, OriginalCreditService::class);
            $doReplaceService();

            $originalCreditService->getOriginalCreditUsingMerchantReferenceNumber("merchantRefNum-151");

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
            $this->assertEquals(
                "The ID(s) specified in the URL do not correspond to the values in the system.",
                $exception->getError()->getDetails()[0]);
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\OriginalCreditService::cancelOriginalCredit
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCancelOriginalCredit_isSuccessful(): void
    {
        $originalCreditService = clone $this->originalCreditService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePut')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockCancelOriginalCreditResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($originalCreditService, OriginalCreditService::class);
        $doReplaceService();

        $cancelRequest = (new CancelRequest())->status('CANCELLED');
        $response = $originalCreditService
            ->cancelOriginalCredit(self::ORIGINAL_CREDIT_ID, $cancelRequest);

        $this->assertNotNull($response);
        $this->assertEquals(self::ORIGINAL_CREDIT_ID, $response->getId());
        $this->assertEquals("CANCELLED", $response->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\OriginalCreditService::cancelOriginalCredit
     *
     * @return void
     */
    public function testCancelOriginalCredit_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $originalCreditService = clone $this->originalCreditService;

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
            $doReplaceService = $replaceService->bindTo($originalCreditService, OriginalCreditService::class);
            $doReplaceService();

            $cancelRequest = (new CancelRequest())->status('CANCELLED');
            $originalCreditService->cancelOriginalCredit(self::ORIGINAL_CREDIT_ID, $cancelRequest);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    private function mockCancelOriginalCreditResponse(): string
    {
        return "{\n" .
        "  \"id\": \"" . self::ORIGINAL_CREDIT_ID . "\",\n" .
        "  \"txnTime\": \"2025-02-10T12:34:56Z\",\n" .
        "  \"status\": \"CANCELLED\"\n" .
        "}";
    }

    private function mockGetOriginalCreditByIdResponse(): string
    {
        return "{\n"
        . "  \"id\": \"eddbec36-6fc7-48fb-a694-dfc5b314ec0d\",\n"
        . "  \"paymentType\": \"CARD\",\n"
        . "  \"merchantRefNum\": \"32be35aac78dbfe252a2\",\n"
        . "  \"currencyCode\": \"USD\",\n"
        . "  \"txnTime\": \"2023-01-20T05:59:13Z\",\n"
        . "  \"status\": \"PENDING\",\n"
        . "  \"amount\": 500\n"
        . "}";
    }

    private function mockProcessOriginalCreditResponse(): string
    {
        return "{\n" .
        "  \"id\": \"a2afe762-2421-4d57-9c5e-17b06bfb2af6\",\n" .
        "  \"merchantRefNum\": \"05e19427-a3d1-46f7-8b2e-bdf8ced0341e\",\n" .
        "  \"currencyCode\": \"USD\",\n" .
        "  \"amount\": 100,\n" .
        "  \"status\": \"COMPLETED\"\n" .
        "}";
    }

    private function mockGetOriginalCreditByMerchantRefResponse(): string
    {
        return "{\n" .
        "  \"meta\": {\n" .
        "    \"numberOfRecords\": 1,\n" .
        "    \"limit\": 10,\n" .
        "    \"page\": 1\n" .
        "  },\n" .
        "  \"originalCredits\": [\n" .
        "    {\n" .
        "      \"id\": \"e075f2ae-dfc4-4f6d-8d89-61158367b6a6\",\n" .
        "      \"amount\": 40,\n" .
        "      \"merchantRefNum\": \"merchantRefNum-151\",\n" .
        "      \"txnTime\": \"2018-12-11T16:33:49Z\",\n" .
        "      \"paymentHandleToken\": \"SC9mbfZSITB5OwDJ\",\n" .
        "      \"customerIp\": \"204.91.0.12\",\n" .
        "      \"currencyCode\": \"GBP\",\n" .
        "      \"paymentType\": \"CARD\",\n" .
        "      \"status\": \"INITIATED\",\n" .
        "      \"description\": \"Winning payment from Loto 649\",\n" .
        "      \"paymentFacilitator\": {\n" .
        "        \"subMerchant\": {\n" .
        "          \"id\": \"123456789\",\n" .
        "          \"name\": \"PayFacSubMerchant\",\n" .
        "          \"phone\": \"478234562331\",\n" .
        "          \"email\": \"payfac@mail.com\",\n" .
        "          \"url\": \"www.payfac.com\",\n" .
        "          \"address\": {\n" .
        "            \"street\": \"100 Queen Street West\",\n" .
        "            \"city\": \"Toronto\",\n" .
        "            \"state\": \"ON\",\n" .
        "            \"country\": \"CA\",\n" .
        "            \"zip\": \"M5H 2N2\"\n" .
        "          }\n" .
        "        }\n" .
        "      },\n" .
        "      \"merchantDescriptor\": {\n" .
        "        \"dynamicDescriptor\": \"OnlineStore\"\n" .
        "      },\n" .
        "      \"cardSchemeTransactionId\": \"SIM1UZ3YM7IS1\"\n" .
        "    }\n" .
        "  ]\n" .
        "}";
    }
}
