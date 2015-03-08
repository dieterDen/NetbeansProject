<?php

class Bootstrap {

    function __construct() {
        // $_GET['url'] -> werkt niet
        $url = isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:null;
        $url = ltrim($url, '/');
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //print_r($url);
        
        if(empty($url[0]))
        {
            require 'controllers/index.php';
            $controller= new Index();
            $controller->index();
            return false;
        }

        //!! better pratice om controllers te configureren in metadata
        $file='controllers/' . $url[0] . '.php';
        if (file_exists($file))
        {
            require $file;
        } else {
            $this->error();
            //require 'controllers/error.php';
            //$controller=new Error();
            //return false;
           // throw new Exception("The file: $file does not exists");
        }
        
        $controller = new $url[0];
        $controller->loadModel($url[0]);
        
        // calling methods
        if (isset($url[2])) {
            if (method_exists($controller, $url[1]))
            {
            $controller->{$url[1]}($url[2]);
            } else {
                $this->error();
            }
        } 
    
        else { 
           if (isset($url[1]))   {
               if (method_exists($controller, $url[1])) {
            $controller->{$url[1]}();
            } else {
                $this->error();
            }
           }else {
            $controller->index();
            }
        }
    }
    
function error() {
    require 'controllers/error.php';
    $controller =new Error();
    $controller->index();
    return false;
}
}
