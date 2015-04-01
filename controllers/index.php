<?php

/**
 * Dit de klasse van de default controller.
 * Deze klasse rendert de hoofdpagina 
 * @package controllers
 * @version 0.0
 */
class Index extends Controller {

    /**
     * roept de parent constructor op van Controller
     * @return void
     */
    function __construct() {
        parent::__construct();
    }
/**
 * rendert de view voor de hoofdpagina
 * @return void 
 */
    function index() {
        $this->view->render('index/index');
    }

}
