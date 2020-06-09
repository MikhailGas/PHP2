<?php

namespace Shop\models;
class Product extends ModelDB{
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;

    function __construct($id)
    {
        $this->table = 'goods';
        $this->condition = "id={$id}";
        $this->limit = '1';
        $this->sort = 'id';
        $this->fields = '*';
        $this->getData();
        $this->id = $this->data[0]['id'];
        $this->name = $this->data[0]['product'];
        $this->description = $this->data[0]['description'];
        $this->price = $this->data[0]['price'];
        $this->category_id = $this->data[0]['category_id'];
    }

    
}