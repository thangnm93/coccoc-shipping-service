<?php
include_once './vendor/autoload.php';

use \Coccoc\ShippingService\Providers\AmazonProvider;
use \Coccoc\ShippingService\Services\OrderService;
use \Coccoc\ShippingService\Product;

$products = array(
    array(
        'price' => 10,
        'weight' => 50, // gram
        'width' => 120, // cm
        'height' => 110, // cm
        'depth' => 10,
    ),
    array(
        'price' => 20,
        'weight' => 100, // gram
        'width' => 100, // cm
        'height' => 100, // cm
        'depth' => 20,
    ),
    array(
        'price' => 30,
        'weight' => 1200, // gram
        'width' => 120, // cm
        'height' => 110, // cm
        'depth' => 50,
    ),
);

$provider = new AmazonProvider();
$order_service = new OrderService($provider);
foreach ($products as $_product) {
    $product = new Product();
    $product->setPrice($_product['price']);
    $product->setWeight($_product['weight']);
    $product->setWidth($_product['width']);
    $product->setHeight($_product['height']);
    $product->setDepth($_product['depth']);
    $order_service->setProduct($product);
}
$order_gross_price = $order_service->getPrice();
echo sprintf("The gross price of this order with %s product(s) is %s", count($products), number_format($order_gross_price));