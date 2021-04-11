<?php

namespace Coccoc\ShippingService\Contracts;

interface DeliveryInterface
{

    public function getFeeByWeight();

    public function getFeeByDimension();

    public function getFeeByProductType();

    public function getShippingFee();

}