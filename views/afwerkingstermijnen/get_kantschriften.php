<?php
/**
 * De klasse toont view voor kantschriften ouder dan 30 dagen
 * De gegevens worden getoond in een easyUI datagrid
 * @package views
 * @subpackage afwerkingstermijnen
 * @version 0.0
 */ 
include_once ("languages/ned_get_kantschriften.php");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="easyui help you build your web page easily!">
        <title>Kantschriften ouder > 30</title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyui/themes/icon.css">
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/easyui/jquery.easyui.min.js"></script>
    </head>
    <body>
        <div style="margin-bottom:20px">
            <p> Denk aan de termijn van 30 dagen! &nbsp;<font style="color:red">[ >45 dagen in rode kleur]</font><br /> 
                Een snelle afwerking zorgt ervoor dat je niet op deze lijst voorkomt!</p>
        </div>
        <table id="tt" class="easyui-datagrid" style="width:99%" 
               title="Kantschriften ouder dan 30 dagen" data-options="singleSelect:true,collapsible:true,fitColumns:true">
            <thead>
                <tr>
                    <th field="element" auto="true" align="center"><?php echo $lang['nummer']; ?></th>
                    <th field="datum" width="80" align="center"><?php echo $lang['datum']; ?></th>
                    <th field="nummer" width="350" align="center"><?php echo $lang['onderwerp']; ?></th>
                    <th field="feit" auto="true" align="center"><?php echo $lang['uitvoerder']; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->kantschriften as $row) {
                    $datum_ks = strtotime($row['datum']);
                    $datediff = floor((time() - $datum_ks) / (60 * 60 * 24));
                    if ($datediff < 45) {
                        echo '<tr><td>' . $row['nummer'] . '</td>'
                        . '<td>' . $row['datum'] . '</td>'
                        . '<td>' . $row['onderwerp - betrokkene'] . '</td>'
                        . '<td>' . $row['uitvoerder'] . '</td>'
                        . '</tr>';
                    } else {
                        echo '<tr><td><font style="color: red">' . $row['nummer'] . '</font></td>'
                        . '<td><font style="color: red">' . $row['datum'] . '</font></td>'
                        . '<td><font style="color: red">' . $row['onderwerp - betrokkene'] . '</font></td>'
                        . '<td><font style="color: red">' . $row['uitvoerder'] . '</font></td>'
                        . '</tr>';
                    }
                }
                ?> 
            </tbody>
        </table>
    </body>
</html>

