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
     */
    function get_GF_GO() {
        echo 'inside model afwerkingstermijnen';
    }

}
