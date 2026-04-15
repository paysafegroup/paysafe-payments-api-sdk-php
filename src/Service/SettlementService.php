<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelResponse;
use Paysafe\PhpSdk\Model\Settlement\SettlementList;
use Paysafe\PhpSdk\Service\Interfaces\SettlementServiceInterface;
use Paysafe\PhpSdk\Model\Settlement\Settlement;
use Paysafe\PhpSdk\Model\Settlement\SettlementRequest;

/**
 * Service for managing settlements.
 */
class SettlementService extends AbstractPaysafeService implements SettlementServiceInterface
{
    /**
     * Endpoint for the settlement API.
     */
    private const PAYMENT_SETTLEMENT_ENDPOINT = '/v1/payments/%s/settlements';
    private const SETTLEMENT_ENDPOINT = '/v1/settlements';

    /**
     * Instance of PaysafeApiClient used to execute API requests.
     *
     * @var PaysafeApiClient
     */
    private PaysafeApiClient $paysafeApiClient;

    /**
     * SettlementService constructor.
     *
     * @param PaysafeApiClient $paysafeApiClient The PaysafeApiClient instance used for API requests.
     */
    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * Submits a Settlement request for a previously authorized payment that has not yet been settled.
     * The request will be executed using custom RequestOptions (connectTimeout, readTimeout
     * maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * <p>Endpoint:
     * <strong>POST /v1/payments/{paymentId}/settlements</strong></p>
     *
     * @param string $paymentId The ID of the payment to be settled.
     * @param SettlementRequest $settlementRequest The request object containing settlement details.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return ?Settlement object representing the response from Paysafe.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
     */
    public function processSettlement(
        string $paymentId,
        SettlementRequest $settlementRequest,
        RequestOptions $requestOptions = null
    ): ?Settlement {
        $endpoint = sprintf(self::PAYMENT_SETTLEMENT_ENDPOINT, $paymentId);
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($settlementRequest);
        $response = $this->paysafeApiClient->executePost($endpoint, $jsonRequestBody, $requestOptions);
        return PaysafeApiClient::processResponse($response, Settlement::class);
    }

    /**
     * Gets the details of a specific settlement by its unique ID.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * <p>Endpoint:
     * <strong>POST /v1/settlements/{settlementId}</strong></p>
     *
     * @param string $settlementId The ID of the settlement.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return ?Settlement object representing the response from Paysafe.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
     */
    public function getSettlementById(string $settlementId, RequestOptions $requestOptions = null): ?Settlement
    {
        $endpoint = sprintf(self::ENDPOINT_FORMAT, self::SETTLEMENT_ENDPOINT, $settlementId);
        $response = $this->paysafeApiClient->executeGet($endpoint, $requestOptions);
        return PaysafeApiClient::processResponse($response, Settlement::class);
    }

    /**
     * Gets settlements using the merchant reference number. The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     * <p>Endpoint:
     * <strong>GET /v1/settlements</strong></p>
     *
     * @param string $merchantRefNum The merchant reference number used in the original request.
     * @param string|null $endDate The end date for filtering settlements.
     * @param int|null $limit The maximum number of records to return.
     * @param int|null $offset The pagination offset.
     * @param string|null $startDate The start date for filtering settlements.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return SettlementList A list of Settlement objects representing the response from Paysafe.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
     */
    public function getSettlementsUsingMerchantReferenceNumber(
        string $merchantRefNum,
        string $endDate = null,
        int $limit = null,
        int $offset = null,
        string $startDate = null,
        RequestOptions $requestOptions = null
    ): SettlementList {
        $path = self::SETTLEMENT_ENDPOINT .
            $this->paysafeApiClient->buildQueryParameters(
                $merchantRefNum,
                $endDate,
                $limit,
                $offset,
                $startDate
            );

        $response = $this->paysafeApiClient->executeGet($path, $requestOptions);
        return PaysafeApiClient::processResponse($response, SettlementList::class);
    }

    /**
     * Cancels a pending settlement request.  The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * <p>Endpoint:
     * <strong>PUT /v1/settlements/{settlementId}</strong></p>
     *
     * @param string $settlementId The ID of the settlement to cancel.
     * @param CancelRequest $cancelRequest Cancel request object
     * @param RequestOptions|null $requestOptions
     *
     * @return CancelResponse object containing the updated settlement details.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
     */
    public function cancelSettlement(
        string $settlementId,
        CancelRequest $cancelRequest,
        RequestOptions $requestOptions = null
    ): CancelResponse {
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($cancelRequest);
        $path = sprintf(self::ENDPOINT_FORMAT, self::SETTLEMENT_ENDPOINT, $settlementId);
        $response = $this->paysafeApiClient->executePut($path, $jsonRequestBody, $requestOptions);

        return PaysafeApiClient::processResponse($response, CancelResponse::class);
    }
}
