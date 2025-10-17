<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace Client;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use InvalidArgumentException;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\PaysafeLogger;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Verification\Verification;
use Paysafe\PhpSdk\Validation\ErrorMessages;
use PHPUnit\Framework\TestCase;

class PaysafeApiClientTest extends TestCase
{
    /**
     * @covers \Paysafe\PhpSdk\Client\PaysafeApiClient::validateRequestOptions
     */
    public function testValidateRequestOptionsValidValues() {
        $requestOptions = new RequestOptions();
        $requestOptions->setMaxAutomaticRetries(3);
        $requestOptions->setConnectTimeout(5);
        $requestOptions->setResponseTimeout(10);

        $this->expectNotToPerformAssertions();
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\PaysafeApiClient::validateRequestOptions
     */
    public function testValidateRequestOptionsThrowsExceptionForTooManyRetries() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(ErrorMessages::MESSAGE_MAXIMUM_ALLOWED_NUMBER_OF_AUTOMATIC_RETRIES);

        $requestOptions = new RequestOptions();
        $requestOptions->setMaxAutomaticRetries(6);
        PaysafeApiClient::validateRequestOptions($requestOptions);
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\PaysafeApiClient::validateRequestOptions
     */
    public function testValidateRequestOptionsThrowsExceptionForNegativeRetries() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(ErrorMessages::MESSAGE_MAXIMUM_AUTOMATIC_RETRIES_CANNOT_BE_NEGATIVE);

        $requestOptions = new RequestOptions();
        $requestOptions->setMaxAutomaticRetries(-1);
        PaysafeApiClient::validateRequestOptions($requestOptions);
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\PaysafeApiClient::validateRequestOptions
     */
    public function testValidateRequestOptionsThrowsExceptionForZeroConnectTimeout() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(ErrorMessages::MESSAGE_CONNECT_TIMEOUT_MUST_BE_A_POSITIVE_VALUE);

        $requestOptions = new RequestOptions();
        $requestOptions->setConnectTimeout(0);
        PaysafeApiClient::validateRequestOptions($requestOptions);
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\PaysafeApiClient::validateRequestOptions
     */
    public function testValidateRequestOptionsThrowsExceptionForNegativeResponseTimeout() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(ErrorMessages::MESSAGE_RESPONSE_TIMEOUT_MUST_BE_A_POSITIVE_VALUE);

        $requestOptions = new RequestOptions();
        $requestOptions->setResponseTimeout(-5);
        PaysafeApiClient::validateRequestOptions($requestOptions);
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\PaysafeApiClient::buildHttpClient
     */
    public function testBuildHttpClientCreatesClientSuccessfully() {
        $apiClient = new PaysafeApiClient('test_api_key');

        $requestOptions = new RequestOptions();
        $requestOptions->setMaxAutomaticRetries(3);
        $requestOptions->setConnectTimeout(5);
        $requestOptions->setResponseTimeout(10);

        $client = $apiClient->buildHttpClient($requestOptions);

        $this->assertInstanceOf(Client::class, $client);
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\PaysafeApiClient::buildHttpClient
     */
    public function testBuildHttpClientThrowsExceptionForInvalidRequestOptions() {
        $apiClient = new PaysafeApiClient('test_api_key');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(ErrorMessages::MESSAGE_MAXIMUM_ALLOWED_NUMBER_OF_AUTOMATIC_RETRIES);

        $requestOptions = new RequestOptions();
        $requestOptions->setMaxAutomaticRetries(6);
        $requestOptions->setConnectTimeout(5);
        $requestOptions->setResponseTimeout(10);

        $apiClient->buildHttpClient($requestOptions);
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\PaysafeApiClient::buildHttpClient
     */
    public function testBuildHttpClientThrowsExceptionForNegativeRetries() {
        $apiClient = new PaysafeApiClient('test_api_key');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(ErrorMessages::MESSAGE_MAXIMUM_AUTOMATIC_RETRIES_CANNOT_BE_NEGATIVE);

        $requestOptions = new RequestOptions();
        $requestOptions->setMaxAutomaticRetries(-1);
        $apiClient->buildHttpClient($requestOptions);
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\PaysafeApiClient::buildHttpClient
     */
    public function testBuildHttpClientThrowsExceptionForZeroConnectTimeout() {
        $apiClient = new PaysafeApiClient('test_api_key');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(ErrorMessages::MESSAGE_CONNECT_TIMEOUT_MUST_BE_A_POSITIVE_VALUE);

        $requestOptions = new RequestOptions();
        $requestOptions->setConnectTimeout(0);

        $apiClient->buildHttpClient($requestOptions);
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\PaysafeApiClient::buildHttpClient
     */
    public function testBuildHttpClientThrowsExceptionForNegativeResponseTimeout() {
        $apiClient = new PaysafeApiClient('test_api_key');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(ErrorMessages::MESSAGE_RESPONSE_TIMEOUT_MUST_BE_A_POSITIVE_VALUE);


        $requestOptions = new RequestOptions();
        $requestOptions->setResponseTimeout(-5);

        $apiClient->buildHttpClient($requestOptions);
    }

    /**
     * @covers ProxyHandler::getClient
     * @covers ProxyHandler::attemptToBuildProxy
     */
    public function testProxyProvided(): void
    {
        $apiClient = new PaysafeApiClient('test_api_key', 'TEST');
        $apiClient->setProxy('http://custom-proxy:8080');
        $client = $apiClient->buildHttpClient();

        $this->assertArrayHasKey(\GuzzleHttp\RequestOptions::PROXY, $client->getConfig());
        $this->assertEquals('http://custom-proxy:8080', $client->getConfig(\GuzzleHttp\RequestOptions::PROXY));
    }

    /**
     * @covers ProxyHandler::getClient
     * @covers ProxyHandler::attemptToBuildProxy
     */
    public function testProxyFromEnvironment(): void
    {
        putenv('http_proxyHost=env-proxy');
        putenv('http_proxyPort=9090');

        $apiClient = new PaysafeApiClient('test_api_key', 'TEST');
        $client = $apiClient->buildHttpClient();

        $this->assertArrayHasKey(\GuzzleHttp\RequestOptions::PROXY, $client->getConfig());
        $this->assertEquals('http://env-proxy:9090', $client->getConfig(\GuzzleHttp\RequestOptions::PROXY));

        putenv('http_proxyHost');
        putenv('http_proxyPort');
    }

    /**
     * @covers ProxyHandler::getClient
     * @covers ProxyHandler::attemptToBuildProxy
     */
    public function testNoProxy(): void
    {
        $apiClient = new PaysafeApiClient('test_api_key', 'TEST');
        $client = $apiClient->buildHttpClient();

        $this->assertArrayNotHasKey(\GuzzleHttp\RequestOptions::PROXY, $client->getConfig());
    }

    /**
     * @covers ProxyHandler::getClient
     */
    public function testSslContextProvided(): void {
        $sslOptions = [
            'cert' => '/path/to/client-cert.pem',
            'key'  => '/path/to/client-key.pem',
            'ca'   => '/path/to/ca-cert.pem'
        ];


        $apiClient = new PaysafeApiClient('test_api_key', 'TEST');
        $apiClient->setSslContext($sslOptions);
        $client = $apiClient->buildHttpClient();

        $this->assertArrayHasKey(\GuzzleHttp\RequestOptions::CERT, $client->getConfig());
        $this->assertEquals('/path/to/client-cert.pem', $client->getConfig(\GuzzleHttp\RequestOptions::CERT));
        $this->assertEquals('/path/to/client-key.pem', $client->getConfig(\GuzzleHttp\RequestOptions::SSL_KEY));
        $this->assertEquals('/path/to/ca-cert.pem', $client->getConfig(\GuzzleHttp\RequestOptions::VERIFY));
    }

    /**
     * @covers ProxyHandler::getClient
     */
    public function testSslContextDefaultVerify(): void {
        $sslOptions = [
            'cert' => '/path/to/client-cert.pem',
            'key'  => '/path/to/client-key.pem'
        ];

        $apiClient = new PaysafeApiClient('test_api_key', 'TEST');
        $apiClient->setSslContext($sslOptions);
        $client = $apiClient->buildHttpClient();
        
        $this->assertArrayHasKey(\GuzzleHttp\RequestOptions::CERT, $client->getConfig());
        $this->assertEquals('/path/to/client-cert.pem', $client->getConfig(\GuzzleHttp\RequestOptions::CERT));
        $this->assertEquals('/path/to/client-key.pem', $client->getConfig(\GuzzleHttp\RequestOptions::SSL_KEY));
        $this->assertTrue($client->getConfig(\GuzzleHttp\RequestOptions::VERIFY));
    }
    /**
     * @covers PaysafeApiClient::processResponse
     */
    public function testLogIsCreatedOnException(): void
    {
        $logFile = tempnam(sys_get_temp_dir(), 'paysafe_log_');
        
        if (file_exists($logFile)) {
            unlink($logFile);
        }

        $handler = new StreamHandler($logFile, Logger::WARNING);

        $apiClient = new PaysafeApiClient('test_api_key', 'TEST');
        PaysafeLogger::addLoggerHandler($handler);

        $this->expectException(PaysafeSdkException::class);
        PaysafeApiClient::processResponse(new Response(), Verification::class);

        $this->assertFileExists($logFile);

        $contents = file_get_contents($logFile);
        $this->assertStringContainsString('Exception while processing response from PaymentsAPI', $contents);
        unlink($logFile);
    }
}
