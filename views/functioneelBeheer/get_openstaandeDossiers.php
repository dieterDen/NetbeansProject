<?php
include_once 'languages/ned_get_openstaandeDossiers.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Overzicht openstaande dossiers</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/demo.css">
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.easyui.min"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jQuery.js"></script>
        <script src="<?php echo URL; ?>public/js/highcharts.js"></script>
        <script src="jquery.highchartTable.js" type="text/javascript"></script>   
    </head>
    <body>  
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
                            text: 'Statistieken openstaande dossiers'
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
                                text: 'Aantal  openstaande dossiers/maand'
                            }
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                                name: <?php
$huidig_jaar = $this->openstaandeDossiersStatistiek[0];
echo $huidig_jaar;
?>,
                                data: [<?php
for ($i = 1; $i <= 12; $i++) {
    echo $this->openstaandeDossiersStatistiek[3][$huidig_jaar][$i] . ",";
}
?>]
                            }, {
                                name: <?php
$vorig_jaar = $this->openstaandeDossiersStatistiek[1];
echo $vorig_jaar;
?>,
                                data: [<?php
for ($i = 1; $i <= 12; $i++) {
    echo $this->openstaandeDossiersStatistiek[3][$vorig_jaar][$i] . ",";
}
?>]

                            },
                            {
                                name: <?php
$twee_jaar = $this->openstaandeDossiersStatistiek[2];
echo $twee_jaar;
?>,
                                data: [<?php
for ($i = 1; $i <= 12; $i++) {
    echo $this->openstaandeDossiersStatistiek[3][$twee_jaar][$i] . ",";
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

        <a class="btn1" href="#">Verberg statistieken ></a>
        <a style="float: left;" class="btn2" href="#">Toon statistieken ></a>
        <div id="border" style="border:1px solid #A8A8A8 ;padding: 30px;">
            <div id='table1' style="width:16%;float:left;">
                <table class="easyui-datagrid" title="" style="width:210px;height:500px;"
                       data-options="singleSelect:true,collapsible:false,fitColumns:true">
                    <thead>
                        <tr>
                            <th data-options="field:'itemid',width:210,align:'center'"><?php echo $lang['naam']; ?></th>
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
                <?php
                $row_opsteller = $this->statistiekPerWeek;
                $naam = $row_opsteller[0]['opsteller'];
                $aantalDossiers = count($this->info_openstaandeDossiers);
                echo '
            <table id="tt" class="easyui-datagrid" title="Dossiers(' . $aantalDossiers . '): ' . $naam . '" style="width:85%;height:500px;"
                   data-options="singleSelect:true,collapsible:false,fitColumns:true, remoteSort:false">
                    ';
                ?>
                <thead>
                    <tr>
                        <th style="width: 100px;" data-options="field:'dossierNummer',sortable:true,auto:true,align:'center'"><?php echo $lang['dossiernummer']; ?></th>
                        <th style="width: 90px;" data-options="field:'type',sortable:true,auto:true,align:'center'"><?php echo $lang['dossiertype']; ?></th>
                        <th style="width: 100px;" data-options="field:'datum',sortable:true,auto:true,align:'center'"><?php echo $lang['datum']; ?></th>
                        <th style="width: 1150px;" data-options="field:'tekst',sortable:true,align:'left'"><?php echo $lang['tekst']; ?></th>
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
            <br>
            <?php echo '
    <table class="easyui-datagrid" title="Dossiers: ' . $naam . '" style="width:720px;height:33%;"
           data-options="singleSelect:true,collapsible:true,fitColumns:true">
            '; ?>
            <thead>
                <tr>
                    <th style="width: 120px;" data-options="field:'empty',align:'center'"></th>
                    <th style="width: 120px;" data-options="field:'tweeWeken',align:'center'"><?php echo $lang['2w']; ?></th>
                    <th style="width: 120px;" data-options="field:'drieWeken',align:'center'"><?php echo $lang['3w']; ?></th>
                    <th style="width: 120px;" data-options="field:'vierWeken',align:'center'"><?php echo $lang['4w']; ?></th>
                    <th style="width: 120px;" data-options="field:'vierWeken',align:'center'"><?php echo $lang['5w']; ?></th>
                    <th style="width: 120px;" data-options="field:'meerWeken',align:'center'"><?php echo $lang['6w']; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->statistiekPerWeek as $row) {
                    echo '<tr><td>' . $row['openstaande_dossiers_type'] . '</td>'
                    . '<td>' . $row['2w'] . '</td>'
                    . '<td>' . $row['3w'] . '</td>'
                    . '<td>' . $row['4w'] . '</td>'
                    . '<td>' . $row['5w'] . '</td>'
                    . '<td>' . $row['+6w'] . '</td>'
                    . '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
