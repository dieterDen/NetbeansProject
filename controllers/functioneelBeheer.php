<?php

class FunctioneelBeheer extends Controller {

    function __construct() {
        parent::__construct();
    }

    function get_imeiNummers() {
       // echo 'geef overzicht van IMEI-nummers<br />';
        $this->view->imeiNummers=$this->model->get_imeiNummers();
        $this->view->render('functioneelBeheer/get_imeiNummers');
    }

}

?>