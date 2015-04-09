<?php

/**
 * De model klasse bevat de queries naar de database om data af te halen van afwezigheidstoezicht
 * @package models
 * @version 0.0  
 */
class algemeenInfo_model extends Model {

    /**
     * De constructor roept de parent constructor van Model op.
     * @return void
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * De functie haalt alle algemene info op uit voor afwezigheidstoezicht voor de view view_afwezigheidstoezicht
     * @return Array[][] Tweedimensionale array van key-value waarden van info van afwezigheidstoezicht
     */
    function get_afwezigheidstoezicht() {
        $result = $this->db->query("SELECT afwezigheidstoezicht_elementnummer as 'elementnummer', afwezigheidstoezicht_naam as 'bewoner naam', afwezigheidstoezicht_voornaam as 'bewoner voornaam', afwezigheidstoezicht_adres as 'adres', afwezigheidstoezichttekst_tekst as 'details en commentaar', afwezigheidstoezicht_elementbegindatum as 'begindatum', bezocht as 'bezocht', `dagen geleden` FROM islp.view_afwezigheidstoezicht");
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * De functie haalt de inlinchtingen op van een afwezigheid via de bijhorende elementnummer
     * @param string elemetnummer van afwezigheid
     * @return Array[][] Tweedimensionale array van key-value waarden van inlichtingen van afwezigheidstoezicht
     */
    function get_afwezigheidInlichtingen($elementnummer) {
        // echo 'inside function get_afwezigheidInlichtingen in model'.$elementnummer;
        $result = $this->db->query('SELECT afwezigheidstoezichttekst_tekst FROM islp.view_afwezigheidstoezichtTekst where lower(afwezigheidstoezichttekst_aardtekst) = "inlichtingen" and afwezigheidstoezichttekst_elementnummer like ' . $elementnummer);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * De functie haalt de commentaren op van een afwezigheid via de bijhorende elementnummer
     * @param string elementnummer van afwezigheid
     * @return Tweedimensionale array van key-value waarden van commentaren van afwezigheidstoezicht
     */
    function get_afwezigheidCommentaren($elementnummer) {
        $result = $this->db->query('SELECT afwezigheidstoezichttekst_tekst FROM islp.view_afwezigheidstoezichtTekst where lower(afwezigheidstoezichttekst_aardtekst) = "commentaar" and afwezigheidstoezichttekst_elementnummer like ' . $elementnummer);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * De functie haalt 
     * 
     * @return Tweedimensionale array van key-value waarden van commentaren van afwezigheidstoezicht
     */
    function get_daderGerichteAanpak() {
        echo 'inside daderGerichteAanpak model algemeenInfo_model';
    }
        
      /**
     * 
     * 
     * @return void
     */
      function get_gerechtelijkeFeiten() {
          echo 'inside model get_gerechtelijkeFeiten';
      }
}
