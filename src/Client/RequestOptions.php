<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */
namespace Paysafe\PhpSdk\Client;

/**
 * This class is used to define configuration for each request. Fields that may be modified per request:
 * connectTimeout: maximum time allowed to establish connection to Paysafe API, in milliseconds. Default: 30000
 * responseTimeout: maximum time allowed to read the data from established connection, in milliseconds. Default: 6000
 * maxAutomaticRetries: the number of times that the request will be
 * automatically retried in case of ApiConnectionException.
 * In case of other exceptions, the request will not be retried. Default: 0
 * simulator: The simulator is only applicable in the test environment and its default value is set as EXTERNAL.
 * In the production environment, the simulator value is disregarded, even if provided,
 * and the experience will be the same as
 * if the simulator value were set as EXTERNAL.
 * If any of the configuration value is not provided when executing API request, default value will be used.
 */
class RequestOptions
{
    const PAYMENT_SIMULATOR_EXTERNAL = 'EXTERNAL';
    const PAYMENT_SIMULATOR_INTERNAL = 'INTERNAL';
    private ?int $connectTimeout;
    private ?int $responseTimeout;
    private ?int $maxAutomaticRetries;
    private string $simulator;

    /**
     * @param int|null $connectTimeout
     * @param int|null $responseTimeout
     * @param int|null $maxAutomaticRetries
     */
    public function __construct(
        ?int $connectTimeout = null,
        ?int $responseTimeout = null,
        ?int $maxAutomaticRetries = null,
        string $simulator = self::PAYMENT_SIMULATOR_EXTERNAL
    ) {
        $this->connectTimeout = $connectTimeout;
        $this->responseTimeout = $responseTimeout;
        $this->maxAutomaticRetries = $maxAutomaticRetries;
        $this->simulator = $simulator;
    }

    public function getSimulator(): string
    {
        return $this->simulator;
    }

    public function setSimulator(string $simulator): void
    {
        $this->simulator = $simulator;
    }

    /**
     * Get the connection timeout in milliseconds.
     *
     * @return int|null
     */
    public function getConnectTimeout(): ?int
    {
        return $this->connectTimeout;
    }

    /**
     * @param int $connectTimeout
     */
    public function setConnectTimeout(int $connectTimeout): void
    {
        $this->connectTimeout = $connectTimeout;
    }

    /**
     * Get the response timeout in milliseconds.
     *
     * @return int|null
     */
    public function getResponseTimeout(): ?int
    {
        return $this->responseTimeout;
    }

    /**
     * @param int $responseTimeout
     */
    public function setResponseTimeout(int $responseTimeout): void
    {
        $this->responseTimeout = $responseTimeout;
    }

    /**
     * Get the maximum automatic retries in case of connection failure.
     *
     * @return int|null
     */
    public function getMaxAutomaticRetries(): ?int
    {
        return $this->maxAutomaticRetries;
    }

    /**
     * @param int $maxAutomaticRetries
     */
    public function setMaxAutomaticRetries(int $maxAutomaticRetries): void
    {
        $this->maxAutomaticRetries = $maxAutomaticRetries;
    }
}
