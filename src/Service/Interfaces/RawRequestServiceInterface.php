<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Service\Interfaces;

use Paysafe\PhpSdk\Client\DirectRequestOptions;
use Paysafe\PhpSdk\Client\PaysafeApiResponse;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;

/**
 * Interface RawRequestService
 * Provides the service to make raw requests
 */
interface RawRequestServiceInterface
{
    /**
     * Executes a raw HTTP request with the specified method, endpoint, body, and options (including custom headers).
     *
     * @param string $method
     * @param string $endpoint
     * @param mixed|null $requestBody
     * @param DirectRequestOptions|null $requestOptions
     *
     * @return PaysafeApiResponse The response from the monitoring service.
     *
     * @throws PaysafeSdkException If there is an API error.
     */
    public function rawRequest(
        string $method,
        string $endpoint,
        $requestBody = null,
        ?DirectRequestOptions $requestOptions = null
    ): PaysafeApiResponse;

    /**
     * Serializes the given model to a JSON string.
     *
     * @param mixed $model
     *
     * @return string
     *
     * @throws PaysafeSdkException
     */
    public function serialize($model): string;

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
    public function deserialize(string $json, string $classType);
}
