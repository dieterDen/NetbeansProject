<?php

/**
 * Deze klasse is de parent klasse van alle views in package: views
 * 
 * @package libs
 * @version 0.0
 * @since 2015-03-24
 */
class View {
/**
 * constructor dient enkel voor testing
 */
    function __construct() {
        //echo 'this is the view<br />';
        
    }
/**
 * functie render roept de passende view van de actie method in een controller. Deze functie wordt opgeroepen door de controller
 * @param string $name naam van de actie method in controller
 * @param boolean $noInclude bepaalt of header en footer view toegevoegd moeten worden aan view die gerenderd wordt
 * @return void
 */
    public function render($name,$noInclude=false) {
        if($noInclude == true)
        {
        require 'views/' .$name . '.php';    
        }
        else {
        require 'views/header.php';
        require 'views/' .$name . '.php';
        require 'views/footer.php';
        }
    }
}
