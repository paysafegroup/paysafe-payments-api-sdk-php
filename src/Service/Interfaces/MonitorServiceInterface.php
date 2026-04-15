<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

namespace Paysafe\PhpSdk\Service\Interfaces;

use Paysafe\PhpSdk\Client\RequestOptions;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Model\Monitor\MonitorResponse;

/**
 * Interface MonitorService
 * Provides the service to monitor the system.
 */
interface MonitorServiceInterface
{

    /**
     * Monitors the system.
     *
     * @param RequestOptions|null $requestOptions
     * @return MonitorResponse The response from the monitoring service.
     * @throws PaysafeSdkException If there is an API error.
     */
    public function monitor(RequestOptions $requestOptions = null): MonitorResponse;
}
