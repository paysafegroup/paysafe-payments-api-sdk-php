<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Service;

use Paysafe\PhpSdk\Client\DirectRequestOptions;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\PaysafeApiResponse;
use Paysafe\PhpSdk\Config\ObjectMapperConfiguration;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Service\Interfaces\RawRequestServiceInterface;
use Psr\Log\LoggerInterface;

class RawRequestService extends AbstractPaysafeService implements RawRequestServiceInterface
{
    /**
     * Instance of PaysafeApiClient used to execute API requests.
     *
     * @var PaysafeApiClient
     */
    private PaysafeApiClient $paysafeApiClient;
    private LoggerInterface $logger;

    /**
     * MonitorServiceImpl constructor.
     *
     * @param PaysafeApiClient $paysafeApiClient The PaysafeApiClient instance used for API requests.
     * @param LoggerInterface $logger PSR-3 logger.
     */
    public function __construct(PaysafeApiClient $paysafeApiClient, LoggerInterface $logger)
    {
        $this->paysafeApiClient = $paysafeApiClient;
        $this->logger = $logger;
    }

    /**
     * Executes a raw HTTP request with the specified method, endpoint, body, and options (including custom headers).
     *
     * @param string $method
     * @param string $endpoint
     * @param string|array|object|null $requestBody
     * @param DirectRequestOptions|null $requestOptions
     *
     * @return PaysafeApiResponse
     *
     * @throws PaysafeSdkException
     */
    public function rawRequest(
        string $method,
        string $endpoint,
        $requestBody = null,
        ?DirectRequestOptions $requestOptions = null
    ): PaysafeApiResponse
    {
        $normalizedMethod = strtoupper($method);
        $endpointToUse = $this->normalizeEndpoint($endpoint);
        $jsonRequestBody = null;

        // For GET/DELETE, a string payload is treated as query string.
        if (
            in_array($normalizedMethod, ['GET', 'DELETE'], true)
            && is_string($requestBody)
            && trim($requestBody) !== ''
        ) {
            $separator = str_contains($endpointToUse, '?') ? '&' : '?';
            $endpointToUse .= $separator . ltrim($requestBody, '?');
        } elseif ($requestBody !== null) {
            // For mutating methods, pre-serialized JSON string is passed through as-is.
            $jsonRequestBody = is_string($requestBody)
                ? $requestBody
                : $this->paysafeApiClient->buildJsonRequestBody($requestBody);
        }

        $response = $this->paysafeApiClient->executeRaw($normalizedMethod, $endpointToUse, $jsonRequestBody, $requestOptions);

        return PaysafeApiClient::handleApiResponse($response);
    }

    private function normalizeEndpoint(string $endpoint): string
    {
        $trimmed = trim($endpoint);

        if (str_starts_with($trimmed, 'paymenthub/')) {
            $trimmed = substr($trimmed, strlen('paymenthub'));
        }

        if (str_starts_with($trimmed, '/paymenthub/')) {
            $trimmed = substr($trimmed, strlen('/paymenthub'));
        }

        if ($trimmed === '') {
            return '/';
        }

        return str_starts_with($trimmed, '/') ? $trimmed : '/' . $trimmed;
    }

    /**
     * Serializes the given model to a JSON string.
     *
     * @param mixed $model
     *
     * @return string
     *
     * @throws PaysafeSdkException
     */
    public function serialize($model): string
    {
        try {
            return ObjectMapperConfiguration::serialize($model);
        } catch (\Exception $e) {
            $this->logger->error(
                sprintf("Exception while serializing: %s", $e->getMessage()),
                ['exception' => $e]
            );

            throw new PaysafeSdkException("Error serializing model: " . $e->getMessage());
        }
    }

    /**
     * Deserializes the given JSON string to an instance of the specified type.
     *
     * @param string $json
     * @param string $classType
     *
     * @return mixed
     *
     * @throws PaysafeSdkException
     */
    public function deserialize(string $json, string $classType)
    {
        try {
            return ObjectMapperConfiguration::deserialize($json, $classType);
        } catch (\Exception $e) {
            $this->logger->error(
                sprintf("Exception while deserializing: %s", $e->getMessage()),
                ['exception' => $e]
            );

            throw new PaysafeSdkException("Error deserializing JSON: " . $e->getMessage());
        }
    }
}
