<?php
/**
 * All Rights Reserved, Copyright © Paysafe Holdings UK Limited 2025. For more information see LICENSE
 */

namespace Model;

use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use Paysafe\PhpSdk\Client\AutomaticRetry;
use Paysafe\PhpSdk\Model\Customer\Customer;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\RequestInterface;

class BaseModelTest extends TestCase
{

    /**
     * @covers \Paysafe\PhpSdk\Model\BaseModel
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
     * @covers \Paysafe\PhpSdk\Model\BaseModel
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
     * @covers \Paysafe\PhpSdk\Model\BaseModel
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
}
