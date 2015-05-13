<?php
/**
 * De klasse toont view voor Gerechtelijk niet-verkeer en verkeersongeval
 * De gegevens worden getoond in een easyUI datagrid
 * @package views
 * @subpackage afwerkingstermijnen
 * @version 0.0
 */
include_once ("languages/ned_get_GF_VO.php");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="easyui help you build your web page easily!">
        <title>Gerechtelijk niet-verkeer en verkeersongeval</title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyui/themes/icon.css">
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/easyui/jquery.easyui.min.js"></script>
    </head>
    <body>
        <?php
        $teller_drieWeken = 0;
        $teller_aantalFeiten = 0;

        foreach ($this->gerechtelijkeFeiten as $row) {
            $datum_GF = strtotime($row['datum']);
            $datediff = floor((time() - $datum_GF) / (60 * 60 * 24));
            if ($datediff > 21) {
                $teller_drieWeken+=1;
            }
            $teller_aantalFeiten+=1;
        }
        $teller_tweeWeken = $teller_aantalFeiten - $teller_drieWeken;
        ?>
        <div style="margin-bottom:20px">
            <p> Denk aan de termijn van 21 dagen! <br /> Een snelle afwerking zorgt ervoor dat je niet op deze lijst voorkomt!</p>
            <p style="text-align: center"><< Er zijn momenteel <em style="color: red"><?php echo $teller_tweeWeken; ?></em> dossiers ouder dan 14 dagen en <em style="color: red"><?php echo $teller_drieWeken; ?></em> ouder dan 21 dagen! >></p>
        </div>
        <table id="tt" class="easyui-datagrid" style="width:99%" 
               title="Gerechtelijk niet-verkeer en verkeersongeval ouder dan 14 dagen" data-options="singleSelect:true,collapsible:true,fitColumns:true">
            <thead>
                <tr>
                    <th field="element" auto="true" align="center"><?php echo $lang['element']; ?></th>
                    <th field="datum" width="80" align="center"><?php echo $lang['datum']; ?></th>
                    <th field="nummer" auto="true" align="center"><?php echo $lang['nummer']; ?></th>
                    <th field="feit" width="350" align="center"><?php echo $lang['feit']; ?></th>
                    <th field="opsteller" width="100" align="center"><?php echo $lang['opsteller']; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->gerechtelijkeFeiten as $row) {
                    echo '<tr><td>' . $row['element'] . '</td>'
                    . '<td>' . $row['datum'] . '</td>'
                    . '<td>' . $row['nummer'] . '</td>'
                    . '<td>' . $row['feit'] . '</td>'
                    . '<td>' . $row['opsteller'] . '</td>'
                    . '</tr>';
                }
                ?> 
            </tbody>
        </table>
    </body>
</html>

