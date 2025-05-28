<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

use Paysafe\PhpSdk\PaysafeClient;
use Paysafe\PhpSdk\Validation\ErrorMessages;
use PHPUnit\Framework\TestCase;

class PaysafeClientTest extends TestCase
{

    /**
     * @covers \Paysafe\PhpSdk\PaysafeClient::validateApiKey
     */
    public function testValidateApiKeyThrowsExceptionForEmptyKey() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("You must provide non-blank api key in format 'username:password");
        new PaysafeClient('', 'TEST');
    }

    /**
     * @covers \Paysafe\PhpSdk\PaysafeClient::validateApiKey
     */
    public function testValidateApiKeyThrowsExceptionForInvalidFormat() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Api key does not match format 'username:password'");
        new PaysafeClient('invalidKey', 'TEST');
    }

    /**
     * @covers \Paysafe\PhpSdk\PaysafeClient::validateMaxAutomaticRetries
     */
    public function testValidateMaxAutomaticRetriesThrowsExceptionForTooManyRetries() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(ErrorMessages::MESSAGE_MAXIMUM_ALLOWED_NUMBER_OF_AUTOMATIC_RETRIES);
        $paysafeClient = new PaysafeClient('merchantId:secretKey', 'TEST');
        $paysafeClient->setMaxAutomaticRetries(6);

    }

    /**
     * @covers \Paysafe\PhpSdk\PaysafeClient::validateMaxAutomaticRetries
     */
    public function testValidateMaxAutomaticRetriesThrowsExceptionForNegativeRetries() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(ErrorMessages::MESSAGE_MAXIMUM_AUTOMATIC_RETRIES_CANNOT_BE_NEGATIVE);
        $paysafeClient = new PaysafeClient('merchantId:secretKey', 'TEST');
        $paysafeClient->setMaxAutomaticRetries(-1);
    }

    /**
     * @covers \Paysafe\PhpSdk\PaysafeClient::setConnectTimeout
     */
    public function testValidateTimeoutsThrowsExceptionForZeroConnectTimeout() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(ErrorMessages::MESSAGE_CONNECT_TIMEOUT_MUST_BE_A_POSITIVE_VALUE);
        $paysafeClient = new PaysafeClient('merchantId:secretKey', 'TEST');
        $paysafeClient->setConnectTimeout(0);
    }

    /**
     * @covers \Paysafe\PhpSdk\PaysafeClient::setResponseTimeout
     */
    public function testValidateTimeoutsThrowsExceptionForNegativeResponseTimeout() {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(ErrorMessages::MESSAGE_RESPONSE_TIMEOUT_MUST_BE_A_POSITIVE_VALUE);
        $paysafeClient = new PaysafeClient('merchantId:secretKey', 'TEST');
        $paysafeClient->setResponseTimeout(-1);
    }

    /**
     * @covers \Paysafe\PhpSdk\PaysafeClient::validateApiKey
     * @covers \Paysafe\PhpSdk\PaysafeClient::validateMaxAutomaticRetries
     * @covers \Paysafe\PhpSdk\PaysafeClient::validateTimeouts
     */
    public function testValidPaysafeClientCreation() {
        $client = new PaysafeClient('merchantId:secretKey', 'TEST');
        $client->setConnectTimeout(3);
        $client->setMaxAutomaticRetries(5);
        $client->setResponseTimeout(10);
        $this->assertInstanceOf(PaysafeClient::class, $client);
    }
}
