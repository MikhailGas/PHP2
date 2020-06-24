<pre>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';
use Shop\models\Product;

require $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';
require SERVICES_DIR . 'Autoloader.php';

spl_autoload_register([new Autoloader(), 'loadClass']); 

$loader = new \Twig\Loader\ArrayLoader([
    'index' => '<h1>Hello {{ name }}!</h1>',
]);
$twig = new \Twig\Environment($loader);

echo $twig->render('index', ['name' => 'Fabien']);

$product = new Product('Печь', 'Духовой шкаф', 5200.00, 1, 2);
$product->save();

$product->product = 'Шкаф';
$product->price = 6000.00;

$product->save();






/*$product = Product::getById(1);
var_dump($product->description);*/

