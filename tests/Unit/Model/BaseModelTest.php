<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace Model;

use Paysafe\PhpSdk\Config\ObjectMapperConfiguration;
use Paysafe\PhpSdk\Model\Customer\Customer;
use Paysafe\PhpSdk\Model\Payment\PaymentRequest;
use PHPUnit\Framework\TestCase;

class BaseModelTest extends TestCase
{

    /**
     * @covers \Paysafe\PhpSdk\Model\Customer
     */
    public function testArrayInit()
    {
        $data = ['id' => '1234', 'firstName' => 'John', 'lastName' => 'Doe'];
        $object = new Customer($data);

        $this->assertEquals('1234', $object->getId());
        $this->assertEquals('John', $object->getFirstName());
        $this->assertEquals('Doe', $object->getLastName());
    }

    /**
     * @covers \Paysafe\PhpSdk\Model\Customer
     */
    public function testArrayInitNestedObject()
    {
        $data = [
            'id' => '1234',
            'firstName' => 'John',
            'lastName' => 'Doe',
            'dateOfBirth' => [
                'year' => 2000,
                'month' => 2,
                'day' => 3
            ]
        ];

        $object = new Customer($data);
        $this->assertEquals('1234', $object->getId());
        $this->assertEquals('John', $object->getFirstName());
        $this->assertEquals('Doe', $object->getLastName());
        $this->assertEquals('2000', $object->getDateOfBirth()->getYear());
        $this->assertEquals(2, $object->getDateOfBirth()->getMonth());
        $this->assertEquals(3, $object->getDateOfBirth()->getDay());
    }

    /**
     * @covers \Paysafe\PhpSdk\Model\Customer
     */
    public function testArrayInitNestedObjectFromJsonFile()
    {
        $jsonPath = "json/customer/create_customer_request.json";

        $filePath = realpath(__DIR__ . "/../../E2e/resources/$jsonPath");
        if (!file_exists($filePath)) {
            throw new \Exception("File not found: $jsonPath");
        }
        $jsonContent = file_get_contents($filePath);
        $data = json_decode($jsonContent, true);
        $object = new Customer($data);

        $this->assertEquals('777-555-8888', $object->getCellPhone());
        $this->assertEquals('John', $object->getFirstName());
        $this->assertEquals('Smith', $object->getLastName());
    }

    /**
     * @test
     * @covers \Paysafe\PhpSdk\Config\BaseModelNormalizer::normalize
     */
    public function serializerOmitsNullFieldsFromPayload(): void
    {
        $request = new PaymentRequest();
        $request->setMerchantRefNum('mref-1');
        $request->setAmount(500);
        $request->setCurrencyCode('USD');

        $json = ObjectMapperConfiguration::serialize($request);

        $this->assertStringNotContainsString('"level2level3"', $json);
        $this->assertStringNotContainsString('"description":null', $json);
        $this->assertStringContainsString('"merchantRefNum":"mref-1"', $json);
    }
}
