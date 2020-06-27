<?php
namespace Shop\models;

class Catalog extends Record {

    protected static function getTableName(){
        return 'products';
    }
}