<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Exception;

use Exception;
use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Config\ObjectMapperConfiguration;
use Paysafe\PhpSdk\Exception\Error\AdditionalDetail;
use Paysafe\PhpSdk\Exception\Error\FieldError;
use Paysafe\PhpSdk\Exception\Error\PaysafeError;
use Paysafe\PhpSdk\Model\BaseApiResponse;

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
     * @return PaysafeSdkException
     */
    public static function buildPaysafeSdkException(string $customMessage, Response $response, $responseType):
    PaysafeSdkException
    {
        $internalCorrelationId = $response->getHeaderLine(self::HEADER_X_INTERNAL_CORRELATION_ID);
        if (empty($internalCorrelationId)) {
            $internalCorrelationId = null;
        }

        $httpStatusCode = $response->getStatusCode() ?? null;
        $exception = null;

        try {
            if ($httpStatusCode == self::HTTP_RESPONSE_CODE_REQUEST_DECLINED) {
                /** @var BaseApiResponse $apiResponse */
                $apiResponse = ObjectMapperConfiguration::deserialize($response->getBody(), $responseType);

                $apiResponseError = $apiResponse->getError();

                $paysafeError = (new PaysafeError())
                    ->setCode($apiResponseError->getCode())
                    ->setmessage($apiResponseError->getMessage())
                    ->setDetails($apiResponseError->getDetails())
                    ->setAdditionalDetails(
                        self::buildAdditionalDetails($apiResponseError->getAdditionalDetails())
                    )
                    ->setfieldErrors($apiResponseError->getFieldErrors());

                return new RequestDeclinedException(
                    $customMessage,
                    $httpStatusCode,
                    $internalCorrelationId,
                    $paysafeError,
                    $apiResponse
                );
            }

            $errorResponse = json_decode($response->getBody(), true);
            if (isset($errorResponse['error'])) {
                $paysafeError = new PaysafeError(
                    $errorResponse['error']['code'],
                    $errorResponse['error']['message'],
                    $errorResponse['error']['details'] ?? null,
                    self::buildAdditionalDetails($errorResponse['error']['additionalDetails'] ?? []),
                    self::buildFieldErrors($errorResponse['error']['fieldErrors'] ?? [])
                );

                switch ($httpStatusCode) {
                    case self::HTTP_RESPONSE_CODE_BAD_REQUEST:
                        $exception = new InvalidRequestException(
                            $customMessage,
                            $httpStatusCode,
                            $internalCorrelationId,
                            $paysafeError
                        );
                        break;
                    case self::HTTP_RESPONSE_CODE_UNAUTHORIZED:
                        $exception = new InvalidCredentialsException(
                            $customMessage,
                            $httpStatusCode,
                            $internalCorrelationId,
                            $paysafeError
                        );
                        break;
                    case self::HTTP_RESPONSE_CODE_FORBIDDEN:
                        $exception = new UnauthorizedException(
                            $customMessage,
                            $httpStatusCode,
                            $internalCorrelationId,
                            $paysafeError
                        );
                        break;
                    case self::HTTP_RESPONSE_CODE_CONFLICT:
                        $exception = new RequestConflictException(
                            $customMessage,
                            $httpStatusCode,
                            $internalCorrelationId,
                            $paysafeError
                        );
                        break;
                    default:
                        $exception = ($httpStatusCode >= self::HTTP_RESPONSE_CODE_INTERNAL_SERVER_ERROR)
                            ? new ApiException($customMessage, $httpStatusCode, $internalCorrelationId, $paysafeError)
                            : new PaysafeSdkException(
                                $customMessage,
                                $httpStatusCode,
                                $internalCorrelationId,
                                $paysafeError
                            );
                        break;
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

        return array_map(function ($detail) {
            return new AdditionalDetail($detail['type'], $detail['code'], $detail['message']);
        }, $additionalDetails);
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

        return array_map(function ($fieldError) {
            return new FieldError($fieldError['field'], $fieldError['error']);
        }, $fieldErrors);
    }
}
