# Shipping Service Package

This is an easy to use package to calculate the cross price.

#### Shipping Service Providers Available:

* Amazon

## 1. Requirements
* [PHP >= 7.1.0](http://php.net)

## 2. Installation
Require using [Composer](https://getcomposer.org):

```bash
$ composer install
```

## 3. How to use

```php
include_once './vendor/autoload.php';

use \Coccoc\ShippingService\Providers\AmazonProvider;
use \Coccoc\ShippingService\Services\OrderService;
use \Coccoc\ShippingService\Product;

$products = array(
    array(
        'price' => 10,
        'weight' => 120, // gram
        'width' => 100, // cm
        'height' => 120, // cm
        'depth' => 10,
    ),
    array(
        'price' => 20,
        'weight' => 150, // gram
        'width' => 110, // cm
        'height' => 120, // cm
        'depth' => 8,
    )
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
$order_gross_price = $order_service->handle();

```

## 4. Testing

```bash
$ ./vendor/bin/phpunit --testdox --coverage-text --coverage-clover=coverage.clover
```
or using this command
```bash
$ composer test
```

##### Example command run test

```bash
$ php example.php
```