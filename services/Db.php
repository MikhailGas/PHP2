<?php

namespace Shop\services;
use \Shop\traits\TSingletone;
use \PDO;

class Db {
    use TSingletone;
    protected $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'db' => 'shop',
        'charset' => 'utf8',
    ];
    protected $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,];
    protected $connection = NULL;

    public function queryAll($sql, $params = []){
        return $this->query($sql, $params)->fetchAll();
    }

    public function queryOne($sql, $params = []){
        return $this->queryAll($sql, $params)[0];
    }

    protected function query($sql, $params){
        $pdo = $this->getConnect()->prepare($sql);
        $pdo->execute($params);
        return $pdo;
    }

    protected function getDsn() {
        return sprintf("%s:host=%s;dbname=%s;charset=%s", $this->config['driver'], $this->config['host'], $this->config['db'], $this->config['charset']);
    }

    protected function getConnect(){
        if (is_null($this->connection)){
            $this->connection = new PDO($this->getDsn(), $this->config['user'], $this->config['password'], $this->options);
        }
        return $this->connection;
    }
}