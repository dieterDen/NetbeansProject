<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //maak gebruik van een autoloader!! -> vb. SPl autoloader
        require 'libs/Bootstrap.php';
        require 'libs/Controller.php';
        require 'libs/Model.php';
        require 'libs/View.php';

        //library
        require 'libs/database.php';
        require 'config/paths.php';
        require 'config/database.php';
        require_once 'libs/klogger.php';

        $app = new Bootstrap();
        //log file -> indien nodig permissies wijzigen naar 666
      
        ?>
    </body>
</html>
