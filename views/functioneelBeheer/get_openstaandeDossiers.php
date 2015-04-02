<!DOCTYPE html>
<html>
    <head>
        <title>Basic Tabs - jQuery EasyUI Demo</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/demo.css">
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.easyui.min"></script>
    </head>
    <body>

        <div id='table1' style="width:16%;float:left;">
            <table class="easyui-datagrid" title="" style="width:210px;height:500px;"
                   data-options="singleSelect:true,collapsible:false,">
                <thead>
                    <tr>
                        <th data-options="field:'itemid',width:210,align:'center'">Naam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $naam = null;
                    foreach ($this->namen_openstaandeDossiers as $row) {
                        $naam = $row['opsteller'];
                        echo '<tr><td><a href="' . URL . 'functioneelBeheer/get_openstaandeDossiers/' . $naam . '">' . $naam . '</a></td>'
                        . '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div  id='table2'style="margin-left:220px">
            <table class="easyui-datagrid" title="" style="width:85%;height:500px;"
                   data-options="singleSelect:true,collapsible:false,">
                <thead>
                    <tr>
                        <th style="width: 100px;" data-options="field:'dossierNummer',align:'center'">Dossier Nummer</th>
                        <th style="width: 90px;" data-options="field:'type',align:'center'">Dossier type</th>
                        <th style="width: 100px;" data-options="field:'datum',align:'center'">Datum</th>
                        <th style="width: 1150px;" data-options="field:'tekst',align:'left'">Tekst</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($this->info_openstaandeDossiers as $row) {
                        echo '<tr><td>' . $row['openstaande_dossiers_nummer'] . '</td>'
                        . '<td>' . $row['openstaande_dossiers_type'] . '</td>'
                        . '<td>' . $row['openstaande_dossiers_datum'] . '</td>'
                        . '<td>' . $row['openstaande_dossiers_tekst'] . '</td>'
                        . '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br><br>

        <table class="easyui-datagrid" title="" style="width:40%;height:170px;"
               data-options="singleSelect:true,collapsible:true,">
            <thead>
                <tr>
                    <th style="width: 120px;" data-options="field:'empty',align:'center'"></th>
                    <th style="width: 120px;" data-options="field:'tweeWeken',align:'center'">2w</th>
                    <th style="width: 120px;" data-options="field:'drieWeken',align:'center'">3w</th>
                    <th style="width: 120px;" data-options="field:'vierWeken',align:'center'">4w</th>
                    <th style="width: 120px;" data-options="field:'vierWeken',align:'center'">5w</th>
                    <th style="width: 120px;" data-options="field:'meerWeken',align:'center'">+6w</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>GF</td></tr>
                <tr><td>VO</td></tr>
                <tr><td>V</td></tr>
                <tr><td>GAS</td></tr>
                <tr><td>KS</td></tr>
            </tbody>
        </table>
    </body>
</html>


