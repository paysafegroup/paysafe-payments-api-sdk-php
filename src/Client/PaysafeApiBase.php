<?php
/** All Rights Reserved, Copyright (c) Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Client;

use Exception;
use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Config\Environment;
use Paysafe\PhpSdk\Config\ObjectMapperConfiguration;
use Paysafe\PhpSdk\Exception\ExceptionBuilder;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Validation\PropertyValidator;

abstract class PaysafeApiBase
{
    private const MERCHANT_REF_NUMBER_PARAM = "merchantRefNum";
    private const START_DATE_PARAM = "startDate";
    private const END_DATE_PARAM = "endDate";
    private const LIMIT_PARAM = "limit";
    private const OFFSET_PARAM = "offset";
    private const MERCHANT_CUSTOMER_ID_PARAM = "merchantCustomerId";
    private const FIELDS_PARAM = "fields";
    private const APPLICATION_JSON_CHARSET_UTF_8 = "application/json;charset=utf-8";
    private const PAYSAFE_PAYMENTS_API_SDK_PHP = "Paysafe_PaymentsAPI_SDK_PHP";
    private const PATH = "/paymenthub";
    private const URI_FORMAT = "%s%s%s";
    private const DEFAULT_CONNECT_TIMEOUT = 30;
    private const DEFAULT_RESPONSE_TIMEOUT = 60;
    private const DEFAULT_MAXIMUM_AUTOMATIC_RETRIES = 2;
    public const BASE_URL_LIVE = "https://api.paysafe.com";
    public const BASE_URL_TEST = "https://api.test.paysafe.com";

    protected string $apiKey;
    protected string $baseUrl;
    protected string $environment;
    protected int $clientConnectTimeout;
    protected int $clientResponseTimeout;
    protected int $clientMaxAutomaticRetries;
    protected ?array $customSslContext;
    protected ?string $providedProxy;

    /**
     * Instantiates a new PaysafeApiClient object, using the provided API key and environment.
     *
     * @param string $apiKey Merchant's credentials in form clientId:clientPassword.
     * @param string $environment Environment to which PaysafeClient connects ("LIVE" or "TEST").
     */
    public function __construct(
        string $apiKey,
        string $environment = Environment::TEST
    ) {
        $this->apiKey = $apiKey;
        $this->environment = $environment;
        $this->baseUrl = ($environment === 'LIVE') ? self::BASE_URL_LIVE : self::BASE_URL_TEST;

        $this->clientConnectTimeout = self::DEFAULT_CONNECT_TIMEOUT;
        $this->clientResponseTimeout = self::DEFAULT_RESPONSE_TIMEOUT;
        $this->clientMaxAutomaticRetries = self::DEFAULT_MAXIMUM_AUTOMATIC_RETRIES;
        $this->customSslContext = null;
        $this->providedProxy = null;
    }

    /**
     * Helper method for building json request body for POST requests.
     *
     * @param mixed $requestBody to write as json
     *
     * @return string JSON string representing requestBody
     *
     * @throws Exception If serialization fails
     */
    public function buildJsonRequestBody($requestBody): string
    {
        try {
            return ObjectMapperConfiguration::serialize($requestBody);
        } catch (Exception $e) {
            PaysafeLogger::getLogger()->error(
                sprintf("Exception while creating JSON request body: %s", $e->getMessage()),
                ['exception' => $e]
            );

            throw new \JsonException("Error creating JSON request body: " . $e->getMessage());
        }
    }

    /**
     * Build query parameters for API requests that require a merchant reference number.
     *
     * @param string|null $merchantRefNum The merchant reference number.
     * @param string|null $endDate The end date for the query.
     * @param int|null $limit The maximum number of records to return.
     * @param int|null $offset The starting position for the results.
     * @param string|null $startDate The start date for the query.
     *
     * customer ID that the merchant provided for their own internal customer identification
     * @param string|null $merchantCustomerId
     *
     * @param string|array|null $fields The start date for the query.
     *
     * @return string The query string.
     */
    public function buildQueryParameters(
        string $merchantRefNum = null,
        string $endDate = null,
        int $limit = null,
        int $offset = null,
        string $startDate = null,
        string $merchantCustomerId = null,
        $fields = null
    ): string {
        $queryParams = [];

        $queryParams[self::MERCHANT_REF_NUMBER_PARAM] = $merchantRefNum;

        if ($endDate !== null) {
            $queryParams[self::END_DATE_PARAM] = $endDate;
        }

        if ($limit !== null) {
            $queryParams[self::LIMIT_PARAM] = $limit;
        }

        if ($offset !== null) {
            $queryParams[self::OFFSET_PARAM] = $offset;
        }

        if ($startDate !== null) {
            $queryParams[self::START_DATE_PARAM] = $startDate;
        }

        if ($merchantCustomerId !== null) {
            $queryParams[self::MERCHANT_CUSTOMER_ID_PARAM] = $merchantCustomerId;
        }

        if ($fields !== null) {
            if (is_array($fields)) {
                $fieldsArray = [];
                foreach ($fields as $field) {
                    if (!empty($field)) {
                        $fieldsArray[] = $field;
                    }
                }
                $fields = implode(',', $fieldsArray);
            }
            $queryParams[self::FIELDS_PARAM] = $fields;
        }

        return '?' . http_build_query($queryParams);
    }

    /**
     * @param RequestOptions $requestOptions
     *
     * @return void
     */
    public static function validateRequestOptions(RequestOptions $requestOptions): void
    {
        PropertyValidator::validateMaxAutomaticRetries($requestOptions->getMaxAutomaticRetries());
        PropertyValidator::validateConnectTimeout($requestOptions->getConnectTimeout());
        PropertyValidator::validateResponseTimeout($requestOptions->getResponseTimeout());
    }

    /**
     * Creates and returns the user agent for cUrl operations
     *
     * @return string
     */
    public function getSdkUserAgent(): string
    {
        // fix the php version string
        $phpVersion = phpversion();
        if (strpos($phpVersion, '-') !== false) {
            $phpVersion = substr($phpVersion, 0, strpos($phpVersion, '-'));
        }

        return 'PaymentsAPI PHPSDK/' . self::getSdkVersion()
            . ' (' . php_uname('s') . '; ' . php_uname('r') . '; ' . php_uname('m') . ')'
            . ' PHP (' . $phpVersion . '; PHP Group)';
    }

    /**
     * Get the current SDK version
     *
     * @return string
     */
    public static function getSdkVersion(): string
    {
        $versionFile = realpath(__DIR__ . "/../VERSION");

        if (!file_exists($versionFile)) {
            return 'unknown';
        }

        return trim(file_get_contents($versionFile));
    }

    /**
     * Process HTTP response and map it to the given PHP object.
     *
     * @param Response $response The HTTP response from the Paysafe API.
     * @param string $returnType The class name to map the response to.
     * @return mixed The mapped object.
     * @throws PaysafeSdkException If an error occurs while processing the response.
     */
    public static function processResponse(Response $response, string $returnType)
    {
        if (self::requestSuccessful($response)) {
            try {
                return ObjectMapperConfiguration::deserialize($response->getBody(), $returnType);
            } catch (Exception $e) {
                PaysafeLogger::getLogger()->error(
                    sprintf("Exception while processing response from PaymentsAPI: %s", $e->getMessage()),
                    ['exception' => $e]
                );

                throw ExceptionBuilder::buildPaysafeSdkException(
                    "Error while processing response: " . $e->getMessage(),
                    $response,
                    $returnType
                );
            }
        } else {
            throw ExceptionBuilder::buildPaysafeSdkException(
                'Paysafe Payments API request unsuccessful',
                $response,
                $returnType
            );
        }
    }

    /**
     * Process HTTP response and map it to the given PHP object.
     *
     * @param Response $response The HTTP response from the Paysafe API.
     *
     * @return void The mapped object.
     *
     * @throws PaysafeSdkException If an error occurs while processing the response.
     */
    public static function processDeleteResponse(Response $response): void
    {
        if (!self::requestSuccessful($response)) {
            throw ExceptionBuilder::buildPaysafeSdkException(
                'Paysafe Payments API request unsuccessful',
                $response,
                null
            );
        }
    }

    /**
     * Check if the HTTP status code is 2xx (success).
     *
     * @param Response $response The HTTP response.
     * @return bool True if the status code is 2xx, false otherwise.
     */
    protected static function requestSuccessful(Response $response): bool
    {
        $statusCode = $response->getStatusCode();
        return $statusCode === 200 || $statusCode === 201;
    }

    /**
     * Sets request headers for the API request.
     */
    protected function setRequestHeaders(): array
    {
        return [
            'Authorization' => $this->getBasicAuthenticationHeader(),
            'Content-Type' => self::APPLICATION_JSON_CHARSET_UTF_8,
            'SDK-Type' => self::PAYSAFE_PAYMENTS_API_SDK_PHP,
            'User-Agent' => $this->getSdkUserAgent(),
        ];
    }

    /**
     * Generates a Basic Authentication header value.
     *
     * @return string The Basic Authentication header value.
     */
    public function getBasicAuthenticationHeader(): string
    {
        return "Basic " . base64_encode($this->apiKey);
    }


    /**
     * Builds the full request URI.
     */
    protected function buildRequestUri(string $endpoint): string
    {
        return sprintf(self::URI_FORMAT, $this->baseUrl, self::PATH, $endpoint);
    }

}
