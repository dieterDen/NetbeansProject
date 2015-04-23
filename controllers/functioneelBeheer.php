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
        $this->view->imeiNummers = $this->model->get_imeiNummers();
        $this->view->render('functioneelBeheer/get_imeiNummers');
    }

    /**
     * Alle namen van personen met openstaande dossiers worden opgehaald uit model en doorgegeven aan view.
     * Bijhorende view wordt gerenderd
     * @return void 
     */
    function get_openstaandeDossiers_namen() {
        $this->view->openstaandeDossiersStatistiek = $this->model->get_openstaandeDossiersStatistiek();
        $this->view->namen_openstaandeDossiers = $this->model->get_openstaandeDossiers_namen();
        $this->view->render('functioneelBeheer/get_openstaandeDossiers');
    }

    /**
     * Alle dossiers van een geselecteerde persoon worden opgehaald en aan view doorgegeven.
     * Alle statistieken worden opgehaald van een gebruiker en aan view doorgegeven.
     * 
     * @param string naam opsteller openstaand dossier
     * @return void 
     */
    function get_openstaandeDossiers($naam) {
        $this->view->info_openstaandeDossiers = $this->model->get_openstaandeDossiers($naam);
        $this->view->statistiekPerWeek = $this->model->get_statistiekPerWeek($naam);
        $this->get_openstaandeDossiers_namen();
    }

}

?>