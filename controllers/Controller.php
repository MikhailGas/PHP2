<?php
namespace Shop\controllers;

use Shop\services\Render;

abstract class Controller{
    protected $defaultAction = 'index';
    protected $action;
    

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
public function render($params){
    return (new Render())->render($this->controllerName, [$this->controllerName => $params, 'header' => $this->header]);
}


}