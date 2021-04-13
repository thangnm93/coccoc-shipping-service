<?php

namespace Coccoc\ShippingService\Tests;

use ReflectionClass;
use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{

    protected $products;

    public function setUp(): void
    {
        parent::setUp();
        $this->mockProducts();
    }

    public function tearDown(): void
    {
        parent::tearDown();
        $this->destroyProducts();
    }

    public function testSetProductsSuccess(): void
    {
        self::assertCount(2, $this->products);
    }

    public function testSetProductsFailed(): void
    {
        $this->products = array();
        self::assertCount(0, $this->products);
    }

    protected function mockProducts(): void
    {
        $products = array(
            array(
                'price' => 2,
                'weight' => 50, // gram
                'width' => 120, // cm
                'height' => 110, // cm
                'depth' => 10,
            ),
            array(
                'price' => 4,
                'weight' => 100, // gram
                'width' => 100, // cm
                'height' => 100, // cm
                'depth' => 20,
            ),
        );
        $this->products = $products;
    }

    protected function destroyProducts(): void
    {
        $this->products = array();
    }

    /**
     * Function to help get a value of private or protected property of an object
     *
     * @param $object
     * @param $property
     * @return mixed
     * @throws \ReflectionException
     */
    protected function getPrivateOrProtectedProperty($object, $property)
    {
        $reflector = new ReflectionClass($object);
        $property = $reflector->getProperty($property);
        $property->setAccessible(true);
        return $property->getValue($object);
    }
}