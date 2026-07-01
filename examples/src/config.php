<?php
// All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE

/**
 * Configuration loader for the Paysafe Merchant Demo.
 * Reads settings from the .env file.
 */

$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || $line[0] === '#') {
            continue;
        }
        if (str_contains($line, '=')) {
            [$key, $value] = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

return [
    'apiKey'        => $_ENV['PAYSAFE_API_KEY'] ?? '',
    'accountId'     => $_ENV['PAYSAFE_ACCOUNT_ID'] ?? '',
    'returnUrlBase' => $_ENV['PAYSAFE_RETURN_URL_BASE'] ?? 'http://127.0.0.1:8888',
    'logLevel'      => $_ENV['PAYSAFE_LOG_LEVEL'] ?? 'ERROR',
];

