<?php

class AlgemeenInfo extends Controller {

    function __construct() {
        parent::__construct();

        echo 'we are in algemeen info controller<br />';
    }

    //method afwezigheidstoezicht
    function get_afwezigheidstoezicht() {
        //ToDo: datagrid met tooltip die tekst inlichtingen en commentaar bevat
        //ToDo:  extra: print functie die pdf toont of nog liever odf file

        echo 'hier moet tabel komen<br />';
        $this->view->afwezigheidslijst = $this->model->get_afwezigheidstoezicht();
        $this->view->render('algemeenInfo/get_afwezigheidstoezicht',true);
        
    }
    
    
    function get_afwezigheidInlichtingen($elementnummer) {
        echo 'we zijn in method get_afwezigheidInlichtingen in controller <br />';
        $this->view->afwezigheidInlichtingen = $this->model->get_afwezigheidInlichtingen();
        $this->view->afwezigheid_elementnummer= $elementnummer;
        $this->view->render('algemeenInfo/get_afwezigheidInlichtingen',true);
       
    }
    
    //method daderGerichteAanpak
}
