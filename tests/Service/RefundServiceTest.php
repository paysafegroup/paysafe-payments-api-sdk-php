<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Refund\RefundRequest;
use Paysafe\PhpSdk\Service\RefundService;

class RefundServiceTest extends BasePaysafeTest
{
    const PROCESS_REFUND_ENDPOINT = "/paymenthub/v1/settlements/%s/refunds";
    const REFUND_ENDPOINT = "/paymenthub/v1/refunds";
    const REFUND_ID = "6cf00c1c-fb83-4cc8-a7cc-cd9118ce4f64";
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
                    $this->mockProcessCardRefundResponse()
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
                    $this->mockGetRefundByIdResponse()
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
                        self::ENTITY_NOT_FOUND_ERROR_RESPONSE
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
                    $this->mockGetRefundByMerchantRefResponse()
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
                        self::ENTITY_NOT_FOUND_ERROR_RESPONSE
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
                    $this->mockCancelResponse()
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
                        self::UNAUTHORIZED_ACCESS_ERROR_RESPONSE
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
                        self::ENTITY_NOT_FOUND_ERROR_RESPONSE
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

    /**
     * @return string
     */
    private function mockProcessCardRefundResponse(): string
    {
        return "{\n"
            . "  \"id\": \"eb4a057a-dd8a-40d7-9585-25be080bfed3\",\n"
            . "  \"merchantRefNum\": \"92cf2183-2298-44a6-99d4-5af6d727cea3\",\n"
            . "  \"txnTime\": \"2023-02-01T16:11:45Z\",\n"
            . "  \"status\": \"PENDING\",\n"
            . "  \"amount\": 1116\n"
            . "}";
    }

    /**
     * @return string
     */
    private function mockGetRefundByIdResponse(): string
    {
        return "{\n"
            . "  \"id\": \"" . self::REFUND_ID . "\",\n"
            . "  \"merchantRefNum\": \"rYSzJTDq7JoXuQpLxHQ9n5Ful\",\n"
            . "  \"txnTime\": \"2025-02-03T12:46:09Z\",\n"
            . "  \"status\": \"COMPLETED\",\n"
            . "  \"amount\": 500\n"
            . "}";
    }

    /**
     * @return string
     */
    private function mockGetRefundByMerchantRefResponse(): string
    {
        return "{\n"
            . "  \"meta\": {\n"
            . "    \"numberOfRecords\": 1,\n"
            . "    \"limit\": 10,\n"
            . "    \"page\": 1\n"
            . "  },\n"
            . "  \"refunds\": [\n"
            . "    {\n"
            . "      \"id\": \"0549c2df-f995-43e9-ad1d-64cecfd2bc37\",\n"
            . "      \"paymentType\": \"PAYSAFECASH\",\n"
            . "      \"merchantRefNum\": \"" . self::MERCHANT_REF_NUM . "\",\n"
            . "      \"currencyCode\": \"USD\",\n"
            . "      \"txnTime\": \"2023-01-20T04:21:44Z\",\n"
            . "      \"status\": \"COMPLETED\",\n"
            . "      \"gatewayReconciliationId\": \"b222abd6-1008-4723-83f5-615751778d16\",\n"
            . "      \"amount\": 500,\n"
            . "      \"updatedTime\": \"2023-01-20T04:21:45Z\",\n"
            . "      \"statusTime\": \"2023-01-20T04:21:45Z\",\n"
            . "      \"liveMode\": false,\n"
            . "      \"gatewayResponse\": {\n"
            . "        \"id\": \"b222abd6-1008-4723-83f5-615751778d16\",\n"
            . "        \"processor\": \"PAYSAFECARD\"\n"
            . "      },\n"
            . "      \"source\": \"SingleAPI\"\n"
            . "    }\n"
            . "  ]\n"
            . "}";
    }

    /**
     * @return string
     */
    private function mockCancelResponse(): string
    {
        return "{\n" .
            "  \"id\": \"6cf00c1c-fb83-4cc8-a7cc-cd9118ce4f64\",\n" .
            "  \"txnTime\": \"2023-01-10T12:57:22Z\",\n" .
            "  \"status\": \"CANCELLED\"\n" .
            "}";
    }
}
