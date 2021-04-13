<?php

namespace Coccoc\ShippingService\Tests;

use Coccoc\ShippingService\Product;

class ProductTest extends BaseTestCase
{

    public function testCreateProductAndSetProductPropertySuccess(): void
    {
        $mock_product = $this->products[0];
        $product = new Product();
        $product->setPrice($mock_product['price']);
        self::assertEquals($mock_product['price'], $product->getPrice());
        $product->setWeight($mock_product['weight']);
        self::assertEquals($mock_product['weight'], $product->getWeight());
        $product->setWidth($mock_product['width']);
        self::assertEquals($mock_product['width'], $product->getWidth());
        $product->setHeight($mock_product['height']);
        self::assertEquals($mock_product['height'], $product->getHeight());
        $product->setDepth($mock_product['depth']);
        self::assertEquals($mock_product['depth'], $product->getDepth());
    }

    public function testSetProductPriceFailed(): void
    {
        try {
            $price = "1211.1,0";
            $product = new Product();
            $product->setPrice($price);
        } catch (\Throwable $throwable) {
            self::assertEquals("A non well formed numeric value encountered", $throwable->getMessage());
        }
    }

    public function testSetProductWeightFailed(): void
    {
        try {
            $weight = "100,1s";
            $product = new Product();
            $product->setWeight($weight);
        } catch (\Throwable $throwable) {
            self::assertEquals("A non well formed numeric value encountered", $throwable->getMessage());
        }
    }

    public function testSetProductWidthFailed(): void
    {
        try {
            $width = "122.1!@";
            $product = new Product();
            $product->setWeight($width);
        } catch (\Throwable $throwable) {
            self::assertEquals("A non well formed numeric value encountered", $throwable->getMessage());
        }
    }

    public function testSetProductHeightFailed(): void
    {
        try {
            $height = "1200??09";
            $product = new Product();
            $product->setHeight($height);
        } catch (\Throwable $throwable) {
            self::assertEquals("A non well formed numeric value encountered", $throwable->getMessage());
        }
    }

    public function testSetProductDepthFailed(): void
    {
        try {
            $depth = "string";
            $product = new Product();
            $product->setDepth($depth);
        } catch (\Throwable $throwable) {
            self::assertStringContainsString("must be of the type float", $throwable->getMessage());
        }
    }
}