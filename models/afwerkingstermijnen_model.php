<?php

/**
 * De model klasse bevat de queries naar de database om data af te halen van afwerkingstermijnen
 * @package models
 * @version 0.0  
 */
class afwerkingstermijnen_model extends Model {

    /**
     * De constructor roept de parent constructor van Model op.
     * @return void
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * De functie haalt alle algemene info op voor gerechtelijk niet-verkeer en verkeersongeval voor de view get_GF_VO
     * @return Array[][] Tweedimensionale array van key-value waarden van info van gerechtelijk niet-verkeer en verkeersongeval
     * rekening houden met opsteller dit eventueel nog aanpassen met join in db!
     */
    function get_gerechtelijkeFeiten() {
        $result = $this->db->query("SELECT * FROM islp.view_gerechtelijkNietVerkeer");
        if (!$result) {
            $this->error("Check query in get_afwezigheidstoezicht in klasse algemeenInfo_model");
        }
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    function get_kantschriften() {
        $result = $this->db->query("SELECT * FROM islp.view_kantschriften");
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    function get_woonstveranderingen() {
        echo 'inside model woonstveranderingen';
        /* $result->$this->db->query("SELECT * FROM islp.view_afwerkingstermijnen");
          while($row=$result->fetch_assoc()){
          $rows[]=$row;
          }
          return $rows; */
    }

    function get_hercosi() {
        echo 'inside model get_hercosi';
        /*   $result->$this->db->query("SELECT * FROM islp.view_afwerkingstermijnen");
          while($row=$result->fetch_assoc()){
          $rows[]=$row;
          }
          return $rows; */
    }

    function error($message) {
        require 'controllers/error.php';
        $controller = new Error();
        $controller->index('Er is een database probleem opgetreden. Gelieve contact op te nemen met de systeembeheerder.', $message);
        return false;
    }

}
