<?php
namespace Shop\models;

use Shop\services\Db;
use Shop\services\Request;

class User extends Record{
    protected $login;
    protected $password;
    protected $name;
    protected $tel;

    public function __construct($login = null, $password=null, $name=null, $tel=null)
    {
        parent::__construct();
        $this->login = $login; 
        $this->password = MD5($this->login . 'salt'. $this->password);
        $this->name = $name;
        $this->tel = $tel;
    }

    public function login(){
        echo 'I am hier';
        
    }
    public static function getUserByLogin(string $login){
        $table = static::getTableName();
        $sql = "SELECT * FROM {$table} WHERE login = :login";
        return Db::getInstance()->queryOne(get_called_class(), $sql, [':login' => $login]);
    }

    protected static function getTableName(){
        return 'users';
    }
}