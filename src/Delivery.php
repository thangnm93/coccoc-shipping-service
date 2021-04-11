<?php

namespace Coccoc\ShippingService;

use Coccoc\ShippingService\Contracts\DeliveryInterface;
use Coccoc\ShippingService\Contracts\ProductInterface;

abstract class Delivery implements DeliveryInterface
{

    protected $product;

    public function setProduct(ProductInterface $product)
    {
        $this->product = $product;
    }

}