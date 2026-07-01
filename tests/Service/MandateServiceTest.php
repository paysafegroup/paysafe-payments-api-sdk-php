<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;


use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Enums\MandateStatus;
use Paysafe\PhpSdk\Model\Common\Enums\MandateStatusReason;
use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Service\MandateService;
use GuzzleHttp\Psr7\Response;

class MandateServiceTest extends BasePaysafeService
{
    const MANDATES_ENDPOINT = "/paymenthub/v1/customers/%s/paymenthandles/%s/mandates";
    const MANDATE_BY_ID_ENDPOINT = "/paymenthub/v1/customers/%s/paymenthandles/%s/mandates/%s";
    const CUSTOMER_ID = "921cd968-6882-422c-ae4f-a10ddbae95ff";
    const PAYMENT_HANDLE_ID = "c672fd10-962e-4f57-a1f2-1c3105ffe5d3";
    const MANDATE_ID = "fb24c07e-7a7d-4334-b3b1-c32af1541aa7";
    const NON_EXISTING_MANDATE_ID = "00000000-0000-0000-0000-000000000000";

    private MandateService $mandateService;

    public function setUp(): void
    {
        parent::setUp();

        $this->mandateService = new MandateService($this->paysafeApiClient);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\MandateService::createMandate
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCreateMandate_isSuccessful(): void
    {
        $mandateService = clone $this->mandateService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePost')
            ->willReturn(
                new Response(
                    201,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('mandate/create_mandate_response.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($mandateService, MandateService::class);
        $doReplaceService();

        $mandateRequest = new Mandate();
        $mandateRequest->setReference("GTWYRM6230");

        $mandate = $mandateService->createMandate(
            self::CUSTOMER_ID,
            self::PAYMENT_HANDLE_ID,
            $mandateRequest
        );

        $this->assertNotNull($mandate);
        $this->assertEquals("fb24c07e-7a7d-4334-b3b1-c32af1541aa7", $mandate->getId());
        $this->assertEquals("GTWYRM6230", $mandate->getReference());
        $this->assertEquals(MandateStatus::PENDING, $mandate->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\MandateService::createMandate
     *
     * @return void
     */
    public function testCreateMandate_notFound_throwsException(): void
    {
        $mandateService = clone $this->mandateService;

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
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($mandateService, MandateService::class);
        $doReplaceService();

        $mandateRequest = new Mandate();
        $mandateRequest->setReference("GTWYRM6230");

        try {
            $mandateService->createMandate(
                self::CUSTOMER_ID,
                self::PAYMENT_HANDLE_ID,
                $mandateRequest);

            $this->fail('Expected exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\MandateService::getMandateStatus
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testGetMandateStatus_isSuccessful(): void
    {
        $mandateService = clone $this->mandateService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeGet')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('mandate/get_mandate_response.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($mandateService, MandateService::class);
        $doReplaceService();

        $mandate = $mandateService->getMandateStatus(
            self::CUSTOMER_ID,
            self::PAYMENT_HANDLE_ID,
            self::MANDATE_ID
        );

        $this->assertNotNull($mandate);
        $this->assertEquals("fb24c07e-7a7d-4334-b3b1-c32af1541aa7", $mandate->getId());
        $this->assertEquals("GTWYRM6230", $mandate->getReference());
        $this->assertEquals(MandateStatus::PENDING, $mandate->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\MandateService::getMandateStatus
     *
     * @return void
     */
    public function testGetMandateStatus_notFound_throwsException(): void
    {
        $mandateService = clone $this->mandateService;

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
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($mandateService, MandateService::class);
        $doReplaceService();

        try {
            $mandateService->getMandateStatus(
                self::CUSTOMER_ID,
                self::PAYMENT_HANDLE_ID,
                self::MANDATE_ID
            );

            $this->fail('Expected exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\MandateService::cancelMandate
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testCancelMandate_isSuccessful(): void
    {
        $mandateService = clone $this->mandateService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executePut')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                    ],
                    $this->get_resource_json('mandate/cancel_mandate_response.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($mandateService, MandateService::class);
        $doReplaceService();

        $mandateRequest = new Mandate();
        $mandateRequest->setStatus(MandateStatus::CANCELLED);

        $mandate = $mandateService->cancelMandate(
            self::CUSTOMER_ID,
            self::PAYMENT_HANDLE_ID,
            self::MANDATE_ID,
            $mandateRequest
        );

        $this->assertNotNull($mandate);
        $this->assertEquals("fb24c07e-7a7d-4334-b3b1-c32af1541aa7", $mandate->getId());
        $this->assertEquals("GTWYRM6230", $mandate->getReference());
        $this->assertEquals(MandateStatus::CANCELLED, $mandate->getStatus());
        $this->assertEquals(MandateStatusReason::MERCHANT_CANCELLED, $mandate->getStatusReason());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\MandateService::cancelMandate
     *
     * @return void
     */
    public function testCancelMandate_notFound_throwsException(): void
    {
        $mandateService = clone $this->mandateService;

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
        $doReplaceService = $replaceService->bindTo($mandateService, MandateService::class);
        $doReplaceService();

        try {
            $mandateRequest = new Mandate();
            $mandateRequest->setStatus(MandateStatus::CANCELLED);

            $mandateService->cancelMandate(
                self::CUSTOMER_ID,
                self::PAYMENT_HANDLE_ID,
                self::MANDATE_ID,
                $mandateRequest
            );

            $this->fail('Expected exception not thrown');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("5269", $exception->getError()->getCode());
            $this->assertEquals("Entity not found", $exception->getError()->getMessage());
        }
    }
}
