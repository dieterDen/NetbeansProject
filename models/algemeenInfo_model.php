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
    }

}
