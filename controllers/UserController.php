<?php
namespace Shop\controllers;

use Shop\models\Login;
use Shop\services\Render;

class UserController extends Controller{
    
    protected $err;
    protected $login;

    public function __construct(){
        parent::__construct();
        $this->login = new Login();
        
    }   

    public function actionLogin(){
        if ($this->login->login()){
            echo $this->render->render('login',['err' => $this->login->login(), 'header' => 'Вход']);
        }else{
            header('Location: /');exit;
        }
    }

    public function actionIndex(){
        echo $this->render->render('login', ['header' => 'Вход']);
    } 
    
    public function actionExit(){
        $this->login->exit();
        header('Location: /');exit;
    }

    public function actionAccount(){
        echo $this->render->render('account',['header' => 'Личный кабинет']);
    }   
}