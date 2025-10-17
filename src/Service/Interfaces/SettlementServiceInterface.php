<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service\Interfaces;

use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelResponse;
use Paysafe\PhpSdk\Model\Settlement\Settlement;
use Paysafe\PhpSdk\Model\Settlement\SettlementList;
use Paysafe\PhpSdk\Model\Settlement\SettlementRequest;

/**
 * Interface SettlementService
 * Provides methods to handle settlement operations such as retrieving, processing, and canceling payments.
 */
interface SettlementServiceInterface
{

    /**
     * Submits a Settlement request for a previously authorized payment that has not yet been settled.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
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
    ): ?Settlement;

    /**
     * Gets the details of a specific settlement by its unique ID.
     *  The request will be executed using custom RequestOptions
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
    public function getSettlementById(string $settlementId, RequestOptions $requestOptions = null): ?Settlement;

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
    ): SettlementList;

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
    ): CancelResponse;
}
