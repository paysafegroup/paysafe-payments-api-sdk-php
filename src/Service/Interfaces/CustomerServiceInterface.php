<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service\Interfaces;

use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Customer\Customer;
use Paysafe\PhpSdk\Model\Customer\CustomerRequest;

interface CustomerServiceInterface
{
    /**
     * Create new Customer.  The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     * <b>Note:</b> You can create a customer and store his/her credit card information
     * to the customer profile by adding a Customer Payment Handle.
     *
     * @param CustomerRequest $customerRequest containing new Customer's data
     *
     * Custom connectTimeout, readTimeout, maxAutomaticRetries and/or simulator (if applicable) for this request.
     * @param RequestOptions|null $requestOptions
     *
     * @return Customer, if it was created successfully
     *
     * @throws PaysafeSdkException if an error occurs
    */
    public function createCustomer(CustomerRequest $customerRequest, RequestOptions $requestOptions = null): Customer;

    /**
     * Delete an existing Customer by its unique ID. The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator,
     * if applicable), instead of default values from PaysafeClient.
     *
     * @param string $customerId     the unique ID returned in the response to the Create a Customer request
     *
     * custom connectTimeout, responseTimeout maxAutomaticRetries and/or simulator, if applicable for this request.
     * @param RequestOptions|null $requestOptions
     *
     * @throws PaysafeSdkException if an error occurs
    */
    public function deleteCustomer(string $customerId, RequestOptions $requestOptions = null): void;

    /**
     * Get an existing Customer profile details by Customer ID.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $customerId     the unique ID returned in the response to the Create a Customer request
     * @param array|null $fields         list of sub-components (Possible values: addresses, paymenthandles)
     *
     * custom connectTimeout, responseTimeout maxAutomaticRetries and/or simulator, if applicable for this request.
     * @param RequestOptions|null $requestOptions
     *
     * @return Customer, if found
     *
     * @throws PaysafeSdkException if an error occurs
    */
    public function getCustomerById(
        string $customerId,
        array $fields = null,
        RequestOptions $requestOptions = null
    ): Customer;

    /**
     * Get an existing Customer profile details by Merchant Customer ID.
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator,
     * if applicable), instead of default values from PaysafeClient.
     *
     * customer ID that the merchant provided with the customer
     * creation request for their own internal customer identification
     * @param string $merchantCustomerId
     * @param array|null $fields  list of sub-components (Possible values: addresses, paymenthandles)
     *
     * custom connectTimeout, responseTimeout maxAutomaticRetries and/or simulator, if applicable for this request.
     * @param RequestOptions|null $requestOptions
     *
     * @return Customer, if found
     *
     * @throws PaysafeSdkException if an error occurs
    */
    public function getCustomerByMerchantCustomerId(
        string $merchantCustomerId,
        array $fields = null,
        RequestOptions $requestOptions = null
    ): Customer;

    /**
     * Update a Customer details. <br />
     * <b>Note: </b> You must provide all the elements of the customer when you are updating it,
     * including the elements that are not changing.
     * Elements that are part of an existing customer but that are not included in the update request
     * will be set to null in the resulting customer. <br /><br />
     * The request will be executed using custom RequestOptions (connectTimeout,
     * readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $customerId the unique ID returned in the response to the Create a Customer request
     * @param CustomerRequest $customerRequest Customer's new details
     *
     * custom connectTimeout, responseTimeout maxAutomaticRetries and/or simulator, if applicable for this request.
     * @param RequestOptions|null $requestOptions
     *
     * @return Customer the resulting Customer with updated data
     *
     * @throws PaysafeSdkException if an error occurs
    */
    public function updateCustomer(
        string $customerId,
        CustomerRequest $customerRequest,
        RequestOptions $requestOptions = null
    ): Customer;
}
