<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Exception;

use Paysafe\PhpSdk\Exception\Error\PaysafeError;
use Paysafe\PhpSdk\Model\BaseApiResponse;

/**
 * This type of exception is thrown in the event of 402 Payment Required HTTP response code from Paysafe Payments API.
 */
class RequestDeclinedException extends PaysafeSdkException
{
    /**
     * Represents details of the error, together with (partial) API response, in case of 402 HTTP status code.
     */
    private ?BaseApiResponse $apiResponse;

    /**
     * @param string $message
     * @param int|null $code
     * @param string|null $internalCorrelationId
     * @param PaysafeError|null $error
     * @param BaseApiResponse|null $apiResponse
     */
    public function __construct(
        string $message,
        int $code = null,
        string $internalCorrelationId = null,
        PaysafeError $error = null,
        BaseApiResponse $apiResponse = null
    ) {
        parent::__construct($message, $code, $internalCorrelationId, $error);
        $this->apiResponse = $apiResponse;
    }

    /**
     * @return BaseApiResponse|null
     */
    public function getApiResponse(): ?BaseApiResponse
    {
        return $this->apiResponse;
    }

    /**
     * @Override
     *
     * @return string
     */
    public function toString(): string
    {
        return "RequestDeclinedException{" .
            "code=" . $this->getCode() .
            ", internalCorrelationId='" . $this->getInternalCorrelationId() . '\'' .
            ", error=" . $this->getError() .
            ", apiResponse=" . $this->getApiResponse() .
            '}';
    }
}
