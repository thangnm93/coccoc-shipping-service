<?php
include_once './vendor/autoload.php';

use \Coccoc\ShippingService\Providers\AmazonProvider;
use \Coccoc\ShippingService\Services\OrderService;
use \Coccoc\ShippingService\Product;

$products = array(
    array(
        'price' => 10,
        'weight' => 0.03,
        'width' => 120,
        'height' => 110,
        'depth' => 10,
    ),
    array(
        'price' => 20,
        'weight' => 0.01,
        'width' => 100,
        'height' => 100,
        'depth' => 20,
    ),
    array(
        'price' => 30,
        'weight' => 0.03,
        'width' => 120,
        'height' => 110,
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