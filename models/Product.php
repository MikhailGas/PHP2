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
        $this->table = 'products';
        $this->condition = "id={$id}";
        $this->limit = '';
        $this->sort = '';
        $this->fields = '*';
        $this->getData();
        $this->id = $this->data[0]['id'];
        $this->name = $this->data[0]['name'];
        $this->description = $this->data[0]['description'];
        $this->price = $this->data[0]['price'];
        $this->category_id = $this->data[0]['category_id'];
    }

    
}