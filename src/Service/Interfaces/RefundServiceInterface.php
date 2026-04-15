<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service\Interfaces;

use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelResponse;
use Paysafe\PhpSdk\Model\Refund\Refund;
use Paysafe\PhpSdk\Model\Refund\RefundList;
use Paysafe\PhpSdk\Model\Refund\RefundRequest;

interface RefundServiceInterface
{
    /**
     * Process a Refund request:
     * <ul>
     *   <li>A regular Refund.</li>
     *   <li> Refund that is split into multiple merchant accounts.
     *   This is applicable for those merchants whose accounts are configured to do so.</li>
     * </ul>
     * <p>
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
      *
     * @param string $settlementId   The ID of the settlement for which the refund is being made
     * @param RefundRequest $refundRequest  The request body containing the details for the refund
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
      *
     * @return Refund object containing the result of refund processing request.
      *
     * @throws PaysafeSdkException if an error occurs with the Payments API
    */
    public function processRefund(
        string $settlementId,
        RefundRequest $refundRequest,
        RequestOptions $requestOptions = null
    ): Refund;

    /**
     * Gets the details of a specific refund by its unique ID.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $refundId       The ID of the refund
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return Refund object representing the response from Paysafe
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
    */
    public function getRefundById(string $refundId, RequestOptions $requestOptions = null): Refund;

    /**
     * Cancels a specific refund by its unique ID. The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $refundId       The ID of the refund
     * @param CancelRequest $cancelRequest The request body containing the details for the cancel refund
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return CancelResponse object representing the response from Paysafe
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
    */
    public function cancelRefund(
        string $refundId,
        CancelRequest $cancelRequest,
        RequestOptions $requestOptions = null
    ): CancelResponse;

    /**
     * Retrieves refund details using the merchant reference number.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable)
     * instead of default values from PaysafeClient.
     *
     * @param string $merchantRefNum Unique merchant reference number created by the merchant and submitted as part
     *  of the refund request.
     * @param string|null $endDate        The end date in UTC. If null is provided, the current date will be used.
     * @param int|null $limit          The total number of records to return. If null is provided,
     *  the default value (10) will be used.
     * @param int|null $offset         The starting position, where 0 is the first record. If null is provided,
     *  the default value (0) will be used.
     * @param string|null $startDate      The start date in UTC. If null is provided, the default value
     *  (30 days before the end date) will be used.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout,
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return RefundList object containing a list of refunds and meta information for pagination.
     *
     * @throws PaysafeSdkException if an error occurs during the request.
    */
    public function getRefundUsingMerchantReferenceNumber(
        string $merchantRefNum,
        string $endDate = null,
        int $limit = null,
        int $offset = null,
        string $startDate = null,
        RequestOptions $requestOptions = null
    ): RefundList;
}
