<html>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css"/>
    <body style="background-color: #ffffff;">
        <?php
        $listeArticles = $this->overzichtAfwezigheden;

        echo '<p style="font-size:30px";><b>Overzicht afwezigheidstoezicht</b></p>';
        echo "<p>Aantal vakantietoezichten: " . count($listeArticles) . "<br />";

        foreach ($listeArticles as $row) {
            $datum = null;
            $commentaren = null;
            $row['adres'] = str_replace('/,', ' ', $row['adres']);
            $string_artikel = implode(' ', array_slice($row, 0, 4));
            $sub_array = explode(",", substr_replace($string_artikel, ',', strpos($string_artikel, ' '), 0));
            $resterend_array = array_slice($row, 4, 5);
            $new_array = array_merge($sub_array, $resterend_array);

            foreach ($this->overzichtCommentaren as $row) {
                if ($row['afwezigheidstoezichttekst_elementnummer'] == $new_array[0]) {
                    $datum[] = $row['datum'];
                    $commentaren[] = $row['afwezigheidstoezichttekst_tekst'];
                }
            }
            echo "<table id='overzichtAfwezigheden' style='width:100%;border-collapse:true;'>"
            . "<tr><th colspan='2'; style='text-align:left;'>Toezicht " . $new_array[0] . ": bezocht: " . $new_array['bezocht'] . ", dagen geleden: " . $new_array['dagen geleden'] . "</th><th></th></tr>"
            . "<tr><td class='br_afw'>Locatie</td><td>" . $new_array[1] . "</td></tr>"
            . "<tr><td class='br_afw'>Begindatum</td><td>" . $new_array['begindatum'] . "</td></tr>"
            . "<tr><td class='br_afw'>Einddatum</td><td>" . $new_array['einddatum'] . "</td></tr>"
            . "<tr><td class='br_afw'>Details</td><td>" . $new_array['details en commentaar'] . "</td></tr>"
            . "<tr><td colspan='2'>Commentaren</td></tr>"
            . "<tr><td class='br_afw' rowspan='2'>";
            foreach ($datum as $key) {
                echo $key . '<br />';
            }
            echo "</td><td rowspan='2'>"; 
            foreach ($commentaren as $value) {
                echo $value . '<br />';
            }
            echo "</td></tr></table><br />";
        }
        ?>

    </body>
</html>
