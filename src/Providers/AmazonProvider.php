<?php
declare(strict_types=1);

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
     * The coefficient of the weight per kg, convert coefficient price per gram
     */
    protected const WEIGHT_COEFFICIENT = 11 / 1000;

    /**
     * The coefficient of the dimension per m3, convert coefficient price per cm3
     */
    public const DIMENSION_COEFFICIENT = 11 / 1000000;

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
        return $this->product->getWidth() * $this->product->getHeight() * $this->product->getDepth() *
            self::DIMENSION_COEFFICIENT;
    }

    /**
     * Get fee of product by product type
     *
     * //TODO Need to implement if you want to set the fee of the product by product type
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