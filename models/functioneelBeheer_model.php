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
     * 
     * @return Array[][] Tweedimensionale array van key-value waarden van imei-nummers
     */
    function get_imeiNummers() {
        //echo'inside model functioneel beheer';
        $result = $this->db->query("SELECT Dossiernaam as 'Dossiernummer', element as 'Element', elementnummer as 'Elementnummer',IMEINummer as 'IMEI-nummer' , merk as 'Merk'  from islp.view_imeiNummers ");
        $row = $result->fetch_assoc();
        if(preg_match("[$&+,:;=?@#|'<>.^*()%!-]",$row['IMEI-nummer'])){
        $row['opmerking'] = "Geen IMEI-nummer opgegeven";}
        else {
          $row['opmerking'] = "Geen IMEI";
                 }
        print_r($ro);
        while ($row = $result->fetch_assoc()) {
            switch (true) {
                case preg_match("[^a-zA-Z$]{+}",$row['IMEI-nummer']): $row['opmerking'] = "Geen speciale characters toegelaten";
                case preg_match("[^a-zA-Z$]{}",$row['IMEI-nummer']): $row['opmerking'] = "Geen speciale characters toegelaten";
                case empty($row['IMEI-nummer']): $row['opmerking'] = "Geen IMEI-nummer opgegeven, empty";
                    break;
                case is_null($row['IMEI-nummer']): $row['opmerking'] = "Geen IMEI-nummer opgegeven";
                    break;
                default : $row['opmerking'] = "OK";
            }

            switch (true) {
                case empty($row['Merk']): $row['opmerkingMerk'] = "Geen merknaam ingevuld";
                case is_null($row['Merk']): $row['opmerkingMerk'] = "Geen merknaam ingevuld";
            }

            $rows[] = $row;
        }
        print_r($rows);
        return $rows;
    }

}
