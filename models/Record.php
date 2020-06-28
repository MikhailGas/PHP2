<?php

namespace Shop\models;

use Reflection;
use ReflectionClass;
use ReflectionProperty;
use Shop\interfaces\IRecord;
use Shop\services\Db;

abstract class Record implements IRecord
{
    private $id;
    public $db;
    public $properties;
    public $props = [];

    public function __get($prop){
        return $this->{$prop};    
    }

    public function __set($prop, $value){
        $this->$prop = $value;
        $this->props[] = $prop;
    }
    
    public function __construct()
    {
        $this->db = Db::getInstance();
        $prop = $this->getProperties();
        if($prop){
            foreach($prop as $val){
                $this->properties[$val] = $this->{$val};
            }
        }
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
        return Db::getInstance()->queryAll(get_called_class(), $sql);
    }

    public function delete(){
        $table = static::getTableName();
        $sql = "DELETE FROM {$table} WHERE id = :id";
        $this->db->execute($sql, [':id' => $this->id]);
    }

    public function save(){
        $table = static::getTableName();
        $prop = $this->getProperties(); 
        foreach ($prop as $val){
            $columns[] = "`{$val}`";
            $params[":{$val}"] = $this->{$val};
            $set[] = "{$val}=:{$val}";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));
        $set = implode(", ", $set);

        if($this->props) {
            $sql = "UPDATE {$table} SET {$set} WHERE id=:id";
            $params[":id"] = $this->id;
            $this->db->execute($sql, $params);
        }
        else{   
            $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
            $this->db->execute($sql, $params);
            $this->id = $this->db->getLastInsertId();
        }
    }

    protected function getProperties(){
        if ($this->props){
            $prop = $this->props;
        }else{
            $prop_arr = (new ReflectionClass(get_called_class()))->getProperties(ReflectionProperty::IS_PROTECTED);
            foreach($prop_arr as $val){
                $prop[] = $val->name;
            }
        }
        
        return $prop;
    }
    

    protected static function getTableName(){}
}
