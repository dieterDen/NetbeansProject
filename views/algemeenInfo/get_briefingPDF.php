<?php
$log = KLogger::getInstance();
require 'views/algemeenInfo/get_briefing.php';

if ($_POST ['submit']) {
    $name = $_FILES['upload']['name'];
    $temp = $_FILES['upload']['tmp_name'];
    $type = $_FILES['upload']['type'];
    $size = $_FILES['upload']['size'];
    //$time_creation=$filemtime("external_files/$name");
    
    //echo $time_creation;

    if ($type == 'application/pdf') {

        if ($size <= 20000000) {
            move_uploaded_file($temp, "external_files/$name");
            echo "<a href='" . URL . "external_files/" . $name . "' style='font-size:14px;'>$name</a>";
        } else {
            echo "The file: $name is too big <br />"
            . "the size is $size and needs to be less then 20mb";


            $log->LogError("uploaden van 5min briefing gefaald-> file size te groot");
        }
    } else {
        $log->LogError('Uploaden van 5min briefing gefaald-> enkel pdf formaat toegestaan');
        echo 'Enkel pdf bestanden toegelaten.';
    }
} else {
    header("location: ../index/index.php");
}
?>

<!DOCTYPE html>
<html>
    <body>
        <div class="easyui-accordion" style="width:500px;height:300px;">
            <div title="about" data-options="iconCls:'icon-ok'" style="overflow:auto;padding:10px;">
                <h3 style="color:#0099FF;">Accordion for jQuery</h3>
                <p>Accordion is a part of easyui framework for jQuery. It lets you define your accordion component on web page more easily.</p>
            </div>
            <div title="Help" data-options="iconCls:'icon-help'" style="padding:10px;">
                <p>The accordion allows you to provide multiple panels and display one or more at a time. Each panel has built-in support for expanding and collapsing. Clicking on a panel header to expand or collapse that panel body. The panel content can be loaded via ajax by specifying a 'href' property. Users can define a panel to be selected. If it is not specified, then the first panel is taken by default.</p>
            </div>
            
        </div>
    </body>
</html>

