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
        <script src="<?php echo URL; ?>public/js/highcharts.js"></script>
        <script src="jquery.highchartTable.js" type="text/javascript"></script>        
        <script type="text/javascript">
            var popup = null;
            var createPopup = function (param) {
                var elementnummer = $(param).parents("tr").find(">:first-child").text();
                if (popup && !popup.closed) {
                    popup = open("<?php echo URL; ?>algemeenInfo/get_afwezigheidInlichtingen/" + elementnummer, "Popup", "top=500,width=1000,height=300");
                    popup.focus();
                } else {
                    popup = open("<?php echo URL; ?>algemeenInfo/get_afwezigheidInlichtingen/" + elementnummer, "Popup", "top=500,width=1000,height=300");

                }
            };
        </script>

    </head>
    <body>
        <div id="header">
            <img src="/pictures/pol_logo.png" style="width: 20%;padding-left: 10px;">
            <br>

            <br />
            <a href="<?php echo URL; ?>index">Index</a>
            <a href="<?php echo URL; ?>help">Help</a>
            <a href="<?php echo URL; ?>login">Login</a>
        </div>
        <div id="content"> 
            <a href="">Toon statistieken >></a>
            <div id="container" style="width: 100%; height: 400px;"></div>
            <script>
                $(function () {
                    $('#container').highcharts({
                        chart: {
                            type: 'bar'
                        },
                        title: {
                            text: 'Fruit Consumption'
                        },
                        xAxis: {
                            categories: ['Apples', 'Bananas', 'Oranges']
                        },
                        yAxis: {
                            title: {
                                text: 'Fruit eaten'
                            }
                        },
                        series: [{
                                name: 'Jane',
                                data: [1, 0, 4]
                            }, {
                                name: 'John',
                                data: [5, 7, 3]
                            }]
                    });
                });
                
                //series -> using JSON mogelijk?
            </script>
            <table class="highchart" data-graph-container-before="1" data-graph-type="column">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Sales</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>January</td>
                        <td>8000</td>
                    </tr>
                    <tr>
                        <td>February</td>
                        <td>12000</td>
                    </tr>
                </tbody>
            </table>
            <script type="text/javascript">$(document).ready(function () {
                    $('table.highchart').highchartTable();
                });
            </script>
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

