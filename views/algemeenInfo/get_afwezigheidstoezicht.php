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
        <script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-detailview.js"></script>
    </head>
    <body>
        <div id="header">
            <a href="<?php echo URL; ?>index">Index</a>
            <a href="<?php echo URL; ?>help">Help</a>
            <a href="<?php echo URL; ?>login">Login</a>
        </div>
        <div id="content">
            <h2>Expand row in DataGrid to show subgrid</h2>
            <div class="demo-info" style="margin-bottom:10px">
                <div class="demo-tip icon-tip">&nbsp;</div>
                <div>Click the expand button to expand row and view subgrid.</div>
            </div>
            <table id="dg" style="width:650px;height:250px"
                   url="datagrid22_getdata.php"
                   title="DataGrid - SubGrid"
                   singleSelect="true" fitColumns="true">
                <thead>
                    <tr>
                        <th field="itemid" width="80">Item ID</th>
                        <th field="productid" width="100">Product ID</th>
                        <th field="listprice" align="right" width="80">List Price</th>
                        <th field="unitcost" align="right" width="80">Unit Cost</th>
                        <th field="attr1" width="220">Attribute</th>
                        <th field="status" width="60" align="center">Status</th>
                    </tr>
                </thead>
            </table>
            <script type="text/javascript">
                $(function () {
                    $('#dg').datagrid({
                        view: detailview,
                        detailFormatter: function (index, row) {
                            return '<div style="padding:2px"><table class="ddv"></table></div>';
                        },
                        onExpandRow: function (index, row) {
                            var ddv = $(this).datagrid('getRowDetail', index).find('table.ddv');
                            ddv.datagrid({
                                url: 'datagrid22_getdetail.php?itemid=' + row.itemid,
                                fitColumns: true,
                                singleSelect: true,
                                rownumbers: true,
                                loadMsg: '',
                                height: 'auto',
                                columns: [[
                                        {field: 'orderid', title: 'Order ID', width: 200},
                                        {field: 'quantity', title: 'Quantity', width: 100, align: 'right'},
                                        {field: 'unitprice', title: 'Unit Price', width: 100, align: 'right'}
                                    ]],
                                onResize: function () {
                                    $('#dg').datagrid('fixDetailRowHeight', index);
                                },
                                onLoadSuccess: function () {
                                    setTimeout(function () {
                                        $('#dg').datagrid('fixDetailRowHeight', index);
                                    }, 0);
                                }
                            });
                            $('#dg').datagrid('fixDetailRowHeight', index);
                        }
                    });
                });
            </script>

            <?php
            require 'views/footer.php';
            ?>

