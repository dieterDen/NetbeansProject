<?php

class algemeenInfo_model extends Model {

    function __construct() {
        //echo 'we are in algemeenInfo_model';
        parent::__construct();
    }

    function get_afwezigheidstoezicht() {
        $result = $this->db->query("SELECT afwezigheidstoezicht_elementnummer as 'elementnummer', afwezigheidstoezicht_naam as 'bewoner naam', afwezigheidstoezicht_voornaam as 'bewoner voornaam', afwezigheidstoezicht_adres as 'adres', afwezigheidstoezichttekst_tekst as 'details en commentaar', afwezigheidstoezicht_elementbegindatum as 'begindatum', bezocht as 'bezocht', `dagen geleden` FROM islp.view_afwezigheidstoezicht");
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        //print_r($rows);
        return $rows;
    }

    function get_afwezigheidInlichtingen($elementnummer) {
        // echo 'inside function get_afwezigheidInlichtingen in model'.$elementnummer;
        $result = $this->db->query('SELECT afwezigheidstoezichttekst_tekst FROM islp.view_afwezigheidstoezichtTekst where lower(afwezigheidstoezichttekst_aardtekst) = "inlichtingen" and afwezigheidstoezichttekst_elementnummer like ' . $elementnummer);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        //print_r($rows); 
        return $rows;
    }

    function get_afwezigheidCommentaren($elementnummer) {
        $result = $this->db->query('SELECT afwezigheidstoezichttekst_tekst FROM islp.view_afwezigheidstoezichtTekst where lower(afwezigheidstoezichttekst_aardtekst) = "commentaar" and afwezigheidstoezichttekst_elementnummer like ' . $elementnummer);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        //print_r($rows); 
        return $rows;
    }

}
