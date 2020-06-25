<?php
namespace Shop\models;

class Cart extends Record {
    protected $product;
    protected $price;
    protected $quantity;
    
    protected static function getTableName(){
        return 'cart';
    }
}