<?php

use KLogger;

class Bootstrap {

    function __construct() {
        $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;
        $log = KLogger::getInstance();
       
        if (!$_SERVER['REQUEST_URI']) {
            $log->LogError('Bootstrap: $server[REQUEST_URI]' . $_SERVER['REQUEST_URI']);
        }
        
        $url = ltrim($url, '/');
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //print_r($url);

        if (empty($url[0]) || $url[0] == 'index.php') {
            require 'controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }

        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            $this->error();
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);

        // calling methods
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $log->LogError("Bootstrap: geen geldige parameter meegegeven aan controller functie");
                $this->error();
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $this->error();
                }
            } else {
                $controller->index();
            }
        }
    }

    function error() {
        require 'controllers/error.php';
        $controller = new Error();
        $controller->index();
        return false;
    }

}
