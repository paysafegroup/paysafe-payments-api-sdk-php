<?php
// All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2026. For more information see LICENSE

namespace Paysafe\MerchantDemo;

use Paysafe\PhpSdk\PaysafeClient;
use Paysafe\PhpSdk\Model\PaymentHandle\PaymentHandleRequest;
use Paysafe\PhpSdk\Model\PaymentHandle\Enums\TransactionType;
use Paysafe\PhpSdk\Model\PaymentHandle\Enums\PaymentType;
use Paysafe\PhpSdk\Model\PaymentHandle\Enums\Action;
use Paysafe\PhpSdk\Model\PaymentHandle\Enums\PaymentHandleStatus;
use Paysafe\PhpSdk\Model\PaymentHandle\Enums\ReturnLinkRel;
use Paysafe\PhpSdk\Model\Common\Enums\CurrencyCode;
use Paysafe\PhpSdk\Model\Common\Enums\TransactionRequestStatus;
use Paysafe\PhpSdk\Model\Common\BillingDetails;
use Paysafe\PhpSdk\Model\Common\ReturnLink;
use Paysafe\PhpSdk\Model\Card\Card;
use Paysafe\PhpSdk\Model\Card\CardExpiry;
use Paysafe\PhpSdk\Model\Card\MerchantDescriptor;
use Paysafe\PhpSdk\Model\Card\Threeds\ThreeDs;
use Paysafe\PhpSdk\Model\Card\Enums\ThreeDsAuthenticationPurpose;
use Paysafe\PhpSdk\Model\Card\Enums\ThreeDsRequestorChallengePreference;
use Paysafe\PhpSdk\Model\Lpm\Paysafecard;
use Paysafe\PhpSdk\Model\Lpm\Paysafecash;
use Paysafe\PhpSdk\Model\Lpm\Paypal;
use Paysafe\PhpSdk\Model\Lpm\Skrill;
use Paysafe\PhpSdk\Model\Payment\PaymentRequest;
use Paysafe\PhpSdk\Model\VoidAuthorization\VoidAuthorizationRequest;
use Paysafe\PhpSdk\Model\Settlement\SettlementRequest;
use Paysafe\PhpSdk\Model\Refund\RefundRequest;
use Paysafe\PhpSdk\Model\Common\Cancel\CancelRequest;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;

/**
 * Service layer for handling payment operations and transaction state in the Paysafe demo.
 * Encapsulates business logic for creating, processing, and managing payments.
 */
class DemoService
{
    private PaysafeClient $paysafeClient;
    private string $accountId;
    private string $returnUrlBase;

    /** @var array<string, array> In-memory transaction store */
    private static array $transactions = [];

    private const MERCHANT_CLIENT_ID = 'merchantclientid';

    public function __construct(PaysafeClient $paysafeClient, string $accountId, string $returnUrlBase)
    {
        $this->paysafeClient = $paysafeClient;
        $this->accountId = $accountId;
        $this->returnUrlBase = $returnUrlBase;
    }

    /**
     * Create a CARD Payment Handle with 3DS.
     *
     * @return array{merchantRef: string, redirectUrl: ?string}
     *
     * @throws PaysafeSdkException
     */
    public function createPaymentHandleWith3ds(array $form): array
    {
        $amountCents = self::parseDollarsToCents($form['amount']);
        $merchantRef = self::generateUuid();

        $request = (new PaymentHandleRequest())
            ->accountId($this->accountId)
            ->merchantRefNum($merchantRef)
            ->transactionType(TransactionType::PAYMENT)
            ->amount($amountCents)
            ->currencyCode(CurrencyCode::USD)
            ->paymentType(PaymentType::CARD)
            ->card(
                (new Card())
                    ->holderName($form['holderName'])
                    ->cardNum($form['cardNum'])
                    ->cardExpiry(
                        (new CardExpiry())
                            ->month(self::parseExpiryMonth($form['expiry']))
                            ->year(self::parseExpiryYear($form['expiry']))
                    )
                    ->cvv($form['cvv'])
            )
            ->returnLinks($this->buildReturnLinks($this->returnUrlBase . '/3ds/return/' . $merchantRef))
            ->billingDetails($this->buildBillingDetails($form))
            ->threeDs(
                (new ThreeDs())
                    ->merchantUrl($this->returnUrlBase)
                    ->authenticationPurpose(ThreeDsAuthenticationPurpose::PAYMENT_TRANSACTION)
                    ->deviceChannel('BROWSER')
                    ->requestorChallengePreference(ThreeDsRequestorChallengePreference::CHALLENGE_MANDATED)
                    ->messageCategory('PAYMENT')
            );

        $handle = $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);

