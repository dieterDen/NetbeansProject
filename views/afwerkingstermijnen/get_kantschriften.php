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
        <?php if (is_null($this->kantschriften)) : ?>
            <p><b>Er is geen data beschikbaar om weer te geven!</b></p>
        <?php else : ?>
            <table id="tt" class="easyui-datagrid" style="width:99%" 
                   title="Kantschriften" data-options="singleSelect:true,collapsible:true,fitColumns:true,remoteSort:false">
                <thead>
                    <tr>
                        <th field="element" sortable="true" auto="true" align="center"><?php echo $lang['nummer']; ?></th>
                        <th field="datum" sortable="true" width="80" align="center"><?php echo $lang['datum']; ?></th>
                        <th field="datum2" sortable="true" width="140" align="center"><?php echo $lang['notitie']; ?></th>
                        <th field="nummer" sortable="true" width="350" align="left"><?php echo $lang['onderwerp']; ?></th>
                        <th field="uitvoerder" sortable="true" auto="true" align="left"><?php echo $lang['uitvoerder']; ?></th>
                        <th field="magistraat" sortable="true" auto="true" align="left"><?php echo $lang['magistraat']; ?></th>
                        <th field="gerechtelijk" sortable="true" auto="true" align="left"><?php echo $lang['gerechtelijk']; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->kantschriften as $row) {
                        $datum_ks = strtotime($row['datum']);
                        $datediff = floor((time() - $datum_ks) / (60 * 60 * 24));
                        if ($datediff < 45) {
                            echo '<tr><td>' . $row['kantschrift_elementnummer'] . '</td>'
                            . '<td>' . $row['kantschrift_creatiedatum'] . '</td>'
                            . '<td>' . $row['kantschrift_notitienummer'] . '</td>'
                            . '<td>' . $row['kantschrift_onderwerp'] . '</td>'
                            . '<td>' . $row['uitvoerder'] . '</td>'
                            . '<td>' . $row['kantschrift_magistraat'] . '</td>'
                            . '<td>' . $row['kantschrift_gerechtelijk_arro'] . '</td>'
                            . '</tr>';
                        } else {
                            echo '<tr><td><font style="color: red">' . $row['kantschrift_elementnummer'] . '</font></td>'
                            . '<td><font style="color: red">' . $row['kantschrift_creatiedatum'] . '</font></td>'
                            . '<td><font style="color: red">' . $row['kantschrift_notitienummer'] . '</font></td>'
                            . '<td><font style="color: red">' . $row['kantschrift_onderwerp'] . '</font></td>'
                            . '<td><font style="color: red">' . $row['uitvoerder'] . '</font></td>'
                            . '<td><font style="color: red">' . $row['kantschrift_magistraat'] . '</font></td>'
                            . '<td><font style="color: red">' . $row['kantschrift_gerechtelijk_arro'] . '</font></td>'
                            . '</tr>';
                        }
                    }
                    ?> 
                </tbody>
            </table>
        <?php endif; ?>      
    </body>
</html>

