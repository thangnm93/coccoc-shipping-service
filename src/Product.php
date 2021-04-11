<?php
/**
 * @copyright Copyright (c) 2021
 * @author Thang Nguyen
 * @since 1.0
 */

namespace Coccoc\ShippingService;

use Coccoc\ShippingService\Contracts\ProductInterface;

class Product implements ProductInterface
{

    /**
     * The price of product
     *
     * @var float
     */
    protected $price = 0;

    /**
     * The weight of product
     *
     * @var float
     */
    protected $weight = 0;

    /**
     * The width of product
     *
     * @var float
     */
    protected $width = 0;

    /**
     * The height of product
     *
     * @var float
     */
    protected $height = 0;

    /**
     * The depth of product
     *
     * @var float
     */
    protected $depth = 0;

    /**
     * Set price for this product
     *
     * @param float $price
     *
     * @return void
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * Get price of this product
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set weight for this product
     *
     * @param float $weight
     *
     * @return void
     */
    public function setWeight(float $weight)
    {
        $this->weight = $weight;
    }

    /**
     * Get weight of this product
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set width for this product
     *
     * @param float $width
     *
     * @return void
     */
    public function setWidth(float $width)
    {
        $this->width = $width;
    }

    /**
     * Get width of this product
     *
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height for this product
     *
     * @param float $height
     *
     * @return void
     */
    public function setHeight(float $height)
    {
        $this->height = $height;
    }

    /**
     * Get height of this product
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set depth for this product
     *
     * @param float $depth
     *
     * @return void
     */
    public function setDepth(float $depth)
    {
        $this->depth = $depth;
    }

    /**
     * Get depth of this product
     *
     * @return float
     */
    public function getDepth()
    {
        return $this->depth;
    }

}