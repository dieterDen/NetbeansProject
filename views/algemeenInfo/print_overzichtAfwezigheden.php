<html>
<link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css"/>
<body style="background-color: #ffffff;">
<?php

/*
  //$commentaren->$this->overzichtCommentaren($element[$var]);
  $listeArticles = $this->overzichtAfwezigheden;
  $commentaren = $this->overzichtCommentaren;
  //print_r($commentaren);

  foreach ($listeArticles as $index => $element) {
  $elementnummer = $element['elementnummer'];
  $element['commentaar']='5';
  //echo $element['bewoner naam'];
  //echo $element['bewoner voornaam'];
  foreach ($commentaren as $commentaar) {
  if ($commentaar['afwezigheidstoezichttekst_elementnummer'] == $elementnummer['elementnummer']) {


  }

  }
  echo $element['commentaar'];
  }
 */
//print_r($listeArticles);
//
//
// Make sure you have Zip extension or PclZip library loaded
// First : include the librairy
//require_once 'library/odf.php';
$listeArticles = $this->overzichtAfwezigheden;
echo '<p style="font-size:30px";><b>Overzicht vakantietoezicht</b></p>';
echo "<p>Aantal vakantietoezichten: " . count($listeArticles) . "<br />";
foreach ($listeArticles as $row) {
    $string_artikel = implode(' ', array_slice($row, 0, 4));
    $sub_array = explode(",", substr_replace($string_artikel, ',', strpos($string_artikel, ' '), 0));
    $resterend_array = array_slice($row, 4, 5);
    $new_array = array_merge($sub_array, $resterend_array);
   //print_r($new_array);
    foreach ($this->overzichtCommentaren as $row) {
        if ($row['afwezigheidstoezichttekst_elementnummer'] == $new_array[0]) {
            $commentaren = $commentaren . ' ' . $row['afwezigheidstoezichttekst_tekst'] . '; ';
        }
    }
    echo "<table id='overzichtAfwezigheden' style='width:100%;border-collapse:true;'>"
    . "<tr><th style='text-align:left;'>Toezicht " . $new_array[0] . ": bezocht: " . $new_array['bezocht'] . ", dagen geleden: " . $new_array['dagen geleden'] . "</th><th style='text-align:left';>Details</th></tr>"
    . "<tr><td>Toezicht</td><td>" . $new_array[0] . "</td><tr/>"
    . "<tr><td>Gegevens</td><td>" . $new_array[1] . "</td></tr>"
    . "<tr><td>Begindatum</td><td>" . $new_array['begindatum'] . "</td></tr>"
    . "<tr><td>Einddatum</td><td>" . $new_array['afwezigheidstoezicht_elementeinddatum'] . "</td></tr>"
    . "<tr><td>Details</td><td>" . $new_array['details en commentaar'] . "</td></tr>"
    . "<tr><td>Commentaren</td><td>" . $commentaren . "</td></tr>"
    . "</table><br />";
}












//print_r($string_artikels);
//$aantalAfwezigheden=count($listeArticles);
/* $odf = new odf("tutoriel6.odt");

  $odf->setVars('titre', 'Rapport vakantietoezicht');

  $message = "Aantal vakantietoezichten: ".$aantalAfwezigheden;

  $odf->setVars('message', $message);


  foreach ($listeArticles AS $element) {
  $article = $odf->setSegment('articles');

  $keys = array_keys($element);
  foreach ($element as $var) {


  $article->titreArticle(array_search($var, $element));
  $article->texteArticle($var);

  $article->merge();
  }
  }
  $odf->mergeSegment($article);


  // We export the file
  ob_clean();
  $odf->exportAsAttachedFile(); */
?>



</body>
</html>
