<?php
namespace Shop\services;

class Request{
    protected $pattern = "#[/](\w+)[/]?(\w+)?[/]?[?]?(.*)?#ui";
    protected $controller;
    protected $action;
    protected $request;

    public function __construct(){
        $this->request = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    protected function parseRequest(){
        if(preg_match_all($this->pattern,$this->request,$matches)){
            $this->controller = $matches[1][0];
            $this->action = $matches[2][0];
        }
    }

    public function getController(){
        return $this->controller;
    }

    public function getAction(){
        return $this->action;
    }

    public function get($param){
        return $_GET[$param];
    }

    public function post($param){
        return $_POST[$param];
    }
}