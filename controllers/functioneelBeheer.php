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
        $this->view->namen_diensten = $this->model->get_diensten();
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
        $arr_values = explode('%20', $naam);
        $param_naam = $arr_values[0] . '%20' . $arr_values[1] . '%20' . $arr_values[2] . '%20';
        $this->view->info_openstaandeDossiers = $this->model->get_openstaandeDossiers($param_naam);
        $this->view->statistiekPerWeek = $this->model->get_statistiekPerWeek($param_naam);
        $this->get_openstaandeDossiers_namen();
    }

    /**
     * Alle dossiers van een geselecteerde persoon en zijn dienst worden opgehaald en aan view doorgegeven.
     * 
     * @param string naam opsteller openstaand dossier + dienst
     * @return void 
     */
    function get_openstaandeDossiers_info($naam) {
        $arr_values = explode('-', $naam);
        $param_naam = $arr_values[0];
        $param_dienst = $arr_values[1];
        $this->view->info_openstaandeDossiers = $this->model->get_openstaandeDossiers_persoon_dienst($param_naam, $param_dienst);
        $this->view->statistiekPerWeek = $this->model->get_statistiekPerWeek($param_naam);
        $this->view->namen_diensten = $this->model->get_diensten();
        $this->view->namen_openstaandeDossiers = $this->model->get_openstaandeDossiers_namen_dienst($param_dienst);
        $this->view->huidige_dienst = $param_dienst;
        $this->view->render('functioneelBeheer/get_openstaandeDossiers_info');
    }

    /**
     * Alle dossiers van een geselecteerde dienst worden opgehaald en aan view doorgegeven.
     * 
     * @param string naam opsteller openstaand dossier
     * @return void 
     */
    function get_openstaandeDossiers_dienst($dienst) {
        $this->view->namen_openstaandeDossiers = $this->model->get_openstaandeDossiers_namen_dienst($dienst);
        $this->view->openstaandeDossiersStatistiek = $this->model->get_openstaandeDossiersStatistiek();
        $this->view->huidige_dienst = $dienst;
        $this->view->namen_diensten = $this->model->get_diensten();
        $this->view->render('functioneelBeheer/get_openstaandeDossiers_dienst');
    }

}

?>