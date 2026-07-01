<?php
// All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE

/**
 * Front controller / router for the Paysafe PHP Merchant Demo.
 * This is a plain PHP application — no framework required.
 *
 * Usage: php -S 127.0.0.1:8888 -t public public/index.php
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Paysafe\PhpSdk\PaysafeClient;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\MerchantDemo\DemoService;

// ─── Bootstrap ─────────────────────────────────────────────────────────
session_start();

$config = require __DIR__ . '/../src/config.php';

$paysafeClient = new PaysafeClient($config['apiKey'], 'TEST');
$paysafeClient->setLoggingLevel($config['logLevel']);
$paysafeClient->setMaxAutomaticRetries(3);
$paysafeClient->setConnectTimeout(60000);
$paysafeClient->setResponseTimeout(60000);

$service = new DemoService($paysafeClient, $config['accountId'], $config['returnUrlBase']);

// Restore transaction store from session
if (isset($_SESSION['transactions'])) {
    $ref = new ReflectionProperty(DemoService::class, 'transactions');
    $ref->setAccessible(true);
    $ref->setValue(null, $_SESSION['transactions']);
}

// ─── Routing ───────────────────────────────────────────────────────────
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Static files
if (preg_match('#^/(css|js)/.+$#', $uri)) {
    return false; // Let PHP built-in server handle static files
}

$successMessage = $_SESSION['successMessage'] ?? null;
$errorMessage = $_SESSION['errorMessage'] ?? null;
unset($_SESSION['successMessage'], $_SESSION['errorMessage']);

try {
    if ($method === 'GET' && $uri === '/') {
        renderHome($service, $successMessage, $errorMessage);
    } elseif ($method === 'POST' && $uri === '/checkout') {
        handleCheckout($service);
    } elseif ($method === 'GET' && preg_match('#^/3ds/return/(.+)$#', $uri, $m)) {
        handleReturn($service, $m[1], '3DS payment completed!', '3DS payment failed');
    } elseif ($method === 'GET' && preg_match('#^/redirect/return/(.+)$#', $uri, $m)) {
        handleReturn($service, $m[1], 'Payment completed!', 'Redirect payment failed');
    } elseif ($method === 'POST' && preg_match('#^/void/(.+)$#', $uri, $m)) {
        handleVoid($service, $m[1]);
    } elseif ($method === 'POST' && preg_match('#^/settle/(.+)$#', $uri, $m)) {
        handleSettle($service, $m[1]);
    } elseif ($method === 'POST' && preg_match('#^/cancel/(.+)$#', $uri, $m)) {
        handleCancel($service, $m[1]);
    } elseif ($method === 'POST' && preg_match('#^/refund/(.+)$#', $uri, $m)) {
        handleRefund($service, $m[1]);
    } else {
        http_response_code(404);
        echo 'Not Found';
    }
} finally {
    // Persist transaction store to session
    $ref = new ReflectionProperty(DemoService::class, 'transactions');
    $ref->setAccessible(true);
    $_SESSION['transactions'] = $ref->getValue();
}

// ─── Route handlers ────────────────────────────────────────────────────

function handleCheckout(DemoService $service): void
{
    $form = [
        'paymentMethod' => $_POST['paymentMethod'] ?? 'CARD',
        'holderName'    => $_POST['holderName'] ?? '',
        'cardNum'       => $_POST['cardNum'] ?? '',
        'expiry'        => $_POST['expiry'] ?? '',
        'cvv'           => $_POST['cvv'] ?? '',
        'amount'        => $_POST['amount'] ?? '0',
        'street'        => $_POST['street'] ?? '',
        'street2'       => $_POST['street2'] ?? '',
        'city'          => $_POST['city'] ?? '',
        'state'         => $_POST['state'] ?? '',
        'country'       => $_POST['country'] ?? '',
        'zip'           => $_POST['zip'] ?? '',
        'paypalEmail'   => $_POST['paypalEmail'] ?? '',
        'skrillId'      => $_POST['skrillId'] ?? '',
        'customerIp'    => $_POST['customerIp'] ?? null,
    ];

    try {
        $paymentMethod = $form['paymentMethod'];
        if ($paymentMethod === 'CARD') {
            $result = $service->createPaymentHandleWith3ds($form);
        } else {
            $result = $service->createRedirectPaymentHandle($form, $paymentMethod);
        }

        if ($result['redirectUrl'] !== null) {
            saveTransactions($service);
            header('Location: ' . $result['redirectUrl']);
            exit;
        }

        $tx = $service->completePendingHandle($result['merchantRef']);
        $_SESSION['successMessage'] = sprintf(
            'Payment authorized! Transaction ID: %s | Paysafe Payment ID: %s',
            $tx['id'], $tx['paymentId']
        );
    } catch (PaysafeSdkException $e) {
        $_SESSION['errorMessage'] = DemoService::buildErrorMessage('Payment failed', $e);
    } catch (\Throwable $e) {
        $_SESSION['errorMessage'] = DemoService::buildErrorMessage('Payment failed', $e);
    }

    saveTransactions($service);
    header('Location: /');
    exit;
}

function handleReturn(DemoService $service, string $ref, string $successPrefix, string $errorPrefix): void
{
    try {
        $tx = $service->completePendingHandle($ref);
        $_SESSION['successMessage'] = sprintf(
            '%s Transaction ID: %s | Paysafe Payment ID: %s',
            $successPrefix, $tx['id'], $tx['paymentId']
        );
    } catch (PaysafeSdkException $e) {
        $_SESSION['errorMessage'] = DemoService::buildErrorMessage($errorPrefix, $e);
    } catch (\Throwable $e) {
        $_SESSION['errorMessage'] = $errorPrefix . ': ' . $e->getMessage();
    }

    saveTransactions($service);
    header('Location: /');
    exit;
}

function handleVoid(DemoService $service, string $txId): void
{
    try {
        $tx = $service->voidAuthorization($txId);
        $_SESSION['successMessage'] = sprintf('Authorization voided! Void ID: %s', $tx['voidAuthorizationId']);
    } catch (\Throwable $e) {
        $_SESSION['errorMessage'] = DemoService::buildErrorMessage('Void failed', $e);
    }
    saveTransactions($service);
    header('Location: /');
    exit;
}

function handleSettle(DemoService $service, string $txId): void
{
    try {
        $tx = $service->settle($txId);
        $_SESSION['successMessage'] = sprintf('Settlement successful! Settlement ID: %s', $tx['settlementId']);
    } catch (\Throwable $e) {
        $_SESSION['errorMessage'] = DemoService::buildErrorMessage('Settlement failed', $e);
    }
    saveTransactions($service);
    header('Location: /');
    exit;
}

function handleCancel(DemoService $service, string $txId): void
{
    try {
        $service->cancelSettlement($txId);
        $_SESSION['successMessage'] = 'Transaction cancelled successfully.';
    } catch (\Throwable $e) {
        $_SESSION['errorMessage'] = DemoService::buildErrorMessage('Cancellation failed', $e);
    }
    saveTransactions($service);
    header('Location: /');
    exit;
}

function handleRefund(DemoService $service, string $txId): void
{
    $customerAccountId = $_POST['customerAccountId'] ?? null;
    try {
        $tx = $service->refund($txId, $customerAccountId);
        $_SESSION['successMessage'] = sprintf('Refund issued! Refund ID: %s', $tx['refundId']);
    } catch (\Throwable $e) {
        $_SESSION['errorMessage'] = DemoService::buildErrorMessage('Refund failed', $e);
    }
    saveTransactions($service);
    header('Location: /');
    exit;
}

function saveTransactions(DemoService $service): void
{
    $ref = new ReflectionProperty(DemoService::class, 'transactions');
    $ref->setAccessible(true);
    $_SESSION['transactions'] = $ref->getValue();
}

function renderHome(DemoService $service, ?string $successMessage, ?string $errorMessage): void
{
    $transactions = $service->getAllTransactions();
    $form = [
        'paymentMethod' => 'CARD',
        'holderName'    => 'Jane Doe',
        'cardNum'       => '4000000000002503',
        'expiry'        => '10/28',
        'cvv'           => '123',
        'amount'        => '10.00',
        'street'        => '221B Baker Street',
        'street2'       => '',
        'city'          => 'London',
        'state'         => 'England',
        'country'       => 'GB',
        'zip'           => 'NW1 6XE',
        'paypalEmail'   => 'JohnSmith@example.com',
        'skrillId'      => 'your_skrill_id',
    ];
    require __DIR__ . '/templates/index.php';
}
