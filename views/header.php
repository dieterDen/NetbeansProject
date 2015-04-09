<?php
/**
 * Klasse toont de header van de hoofdpagina
 * @package views
 * @version 0.0
 */
include_once ("languages/ned_language.php");
?>
<!doctype html>
<html>
    <head>
        <title>Test</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/demo/demo.css">

        <script type="text/javascript" src="<?php echo URL; ?>public/js/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.min.js"></script>


    </head>
    <body>

        <div id="header">
            <img src="/pictures/pol_logo.png" style="width: 20%;padding-left: 10px;">
            <br>

            <br />
            <a href="<?php echo URL; ?>index">Index</a>
            <a href="<?php echo URL; ?>help">Help</a>
            <a href="<?php echo URL; ?>login">Login</a>
        </div>
        <div id="content">



