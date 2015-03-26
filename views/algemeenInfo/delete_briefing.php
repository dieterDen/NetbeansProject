<?php
//logging toevoegen
$log = KLogger::getInstance();

$name_file = $this->filename;
$name_filePDF = str_replace("pdf", ".pdf", $name_file);
$path_file = './external_files/' . $name_filePDF;

chown($path_file, 666);
if (unlink($path_file)) {
    header("location: ../get_briefing");
    $log->LogInfo("verwijderen van ".$name_file." succesvol.");
} else {
    $log->LogError("Kan pdf niet verwijderen, chech of dat path van pdf file overeenkomt");
    header("location: ../get_briefing");
}
?>
