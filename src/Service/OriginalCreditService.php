<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelResponse;
use Paysafe\PhpSdk\Model\OriginalCredit\OriginalCredit;
use Paysafe\PhpSdk\Model\OriginalCredit\OriginalCreditList;
use Paysafe\PhpSdk\Model\OriginalCredit\OriginalCreditRequest;
use Paysafe\PhpSdk\Service\Interfaces\OriginalCreditServiceInterface;

class OriginalCreditService implements OriginalCreditServiceInterface
{

    const ORIGINAL_CREDIT_ENDPOINT = "/v1/originalcredits";

    private PaysafeApiClient $paysafeApiClient;

    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * Processes an Original Credit transaction for a merchant.
     * Original Credits allow merchants with specific merchant category codes (MCCs) to issue winnings
     * as credits to cardholders, without requiring a previous transaction.
     * The request will be executed using custom RequestOptions (connectTimeout, readTimeout,
     * maxAutomaticRetries and/or simulator, if applicable),
     * instead of the default values from PaysafeClient.
     *
     * <p>Endpoint:
     * <strong>POST /v1/originalcredits</strong></p>
     *
     * The request body containing all necessary details for processing the original credit.
     * @param OriginalCreditRequest $originalCreditRequest
     * @param RequestOptions|null $requestOptions        Custom request options for controlling the request behavior.
     *
     * @return OriginalCredit object containing the response details from Paysafe.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
     */
    public function processOriginalCredit(
        OriginalCreditRequest $originalCreditRequest,
        RequestOptions $requestOptions = null
    ): OriginalCredit
    {
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($originalCreditRequest);
        $response = $this->paysafeApiClient->executePost(
            self::ORIGINAL_CREDIT_ENDPOINT,
            $jsonRequestBody,
            $requestOptions
        );
        return PaysafeApiClient::processResponse($response, OriginalCredit::class);
    }

    /**
     * Gets the details of an Original Credit transaction using its unique identifier with custom request options.
     * This endpoint allows merchants to look up the status and details of an existing Original Credit transaction,
     * using specified request parameters for customized behavior such as timeouts and retries.
     *
     * <p>Endpoint:
     * <strong>GET /v1/originalcredits/{originalCreditId}</strong></p>
     *
     * @param string $originalCreditId The unique identifier of the original credit transaction to be retrieved.
     * @param RequestOptions|null $requestOptions   Custom request options for controlling the request behavior.
     *
     * @return OriginalCredit object containing the response details from Paysafe.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
     */
    public function getOriginalCreditById(
        string $originalCreditId,
        RequestOptions $requestOptions = null
    ): OriginalCredit
    {
        $endpoint = sprintf('%s/%s', self::ORIGINAL_CREDIT_ENDPOINT, $originalCreditId);
        $response = $this->paysafeApiClient->executeGet($endpoint, $requestOptions);
        return PaysafeApiClient::processResponse($response, OriginalCredit::class);
    }

    /**
     * Gets the details of one or more Original Credit transactions using the merchant reference number.
     * The request will be executed using custom RequestOptions (connectTimeout, readTimeout,
     * maxAutomaticRetries and/or simulator, if applicable)
     * instead of default values from PaysafeClient.
     *
     * <p>Endpoint:
     * <strong>GET /v1/originalcredits?</strong></p>
     *
     *
     * Unique merchant reference number created by the merchant and submitted as part of the original credit request.
     * @param string $merchantRefNum
     *
     * The end date in UTC. If null is provided, the current date will be used.
     * @param string|null $endDate
     *
     * The total number of records to return. If null is provided, the default value (10) will be used.
     * @param int|null $limit
     *
     * The starting position, where 0 is the first record. If null is provided, the default value (0) will be used.
     * @param int|null $offset
     *
     * The start date in UTC. If null is provided, the default value (30 days before the end date) will be used.
     * @param string|null $startDate
     *
     * Custom connectTimeout, responseTimeout, maxAutomaticRetries and/or simulator, if applicable for this request.
     * @param RequestOptions|null $requestOptions
     *
     * @return OriginalCreditList object containing a list of original credit transactions and pagination metadata.
     *
     * @throws PaysafeSdkException if an error occurs during the request.
     */
    public function getOriginalCreditUsingMerchantReferenceNumber(
        string $merchantRefNum,
        string $endDate = null,
        int $limit = null,
        int $offset = null,
        string $startDate = null,
        RequestOptions $requestOptions = null
    ): OriginalCreditList
    {
        $path = self::ORIGINAL_CREDIT_ENDPOINT . $this->paysafeApiClient->buildQueryParameters(
            $merchantRefNum,
            $endDate,
            $limit,
            $offset,
            $startDate
            );

        $response = $this->paysafeApiClient->executeGet($path, $requestOptions);
        return PaysafeApiClient::processResponse($response, OriginalCreditList::class);
    }

    /**
     * Cancels a pending Original Credit request. The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * <p>Endpoint:
     * <strong>PUT /v1/originalcredits/{originalCreditId}</strong></p>
     *
     * @param string $originalCreditId The ID of the Original Credit to cancel.
     * @param CancelRequest $cancelRequest    The request body for canceling an Original Credit.
     * @param RequestOptions|null $requestOptions   Custom request options for timeout, retries, etc.
     *
     * @return CancelResponse object containing the updated Original Credit details.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
     */
    public function cancelOriginalCredit(
        string $originalCreditId,
        CancelRequest $cancelRequest,
        RequestOptions $requestOptions = null
    ): CancelResponse
    {
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($cancelRequest);
        $path = sprintf('%s/%s', self::ORIGINAL_CREDIT_ENDPOINT, $originalCreditId);
        $response = $this->paysafeApiClient->executePut($path, $jsonRequestBody, $requestOptions);
        return PaysafeApiClient::processResponse($response, CancelResponse::class);
    }
}
