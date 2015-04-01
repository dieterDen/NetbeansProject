<?php
/**
 * De klasse toont view voor IMEI-nummers
 * De gegevens van IMEI-nummers worden getoond in een easyUI datagrid
 * @package views
 * @subpackage functioneelBeheer
 * @version 0.0
 */
include_once ("languages/ned_get_imeiNummers.php"); ?>
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
        <table id="tt" class="easyui-datagrid" style="width:98%" width="98%"
               title="IMEI-nummer" data-options="singleSelect:true,collapsible:true">
            <thead>
                <tr>
                    <th field="itemid" width="80" align="center"><?php echo $lang['dossiernummer']; ?></th>
                    <th field="productid" width="350" align="center"><?php echo $lang['element']; ?></th>
                    <th field="listprice" width="140" align="center"><?php echo $lang['elementnummer']; ?></th>
                    <th field="imeinummer" width="120" align="center"><?php echo $lang['imeiNummer']; ?></th>
                    <th field="opmerkingimei" width="400" align="center"><?php echo $lang['opmerkingImei']; ?></th>
                    <th field="attr1" width="150" align="center"><?php echo $lang['merk']; ?></th>
                    <th field="opmerkingMerk" width="400" align="center"><?php echo $lang['OpmerkingMerk']; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->imeiNummers as $row) {
                    echo '<tr><td>' . $row['Dossiernummer'] . '</td>'
                    . '<td>' . $row['Element'] . '</td>'
                    . '<td>' . $row['Elementnummer'] . '</td>'
                    . '<td>' . $row['IMEI-nummer'] . '</td>'
                    . '<td>' . $row['opmerking'] . '</td>'
                    . '<td>' . $row['Merk'] . '</td>'
                    . '<td>' . $row['opmerkingMerk'] . '</td>'
                    . '</tr>';
                }
                ?> 
            </tbody>
        </table>
    </body>
</html>

