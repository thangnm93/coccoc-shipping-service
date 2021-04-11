<?php
/**
 * @copyright Copyright (c) 2021
 * @author Thang Nguyen
 * @since 1.0
 */

namespace Coccoc\ShippingService\Providers;

use Coccoc\ShippingService\Contracts\ProviderInterface;
use Coccoc\ShippingService\Provider;

class AmazonProvider extends Provider implements ProviderInterface
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