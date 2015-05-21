<?php
include_once ("languages/ned_get_afwezigheidstoezicht.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Historiek afwezigheidstoezicht</title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/demo/demo.css">
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.easyui.min.js"></script>
        <script>
            var createBrief = function (param) {
                var elementnummer = $(param).parents("tr").find(">:first-child").text();
                window.location.href = '<?php echo URL; ?>algemeenInfo/print_briefAfwezigheden/' + elementnummer;
                /*window.location.href = '<?php echo URL; ?>algemeenInfo/print_briefAfwezigheden/';*/
            }
        </script>
    </head>
    <body>
        <div style="margin:20px 0;"></div>
        <table id="dg" title="Historiek afwezigheidstoezicht" style="width:98%;"
               data-options="rownumbers:true,singleSelect:true,pagination:true,pageSize:20,remoteFilter:false,fitColumns:true,remoteSort:false">
            <thead>
                <tr>
                    <th data-options="field:'elementnummer',sortable:true,auto:true,align:'center'"><?php echo $lang['elementnummer']; ?></th>
                    <th data-options="field:'bewNaam',sortable:true,auto:true"><?php echo $lang['bewoner naam']; ?></th>
                    <th data-options="field:'bewVoornaam',sortable:true,auto:true"><?php echo $lang['bewoner voornaam']; ?></th>
                    <th data-options="field:'adres',sortable:true,width:250"><?php echo $lang['adres']; ?></th>
                    <th data-options="field:'inlichtingen',width:500"><?php echo $lang['afwezigheids inlichtingen']; ?></th>
                    <th data-options="field:'begDatum',sortable:true,auto:true"><?php echo $lang['begindatum']; ?></th>
                    <th data-options="field:'printBrief', align:'center', width:50"> </th>
                </tr>
            </thead>
            <tbody> 
                <?php
                foreach ($this->overzichtHistoriek as $row) {
                    echo '<tr><td>' . $row['afwezigheidstoezicht_elementnummer'] . '</td>'
                    . '<td>' . $row['afwezigheidstoezicht_naam'] . '</td>'
                    . '<td>' . $row['afwezigheidstoezicht_voornaam'] . '</td>'
                    . '<td>' . str_replace('/,', ' ', $row['afwezigheidstoezicht_adres']) . '</td>'
                    . '<td>' . substr($row['afwezigheidstoezichttekst_tekst'], 0, 150) . '...</td>'
                    . '<td>' . $row['afwezigheidstoezicht_elementbegindatum'] . '</td>'
                    . '<td><a href="#" id="divPrintBrief" onclick="createBrief(this);">Brief</a></td>'
                    . '</tr>';
                }
                ?>
            </tbody>
        </table>
        <script type="text/javascript">
            $(function () {
                var pager = $('#dg').datagrid().datagrid('getPager'); // get the pager of datagrid
                pager.pagination({
                });
            })
        </script>
    </body>
</html>