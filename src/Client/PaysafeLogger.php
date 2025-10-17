<?php

namespace Paysafe\PhpSdk\Client;

use Monolog\Handler\HandlerInterface;
use Monolog\Logger;
use Paysafe\PhpSdk\Exception\ExceptionBuilder;

class PaysafeLogger
{
    private static ?Logger $logger = null;

    /**
     * @return Logger
     */
    public static function getLogger(): Logger
    {
        if (!isset(self::$logger)) {
            self::$logger = new Logger(ExceptionBuilder::class);
        }

        return self::$logger;
    }

    /**
     * Replace the logger handler
     *
     * @param HandlerInterface $handler
     *
     * @return void
     */
    public static function addLoggerHandler(HandlerInterface $handler): void
    {
        self::getLogger()->pushHandler($handler);
    }
}
