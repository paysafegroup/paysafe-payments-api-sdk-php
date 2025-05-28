<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service;

use Exception;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Monitor\MonitorResponse;
use Paysafe\PhpSdk\Service\Interfaces\MonitorServiceInterface;

/**
 * Class that implements the MonitorService interface.
 */
class MonitorService extends AbstractPaysafeService implements MonitorServiceInterface
{
    /**
     * Endpoint for the monitor API.
     */
    private const V1_MONITOR = '/v1/monitor';

    /**
     * Instance of PaysafeApiClient used to execute API requests.
     *
     * @var PaysafeApiClient
     */
    private PaysafeApiClient $paysafeApiClient;

    /**
     * MonitorServiceImpl constructor.
     *
     * @param PaysafeApiClient $paysafeApiClient The PaysafeApiClient instance used for API requests.
     */
    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * Monitors the status of the Paysafe service.
     *
     * @param RequestOptions|null $requestOptions
     *
     * @return MonitorResponse The response containing the monitoring details.
     *
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function monitor(RequestOptions $requestOptions = null): MonitorResponse
    {
        // Execute GET request using the PaysafeApiClient
        $response = $this->paysafeApiClient->executeGet(self::V1_MONITOR, $requestOptions);

        // Process and return the response
        return PaysafeApiClient::processResponse($response, MonitorResponse::class);
    }
}
