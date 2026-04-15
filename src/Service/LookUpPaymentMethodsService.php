<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\PaymentMethod\LookUpPaymentMethodsResponse;
use Paysafe\PhpSdk\Service\Interfaces\LookUpPaymentMethodsServiceInterface;

/**
 * Class that implements the LookUpPaymentMethodsService interface.
 */
class LookUpPaymentMethodsService extends AbstractPaysafeService implements LookUpPaymentMethodsServiceInterface
{
    /**
     * Endpoint for the payment methods API.
     */
    private const PAYMENT_METHODS_ENDPOINT = '/v1/paymentmethods';

    /**
     * Instance of PaysafeApiClient used to execute API requests.
     *
     * @var PaysafeApiClient
     */
    private PaysafeApiClient $paysafeApiClient;

    /**
     * LookUpPaymentMethodsServiceImpl constructor.
     *
     * @param PaysafeApiClient $paysafeApiClient The PaysafeApiClient instance used for API requests.
     */
    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * Retrieves the list of payment methods enabled for a given merchant account by currency code.
     *
     * @param string $currencyCode The currency code for the merchant account (e.g., USD, CAD).
     * @param RequestOptions|null $requestOptions
     * @return LookUpPaymentMethodsResponse The response containing the list of payment methods.
     * @throws PaysafeSdkException If an error occurs with the Paysafe API.
     */
    public function getPaymentMethods(
        string $currencyCode,
        RequestOptions $requestOptions = null
    ): LookUpPaymentMethodsResponse {
        $path = sprintf('%s?currencyCode=%s', self::PAYMENT_METHODS_ENDPOINT, $currencyCode);

        // Execute GET request using the PaysafeApiClient
        $response = $this->paysafeApiClient->executeGet($path, $requestOptions);

        // Process and return the response
        return PaysafeApiClient::processResponse($response, LookUpPaymentMethodsResponse::class);
    }
}
