<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk;

use Monolog\Handler\ErrorLogHandler;
use Monolog\Logger;
use Paysafe\PhpSdk\Client\DirectRequestOptions;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\PaysafeApiResponse;
use Paysafe\PhpSdk\Client\PaysafeServices;
use Paysafe\PhpSdk\Config\Environment;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Logging\LoggingLevel;
use Psr\Log\LoggerInterface;
use Paysafe\PhpSdk\Validation\PropertyValidator;

class PaysafeClient extends PaysafeServices
{
    public const REQUEST_METHOD_GET = 'GET';
    public const REQUEST_METHOD_POST = 'POST';
    public const REQUEST_METHOD_PUT = 'PUT';
    public const REQUEST_METHOD_PATCH = 'PATCH';
    public const REQUEST_METHOD_DELETE = 'DELETE';

    /** @var int|null Connection timeout in seconds, null = SDK default (30s). */
    private ?int $connectTimeout = null;

    /** @var int|null Response timeout in seconds, null = SDK default (60s). */
    private ?int $responseTimeout = null;

    /** @var int|null Max automatic GET retries, null = SDK default (2). */
    private ?int $maxAutomaticRetries = null;

    /** @var string API key in format merchantId:secretKey. */
    private string $apiKey;

    /** @var string Environment identifier ("TEST" or "LIVE"). */
    private string $environment;

    /**
     * Constructs a PaysafeClient with provided credentials and environment.
     *
     * @param string $apiKey     Private API key in format merchantId:secretKey.
     * @param string $environment Paysafe environment — use {@see Environment::TEST} or {@see Environment::LIVE}.
     * @param LoggerInterface|null $logger PSR-3 logger for SDK-level events; defaults to Monolog logger.
     * @param string $loggingLevel Logging level for the SDK; defaults to ERROR.
     *
     * @throws \InvalidArgumentException If $apiKey is blank or does not match format "id:key".
     */
    public function __construct(
        string $apiKey,
        string $environment = Environment::TEST,
        ?LoggerInterface $logger = null,
        string $loggingLevel = LoggingLevel::ERROR
    ) {
        $this->apiKey = $apiKey;
        $this->environment = $environment;

        PropertyValidator::validateApiKey($this->apiKey);
        LoggingLevel::validate($loggingLevel);

        $this->logger = $logger ?? new Logger('PaysafeSdk', [new ErrorLogHandler()]);
        $this->loggingLevel = $loggingLevel;

        $this->paysafeApiClient = new PaysafeApiClient(
            $apiKey,
            $environment,
            $this->logger,
            $this->loggingLevel
        );
    }

    /**
     * Returns the API key used by this client.
     *
     * @return string API key in format merchantId:secretKey.
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * Replaces the API key for this client and the underlying HTTP client.
     *
     * @param string $apiKey New API key in format merchantId:secretKey.
     *
     * @return void
     *
     * @throws \InvalidArgumentException If $apiKey is blank or does not match format "id:key".
     */
    public function setApiKey(string $apiKey): void
    {
        PropertyValidator::validateApiKey($apiKey);
        $this->apiKey = $apiKey;
        $this->paysafeApiClient->setApiKey($apiKey);
    }

    /**
     * Returns the current environment ("TEST" or "LIVE").
     *
     * @return string
     */
    public function getEnvironment(): string
    {
        return $this->environment;
    }

    /**
     * Sets a PSR-3 logger for this client instance.
     * Replaces the logger on the underlying HTTP client and all services.
     *
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
        $this->paysafeApiClient->setLogger($logger);
    }

    /**
     * Fluent logger setter (builder-like usage).
     */
    public function logger(LoggerInterface $logger): self
    {
        $this->setLogger($logger);
        return $this;
    }

    /**
     * Sets SDK logging level.
     */
    public function setLoggingLevel(string $loggingLevel): void
    {
        LoggingLevel::validate($loggingLevel);
        $this->loggingLevel = $loggingLevel;
        $this->paysafeApiClient->setLoggingLevel($loggingLevel);
    }

    /**
     * Fluent logging level setter (builder-like usage).
     */
    public function loggingLevel(string $loggingLevel): self
    {
        $this->setLoggingLevel($loggingLevel);
        return $this;
    }

    /**
     * Returns the configured max automatic retries, or null if using SDK default.
     *
     * @return int|null
     */
    public function getMaxAutomaticRetries(): ?int
    {
        return $this->maxAutomaticRetries;
    }

