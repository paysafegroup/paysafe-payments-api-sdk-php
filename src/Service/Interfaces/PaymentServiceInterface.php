<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service\Interfaces;

use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelResponse;
use Paysafe\PhpSdk\Model\Payment\PaymentRequest;
use Paysafe\PhpSdk\Model\Payment\Payment;
use Paysafe\PhpSdk\Model\Payment\PaymentList;

/**
 * Interface PaymentService
 * Provides methods to handle payment operations such as retrieving, processing, and canceling payments.
 */
interface PaymentServiceInterface
{

    /**
     * Gets the details of a specific payment by its unique ID.
     *  The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $paymentId The ID of the payment.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return Payment The payment details.
     *
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function getPaymentById(string $paymentId, RequestOptions $requestOptions = null): Payment;

    /**
     * Gets the payment using merchant reference number. The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $merchantRefNum The merchant reference number.
     * @param string $endDate The end date for the payment search.
     * @param int $limit The number of results to return.
     * @param int $offset The offset for pagination.
     * @param string $startDate The start date for the payment search.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return PaymentList A list of payments matching the search criteria.
     *
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function getPaymentByMerchantReferenceNumber(
        string $merchantRefNum,
        string $endDate,
        int $limit,
        int $offset,
        string $startDate,
        RequestOptions $requestOptions = null
    ): PaymentList;

    /**
     * Cancels a payment using a specific paymentId. The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $paymentId The ID of the payment to cancel.
     * @param CancelRequest $cancelRequest The cancel request details.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return CancelResponse The response of the cancel operation.
     *
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function cancelPayment(
        string $paymentId,
        CancelRequest $cancelRequest,
        RequestOptions $requestOptions = null
    ): CancelResponse;

    /**
     * Creates a payment. The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param PaymentRequest $paymentRequest The payment request details.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return Payment The created payment.
     *
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function processPayment(PaymentRequest $paymentRequest, RequestOptions $requestOptions = null): Payment;

    /**
     * Gets the payment using merchant reference number. The request will be executed using custom RequestOptions
     * * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $merchantRefNum Unique merchant reference number created by the merchant and submitted as part
     *  of the request when creating payment handle.
     * @param string|null $endDate This is the end date in UTC. If null is provided, current date will be used.
     * @param int|null $limit This is the total number of records to return. If null is provided,
     *  default value (10) will be used.
     * @param int|null $offset This is the starting position, where 0 is the first record.
     *  If null is provided, default value (0) will be used.
     * @param string|null $startDate This is the start date in UTC. If null is provided, default value
     *  (30 days before the end date) will be used.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return PaymentList PaymentList object containing a list of verifications
     *  and meta information for the pagination APIs.
     *
     * @throws PaysafeSdkException if an error occurs
     */
    public function getPaymentsUsingMerchantReferenceNumber(
        string $merchantRefNum,
        string $endDate = null,
        int $limit = null,
        int $offset = null,
        string $startDate = null,
        RequestOptions $requestOptions = null
    ): PaymentList;
}
