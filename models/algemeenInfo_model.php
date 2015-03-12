<?php

class algemeenInfo_model extends Model {

    function __construct() {
        //echo 'we are in algemeenInfo_model';
        parent::__construct();
    }

    function get_afwezigheidstoezicht() {
        echo 'inside function get_afwezigheidsToezicht';
        //query uitvoeren op view
        //$result=$this->db->query("select * from islp.view_afwezigheid");
        //return $result->fetch_assoc();

        $result = $this->db->query("SELECT afwezigheidstoezicht_elementnummer as 'elementnummer', afwezigheidstoezichttekst_tekst as 'afwezigheids inlichtingen',afwezigheidstoezicht_naam as 'bewoner naam',afwezigheidstoezicht_voornaam as 'bewoner voornaam', afwezigheidstoezicht_elementbegindatum as 'begindatum' FROM islp.view_afwezigheidstoezichtTekst");
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        //print_r($rows);
        return $rows;
    }

    function get_afwezigheidInlichtingen($elementnummer) {
       // echo 'inside function get_afwezigheidInlichtingen in model'.$elementnummer;
        $result = $this->db->query('SELECT afwezigheidstoezichttekst_tekst FROM islp.view_afwezigheidstoezichtTekst where lower(afwezigheidstoezichttekst_aardtekst) = "inlichtingen" and afwezigheidstoezichttekst_elementnummer like '. $elementnummer);
       
        while($row =$result->fetch_assoc()) {
            $rows[]=$row;
        }
         //print_r($rows); 
        
        return $rows;
        
    }
    
    //function get_afwezigheidCommentaren($elementnummer) {
    
    
}
