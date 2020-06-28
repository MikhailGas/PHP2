<?php
namespace Shop\controllers;

use Shop\models\Product;
use Shop\services\Render;

class ProductController extends Controller{
    protected $id;
    protected $controllerName = 'product';
    protected $header = 'Карточка товара';


    public function __construct(){
        $this->id = $_GET['id'];
    }

    public function actionShowProduct(){
        $product = Product::getById($this->id);
        echo $this->render($product);
        
    }
    
}