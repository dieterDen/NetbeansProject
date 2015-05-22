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
$gegevens_uitvoerder = $this->verlopen_afwezigheden;
$commentaar_afwezigheid = $this->overzichtCommentaren;
$odf = new odf("brief_opsteller_afwezigheidstoezicht.odt");
foreach ($gegevens_uitvoerder as $value) {
    if ($value['afwezigheidstoezicht_elementnummer'] == $this->elementnummer) {
        $message = $value['afwezigheidstoezicht_naam'] . ' ' . $value['afwezigheidstoezicht_voornaam'];
        $formatted_adres = str_replace('/,', ' ', $value['afwezigheidstoezicht_adres']);
        $arr_adres = preg_split('/(?=\d)/', $formatted_adres, 2);
        $straat = $arr_adres[0];
        $adres = preg_split('/\s+/', $arr_adres[1]);
        $jaar_element = date('Y', strtotime($value['afwezigheidstoezicht_elementbegindatum']));
    }
}
$odf->setVars('naam', $message, true, 'UTF-8');
$odf->setVars('adres', $straat . ' ' . $adres[0], true, 'UTF-8');
$odf->setVars('locatie', $adres[1] . ' ' . $adres[2], true, 'UTF-8');
$odf->setVars('ordernummer', 'IO' . sprintf('%06d', $this->elementnummer) . '/' . $jaar_element, true, 'UTF-8');
$odf->setVars('datum', date('d/m/Y', time()), 'UTF-8');
ob_clean();
$odf->exportAsAttachedFile();
?>