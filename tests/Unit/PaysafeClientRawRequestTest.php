<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE
 */

declare(strict_types=1);

use Paysafe\PhpSdk\Client\DirectRequestOptions;
use Paysafe\PhpSdk\Client\PaysafeApiResponse;
use Paysafe\PhpSdk\Client\PaysafeServices;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Config\Environment;
use Paysafe\PhpSdk\PaysafeClient;
use Paysafe\PhpSdk\Service\RawRequestService;
use PHPUnit\Framework\TestCase;

class PaysafeClientRawRequestTest extends TestCase
{
    /**
     * @test
     * @covers \Paysafe\PhpSdk\PaysafeClient::directRequest
     */
    public function testDirectRequestGetDelegatesToRawService(): void
    {
        $client = new PaysafeClient('merchantId:secretKey', Environment::TEST);
        $options = (new DirectRequestOptions())->addCustomHeader('Custom-Header', 'value');

        $expectedResponse = new PaysafeApiResponse();
        $expectedResponse->setHttpStatusCode(200);
        $expectedResponse->setHeaders(['Content-Type' => ['application/json']]);
        $expectedResponse->setResponseBody('{"bankId":"RZOOAT2L523"}');

        $rawService = $this->buildRawServiceMock();
        $rawService->expects($this->once())
            ->method('rawRequest')
            ->with(
                PaysafeClient::REQUEST_METHOD_GET,
                'paymenthub/v1/banks',
                'accountId=12345612&countryCode=IT&currencyCode=EUR&paymentType=MBK',
                $options
            )
            ->willReturn($expectedResponse);

        $this->injectRawRequestService($client, $rawService);

        $response = $client->directRequest(
            PaysafeClient::REQUEST_METHOD_GET,
            'paymenthub/v1/banks',
            'accountId=12345612&countryCode=IT&currencyCode=EUR&paymentType=MBK',
            $options
        );

        $this->assertEquals(200, $response->getHttpStatusCode());
        $this->assertStringContainsString('RZOOAT2L523', $response->getResponseBody());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\PaysafeClient::directRequest
     */
    public function testDirectRequestPostWithSerializedBodyDelegatesToRawService(): void
    {
        $client = new PaysafeClient('merchantId:secretKey', Environment::TEST);
        $requestBody = '{"merchantRefNum":"abc-123","paymentType":"VIPPREFERRED"}';
        $options = new DirectRequestOptions();

        $expectedResponse = new PaysafeApiResponse();
        $expectedResponse->setHttpStatusCode(201);
        $expectedResponse->setHeaders(['Content-Type' => ['application/json']]);
        $expectedResponse->setResponseBody('{"id":"reg-123","status":"INITIATED"}');

        $rawService = $this->buildRawServiceMock();
        $rawService->expects($this->once())
            ->method('rawRequest')
            ->with(
                PaysafeClient::REQUEST_METHOD_POST,
                'paymenthub/v1/vippreferred/registrations',
                $requestBody,
                $options
            )
            ->willReturn($expectedResponse);

        $this->injectRawRequestService($client, $rawService);

        $response = $client->directRequest(
            PaysafeClient::REQUEST_METHOD_POST,
            'paymenthub/v1/vippreferred/registrations',
            $requestBody,
            $options
        );

        $this->assertEquals(201, $response->getHttpStatusCode());
        $this->assertStringContainsString('INITIATED', $response->getResponseBody());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\PaysafeClient::serialize
     * @covers \Paysafe\PhpSdk\PaysafeClient::deserialize
     */
    public function testSerializeDeserializeDelegatesToRawService(): void
    {
        $client = new PaysafeClient('merchantId:secretKey', Environment::TEST);

        $rawService = $this->buildRawServiceMock();
        $rawService->expects($this->once())
            ->method('serialize')
            ->with(['test' => 'testValue'])
            ->willReturn('{"test":"testValue"}');

        $rawService->expects($this->once())
            ->method('deserialize')
            ->with('{"test":"testValue"}', 'array')
            ->willReturn(['test' => 'testValue']);

        $this->injectRawRequestService($client, $rawService);

        $json = $client->serialize(['test' => 'testValue']);
        $deserialized = $client->deserialize($json, 'array');

        $this->assertStringContainsString('testValue', $json);
        $this->assertEquals('testValue', $deserialized['test']);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Client\RequestOptions::setMaxAutomaticRetries
     * @covers \Paysafe\PhpSdk\Client\RequestOptions::setConnectTimeout
     * @covers \Paysafe\PhpSdk\Client\RequestOptions::setResponseTimeout
     * @covers \Paysafe\PhpSdk\Client\DirectRequestOptions::setAdditionalHeaders
     * @covers \Paysafe\PhpSdk\Client\DirectRequestOptions::setRequestOptions
     */
    public function testDirectRequestOption(): void
    {
        $requestHeaders = ['MID' => '6571856178'];

        $requestOptions = (new RequestOptions())
            ->setConnectTimeout(10 * 1000)
            ->setResponseTimeout(20 * 1000)
            ->setMaxAutomaticRetries(3)
            ->setSimulator(RequestOptions::PAYMENT_SIMULATOR_INTERNAL);

        $options = (new DirectRequestOptions())
            ->setAdditionalHeaders($requestHeaders)
            ->setRequestOptions($requestOptions);

        $this->assertSame('6571856178', $options->getAdditionalHeaders()['MID']);
        $this->assertSame(10000, $options->getRequestOptions()->getConnectTimeout());
        $this->assertSame(20000, $options->getRequestOptions()->getResponseTimeout());
        $this->assertSame(3, $options->getRequestOptions()->getMaxAutomaticRetries());
        $this->assertSame(RequestOptions::PAYMENT_SIMULATOR_INTERNAL, $options->getRequestOptions()->getSimulator());
    }

    private function buildRawServiceMock(): RawRequestService
    {
        /** @var RawRequestService $mock */
        $mock = $this->getMockBuilder(RawRequestService::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['rawRequest', 'serialize', 'deserialize'])
            ->getMock();

        return $mock;
    }

    private function injectRawRequestService(PaysafeClient $client, RawRequestService $rawRequestService): void
    {
        $prop = new ReflectionProperty(PaysafeServices::class, 'rawRequestService');
        $prop->setAccessible(true);
        $prop->setValue($client, $rawRequestService);
    }
}
