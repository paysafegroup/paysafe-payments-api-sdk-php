<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Exception;

use Exception;
use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Config\ObjectMapperConfiguration;
use Paysafe\PhpSdk\Exception\Error\AdditionalDetail;
use Paysafe\PhpSdk\Exception\Error\FieldError;
use Paysafe\PhpSdk\Exception\Error\PaysafeError;
use Paysafe\PhpSdk\Model\BaseApiResponse;

/**
 * Central error-routing factory that maps HTTP error responses from the Paysafe
 * Payments API to the appropriate SDK exception type.
 *
 * Status code mapping:
 * - 400 → {@see InvalidRequestException}
 * - 401 → {@see InvalidCredentialsException}
 * - 402 → {@see RequestDeclinedException} (includes partial API response)
 * - 403 → {@see UnauthorizedException}
 * - 409 → {@see RequestConflictException}
 * - 5xx → {@see ApiException}
 * - Other → {@see PaysafeSdkException}
 *
 * @internal
 */
class ExceptionBuilder
{
    public const HEADER_X_INTERNAL_CORRELATION_ID = "x-internal-correlation-id";

    private const HTTP_RESPONSE_CODE_BAD_REQUEST = 400;
    private const HTTP_RESPONSE_CODE_UNAUTHORIZED = 401;
    private const HTTP_RESPONSE_CODE_REQUEST_DECLINED = 402;
    private const HTTP_RESPONSE_CODE_FORBIDDEN = 403;
    private const HTTP_RESPONSE_CODE_CONFLICT = 409;
    private const HTTP_RESPONSE_CODE_INTERNAL_SERVER_ERROR = 500;

    /**
     * Builds a PaysafeSdkException. Extracts internalCorrelationId and HTTP response status code, if they exist.
     *
     * @param string $customMessage Custom message to use for building the exception.
     * @param Response $response Payments API response containing status code, internal correlation ID header, and
     * error details.
     * @param string|null $responseType
     *
     * @return PaysafeSdkException
     */
    public static function buildPaysafeSdkException(
        string $customMessage,
        Response $response,
        string $responseType = null
    ):
    PaysafeSdkException
    {
        $internalCorrelationId = $response->getHeaderLine(self::HEADER_X_INTERNAL_CORRELATION_ID);
        if (empty($internalCorrelationId)) {
            $internalCorrelationId = null;
        }

        $httpStatusCode = $response->getStatusCode() ?? null;
        $exception = null;

        try {
            if ($httpStatusCode === self::HTTP_RESPONSE_CODE_REQUEST_DECLINED) {
                /** @var BaseApiResponse $apiResponse */
                $apiResponse = ObjectMapperConfiguration::deserialize($response->getBody()->getContents(), $responseType);

                $errorResponse = json_decode((string)$response->getBody(), true);
                $errorData = $errorResponse['error'] ?? [];

                $paysafeError = (new PaysafeError())
                    ->setCode($errorData['code'] ?? '')
                    ->setmessage($errorData['message'] ?? '')
                    ->setDetails($errorData['details'] ?? [])
                    ->setAdditionalDetails(
                        self::buildAdditionalDetails($errorData['additionalDetails'] ?? [])
                    )
                    ->setfieldErrors(
                        self::buildFieldErrors($errorData['fieldErrors'] ?? []) ?? []
                    );

                return new RequestDeclinedException(
                    $customMessage,
                    $httpStatusCode,
                    $internalCorrelationId,
                    $paysafeError,
                    $apiResponse
                );
            }

            $errorResponse = json_decode((string)$response->getBody(), true);
            if (isset($errorResponse['error'])) {
                $paysafeError = new PaysafeError(
                    $errorResponse['error']['code'],
                    $errorResponse['error']['message'],
                    $errorResponse['error']['details'] ?? null,
                    self::buildAdditionalDetails($errorResponse['error']['additionalDetails'] ?? []),
                    self::buildFieldErrors($errorResponse['error']['fieldErrors'] ?? [])
                );

                if ($httpStatusCode === self::HTTP_RESPONSE_CODE_BAD_REQUEST) {
                    $exception = new InvalidRequestException($customMessage, $httpStatusCode, $internalCorrelationId, $paysafeError);
                } elseif ($httpStatusCode === self::HTTP_RESPONSE_CODE_UNAUTHORIZED) {
                    $exception = new InvalidCredentialsException($customMessage, $httpStatusCode, $internalCorrelationId, $paysafeError);
                } elseif ($httpStatusCode === self::HTTP_RESPONSE_CODE_FORBIDDEN) {
                    $exception = new UnauthorizedException($customMessage, $httpStatusCode, $internalCorrelationId, $paysafeError);
                } elseif ($httpStatusCode === self::HTTP_RESPONSE_CODE_CONFLICT) {
                    $exception = new RequestConflictException($customMessage, $httpStatusCode, $internalCorrelationId, $paysafeError);
                } elseif ($httpStatusCode >= self::HTTP_RESPONSE_CODE_INTERNAL_SERVER_ERROR) {
                    $exception = new ApiException($customMessage, $httpStatusCode, $internalCorrelationId, $paysafeError);
                } else {
                    $exception = new PaysafeSdkException($customMessage, $httpStatusCode, $internalCorrelationId, $paysafeError);
                }
            }
        } catch (Exception $e) {
            $exception = new PaysafeSdkException(
                "Exception while processing error response from PaymentsAPI",
                $httpStatusCode,
                $internalCorrelationId,
                null
            );
        }

        // Return a generic exception if no errors were found in response
        return $exception ?? new PaysafeSdkException(
            $customMessage,
            $httpStatusCode,
            $internalCorrelationId,
            null
        );
    }


    /**
     * Builds a list of AdditionalDetail objects.
     *
     * @param array|null $additionalDetails
     * @return array|null
     */
    private static function buildAdditionalDetails(?array $additionalDetails): ?array
    {
        if (empty($additionalDetails)) {
            return [];
        }

        return array_map(
            static fn(array $detail): AdditionalDetail => new AdditionalDetail($detail['type'], $detail['code'], $detail['message']),
            $additionalDetails
        );
    }

    /**
     * Builds a list of FieldError objects.
     *
     * @param array|null $fieldErrors
     * @return array|null
     */
    private static function buildFieldErrors(?array $fieldErrors): ?array
    {
        if (empty($fieldErrors)) {
            return null;
        }

        return array_map(
            static fn(array $fieldError): FieldError => new FieldError($fieldError['field'], $fieldError['error']),
            $fieldErrors
        );
    }
}
