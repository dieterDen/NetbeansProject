<?php
/**
 * Database klasse bevat de connectie naar de database 
 * Klasse maakt gebruikt van mysqli
 * @package libs
 * @version 0.0
 */
class Database extends mysqli {
/**
 * instantie van Database die gebruikt wordt door Model
 * @var Database
 */
    private static $instance = null;
/**
 * geeft instantie terug van Database
 * @param void
 * @return Database
 */
    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }
/**
 * in constructor wordt connectie met de database geïnitialiseerd. Indien connectie faalt wordt dit gelogd.
 * @return void 
 */
    private function __construct() {
        parent::__construct(DB_HOST, USER, PASS, DB_NAME);
        if (mysqli_connect_error()) {
            $log = KLogger::getInstance();
            $log->LogDebug("Connectie met de database faalt");
            exit('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
        parent::set_charset('utf-8');
    }

}
