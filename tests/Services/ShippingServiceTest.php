<?php

namespace Coccoc\ShippingService\Tests\Services;

use Coccoc\ShippingService\Product;
use Coccoc\ShippingService\Tests\BaseTestCase;
use Coccoc\ShippingService\Services\ShippingService;
use Coccoc\ShippingService\Providers\AmazonProvider;
use Coccoc\ShippingService\Contracts\ProductInterface;
use Coccoc\ShippingService\Contracts\ProviderInterface;

class ShippingServiceTest extends BaseTestCase
{

    public function testSetShippingProviderSuccess(): void
    {
        $provider = new AmazonProvider();
        $shipping_service = new ShippingService($provider);
        $_provider = $this->getPrivateOrProtectedProperty($shipping_service, 'provider');
        self::assertInstanceOf(ProviderInterface::class, $_provider);
    }

    public function testSetShippingProviderFailed(): void
    {
        $provider = new \stdClass();
        try {
            new ShippingService($provider);
        } catch (\Throwable $throwable) {
            self::assertNotInstanceOf(ProviderInterface::class, $provider);
        }
    }

    public function testFunctionHandleCalculateTheShippingFeeSuccess(): void
    {
        $mock_product = $this->products[0];
        $product = $this->setProduct($mock_product);
        $provider = new AmazonProvider();
        $provider->setProduct($product);
        $shipping_service = new ShippingService($provider);
        $shipping_fee = $shipping_service->handle();
        self::assertEquals(1.452, $shipping_fee);
    }

    public function testFunctionHandleCalculateTheShippingFeeButProductIsNotInstanceOfProductInterface(): void
    {
        $product = new \stdClass();
        try {
            $provider = new AmazonProvider();
            $provider->setProduct($product);
            $shipping_service = new ShippingService($provider);
            $shipping_service->handle();
        } catch (\Throwable $throwable) {
            self::assertNotInstanceOf(ProductInterface::class, $product);
        }
    }

    /**
     * Function help to set a mock product to product object
     *
     * @param $mock_product
     * @return Product
     */
    private function setProduct($mock_product): Product
    {
        $product = new Product();
        $product->setPrice($mock_product['price']);
        $product->setWeight($mock_product['weight']);
        $product->setWidth($mock_product['width']);
        $product->setHeight($mock_product['height']);
        $product->setDepth($mock_product['depth']);
        return $product;
    }
}