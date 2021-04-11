<?php

namespace Coccoc\ShippingService\Contracts;

interface OrderInterface
{

    /**
     * Get the product gross price
     *
     * @return mixed
     */
    public function getGrossPrice();

    /**
     * set the product shipping service
     *
     * @return mixed
     */
    public function setShippingService();

}