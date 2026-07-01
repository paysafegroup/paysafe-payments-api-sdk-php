<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE */

declare(strict_types=1);

namespace Paysafe\PhpSdk\Logging;

use InvalidArgumentException;

final class LoggingLevel
{
    public const ERROR = 'ERROR';
    public const ALL = 'ALL';

    public static function validate(string $level): void
    {
        if (!in_array($level, [self::ERROR, self::ALL], true)) {
            throw new InvalidArgumentException(sprintf(
                'Invalid logging level "%s". Allowed values are %s and %s.',
                $level,
                self::ERROR,
                self::ALL
            ));
        }
    }
}

