<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Client;

/**
 * Immutable value object representing a raw API response.
 */
class PaysafeApiResponse
{
    private int $httpStatusCode;
    /** @var array<string, list<string>> */
    private array $headers = [];
    private string $responseBody;

    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    public function setHttpStatusCode(int $httpStatusCode): void
    {
        $this->httpStatusCode = $httpStatusCode;
    }

    /**
     * @return array<string, list<string>>
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array<string, list<string>> $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function getResponseBody(): string
    {
        return $this->responseBody;
    }

    public function setResponseBody(string $responseBody): void
    {
        $this->responseBody = $responseBody;
    }
}
