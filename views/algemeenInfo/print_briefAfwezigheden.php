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

$gegevens_uitvoerder = $this->gegevens_afwezigheid;
$commentaar_afwezigheid = $this->overzichtCommentaren;
$odf = new odf("brief_opsteller_afwezigheidstoezicht.odt");
foreach ($gegevens_uitvoerder as $value) {
    if ($value['elementnummer'] == $commentaar_afwezigheid[0]['afwezigheidstoezichttekst_elementnummer']) {
        $message = $value['bewoner naam'] . ' ' . $value['bewoner voornaam'];
         $formatted_adres = str_replace('/,', ' ', $value['adres']);
        $adres= preg_split('/\s+/', $formatted_adres);
    } else if (is_null($message)) {
        if ($value['elementnummer'] == $this->elementnummer) {
            $message = $value['bewoner naam'] . ' ' . $value['bewoner voornaam'];
            $formatted_adres = str_replace('/,', ' ', $value['adres']);
            $adres = preg_split('/\s+/', $formatted_adres);
        }
    }
}
$jaar_element = $commentaar_afwezigheid[0]['afwezigheidstoezichttekst_elementjaar'];
$odf->setVars('naamPersoon', $message, true, 'UTF-8');
$odf->setVars('adres', $adres[0] . ' ' . $adres[1], true, 'UTF-8');
$odf->setVars('locatie', $adres[2] . ' ' . $adres[3], true, 'UTF-8');
$odf->setVars('ordernummer', 'IO ' . sprintf('%06d', $this->elementnummer) . '/' . $jaar_element, true, 'UTF-8');
$odf->setVars('datum',date('d/m/Y',time()) ,'UTF-8');
ob_clean();
$odf->exportAsAttachedFile();
?>