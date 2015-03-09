<?php

class algemeenInfo_model extends Model {

    function __construct() {
        echo 'we are in algemeenInfo_model';
        parent::__construct();
    }

    function get_afwezigheidstoezicht() {
        echo 'inside function get_afwezigheidsToezicht';
        //query uitvoeren op view
        //$result=$this->db->query("select * from islp.view_afwezigheid");
        //return $result->fetch_assoc();

        $result = $this->db->query("SELECT afwezigheidstoezicht_elementnummer as 'elementnummer', afwezigheidstoezichttekst_tekst as 'afwezigheids inlichtingen',afwezigheidstoezicht_naam as 'bewoner naam',afwezigheidstoezicht_voornaam as 'bewoner voornaam', afwezigheidstoezicht_elementbegindatum as 'begindatum' FROM islp.view_afwezigheidstoezichtTekst");
        return $result->fetch_assoc();
    }

}
