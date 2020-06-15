<pre>
<?php

use Shop\models\Product;

require $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';
require SERVICES_DIR . 'Autoloader.php';

spl_autoload_register([new Autoloader(), 'loadClass']); 

/*$product = new Product('Печь', 'Микроволновая печь', 5000.00, 1, 2);
$product->insert();
var_dump($product);*/

$product = Product::getById(1);
var_dump($product->product);
$product->price = 1000;
