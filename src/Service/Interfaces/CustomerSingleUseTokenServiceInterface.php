<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service\Interfaces;

use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Customer\SingleUseCustomerToken\SingleUseCustomerToken;
use Paysafe\PhpSdk\Model\Customer\SingleUseCustomerToken\SingleUseCustomerTokenRequest;

interface CustomerSingleUseTokenServiceInterface
{
    /**
     * Create a Single-Use Token for an existing Customer.<br />
     * The <i>singleUseCustomerToken</i> returned in the response is then used in the PaymentsCheckout SDK
     * (for the <i>singleUseCustomerToken</i> parameter)
     * when you want to use saved cards and addresses. Any addresses and/or payment details that
     * have been saved for this {@code customerId}
     * would then be displayed in the Payments Checkout. <br />
     * <b>Note:</b> The {@code customerId} used in this request must be taken from a Customer
     * created using a single-use Payment Handle Token.<br /><br />
     * The request will be executed using custom RequestOptions
     * (connectTimeout, responseTimeout and/or automaticRetries),
     * instead of values from PaysafeClient.
     *
     * <p>Endpoint:
     * <strong>POST /v1/customers/{customerId}/singleusecustomertokens</strong></p>
     *
     * @param string $customerId     the unique ID returned in the response to the Create a Customer request
     * @param SingleUseCustomerTokenRequest $requestBody    details used for single-use token creation
     * @param RequestOptions|null $requestOptions connectTimeout, responseTimeout, automaticRetries for this request
     * @return SingleUseCustomerToken which contains Customer data and the generated single-use token
     *
    * @throws PaysafeSdkException if an error occurs
    */
    public function createSingleUseCustomerToken(
        string $customerId,
        SingleUseCustomerTokenRequest $requestBody,
        RequestOptions $requestOptions = null
    ): SingleUseCustomerToken;

    /**
     * Get a Single-Use Customer Token by its unique ID.<br />
     * Use the <i>singleUseCustomerToken</i> returned in the response in the Payments Checkout SDK
     * when you want to use saved cards and addresses,
     * provided the <i>timeToLiveSeconds</i> has not expired. <br /><br />
     * The request will be executed using custom RequestOptions
     * (connectTimeout, readTimeout, maxAutomaticRetries and/or simulator, if applicable),
     * instead of default values from PaysafeClient.
     *
     * @param string $singleUseCustomerTokenId the Single-Use Customer Token ID returned in the response
     *                                          of the Single-Use Customer Token creation request
     * @param RequestOptions|null $requestOptions connectTimeout, responseTimeout, maxAutomaticRetries for this request
     *
     * @return SingleUseCustomerToken which contains Customer data and its single-use token
     *
     * @throws PaysafeSdkException if an error occurs
    */
    public function getSingleUseCustomerToken(
        string $singleUseCustomerTokenId,
        RequestOptions $requestOptions = null
    ): SingleUseCustomerToken;
}
