<?php

class Database extends mysqli {

    private static $instance = null;

    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

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
