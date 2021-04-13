<?php

namespace Coccoc\ShippingService\Tests\Providers;

use Coccoc\ShippingService\Product;
use Coccoc\ShippingService\Tests\BaseTestCase;
use Coccoc\ShippingService\Providers\AmazonProvider;
use Coccoc\ShippingService\Contracts\ProductInterface;

class AmazonProviderTest extends BaseTestCase
{

    public function testSetProductToAmazonProviderSuccess(): AmazonProvider
    {
        $product = new Product();
        $amazon_provider = new AmazonProvider();
        $amazon_provider->setProduct($product);
        $_product = $this->getPrivateOrProtectedProperty($amazon_provider, 'product');
        self::assertInstanceOf(ProductInterface::class, $_product);
        return $amazon_provider;
    }

    /**
     * @depends testSetProductToAmazonProviderSuccess
     *
     * @param $amazon_provider
     */
    public function testSetProductToAmazonProviderFailed($amazon_provider): void
    {
        $product = new \stdClass();
        try {
            $amazon_provider->setProduct($product);
        } catch (\Throwable $throwable) {
            self::assertNotInstanceOf(ProductInterface::class, $product);
        }
    }

    /**
     * @depends testSetProductToAmazonProviderSuccess
     *
     * @param $amazon_provider
     */
    public function testGetTheProductPrice($amazon_provider): void
    {
        $mock_product = $this->products[0];
        $product = $this->setProduct($mock_product);
        $amazon_provider->setProduct($product);
        self::assertEquals(2, $amazon_provider->getProductPrice());
    }

    /**
     * @depends testSetProductToAmazonProviderSuccess
     *
     * @param $amazon_provider
     */
    public function testGetFeeFromFunctionGetFeeByWeight($amazon_provider): void
    {
        $mock_product = $this->products[0];
        $product = $this->setProduct($mock_product);
        $amazon_provider->setProduct($product);
        self::assertEquals(0.55, $amazon_provider->getFeeByWeight());
    }

    /**
     * @depends testSetProductToAmazonProviderSuccess
     *
     * @param $amazon_provider
     */
    public function testGetFeeFromFunctionGetFeeByDimension($amazon_provider): void
    {
        $mock_product = $this->products[0];
        $product = $this->setProduct($mock_product);
        $amazon_provider->setProduct($product);
        self::assertEquals(1.452, $amazon_provider->getFeeByDimension());
    }

    /**
     * @depends testSetProductToAmazonProviderSuccess
     *
     * @param $amazon_provider
     */
    public function testGetFeeFromFunctionGetFeeByProductType($amazon_provider): void
    {
        $mock_product = $this->products[0];
        $product = $this->setProduct($mock_product);
        $amazon_provider->setProduct($product);
        self::assertEquals(0, $amazon_provider->getFeeByProductType());
    }

    /**
     * @depends testSetProductToAmazonProviderSuccess
     *
     * @param $amazon_provider
     */
    public function testGetShippingFeeFromFunctionGetShippingFee($amazon_provider): void
    {
        $mock_product = $this->products[0];
        $product = $this->setProduct($mock_product);
        $amazon_provider->setProduct($product);
        self::assertEquals(1.452, $amazon_provider->getShippingFee());
    }

    /**
     * Function help to set a mock product to product object
     *
     * @param $mock_product
     *
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