<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Model\Customer\SingleUseCustomerToken\SingleUseCustomerToken;
use Paysafe\PhpSdk\Model\Customer\SingleUseCustomerToken\SingleUseCustomerTokenRequest;
use Paysafe\PhpSdk\Service\Interfaces\CustomerSingleUseTokenServiceInterface;

class CustomerSingleUseTokenService implements CustomerSingleUseTokenServiceInterface
{
    const CREATE_CUSTOMER_SINGLE_USE_TOKEN_ENDPOINT = "/v1/customers/%s/singleusecustomertokens";
    const GET_CUSTOMER_SINGLE_USE_TOKEN_ENDPOINT = "/v1/singleusecustomertokens/%s";

    private PaysafeApiClient $paysafeApiClient;

    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * @inheritDoc
     */
    public function createSingleUseCustomerToken(
        string $customerId,
        SingleUseCustomerTokenRequest $requestBody,
        RequestOptions $requestOptions = null
    ): SingleUseCustomerToken
    {
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($requestBody);
        $response = $this->paysafeApiClient->executePost(
            sprintf(self::CREATE_CUSTOMER_SINGLE_USE_TOKEN_ENDPOINT, $customerId),
            $jsonRequestBody,
            $requestOptions
        );
        return PaysafeApiClient::processResponse($response, SingleUseCustomerToken::class);
    }

    /**
     * @inheritDoc
     */
    public function getSingleUseCustomerToken(
        string $singleUseCustomerTokenId,
        RequestOptions $requestOptions = null
    ): SingleUseCustomerToken
    {
        $path = sprintf(self::GET_CUSTOMER_SINGLE_USE_TOKEN_ENDPOINT, $singleUseCustomerTokenId);
        $response = $this->paysafeApiClient->executeGet($path, $requestOptions);
        return PaysafeApiClient::processResponse($response, SingleUseCustomerToken::class);
    }
}
