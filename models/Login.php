<?php
namespace Shop\models;

use Shop\services\Request;

class Login{
    protected $login;
    protected $password;

    public function __construct(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $request = new Request();
            $this->login = $request->post('login');
            $this->password = $request->post('password');
        }
    }

    public function login(){
        $user = User::getUserByLogin($this->login);
        //echo $this->login;
        //echo $this->password;
        if($user->login && $user->password == md5($this->login . 'salt' . $this->password)){
            $_SESSION['login'] = $user->login;
            return false;
        }
        else {
            $err = 'Неверный логин или пароль';
            return $err;
        }
    } 
    public function register(){
        
    }  
    public function exit(){
        unset($_SESSION['login']);
        session_start();
    }    
}