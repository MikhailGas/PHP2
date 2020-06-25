<?php
namespace Shop\controllers;

use Shop\models\Cart;

class CartController extends Controller{
    protected $controllerName = 'cart';
    protected $header = 'Корзина';

    public function actionShowCart(){
        $cart = Cart::getAll();
        echo $this->render($cart);
    }   
}