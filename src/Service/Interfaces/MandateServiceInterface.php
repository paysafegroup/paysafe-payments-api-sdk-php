<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Service\Interfaces;

use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Common\Mandate;

interface MandateServiceInterface
{
    /**
     * <p>Create a Mandate for a Customer.</p>
     *
     * <p>Endpoint:
     * <strong>POST /v1/customers/{customerId}/paymenthandles/{paymentHandleId}/mandates</strong></p>
     *
     * @param string $customerId      the ID of the customer
     * @param string $paymentHandleId the Payment Handle ID returned in the response
     *                                  to the Customer Payment Handle creation request
     * @param mixed|null $requestBody     containing the mandate reference (required)
     * @param RequestOptions|null $requestOptions  RequestOptions including simulator, timeouts, and retries
     *
     * @return Mandate containing the created mandate details
     *
     * @throws PaysafeSdkException if an error occurs
     */
    public function createMandate(
        string $customerId,
        string $paymentHandleId,
        $requestBody = null,
        RequestOptions $requestOptions = null
    ): Mandate;

    /**
     * <p>Look up the status of a Mandate.</p>
     *
     * <p>Endpoint:
     * <strong>GET /v1/customers/{customerId}/paymenthandles/{paymentHandleId}/mandates/{mandateId}</strong></p>
     *
     * @param string $customerId      the ID of the customer
     * @param string $paymentHandleId the Payment Handle ID
     * @param string $mandateId       the Mandate ID returned in the response to the Create Mandate request
     * @param RequestOptions|null $requestOptions  RequestOptions including simulator, timeouts, and retries
     *
     * @return Mandate containing the mandate details and status
     *
     * @throws PaysafeSdkException if an error occurs
     */
    public function getMandateStatus(
        string $customerId,
        string $paymentHandleId,
        string $mandateId,
        RequestOptions $requestOptions = null
    ): Mandate;

    /**
     * <p>Cancel a Mandate.</p>
     *
     * <p>Endpoint:
     * <strong>PUT /v1/customers/{customerId}/paymenthandles/{paymentHandleId}/mandates/{mandateId}</strong></p>
     *
     * @param string $customerId      the ID of the customer
     * @param string $paymentHandleId the Payment Handle ID
     * @param string $mandateId       the Mandate ID returned in the response to the Create Mandate request
     * @param mixed|null $requestBody     containing the status set to CANCELLED
     * @param RequestOptions|null $requestOptions  RequestOptions including simulator, timeouts, and retries
     *
     * @return Mandate containing the cancelled mandate details
     *                  with status CANCELLED and statusReason MERCHANT_CANCELLED
     *
     * @throws PaysafeSdkException if an error occurs
     */
    public function cancelMandate(
        string $customerId,
        string $paymentHandleId,
        string $mandateId,
        $requestBody = null,
        RequestOptions $requestOptions = null
    ): Mandate;
}
