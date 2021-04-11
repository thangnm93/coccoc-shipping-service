<?php

namespace Coccoc\ShippingService\Services;

use Coccoc\ShippingService\Contracts\DeliveryInterface;
use Coccoc\ShippingService\Contracts\ProductInterface;
use Coccoc\ShippingService\Contracts\ServiceInterface;
use Coccoc\ShippingService\Exceptions\ShippingServiceException;

class ShippingService implements ServiceInterface
{
    protected $delivery;
    protected $product;

    public function __construct(DeliveryInterface $delivery, ProductInterface $product)
    {
        $this->delivery = $delivery;
        $this->product = $product;
    }

    public function handle()
    {
        try {
            $this->delivery->setProduct($this->product);
            $product_price = $this->product->getPrice();
            $shipping_fee = $this->delivery->getShippingFee();
            return $product_price + $shipping_fee;
        } catch (\Exception $e)
        {
            throw new ShippingServiceException($e->getMessage());
        }
    }

}