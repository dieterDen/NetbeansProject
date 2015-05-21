<?php

/**
 * De model klasse bevat de qeuries naar de database om data af te halen voor: IMEI-nummers
 * @package models
 * @version 0.0
 */
class functioneelBeheer_model extends Model {

    /**
     * De constructor roept de parent constructor op van Model
     * @return void 
     */
    function __construct() {
        //echo 'inside in functioneel_beheer model';
        parent::__construct();
    }

    /**
     * De functie haalt alle foute IMEI-nummers op voor de view get_imeiNummers.php
     * Foutboodschap bepalen van oorzaak van fout IMEI-nummer
     * 
     * @return Array[][] Tweedimensionale array van key-value waarden van imei-nummers
     */
    function get_imeiNummers() {
        
        $result = $this->db->query("SELECT Dossiernaam as 'Dossiernummer', element as 'Element', elementnummer as 'Elementnummer',IMEINummer as 'IMEI-nummer' , merk as 'Merk'  from islp.view_imeiNummers ");
        if (!$result) {
            $this->error("Check query in get_imeiNummers in klasse functioneelBeheer_model");
        }
        while ($row = $result->fetch_assoc()) {
            switch (true) {
                case preg_match('/^ *$/', $row['IMEI-nummer']): $row['opmerking'] = "IMEI-nummer: leeg.";
                    break;
                case empty($row['IMEI-nummer']): $row['opmerking'] = "IMEI-nummer: leeg.";
                    break;
                case preg_match('/[^a-zA-Z\d]/', $row['IMEI-nummer']): $row['opmerking'] = "IMEI-nummer: geen speciale characters.";
                    break;
                case preg_match('/[a-zA-Z]/', $row['IMEI-nummer']): $row['opmerking'] = "IMEI-nummer: geen letters toegelaten.";
                    break;
                case preg_match('/^[\d]+$/', $row['IMEI-nummer']): $row['opmerking'] = "IMEI-nummer: moet 14 cijfers lang zijn.";
                    break;
                case is_null($row['IMEI-nummer']): $row['opmerking'] = "IMEI-NUMMER: leeg.";
                    break;
                default : $row['opmerking'] = "OK";
            }
            switch (true) {
                case empty($row['Merk']): $row['opmerkingMerk'] = "Merknaam: leeg.";
                    break;
                case is_null($row['Merk']): $row['opmerkingMerk'] = "Merknaam: leeg.";
                    break;
                case preg_match('/[^a-zA-Z\d]/', $row['Merk']):$row['opmerkingMerk'] = "Merknaam: ongeldig";
                    break;
                case preg_match('/^[\d]*$/', $row['Merk']):$row['opmerkingMerk'] = "Merknaam: ongeldig";
                    break;
                default : $row['opmerkingMerk'] = "Merknaam OK ";
            }

            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * De functie haalt alle namen op van personen die openstaande dossiers hebben.
     * De gegevens worden opgehaald van de view openstaande_dossiers_hitparade.
     * 
     * @return Array[][] Tweedimensionale array van key-value waarden van imei-nummers
     */
    function get_openstaandeDossiers_namen() {
        $result = $this->db->query("SELECT * from islp.view_openstaande_dossiers_hitparade order by opsteller ");
        if (!$result) {
            $this->error("Check query in get_openstaandeDossiers in klasse functioneelBeheer_model");
        }
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    /**
     * De functie haalt alle dossiers van een persoon op adhv naam.
     * Om problemen met speciale karakters  in namen te vermijden ->  urldecode
     *
     * @param string naam opsteller openstaand dossier
     * @return Array[][] Tweedimensionale array van key-value waarden van imei-nummers
     */
    function get_openstaandeDossiers($naam) {
        $naam = urldecode($naam);
        $result = $this->db->query("SELECT * FROM islp.view_openstaande_dossiers WHERE lower(opsteller) = \"" . strtolower($naam) . "\"");
        if (!$result) {
            $this->error("Check query in get_openstaandeDossiers(naam) in klasse functioneelBeheer_model");
        }
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * De functie haalt uit de view_openstaande_dossiersPerWeek de opsteller en aantal weken vertraging per type dossier
     *
     * @param string naam opsteller openstaand dossier
     * @return Array[][] Tweedimensionale array van key-value waarden van imei-nummers
     */
    function get_statistiekPerWeek($naam) {
        $naam = urldecode($naam);
        $result = $this->db->query("SELECT * FROM islp.view_openstaande_dossiersPerWeek WHERE lower(opsteller) = \"" . strtolower($naam) . "\"");
        if (!$result) {
            $this->error("Check query in get_statistiekPerWeek in klasse functioneelBeheer_model");
        }
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * De functie haalt uit de view_statOpenstaandeDossiers
     * @return Array[][] Tweedimensionale array met gegevens van 3 jaar
     */
    function get_openstaandeDossiersStatistiek() {
        $jaren = $this->db->query("select distinct year from view_statOpenstaandeDossiers");
        if (!$jaren) {
            $this->error("Check query in get_openstaandeDossiersStatistiek in klasse functioneelBeheer_model");
        }
        while ($row = $jaren->fetch_assoc()) {
            $rows[] = $row;
        }
        foreach ($rows as $var) {
            if (date("Y") == $var[year]) {
                $huidig_jaar = $var[year];
            } else {
                $huidig_jaar = date("Y");
            }
        }
        $vorig_jaar = $huidig_jaar - 1;
        $twee_jaar = $huidig_jaar - 2;

        $result = $this->db->query("select * from view_statOpenstaandeDossiers");
        if (!$result) {
            $this->error("Check query in get_openstaandeDossiersStatistiek in klasse functioneelBeheer_model");
        }
        $associativeArray = array(
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
            $associativeArray[$row['year']][$row['month']] = $row['aantalDossiers'];
        }
        return array($huidig_jaar, $vorig_jaar, $twee_jaar, $associativeArray);
    }

    function error($message) {
        require 'controllers/error.php';
        $controller = new Error();
        $controller->index('Er is een database probleem opgetreden. Gelieve contact op te nemen met de systeembeheerder.', $message);
        return false;
    }

}
