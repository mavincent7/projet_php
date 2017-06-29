<?php
echo outilsHTML::enteteHTML('Erreur', 'UTF-8', 'vues/bootstrap/css/bootstrap.min.css');
echo outilsHTML::headerHtml();
?>

<h1>ERREUR</h1>

<div class="container">
<?php

/**
 * Affiche un message d'erreur
 */

$erreurTab = Config::getErreur();
if (isset($erreurTab)) {
    foreach ($erreurTab as $value) {
        echo "<p>" . $value . "</p>";
    }
}

echo "</div>";
echo outilsHTML::footerHtml();
echo outilsHTML::finDeFichierHtml();
?>
