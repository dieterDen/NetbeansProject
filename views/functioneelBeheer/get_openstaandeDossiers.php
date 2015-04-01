<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Basic Tabs - jQuery EasyUI Demo</title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/demo.css">
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.easyui.min"></script>
    </head>
    <body>

        <!--<div class="easyui-tabs" style="width:500px;height:500px;">
            <div title="Naam" style="padding:10px;">-->
        
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
                foreach ($this->namen_openstaandeDossiers as $row) {
                    echo '<tr><td><a href="#">' . $row['opsteller'] . '</a></td>'
                    . '</tr>';
                }
                ?>
            </tbody>
        </table>
        </div>
        
        <div  id='table2'style="margin-left:220px">
        <table class="easyui-datagrid" title="" style="width:80%;height:500px;"
               data-options="singleSelect:true,collapsible:false,">
            <thead>
                <tr>
                    <th style="width: 1300px;" data-options="field:'naam',align:'left'">Openstaande dossiers</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->namen_openstaandeDossiers as $row) {
                    echo '<tr><td><a href="#">' . $row['count(openstaande_dossiers_id)'] . '</a></td>'
                    . '</tr>';
                }
                ?>
            </tbody>
        </table>
        </div>
         </body>
</html>


