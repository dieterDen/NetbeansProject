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

    //method daderGerichteAanpak
}
