<?php
/**
 * De klasse toont view voor dader gerichte aanpak
 * De gegevens worden getoond in een easyUI datagrid
 * @package views
 * @subpackage algemeenInfo
 * @version 0.0
 */
include_once ("languages/ned_get_daderGerichteAanpak.php");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="easyui help you build your web page easily!">
        <title>Dader gerichte aanpak</title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyui/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyui/themes/icon.css">
        <script type="text/javascript" src="<?php echo URL; ?>public/js/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/easyui/jquery.easyui.min.js"></script>
    </head>
    <body>
        <div style="margin-bottom:20px">
            <p><b>In het kader van het actieplan Dadergerichte aanpak, kortweg DGA, treft u hieronder alle actuele veelplegers op de één of andere wijze gekoppeld aan onze zone.</b></p>
        </div>
        <select onchange="load(this.value)">
            <option value="alles">Alles</option>
            <option value="veelpleger">Veelpleger</option>
            <option value="huisarrest">Huisarrest</option>
            <option value="elektronischToezicht">Elektronisch toezicht</option>
            <option value="ifgOpvolgingGezinssituatie">IFG-Opvolging gezinssituatie</option>
        </select> 
        <br><br>
        <table id="tt" class="easyui-datagrid" style="width:99%" 
               title="Dader gerichte aanpak" data-options="singleSelect:true,collapsible:true,fitColumns:true">
            <thead>
                <tr>
                    <th field="foto" width="80" align="center"><?php echo $lang['foto']; ?></th>
                    <th field="dader" width="80" align="center"><?php echo $lang['dader']; ?></th>
                    <th field="info" width="300" align="center"><?php echo $lang['info']; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->kantschriften as $row) {

                    echo '<tr><td>' . $row['foto'] . '</td>'
                    . '<td>' . $row['dader'] . '</td>'
                    . '<td>' . $row['info'] . '</td>'
                    . '</tr>';
                }
                ?> 
            </tbody>
        </table>

        <script>
            function loadLocal() {
                var rows = [];
                for (var i = 1; i <= 8000; i++) {
                    var amount = Math.floor(Math.random() * 1000);
                    var price = Math.floor(Math.random() * 1000);
                    rows.push({
                        inv: 'Inv No ' + i,
                        date: $.fn.datebox.defaults.formatter(new Date()),
                        name: 'Name ' + i,
                        amount: amount,
                        price: price,
                        cost: amount * price,
                        note: 'Note ' + i
                    });
                }
                $('#tt').datagrid('loadData', rows);
            }

            function load(mode) {
                switch (mode) {
                    case alles:
                        loadlocal("alles");
                    case veelpleger:
                        loadlocal("veelpleger");
                    case huisarrest:
                        loadlocal("huisarrest");
                    case elektronischToezicht:
                        loadlocal("elektronischToezicht");
                    case ifgOpvolgingGezinssituatie:
                        loadlocal("ifgOpvolgingGezinssituatie");
                }
              else {
                  vanuit javascript een php variable opvullen met andere array
                  ->door naar controller functie te verwijzen die param bevat
                    $('#tt').datagrid({
                        url: 'datagrid27_getdata.php\n\'
                        
                    });
                }
            }
        </script>
    </body>
</html>



//javascript functies worden opgeroepen 
-> hierop moeten de juiste query uitgevoerd worden naar gelang de keuze van de gebruiker
geselecteerde data wordt opgehaald uit model, param moet doorgegeven worden. 
-> data tonen in datagrid
-> één datagrid opstellen en enkel array veranderen.
