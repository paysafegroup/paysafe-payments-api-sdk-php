<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\PaysafeServices;
use Paysafe\PhpSdk\Validation\PropertyValidator;

/**
 * Class PaysafeClient
 * This is the primary class used to make requests against Paysafe's PaymentsAPI.
 * It allows you to access all the methods publicly provided by the API.
 * It also allows setting various configurations such as client credentials, connection timeout, etc.
 */
class PaysafeClient extends PaysafeServices
{
    private ?int $connectTimeout;
    private ?int $responseTimeout;
    private ?int $maxAutomaticRetries;
    private string $apiKey;
    private string $environment;

    /**
     * Constructs a PaysafeClient with provided credentials and environment, using default settings. Example: <br>
     * {@code paysafeClient = new PaysafeClient("merchantId:secretKey", Environment.TEST)] }
     *
     * @param string $apiKey private API key in format merchantId:secretKey
     * @param string $environment Paysafe environment against which API requests will be executed.
     * Possible values: TEST, LIVE.
     */
    public function __construct(
        string $apiKey,
        string $environment = 'TEST'
    ) {
        $this->apiKey = $apiKey;
        $this->environment = $environment;

        PropertyValidator::validateApiKey($this->apiKey);

        $this->paysafeApiClient = new PaysafeApiClient(
            $apiKey,
            $environment
        );
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function setApiKey(string $apiKey): void
    {
        PropertyValidator::validateApiKey($apiKey);
        $this->apiKey = $apiKey;
        $this->paysafeApiClient->setApiKey($apiKey);
    }

    public function getEnvironment(): string
    {
        return $this->environment;
    }

    public function setEnvironment(string $environment): void
    {
        $this->environment = $environment;
    }

    public function getMaxAutomaticRetries(): int
    {
        return $this->maxAutomaticRetries;
    }

    public function setMaxAutomaticRetries(int $maxAutomaticRetries): void
    {
        PropertyValidator::validateMaxAutomaticRetries($maxAutomaticRetries);
        $this->maxAutomaticRetries = $maxAutomaticRetries;
        $this->paysafeApiClient->setClientMaxAutomaticRetries($maxAutomaticRetries);
    }

    public function getResponseTimeout(): int
    {
        return $this->responseTimeout;
    }

    public function setResponseTimeout(int $responseTimeout): void
    {
        PropertyValidator::validateResponseTimeout($responseTimeout);
        $this->responseTimeout = $responseTimeout;
        $this->paysafeApiClient->setClientResponseTimeout($responseTimeout);
    }

    public function getConnectTimeout(): int
    {
        return $this->connectTimeout;
    }

    public function setConnectTimeout(int $connectTimeout): void
    {
        PropertyValidator::validateConnectTimeout($connectTimeout);
        $this->connectTimeout = $connectTimeout;
        $this->paysafeApiClient->setClientConnectTimeout($connectTimeout);
    }

    public function setProxy(string $proxy)
    {
        $this->paysafeApiClient->setProxy($proxy);
    }

    public function setSslContext(array $sslContext)
    {
        $this->paysafeApiClient->setSslContext($sslContext);
    }

    /**
     * <b>Use only for testing.</b> Overrides the base url for Paysafe Payments API endpoints
     * with provided value, i.e. of your mocked server.
     */
    public function overrideBaseUrl(string $baseUrl)
    {
        $this->paysafeApiClient->overrideBaseUrl($baseUrl);
    }
}
