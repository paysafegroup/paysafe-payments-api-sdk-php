<?php
/** All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE */

declare(strict_types=1);

namespace Exception;

use GuzzleHttp\Psr7\Response;
use Paysafe\PhpSdk\Exception\ApiConnectionException;
use Paysafe\PhpSdk\Exception\ApiException;
use Paysafe\PhpSdk\Exception\ExceptionBuilder;
use Paysafe\PhpSdk\Exception\InvalidCredentialsException;
use Paysafe\PhpSdk\Exception\InvalidRequestException;
use Paysafe\PhpSdk\Exception\PaysafeSdkException;
use Paysafe\PhpSdk\Exception\RequestConflictException;
use Paysafe\PhpSdk\Exception\RequestDeclinedException;
use Paysafe\PhpSdk\Exception\UnauthorizedException;
use Paysafe\PhpSdk\Model\Payment\Payment;
use PHPUnit\Framework\TestCase;

/**
 * Comprehensive test suite for ExceptionBuilder — the central error-routing class
 * that maps every Paysafe API error response to the correct SDK exception type.
 *
 * @covers \Paysafe\PhpSdk\Exception\ExceptionBuilder
 */
class ExceptionBuilderTest extends TestCase
{
    // ──────────────────────────────────────────────────────────────────
    //  Helper: build a JSON error response body
    // ──────────────────────────────────────────────────────────────────

    private function buildErrorBody(
        string $code,
        string $message,
        ?array $details = null,
        ?array $fieldErrors = null,
        ?array $additionalDetails = null
    ): string {
        $error = [
            'code' => $code,
            'message' => $message,
        ];

        if ($details !== null) {
            $error['details'] = $details;
        }

        if ($fieldErrors !== null) {
            $error['fieldErrors'] = $fieldErrors;
        }

        if ($additionalDetails !== null) {
            $error['additionalDetails'] = $additionalDetails;
        }

        return json_encode(['error' => $error]);
    }

    private function buildDeclinedBody(
        string $code,
        string $message,
        ?array $details = null
    ): string {
        $body = [
            'merchantRefNum' => 'ref-123',
            'id' => 'uuid-456',
            'error' => [
                'code' => $code,
                'message' => $message,
            ],
        ];

        if ($details !== null) {
            $body['error']['details'] = $details;
        }

        return json_encode($body);
    }

    // ──────────────────────────────────────────────────────────────────
    //  400 Bad Request → InvalidRequestException
    // ──────────────────────────────────────────────────────────────────

