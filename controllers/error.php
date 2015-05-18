<?php

/**
 * Deze klasse staat in om de error view te renderen die een foutboodschap toont als een pagina faalt in het laden.
 * Deze klasse logt het falen van laden van pagina's in logbestand. 
 * @package controllers
 * @version 0.0
 */
class Error extends Controller {

    /**
     * Roept de parent constructor op van Controller
     * @return void
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * index is de default functie van een controller.
     * Deze functie staat in voor logging en tonen van foutbooschap
     * @return void 
     */
    function index($foutBoodschap, $message = "") {
        $this->view->msg = $foutBoodschap;
        $this->view->render('error/index');

        $log = KLogger::getInstance();
        $log->LogError("pagina bestaat niet: " . $_SERVER['REQUEST_URI']);
        $log->LogFatal($message);
    }

}
