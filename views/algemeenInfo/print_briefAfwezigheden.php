<?php

/**
 * Tutoriel file
 * Description : Simple substitutions of variables
 * You need PHP 5.2 at least
 * You need Zip Extension or PclZip library
 *
 * @copyright  GPL License 2008 - Julien Pauli - Cyril PIERRE de GEYER - Anaska (http://www.anaska.com)
 * @license    http://www.gnu.org/copyleft/gpl.html  GPL License
 * @version 1.3
 */
require_once('library/odf.php');
$gegevens_uitvoerder=$this->verlopen_afwezigheden;    
$commentaar_afwezigheid = $this->overzichtCommentaren;
$odf = new odf("brief_opsteller_afwezigheidstoezicht.odt");
foreach ($gegevens_uitvoerder as $value) {
    if ($value['afwezigheidstoezicht_elementnummer']== $this->elementnummer) {
        $message = $value['afwezigheidstoezicht_naam'] . ' ' . $value['afwezigheidstoezicht_voornaam'];
        $formatted_adres = str_replace('/,', ' ', $value['afwezigheidstoezicht_adres']);
        $adres = preg_split('/\s+/', $formatted_adres);
        $jaar_element = date('Y',strtotime($value['afwezigheidstoezicht_elementbegindatum']));
    }
    
}
$odf->setVars('naam', $message, true, 'UTF-8');
$odf->setVars('adres', $adres[0] . ' ' . $adres[1], true, 'UTF-8');
$odf->setVars('locatie', $adres[2] . ' ' . $adres[3], true, 'UTF-8');
$odf->setVars('ordernummer', 'IO' . sprintf('%06d', $this->elementnummer) . '/' . $jaar_element, true, 'UTF-8');
$odf->setVars('datum', date('d/m/Y', time()), 'UTF-8');
ob_clean();
$odf->exportAsAttachedFile();
?>