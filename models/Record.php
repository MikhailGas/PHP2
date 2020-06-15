<?php

namespace Shop\models;

use Reflection;
use ReflectionClass;
use ReflectionProperty;
use Shop\services\Db;

abstract class Record
{
    protected $id;
    protected $db;
    protected $properties;
    
    public function __construct()
    {
        $this->db = Db::getInstance();
        $prop = $this->getProperties();
        foreach($prop as $val){
            $this->properties[$val] = $this->{$val};
        }
        var_dump($this->product);
        var_dump($this->properties);
    }

    public static function getById(int $id)
    {
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        return Db::getInstance()->queryOne(get_called_class(), $sql, [':id' => $id]);
    }

    public static function getAll()
    {
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table}";
        return Db::getInstance()->queryAll($sql);
    }

    public function delete(){
        $table = static::getTableName();
        $sql = "DELETE FROM {$table} WHERE id = :id";
        $this->db->execute($sql, [':id' => $this->id]);
    }

    public function insert(){
        $table = static::getTableName();
        $prop = $this->getProperties();    
        foreach ($prop as $val){
            $columns[] = "`{$val}`";
            $params[":{$val}"] = $this->{$val};
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));
        
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->getLastInsertId();
    }  

    public function update(){
        
    }

    protected function getProperties(){
        $prop_arr = (new ReflectionClass(get_called_class()))->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach($prop_arr as $val){
            $prop[] = $val->name;
        }
        return $prop;
    }
    

    protected static function getTableName(){}
}
