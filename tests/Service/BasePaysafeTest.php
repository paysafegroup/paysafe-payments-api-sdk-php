<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use Exception;
use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Config\ObjectMapperConfiguration;
use Paysafe\PhpSdk\Exception\ExceptionBuilder;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use PHPUnit\Framework\TestCase;

/**
 *
 */
abstract class BasePaysafeTest extends TestCase
{
    const WIREMOCK_URL = "http://localhost:8080";
    const API_KEY = "clientId:clientKey";

    const MONITOR_STATUS_READY = "{\n" .
        "\"status\": \"READY\"\n" .
    "}";
    const UNAUTHORIZED_ACCESS_ERROR_RESPONSE = "{\n" .
      "    \"error\": {\n" .
      "        \"code\": \"5270\",\n" .
      "        \"message\": \"Unauthorized access\",\n" .
      "        \"details\": [\n" .
      "            \"The credentials do not have permission to access the requested data.\"\n" .
      "        ]\n" .
      "    }\n" .
      "}";
    const INVALID_CREDENTIALS_ERROR_RESPONSE = "{\n" .
      "    \"error\": {\n" .
      "        \"code\": \"5279\",\n" .
      "        \"message\": \"Invalid credentials\",\n" .
      "        \"details\": [\n" .
      "            \"The authentication credentials are invalid.\"\n" .
      "        ]\n" .
      "    }\n" .
      "}";
    const ENTITY_NOT_FOUND_ERROR_RESPONSE = "{\n" .
      "    \"error\": {\n" .
      "        \"code\": \"5269\",\n" .
      "        \"message\": \"Entity not found\",\n" .
      "        \"details\": [\n" .
      "            \"The ID(s) specified in the URL do not correspond to the values in the system.\"\n" .
      "        ]\n" .
      "    }\n" .
      "}";
    const BAD_REQUEST_ERROR_RESPONSE = "{\n" .
      "    \"error\": {\n" .
      "        \"code\": \"5001\",\n" .
      "        \"message\": \"Invalid currency\",\n" .
      "        \"details\": [\n" .
      "            \"currencyCode INVALID is not valid\"\n" .
      "        ]\n" .
      "    }\n" .
      "}";
    const BAD_REQUEST_OFFSET_ERROR_RESPONSE = "{\n" .
      "    \"error\": {\n" .
      "        \"code\": \"5068\",\n" .
      "        \"message\": \"Field error(s)\",\n" .
      "        \"details\": [\n" .
      "            \"Either you submitted a request that is missing a mandatory field "
        . "or the value of a field does not match the format expected.\"\n" .
      "        ],\n" .
      "        \"fieldErrors\": [\n" .
      "           {\n" .
      "             \"field\": \"offset\",\n" .
      "             \"error\": \"Offset value should be greater than or equal to zero\"\n" .
      "           }\n" .
      "        ]\n" .
      "    }\n" .
      "}";
    const REQUEST_CONFLICT_ERROR_RESPONSE = "{\n" .
      "    \"error\": {\n" .
      "        \"code\": \"DW-CUSTOMER-CONFLICT\",\n" .
      "        \"message\": \"Customer conflict\",\n" .
      "        \"additionalDetails\": [\n {" .
      "            \"message\": \"Customer already exists.\",\n" .
      "            \"code\": \"22\",\n" .
      "            \"type\": \"Duplication\"\n" .
      "        }]\n" .
      "    }\n" .
      "}";
    const INTERNAL_SERVER_ERROR_RESPONSE = "{\n" .
      "    \"error\": {\n" .
      "        \"code\": \"1000\",\n" .
      "        \"message\": \"Internal Error\",\n" .
      "        \"details\": [\n" .
      "             \"An internal error occurred.\"" .
      "        ]\n" .
      "    }\n" .
      "}";
    const REQUEST_DECLINED_RESPONSE = "{\n" .
      "    \"merchantRefNum\": \"123456\",\n" .
      "    \"id\": \"random-uuid\",\n" .
      "    \"gatewayResponse\": {\"responseCodeDescription\" : \"Refer to Issuer\"},\n" .
      "    \"error\": {\n" .
      "        \"code\": \"ALTERNATE-PAYMENTS-GATEWAY-4\",\n" .
      "        \"message\": \"Transaction declined\",\n" .
      "        \"details\": [\n" .
      "             \"The transaction was declined by the processing gateway.\"," .
      "             \"Merchant configuration is incorrect. Verify setup in Netbanx.\"" .
      "        ]\n" .
      "    }\n" .
      "}";

    public PaysafeApiClient $paysafeApiClient;

    public function setUp(): void
    {
        parent::setUp();

        $this->paysafeApiClient = new PaysafeApiClient(self::API_KEY);
        $this->paysafeApiClient->overrideBaseUrl(self::WIREMOCK_URL);
    }

    /**
     * @param array|null $array
     *
     * @return string
     */
    protected function mock_serialize(array $array = null): string
    {
        return ObjectMapperConfiguration::serialize($array);
    }
}
