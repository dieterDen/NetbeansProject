<?php

/**
 * Bevat alle actie methods van controller Afwerkingstermijnen. Deze klasse zal alles delegeren wat met het item afwerkingstermijnen te maken heeft.
 * @package controllers
 * @version 0.0
 */
class Afwerkingstermijnen extends Controller {

    /**
     * roept de parent constructor op van Controller
     * @return void 
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * geeft een  overzicht van alle gerechtelijk niet-verkeer en verkeersongeval ouder dan 14 dagen
     * Data wordt doorgegeven aan view
     * @return void
     */
    function get_GF_VO() {
        $this->view->gerechtelijkeFeiten = $this->model->get_gerechtelijkefeiten();
        $this->view->render('afwerkingstermijnen/get_GF_VO');
    }

    /**
     * geeft een  overzicht van alle kantschriften ouder dan 30 dagen
     * Data wordt doorgegeven aan view
     * @return void
     */
    function get_kantschriften() {
        $this->view->kantschriften = $this->model->get_kantschriften();
        $this->view->render('afwerkingstermijnen/get_kantschriften');
    }

    /**
     * geeft een  overzicht van alle woonstveranderingen ouder dan 14 dagen
     * Data wordt doorgegeven aan view
     * @return void
     * @todo data van model afwerkingstermijnen toevoegen aan de juiste view
     */
    function get_woonstveranderingen() {
        //echo 'inside controller afwerkingstermijnen';
        $this->view->render('afwerkingstermijnen/get_woonstveranderingen');
    }

    /**
     * geeft een  overzicht van alle hercosi ouder dan 5 dagen
     * Data wordt doorgegeven aan view
     * @return void
     * @todo data van model afwerkingstermijnen toevoegen aan de juiste view
     */
    function get_hercosi() {
        //echo 'inside controller afwerkingstermijen';
        $this->view->render('afwerkingstermijnen/get_hercosi');
    }

}
