<?php

namespace Coccoc\ShippingService;

use Coccoc\ShippingService\Contracts\ProductInterface;

class Product implements ProductInterface
{
    protected $price = 0;
    protected $weight = 0;
    protected $width = 0;
    protected $height = 0;
    protected $depth = 0;

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setWeight(float $weight)
    {
        $this->weight = $weight;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWidth(float $width)
    {
        $this->width = $width;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setHeight(float $height)
    {
        $this->height = $height;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getDepth()
    {
        return $this->depth;
    }

    public function setDepth(float $depth)
    {
        $this->depth = $depth;
    }

}