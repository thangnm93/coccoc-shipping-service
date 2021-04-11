<?php

namespace Coccoc\ShippingService\Services;

use Coccoc\ShippingService\Contracts\DeliveryInterface;
use Coccoc\ShippingService\Contracts\ProductInterface;
use Coccoc\ShippingService\Contracts\ServiceInterface;
use Coccoc\ShippingService\Exceptions\ShippingServiceException;

class OrderService implements ServiceInterface
{

    protected $delivery;
    protected $products = array();

    public function __construct(DeliveryInterface $delivery)
    {
        $this->delivery = $delivery;
    }

    public function setProduct(ProductInterface $product)
    {
        $this->products[] = $product;
    }

    public function handle()
    {
        try {
            $gross_price = 0;
            foreach ($this->products as $product)
            {
                $shipping_service = new ShippingService($this->delivery, $product);
                $gross_price += $shipping_service->handle();
            }
            return $gross_price;
        } catch (ShippingServiceException $e)
        {
            return 0;
        }
    }

}