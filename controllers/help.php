<?php
/**
 * dit is een test klasse en mag verwijderd worden
 * @package controllers
 */

class Help  extends Controller {

    function __construct() {
        parent::__construct();
       // echo'we are inside help<br />';
       
    }
    
    function index(){
        $this->view->render('help/index');
    }
    
    public function  other($arg=false) 
    {
       // echo ' we are in other<br />';
       //echo 'Optional:' .$arg.'<br />';
        
        require 'models/help_model.php';
        $model=new Help_Model();
        $this->view->blah=$model->blah();
        
    }

}

