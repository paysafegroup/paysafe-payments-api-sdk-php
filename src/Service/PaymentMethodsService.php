<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\PaymentMethod\LookUpPaymentMethodsResponse;

class PaymentMethodsService
{
    const PAYMENT_METHODS_ENDPOINT = "/v1/paymentmethods";

    private PaysafeApiClient $paysafeApiClient;


    /**
     * Instantiates a new LookUpPaymentMethodsServiceImpl object.
     *
     * @param paysafeApiClient instance of PaysafeApiClient used to execute API requests
     */
    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * Retrieves the list of payment methods enabled for a given merchant account by currency code.
     * The request will be executed using custom RequestOptions (connectTimeout, readTimeout
     * maxAutomaticRetries and/or simulator, if applicable), instead of default values from PaysafeClient.
     *
     * @param string $currencyCode the currency code for the merchant account (e.g. USD, CAD)
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return LookUpPaymentMethodsResponse containing the list of payment methods
     *
     * @throws PaysafeSdkException if an error occurs with the Payments API
     */
    public function lookUpPaymentMethods(
        string $currencyCode,
        RequestOptions $requestOptions = null
    ): LookUpPaymentMethodsResponse {
        $path = sprintf("%s?currencyCode=%s", self::PAYMENT_METHODS_ENDPOINT, $currencyCode);
        $response = $this->paysafeApiClient->executeGet($path, $requestOptions);

        return PaysafeApiClient::processResponse($response, LookUpPaymentMethodsResponse::class);
    }

}
