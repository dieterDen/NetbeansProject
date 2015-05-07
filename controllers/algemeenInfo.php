<?php

/**
 * Bevat alle actie methods van controller AlgemeenInfo. Deze klasse zal alles delegeren wat met het item algemeen info te maken heeft.
 * @package controllers
 * @version 0.0
 */
class AlgemeenInfo extends Controller {

    /**
     * roept de parent constructor op van Controller
     * @return void 
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * geeft een  overzicht van alle afwezigheden.
     * Date voor statistieken wordt ook meegegeven aan view.
     * @return void
     */
    function get_afwezigheidstoezicht() {
        $this->view->afwezigheidslijst = $this->model->get_afwezigheidstoezicht();
        $this->view->statistiek_afwezigheid = $this->model->get_afwezigheidstoezichtStatistiek();
        $this->view->render('algemeenInfo/get_afwezigheidstoezicht', true);
    }

    /**
     * Geeft een overzicht van commentaren per afwezigheid die geselecteerd is.
     * Aan de view worden de commentaren meegegeven
     * @param string $elementnummer elementnummer van de geselecteerde afwezigheid
     * @return void 
     */
    function get_afwezigheidCommentaren($elementnummer) {
        $this->view->afwezigheidCommentaren = $this->model->get_afwezigheidCommentaren($elementnummer);
    }

    /**
     * Geeft een overzicht inlictingen per afwezigheid die geselecteerd is.
     * Aan de view worden de commentaren en inlichtingen meegegeven.
     * Tot slot wordt de view gerenderd 
     * @param string $elementnummer elementnummer van de geselecteerde afwezigheid
     * @return void
     */
    function get_afwezigheidInlichtingen($elementnummer) {
        //echo 'we zijn in method get_afwezigheidInlichtingen in controller <br />'.$elementnummer;
        $this->view->afwezigheidInlichtingen = $this->model->get_afwezigheidInlichtingen($elementnummer);
        $this->view->afwezigheid_elementnummer = $elementnummer;
        $this->get_afwezigheidCommentaren($elementnummer);
        $this->view->render('algemeenInfo/get_afwezigheidInlichtingen', true);
    }

    /**
     * De functie haalt alle info van alle bestaande afwezigheden op. 
     * Deze info wordt doorgegeven aan de view die instaat voor het genereren van .odf file.
     * 
     * @return void
     */
    function print_overzichtAfwezigheden() {
        $this->view->overzichtAfwezigheden = $this->model->get_afwezigheidstoezicht();
        $this->view->overzichtCommentaren = $this->model->get_allCommentaren();
        //$this->view->overzichtCommentaren = $this->model->get_afwezigheidCommentaren();
        // print_r($this->view->overzichtAfwezigheden);
        $this->view->render('algemeenInfo/print_overzichtAfwezigheden', true);
    }

    /**
     * Haalt de commentaren op adhv elementnummer om brief te generen.
     * Aan de view worden de commentaren meegeven
     * Tot slot wordt de view gerenderd 
     * @param string $elementnummer elementnummer van de geselecteerde afwezigheid
     * @return void
     */
    function print_briefAfwezigheden($elementnummer) {
        //echo $elementnummer;
        $this->view->overzichtCommentaren = $this->model->get_afwezigheidCommentaren($elementnummer);
        $this->view->gegevens_afwezigheid = $this->model->get_afwezigheidstoezicht();
        $this->view->elementnummer = $elementnummer;
        // print_r($this->view->overzichtCommentaren);
        $this->view->render('algemeenInfo/print_briefAfwezigheden', true);
    }

    /**
     * toont een overzicht van alle 5min briefingen.
     * Bijpassende view wordt gerenderd
     * @return void 
     * 
     */
    function get_briefing() {
        $this->view->render('algemeenInfo/get_briefing');
    }

    /**
     * roept bijpassende view op om uploaden van pdf's uit te voeren.
     */
    function get_briefingPDF() {
        $this->view->render('algemeenInfo/get_briefingPDF');
    }

    /**
     * roept bijpassende view op om delete briefing te verzorgen.
     * @param string $filename naam van pdf file om te verwijderen
     * @return void
     */
    function delete_briefing($filename) {
        $this->view->filename = $filename;
        $this->view->render('algemeenInfo/delete_briefing');
    }

    /**
     * Functie roept model op om alle items van dader gerichte aanpak op te halen.
     * 
     * 
     * @return void
     */
    function get_daderGerichteAanpak() {
        echo 'inside controller algemeenInfo dadergerichteAanpak';
        $this->view->render('algemeenInfo/get_daderGerichteAanpak');
    }

    /**
     * dader gerichte aanpak 1 item
     * 
     * @return void
     */
    function get_daderGerichteAanpakNaam($naam) {
        echo'inside controller algemeenInfo dadergerichteAanpak';
        //$this->view->render('algemeenInfo/get_daderGerichteAanpak');
        $this->get_daderGerichteAanpak();
    }

    /**
     * controller actie voor GF gisteren en vandaag.
     * 
     * 
     * @return void
     */
    function get_gerechtelijkeFeiten() {
        echo 'inside controller functie get_gerechtelijkeFeiten';
        $this->view->render('algemeenInfo/get_gerechtelijkeFeiten');
    }

}
