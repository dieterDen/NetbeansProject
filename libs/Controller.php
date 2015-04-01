<?php

/**
 * Deze klasse is de parent klasse van alle controllers in package:controllers.
 * Aan de controller wordt een view object meegegeven en een model gebonden
 * 
 * @package libs
 * @example ../index.php 
 * @version 0.0
 */
class Controller {
/**
 * In contructor wordt een View object gegeven aan de controller
 * @param void 
 * @since 2015-03-24
 */
    function __construct() {
        //echo 'Main controller<br />';
        $this->view=new View();
    }
 
    /**
     * De functie loadModel bindt het passende Model object toe aan de controller
     * @param string $name the naam van de controller meegegeven vanuit de bootstrap
     * @since 2015-03-2015
     */
    public function loadModel($name) {
        $path= 'models/'.$name.'_model.php';
        
        if(file_exists($path)) {
            require 'models/'.$name.'_model.php';
            
            $modelName=$name.'_model';
            $this->model=new $modelName();
        }
    }
    
     
}

