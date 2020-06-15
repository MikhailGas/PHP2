<?php

namespace Shop\models;

class Product extends Record
{
    public $product;
    public $description;
    public $price;
    public $category_id;
    public $brand_id;

    public function __construct($product = null, $description=null, $price=null, $category_id=null, $brand_id=null)
    {
        parent::__construct();
        /*$this->product = $product; 
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
        $this->brand_id = $brand_id;*/

        
    }

    protected static function getTablename()
    {
        return 'goods';
    }
}
