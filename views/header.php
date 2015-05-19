<?php
/**
 * Klasse toont de header van de hoofdpagina
 * @package views
 * @version 0.0
 */
include_once ("languages/ned_language.php");

function breadcrumbs($separator = ' > ', $home = 'Homepagina') {

    $path = array_filter(explode('/', $_SERVER['REQUEST_URI']));
    $base_url = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    $breadcrumbs = array('' . $home . '');

    $last = end(array_keys($path));

    foreach ($path as $x => $crumb) {
        $title = ucwords(str_replace(array('.php', '_', '-', 'get'), array('', ' ', ' ', ' '), $crumb));
        if ($x != $last) {
            $breadcrumbs[] = '' . $title . '';
        } else {
            $breadcrumbs[] = '' . $title . '';
        }
    }
    $breadcrumbs = array_slice($breadcrumbs, 0, 3);
    return implode($separator, $breadcrumbs);
}
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
            <a href="<?php echo URL; ?>"><img src="/pictures/pol_logo.png" style="width: 20%;padding-left: 10px;"></a>
            <br>

            <br />
            <a href="<?php echo URL; ?>index">Index</a>
            <a href="<?php echo URL; ?>help">Help</a>
            <a href="<?php echo URL; ?>login">Login</a>
            <br /><br />
            <?php
            $breadcrumbs = array_slice(explode('>', breadcrumbs()), 0, 3);
            echo '
            <a style="color:white" href="' . URL . '" rel="external">' . $breadcrumbs[0] . '></a>'. $breadcrumbs[1] . '>' . $breadcrumbs[2];
            ?>
        </div>
        <div id="content">



