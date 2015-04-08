<?php

use KLogger;

/**
 * Deze klasse gaat URL ontvangen en plaatst deze in array
 * , onderzoekt of dat het eerste element een geldige controller is
 * , onderzoekt of dat het tweede element een geldige controller actie is
 * , onderzoekt of dat het derde element een geldige parameter is voor de actie method
 * 
 * @package libs
 * @example ../index.php 
 * @version 0.0
 * @since 2015-03-24
 * 
 */
class Bootstrap {

    /**
     * Constructor roep een child-instantie van de klasse Controller op. 
     * Het juiste type van Controller klasse wordt bepaald adh van URL die doorgegeven wordt.
     * Ten eerste worden de slashes verwijderd uit de URl.
     * Als tweede worden de URl string omgezet in array via explode.
     * Als derde: controller wordt bepaald, als controller niet bestaat wordt default index controleller opgeroepen
     * Als vierde: als controller bestaat wordt model eraan gekoppeld via parent functie loadModel()
     * Als vijfde: de controller actie method en param wordt bepaald
     * Tot slot: als er geen juiste controller, actie method of param gevonden kan worden, wordt de functie error() opgeroepen
     *
     * @return void
     * @TODO implementeren van autoloader
     * @since 2015-03-24
     */
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

    /**
     * Deze functie gaat foutboodschap tonen 'page doesn't exists' aan gebruiker indien pagina niet geladen kan worden
     * 
     * @return void
     * @since 2015-03-24
     */
    function error() {
        require 'controllers/error.php';
        $controller = new Error();
        $controller->index();
        return false;
    }

}