    /**
     * Sets the max automatic retries for GET requests on network failures.
     *
     * @param int $maxAutomaticRetries Value between 0 and 5 inclusive.
     *
     * @return void
     *
     * @throws \InvalidArgumentException If value is negative or exceeds 5.
     */
    public function setMaxAutomaticRetries(int $maxAutomaticRetries): void
    {
        PropertyValidator::validateMaxAutomaticRetries($maxAutomaticRetries);
        $this->maxAutomaticRetries = $maxAutomaticRetries;
        $this->paysafeApiClient->setClientMaxAutomaticRetries($maxAutomaticRetries);
    }

    /**
     * Returns the configured response timeout in seconds, or null if using SDK default.
     *
     * @return int|null
     */
    public function getResponseTimeout(): ?int
    {
        return $this->responseTimeout;
    }

    /**
     * Sets the response (read) timeout in seconds.
     *
     * @param int $responseTimeout Positive integer in seconds.
     *
     * @return void
     *
     * @throws \InvalidArgumentException If value is zero or negative.
     */
    public function setResponseTimeout(int $responseTimeout): void
    {
        PropertyValidator::validateResponseTimeout($responseTimeout);
        $this->responseTimeout = $responseTimeout;
        $this->paysafeApiClient->setClientResponseTimeout($responseTimeout);
    }

    /**
     * Returns the configured connection timeout in seconds, or null if using SDK default.
     *
     * @return int|null
     */
    public function getConnectTimeout(): ?int
    {
        return $this->connectTimeout;
    }

    /**
     * Sets the connection timeout in seconds.
     *
     * @param int $connectTimeout Positive integer in seconds.
     *
     * @return void
     *
     * @throws \InvalidArgumentException If value is zero or negative.
     */
    public function setConnectTimeout(int $connectTimeout): void
    {
        PropertyValidator::validateConnectTimeout($connectTimeout);
        $this->connectTimeout = $connectTimeout;
        $this->paysafeApiClient->setClientConnectTimeout($connectTimeout);
    }

    /**
     * Configures an HTTP proxy for all outgoing requests.
     *
     * @param string $proxy Proxy URL, e.g. "http://proxy-host:8080".
     *
     * @return void
     */
    public function setProxy(string $proxy): void
    {
        $this->paysafeApiClient->setProxy($proxy);
    }

    /**
     * Configures a custom SSL context for mutual TLS authentication.
     *
     * @param array $sslContext Array with optional keys: 'cert', 'key', 'ca' — each a filesystem path.
     *
     * @return void
     */
    public function setSslContext(array $sslContext): void
    {
        $this->paysafeApiClient->setSslContext($sslContext);
    }

    /**
     * <b>Use only for testing.</b> Overrides the base URL for Paysafe Payments API endpoints
     * with the provided value (e.g. a local WireMock server).
     *
     * @param string $baseUrl Full base URL, e.g. "http://localhost:8080".
     *
     * @return void
     *
     * @internal Not intended for production use.
     */
    public function overrideBaseUrl(string $baseUrl): void
    {
        $this->paysafeApiClient->overrideBaseUrl($baseUrl);
    }

    /**
     * Execute direct HTTP request against Payments API with custom headers/request options.
     *
     * @param string $method One of REQUEST_METHOD_* constants.
     * @param string $endpoint Relative endpoint, e.g. "paymenthub/v1/balances".
     * @param string|array|object|null $requestBody Query string (GET/DELETE), JSON string, or object/array payload.
     * @param DirectRequestOptions|null $requestOptions Direct request options.
     *
     * @throws PaysafeSdkException
     */
    public function directRequest(
        string $method,
        string $endpoint,
        $requestBody = null,
        ?DirectRequestOptions $requestOptions = null
    ): PaysafeApiResponse {
        return $this->rawRequestService()->rawRequest($method, $endpoint, $requestBody, $requestOptions);
    }

    /**
     * Serialize arbitrary payload into JSON via SDK mapper.
     *
     * @param mixed $model
     *
     * @throws PaysafeSdkException
     */
    public function serialize($model): string
    {
        return $this->rawRequestService()->serialize($model);
    }

    /**
     * Deserialize JSON into provided class type via SDK mapper.
     *
     * @return mixed
     *
     * @throws PaysafeSdkException
     */
    public function deserialize(string $json, string $classType)
    {
        return $this->rawRequestService()->deserialize($json, $classType);
    }
}
