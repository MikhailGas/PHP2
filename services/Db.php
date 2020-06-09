<?php
namespace Shop\services;
class Db {
    public $id;
    public function queryData(string $sql){
        if($sql){
            return [['id'=> 1,
                'name' => 'notebook',
                'description' => 'jbchcbsjhcbjshcbsjhbc',
                'price' => 25000,
                'category_id' => 2],
            ];
        }
       
    }
}