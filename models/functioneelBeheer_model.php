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
        while ($row = $result->fetch_assoc()) {
            switch (true) {
                case preg_match('/^ *$/', $row['IMEI-nummer']): $row['opmerking'] = "Geen spaties toegelaten.";
                    break;
                case empty($row['IMEI-nummer']): $row['opmerking'] = "Geen IMEI-nummer ingevuld";
                    break;
                case preg_match('/[^a-zA-Z\d]/', $row['IMEI-nummer']): $row['opmerking'] = "Geen speciale characters toegelaten";
                    break;
                case preg_match('/[a-zA-Z]/', $row['IMEI-nummer']): $row['opmerking'] = "Geen letters toegelaten.";
                    break;
                case preg_match('/^[\d]+$/', $row['IMEI-nummer']): $row['opmerking'] = "IMEI-nummer moet 14 cijfers lang zijn.";
                    break;
                case is_null($row['IMEI-nummer']): $row['opmerking'] = "Geen IMEI-nummer ingevuld";
                    break;
                default : $row['opmerking'] = "OK";
            }
            switch (true) {
                case empty($row['Merk']): $row['opmerkingMerk'] = "Geen merknaam ingevuld";
                    break;
                case is_null($row['Merk']): $row['opmerkingMerk'] = "Geen merknaam ingevuld";
                    break;
                case preg_match('/[^a-zA-Z\d]/', $row['Merk']):$row['opmerkingMerk'] = "Geen geldige merknaam";
                    break;
                case preg_match('/^[\d]*$/', $row['Merk']):$row['opmerkingMerk'] = "Geen geldige merknaam";
                    break;
            }

            $rows[] = $row;
        }
        //print_r($rows);
        return $rows;
    }

}
