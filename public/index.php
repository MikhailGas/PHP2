<pre>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';
require SERVICES_DIR . 'Autoloader.php';

spl_autoload_register([new Autoloader(), 'loadClass']); 

$product = new \Shop\models\Product(1);
echo $product->name;
