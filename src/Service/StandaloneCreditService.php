<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelResponse;
use Paysafe\PhpSdk\Model\StandaloneCredit\StandaloneCredit;
use Paysafe\PhpSdk\Model\StandaloneCredit\StandaloneCreditList;
use Paysafe\PhpSdk\Model\StandaloneCredit\StandaloneCreditRequest;
use Paysafe\PhpSdk\Model\StandaloneCredit\StandaloneCreditUpdateRequest;
use Paysafe\PhpSdk\Service\Interfaces\StandaloneCreditServiceInterface;

class StandaloneCreditService implements StandaloneCreditServiceInterface
{
    const STANDALONE_CREDIT_ENDPOINT = "/v1/standalonecredits";
    const ENDPOINT_PATH_FORMAT = "%s/%s";

    private PaysafeApiClient $paysafeApiClient;

    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * Processes a Standalone Credit transaction. The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator,
     * if applicable) instead of default values from PaysafeClient.
     *
     * @param StandaloneCreditRequest $body The request body containing the details for the Standalone Credit.
     *
     * Custom connectTimeout, readTimeout, maxAutomaticRetries and/or simulator (if applicable) for this request.
     * @param RequestOptions|null $requestOptions
     *
     * @return StandaloneCredit
     *
     * @throws PaysafeSdkException if an error occurs
     */
    public function processStandaloneCredit(
        StandaloneCreditRequest $body,
        RequestOptions $requestOptions = null
    ): StandaloneCredit
    {
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($body);
        $response = $this->paysafeApiClient->executePost(
            self::STANDALONE_CREDIT_ENDPOINT,
            $jsonRequestBody,
            $requestOptions
        );
        return PaysafeApiClient::processResponse($response, StandaloneCredit::class);
    }

    /**
     * Gets standalone credit using the merchant reference number.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator,
     * if applicable) instead of default values from PaysafeClient.
     *
     * <p>Endpoint:
     * <strong>GET /v1/standalonecredits</strong></p>
     *
     * @param string $merchantRefNum The merchant reference number used in the transactions.
     * @param string|null $endDate        The end date for filtering transactions.
     * @param int|null $limit          The maximum number of records to return.
     * @param int|null $offset         The pagination offset.
     * @param string|null $startDate The start date for filtering transactions.
     *
     * Custom connectTimeout, readTimeout, maxAutomaticRetries and/or simulator (if applicable) for this request.
     * @param RequestOptions|null $requestOptions
     *
     * @return StandaloneCreditList objects representing the response from Paysafe.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
     */
    public function getStandaloneCreditsUsingMerchantReferenceNumber(
        string $merchantRefNum,
        ?string $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $startDate = null,
        ?RequestOptions $requestOptions = null
    ): StandaloneCreditList
    {
        $path = self::STANDALONE_CREDIT_ENDPOINT . $this->paysafeApiClient->buildQueryParameters(
            $merchantRefNum,
            $endDate,
            $limit,
            $offset,
            $startDate
        );
        $response = $this->paysafeApiClient->executeGet($path, $requestOptions);
        return PaysafeApiClient::processResponse($response, StandaloneCreditList::class);
    }

    /**
     * Gets a standalone credit using the given standaloneCreditId.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator,
     * if applicable) instead of default values from PaysafeClient.
     *
     * <p>Endpoint:
     * <strong>GET /v1/standalonecredits/{standaloneCreditId}</strong></p>
     *
     * <p>Use this method to look up a Standalone Credit by its ID, which is returned
     * in the response to the original Standalone Credit request.</p>
     *
     * The ID returned in the response of the Standalone Credit request.
     * This ID is required for making subsequent requests.
     * @param string $standaloneCreditId
     *
     * Custom connectTimeout, readTimeout, maxAutomaticRetries and/or simulator (if applicable) for this request.
     * @param RequestOptions|null $requestOptions
     *
     * @return StandaloneCredit representing the response from Paysafe, containing details about the standalone credit.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
     */
    public function getStandaloneCreditById(
        string $standaloneCreditId,
        RequestOptions $requestOptions = null
    ): StandaloneCredit
    {
        $endpoint = sprintf(
            self::ENDPOINT_PATH_FORMAT,
            self::STANDALONE_CREDIT_ENDPOINT,
            $standaloneCreditId
        );
        $response = $this->paysafeApiClient->executeGet($endpoint, $requestOptions);
        return PaysafeApiClient::processResponse($response, StandaloneCredit::class);
    }

    /**
     * Cancels a standalone credit using the given standaloneCreditId.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator,
     * if applicable) instead of default values from PaysafeClient.
     *
     * <p>Endpoint:
     * <strong>PUT /v1/standalonecredits/{standaloneCreditId}</strong></p>
     *
     * <p>Use this method to cancel a Standalone Credit by its ID.</p>
     *
     * @param string $standaloneCreditId The unique ID of the Standalone Credit, returned in the original response.
     * @param CancelRequest $cancelRequest      The request body for canceling a Standalone Credit.
     *
     * Custom connectTimeout, readTimeout, maxAutomaticRetries and/or simulator (if applicable) for this request.
     * @param RequestOptions|null $requestOptions
     *
     * @return CancelResponse object containing details about the canceled Standalone Credit,
     * including the status and transaction time.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
     */
    public function cancelStandaloneCredit(
        string $standaloneCreditId,
        CancelRequest $cancelRequest,
        RequestOptions $requestOptions = null
    ): CancelResponse
    {
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($cancelRequest);
        $path = sprintf(self::ENDPOINT_PATH_FORMAT, self::STANDALONE_CREDIT_ENDPOINT, $standaloneCreditId);
        $response = $this->paysafeApiClient->executePut($path, $jsonRequestBody, $requestOptions);
        return PaysafeApiClient::processResponse($response, CancelResponse::class);
    }

    /**
     * Updates a Standalone Credit using the Interac e-Transfer Fraud API.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator,
     * if applicable) instead of default values from PaysafeClient.
     *
     * @param string $standaloneCreditId  The unique ID of the Standalone Credit to update.
     * @param StandaloneCreditUpdateRequest $creditUpdateRequest The request body containing fraud-related information.
     *
     * Custom connectTimeout, readTimeout, maxAutomaticRetries and/or simulator (if applicable) for this request.
     * @param RequestOptions|null $requestOptions
     *
     * @return StandaloneCredit object after the fraud update.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
     */
    public function patchStandaloneCreditStatusForInteracFraud(
        string $standaloneCreditId,
        StandaloneCreditUpdateRequest $creditUpdateRequest,
        RequestOptions $requestOptions = null
    ): StandaloneCredit
    {
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($creditUpdateRequest);
        $path = sprintf(self::ENDPOINT_PATH_FORMAT, self::STANDALONE_CREDIT_ENDPOINT, $standaloneCreditId);
        $response = $this->paysafeApiClient->executePatch($path, $jsonRequestBody, $requestOptions);
        return PaysafeApiClient::processResponse($response, StandaloneCredit::class);
    }
}
