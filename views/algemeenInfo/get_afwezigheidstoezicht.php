<?php include_once ("languages/ned_get_afwezigheidstoezicht.php"); ?>
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
        <script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-detailview.js"></script>
    </head>
    <body>
        <div id="header">
            <a href="<?php echo URL; ?>index">Index</a>
            <a href="<?php echo URL; ?>help">Help</a>
            <a href="<?php echo URL; ?>login">Login</a>
        </div>

        <div id="content">
            <div style="margin:20px 0;"></div>
            <table class="easyui-datagrid" title="Basic DataGrid" style="width:1500px;height:800px"
                   data-options="singleSelect:true,collapsible:true">
                <thead>
                    <tr>
                        <th data-options="field:'itemid',width:120"><?php echo $lang['elementnummer']; ?></th>
                        <th data-options="field:'productid',width:750"><?php echo $lang['afwezigheids inlichtingen']; ?></th>
                        <th data-options="field:'listprice',width:200"><?php echo $lang['bewoner naam']; ?></th>
                        <th data-options="field:'unitcost',width:200"><?php echo $lang['bewoner voornaam']; ?></th>
                        <th data-options="field:'attr1',width:100"><?php echo $lang['begindatum']; ?></th>
                       <!-- <th data-options="field:'status',width:140"><?php echo $lang['bezocht']; ?></th>-->
                    </tr>
                </thead>
                <tbody> 
                    <?php  
                    foreach ($this->afwezigheidslijst as $row) {
                        echo '<tr><td>' . $row['elementnummer'] . '</td>'
                        . '<td><a href="javascript:void(0)" class="easyui-linkbutton" onclick="$("#w").window("open")">'. substr($row['afwezigheids inlichtingen'], 0, 100) . '...</a></td>'
                        . '<td>' . $row['bewoner naam'] . '</td>'
                        . '<td>' . $row['bewoner voornaam'] . '</td>'
                        . '<td>' . $row['begindatum'] . '</td>'
                        . '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div> 
        <?php
        require 'views/footer.php';
        ?>

