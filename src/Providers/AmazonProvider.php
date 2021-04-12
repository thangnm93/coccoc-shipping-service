<?php
/**
 * @copyright Copyright (c) 2021
 * @author Thang Nguyen
 * @since 1.0
 */

namespace Coccoc\ShippingService\Providers;

use Coccoc\ShippingService\Contracts\ProviderInterface;
use Coccoc\ShippingService\Abstracts\Provider;

class AmazonProvider extends Provider implements ProviderInterface
{

    /**
     * The coefficient of the weight per kg
     */
    const WEIGHT_COEFFICIENT = 11;

    /**
     * The coefficient of the dimension per m3
     */
    const DIMENSION_COEFFICIENT = 11;

    /**
     * Get the fee by the weight, convert coefficient price per gram
     *
     * @return float
     */
    public function getFeeByWeight()
    {
        return $this->product->getWeight() * (self::WEIGHT_COEFFICIENT / 1000);
    }

    /**
     * Get the fee by the dimension, convert coefficient price per cm3
     *
     * @return float
     */
    public function getFeeByDimension()
    {
        return $this->product->getWidth() * $this->product->getHeight() * $this->product->getDepth() * (self::DIMENSION_COEFFICIENT / 1000000);
    }

    /**
     * Get fee of product by product type
     *
     * @return float
     */
    public function getFeeByProductType()
    {
        return 0;
    }

    /**
     * Get shipping fee of product
     *
     * @return float
     */
    public function getShippingFee()
    {
        return max($this->getFeeByWeight(), $this->getFeeByDimension(), $this->getFeeByProductType());
    }

}