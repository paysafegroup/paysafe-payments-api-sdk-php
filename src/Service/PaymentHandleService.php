<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service;

use Exception;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\ApiConnectionException;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandle;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandleList;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandleRequest;
use Paysafe\PhpSdk\Service\Interfaces\PaymentHandleServiceInterface;

/**
 * Service for managing payment handles.
 */
class PaymentHandleService extends AbstractPaysafeService implements PaymentHandleServiceInterface
{
    /**
     * Endpoint for the payment handles API.
     */
    private const PAYMENT_HANDLE_ENDPOINT = '/v1/paymenthandles';

    /**
     * Instance of PaysafeApiClient used to execute API requests.
     *
     * @var PaysafeApiClient
     */
    private $paysafeApiClient;

    /**
     * PaymentHandleServiceImpl constructor.
     *
     * @param PaysafeApiClient $paysafeApiClient The PaysafeApiClient instance used for API requests.
     */
    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * Creates a payment handle.
     *
     * @param PaymentHandleRequest $paymentHandleRequest The request body to create the payment handle.
     * @param RequestOptions|null $requestOptions
     * @return PaymentHandle The created payment handle.
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     * @throws Exception
     */
    public function createPaymentHandle(
        PaymentHandleRequest $paymentHandleRequest,
        RequestOptions $requestOptions = null
    ): PaymentHandle
    {
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($paymentHandleRequest);
        $response = $this->paysafeApiClient->executePost(
            self::PAYMENT_HANDLE_ENDPOINT,
            $jsonRequestBody,
            $requestOptions
        );

        return PaysafeApiClient::processResponse($response, PaymentHandle::class);
    }

    /**
     * Retrieves a payment handle by its ID.
     *
     * @param string $paymentHandleId The ID of the payment handle to retrieve.
     * @param RequestOptions|null $requestOptions
     * @return PaymentHandle The payment handle.
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function getPaymentHandleById(string $paymentHandleId, RequestOptions $requestOptions = null): PaymentHandle
    {
        $path = self::PAYMENT_HANDLE_ENDPOINT . '/' . $paymentHandleId;
        $response = $this->paysafeApiClient->executeGet($path, $requestOptions);

        return PaysafeApiClient::processResponse($response, PaymentHandle::class);
    }

    /**
     * Gets the payment handle using merchant reference number.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $merchantRefNum Unique merchant reference number created by the merchant
     *  and submitted as part of the request when creating payment handle.
     * @param string|null $endDate This is the end date in UTC. If null is provided, current date will be used.
     * @param int|null $limit This is the total number of records to return. If null is provided,
     *  default value (10) will be used.
     * @param int|null $offset This is the starting position, where 0 is the first record.
     *  If null is provided, default value (0) will be used.
     * @param string|null $startDate This is the start date in UTC. If null is provided,
     *  default value (30 days before the end date) will be used.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return PaymentHandleList containing a list of verifications and meta information for the pagination APIs
     *
     * @throws PaysafeSdkException if an error occurs
     * @throws ApiConnectionException
     */
    public function getPaymentHandleUsingMerchantReferenceNumber(
        string $merchantRefNum,
        string $endDate = null,
        int $limit = null,
        int $offset = null,
        string $startDate = null,
        RequestOptions $requestOptions = null
    ): PaymentHandleList {
        $path = self::PAYMENT_HANDLE_ENDPOINT .
            $this->paysafeApiClient->buildQueryParameters(
                $merchantRefNum,
                $endDate,
                $limit,
                $offset,
                $startDate
            );

        $response = $this->paysafeApiClient->executeGet($path, $requestOptions);
        return PaysafeApiClient::processResponse($response, PaymentHandleList::class);
    }

}
