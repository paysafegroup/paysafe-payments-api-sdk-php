<?php
/* All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Service;

use Paysafe\PhpSdk\Client\PaysafeApiClient;
use Paysafe\PhpSdk\Config\ObjectMapperConfiguration;
use PHPUnit\Framework\TestCase;

/**
 *
 */
abstract class BasePaysafeService extends TestCase
{
    const WIREMOCK_URL = "http://localhost:8080";
    const API_KEY = "clientId:clientKey";

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

    /**
     * @param $path
     *
     * @return string
     */
    protected function get_resource_json($path): string
    {
        $full_path = __DIR__ . "/resources/json/" . $path;
        if (file_exists($full_path)) {
            return file_get_contents($full_path);
        }

        return "{}";
    }
}
