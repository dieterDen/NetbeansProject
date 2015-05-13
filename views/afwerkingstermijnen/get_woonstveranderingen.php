<?php
echo'inside view woonstveranderingen';
//onderstaande code voor get_dadergerichte aanpak
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8">
        <meta name = "keywords" content = "jquery,ui,easy,easyui,web">
        <meta name = "description" content = "easyui help you build your web page easily!">
        <title>test pagina dader gerichte</title>
        <link rel = "stylesheet" type = "text/css" href = "http://www.jeasyui.com/easyui/themes/default/easyui.css">
        <link rel = "stylesheet" type = "text/css" href = "http://www.jeasyui.com/easyui/themes/icon.css">
        <link rel = "stylesheet" type = "text/css" href = "http://www.jeasyui.com/easyui/demo/demo.css">
        <script type = "text/javascript" src = "http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-scrollview.js"></script>
    </head>
    <body>
        <h2>DataGrid Virtual Scroll View Demo</h2>
        <div style="margin-bottom:10px">
            
            <select onchange="load(this.value)">
                <option value="remote">Load Remote Data</option>
                <option value="local">Load Local Data</option>
            </select>
            
        </div>
        <table id="tt" title="DataGrid - VirtualScrollView" style="width:700px;height:300px" data-options="
               view:scrollview,rownumbers:true,singleSelect:true,
               url:'datagrid27_getdata.php',
               autoRowHeight:false,pageSize:50">
            <thead>
                <tr>
                    <th field="inv" width="80">Inv No</th>
                    <th field="test" width="100">afwezigheidstoezicht</th>
                    <th field="no1" width="150"/>kantschriften >10</th>
                    <th field="no1" width="150"/>niet-verkeer en verkeersongeval.</th>
                    <th field="date" width="100">Date</th>
                    <th field="name" width="80">Name</th>
                    <th field="amount" width="80" align="right">Amount</th>
                    <th field="price" width="80" align="right">Price</th>
                    <th field="cost" width="100" align="right">Cost</th>
                    <th field="note" width="110">Note</th>
                </tr>
            </thead>
        </table>
        <script type="text/javascript">
            $(function () {
                $('#tt').datagrid();
            });
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
                if (mode == 'local') {
                    loadLocal();
                } else {
                    $('#tt').datagrid({
                        url: 'datagrid27_getdata.php'
                    });
                }
            }
        </script>
        <style type="text/css">
            .datagrid-header-rownumber,.datagrid-cell-rownumber{
                width:40px;
            }
        </style>
    </body>
</html>
