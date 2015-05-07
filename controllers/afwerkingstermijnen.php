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
     * @todo extra: print functie die pdf toont of nog liever odf file
     */
    function get_GF_VO() {
        echo 'inside controller afwerkingstermijnen';
        $this->view->render('afwerkingstermijnen/get_GF_VO');
    }

}
