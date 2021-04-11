<?php
/**
 * @copyright Copyright (c) 2021
 * @author Thang Nguyen
 * @since 1.0
 */

namespace Coccoc\ShippingService\Services;

use Coccoc\ShippingService\Contracts\ProviderInterface;
use Coccoc\ShippingService\Contracts\ProductInterface;
use Coccoc\ShippingService\Contracts\ServiceInterface;
use Coccoc\ShippingService\Exceptions\ShippingServiceException;

class OrderService implements ServiceInterface
{

    protected $provider;
    protected $products = array();

    /**
     * OrderService constructor.
     *
     * @param ProviderInterface $provider
     */
    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Set product to list of product
     *
     * @param ProductInterface $product
     */
    public function setProduct(ProductInterface $product)
    {
        $this->products[] = $product;
    }

    /**
     * Get the gross price of this order
     *
     * @return float
     */
    public function getPrice()
    {
        try {
            $gross_price = 0;
            foreach ($this->products as $product)
            {
                $this->provider->setProduct($product);
                $shipping_service = new ShippingService($this->provider);
                $gross_price += $shipping_service->getPrice() + $this->provider->getProductPrice();
            }
            return $gross_price;
        } catch (ShippingServiceException $e)
        {
            return 0;
        }
    }

}