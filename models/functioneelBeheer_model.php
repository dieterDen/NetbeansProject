<?php

class functioneelBeheer_model extends Model {

    function __construct() {
        echo 'inside in functioneel_beheer model';
        parent::__construct();
    }

    function get_imeiNummers() {
        echo'inside model functioneel beheer';
        $result = $this->db->query("SELECT Dossiernaam as 'Dossiernummer', element as 'Element', elementnummer as 'Elementnummer',IMEINummer as 'IMEI-nummer' , merk as 'Merk'  from islp.view_imeiNummers ");
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        //print_r($rows);
        return $rows;
    }

}
