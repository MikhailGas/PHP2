<?php
namespace Shop\controllers;

use Shop\models\Product;
use Shop\services\Render;
use Shop\services\Request;

class ProductController extends Controller{
    protected $id;
    
    public function __construct(){
        parent::__construct();
        $this->id = $_GET['id'];
    }

    public function actionShowProduct(){
        $product = Product::getById($this->id);
        echo $this->render('product', ['product' => $product, 'header' => 'Карточка товара']);
        
    }
    
}