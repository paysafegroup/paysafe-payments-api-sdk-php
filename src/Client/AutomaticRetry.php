<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Client;

use GuzzleHttp\Middleware;
use InvalidArgumentException;
use Paysafe\PhpSdk\Validation\ErrorMessages;
use Psr\Http\Message\RequestInterface;

class AutomaticRetry
{
    private int $maxAutomaticRetries;
    private bool $applyJitter;

    /**
     *
     * @param int $maxAutomaticRetries Maximum number of retries.
     */
    public function __construct(int $maxAutomaticRetries, bool $applyJitter = true)
    {
        if ($maxAutomaticRetries > 5) {
            throw new InvalidArgumentException(
                ErrorMessages::MESSAGE_MAXIMUM_ALLOWED_NUMBER_OF_AUTOMATIC_RETRIES
            );
        }
        if ($maxAutomaticRetries < 0) {
            throw new InvalidArgumentException(
                ErrorMessages::MESSAGE_MAXIMUM_AUTOMATIC_RETRIES_CANNOT_BE_NEGATIVE
            );
        }

        $this->maxAutomaticRetries = $maxAutomaticRetries;
        $this->applyJitter = $applyJitter;
    }

    /**
     * Determines whether a request should be retried based on the request method and retry count.
     *
     * @param string $method HTTP request method.
     * @param int $executionCount Number of retries attempted.
     * @return bool True if the request should be retried, false otherwise.
     */
    public function retryRequest(string $method, int $executionCount): bool
    {
        if (strtoupper($method) !== 'GET') {
            return false;
        }
        return $executionCount < $this->maxAutomaticRetries;
    }

    /**
     * Calculates the retry interval using an exponential backoff strategy.
     * Initial retry interval is 100 milliseconds and it is increased exponentially.
     *
     * @param int $executionCount Number of retries attempted.
     * @return int Retry interval in milliseconds.
     */
    public function getRetryInterval(int $executionCount): int
    {
        $delay = 100;
        for ($i = 1; $i < $executionCount; $i++) {
            $delay *= 3;
        }

        if ($this->applyJitter) {
            $jitter = mt_rand(750, 1000) / 1000; // 0.75 to 1.00 inclusive
            $delay = (int) round($delay * $jitter); // result in milliseconds
        }

        return $delay;

    }

    /**
     * Creates a Guzzle Middleware for automatic retries.
     *
     * @return callable
     */
    public function getMiddleware(): callable
    {
        return Middleware::retry(
            function (
                $retries,
                RequestInterface $request
            ) {
                return $this->retryRequest($request->getMethod(), $retries);
            },
            function ($retries) {
                return $this->getRetryInterval($retries);
            }
        );
    }
}
