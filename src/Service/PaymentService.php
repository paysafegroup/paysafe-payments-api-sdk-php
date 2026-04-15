<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service;

use Exception;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelResponse;
use Paysafe\PhpSdk\Model\Payment\PaymentRequest;
use Paysafe\PhpSdk\Model\Payment\Payment;
use Paysafe\PhpSdk\Model\Payment\PaymentList;
use Paysafe\PhpSdk\Service\Interfaces\PaymentServiceInterface;

/**
 * Service for managing payments.
 */
class PaymentService extends AbstractPaysafeService implements PaymentServiceInterface
{
    /**
     * Endpoint for the payments API.
     */
    private const PAYMENT_ENDPOINT = '/v1/payments';

    /**
     * Instance of PaysafeApiClient used to execute API requests.
     *
     * @var PaysafeApiClient
     */
    private PaysafeApiClient $paysafeApiClient;

    /**
     * PaymentService constructor.
     *
     * @param PaysafeApiClient $paysafeApiClient The PaysafeApiClient instance used for API requests.
     */
    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * Retrieves a payment by its ID.
     *
     * @param string $paymentId
     * @param RequestOptions|null $requestOptions
     *
     * @return Payment The payment details.
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function getPaymentById(string $paymentId, RequestOptions $requestOptions = null): Payment
    {
        $endpoint = sprintf(self::ENDPOINT_FORMAT, self::PAYMENT_ENDPOINT, $paymentId);
        $response = $this->paysafeApiClient->executeGet($endpoint, $requestOptions);
        return PaysafeApiClient::processResponse($response, Payment::class);
    }

    /**
     * Retrieves payments by merchant reference number.
     *
     * @param string|null $merchantRefNum The merchant reference number.
     * @param string|null $endDate The end date in UTC.
     * @param int|null $limit The total number of records to return.
     * @param int|null $offset The starting position, where 0 is the first record.
     * @param string|null $startDate The start date in UTC.
     * @param RequestOptions|null $requestOptions
     *
     * @return PaymentList The list of payments.
     *
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function getPaymentByMerchantReferenceNumber(
        ?string $merchantRefNum,
        ?string $endDate,
        ?int $limit,
        ?int $offset,
        ?string $startDate,
        RequestOptions $requestOptions = null
    ): PaymentList {
        $path = self::PAYMENT_ENDPOINT .
            $this->paysafeApiClient->buildQueryParameters(
                $merchantRefNum,
                $endDate,
                $limit,
                $offset,
                $startDate
            );

        $response = $this->paysafeApiClient->executeGet($path, $requestOptions);
        return PaysafeApiClient::processResponse($response, PaymentList::class);
    }

    /**
     * Cancels a payment by its ID.
     *
     * @param string $paymentId The ID of the payment to cancel.
     * @param CancelRequest $cancelPaymentRequest The request body for the cancel operation.
     * @param RequestOptions|null $requestOptions
     *
     * @return CancelResponse The response containing the cancellation result.
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function cancelPayment(
        string $paymentId,
        CancelRequest $cancelPaymentRequest,
        RequestOptions $requestOptions = null
    ): CancelResponse {
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($cancelPaymentRequest);
        $path = sprintf(self::ENDPOINT_FORMAT, self::PAYMENT_ENDPOINT, $paymentId);
        $response = $this->paysafeApiClient->executePut($path, $jsonRequestBody, $requestOptions);
        return PaysafeApiClient::processResponse($response, CancelResponse::class);
    }

    /**
     * Processes a payment.
     *
     * @param PaymentRequest $paymentRequest The request body for the payment.
     * @param RequestOptions|null $requestOptions
     *
     * @return Payment The processed payment details.
     *
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function processPayment(PaymentRequest $paymentRequest, RequestOptions $requestOptions = null): Payment
    {
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($paymentRequest);
        $response = $this->paysafeApiClient->executePost(
            self::PAYMENT_ENDPOINT,
            $jsonRequestBody,
            $requestOptions
        );
        return PaysafeApiClient::processResponse($response, Payment::class);
    }

    /**
     * Gets the payment using merchant reference number. The request will be executed using custom RequestOptions
     * * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $merchantRefNum Unique merchant reference number created by the merchant
     *  and submitted as part of the request when creating payment handle.
     * @param string|null $endDate This is the end date in UTC. If null is provided, current date will be used.
     * @param int|null $limit This is the total number of records to return.
     *  If null is provided, default value (10) will be used.
     * @param int|null $offset This is the starting position, where 0 is the first record.
     *  If null is provided, default value (0) will be used.
     * @param string|null $startDate This is the start date in UTC. If null is provided,
     *  default value (30 days before the end date) will be used.
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
    ): PaymentList {
        $endpoint = sprintf(
            self::ENDPOINT_FORMAT,
            self::PAYMENT_ENDPOINT,
            $this->paysafeApiClient->buildQueryParameters(
                $merchantRefNum,
                $endDate,
                $limit,
                $offset,
                $startDate
            )
        );

        $response = $this->paysafeApiClient->executeGet($endpoint, $requestOptions);

        return PaysafeApiClient::processResponse($response, PaymentList::class);
    }

}
