<?php

namespace Coccoc\ShippingService\Contracts;

interface ProductFeeInterface
{

    /**
     * Get the product shipping fee
     *
     * @return mixed
     */
    public function getShippingFee();

    /**
     * Get the fee by the weight
     *
     * @return mixed
     */
    public function getFeeByWeight();

    /**
     * Get the fee by the dimension
     *
     * @return mixed
     */
    public function getFeeByDimension();

}
