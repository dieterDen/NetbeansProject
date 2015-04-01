<?php
/**
 * Dit is een test klasse en mag verwijderd worden
 * @package controllers
 */
class Login extends Controller {

    function __construct() {
        parent::__construct();

        //echo 'we are in index ctrl';
     
    }

      
    function index(){
           //require 'models/login_model.php';
           //$model=new login_model();           
           
          $this->view->render('login/index');
    }
    
    function run()
    {
        //model creatie in functie loadModel() van Controller class
     $this->model->run();   
    }
}


