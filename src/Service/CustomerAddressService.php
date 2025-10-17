<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Model\Customer\Address;

class CustomerAddressService implements Interfaces\CustomerAddressServiceInterface
{
    const CUSTOMER_ADDRESS_ENDPOINT = "/v1/customers/%s/addresses";

    private PaysafeApiClient $paysafeApiClient;


    public function __construct(PaysafeApiClient $paysafeApiClient)
    {
        $this->paysafeApiClient = $paysafeApiClient;
    }

    /**
     * @inheritDoc
     */
    public function createAddress(
        string $customerId,
        Address $address,
        RequestOptions $requestOptions = null
    ): Address
    {
        $endpoint = sprintf(self::CUSTOMER_ADDRESS_ENDPOINT, $customerId);
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($address);
        $response = $this->paysafeApiClient->executePost($endpoint, $jsonRequestBody, $requestOptions);

        return PaysafeApiClient::processResponse($response, Address::class);
    }

    /**
     * @inheritDoc
     */
    public function getAddressById(
        string $customerId,
        string $addressId,
        RequestOptions $requestOptions = null
    ): Address
    {
        $endpoint = sprintf(self::CUSTOMER_ADDRESS_ENDPOINT . '/%s', $customerId, $addressId);
        $response = $this->paysafeApiClient->executeGet($endpoint, $requestOptions);

        return PaysafeApiClient::processResponse($response, Address::class);
    }

    /**
     * @inheritDoc
     */
    public function updateAddress(
        string $customerId,
        string $addressId,
        Address $address,
        RequestOptions $requestOptions = null
    ): Address
    {
        $endpoint = sprintf(self::CUSTOMER_ADDRESS_ENDPOINT . '/%s', $customerId, $addressId);
        $jsonRequestBody = $this->paysafeApiClient->buildJsonRequestBody($address);
        $response = $this->paysafeApiClient->executePut($endpoint, $jsonRequestBody, $requestOptions);

        return PaysafeApiClient::processResponse($response, Address::class);
    }

    /**
     * @inheritDoc
     */
    public function deleteAddress(string $customerId, string $addressId, RequestOptions $requestOptions = null): void
    {
        $endpoint = sprintf(self::CUSTOMER_ADDRESS_ENDPOINT . '/%s', $customerId, $addressId);
        $response = $this->paysafeApiClient->executeDelete($endpoint, $requestOptions);
        PaysafeApiClient::processDeleteResponse($response);
    }
}
