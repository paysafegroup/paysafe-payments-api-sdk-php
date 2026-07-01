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

class StandaloneCreditServiceTest extends BasePaysafeService
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
                    $this->get_resource_json('standalone_credit/process_standalone_credit_card_response.json')
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
                    $this->get_resource_json('standalone_credit/get_standalone_credit_using_merchant_ref_number_response.json')
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
                    $this->get_resource_json('standalone_credit/get_standalone_credit_by_id_response.json')
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
                    $this->get_resource_json('standalone_credit/cancel_standalone_credit_response.json')
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
                    $this->get_resource_json('standalone_credit/patch_standalone_credit_response.json')
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
}
