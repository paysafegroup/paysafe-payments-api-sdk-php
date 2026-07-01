<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

declare(strict_types=1);
namespace Paysafe\PhpSdk\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Config\Environment;
use Paysafe\PhpSdk\Exception\ApiConnectionException;

/**
 * Concrete HTTP client for the Paysafe Payments API.
 *
 * Handles all outgoing HTTP requests (GET, POST, PUT, PATCH, DELETE) with
 * automatic retry middleware, proxy resolution, custom SSL context, and
 * centralized error handling.
 *
 * Not intended for direct use — access via {@see \Paysafe\PhpSdk\PaysafeClient}.
 *
 * @internal
 */
class PaysafeApiClient extends PaysafeApiBase
{
    private const CONNECTION_ERROR_MESSAGE = "Error connecting to Paysafe API";

    /**
     * Builds a configured Guzzle HTTP client with retry middleware, proxy, and SSL settings.
     */
    public function buildHttpClient(?RequestOptions $requestOptions = null): Client
    {
        if ($requestOptions !== null) {
            self::validateRequestOptions($requestOptions);
        }

        $optionsToUse = $this->buildRequestOptionsToUse($requestOptions);

        $stack = HandlerStack::create();
        $retryMiddleware = new AutomaticRetry($optionsToUse->getMaxAutomaticRetries());
        $stack->push($retryMiddleware->getMiddleware());

        $clientOptions = [
            'handler' => $stack,
            'connect_timeout' => $optionsToUse->getConnectTimeout(),
            'timeout' => $optionsToUse->getResponseTimeout(),
        ];

        if ($proxy = $this->attemptToBuildProxy()) {
            $clientOptions[\GuzzleHttp\RequestOptions::PROXY] = $proxy;
        }

        if ($this->customSslContext !== null) {
            if (isset($this->customSslContext['cert'], $this->customSslContext['key'])) {
                $clientOptions[\GuzzleHttp\RequestOptions::CERT] = $this->customSslContext['cert'];
                $clientOptions[\GuzzleHttp\RequestOptions::SSL_KEY] = $this->customSslContext['key'];
            }

            $clientOptions[\GuzzleHttp\RequestOptions::VERIFY] = $this->customSslContext['ca'] ?? true;
        }

        return new Client($clientOptions);
    }

    private function attemptToBuildProxy(): ?string
    {
        return $this->providedProxy
            ?? $this->getProxyFromEnvOrIni('http')
            ?? $this->getProxyFromEnvOrIni('https');
    }

    private function getProxyFromEnvOrIni(string $type): ?string
    {
        $hostKey = "{$type}_proxyHost";
        $portKey = "{$type}_proxyPort";

        $host = getenv($hostKey) ?: ini_get(str_replace('_', '.', $hostKey));
        $port = getenv($portKey) ?: ini_get(str_replace('_', '.', $portKey));

        if ($host && $port) {
            $protocol = $type === 'https' ? 'https' : 'http';
            return "$protocol://$host:$port";
        }

        return null;
    }

    /**
     * Builds request options with default values if not provided.
     */
    private function buildRequestOptionsToUse(?RequestOptions $requestOptions = null): RequestOptions
    {
        if ($requestOptions === null) {
            return new RequestOptions(
                $this->clientConnectTimeout,
                $this->clientResponseTimeout,
                $this->clientMaxAutomaticRetries
            );
        }

        $effectiveOptions = $requestOptions;
        if ($requestOptions instanceof DirectRequestOptions && $requestOptions->getRequestOptions() !== null) {
            $effectiveOptions = $requestOptions->getRequestOptions();
        }

        return new RequestOptions(
            $effectiveOptions->getConnectTimeout() ?? $this->clientConnectTimeout,
            $effectiveOptions->getResponseTimeout() ?? $this->clientResponseTimeout,
            $effectiveOptions->getMaxAutomaticRetries() ?? $this->clientMaxAutomaticRetries,
            $effectiveOptions->getSimulator()
        );
    }

    /**
     * <b>Use only for testing.</b> Overrides the base url for Paysafe Payments API endpoints
     * with provided value, i.e. of your mocked server.
     */
    public function overrideBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * Builds a structured log message:
     * "{action} {METHOD} request {uri}"
     */
    private function buildLogMessage(string $action, string $method, string $uri): string
    {
        return sprintf('%s %s request %s', $action, strtoupper($method), $uri);
    }

    /**
     * Logs a response: success via logEvent (ALL level), errors via logError (always).
     */
    private function logResponse(string $method, string $uri, Response $response): void
    {
        $body       = $response->getBody()->getContents();
        $response->getBody()->rewind();
        $decoded    = json_decode($body, true) ?? $body;
        $statusCode = $response->getStatusCode();

        if ($statusCode >= 200 && $statusCode < 300) {
            $this->logEvent(
                $this->buildLogMessage('Received response to', $method, $uri),
                ['statusCode' => $statusCode, 'body' => $decoded]
            );
        } else {
            $this->logError(
                $this->buildLogMessage('Received error response to', $method, $uri),
                new \RuntimeException("HTTP $statusCode"),
                ['statusCode' => $statusCode, 'body' => $decoded]
            );
        }
    }

