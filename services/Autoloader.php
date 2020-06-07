<?php


class Autoloader {
    protected $prefix = 'Foo\\Bar\\';
    protected $base_dir = __DIR__ . '/';

    public function loadClass(string $className) {
        $len = strlen($this->prefix);
        if (strncmp($this->prefix, $this->class, $len) !== 0) {
            return;
        }
        $relative_class = substr($className, $len);
        $file = $this->base_dir . str_replace('\\', '/', $relative_class) . '.php';

        
        if (file_exists($file)) {
            require $file;
        }
    }
}   
    
    

