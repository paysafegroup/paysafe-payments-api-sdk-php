<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Client;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Config\Environment;
use Paysafe\PhpSdk\Exception\ApiConnectionException;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;

/**
 * Class PaysafeApiClient
 * Handles HTTP requests to the Paysafe Payments API.
 */
class PaysafeApiClient extends PaysafeApiBase
{
    private const CONNECTION_ERROR_MESSAGE = "Error connecting to %s, reason: %s";

    /**
     * @param RequestOptions|null $requestOptions
     *
     * @return Client
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

        if ($this->customSslContext) {
            if (isset($this->customSslContext['cert']) && isset($this->customSslContext['key'])) {
                $clientOptions[\GuzzleHttp\RequestOptions::CERT] = $this->customSslContext['cert'];
                $clientOptions[\GuzzleHttp\RequestOptions::SSL_KEY] = $this->customSslContext['key'];
            }

            if (isset($this->customSslContext['ca'])) {
                $clientOptions[\GuzzleHttp\RequestOptions::VERIFY] = $this->customSslContext['ca'];
            } else {
                $clientOptions[\GuzzleHttp\RequestOptions::VERIFY] = true; // Default to verifying SSL
            }
        }

        return new Client($clientOptions);
        
    }

    /**
     * @return string|null
     */
    private function attemptToBuildProxy(): ?string
    {
        if ($this->providedProxy !== null) {
            return $this->providedProxy;
        }

        $httpProxy = $this->getProxyFromEnvOrIni('http');
        if ($httpProxy !== null) {
            return $httpProxy;
        }

        return $this->getProxyFromEnvOrIni('https');
    }

    /**
     * @param string $type
     *
     * @return string|null
     */
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
    private function buildRequestOptionsToUse(RequestOptions $requestOptions = null): RequestOptions
    {
        $optionsToUse = new RequestOptions();

        if ($requestOptions !== null) {
            $optionsToUse->setConnectTimeout(
                $requestOptions->getConnectTimeout() ?? $this->clientConnectTimeout
            );
            $optionsToUse->setResponseTimeout(
                $requestOptions->getResponseTimeout() ?? $this->clientResponseTimeout
            );
            $optionsToUse->setMaxAutomaticRetries(
                $requestOptions->getMaxAutomaticRetries() ?? $this->clientMaxAutomaticRetries
            );
        } else {
            $optionsToUse->setConnectTimeout($this->clientConnectTimeout);
            $optionsToUse->setResponseTimeout($this->clientResponseTimeout);
            $optionsToUse->setMaxAutomaticRetries($this->clientMaxAutomaticRetries);
        }

        return $optionsToUse;
    }

    /**
     * <b>Use only for testing.</b> Overrides the base url for Paysafe Payments API endpoints
     * with provided value, i.e. of your mocked server.
     */
    public function overrideBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * Executes a GET request to the specified endpoint.
     *
     * @param string $endpoint The API endpoint to send the request to.
     * @param RequestOptions|null $requestOptions
     *
     * @return Response The response from the API.
     * @throws ApiConnectionException
     */
    public function executeGet(string $endpoint, ?RequestOptions $requestOptions = null): Response
    {
        $uri = $this->buildRequestUri($endpoint);
        $httpClient = $this->buildHttpClient($requestOptions);

        try {
            return $httpClient->get($uri, ['headers' => $this->setRequestHeaders()]);
        } catch (GuzzleException $e) {
            if (!$e->getCode()) {
                PaysafeLogger::getLogger()->error(
                    sprintf("Exception while executing GET request at %s: %s", $uri, $e->getMessage()),
                    ['exception' => $e]
                );
                throw new ApiConnectionException(sprintf(self::CONNECTION_ERROR_MESSAGE, $uri, $e->getMessage()));
            }

            return $e->getResponse();
        }
    }

    /**
     * Executes a POST request to the specified endpoint.
     *
     * @param string $endpoint The API endpoint to send the request to.
     * @param string $requestBody The body of the request.
     * @param ?RequestOptions $requestOptions
     *
     * @return Response The response from the API.
     * @throws PaysafeSdkException If an error occurs while making the request.
     * @throws Exception
     */
    public function executePost(string $endpoint, string $requestBody, ?RequestOptions $requestOptions): Response
    {
        $uri = $this->buildRequestUri($endpoint);
        $jsonRequestBody = json_decode($requestBody, true);
        $httpClient = $this->buildHttpClient($requestOptions);
        try {
            return $httpClient->post($uri, [
                'headers' => $this->addSimulatorToHeaders($this->setRequestHeaders(), $requestOptions),
                'json' => $jsonRequestBody
            ]);
        } catch (GuzzleException $e) {
            if (!$e->getCode()) {
                PaysafeLogger::getLogger()->error(
                    sprintf("Exception while executing POST request at %s: %s", $uri, $e->getMessage()),
                    ['exception' => $e]
                );
                throw new ApiConnectionException(
                    sprintf(self::CONNECTION_ERROR_MESSAGE, $uri, $e->getMessage())
                );
            }

            return $e->getResponse();
        }
    }

