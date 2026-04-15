<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Model\Customer\CustomerPaymentHandle;
use Paysafe\PhpSdk\Model\Customer\CustomerPaymentHandleRequest;
use Paysafe\PhpSdk\Service\Interfaces\CustomerPaymentHandleServiceInterface;

class CustomerPaymentHandleService implements CustomerPaymentHandleServiceInterface
{
    const  CUSTOMER_PAYMENT_HANDLES_ENDPOINT = "/v1/customers/%s/paymenthandles/%s";
    const CREATE_CUSTOMER_PAYMENT_HANDLE_ENDPOINT = "/v1/customers/%s/paymenthandles";

    private PaysafeApiClient $paysafeApiClient;


    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * @inheritDoc
     */
    public function createPaymentHandleForCustomer(
        string $customerId,
        CustomerPaymentHandleRequest $customerPaymentHandleRequest,
        RequestOptions $requestOptions = null
    ): CustomerPaymentHandle
    {
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($customerPaymentHandleRequest);
        $response = $this->paysafeApiClient->executePost(
            sprintf(self::CREATE_CUSTOMER_PAYMENT_HANDLE_ENDPOINT, $customerId),
            $jsonRequestBody,
            $requestOptions
        );
        return PaysafeApiClient::processResponse($response, CustomerPaymentHandle::class);
    }

    /**
     * @inheritDoc
     */
    public function getCustomerPaymentHandleByPaymentHandleId(
        string $customerId,
        string $paymentHandleId,
        RequestOptions $requestOptions = null
    ): CustomerPaymentHandle
    {
        $path = sprintf(self::CUSTOMER_PAYMENT_HANDLES_ENDPOINT, $customerId, $paymentHandleId);
        $response = $this->paysafeApiClient->executeGet($path, $requestOptions);
        return PaysafeApiClient::processResponse($response, CustomerPaymentHandle::class);
    }

    /**
     * @inheritDoc
     */
    public function updateCustomerPaymentHandle(
        string $customerId,
        string $paymentHandleId,
        CustomerPaymentHandleRequest $customerPaymentHandleRequest,
        RequestOptions $requestOptions = null
    ): CustomerPaymentHandle
    {
        $path = sprintf(self::CUSTOMER_PAYMENT_HANDLES_ENDPOINT, $customerId, $paymentHandleId);
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($customerPaymentHandleRequest);
        $response = $this->paysafeApiClient->executePut($path, $jsonRequestBody, $requestOptions);
        return PaysafeApiClient::processResponse($response, CustomerPaymentHandle::class);
    }

    /**
     * @inheritDoc
     */
    public function deleteCustomerPaymentHandle(
        string $customerId,
        string $paymentHandleId,
        RequestOptions $requestOptions = null
    ): void
    {
        $path = sprintf(self::CUSTOMER_PAYMENT_HANDLES_ENDPOINT, $customerId, $paymentHandleId);
        $response = $this->paysafeApiClient->executeDelete($path, $requestOptions);
        PaysafeApiClient::processDeleteResponse($response);
    }
}
