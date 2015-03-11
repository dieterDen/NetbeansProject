<?php echo 'inside view get_afwezigheidInlichtingen'; ?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Afwezigheid inlichtingen</title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/easyUI/demo.css">
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/easyUI/jquery.easyui.min.js"></script>
    </head>
    <body>

        <div id="dd" class="easyui-draggable easyui-resizable" data-options="handle:'#mytitle'" style="width:980px;height:250px;border:1px solid #ccc">
            <div id="mytitle" style="background:#ddd;padding:5px;font-family: verdana, helvetica,arial, sans-serif; font-size: 16px;">Afwezigheid inlichtingen: <?php echo $this->afwezigheid_elementnummer; ?></div>
            <div style="padding:20px;font-family: verdana, helvetica,arial, sans-serif; font-size: 14px; ">
                <?php
                foreach ($this->afwezigheidInlichtingen as $row) {
                    echo $row[afwezigheidstoezichttekst_tekst]."<br /><br />";
                }
                ?>

            </div>
        </div>
    </body>
</html>

