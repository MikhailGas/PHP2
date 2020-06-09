<?php


class Autoloader {
    protected $prefix = 'Shop\\';
    
    public function loadClass(string $className) {
        $base_dir = $_SERVER['DOCUMENT_ROOT'] . '/../';
        $len = strlen($this->prefix);
        if (strncmp($this->prefix, $className, $len) !== 0) {
            return;
        }
        $relative_class = substr($className, $len);
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
            
        if (file_exists($file)) {
            require $file;
        }
    }
}   
    
    