        return [
            'merchantRef' => $merchantRef,
            'redirectUrl' => $this->extractRedirectUrl($handle),
        ];
    }

    /**
     * Create a Payment Handle for PaysafeCard, PaysafeCash, Skrill, or PayPal.
     * @return array{merchantRef: string, redirectUrl: ?string}
     *
     * @throws PaysafeSdkException
     */
    public function createRedirectPaymentHandle(array $form, string $paymentMethod): array
    {
        $amountCents = self::parseDollarsToCents($form['amount']);
        $merchantRef = self::generateUuid();

        switch ($paymentMethod) {
            case 'PAYSAFECARD':
                $paymentType = PaymentType::PAYSAFECARD;
                break;
            case 'PAYSAFECASH':
                $paymentType = PaymentType::PAYSAFECASH;
                break;
            case 'PAYPAL':
                $paymentType = PaymentType::PAYPAL;
                break;
            case 'SKRILL':
                $paymentType = PaymentType::SKRILL;
                break;
            default:
                throw new \InvalidArgumentException("Unsupported payment method: $paymentMethod");
        }

        $request = (new PaymentHandleRequest())
            ->merchantRefNum($merchantRef)
            ->transactionType(TransactionType::PAYMENT)
            ->amount($amountCents)
            ->currencyCode(CurrencyCode::USD)
            ->paymentType($paymentType)
            ->customerIp($form['customerIp'] ?? '127.0.0.1')
            ->returnLinks($this->buildReturnLinks($this->returnUrlBase . '/redirect/return/' . $merchantRef))
            ->billingDetails($this->buildBillingDetails($form))
            ->merchantDescriptor(
                (new MerchantDescriptor())
                    ->dynamicDescriptor('OnlineStore')
                    ->phone('12345678')
            );

        switch ($paymentMethod) {
            case 'PAYSAFECARD':
                $request->paysafecard(
                    (new Paysafecard())
                        ->consumerId(self::MERCHANT_CLIENT_ID)
                        ->minAgeRestriction(18)
                        ->kycLevelRestriction('SIMPLE')
                        ->countryRestriction('DE')
                );
                break;
            case 'PAYSAFECASH':
                $request->paysafecash(
                    (new Paysafecash())
                        ->consumerId(self::MERCHANT_CLIENT_ID)
                        ->minAgeRestriction(18)
                        ->kycLevelRestriction('SIMPLE')
                        ->countryRestriction('DE')
                );
                break;
            case 'PAYPAL':
                $request->payPal(
                    (new Paypal())
                        ->shippingPreference('NO_SHIPPING')
                        ->consumerId($form['paypalEmail'])
                );
                break;
            case 'SKRILL':
                $request->skrill(
                    (new Skrill())
                        ->consumerId($form['skrillId'])
                );
                break;
        }

        $handle = $this->paysafeClient->paymentHandleService()->createPaymentHandle($request);

        return [
            'merchantRef' => $merchantRef,
            'redirectUrl' => $this->extractRedirectUrl($handle),
        ];
    }

    /**
     * Complete a payment using the merchantRefNum from the return URL.
     */
    public function completePendingHandle(string $merchantRef): array
    {
        $handle = $this->fetchAndVerifyHandle($merchantRef);

        $paymentType = $handle->getPaymentType() ?? 'CARD';
        $settleWithAuth = ($paymentType !== 'CARD');

        $request = (new PaymentRequest())
            ->merchantRefNum($handle->getMerchantRefNum())
            ->amount($handle->getAmount())
            ->currencyCode(CurrencyCode::USD)
            ->paymentHandleToken($handle->getPaymentHandleToken())
            ->settleWithAuth($settleWithAuth);

        $payment = $this->paysafeClient->paymentService()->processPayment($request);

        $tx = [
            'id'                   => self::generateUuid(),
            'paymentId'            => $payment->getId(),
            'merchantRefNum'       => $handle->getMerchantRefNum(),
            'amount'               => $handle->getAmount(),
            'currencyCode'         => 'USD',
            'paymentMethod'        => $paymentType,
            'status'               => $settleWithAuth ? 'SETTLED' : 'PENDING_SETTLEMENT',
            'voidAuthorizationId'  => null,
            'settlementId'         => null,
            'refundId'             => null,
            'createdAt'            => date('Y-m-d H:i:s'),
        ];

        $settlements = $payment->getSettlements();
        if (!empty($settlements)) {
            $tx['settlementId'] = $settlements[0]->getId();
        }

        self::$transactions[$tx['id']] = $tx;
        return $tx;
    }

    /**
     * Void a CARD authorization before settlement.
     */
    public function voidAuthorization(string $txId): array
    {
        $tx = $this->getTransactionById($txId);

        $request = (new VoidAuthorizationRequest())
            ->merchantRefNum($tx['merchantRefNum'])
            ->amount($tx['amount']);

        $voidAuth = $this->paysafeClient->voidAuthorizationService()
            ->voidAuthorization($tx['paymentId'], $request);

        $tx['voidAuthorizationId'] = $voidAuth->getId();
        $tx['status'] = 'VOIDED';
        self::$transactions[$txId] = $tx;
        return $tx;
    }

    /**
     * Manually settle a previously authorized CARD payment.
     */
    public function settle(string $txId): array
    {
        $tx = $this->getTransactionById($txId);

        $request = (new SettlementRequest())
            ->merchantRefNum($tx['merchantRefNum'])
            ->amount($tx['amount']);

        $settlement = $this->paysafeClient->settlementService()
            ->processSettlement($tx['paymentId'], $request);

        $tx['settlementId'] = $settlement->getId();
        $tx['status'] = 'SETTLED';
        self::$transactions[$txId] = $tx;
        return $tx;
    }

    /**
     * Cancel (void) a pending settlement.
     */
    public function cancelSettlement(string $txId): void
    {
        $tx = $this->getTransactionById($txId);

        $request = (new CancelRequest())
            ->status(TransactionRequestStatus::CANCELLED);

        $this->paysafeClient->settlementService()
            ->cancelSettlement($tx['settlementId'], $request);

        $tx['status'] = 'CANCELLED';
        self::$transactions[$txId] = $tx;
    }

    /**
     * Refund a settled payment.
     */
    public function refund(string $txId, ?string $customerAccountId): array
    {
        $tx = $this->getTransactionById($txId);

        $request = (new RefundRequest())
            ->merchantRefNum($tx['merchantRefNum'])
            ->amount($tx['amount']);

        $refund = $this->paysafeClient->refundService()
            ->processRefund($tx['settlementId'], $request);

        $tx['refundId'] = $refund->getId();
        $tx['status'] = 'REFUNDED';
        self::$transactions[$txId] = $tx;
        return $tx;
    }

    /**
     * Retrieve all transactions, sorted by creation date descending.
     * @return array[]
     */
    public function getAllTransactions(): array
    {
        $list = array_values(self::$transactions);
        usort($list, fn($a, $b) => strcmp($b['createdAt'], $a['createdAt']));
        return $list;
    }

    // ─── Private helpers ───────────────────────────────────────────────

    private function fetchAndVerifyHandle(string $merchantRef): object
    {
        $list = $this->paysafeClient->paymentHandleService()
            ->getPaymentHandleUsingMerchantReferenceNumber($merchantRef, null, 1);

        $handles = $list->getPaymentHandles();
        if (empty($handles)) {
            throw new \RuntimeException("No payment handle found for merchantRefNum: $merchantRef");
        }

        $handle = $handles[0];
        $this->checkHandlePayable($handle);
        return $handle;
    }

    private function checkHandlePayable(object $handle): void
    {
        $status = $handle->getStatus();
        if ($status === PaymentHandleStatus::PAYABLE || $status === PaymentHandleStatus::COMPLETED) {
            return;
        }

        $msg = "Payment handle is not payable. Status: $status";

        try {
            $auth = $handle->getAuthentication();
            if ($auth !== null) {
                $msg .= "\nAuthentication issue detected.";
            }
        } catch (\Throwable $ignored) {
        }

        throw new \RuntimeException($msg);
    }

    private function extractRedirectUrl(object $handle): ?string
    {
        try {
            if ($handle->getAction() !== Action::REDIRECT) {
                return null;
            }
        } catch (\Throwable $e) {
            return null;
        }

        try {
            $links = $handle->getLinks();
        } catch (\Throwable $e) {
            return null;
        }

        foreach ($links as $link) {
            if ($link->getRel() === ReturnLinkRel::REDIRECT_PAYMENT) {
                return $link->getHref();
            }
        }
        foreach ($links as $link) {
            if ($link->getRel() === ReturnLinkRel::_DEFAULT) {
                return $link->getHref();
            }
        }
        return null;
    }

    /**
     * @return ReturnLink[]
     */
    private function buildReturnLinks(string $url): array
    {
        return [
            (new ReturnLink())->href($url)->method('GET')->rel(ReturnLinkRel::_DEFAULT),
            (new ReturnLink())->href($url)->method('GET')->rel(ReturnLinkRel::ON_COMPLETED),
            (new ReturnLink())->href($url)->method('GET')->rel(ReturnLinkRel::ON_FAILED),
        ];
    }

    private function buildBillingDetails(array $form): BillingDetails
    {
        $billing = (new BillingDetails())
            ->street($form['street'] ?? '')
            ->city($form['city'] ?? '')
            ->country($form['country'] ?? '')
            ->zip($form['zip'] ?? '');

        if (!empty($form['street2'])) {
            $billing->street2($form['street2']);
        }
        if (!empty($form['state'])) {
            $billing->state($form['state']);
        }
        return $billing;
    }

    private function getTransactionById(string $txId): array
    {
        if (!isset(self::$transactions[$txId])) {
            throw new \InvalidArgumentException("Transaction not found: $txId");
        }
        return self::$transactions[$txId];
    }

    private static function parseDollarsToCents(string $dollars): int
    {
        $dollars = trim($dollars);

        if (!preg_match('/^\d+(?:\.(\d{1,2}))?$/', $dollars)) {
            throw new \InvalidArgumentException(
                "Invalid amount: '$dollars'. Must be a positive number with up to 2 decimal places (e.g. 10.99)."
            );
        }

        $parts = explode('.', $dollars, 2);
        $whole = (int) $parts[0];
        $fraction = isset($parts[1]) ? (int) str_pad($parts[1], 2, '0') : 0;

        return ($whole * 100) + $fraction;
    }

    private static function parseExpiryMonth(string $expiry): int
    {
        if (!str_contains($expiry, '/')) return 1;
        return (int) trim(explode('/', $expiry)[0]);
    }

    private static function parseExpiryYear(string $expiry): int
    {
        if (!str_contains($expiry, '/')) return 2025;
        $yr = trim(explode('/', $expiry)[1]);
        return strlen($yr) === 2 ? 2000 + (int) $yr : (int) $yr;
    }

    private static function generateUuid(): string
    {
        $bytes = random_bytes(16);

        // Set version to 4 and variant to RFC 4122.
        $bytes[6] = chr((ord($bytes[6]) & 0x0f) | 0x40);
        $bytes[8] = chr((ord($bytes[8]) & 0x3f) | 0x80);

        $hex = bin2hex($bytes);

        return sprintf(
            '%s-%s-%s-%s-%s',
            substr($hex, 0, 8),
            substr($hex, 8, 4),
            substr($hex, 12, 4),
            substr($hex, 16, 4),
            substr($hex, 20, 12)
        );
    }

    // ─── Formatting helpers (used in templates) ────────────────────────

    public static function formatAmount(array $tx): string
    {
        return $tx['currencyCode'] . ' ' . number_format($tx['amount'] / 100, 2);
    }

    public static function paymentMethodLabel(string $method): string
    {
        switch ($method) {
            case 'CARD':
                return 'Card';
            case 'PAYSAFECARD':
                return 'PaysafeCard';
            case 'PAYSAFECASH':
                return 'PaysafeCash';
            case 'PAYPAL':
                return 'PayPal';
            case 'SKRILL':
                return 'Skrill';
            default:
                return $method;
        }
    }

    /**
     * Build a detailed error message from a PaysafeSdkException.
     */
    public static function buildErrorMessage(string $prefix, \Throwable $e): string
    {
        $msg = $prefix . "\n";

        if ($e instanceof PaysafeSdkException) {
            if ($e->getCode()) {
                $msg .= "HTTP Status: " . $e->getCode() . "\n";
            }
            if ($e->getMessage()) {
                $msg .= "Message: " . $e->getMessage() . "\n";
            }
            if ($e->getInternalCorrelationId()) {
                $msg .= "Correlation ID: " . $e->getInternalCorrelationId() . "\n";
            }
            $err = $e->getError();
            if ($err !== null) {
                if ($err->getCode()) {
                    $msg .= "Error Code: " . $err->getCode() . "\n";
                }
                if ($err->getMessage()) {
                    $msg .= "Error Message: " . $err->getMessage() . "\n";
                }
                $details = $err->getDetails();
                if (!empty($details)) {
                    $msg .= "Details: " . implode(', ', $details) . "\n";
                }
                $fieldErrors = $err->getFieldErrors();
                if (!empty($fieldErrors)) {
                    foreach ($fieldErrors as $f) {
                        $msg .= "Field Error [" . $f->getField() . "]: " . $f->getError() . "\n";
                    }
                }
                $additionalDetails = $err->getAdditionalDetails();
                if (!empty($additionalDetails)) {
                    foreach ($additionalDetails as $d) {
                        $msg .= "Additional [" . $d->getType() . "]: " . $d->getMessage() . "\n";
                    }
                }
            }
        } else {
            if ($e->getMessage()) {
                $msg .= "Message: " . $e->getMessage() . "\n";
            }
        }

        $msg .= "\nStack Trace:\n" . $e->getTraceAsString() . "\n";

        return trim($msg);
    }
}
