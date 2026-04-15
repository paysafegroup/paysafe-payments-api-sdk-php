<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Lpm\Interac;
use Paysafe\PhpSdk\Model\StandaloneCredit\StandaloneCreditRequest;
use Paysafe\PhpSdk\Model\StandaloneCredit\StandaloneCreditUpdateRequest;
use Paysafe\PhpSdk\Service\StandaloneCreditService;
use Service\BasePaysafeTest;

class StandaloneCreditServiceTest extends BasePaysafeTest
{
    const STANDALONE_CREDIT_ENDPOINT = "/paymenthub/v1/standalonecredits";
    const MERCHANT_REF_NUM = "32be35aac78dbfe252a2";
    const STANDALONE_CREDIT_ID = "eddbec36-6fc7-48fb-a694-dfc5b314ec0d";

    private StandaloneCreditService $standaloneCreditService;

    public function setUp(): void
    {
        parent::setUp();

        $this->standaloneCreditService = new StandaloneCreditService($this->paysafeApiClient);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\StandaloneCreditService::processStandaloneCredit
     *
     * @return void
     *
     * @throws \Paysafe\PhpSdk\Exception\PaysafeSdkException
     */
    public function testProcessStandaloneCredit_isSuccessful(): void
    {
        $standaloneCreditService = clone $this->standaloneCreditService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockStandaloneCreditResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($standaloneCreditService, StandaloneCreditService::class);
        $doReplaceService();

        $creditRequest = (new StandaloneCreditRequest())
            ->merchantRefNum("32be35aac78dbfe252a2")
            ->amount(500)
            ->currencyCode("USD")
            ->paymentHandleToken("SCQp7CmWCSRFmvzv")
            ->description("Winning payment from Loto 649");

        $standaloneCredit = $standaloneCreditService->processStandaloneCredit($creditRequest);

        $this->assertNotNull($standaloneCredit);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\StandaloneCreditService::getStandaloneCreditsUsingMerchantReferenceNumber
     *
     * @return void
     *
     * @throws \Paysafe\PhpSdk\Exception\PaysafeSdkException
     */
    public function testGetStandaloneCreditsUsingMerchantReferenceNumber_isSuccessful(): void
    {
        $standaloneCreditService = clone $this->standaloneCreditService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockGetStandaloneCreditResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($standaloneCreditService, StandaloneCreditService::class);
        $doReplaceService();

        $response = $standaloneCreditService
            ->getStandaloneCreditsUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

        $this->assertNotNull($response);
        $this->assertEquals(1, $response->getMeta()->getNumberOfRecords());
        $this->assertNotEmpty($response->getStandaloneCredits());
        $this->assertEquals(self::MERCHANT_REF_NUM, $response->getStandaloneCredits()[0]->getMerchantRefNum());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\StandaloneCreditService::getStandaloneCreditsUsingMerchantReferenceNumber
     *
     * @return void
     */
    public function testGetStandaloneCreditsUsingMerchantReferenceNumber_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $standaloneCreditService = clone $this->standaloneCreditService;

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
            $doReplaceService = $replaceService->bindTo(
                $standaloneCreditService,
                StandaloneCreditService::class
            );
            $doReplaceService();

            $standaloneCreditService
                ->getStandaloneCreditsUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);
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
     * @covers \Paysafe\PhpSdk\Service\StandaloneCreditService::getStandaloneCreditById
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testGetStandaloneCreditById_isSuccessful(): void
    {
        $standaloneCreditService = clone $this->standaloneCreditService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockGetStandaloneCreditByIdResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($standaloneCreditService, StandaloneCreditService::class);
        $doReplaceService();

        $response = $standaloneCreditService
            ->getStandaloneCreditById(self::STANDALONE_CREDIT_ID);

        $this->assertNotNull($response);
        $this->assertEquals(self::STANDALONE_CREDIT_ID, $response->getId());
        $this->assertEquals(self::MERCHANT_REF_NUM, $response->getMerchantRefNum());
        $this->assertEquals("USD", $response->getCurrencyCode());
        $this->assertEquals(500, $response->getAmount());
        $this->assertEquals("SIM1UZ3YM7IS1", $response->getCardSchemeTransactionId());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\StandaloneCreditService::getStandaloneCreditById
     *
     * @return void
     */
    public function testGetStandaloneCreditById_throwsExceptionOnEntityNotFoundError(): void
    {
        $standaloneCreditId = "bad-id";

        try {
            $standaloneCreditService = clone $this->standaloneCreditService;

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
            $doReplaceService = $replaceService->bindTo(
                $standaloneCreditService,
                StandaloneCreditService::class
            );
            $doReplaceService();

            $response = $standaloneCreditService->getStandaloneCreditById($standaloneCreditId);
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
     * @covers \Paysafe\PhpSdk\Service\StandaloneCreditService::cancelStandaloneCredit
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCancelStandaloneCredit_isSuccessful(): void
    {
        $standaloneCreditId = "eddbec36-6fc7-48fb-a694-dfc5b314ec0d";
        $standaloneCreditService = clone $this->standaloneCreditService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePut')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockCancelStandaloneCreditResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($standaloneCreditService, StandaloneCreditService::class);
        $doReplaceService();

        $cancelRequest = (new CancelRequest())->status('CANCELLED');
        $response = $standaloneCreditService->cancelStandaloneCredit($standaloneCreditId, $cancelRequest);

        $this->assertNotNull($response);
        $this->assertEquals($standaloneCreditId, $response->getId());
        $this->assertEquals("CANCELLED", $response->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\StandaloneCreditService::cancelStandaloneCredit
     *
     * @return void
     */
    public function testCancelStandaloneCredit_throwsExceptionOnEntityNotFoundError(): void
    {
        $invalidStandaloneCreditId = "invalid-credit-id";

        try {
            $standaloneCreditService = clone $this->standaloneCreditService;

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
            $doReplaceService = $replaceService->bindTo(
                $standaloneCreditService,
                StandaloneCreditService::class
            );
            $doReplaceService();

            $cancelRequest = (new CancelRequest())->status('CANCELLED');
            $standaloneCreditService->cancelStandaloneCredit($invalidStandaloneCreditId, $cancelRequest);
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\StandaloneCreditService::patchStandaloneCreditStatusForInteracFraud
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testPatchStandaloneCreditStatusForInteracFraud_isSuccessful(): void
    {
        $standaloneCreditId = "a2afe762-2421-4d57-9c5e-17b06bfb2af6";
        $updateRequest = (new StandaloneCreditUpdateRequest())
            ->interacEtransfer((new Interac())
                ->consumerId("123456")
                ->fraudStatus("CONFIRM_FRAUD")
                ->fraudType("FRAUD_BUSINESS"));
        $standaloneCreditService = clone $this->standaloneCreditService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePatch')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->mockPatchStandaloneCreditFraudResponse()
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($standaloneCreditService, StandaloneCreditService::class);
        $doReplaceService();

        $response = $standaloneCreditService
            ->patchStandaloneCreditStatusForInteracFraud($standaloneCreditId, $updateRequest);

        $this->assertNotNull($response);
        $this->assertEquals($standaloneCreditId, $response->getId());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\StandaloneCreditService::patchStandaloneCreditStatusForInteracFraud
     *
     * @return void
     */
    public function testPatchStandaloneCreditStatusForInteracFraud_throwsExceptionOnEntityNotFoundError(): void
    {
        $invalidStandaloneCreditId = "invalid-credit-id";
        $updateRequest = (new StandaloneCreditUpdateRequest())
            ->interacEtransfer((new Interac())
                ->consumerId("123456")
                ->fraudStatus("CONFIRM_FRAUD")
                ->fraudType("FRAUD_BUSINESS"));

        try {
            $standaloneCreditService = clone $this->standaloneCreditService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePatch')
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
            $doReplaceService = $replaceService->bindTo(
                $standaloneCreditService,
                StandaloneCreditService::class
            );
            $doReplaceService();

            $standaloneCreditService
                ->patchStandaloneCreditStatusForInteracFraud($invalidStandaloneCreditId, $updateRequest);
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @return string
     */
    private function mockStandaloneCreditResponse(): string
    {
        return "{\n"
        . "  \"id\": \"eddbec36-6fc7-48fb-a694-dfc5b314ec0d\",\n"
        . "  \"merchantRefNum\": \"32be35aac78dbfe252a2\",\n"
        . "  \"paymentHandleToken\": \"SCQp7CmWCSRFmvzv\",\n"
        . "  \"amount\": 500,\n"
        . "  \"currencyCode\": \"USD\",\n"
        . "  \"customerIp\": \"204.91.0.12\",\n"
        . "  \"onHold\": true,\n"
        . "  \"description\": \"Winning payment from Loto 649\",\n"
        . "  \"dupCheck\": true,\n"
        . "  \"merchantDescriptor\": {\n"
        . "    \"dynamicDescriptor\": \"OnlineStore\",\n"
        . "    \"phone\": \"478234562331\"\n"
        . "  },\n"
        . "  \"paymentFacilitator\": {\n"
        . "    \"subMerchant\": {\n"
        . "      \"id\": \"123456789\",\n"
        . "      \"name\": \"PayFacSubMerchant\",\n"
        . "      \"phone\": \"478234562331\",\n"
        . "      \"email\": \"payfac@mail.com\",\n"
        . "      \"url\": \"www.payfac.com\",\n"
        . "      \"address\": {\n"
        . "        \"street\": \"100 Queen Street West\",\n"
        . "        \"city\": \"Toronto\",\n"
        . "        \"state\": \"ON\",\n"
        . "        \"country\": \"CA\",\n"
        . "        \"zip\": \"M5H 2N2\"\n"
        . "      }\n"
        . "    }\n"
        . "  },\n"
        . "  \"sender\": null,\n"
        . "  \"sourceOfFunds\": \"Credit\",\n"
        . "  \"paymentType\": \"CARD\",\n"
        . "  \"txnTime\": \"2023-01-20T05:59:13Z\",\n"
        . "  \"billingDetails\": {\n"
        . "    \"nickName\": \"Home\",\n"
        . "    \"street\": \"TEST\",\n"
        . "    \"city\": \"CA\",\n"
        . "    \"state\": \"CA\",\n"
        . "    \"country\": \"US\",\n"
        . "    \"zip\": \"12345\",\n"
        . "    \"phone\": \"478234562331\"\n"
        . "  },\n"
        . "  \"status\": \"PENDING\",\n"
        . "  \"returnLinks\": [],\n"
        . "  \"updatedTime\": \"2023-01-20T05:59:13Z\",\n"
        . "  \"statusTime\": \"2023-01-20T05:59:13Z\",\n"
        . "    \"profile\": {\n"
        . "        \"locale\": \"en\",\n"
        . "        \"firstName\": \"John\",\n"
        . "        \"lastName\": \"Doe\",\n"
        . "        \"email\": \"adrian.parvan@paysafe.com\"\n"
        . "    },\n"
        . "  \"transactionIntent\": \"BUY_WITH_CRYPTO\",\n"
        . "  \"gatewayReconciliationId\": \"b222abd6-1008-4723-83f5-615751778d16\"\n"
        . "}";
    }

    /**
     * @return string
     */
    private function mockGetStandaloneCreditResponse(): string
    {
        return "{\n"
        . "  \"meta\": {\n"
        . "    \"numberOfRecords\": 1,\n"
        . "    \"limit\": 10,\n"
        . "    \"page\": 1\n"
        . "  },\n"
        . "  \"standaloneCredits\": [\n"
        . "    {\n"
        . "      \"id\": \"eddbec36-6fc7-48fb-a694-dfc5b314ec0d\",\n"
        . "      \"amount\": 500,\n"
        . "      \"merchantRefNum\": \"32be35aac78dbfe252a2\",\n"
        . "      \"customerIp\": \"204.91.0.12\",\n"
        . "      \"txnTime\": \"2023-01-20T05:59:13Z\",\n"
        . "      \"currencyCode\": \"USD\",\n"
        . "      \"status\": \"PENDING\",\n"
        . "      \"description\": \"Winning payment from Loto 649\",\n"
        . "      \"paymentType\": \"CARD\",\n"
        . "      \"card\": {\n"
        . "        \"cardExpiry\": {\n"
        . "          \"month\": \"10\",\n"
        . "          \"year\": \"2025\"\n"
        . "        },\n"
        . "        \"cardType\": \"MC\",\n"
        . "        \"lastDigits\": \"0000\",\n"
        . "        \"issuingCountry\": \"US\"\n"
        . "      },\n"
        . "      \"billingDetails\": {\n"
        . "        \"street\": \"TEST\",\n"
        . "        \"city\": \"CA\",\n"
        . "        \"country\": \"US\",\n"
        . "        \"state\": \"CA\",\n"
        . "        \"zip\": \"12345\"\n"
        . "      },\n"
        . "      \"paymentFacilitator\": {\n"
        . "        \"subMerchant\": {\n"
        . "          \"id\": \"123456789\",\n"
        . "          \"name\": \"PayFacSubMerchant\",\n"
        . "          \"phone\": \"478234562331\",\n"
        . "          \"email\": \"payfac@mail.com\",\n"
        . "          \"url\": \"www.payfac.com\",\n"
        . "          \"address\": {\n"
        . "            \"street\": \"100 Queen Street West\",\n"
        . "            \"city\": \"Toronto\",\n"
        . "            \"state\": \"ON\",\n"
        . "            \"country\": \"CA\",\n"
        . "            \"zip\": \"M5H 2N2\"\n"
        . "          }\n"
        . "        }\n"
        . "      },\n"
        . "      \"merchantDescriptor\": {\n"
        . "        \"dynamicDescriptor\": \"OnlineStore\"\n"
        . "      },\n"
        . "      \"cardSchemeTransactionId\": \"SIM1UZ3YM7IS1\"\n"
        . "    }\n"
        . "  ]\n"
        . "}";
    }

    /**
     * @return string
     */
    private function mockGetStandaloneCreditByIdResponse(): string
    {
        return "{\n"
        . "  \"id\": \"eddbec36-6fc7-48fb-a694-dfc5b314ec0d\",\n"
        . "  \"paymentType\": \"CARD\",\n"
        . "  \"merchantRefNum\": \"32be35aac78dbfe252a2\",\n"
        . "  \"currencyCode\": \"USD\",\n"
        . "  \"txnTime\": \"2023-01-20T05:59:13Z\",\n"
        . "  \"billingDetails\": {\n"
        . "    \"street\": \"TEST\",\n"
        . "    \"city\": \"CA\",\n"
        . "    \"zip\": \"12345\",\n"
        . "    \"state\": \"CA\",\n"
        . "    \"country\": \"US\"\n"
        . "  },\n"
        . "  \"customerIp\": \"204.91.0.12\",\n"
        . "  \"status\": \"PENDING\",\n"
        . "  \"amount\": 500,\n"
        . "  \"description\": \"Winning payment from Loto 649\",\n"
        . "  \"card\": {\n"
        . "    \"cardExpiry\": {\n"
        . "      \"month\": \"10\",\n"
        . "      \"year\": \"2025\"\n"
        . "    },\n"
        . "    \"cardType\": \"MC\",\n"
        . "    \"lastDigits\": \"0000\"\n"
        . "  },\n"
        . "  \"paymentFacilitator\": {\n"
        . "    \"subMerchant\": {\n"
        . "      \"id\": \"123456789\",\n"
        . "      \"name\": \"PayFacSubMerchant\",\n"
        . "      \"phone\": \"478234562331\",\n"
        . "      \"email\": \"payfac@mail.com\",\n"
        . "      \"url\": \"www.payfac.com\",\n"
        . "      \"address\": {\n"
        . "        \"street\": \"100 Queen Street West\",\n"
        . "        \"city\": \"Toronto\",\n"
        . "        \"state\": \"ON\",\n"
        . "        \"country\": \"CA\",\n"
        . "        \"zip\": \"M5H 2N2\"\n"
        . "      }\n"
        . "    }\n"
        . "  },\n"
        . "  \"merchantDescriptor\": {\n"
        . "    \"dynamicDescriptor\": \"OnlineStore\"\n"
        . "  },\n"
        . "  \"cardSchemeTransactionId\": \"SIM1UZ3YM7IS1\"\n"
        . "}";
    }

    /**
     * @return string
     */
    private function mockCancelStandaloneCreditResponse(): string
    {
        return "{\n" .
        "  \"id\": \"eddbec36-6fc7-48fb-a694-dfc5b314ec0d\",\n" .
        "  \"txnTime\": \"2025-02-10T12:34:56Z\",\n" .
        "  \"status\": \"CANCELLED\"\n" .
        "}";
    }

    /**
     * @return string
     */
    private function mockPatchStandaloneCreditFraudResponse(): string
    {
        return "{\n" .
        "  \"id\": \"a2afe762-2421-4d57-9c5e-17b06bfb2af6\",\n" .
        "  \"paymentType\": \"INTERAC_ETRANSFER\",\n" .
        "  \"interacEtransfer\": {\n" .
        "    \"consumerId\": \"123456\",\n" .
        "    \"fraudStatus\": \"CONFIRM_FRAUD\",\n" .
        "    \"fraudType\": \"FRAUD_BUSINESS\",\n" .
        "    \"comments\": \"Valid Txn\"\n" .
        "  },\n" .
        "  \"status\": \"COMPLETED\"\n" .
        "}";
    }

}
