<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace E2e;

use Paysafe\PhpSdk\Exception\PaysafeSdkException;

class MonitorAndPaymentMethodsE2eTest extends BasePaysafeE2e
{
    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\MonitorService::monitor
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testMonitor_isSuccessful(): void
    {
        $monitorResponse = $this->paysafeClient->monitorService()->monitor();
        $this->assertEquals("READY", $monitorResponse->getStatus());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\LookUpPaymentMethodsService::getPaymentMethods
     *
     * @return void
     *
     * @throws PaysafeSdkException
     */
    public function testPaymentMethods_isSuccessful(): void
    {
        $paymentMethods = $this->paysafeClient->paymentMethodsService()->getPaymentMethods('USD');
        $this->assertNotNull($paymentMethods->getPaymentMethods());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\LookUpPaymentMethodsService::getPaymentMethods
     *
     * @return void
     */
    public function testPaymentMethods_noPaymentMethodsInGivenCurrency(): void
    {
        try {
            $this->paysafeClient->paymentMethodsService()->getPaymentMethods('BND');

            $this->fail('Exception not thrown!');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(self::REQUEST_UNSUCCESSFUL, $exception->getMessage());
            $this->assertEquals(404, $exception->getCode());
            $this->assertEquals("SMARTROUTING-1001", $exception->getError()->getCode());
            $this->assertEquals("No payment methods for account group.", $exception->getError()->getMessage());
            $this->assertCount(1, $exception->getError()->getDetails());
            $this->assertEquals(
                "There are no configured payment methods for the specified account group.",
                $exception->getError()->getDetails()[0]
            );
        }
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Service\LookUpPaymentMethodsService::getPaymentMethods
     *
     * @return void
     */
    public function testPaymentMethods_invalidCurrency(): void
    {
        try {
            $this->paysafeClient->paymentMethodsService()->getPaymentMethods('BAD_CURRENCY');
            $this->fail('Exception not thrown!');
        } catch (PaysafeSdkException $exception) {
            $this->assertEquals(self::REQUEST_UNSUCCESSFUL, $exception->getMessage());
            $this->assertEquals(400, $exception->getCode());
            $this->assertEquals("5001", $exception->getError()->getCode());
            $this->assertEquals("Invalid currency", $exception->getError()->getMessage());
            $this->assertCount(1, $exception->getError()->getDetails());
            $this->assertEquals(
                "currencyCode BAD_CURRENCY is not valid",
                $exception->getError()->getDetails()[0]
            );
        }
    }

}
