<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

use Shop\models\Login;
use Shop\models\Product;
use Shop\models\User;
use Shop\services\Request;

require $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';
require SERVICES_DIR . 'Autoloader.php';

spl_autoload_register([new Autoloader(), 'loadClass']); 
$request = new Request();
$controllerName = $request->getController() ?: 'catalog';
$actionName = $request->getAction();

$controllerClass = "Shop\controllers\\" . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)) {
    $controller = new $controllerClass;
    $controller->runAction($actionName);
}






