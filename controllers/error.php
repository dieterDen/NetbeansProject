<?php

class Error extends Controller {

        
    function __construct() {
        parent::__construct();
              
       // $this->view->msg='This page doesnt exists';
       // $this->view->render('error/index');
    }
    
    
    function index(){
        $this->view->msg='This page doesnt exists';
        $this->view->render('error/index');
    
        $log = KLogger::getInstance();
        $log->LogError("pagina bestaat niet: ".$_SERVER['REQUEST_URI']);
        
    }
    
   

}

