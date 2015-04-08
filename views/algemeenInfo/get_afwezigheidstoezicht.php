<?php
/**
 * De klasse is de view voor alle info te tonen van afwezigheidstoezicht. 
 * De data wordt getoond in een modified easyUI datagrid
 * @package views
 * @subpackage algemeenInfo
 * @version 0.0
 */
include_once ("languages/ned_get_afwezigheidstoezicht.php");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Afwezigheidstoezicht</title>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/demo/demo.css">
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.min.js"></script>
        <script type="text/javascript">
            var popup = null;
            var createPopup = function (param) {
                var elementnummer = $(param).parents("tr").find(">:first-child").text();
                if (popup && !popup.closed) {
                    popup = open("<?php echo URL; ?>algemeenInfo/get_afwezigheidInlichtingen/" + elementnummer, "Popup", "top=500,width=1000,height=300");
                    popup.focus();
                } else {
                    popup = open("<?php echo URL; ?>algemeenInfo/get_afwezigheidInlichtingen/" + elementnummer, "Popup", "top=500,width=1000,height=300");
s                }
            };
        </script>
    </head>
    <body>
        <div id="header">
            <a href="<?php echo URL; ?>index">Index</a>
            <a href="<?php echo URL; ?>help">Help</a>
            <a href="<?php echo URL; ?>login">Login</a>
        </div>

        <div id="content"> 
            <div style="margin:20px 0;"></div>
            <table class="easyui-datagrid" title="Afwezigheidstoezicht" width="98%" style="width:98%"
                   data-options="singleSelect:true,collapsible:true">
                <thead>
                    <tr>
                        <th data-options="field:'elementnummer',width:100"><?php echo $lang['elementnummer']; ?></th>
                        <th data-options="field:'bewNaam',width:100"><?php echo $lang['bewoner naam']; ?></th>
                        <th data-options="field:'bewVoornaam',width:120"><?php echo $lang['bewoner voornaam']; ?></th>
                        <th data-options="field:'adres',width:500"><?php echo $lang['adres']; ?></th>
                        <th data-options="field:'inlichtingen',width:550"><?php echo $lang['afwezigheids inlichtingen']; ?></th>
                        <th data-options="field:'begDatum',width:100"><?php echo $lang['begindatum']; ?></th>
                        <th data-options="field:'bezocht',width:70, align:'center'"><?php echo $lang['bezocht']; ?></th>
                        <th data-options="field:'dagGeleden',width:95, align:'center'"><?php echo $lang['dagen geleden']; ?></th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                    foreach ($this->afwezigheidslijst as $row) {
                        echo '<tr><td>' . $row['elementnummer'] . '</td>'
                        . '<td>' . $row['bewoner naam'] . '</td>'
                        . '<td>' . $row['bewoner voornaam'] . '</td>'
                        . '<td>' . $row['adres'] . '</td>'
                        . '<td><a href="#" id="divPopup" onclick="createPopup(this);">' . substr($row['details en commentaar'], 0, 60) . '...</a></td>'
                        . '<td>' . $row['begindatum'] . '</td>'
                        . '<td>' . $row['bezocht'] . '</td>'
                        . '<td>' . $row['dagen geleden'] . '</td>'
                        . '</tr>';
                    }
                    ?>
                </tbody>
            </table>

        </div> 
        <?php
        require 'views/footer.php';
        ?>

