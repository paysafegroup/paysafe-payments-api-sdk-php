<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace Client;

use Paysafe\PhpSdk\Client\DirectRequestOptions;
use Paysafe\PhpSdk\Client\RequestOptions;
use PHPUnit\Framework\TestCase;

class DirectRequestOptionsTest extends TestCase
{
    /**
     * @test
     * @covers \Paysafe\PhpSdk\Client\DirectRequestOptions::__construct
     *
     * @return void
     */
    public function testDirectRequestOptions_DefaultConstructor(): void
    {
        $options = new DirectRequestOptions();
        $this->assertNotNull($options->getCustomHeaders());
        $this->assertEmpty($options->getCustomHeaders());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Client\DirectRequestOptions::__construct
     *
     * @return void
     */
    public function testDirectRequestOptions_ConstructorWithNullCustomHeaders(): void
    {
        $options = new DirectRequestOptions(null);
        $this->assertNotNull($options->getCustomHeaders());
        $this->assertEmpty($options->getCustomHeaders());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Client\DirectRequestOptions::__construct
     *
     * @return void
     */
    public function testDirectRequestOptions_ConstructorWithCustomHeaders(): void
    {
        $headers = [];
        $headers["Content-Type"] = "application/json";
        $headers["Authorization"] = "Bearer token";

        $options = new DirectRequestOptions($headers);

        $this->assertNotNull($options->getCustomHeaders());
        $this->assertCount(2, $options->getCustomHeaders());
        $this->assertEquals("application/json", ($options->getCustomHeaders())["Content-Type"]);
        $this->assertEquals("Bearer token", ($options->getCustomHeaders())["Authorization"]);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Client\DirectRequestOptions::getCustomHeaders
     *
     * @return void
     */
    public function testDirectRequestOptions_GetCustomHeaders(): void
    {
        $options = new DirectRequestOptions();
        $headers = $options->getCustomHeaders();

        $this->assertNotNull($headers);
        $this->assertEmpty($headers);

        $options->addCustomHeader("test", "value");
        $this->assertEquals("value", ($options->getCustomHeaders())["test"]);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Client\DirectRequestOptions::setCustomHeaders
     *
     * @return void
     */
    public function testDirectRequestOptions_SetCustomHeaders(): void
    {
        $options = new DirectRequestOptions();

        $newHeaders = [];
        $newHeaders["X-Custom-Header"] = "custom-value";

        $options->setCustomHeaders($newHeaders);

        $this->assertCount(1, $options->getCustomHeaders());
        $this->assertEquals("custom-value", ($options->getCustomHeaders())["X-Custom-Header"]);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Client\DirectRequestOptions::addCustomHeader
     *
     * @return void
     */
    public function testDirectRequestOptions_SetCustomHeadersWithEmpty(): void
    {
        $options = new DirectRequestOptions();
        $options->addCustomHeader("existing", "value");
        $this->assertCount(1, $options->getCustomHeaders());

        $options->setCustomHeaders([]);
        $this->assertEmpty($options->getCustomHeaders());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Client\DirectRequestOptions::addCustomHeader
     *
     * @return void
     */
    public function testDirectRequestOptions_AddCustomHeader(): void
    {
        $options = new DirectRequestOptions();
        $result = $options->addCustomHeader("key1", "value1");

        $this->assertSame($options, $result);
        $this->assertCount(1, $options->getCustomHeaders());
        $this->assertEquals("value1", ($options->getCustomHeaders())["key1"]);
        $options->addCustomHeader("key2", "value2")->addCustomHeader("key3", "value3");

        $this->assertCount(3, $options->getCustomHeaders());
        $this->assertEquals("value2", ($options->getCustomHeaders())["key2"]);
        $this->assertEquals("value3", ($options->getCustomHeaders())["key3"]);
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Client\DirectRequestOptions::addCustomHeader
     *
     * @return void
     */
    public function testDirectRequestOptions_AddHeaderOverwrite(): void
    {
        $options = new DirectRequestOptions();
        $options->addCustomHeader("key", "value1");
        $this->assertEquals("value1", ($options->getCustomHeaders())["key"]);

        $options->addCustomHeader("key", "value2");
        $this->assertEquals("value2", ($options->getCustomHeaders())["key"]);
        $this->assertCount(1, $options->getCustomHeaders());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Client\DirectRequestOptions::__construct
     *
     * @return void
     */
    public function testDirectRequestOptions_InheritanceFromRequestOptions(): void
    {
        $options = new DirectRequestOptions();
        $this->assertTrue($options instanceof RequestOptions);
    }

}
