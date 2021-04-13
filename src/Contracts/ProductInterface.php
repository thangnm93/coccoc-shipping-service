<?php
declare(strict_types=1);

/**
 * @copyright Copyright (c) 2021
 * @author Thang Nguyen
 * @since 1.0
 */

namespace Coccoc\ShippingService\Contracts;

interface ProductInterface
{

    /**
     * The product price
     *
     * @return mixed
     */
    public function getPrice();

    /**
     * The products set price
     *
     * @param $price
     * @return mixed
     */
    public function setPrice(float $price);

    /**
     * The product weight
     *
     * @return mixed
     */
    public function getWeight();

    /**
     * The product set weight
     *
     * @param $weight
     * @return mixed
     */
    public function setWeight(float $weight);

    /**
     * The product width
     *
     * @return mixed
     */
    public function getWidth();

    /**
     * The product set width
     *
     * @param $width
     * @return mixed
     */
    public function setWidth(float $width);

    /**
     * The product height
     *
     * @return mixed
     */
    public function getHeight();

    /**
     * The product set height
     *
     * @param $height
     * @return mixed
     */
    public function setHeight(float $height);

    /**
     * The product depth
     *
     * @return mixed
     */
    public function getDepth();

    /**
     * The product set depth
     *
     * @param $depth
     * @return mixed
     */
    public function setDepth(float $depth);
}