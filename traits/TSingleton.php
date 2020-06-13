<?php
namespace Shop\traits;
trait TSingletone {
    private static $instance = null;

    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}

    public function getInstance(){
        if (is_null(static::$instance)){
            static::$instance = new static;
        }
        return static::$instance;
    }
    
}