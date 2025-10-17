<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelResponse;
use Paysafe\PhpSdk\Model\VoidAuthorization\VoidAuthorization;
use Paysafe\PhpSdk\Model\VoidAuthorization\VoidAuthorizationRequest;
use Paysafe\PhpSdk\Model\VoidAuthorization\VoidAuthorizationsList;
use Paysafe\PhpSdk\Service\Interfaces\VoidAuthorizationServiceInterface;

/**
 * Service for managing voiding authorizations.
 */
class VoidAuthorizationService extends AbstractPaysafeService implements VoidAuthorizationServiceInterface
{
    /**
     * Endpoint for the void authorization API.
     */
    private const VOID_AUTHORIZATION_ENDPOINT = '/v1/payments/%s/voidauths';
    private const VOID_AUTHORIZATION_GET_ENDPOINT = '/v1/voidauths';

    /**
     * Instance of PaysafeApiClient used to execute API requests.
     *
     * @var PaysafeApiClient
     */
    private PaysafeApiClient $paysafeApiClient;

    /**
     * VoidAuthorizationService constructor.
     *
     * @param PaysafeApiClient $paysafeApiClient The PaysafeApiClient instance used for API requests.
     */
    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * Void an authorization for a given paymentId. <br>
     * A Void Authorization request allows you to void (or cancel) an authorization request,
     * provided the authorization has not yet been settled. <br>
     * An authorization is part of a payment request. This is only applicable when settleWithAuth is set to false
     * in the payment request.<br>
     * If settleWithAuth is set to true in the payment request,
     * then the authorization and settlement are completed in the same request.
     * In that case you would not be able to process a Void Authorization.<br>
     * <p>
     * The request will be executed using custom RequestOptions (connectTimeout, readTimeout
     * maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $paymentId The ID of the payment for which the authorization is being voided.
     * @param VoidAuthorizationRequest $voidAuthorizationRequest The request body containing the details
     *  for the void authorization.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return VoidAuthorization object containing the result of the void authorization request.
     *
     * @throws PaysafeSdkException|\Exception if an error occurs
     */
    public function voidAuthorization(
        string $paymentId,
        VoidAuthorizationRequest $voidAuthorizationRequest,
        RequestOptions $requestOptions = null
    ): VoidAuthorization
    {
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($voidAuthorizationRequest);
        $response = $this->paysafeApiClient->executePost(
            sprintf(self::VOID_AUTHORIZATION_ENDPOINT, $paymentId),
            $jsonRequestBody,
            $requestOptions
        );
        return PaysafeApiClient::processResponse($response, VoidAuthorization::class);
    }

    /**
     * Gets the details of a void authorization by its id.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $voidAuthId The ID of the Void Authorization to retrieve.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *  maxAutomaticRetries and/or simulator, if applicable for this request.
     *
     * @return VoidAuthorization object containing the details of the Void Authorization.
     *
     * @throws PaysafeSdkException if an error occurs
     */
    public function getVoidAuthorizationById(
        string $voidAuthId,
        RequestOptions $requestOptions = null
    ): VoidAuthorization {
        $endpoint = sprintf(self::ENDPOINT_FORMAT, self::VOID_AUTHORIZATION_GET_ENDPOINT, $voidAuthId);
        $response = $this->paysafeApiClient->executeGet($endpoint, $requestOptions);
        return PaysafeApiClient::processResponse($response, VoidAuthorization::class);
    }

    /**
     * Gets the void authorization for a specific payment type by merchant reference number.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $merchantRefNum Unique merchant reference number created by the merchant
     *  and submitted as part of the request when creating void authorization.
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
     * @return VoidAuthorizationsList object containing a list of verifications
     *  and meta information for pagination APIs
     *
     * @throws PaysafeSdkException if an error occurs
     */
    public function getVoidAuthorizationUsingMerchantReferenceNumber(
        string $merchantRefNum,
        string $endDate = null,
        int $limit = null,
        int $offset = null,
        string $startDate = null,
        RequestOptions $requestOptions = null
    ): VoidAuthorizationsList {
        $path = self::VOID_AUTHORIZATION_GET_ENDPOINT .
            $this->paysafeApiClient->buildQueryParameters(
                $merchantRefNum,
                $endDate,
                $limit,
                $offset,
                $startDate
            );

        $response = $this->paysafeApiClient->executeGet($path, $requestOptions);
        return PaysafeApiClient::processResponse($response, VoidAuthorizationsList::class);
    }
}
