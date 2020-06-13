<?php
namespace Shop\models;
use Shop\services\Db;
abstract class ModelDB {
    protected $table;
    protected $db;
    public $data;
    
    public function __construct(){
        $this->db = Db::getInstance();
        $this->table = $this->getTableName();
    }
    
    public function getById(int $id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        var_dump($this->db);
        $this->db->queryOne($sql, ['id' => $id]);
        return $this;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->db->queryAll($sql);
    }

    abstract function getTableName();
}