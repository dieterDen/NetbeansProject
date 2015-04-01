<?php
/**
 * Deze controller klasse zal alles delegeren wat met het item: functioneel beheer te maken heeft.
 * @package controllers
 * @version 0.0 
 */
class FunctioneelBeheer extends Controller {
/**
 * roept de parent constructor op van Controller
 * @return void 
 */
    function __construct() {
        parent::__construct();
    }
/**
 * Alle foute IMEI-nummers, opgehaald vanuit het model, worden doorgegeven aan de view.
 * Bijhorende view wordt gerenderd
 * @return void 
 */
    function get_imeiNummers() {
       // echo 'geef overzicht van IMEI-nummers<br />';
        $this->view->imeiNummers=$this->model->get_imeiNummers();
        $this->view->render('functioneelBeheer/get_imeiNummers');
    }

}

?>