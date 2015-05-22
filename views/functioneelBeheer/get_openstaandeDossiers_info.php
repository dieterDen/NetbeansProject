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
        <script>
            function loadLocal(afdeling) {
                window.location.href = '<?php echo URL; ?>functioneelBeheer/get_openstaandeDossiers_dienst/' + afdeling;
            }

            function load(mode) {

                switch (mode) {
                    case "alles":
                        loadLocal("alles");
                        break;
                    case "Wijk":
                        loadLocal("wijk");
                        break;
                    case "Pipog":
                        loadLocal("pipog");
                        break;
                    case "Buurtpolitie":
                        loadLocal("buurtpolitie");
                        break;
                    case "Interventiedienst / Onthaal":
                        loadLocal("Interventiedienst / onthaal");
                        break;
                    case "Politie":
                        loadLocal("politie");
                        break;
                    case "Lokale Recherche":
                        loadLocal("lokale recherche");
                        break;
                    case "BPT team West":
                        loadLocal("bpt team west");
                        break;
                    case "BPT team Oost":
                        loadLocal("bpt team oost");
                        break;
                    case "BPT team Centrum":
                        loadLocal("bpt team centrum");
                        break;
                    case "BPT team Lierde":
                        loadLocal("bpt team lierde");
                        break;
                    case "Interne zaken":
                        loadLocal("interne zaken");
                        break;
                    case "Jeugd en Gezin":
                        loadLocal("jeugd en gezin");
                        break;
                    case "_geen dienst":
                        loadLocal("");
                }

            }
        </script>
    </head>
    <body>  
        <div id="container" style="width: 100%;"></div>



        <div id="border" style="border:1px solid #A8A8A8 ;padding: 30px;">
            <?php if (is_null($this->namen_openstaandeDossiers)) : ?>
                <p><b>Er is geen data beschikbaar om weer te geven!</b></p>
            <?php else : ?>
                <select onchange="load(this.value)">
                    <?php
                    echo '<option value="" selected></option>';
                    foreach ($this->namen_diensten as $row) {
                        echo '<option value="' . $row['dienst'] . '">' . $row['dienst'] . '</option>';
                    }
                    ?>

                </select> 
                <br><br>
                <div id='table1' style="width:16%;float:left;">
                    <table class="easyui-datagrid" title="" style="width:240px;height:500px;"
                           data-options="singleSelect:true,collapsible:false,fitColumns:true,remoteSort:false">
                        <thead>
                            <tr>
                                <th data-options="field:'itemid', sortable:true,width:210,align:'center'"><?php echo $lang['naam']; ?></th>
                                <th data-options="field:'aantalAfwezigheden', sortable:true,width:55,align:'center'"><?php echo $lang['aantal']; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //tonen van namen
                            $naam = null;
                            $huidige_dienst = $this->huidige_dienst;
                            echo '<p>Dienst: ' . urldecode($this->huidige_dienst) . '</p>';
                            foreach ($this->namen_openstaandeDossiers as $row) {
                                $naam = $row['opsteller'];
                                //URL aanpassen!
                                echo '<tr><td><a href="' . URL . 'functioneelBeheer/get_openstaandeDossiers_info/' . $naam . '-' . $huidige_dienst . '">' . $naam . '</a></td>'
                                . '<td>' . sprintf('%02d', $row['count(openstaande_dossiers_id)']) . '</a></td>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div  id='table2'style="margin-left:270px">
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
                            <th style="width: 100px;" data-options="field:'dossierNummer',auto:true,align:'center'"><?php echo $lang['dossiernummer']; ?></th>
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

            <?php endif; ?>   
        </div>
    </body>
</html>
