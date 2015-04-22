<?php

require_once 'PHPWord-0.12.0/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// Adding an empty Section to the document...
$section = $phpWord->addSection();

// Adding Text element with font customized inline...
$section->addText(htmlspecialchars('Politiezone Geraardsbergen - Lierde'), array('italic' => true));
$section->addText(
        htmlspecialchars(
                'Overzicht afwezigheden:'
        ), array('name' => '', 'size' => 16)
);

$section->addTextBreak(2);
$styleTable = array('borderBottomSize' => 18, 'borderColor' => '006699', 'cellMargin' => 80);
$styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
$phpWord->addTableStyle('Overzicht table', $styleTable, $styleFirstRow);
$table = $section->addTable('Overzicht table');
$table->addRow();
$table->addCell()->addText('nummer');
$table->addCell()->addText('bewoner naam');
$table->addCell()->addText('bewoner voornaam');
$table->addCell()->addText('adres');
$table->addCell()->addText('begindatum');
$table->addCell()->addText('bezocht');
$table->addCell()->addText('dagen geleden');
$table->addRow();

foreach ($this->overzichtAfwezigheden as $row) {
    $section->addTable();
    $table->addRow();
    $table->addCell(1000)->addText(
            htmlspecialchars($row['elementnummer']));
    $table->addCell(1700)->addText(
            htmlspecialchars($row['bewoner naam']));
    $table->addCell(1700)->addText(
            htmlspecialchars($row['bewoner voornaam']));
    $table->addCell(4000)->addText(
            htmlspecialchars($row['adres']));
    $table->addCell(1700)->addText(
            htmlspecialchars($row['begindatum']));
    $table->addCell(1700)->addText(
            htmlspecialchars($row['bezocht']));
    $table->addCell(1700)->addText(
            htmlspecialchars($row['dagen geleden']));
    $table->addRow();
    
    $section->addTable();
    $table->addRow();
    $table->addCell()->addText('Details: ');
    $table->addCell()->addText(htmlspecialchars($row['details en commentaar']));
    $table->addRow();
}

$file = 'index.odt';


//header("Content-Description: File Transfer");
//header('Content-Disposition: attachment; filename="index.odt"');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: apego; filename="index.odt"');

header('Cache-Control: max-age= 0');


// Saving the document as ODF file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
ob_clean();
$objWriter->save('php://output');

