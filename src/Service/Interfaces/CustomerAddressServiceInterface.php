<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service\Interfaces;

use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Customer\Address;

interface CustomerAddressServiceInterface
{
    /**
     * Creates an address for a previously created customer.<br />
     * The request will be executed using custom RequestOptions
     * (connectTimeout, responseTimeout, automaticRetries, and/or simulator, if applicable)
     * instead of values from PaysafeClient.
     *
     * <p>Endpoint:
     * <strong>POST /v1/customers/{customerId}/addresses</strong></p>
     *
     * @param string $customerId     The ID of the customer for whom the address is to be created.
     * @param Address $address        The {@code Address} object containing address details.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout, automaticRetries
     *                                              and/or simulator (if applicable) for this request.
     *
     * @return Address containing the created address data.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
    */
    public function createAddress(
        string $customerId,
        Address $address,
        RequestOptions $requestOptions = null
    ): Address;

    /**
     * Gets the details of a customer address using the unique address ID
     * and customer ID with custom request options.
     * The request will be executed using custom RequestOptions
     * (e.g., connectTimeout, responseTimeout) instead of values from PaysafeClient.
     *
     * <p>Endpoint:
     * <strong>GET /v1/customers/{customerId}/addresses/{addressId}</strong></p>
     *
     * @param string $customerId     The unique ID of the customer who owns the address.
     * @param string $addressId      The unique ID of the address to retrieve.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *                                              and/or automaticRetries for this request.
     *
     * @return Address containing the address details for the given customer.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
    */
    public function getAddressById(
        string $customerId,
        string $addressId,
        RequestOptions $requestOptions = null
    ): Address;

    /**
     * Updates an existing address for a customer using the unique address ID and customer ID.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, responseTimeout, automaticRetries and/or simulator,
     * if applicable) instead of values from PaysafeClient.
     *
     * <p>Endpoint:
     * <strong>PUT /v1/customers/{customerId}/addresses/{addressId}</strong></p>
     *
     * @param string $customerId     The unique ID of the customer who owns the address.
     * @param string $addressId      The unique ID of the address to be updated.
     * @param Address $address        The {@code Address} object containing updated address details.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout
     *                                              and/or automaticRetries for this request.
     *
     * @return Address containing the updated address data.
     *
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
    */
    public function updateAddress(
        string $customerId,
        string $addressId,
        Address $address,
        RequestOptions $requestOptions = null
    ): Address;

    /**
     * Deletes an existing address for a specific customer using custom request options
     * (connectTimeout, responseTimeout, automaticRetries and/or simulator, if applicable),
     * instead of values from PaysafeClient.<br />
     *
     * <p>Endpoint:
     * <strong>DELETE /v1/customers/{customerId}/addresses/{addressId}</strong></p>
     *
     * @param string $customerId     The unique identifier of the customer.
     * @param string $addressId      The unique identifier of the address to be deleted.
     * @param RequestOptions|null $requestOptions Custom connectTimeout, responseTimeout, and/or automaticRetries.
     * @throws PaysafeSdkException If the request fails or the response cannot be processed.
    */
    public function deleteAddress(string $customerId, string $addressId, RequestOptions $requestOptions = null): void;
}
