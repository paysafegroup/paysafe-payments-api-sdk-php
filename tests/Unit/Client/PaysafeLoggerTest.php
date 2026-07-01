<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace Client;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Config\Environment;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Logging\LoggingLevel;
use Paysafe\PhpSdk\PaysafeClient;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class PaysafeLoggerTest extends TestCase
{
    /**
     * @test
     * @covers \Paysafe\PhpSdk\PaysafeClient::__construct
     */
    public function testDefaultLoggerExistsOnClient(): void
    {
        $client = new PaysafeClient('merchantId:secretKey', Environment::TEST);
        $this->assertInstanceOf(PaysafeClient::class, $client);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Client\PaysafeApiBase::buildJsonRequestBody
     */
    public function testCustomLoggerReceivesErrorOnSerializationFailure(): void
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())->method('error');
        $apiClient = new PaysafeApiClient('test_api_key', 'TEST', $logger, LoggingLevel::ERROR);
        $resource = fopen('php://memory', 'rb');

        $this->expectException(PaysafeSdkException::class);

        try {
            $apiClient->buildJsonRequestBody(['resource' => $resource]);
        } finally {
            fclose($resource);
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\PaysafeClient::setLogger
     * @covers \Paysafe\PhpSdk\Client\PaysafeApiBase::setLogger
     */
    public function testSetLoggerAfterConstructionIsApplied(): void
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->atLeastOnce())->method('error');

        $client = new PaysafeClient('merchantId:secretKey', Environment::TEST);
        $client->setLogger($logger);
        $client->setLoggingLevel(LoggingLevel::ALL);

        $apiClient = new PaysafeApiClient('test_api_key', 'TEST');
        $apiClient->setLogger($logger);
        $resource = fopen('php://memory', 'rb');

        $this->expectException(PaysafeSdkException::class);

        try {
            $apiClient->buildJsonRequestBody(['resource' => $resource]);
        } finally {
            fclose($resource);
        }
    }
}
