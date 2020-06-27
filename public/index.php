
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';
use Shop\models\Product;
use Shop\models\User;

require $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';
require SERVICES_DIR . 'Autoloader.php';

spl_autoload_register([new Autoloader(), 'loadClass']); 

$controllerName = $_GET['c'] ?: 'catalog';
$actionName = $_GET['a'];
$params = $_GET['p'];

$controllerClass = "Shop\controllers\\" . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)) {
    $controller = new $controllerClass;
    $controller->runAction($actionName);
}

/*$loader = new \Twig\Loader\ArrayLoader([
    'index' => '<h1>Hello {{ name }}!</h1>',
]);
$twig = new \Twig\Environment($loader);

echo $twig->render('index', ['name' => 'Fabien']);

$product = new User ('user1', '12345', 'Vasya', '555-555');
$product->save();*/


