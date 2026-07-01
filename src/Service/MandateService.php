<?php
// All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE
declare(strict_types=1);

namespace Paysafe\PhpSdk\Service;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Model\Common\Mandate;
use Paysafe\PhpSdk\Service\Interfaces\MandateServiceInterface;

class MandateService implements MandateServiceInterface
{
    const MANDATES_ENDPOINT = "/v1/customers/%s/paymenthandles/%s/mandates";
    const MANDATE_BY_ID_ENDPOINT = "/v1/customers/%s/paymenthandles/%s/mandates/%s";

    private PaysafeApiClient $paysafeApiClient;

    /**
     * MandateService constructor.
     *
     * @param PaysafeApiClient $paysafeApiClient The PaysafeApiClient instance used for API requests.
     */
    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * @inheritDoc
     */
    public function createMandate(
        string $customerId,
        string $paymentHandleId,
        $requestBody = null,
        RequestOptions $requestOptions = null
    ): Mandate
    {
        $endpoint = sprintf(self::MANDATES_ENDPOINT, $customerId, $paymentHandleId);
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($requestBody);
        $response = $this->paysafeApiClient->executePost($endpoint, $jsonRequestBody, $requestOptions);

        return PaysafeApiClient::processResponse($response, Mandate::class);
    }

    /**
     * @inheritDoc
     */
    public function getMandateStatus(
        string $customerId,
        string $paymentHandleId,
        string $mandateId,
        RequestOptions $requestOptions = null
    ): Mandate
    {
        $endpoint = sprintf(self::MANDATE_BY_ID_ENDPOINT, $customerId, $paymentHandleId, $mandateId);
        $response = $this->paysafeApiClient->executeGet($endpoint, $requestOptions);

        return PaysafeApiClient::processResponse($response, Mandate::class);
    }

    /**
     * @inheritDoc
     */
    public function cancelMandate(
        string $customerId,
        string $paymentHandleId,
        string $mandateId,
        $requestBody = null,
        RequestOptions $requestOptions = null
    ): Mandate
    {
        $endpoint = sprintf(self::MANDATE_BY_ID_ENDPOINT, $customerId, $paymentHandleId, $mandateId);
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($requestBody);
        $response = $this->paysafeApiClient->executePut($endpoint, $jsonRequestBody, $requestOptions);

        return PaysafeApiClient::processResponse($response, Mandate::class);
    }
}
