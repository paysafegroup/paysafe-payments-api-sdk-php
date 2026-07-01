<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Client;

use Monolog\Handler\HandlerInterface;
use Monolog\Logger;
use Paysafe\PhpSdk\Exception\ExceptionBuilder;
use Psr\Log\LoggerInterface;

class PaysafeLogger
{
    private static ?LoggerInterface $logger = null;

    /**
     * @return LoggerInterface
     */
    public static function getLogger(): LoggerInterface
    {
        if (!isset(self::$logger)) {
            self::$logger = new Logger(ExceptionBuilder::class);
        }

        return self::$logger;
    }

    /**
     * Set a custom PSR LoggerInterface type logger
     *
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public static function setLogger(LoggerInterface $logger): void
    {
        self::$logger = $logger;
    }

    /**
     * Replace the logger handler in a Monolog Logger
     *
     * @param HandlerInterface $handler
     *
     * @return void
     */
    public static function addLoggerHandler(HandlerInterface $handler): void
    {
        $logger = self::getLogger();
        if (!$logger instanceof Logger) {
            throw new \LogicException(
                'Cannot add a Monolog handler because a custom logger has been set. Use setLogger() to replace it instead.'
            );
        }
        $logger->pushHandler($handler);
    }
}
