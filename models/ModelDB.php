<?php
namespace Shop\models;
abstract class ModelDB {
    protected $table;
    protected $condition;
    protected $limit;
    protected $sort;
    protected $fields;
    protected $db;
    protected $data;

    public function __construct(){
        $this->db = new \Shop\services\Db();
    }
        
    public function getData(){
        $this->db = new \Shop\services\Db();
        $sql = "SELECT {$this->fields} FROM {$this->table} WHERE {$this->condition} ORDER BY {$this->sort} LIMIT {$this->limit}";
        $this->data = $this->db->queryData($sql);
        
    }

    
}