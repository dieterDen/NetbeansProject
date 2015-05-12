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
     * De functie haalt alle algemene info op voor afwezigheidstoezicht voor de view get_afwezigheidstoezicht
     * @return Array[][] Tweedimensionale array van key-value waarden van info van afwezigheidstoezicht
     */
    function get_afwezigheidstoezicht() {
        $result = $this->db->query("SELECT afwezigheidstoezicht_elementnummer as 'elementnummer', afwezigheidstoezicht_naam as 'bewoner naam', afwezigheidstoezicht_voornaam as 'bewoner voornaam', afwezigheidstoezicht_adres as 'adres', replace(afwezigheidstoezichttekst_tekst,'@@',';') as 'details en commentaar', afwezigheidstoezicht_elementbegindatum as 'begindatum', afwezigheidstoezicht_elementeinddatum as 'einddatum', bezocht as 'bezocht', `dagen geleden`, afwezigheidstoezicht_wijk FROM islp.view_afwezigheidstoezicht");
        if (!$result) {
            $this->error("Check query in get_afwezigheidstoezicht in klasse algemeenInfo_model");
        } while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    function get_afwezigheidstoezichtTeam($team = "") {
        $result = $this->db->query("SELECT afwezigheidstoezicht_elementnummer as 'elementnummer', afwezigheidstoezicht_naam as 'bewoner naam', afwezigheidstoezicht_voornaam as 'bewoner voornaam', afwezigheidstoezicht_adres as 'adres', replace(afwezigheidstoezichttekst_tekst,'@@',';') as 'details en commentaar', afwezigheidstoezicht_elementbegindatum as 'begindatum', afwezigheidstoezicht_elementeinddatum as 'einddatum', bezocht as 'bezocht', `dagen geleden`, afwezigheidstoezicht_wijk FROM islp.view_afwezigheidstoezicht WHERE  lower(afwezigheidstoezicht_wijk) = '$team'");
        if (!$result) {
            $this->error("Check query in get_afwezigheidstoezicht in klasse algemeenInfo_model");
        }
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    function get_afwezigheidstoezichtFoutiefTeam() {
        $result = $this->db->query("SELECT afwezigheidstoezicht_elementnummer as 'elementnummer', afwezigheidstoezicht_naam as 'bewoner naam', afwezigheidstoezicht_voornaam as 'bewoner voornaam', afwezigheidstoezicht_adres as 'adres', replace(afwezigheidstoezichttekst_tekst,'@@',';') as 'details en commentaar', afwezigheidstoezicht_elementbegindatum as 'begindatum', afwezigheidstoezicht_elementeinddatum as 'einddatum', bezocht as 'bezocht', `dagen geleden`, afwezigheidstoezicht_wijk FROM islp.view_afwezigheidstoezicht WHERE  lower(afwezigheidstoezicht_wijk) not in ('team oost','team west','team lierde','team centrum')");
        if (!$result) {
            $this->error("Check query in get_afwezigheidstoezicht in klasse algemeenInfo_model");
        }
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * De functie haalt alle statistieken op uit de view_statAfwezigheidstoezicht
     * @return Array[][] array met gegevens van 3 jaar 
     */
    function get_afwezigheidstoezichtStatistiek() {
        $jaren = $this->db->query("select distinct jaar from view_statAfwezigheidstoezicht");
        if (!$jaren) {
            $this->error("Check query in get_afwezigheidstoezichtStatistiek in klasse algemeenInfo_model");
        } while ($row = $jaren->fetch_assoc()) {
            $rows[] = $row;
        }
        foreach ($rows as $var) {
            if (date("Y") == $var[jaar]) {
                $huidig_jaar = $var[jaar];
            } else {
                $huidig_jaar = date("Y");
            }
        }
        $vorig_jaar = $huidig_jaar - 1;
        $twee_jaar = $huidig_jaar - 2;


        $result = $this->db->query("select * from view_statAfwezigheidstoezicht");
        if (!$result) {
            $this->error("Check query in get_afwezigheidstoezichtStatistiek in klasse algemeenInfo_model");
        } $associativeArray = array(
            $twee_jaar => array(
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
                6 => 0,
                7 => 0,
                8 => 0,
                9 => 0,
                10 => 0,
                11 => 0,
                12 => 0),
            $vorig_jaar => array(
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
                6 => 0,
                7 => 0,
                8 => 0,
                9 => 0,
                10 => 0,
                11 => 0,
                12 => 0),
            $huidig_jaar => array(
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
                6 => 0,
                7 => 0,
                8 => 0,
                9 => 0,
                10 => 0,
                11 => 0,
                12 => 0)
        );
        while ($row = mysqli_fetch_array($result)) {
            $associativeArray[$row['jaar']][$row['maand']] = $row['aantal'];
        }
        return array($huidig_jaar, $vorig_jaar, $twee_jaar, $associativeArray);
    }

    /**
     * De functie haalt de inlinchtingen op van een afwezigheid via de bijhorende elementnummer
     * @param string elemetnummer van afwezigheid
     * @return Array[][] Tweedimensionale array van key-value waarden van inlichtingen van afwezigheidstoezicht
     */
    function get_afwezigheidInlichtingen($elementnummer) {
        $result = $this->db->query('SELECT afwezigheidstoezichttekst_tekst FROM islp.view_afwezigheidstoezichtTekst where lower(afwezigheidstoezichttekst_aardtekst) = "inlichtingen" and afwezigheidstoezichttekst_elementnummer like ' . $elementnummer);
        if (!$result) {
            $this->error("Check query in get_afwezigheidInlichtingen in klasse algemeenInfo_model");
        } while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * De functie haalt de verschillende wijken op waarvoor er een afwezigheidstoezicht bestaat 
     * @return Array[][] Tweedimensionale array van key-value waarden van wijken van view_afwezigheidstoezicht
     */
    function get_wijken() {
        $result = $this->db->query("SELECT DISTINCT afwezigheidstoezicht_wijk from view_afwezigheidstoezicht where lower(afwezigheidstoezicht_wijk) in ('team oost','team west','team lierde','team centrum')");
        if (!$result) {
            $this->error("Check query in get_wijken in klasse algemeenInfo_model");
        } while ($row = $result->fetch_assoc()) {
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
        $result = $this->db->query('SELECT * FROM islp.view_afwezigheidstoezichtTekst where lower(afwezigheidstoezichttekst_aardtekst) = "commentaar" and afwezigheidstoezichttekst_elementnummer like ' . $elementnummer);
        if (!$result) {
            $this->error("Check query in get_afwezigheidCommentaren in klasse algemeenInfo_model");
        } while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * De functie haalt de commentaren op van een afwezigheid via de bijhorende elementnummer
     * @param string elementnummer van afwezigheid
     * @return Tweedimensionale array van key-value waarden van commentaren van afwezigheidstoezicht
     */
    function get_allCommentaren() {
        $result = $this->db->query('SELECT afwezigheidstoezichttekst_elementnummer, afwezigheidstoezichttekst_tekst, afwezigheidstoezichttekst_tekstcreatiedatumtijd as "datum"  FROM islp.view_afwezigheidstoezichtTekst where lower(afwezigheidstoezichttekst_aardtekst) = "commentaar"');
        if (!$result) {
            $this->error("Check query in get_allCommentaren in klasse algemeenInfo_model");
        } while ($row = $result->fetch_assoc()) {
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

    /**
     * Deze functie gaat foutboodschap tonen aan gebruiker indien pagina niet geladen kan worden
     * 
     * @return void
     * @since 2015-03-24
     */
    function error($message) {
        require 'controllers/error.php';
        $controller = new Error();
        $controller->index('Er is een database probleem opgetreden. Gelieve contact op te nemen met de systeembeheerder.', $message);
        return false;
    }

}
