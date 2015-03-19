<?php

$log = KLogger::getInstance();
//require 'views/algemeenInfo/get_briefing.php';

if ($_POST ['submit']) {
    $name = $_FILES['upload']['name'];
    $temp = $_FILES['upload']['tmp_name'];
    $type = $_FILES['upload']['type'];
    $size = $_FILES['upload']['size'];

    if ($type == 'application/pdf') {

        if ($size <= 20000000) {
            move_uploaded_file($temp, "external_files/$name");
            header("location: get_briefing");
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

if ($_POST['Delete']) {

    $nameFile = $_FILES['Delete']['name'];
    unlink($filename);
    header("location: ./get_briefing");
}
?>