    public function testBadRequestReturnsInvalidRequestException(): void
    {
        $body = $this->buildErrorBody('5001', 'Invalid currency', ['currencyCode INVALID is not valid']);
        $response = new Response(400, ['Content-Type' => 'application/json'], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Request failed', $response, null);

        $this->assertInstanceOf(InvalidRequestException::class, $exception);
        $this->assertSame(400, $exception->getCode());
        $this->assertSame('Request failed', $exception->getMessage());
        $this->assertSame('5001', $exception->getError()->getCode());
        $this->assertSame('Invalid currency', $exception->getError()->getMessage());
        $this->assertSame('currencyCode INVALID is not valid', $exception->getError()->getDetails()[0]);
    }

    public function testBadRequestWithFieldErrors(): void
    {
        $body = $this->buildErrorBody(
            '5068',
            'Field error(s)',
            ['Missing mandatory field'],
            [
                ['field' => 'amount', 'error' => 'Amount must be positive'],
                ['field' => 'currency', 'error' => 'Currency is required'],
            ]
        );
        $response = new Response(400, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Bad request', $response, null);

        $this->assertInstanceOf(InvalidRequestException::class, $exception);
        $this->assertCount(2, $exception->getError()->getFieldErrors());
        $this->assertSame('amount', $exception->getError()->getFieldErrors()[0]->getField());
        $this->assertSame('Amount must be positive', $exception->getError()->getFieldErrors()[0]->getError());
        $this->assertSame('currency', $exception->getError()->getFieldErrors()[1]->getField());
    }

    // ──────────────────────────────────────────────────────────────────
    //  401 Unauthorized → InvalidCredentialsException
    // ──────────────────────────────────────────────────────────────────

    public function testUnauthorizedReturnsInvalidCredentialsException(): void
    {
        $body = $this->buildErrorBody('5279', 'Invalid credentials', ['The authentication credentials are invalid.']);
        $response = new Response(401, ['Content-Type' => 'application/json'], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Auth failed', $response, null);

        $this->assertInstanceOf(InvalidCredentialsException::class, $exception);
        $this->assertSame(401, $exception->getCode());
        $this->assertSame('5279', $exception->getError()->getCode());
    }

    // ──────────────────────────────────────────────────────────────────
    //  402 Payment Required → RequestDeclinedException
    // ──────────────────────────────────────────────────────────────────

    public function testPaymentDeclinedReturnsRequestDeclinedException(): void
    {
        $body = $this->buildDeclinedBody(
            'ALTERNATE-PAYMENTS-GATEWAY-4',
            'Transaction declined',
            ['The transaction was declined by the processing gateway.']
        );
        $response = new Response(
            402,
            ['Content-Type' => 'application/json', 'x-internal-correlation-id' => 'corr-abc-123'],
            $body
        );

        $exception = ExceptionBuilder::buildPaysafeSdkException(
            'Payment declined',
            $response,
            Payment::class
        );

        $this->assertInstanceOf(RequestDeclinedException::class, $exception);
        $this->assertSame(402, $exception->getCode());
        $this->assertSame('corr-abc-123', $exception->getInternalCorrelationId());
        $this->assertSame('ALTERNATE-PAYMENTS-GATEWAY-4', $exception->getError()->getCode());
        $this->assertSame('Transaction declined', $exception->getError()->getMessage());
    }

    public function testPaymentDeclinedContainsApiResponse(): void
    {
        $body = $this->buildDeclinedBody('DEC-1', 'Declined');
        $response = new Response(402, ['Content-Type' => 'application/json'], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException(
            'Declined',
            $response,
            Payment::class
        );

        $this->assertInstanceOf(RequestDeclinedException::class, $exception);
        $this->assertNotNull($exception->getApiResponse());
    }

    // ──────────────────────────────────────────────────────────────────
    //  403 Forbidden → UnauthorizedException
    // ──────────────────────────────────────────────────────────────────

    public function testForbiddenReturnsUnauthorizedException(): void
    {
        $body = $this->buildErrorBody('5270', 'Unauthorized access', ['No permission']);
        $response = new Response(403, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Forbidden', $response, null);

        $this->assertInstanceOf(UnauthorizedException::class, $exception);
        $this->assertSame(403, $exception->getCode());
        $this->assertSame('5270', $exception->getError()->getCode());
    }

    // ──────────────────────────────────────────────────────────────────
    //  409 Conflict → RequestConflictException
    // ──────────────────────────────────────────────────────────────────

    public function testConflictReturnsRequestConflictException(): void
    {
        $body = $this->buildErrorBody(
            'DW-CUSTOMER-CONFLICT',
            'Customer conflict',
            null,
            null,
            [['type' => 'Duplication', 'code' => '22', 'message' => 'Customer already exists.']]
        );
        $response = new Response(409, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Conflict', $response, null);

        $this->assertInstanceOf(RequestConflictException::class, $exception);
        $this->assertSame(409, $exception->getCode());
        $this->assertSame('DW-CUSTOMER-CONFLICT', $exception->getError()->getCode());
        $this->assertNotEmpty($exception->getError()->getAdditionalDetails());
        $this->assertSame('Duplication', $exception->getError()->getAdditionalDetails()[0]->getType());
        $this->assertSame('22', $exception->getError()->getAdditionalDetails()[0]->getCode());
        $this->assertSame('Customer already exists.', $exception->getError()->getAdditionalDetails()[0]->getMessage());
    }

    // ──────────────────────────────────────────────────────────────────
    //  5xx → ApiException
    // ──────────────────────────────────────────────────────────────────

    public function testInternalServerErrorReturnsApiException(): void
    {
        $body = $this->buildErrorBody('1000', 'Internal Error', ['An internal error occurred.']);
        $response = new Response(500, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Server error', $response, null);

        $this->assertInstanceOf(ApiException::class, $exception);
        $this->assertSame(500, $exception->getCode());
        $this->assertSame('1000', $exception->getError()->getCode());
    }

    public function testBadGatewayReturnsApiException(): void
    {
        $body = $this->buildErrorBody('1001', 'Bad Gateway', ['Upstream failure']);
        $response = new Response(502, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Gateway error', $response, null);

        $this->assertInstanceOf(ApiException::class, $exception);
        $this->assertSame(502, $exception->getCode());
    }

    public function testServiceUnavailableReturnsApiException(): void
    {
        $body = $this->buildErrorBody('1002', 'Service unavailable');
        $response = new Response(503, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Unavailable', $response, null);

        $this->assertInstanceOf(ApiException::class, $exception);
        $this->assertSame(503, $exception->getCode());
    }

    // ──────────────────────────────────────────────────────────────────
    //  Unknown/unmapped status codes → PaysafeSdkException
    // ──────────────────────────────────────────────────────────────────

    public function testUnmappedStatusCodeReturnsPaysafeSdkException(): void
    {
        $body = $this->buildErrorBody('9999', 'Unknown error');
        $response = new Response(422, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Unknown', $response, null);

        $this->assertInstanceOf(PaysafeSdkException::class, $exception);
        // Must NOT be a subclass
        $this->assertNotInstanceOf(InvalidRequestException::class, $exception);
        $this->assertNotInstanceOf(ApiException::class, $exception);
        $this->assertSame(422, $exception->getCode());
    }

    public function testStatusCode429ReturnsPaysafeSdkException(): void
    {
        $body = $this->buildErrorBody('RATE_LIMIT', 'Too many requests');
        $response = new Response(429, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Rate limited', $response, null);

        $this->assertInstanceOf(PaysafeSdkException::class, $exception);
        $this->assertSame(429, $exception->getCode());
    }

    // ──────────────────────────────────────────────────────────────────
    //  Correlation ID handling
    // ──────────────────────────────────────────────────────────────────

    public function testCorrelationIdExtractedFromHeader(): void
    {
        $body = $this->buildErrorBody('5001', 'Error');
        $response = new Response(
            400, ['x-internal-correlation-id' => 'corr-xyz-789'], $body
        );

        $exception = ExceptionBuilder::buildPaysafeSdkException('Fail', $response, null);

        $this->assertSame('corr-xyz-789', $exception->getInternalCorrelationId());
    }

    public function testMissingCorrelationIdIsNull(): void
    {
        $body = $this->buildErrorBody('5001', 'Error');
        $response = new Response(400, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Fail', $response, null);

        $this->assertNull($exception->getInternalCorrelationId());
    }

    public function testEmptyCorrelationIdIsNull(): void
    {
        $body = $this->buildErrorBody('5001', 'Error');
        $response = new Response(400, ['x-internal-correlation-id' => ''], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Fail', $response, null);

        $this->assertNull($exception->getInternalCorrelationId());
    }

    // ──────────────────────────────────────────────────────────────────
    //  Malformed / missing error payloads
    // ──────────────────────────────────────────────────────────────────

    public function testMalformedJsonReturnsPaysafeSdkException(): void
    {
        $response = new Response(400, ['Content-Type' => 'application/json'], '{not valid json!!!');

        $exception = ExceptionBuilder::buildPaysafeSdkException('Parse error', $response, null);

        $this->assertInstanceOf(PaysafeSdkException::class, $exception);
        $this->assertSame(400, $exception->getCode());
    }

    public function testEmptyBodyReturnsPaysafeSdkException(): void
    {
        $response = new Response(500, [], '');

        $exception = ExceptionBuilder::buildPaysafeSdkException('Empty', $response, null);

        $this->assertInstanceOf(PaysafeSdkException::class, $exception);
        $this->assertSame(500, $exception->getCode());
    }

    public function testResponseWithNoErrorKeyReturnsGenericException(): void
    {
        $response = new Response(400, [], json_encode(['status' => 'failed']));

        $exception = ExceptionBuilder::buildPaysafeSdkException('No error key', $response, null);

        $this->assertInstanceOf(PaysafeSdkException::class, $exception);
        $this->assertSame(400, $exception->getCode());
        $this->assertNull($exception->getError());
    }

    public function testResponseWithNullBodyReturnsGenericException(): void
    {
        $response = new Response(503, [], null);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Null body', $response, null);

        $this->assertInstanceOf(PaysafeSdkException::class, $exception);
        $this->assertSame(503, $exception->getCode());
    }

    // ──────────────────────────────────────────────────────────────────
    //  Tampered / partial error payloads
    // ──────────────────────────────────────────────────────────────────

    public function testErrorWithMissingCodeAndMessage(): void
    {
        $body = json_encode(['error' => ['details' => ['Something went wrong']]]);
        $response = new Response(400, [], $body);

        // Should not crash — gracefully handle missing keys
        $exception = ExceptionBuilder::buildPaysafeSdkException('Partial error', $response, null);

        $this->assertInstanceOf(PaysafeSdkException::class, $exception);
    }

    public function testErrorWithEmptyFieldErrorsArray(): void
    {
        $body = $this->buildErrorBody('5068', 'Field error(s)', ['Missing fields'], []);
        $response = new Response(400, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Empty field errors', $response, null);

        $this->assertInstanceOf(InvalidRequestException::class, $exception);
        // Empty array is passed through buildFieldErrors which returns null,
        // but the constructor path uses it directly
        $fieldErrors = $exception->getError()->getFieldErrors();
        $this->assertTrue($fieldErrors === null || $fieldErrors === []);
    }

    public function testErrorWithEmptyAdditionalDetailsArray(): void
    {
        $body = $this->buildErrorBody('5001', 'Error', null, null, []);
        $response = new Response(400, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Empty additional', $response, null);

        $this->assertInstanceOf(InvalidRequestException::class, $exception);
        $this->assertEmpty($exception->getError()->getAdditionalDetails());
    }

    // ──────────────────────────────────────────────────────────────────
    //  402 edge cases — malformed decline response
    // ──────────────────────────────────────────────────────────────────

    public function testDeclinedWithMalformedJsonFallsBackToGenericException(): void
    {
        $response = new Response(402, [], '{broken json!!!');

        $exception = ExceptionBuilder::buildPaysafeSdkException(
            'Declined parse fail',
            $response,
            Payment::class
        );

        // Should catch the parse exception internally and return a PaysafeSdkException
        $this->assertInstanceOf(PaysafeSdkException::class, $exception);
        $this->assertSame(402, $exception->getCode());
    }

    public function testDeclinedWithNullResponseType(): void
    {
        $body = $this->buildDeclinedBody('DEC-1', 'Declined');
        $response = new Response(402, [], $body);

        // responseType = null causes a TypeError in deserialization.
        // ExceptionBuilder catches Exception but TypeError extends Error in PHP 8,
        // so it propagates. This documents existing behavior.
        $this->expectException(\TypeError::class);

        ExceptionBuilder::buildPaysafeSdkException('Declined', $response, null);
    }

    // ──────────────────────────────────────────────────────────────────
    //  Custom message propagation
    // ──────────────────────────────────────────────────────────────────

    public function testCustomMessageIsPreservedInException(): void
    {
        $body = $this->buildErrorBody('5001', 'API error');
        $response = new Response(400, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException(
            'My custom error context message',
            $response,
            null
        );

        $this->assertSame('My custom error context message', $exception->getMessage());
    }

    // ──────────────────────────────────────────────────────────────────
    //  Strict type safety — status code is never loose-compared
    // ──────────────────────────────────────────────────────────────────

    /**
     * Verifies that status code 402 is matched strictly (===), not loosely (==).
     * A loose comparison could match boolean true or string "402".
     */
    public function testStatus402IsStrictlyCompared(): void
    {
        // Status 400 with error code that looks like "402" — must NOT create RequestDeclinedException
        $body = $this->buildErrorBody('402', 'Looks like 402 but is not');
        $response = new Response(400, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Strict check', $response, null);

        $this->assertInstanceOf(InvalidRequestException::class, $exception);
        $this->assertNotInstanceOf(RequestDeclinedException::class, $exception);
    }

    // ──────────────────────────────────────────────────────────────────
    //  Boundary: status code exactly 500
    // ──────────────────────────────────────────────────────────────────

    public function testExactly500IsApiException(): void
    {
        $body = $this->buildErrorBody('1000', 'Server error');
        $response = new Response(500, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('500', $response, null);

        $this->assertInstanceOf(ApiException::class, $exception);
    }

    public function testStatus499IsNotApiException(): void
    {
        $body = $this->buildErrorBody('CUSTOM', 'Client error');
        $response = new Response(499, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('499', $response, null);

        $this->assertInstanceOf(PaysafeSdkException::class, $exception);
        $this->assertNotInstanceOf(ApiException::class, $exception);
    }

    // ──────────────────────────────────────────────────────────────────
    //  No sensitive data leakage
    // ──────────────────────────────────────────────────────────────────

    public function testExceptionDoesNotLeakRawPayloadInMessage(): void
    {
        $body = $this->buildErrorBody('5001', 'Error');
        $response = new Response(400, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Request failed', $response, null);

        // The exception message should be our custom message, not the raw body
        $this->assertStringNotContainsString($body, $exception->getMessage());
    }

    // ──────────────────────────────────────────────────────────────────
    //  Multiple additional details
    // ──────────────────────────────────────────────────────────────────

    public function testMultipleAdditionalDetailsAreParsed(): void
    {
        $body = $this->buildErrorBody(
            'ERR-MULTI',
            'Multiple issues',
            null,
            null,
            [
                ['type' => 'Validation', 'code' => '1', 'message' => 'First issue'],
                ['type' => 'Compliance', 'code' => '2', 'message' => 'Second issue'],
                ['type' => 'Fraud', 'code' => '3', 'message' => 'Third issue'],
            ]
        );
        $response = new Response(409, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Multi', $response, null);

        $this->assertInstanceOf(RequestConflictException::class, $exception);
        $this->assertCount(3, $exception->getError()->getAdditionalDetails());
        $this->assertSame('Fraud', $exception->getError()->getAdditionalDetails()[2]->getType());
    }

    // ──────────────────────────────────────────────────────────────────
    //  Multiple field errors
    // ──────────────────────────────────────────────────────────────────

    public function testMultipleFieldErrorsAreParsed(): void
    {
        $body = $this->buildErrorBody(
            '5068',
            'Field error(s)',
            null,
            [
                ['field' => 'amount', 'error' => 'Must be > 0'],
                ['field' => 'currency', 'error' => 'Invalid ISO code'],
                ['field' => 'merchantRefNum', 'error' => 'Too long'],
            ]
        );
        $response = new Response(400, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Fields', $response, null);

        $this->assertCount(3, $exception->getError()->getFieldErrors());
        $this->assertSame('merchantRefNum', $exception->getError()->getFieldErrors()[2]->getField());
        $this->assertSame('Too long', $exception->getError()->getFieldErrors()[2]->getError());
    }

    // ──────────────────────────────────────────────────────────────────
    //  HTML / non-JSON error bodies (e.g. from load balancers)
    // ──────────────────────────────────────────────────────────────────

    public function testHtmlErrorBodyReturnsGenericException(): void
    {
        $htmlBody = '<html><body><h1>503 Service Temporarily Unavailable</h1></body></html>';
        $response = new Response(503, ['Content-Type' => 'text/html'], $htmlBody);

        $exception = ExceptionBuilder::buildPaysafeSdkException('HTML error', $response, null);

        $this->assertInstanceOf(PaysafeSdkException::class, $exception);
        $this->assertSame(503, $exception->getCode());
    }

    // ──────────────────────────────────────────────────────────────────
    //  Response body with extra unexpected fields
    // ──────────────────────────────────────────────────────────────────

    public function testExtraFieldsInErrorPayloadAreIgnored(): void
    {
        $body = json_encode([
            'error' => [
                'code' => '5001',
                'message' => 'Error',
                'unexpectedField' => 'should be ignored',
                'details' => [],
            ],
            'extraTopLevel' => true,
        ]);
        $response = new Response(400, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Extra fields', $response, null);

        $this->assertInstanceOf(InvalidRequestException::class, $exception);
        $this->assertSame('5001', $exception->getError()->getCode());
    }

    // ──────────────────────────────────────────────────────────────────
    //  PaysafeSdkException::__toString does not crash
    // ──────────────────────────────────────────────────────────────────

    public function testExceptionToStringDoesNotCrash(): void
    {
        $body = $this->buildErrorBody('5001', 'Error', ['Detail']);
        $response = new Response(400, [], $body);

        $exception = ExceptionBuilder::buildPaysafeSdkException('Fail', $response, null);

        $string = (string) $exception;

        $this->assertIsString($string);
        $this->assertStringContainsString('Fail', $string);
        $this->assertStringContainsString('400', $string);
    }
}
