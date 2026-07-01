<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Refund\RefundRequest;
use Paysafe\PhpSdk\Service\RefundService;

class RefundServiceTest extends BasePaysafeService
{
    const PROCESS_REFUND_ENDPOINT = "/paymenthub/v1/settlements/%s/refunds";
    const REFUND_ENDPOINT = "/paymenthub/v1/refunds";
    const REFUND_ID = "6cf00c1c-fb83-4cc8-a7cc-cd9118ce4f53";
    const SETTLEMENT_ID = "3aeb9c63-6386-46a3-9f8e-f452e722228a";
    const MERCHANT_REF_NUM = "a9318b525273ee3cda79a2f947a9";

    private RefundService $refundService;

    public function setUp(): void
    {
        parent::setUp();

        $this->refundService = new RefundService($this->paysafeApiClient);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RefundService::getRefundById
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testProcessRefund_isSuccessful(): void
    {
        $refundService = clone $this->refundService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('refund/process_refund_card_response.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($refundService, RefundService::class);
        $doReplaceService();

        $refundRequest = (new RefundRequest())
            ->merchantRefNum("92cf2183-2298-44a6-99d4-5af6d727cea3")
            ->amount(500)
            ->dupCheck(true);

        $response = $refundService->processRefund(self::SETTLEMENT_ID, $refundRequest);

        $this->assertNotNull($response);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RefundService::getRefundById
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testGetRefundById_isSuccessful(): void
    {
        $refundService = clone $this->refundService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('refund/get_refund_by_id_card_response.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($refundService, RefundService::class);
        $doReplaceService();

        $response = $refundService->getRefundById(self::REFUND_ID);

        $this->assertNotNull($response);
        $this->assertEquals(self::REFUND_ID, $response->getId());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RefundService::getRefundById
     *
     * @return void
     */
    public function testGetRefundById_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $refundService = clone $this->refundService;

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
            $doReplaceService = $replaceService->bindTo($refundService, RefundService::class);
            $doReplaceService();

            $refundService->getRefundById(self::REFUND_ID);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
            $this->assertEquals("The ID(s) specified in the URL do not correspond to the values in the system.",
                $exception->getError()->getDetails()[0]);
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RefundService::getRefundById
     *
     * @return void
     */
    public function testUsingMerchantReferenceNumber_isSuccessful(): void
    {
        $refundService = clone $this->refundService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('refund/get_refund_using_merchant_ref_number_card_response.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($refundService, RefundService::class);
        $doReplaceService();

        $response = $refundService->getRefundUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

        $this->assertNotNull($response);
        $this->assertEquals(1, $response->getMeta()->getNumberOfRecords());
        $this->assertNotEmpty($response->getRefunds());
        $this->assertEquals(self::MERCHANT_REF_NUM, $response->getRefunds()[0]->getMerchantRefNum());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RefundService::getRefundById
     *
     * @return void
     */
    public function testUsingMerchantReferenceNumber_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $refundService = clone $this->refundService;

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
            $doReplaceService = $replaceService->bindTo($refundService, RefundService::class);
            $doReplaceService();

            $refundService->getRefundUsingMerchantReferenceNumber(self::MERCHANT_REF_NUM);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
            $this->assertEquals("The ID(s) specified in the URL do not correspond to the values in the system.",
                $exception->getError()->getDetails()[0]);
        } catch (\Exception $exception) {
            $this->fail($exception->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::cancelPayment
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCancelRefund_isSuccessful(): void
    {
        $refundService = clone $this->refundService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePut')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('refund/cancel_refund_response.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($refundService, RefundService::class);
        $doReplaceService();

        $cancelPaymentRequest = (new CancelRequest())->status('CANCELLED');
        $response = $refundService->cancelRefund(self::REFUND_ID, $cancelPaymentRequest);

        $this->assertNotNull($response);
        $this->assertEquals(self::REFUND_ID, $response->getId());
        $this->assertEquals("CANCELLED", $response->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\PaymentService::cancelPayment
     *
     * @return void
     */
    public function testCancelRefund_throwsExceptionOnUnauthorizedAccessError(): void
    {
        try {
            $refundService = clone $this->refundService;

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
            $doReplaceService = $replaceService->bindTo($refundService, RefundService::class);
            $doReplaceService();

            $cancelPaymentRequest = (new CancelRequest())->status('CANCELLED');
            $refundService->cancelRefund(self::REFUND_ID, $cancelPaymentRequest);

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
    public function testCancelRefund_throwsExceptionOnEntityNotFoundError(): void
    {
        try {
            $refundService = clone $this->refundService;

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
            $doReplaceService = $replaceService->bindTo($refundService, RefundService::class);
            $doReplaceService();

            $cancelPaymentRequest = (new CancelRequest())->status('CANCELLED');
            $refundService->cancelRefund(self::REFUND_ID, $cancelPaymentRequest);

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
    public function testCancelRefund_throwsPaysafeSdkExceptionOnIOError(): void
    {
        try {
            $refundService = clone $this->refundService;

            $mockCore = $this->createMock(PaysafeApiClient::class);
            $mockCore->method('executePut')
                ->willReturn(
                    new Response(400)
                );
            $replaceService = function () use ($mockCore) {
                $this->paysafeApiClient = $mockCore;
            };
            $doReplaceService = $replaceService->bindTo($refundService, RefundService::class);
            $doReplaceService();

            $cancelPaymentRequest = (new CancelRequest())->status('CANCELLED');
            $refundService->cancelRefund(self::REFUND_ID, $cancelPaymentRequest);

            $this->fail('Exception not thrown');
        } catch (PaysafeSdkException|\Exception $exception) {
            $this->assertEquals(400, $exception->getCode());
            $this->assertNull($exception->getInternalCorrelationId());
            $this->assertNull($exception->getError());
        }
    }
}
