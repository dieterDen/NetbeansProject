<?php
/**
 * View die de popup met panels toont met inlichtingen en commentaren van afwezigheidstoezicht  
 *  
 * @package views
 * @subpackage algemeenInfo
 * @version 0.0
 */
//echo 'inside view get_afwezigheidInlichtingen';    
?>
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
        <div class="easyui-tabs" style="width:980px;height:280px">
            <div title="Details" style="padding:10px">
                <p style="font-size:12px">Afwezigheid inlichtingen: <?php echo $this->afwezigheid_elementnummer; ?></p>
                <div >
                    <?php
                    foreach ($this->afwezigheidInlichtingen as $row) {
                        echo $row['afwezigheidstoezichttekst_tekst'] . "<br /><br />";
                    }
                    ?>

                </div>
            </div>
            <div title="Commentaren(<?php echo count($this->afwezigheidCommentaren); ?>)" style="padding:10px">
                <?php
                foreach ($this->afwezigheidCommentaren as $row) {
                    echo $row['afwezigheidstoezichttekst_tekst'] . "<br /><br />";
                }
                ?>
            </div>
        </div>
    </body>
</html>