    /**
     * Core request executor. All public execute* methods delegate here.
     *
     * @throws ApiConnectionException When the API is unreachable.
     */
    private function doRequest(
        string $method,
        string $endpoint,
        ?string $requestBody,
        ?RequestOptions $requestOptions
    ): Response {
        $uri = $this->buildRequestUri($endpoint);
        $httpClient = $this->buildHttpClient($requestOptions);

        $this->logEvent(
            $this->buildLogMessage('Executing', $method, $uri),
            ['body' => $requestBody !== null ? json_decode($requestBody, true) : null]
        );

        $options = [
            'headers' => $this->addSimulatorToHeaders($this->setRequestHeaders(), $requestOptions),
        ];

        if ($requestBody !== null && $this->isRequestWithBody($method)) {
            $options['json'] = json_decode($requestBody, true);
        }

        try {
            $response = $httpClient->request(strtoupper($method), $uri, $options);
            $this->logResponse($method, $uri, $response);
            return $response;
        } catch (GuzzleException $e) {
            if (!$e->getCode()) {
                $this->logError(
                    sprintf("Exception while executing %s request at %s: %s", strtoupper($method), $uri, $e->getMessage()),
                    $e
                );
                throw new ApiConnectionException(self::CONNECTION_ERROR_MESSAGE);
            }

            $errorResponse = $e->getResponse();
            if ($errorResponse !== null) {
                $this->logResponse($method, $uri, $errorResponse);
            }
            return $errorResponse;
        }
    }

    /**
     * Executes a GET request to the specified endpoint.
     *
     * @throws ApiConnectionException
     */
    public function executeGet(string $endpoint, ?RequestOptions $requestOptions = null): Response
    {
        return $this->doRequest('GET', $endpoint, null, $requestOptions);
    }

    /**
     * Executes a POST request to the specified endpoint.
     *
     * @throws ApiConnectionException
     */
    public function executePost(string $endpoint, string $requestBody, ?RequestOptions $requestOptions): Response
    {
        return $this->doRequest('POST', $endpoint, $requestBody, $requestOptions);
    }

    /**
     * Executes a PUT request to the specified endpoint.
     *
     * @throws ApiConnectionException
     */
    public function executePut(string $endpoint, string $requestBody, ?RequestOptions $requestOptions): Response
    {
        return $this->doRequest('PUT', $endpoint, $requestBody, $requestOptions);
    }

    /**
     * Executes a PATCH request to the specified endpoint.
     *
     * @throws ApiConnectionException
     */
    public function executePatch(string $endpoint, string $requestBody, ?RequestOptions $requestOptions): Response
    {
        return $this->doRequest('PATCH', $endpoint, $requestBody, $requestOptions);
    }

    /**
     * Executes a DELETE request to the specified endpoint.
     *
     * @throws ApiConnectionException
     */
    public function executeDelete(string $endpoint, ?RequestOptions $requestOptions): Response
    {
        return $this->doRequest('DELETE', $endpoint, null, $requestOptions);
    }

    /**
     * Executes a raw HTTP request with the specified method.
     *
     * @throws ApiConnectionException
     */
    public function executeRaw(
        string $method,
        string $endpoint,
        ?string $requestBody = null,
        ?DirectRequestOptions $directRequestOptions = null
    ): Response {
        return $this->doRequest($method, $endpoint, $requestBody, $directRequestOptions);
    }

    /**
     * @param array<string, string> $headers
     * @return array<string, string>
     */
    private function addSimulatorToHeaders(array $headers, ?RequestOptions $requestOptions = null): array
    {
        if (
            $this->environment === Environment::TEST &&
            $requestOptions !== null
        ) {
            $effectiveOptions = $requestOptions;
            if ($requestOptions instanceof DirectRequestOptions && $requestOptions->getRequestOptions() !== null) {
                $effectiveOptions = $requestOptions->getRequestOptions();
            }

            $simulator = $effectiveOptions->getSimulator();

            if ($simulator !== null) {
                $headers['Simulator'] = $simulator;
            }
        }

        if ($requestOptions instanceof DirectRequestOptions && count($requestOptions->getCustomHeaders()) > 0) {
            foreach ($requestOptions->getCustomHeaders() as $name => $value) {
                $headers[$name] = $value;
            }
        }

        return $headers;
    }

    public function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    public function setClientMaxAutomaticRetries(int $clientMaxAutomaticRetries): void
    {
        $this->clientMaxAutomaticRetries = $clientMaxAutomaticRetries;
    }

    public function setClientResponseTimeout(int $clientResponseTimeout): void
    {
        $this->clientResponseTimeout = $clientResponseTimeout;
    }

    public function setClientConnectTimeout(int $connectTimeout): void
    {
        $this->clientConnectTimeout = $connectTimeout;
    }

    public function setProxy(string $proxy): void
    {
        $this->providedProxy = $proxy;
    }

    public function setSslContext(array $sslContext): void
    {
        $this->customSslContext = $sslContext;
    }

    /**
     * Whether the request method typically carries a body.
     */
    private function isRequestWithBody(string $method): bool
    {
        return in_array(strtoupper($method), ['POST', 'PUT', 'PATCH'], true);
    }

    /**
     * Process a raw response and return a PaysafeApiResponse object.
     */
    public static function handleApiResponse(Response $response): PaysafeApiResponse
    {
        $paysafeApiResponse = new PaysafeApiResponse();
        $paysafeApiResponse->setHttpStatusCode($response->getStatusCode());
        $paysafeApiResponse->setHeaders($response->getHeaders());
        $paysafeApiResponse->setResponseBody($response->getBody()->getContents());

        return $paysafeApiResponse;
    }
}