    /**
     * Executes a PUT request to the specified endpoint.
     *
     * @param string $endpoint The API endpoint to send the request to.
     * @param string $requestBody The body of the request.
     * @param RequestOptions|null $requestOptions
     *
     * @return Response The response from the API.
     * @throws PaysafeSdkException If an error occurs while making the request.
     * @throws Exception
     */
    public function executePut(string $endpoint, string $requestBody, ?RequestOptions $requestOptions): Response
    {
        $uri = $this->buildRequestUri($endpoint);
        $jsonRequestBody = json_decode($requestBody, true);
        $httpClient = $this->buildHttpClient($requestOptions);
        try {
            return $httpClient->put($uri, [
                'headers' => $this->addSimulatorToHeaders($this->setRequestHeaders(), $requestOptions),
                'json' => $jsonRequestBody
            ]);
        } catch (GuzzleException $e) {
            if (!$e->getCode()) {
                PaysafeLogger::getLogger()->error(
                    sprintf("Exception while executing PUT request at %s: %s", $uri, $e->getMessage()),
                    ['exception' => $e]
                );
                throw new ApiConnectionException(
                    sprintf(self::CONNECTION_ERROR_MESSAGE, $uri, $e->getMessage())
                );
            }

            return $e->getResponse();
        }
    }

    /**
     * Executes a PATCH request to the specified endpoint.
     *
     * @param string $endpoint The API endpoint to send the request to.
     * @param string $requestBody The body of the request.
     * @param RequestOptions|null $requestOptions
     *
     * @return Response The response from the API.
     * @throws PaysafeSdkException If an error occurs while making the request.
     * @throws Exception
     */
    public function executePatch(string $endpoint, string $requestBody, ?RequestOptions $requestOptions): Response
    {
        $uri = $this->buildRequestUri($endpoint);
        $jsonRequestBody = json_decode($requestBody, true);
        $httpClient = $this->buildHttpClient($requestOptions);
        try {
            return $httpClient->patch($uri, [
                'headers' => $this->addSimulatorToHeaders($this->setRequestHeaders(), $requestOptions),
                'json' => $jsonRequestBody
            ]);
        } catch (GuzzleException $e) {
            if (!$e->getCode()) {
                PaysafeLogger::getLogger()->error(
                    sprintf("Exception while executing PATCH request at %s: %s", $uri, $e->getMessage()),
                    ['exception' => $e]
                );
                throw new ApiConnectionException(
                    sprintf(self::CONNECTION_ERROR_MESSAGE, $uri, $e->getMessage())
                );
            }

            return $e->getResponse();
        }
    }

    /**
     * Executes a DELETE request to the specified endpoint.
     *
     * @param string $endpoint The API endpoint to send the request to.
     * @param RequestOptions|null $requestOptions
     *
     * @return Response The response from the API.
     *
     * @throws PaysafeSdkException If an error occurs while making the request.
     * @throws Exception
     */
    public function executeDelete(string $endpoint, ?RequestOptions $requestOptions): Response
    {
        $uri = $this->buildRequestUri($endpoint);
        $httpClient = $this->buildHttpClient($requestOptions);
        try {
            return $httpClient->delete(
                $uri,
                ['headers' => $this->addSimulatorToHeaders($this->setRequestHeaders(), $requestOptions)]
            );
        } catch (GuzzleException $e) {
            if (!$e->getCode()) {
                PaysafeLogger::getLogger()->error(
                    sprintf("Exception while executing DELETE request at %s: %s", $uri, $e->getMessage()),
                    ['exception' => $e]
                );
                throw new ApiConnectionException(
                    sprintf(self::CONNECTION_ERROR_MESSAGE, $uri, $e->getMessage())
                );
            }

            return $e->getResponse();
        }
    }

    private function addSimulatorToHeaders(array $headers, RequestOptions $requestOptions = null): array
    {
        if (
            $this->environment === Environment::TEST &&
            $requestOptions !== null
        ) {
            $simulator = $requestOptions->getSimulator();

            if ($simulator !== null) {
                $headers['Simulator'] = $simulator;
            }
        }
        return $headers;
    }

    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function setClientMaxAutomaticRetries(string $clientMaxAutomaticRetries)
    {
        $this->clientMaxAutomaticRetries = $clientMaxAutomaticRetries;
    }

    public function setClientResponseTimeout(?int $clientResponseTimeout)
    {
        $this->clientResponseTimeout = $clientResponseTimeout;
    }

    public function setClientConnectTimeout(?int $connectTimeout)
    {
        $this->clientConnectTimeout = $connectTimeout;
    }

    public function setProxy(string $proxy)
    {
        $this->providedProxy = $proxy;
    }

    public function setSslContext(array $sslContext)
    {
        $this->customSslContext = $sslContext;
    }
}
