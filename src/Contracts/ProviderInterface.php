<?php
declare(strict_types=1);

/**
 * @copyright Copyright (c) 2021
 * @author Thang Nguyen
 * @since 1.0
 */

namespace Coccoc\ShippingService\Contracts;

interface ProviderInterface
{

    /**
     * Get fee of product by weight
     *
     * @return float
     */
    public function getFeeByWeight();

    /**
     * Get fee of product by dimension
     *
     * @return float
     */
    public function getFeeByDimension();

    /**
     * Get fee product by type
     *
     * @return float
     */
    public function getFeeByProductType();

    /**
     * Get shipping fee of product
     *
     * @return float
     */
    public function getShippingFee();
}