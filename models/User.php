<?php
namespace Shop\models;

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

    protected static function getTableName(){
        return 'users';
    }
}