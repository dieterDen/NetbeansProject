<?php

require_once 'PHPWord-0.12.0/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// Adding an empty Section to the document...
$section = $phpWord->addSection();

// Adding Text element with font customized inline...
$section->addText(htmlspecialchars('Politiezone Geraardsbergen - Lierde'), array('italic' => true));
$section->addTextBreak(2);
$section->addText(
        htmlspecialchars(
                'Geachte heer of mevrouw,'
));

$section->addTextBreak(2);

$section->addText('Volgende controles hebben plaatsgevonden aan uw domiciliëring:');
$section->addTextBreak();

$table = $section->addTable();

foreach ($this->overzichtCommentaren as $row) {
    $section->addText(date("d/m/Y - H:i:s",  strtotime($row['afwezigheidstoezichttekst_tekstcreatiedatumtijd'])), array('bold' => true));
    $section->addTextBreak();
    $section->addText($row['afwezigheidstoezichttekst_tekst']);
    $section->addTextBreak();
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


