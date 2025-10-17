<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service\Interfaces;

use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\PaymentMethod\LookUpPaymentMethodsResponse;

/**
 * Interface LookUpPaymentMethodsService
 * Provides the service to retrieve the list of payment methods enabled for a given merchant account by currency code.
 */
interface LookUpPaymentMethodsServiceInterface
{

    /**
     * Retrieves the list of payment methods enabled for a given merchant account by currency code.
     *
     * @param string $currencyCode The currency code for the merchant account (e.g., USD, CAD).
     * @param RequestOptions|null $requestOptions
     * @return LookUpPaymentMethodsResponse The response containing the list of payment methods.
     * @throws PaysafeSdkException If there is an API error.
     */
    public function getPaymentMethods(
        string $currencyCode,
        RequestOptions $requestOptions = null
    ): LookUpPaymentMethodsResponse;
}
