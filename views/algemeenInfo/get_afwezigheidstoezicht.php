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
        <script>
            var createBrief = function (param) {
                var elementnummer = $(param).parents("tr").find(">:first-child").text();
                window.location.href = '<?php echo URL; ?>algemeenInfo/print_briefAfwezigheden/' + elementnummer;
                /*window.location.href = '<?php echo URL; ?>algemeenInfo/print_briefAfwezigheden/';*/
            }
        </script>
        <?php
        for ($i = 1; $i <= 12; $i++) {
            echo $this->statistiek_afwezigheid[2014][$i];
        }
        ?>
    </head>

    <body>

        <div data-role="header" id="header">
            <a href="<?php echo URL; ?>"><img src="/pictures/pol_logo.png" style="width: 20%;padding-left: 10px;"></a>
            <br>

            <br />
            <a href="<?php echo URL; ?>index" rel="external"  >Index</a>
            <a href="<?php echo URL; ?>help" data-role="button">Help</a>
            <a href="<?php echo URL; ?>login" data-role="button">Login</a>
        </div>
        <div id="content">  
            <div id="container" style="width: 100%;"></div>
            <script>
                $(document).ready(function () {
                    $(".btn1").hide();
                    $(".btn1").click(function () {
                        $(".btn2").show();
                        $("#container").hide(1000);
                        $(".btn1").hide();
                    });
                    $(".btn2").click(function () {
                        $('#container').highcharts({
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Statistieken afwezigheidstoezicht'
                            },
                            xAxis: {
                                categories: ['Jan',
                                    'Feb',
                                    'Mar',
                                    'Apr',
                                    'Mei',
                                    'Jun',
                                    'Jul',
                                    'Aug',
                                    'Sep',
                                    'Okt',
                                    'Nov',
                                    'Dec'],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'aantal toezichten/maand'
                                }
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderwidth: 0

                                }
                            },
                            series: [{
                                    name: <?php
        $huidig_jaar = $this->statistiek_afwezigheid[0];
        echo $huidig_jaar;
        ?>,
                                    data: [<?php
        for ($i = 1; $i <= 12; $i++) {
            echo $this->statistiek_afwezigheid[3][$huidig_jaar][$i] . ",";
        }
        ?>]
                                }, {
                                    name: <?php
        $vorig_jaar = $this->statistiek_afwezigheid[1];
        echo $vorig_jaar;
        ?>,
                                    data: [<?php
        for ($i = 1; $i <= 12; $i++) {
            echo $this->statistiek_afwezigheid[3][$vorig_jaar][$i] . ",";
        }
        ?>]

                                },
                                {
                                    name: <?php
        $twee_jaar = $this->statistiek_afwezigheid[2];
        echo $twee_jaar;
        ?>,
                                    data: [<?php
        for ($i = 1; $i <= 12; $i++) {
            echo $this->statistiek_afwezigheid[3][$twee_jaar][$i] . ",";
        }
        ?>]
                                }]
                        });
                        $("#container").show();
                        $(".btn1").show();
                        $(".btn2").hide();
                    });
                });
            </script>
            <a class="btn1" href="#">Verberg statistieken</a>
            <a style="float: left;" class="btn2" href="#"Statistieken >Statistieken</a>
            <a style="margin-left: 80px;"class="btn3" target="_blank" href="<?php echo URL; ?>algemeenInfo/print_overzichtAfwezigheden">Globaal overzicht</a>
            <?php
            foreach ($this->wijken as $row) {
                echo '
            <a style = "margin-left: 80px;" class = "btn" target = "_blank" href = "' . URL . 'algemeenInfo/print_overzichtAfwezigheden_' . str_replace(' ', '', $row['afwezigheidstoezicht_wijk']) . '">' . $row['afwezigheidstoezicht_wijk'] . '</a>';
            }
            // velden met geen wijk
            if (count($this->foutiefWijken) != 0) {
                echo '
            <a style = "margin-left: 80px;color: red;" class = "btn" target = "_blank" href = "' . URL . 'algemeenInfo/print_overzichtAfwezigheden_FoutiefTeam">Foutief Team</a>';
            }
            ?>

            <div style="margin:20px 0;"></div>
            <table id="datagrid" class="easyui-datagrid" title="Afwezigheidstoezicht" style="width:98%;" data-options="singleSelect:true,fitColumns:true,remoteSort:false">
                <thead>
                    <tr>
                        <th data-priority data-options="field:'elementnummer',sortable:true,auto:true,align:'center'"><?php echo $lang['elementnummer']; ?></th>
                        <th data-priority data-options="field:'wijk',sortable:true,auto:true,align:'center'"><?php echo $lang['BPT']; ?></th>
                        <th data-options="field:'bewNaam',sortable:true,auto:true"><?php echo $lang['bewoner naam']; ?></th>
                        <th data-options="field:'bewVoornaam',sortable:true,auto:true"><?php echo $lang['bewoner voornaam']; ?></th>
                        <th data-options="field:'adres',sortable:true,auto:true"><?php echo $lang['adres']; ?></th>
                        <th data-options="field:'inlichtingen',width:550"><?php echo $lang['afwezigheids inlichtingen']; ?></th>
                        <th data-options="field:'begDatum',sortable:true,auto:true"><?php echo $lang['begindatum']; ?></th>
                        <th data-options="field:'bezocht',auto:true, align:'center'"><?php echo $lang['bezocht']; ?></th>
                        <th data-options="field:'dagGeleden',sortable:true,auto:true, align:'center'"><?php echo $lang['dagen geleden']; ?></th>
                        <th data-options="field:'printBrief', align:'center'"> </th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                    foreach ($this->afwezigheidslijst as $row) {
                        echo '<tr><td>' . $row['elementnummer'] . '</td>'
                        . '<td>' . $row['afwezigheidstoezicht_wijk'] . '</td>'
                        . '<td>' . $row['bewoner naam'] . '</td>'
                        . '<td>' . $row['bewoner voornaam'] . '</td>'
                        . '<td>' . $row['adres'] . '</td>'
                        . '<td><a href="#" id="divPopup" onclick="createPopup(this);">' . substr($row['details en commentaar'], 0, 60) . '...</a></td>'
                        . '<td>' . $row['begindatum'] . '</td>'
                        . '<td>' . $row['bezocht'] . '</td>'
                        . '<td>' . $row['dagen geleden'] . '</td>'
                        . '<td><a href="#" id="divPrintBrief" onclick="createBrief(this);">Brief</a></td>'
                        . '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <!--<script type="text/javascript">
                $('#datagrid').datagrid({
                    onClickRow: function(index,row){
                        alert('test');
                    }
                });
            </script>-->
        </div> 

        <?php
        require 'views/footer.php';
        ?>
        
