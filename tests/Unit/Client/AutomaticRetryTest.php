<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace Client;

use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use Paysafe\PhpSdk\Client\AutomaticRetry;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\RequestInterface;

class AutomaticRetryTest extends TestCase
{

    /**
     * @covers AutomaticRetry::getMiddleware
     * @covers AutomaticRetry::retryRequest
     * @covers AutomaticRetry::getRetryInterval
     */
    public function testAutomaticRetryMiddleware()
    {
        // Create a mock handler that simulates two failures before success
        $mock = new MockHandler([
            new RequestException("Server error", new Request('GET', 'test')), // First request fails
            new RequestException("Server error", new Request('GET', 'test')), // First retry fails
            new Response(200, [], 'Success') // Second retry succeeds
        ]);

        // Set retry limit to 2 (matches failures in mock)
        $automaticRetry = new AutomaticRetry(2);

        // Create handler stack and attach middleware
        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push($automaticRetry->getMiddleware());

        // Create a Guzzle client
        $client = new Client(['handler' => $handlerStack]);

        // Send request and verify the final response
        $response = $client->request('GET', 'test');

        // Assertions to verify that request was eventually successful
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Success', (string)$response->getBody());
    }

    /**
     * @covers AutomaticRetry::getMiddleware
     * @covers AutomaticRetry::retryRequest
     */
    public function testRetryExceedsLimit()
    {
        // Create a mock handler that always fails beyond retry limit
        $mock = new MockHandler([
            new RequestException("Server error", new Request('GET', 'test')),
            // First request fails
            new RequestException("Server error", new Request('GET', 'test')),
            // First retry fails
            new RequestException("Server error", new Request('GET', 'test'))
            // Second retry fails (retry limit reached)
        ]);

        // Set retry limit to 2 (matches failures in mock)
        $automaticRetry = new AutomaticRetry(2);

        // Create handler stack and attach middleware
        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push($automaticRetry->getMiddleware());

        // Create a Guzzle client
        $client = new Client(['handler' => $handlerStack]);

        // Expect a RequestException when the retry limit is exceeded
        $this->expectException(RequestException::class);

        // Send request, expecting it to fail after exhausting retry attempts
        $client->request('GET', 'test');
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\AutomaticRetry::__construct
     */
    public function testConstructorValidValues() {
        $retry = new AutomaticRetry(3);
        $this->assertInstanceOf(AutomaticRetry::class, $retry);
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\AutomaticRetry::__construct
     */
    public function testConstructorThrowsExceptionForTooManyRetries() {
        $this->expectException(InvalidArgumentException::class);
        new AutomaticRetry(6);
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\AutomaticRetry::__construct
     */
    public function testConstructorThrowsExceptionForNegativeRetries() {
        $this->expectException(InvalidArgumentException::class);
        new AutomaticRetry(-1);
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\AutomaticRetry::retryRequest
     */
    public function testRetryRequestWithGetMethodAndWithinLimit() {
        $retry = new AutomaticRetry(3);
        $this->assertTrue($retry->retryRequest('GET', 2));
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\AutomaticRetry::retryRequest
     */
    public function testRetryRequestWithGetMethodAndExceedLimit() {
        $retry = new AutomaticRetry(3);
        $this->assertFalse($retry->retryRequest('GET', 4));
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\AutomaticRetry::retryRequest
     */
    public function testRetryRequestWithNonGetMethod() {
        $retry = new AutomaticRetry(3);
        $this->assertFalse($retry->retryRequest('POST', 2));
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\AutomaticRetry::getRetryInterval
     */
    public function testGetRetryInterval() {
        $retry = new AutomaticRetry(3);
        $this->assertLessThanOrEqual(100, $retry->getRetryInterval(1));
        $this->assertLessThanOrEqual(300, $retry->getRetryInterval(2));
        $this->assertLessThanOrEqual(900, $retry->getRetryInterval(3));
    }

    /**
     * @covers \Paysafe\PhpSdk\Client\AutomaticRetry::getRetryInterval
     */
    public function testGetRetryIntervalNoJitter() {
        $retry = new AutomaticRetry(3, false);
        $this->assertEquals(100, $retry->getRetryInterval(1));
        $this->assertEquals(300, $retry->getRetryInterval(2));
        $this->assertEquals(900, $retry->getRetryInterval(3));
    }
}
