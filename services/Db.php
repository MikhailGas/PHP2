<?php
namespace Shop\services;
class Db {
    public $id;

    protected function connect(){
        include '../config/config.php';
        static $conn;
        if(!isset($conn)){
            $conn = mysqli_connect(
                $connect['host'], 
                $connect['user'], 
                $connect['pass'], 
                $connect['db'] 
            );
        }
    return $conn;
    }
    protected function execute(string $sql) {
        return mysqli_query($this->connect(), $sql);
    }
    public function queryData(string $sql){
        if($sql){
            
            return mysqli_fetch_all($this->execute($sql), MYSQLI_ASSOC);
        }
       
    }
}