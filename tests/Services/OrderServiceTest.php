<?php

namespace Coccoc\ShippingService\Tests\Services;

use Coccoc\ShippingService\Product;
use Coccoc\ShippingService\Tests\BaseTestCase;
use Coccoc\ShippingService\Services\OrderService;
use Coccoc\ShippingService\Providers\AmazonProvider;
use Coccoc\ShippingService\Contracts\ProductInterface;
use Coccoc\ShippingService\Contracts\ProviderInterface;

class OrderServiceTest extends BaseTestCase
{

    public function testSetOrderServiceSuccess(): OrderService
    {
        $provider = new AmazonProvider();
        $order_service = new OrderService($provider);
        $_provider = $this->getPrivateOrProtectedProperty($order_service, 'provider');
        self::assertInstanceOf(ProviderInterface::class, $_provider);
        return $order_service;
    }

    /**
     * @depends testSetOrderServiceSuccess
     *
     * @param $order_service
     */
    public function testSetOrderServiceFailed($order_service): void
    {
        $provider = new \stdClass();
        try {
            $_provider = $this->getPrivateOrProtectedProperty($order_service, 'provider');
            self::assertInstanceOf(ProviderInterface::class, $_provider);
        } catch (\Throwable $throwable)
        {
            self::assertNotInstanceOf(ProviderInterface::class, $provider);
        }
    }

    /**
     * @depends testSetOrderServiceSuccess
     *
     * @param $order_service
     */
    public function testSetOrderServiceWithAProductSuccess($order_service): void
    {
        $_mock_product = $this->products[0];
        $product = $this->setProduct($_mock_product);
        $order_service->setProduct($product);
        $_products = $this->getPrivateOrProtectedProperty($order_service, 'products');
        self::assertCount(1, $_products);
    }

    /**
     * @depends testSetOrderServiceSuccess
     *
     * @param $order_service
     */
    public function testSetOrderServiceWithAProductFailed($order_service): void
    {
        $_mock_product = new \stdClass();
        try {
            $order_service->setProduct($_mock_product);
            $_products = $this->getPrivateOrProtectedProperty($order_service, 'products');
            self::assertCount(1, $_products);
        } catch (\Throwable $throwable)
        {
            self::assertNotInstanceOf(ProductInterface::class, $_mock_product);
        }
    }

    /**
     * @depends testSetOrderServiceSuccess
     *
     * @param $order_service
     */
    public function testFunctionHandleCalculateTheGrossPriceOfAnOrderSuccess($order_service): void
    {
        foreach ($this->products as $product)
        {
            $product = $this->setProduct($product);
            $order_service->setProduct($product);
        }
        $gross_price = $order_service->handle();
        self::assertEquals(13.104, $gross_price);
    }

    public function testFunctionHandleCalculateTheGrossPriceOfAnOrderButProductIsNotInstanceOfProviderInterface(): void
    {
        $provider = new \stdClass();
        try {
            $order_service = new OrderService($provider);
            foreach ($this->products as $product)
            {
                $product = $this->setProduct($product);
                $order_service->setProduct($product);
            }
            $gross_price = $order_service->handle();
        } catch (\Throwable $throwable)
        {
            self::assertNotInstanceOf(ProviderInterface::class, $provider);
        }
    }

    /**
     * Function help to set a mock product to product object
     *
     * @param $mock_product
     * @return Product
     */
    private function setProduct($mock_product = array()): Product
    {
        $product = new Product();
        if(empty($mock_product))
        {
            return $product;
        }
        $product->setPrice($mock_product['price']);
        $product->setWeight($mock_product['weight']);
        $product->setWidth($mock_product['width']);
        $product->setHeight($mock_product['height']);
        $product->setDepth($mock_product['depth']);
        return $product;
    }

}