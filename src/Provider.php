<?php
/**
 * @copyright Copyright (c) 2021
 * @author Thang Nguyen
 * @since 1.0
 */

namespace Coccoc\ShippingService;

use Coccoc\ShippingService\Contracts\ProviderInterface;
use Coccoc\ShippingService\Contracts\ProductInterface;

abstract class Provider implements ProviderInterface
{

    protected $product;

    /**
     * Set product for provider
     *
     * @param ProductInterface $product
     */
    public function setProduct(ProductInterface $product)
    {
        $this->product = $product;
    }

    /**
     * Get the product price
     *
     * @return float
     */
    public function getProductPrice()
    {
        return $this->product->getPrice();
    }
}