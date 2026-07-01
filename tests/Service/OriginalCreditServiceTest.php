<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\OriginalCredit\OriginalCreditRequest;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelResponse;
use Paysafe\PhpSdk\Service\OriginalCreditService;

class OriginalCreditServiceTest extends BasePaysafeService
{
    const ORIGINAL_CREDIT_ENDPOINT = "/paymenthub/v1/originalcredits";
    const ORIGINAL_CREDIT_ID = "e075f2ae-dfc4-4f6d-8d89-61158367b6a6";

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
                    $this->get_resource_json('original_credit/process_original_credit_card_response.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($originalCreditService, OriginalCreditService::class);
        $doReplaceService();

        $ocRequest = (new OriginalCreditRequest())
            ->amount(100)
            ->merchantRefNum("ee9010926e3edd01a799")
            ->currencyCode("USD")
            ->customerIp("204.91.0.12")
            ->description("Winning payment from Loto 649");

        $response = $originalCreditService->processOriginalCredit($ocRequest);

        $this->assertNotNull($response);
        $this->assertEquals("ee9010926e3edd01a799", $response->getMerchantRefNum());
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
                    $this->get_resource_json('original_credit/get_original_credit_by_id_response.json')
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
        $this->assertEquals("merchantRefNum-151", $response->getMerchantRefNum());
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
                    $this->get_resource_json('original_credit/get_original_credit_using_merchant_ref_number_response.json')
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
                    $this->get_resource_json('original_credit/cancel_original_credit_response.json')
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
                        $this->get_resource_json("error/404_entity_not_found_response.json")
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
}
