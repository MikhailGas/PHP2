<?php

namespace Shop\models;
class Product extends ModelDB{
    public $product;
    
    public function getTablename(){
        $this->table = 'goods';
    }

    
}