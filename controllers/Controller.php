<?php
namespace Shop\controllers;

use Shop\services\Render;

abstract class Controller{
    protected $defaultAction = 'index';
    protected $action;
    protected $render;
    
    public function __construct(){
        $this->render = new Render();
    }   
    public function runAction($action = null){
        if(!$action){
            $action = $this->defaultAction;
        }
        
        $method = "action" . ucfirst($action);
        if(method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "Страница не существует";
        }
    }
    


}