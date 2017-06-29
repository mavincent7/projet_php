<?php
/**
 * Appel de l'en tête et du header
 */
echo outilsHTML::enteteHTML("Spot Hi-Fi - Admin","UTF-8","vues/bootstrap/css/bootstrap.min.css");
echo outilsHTML::headerHtml();

?>

<h1 class="text-center">Accueil du site <small>Version administrateur</small></h1>

<?php

/**
 * Affichage de toutes les musiques, de ses commentaires et des options qu'un utilisateur peut réaliser dessus.
 */

for ($cpt = 0; $cpt < $i; $cpt++)
{
    echo '<div class="container breadcrumb"><h3>'.$resultArtiste[$cpt][0]['Pseudo'];

    echo ' - '. $resultatToutesMusiques[$cpt]['Titre']. '</h3>' .
        '<h4 class="">Durée : ' . $resultatToutesMusiques[$cpt]['Duree']. ' min' . "</h4>";
    $chemin = $resultatToutesMusiques[$cpt]['Chemin'];

    echo '<br/>';
    echo"<audio controls class='lecteur'>
                        <source src=\"$chemin\" type=\"audio/mp3\">
                    </audio>";

    echo "<h5 class=''>Mise en ligne : ".$resultatToutesMusiques[$cpt]['MiseEnLigne']."</h5><br/>";
    echo "<div class='container'>";
    echo "<div class='col-xs-12 col-md-4'>Avis donnés par les visiteurs : </div>";
    echo "<div class='col-xs-12 col-md-8'>".
        "<div class=\"label label-danger spaced\">- : ".$nbAvis[$cpt]['negatif'][0]['cptN']."</div>".

        "<div class=\"label label-warning spaced\">| : ".$nbAvis[$cpt]['indifferent'][0]['cptI']."</div>".

        "<div class=\"label label-success spaced\">+ : ".$nbAvis[$cpt]['positifs'][0]['cptP']."</div>".
        "</div></div>";
    echo "<br/>";
    echo "<table class='table-hover'>";
    echo "<tr><th>Les 3 derniers commentaires sur cette musique</th></tr>";
    foreach ($resultCommentaire[$cpt] as $rowCommentaire)
    {
        echo "<tr><td>". $rowCommentaire['Commentaire'] ."</td></tr>";
    }
    echo '</table>';
    outilsHTML::optionAdmin($resultatToutesMusiques[$cpt]['id_Musique']);
    echo "</div>";
    echo "<br/>";
}
echo "</div>";

echo outilsHTML::footerHtml();
echo outilsHTML::finDeFichierHtml();
?>