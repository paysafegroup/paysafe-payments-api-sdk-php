<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace Service;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\DirectRequestOptions;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Lpm\Sightline;
use Paysafe\PhpSdk\Service\RawRequestService;
use Monolog\Logger;

class RawRequestServiceTest extends BasePaysafeService
{
    private RawRequestService $rawRequestService;

    public function setUp(): void
    {
        parent::setUp();

        $this->rawRequestService = new RawRequestService(
            $this->paysafeApiClient,
            new Logger('PaysafeSdkTests')
        );
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RawRequestService::rawRequest
     * @covers \Paysafe\PhpSdk\Client\PaysafeApiClient::handleApiResponse
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testRawRequest_GetBank(): void
    {
        $bankEndpoint = "/paymenthub/v1/banks?accountId=12345612&countryCode=IT&currencyCode=EUR&paymentType=MBK";

        $rawRequestService = clone $this->rawRequestService;

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->method('executeRaw')
            ->willReturn(
                new Response(
                    200,
                    [
                        'Content-Type' => 'application/json',
                        "Custom-Header"=> "value",
                    ],
                    $this->get_resource_json('raw/create_raw_request.json')
                )
            );
        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($rawRequestService, RawRequestService::class);
        $doReplaceService();

        $directRequestOptopns = new DirectRequestOptions();
        $directRequestOptopns->addCustomHeader("Custom-Header", "value");

        $apiResponse = $rawRequestService->rawRequest(
            'GET',
            $bankEndpoint,
            null,
            $directRequestOptopns
        );

        $this->assertNotNull($apiResponse);
        $this->assertEquals(200, $apiResponse->getHttpStatusCode());
        $this->assertTrue(str_contains($apiResponse->getResponseBody(), "bankId"));
        $this->assertTrue(str_contains($apiResponse->getResponseBody(), "RZOOAT2L523"));
        $this->assertTrue((($apiResponse->getHeaders())['Custom-Header'][0] ?? null) === "value");
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RawRequestService::serialize
     * @covers \Paysafe\PhpSdk\Service\RawRequestService::deserialize
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testRawRequest_SerializeDeserialize(): void
    {
        $object = new Sightline();
        $object->setConsumerId("12312313");

        $json = $this->rawRequestService->serialize($object);
        $this->assertNotNull($json);
        $this->assertTrue(str_contains($json, "consumerId"));

        /** @var Sightline $deserialized */
        $deserialized = $this->rawRequestService->deserialize($json, Sightline::class);
        $this->assertNotNull($deserialized);
        $this->assertEquals("12312313", $deserialized->getConsumerId());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RawRequestService::rawRequest
     */
    public function testRawRequest_GetWithQueryStringPayload_AppendsQueryToEndpoint(): void
    {
        $rawRequestService = clone $this->rawRequestService;
        $options = new DirectRequestOptions();

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->expects($this->once())
            ->method('executeRaw')
            ->with(
                'GET',
                '/v1/balances?name=johndoe&email=johndoe@example.com',
                null,
                $options
            )
            ->willReturn(new Response(200, ['Content-Type' => 'application/json'], '{"ok":true}'));

        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($rawRequestService, RawRequestService::class);
        $doReplaceService();

        $response = $rawRequestService->rawRequest(
            'GET',
            'paymenthub/v1/balances',
            'name=johndoe&email=johndoe@example.com',
            $options
        );

        $this->assertEquals(200, $response->getHttpStatusCode());
        $this->assertStringContainsString('ok', $response->getResponseBody());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\RawRequestService::rawRequest
     */
    public function testRawRequest_PostWithPreSerializedBody_PassesBodyAsIs(): void
    {
        $rawRequestService = clone $this->rawRequestService;
        $options = new DirectRequestOptions();
        $requestBody = '{"merchantRefNum":"abc-123","paymentType":"VIPPREFERRED"}';

        $mockCore = $this->createMock(PaysafeApiClient::class);
        $mockCore->expects($this->once())
            ->method('executeRaw')
            ->with('POST', '/v1/vippreferred/registrations', $requestBody, $options)
            ->willReturn(new Response(201, ['Content-Type' => 'application/json'], '{"status":"INITIATED"}'));

        $replaceService = function() use ($mockCore) {
            $this->paysafeApiClient = $mockCore;
        };
        $doReplaceService = $replaceService->bindTo($rawRequestService, RawRequestService::class);
        $doReplaceService();

        $response = $rawRequestService->rawRequest(
            'POST',
            '/v1/vippreferred/registrations',
            $requestBody,
            $options
        );

        $this->assertEquals(201, $response->getHttpStatusCode());
        $this->assertStringContainsString('INITIATED', $response->getResponseBody());
    }
}
