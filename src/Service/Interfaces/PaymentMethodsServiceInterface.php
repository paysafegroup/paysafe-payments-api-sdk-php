<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service\Interfaces;

use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\PaymentMethod\LookUpPaymentMethodsResponse;

interface PaymentMethodsServiceInterface
{
    /**
     * Retrieves the list of payment methods enabled for a given merchant account by currency code.
     * The request will be executed using custom RequestOptions (connectTimeout, readTimeout
     * maxAutomaticRetries and/or simulator, if applicable), instead of default values from PaysafeClient.
     *
     * @param string $currencyCode   the currency code for the merchant account (e.g. USD, CAD)
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
    ): LookUpPaymentMethodsResponse;
}
