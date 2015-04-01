<?php
/**
 * Dit is de parent class van alle models in package models
 * Model wordt voorzien van een instantie van Database klasse
 * @package libs
 * @example ../index.php 
 * @version 0.0
 * @since 2015-03-24
 */
class Model {
/**
 * Constructor gaat een instantie van de Database klasse aan Model binden
 * 
 * @return void 
 * @since 2015-03-24
 */
    function __construct() {
       // $this->db=new Database();
        $this->db=Database::getInstance();
    }

}