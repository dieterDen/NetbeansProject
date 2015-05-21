<?php
/**
 * De klasse toont view voor IMEI-nummers
 * De gegevens van IMEI-nummers worden getoond in een easyUI datagrid
 * @package views
 * @subpackage functioneelBeheer
 * @version 0.0
 */
include_once ("languages/ned_get_imeiNummers.php");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="easyui help you build your web page easily!">
        <title>IMEI</title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyui/themes/icon.css">
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/easyui/jquery.easyui.min.js"></script>
    </head>
    <body>
        <div style="margin-bottom:20px">
        </div>
        <?php if (is_null($this->imeiNummers)) : ?>
            <p><b>Er is geen data beschikbaar om weer te geven!</b></p>
        <?php else : ?>
            <table id="tt" class="easyui-datagrid" style="width:99%" 
                   title="IMEI-nummer" data-options="singleSelect:true,collapsible:true,fitColumns:true, remoteSort:false">
                <thead>
                    <tr>
                        <th field="productid" sortable="true" width="350" align="center"><?php echo $lang['element']; ?></th>
                        <th field="listprice" sortable="true" auto="true" align="center"><?php echo $lang['elementnummer']; ?></th>
                        <th field="imeinummer" sortable="true" auto="true" align="center"><?php echo $lang['imeiNummer']; ?></th>
                        <th field="attr1" sortable="true" width="150" align="center"><?php echo $lang['merk']; ?></th>
                        <th field="opmerkingimei" sortable="true" width="745" align="center"><?php echo $lang['opmerkingImei']; ?></th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->imeiNummers as $row) {
                        echo '<tr>'
                        . '<td>' . $row['Element'] . '</td>'
                        . '<td>' . $row['Elementnummer'] . '</td>'
                        . '<td>' . $row['IMEI-nummer'] . '</td>'
                        . '<td>' . $row['Merk'] . '</td>'
                        . '<td><font color="red">' . $row['opmerking'] . '. ' . $row['opmerkingMerk'] . '</font></td>'
                        . '</tr>';
                    }
                    ?> 
                </tbody>
            </table>
        <?php endif; ?>   
    </body>
</html>

