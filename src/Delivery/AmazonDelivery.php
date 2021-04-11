<?php

namespace Coccoc\ShippingService\Delivery;

use Coccoc\ShippingService\Contracts\DeliveryInterface;
use Coccoc\ShippingService\Delivery;

class AmazonDelivery extends Delivery implements DeliveryInterface
{

    const WEIGHT_COEFFICIENT = 11;
    const DIMENSION_COEFFICIENT = 11;

    /**
     * Get the fee by the weight
     *
     * @return float
     */
    public function getFeeByWeight()
    {
        return $this->product->getWeight() * self::WEIGHT_COEFFICIENT;
    }

    /**
     * Get the fee by the dimension
     *
     * @return float
     */
    public function getFeeByDimension()
    {
        return $this->product->getWidth() * $this->product->getHeight() * $this->product->getDepth() * self::DIMENSION_COEFFICIENT;
    }

    /**
     * @return float
     */
    public function getFeeByProductType()
    {
        return 0.0;
    }

    /**
     *
     * @return float
     */
    public function getShippingFee()
    {
        return max($this->getFeeByWeight(), $this->getFeeByDimension(), $this->getFeeByProductType());
    }

}