<?php
/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 12/01/2017
 * Time: 13:37
 */

echo outilsHTML::enteteHTML('Détails de la musique', "UTF-8", "vues/bootstrap/css/bootstrap.min.css");
echo outilsHTML::headerHtml();


/**
 * Affichage des détails d'une musique
 */

$detailCode = "<div class=\"container\">";
$detailCode .= "<h1 class='text-center breadcrumb'> Détails de la musique</h1>";
$detailCode .= "<h2>Artiste : " . $resultatsArtiste[0]['Pseudo'] . "</h2>";
$detailCode .= "<h3>Titre : " . $resultatsMusique[0]['Titre'] . "</h3>";
$detailCode .= "<h3> Durée : ".$resultatsMusique[0]['Duree']."</h3>";
$detailCode .= "<div class=\"row\">";
$detailCode .= "<h1 class='text-center breadcrumb'> Détails de l'album </h1>";
$detailCode .= "</div>";
$detailCode .= "<div class=\"row\">";
$detailCode .= "<div class='col-xs-4 col-md-4'><img class='img-responsive' src=" . $resultatsAlbum[0]['Couverture'] . "></div>";
$detailCode .= "<div class=\"col-xs-8 col-md-8\">";
$detailCode .= "<h2>Titre : ".$resultatsAlbum[0]['Titre']."</h2>";
$detailCode .= "<h3>Année de parution : ".$resultatsAlbum[0]['Annee_Parution']."</h3>";
$detailCode .= "</div>";
$detailCode .= "</div>";
$detailCode .= "</div>";

echo "$detailCode";


echo outilsHTML::footerHtml();
echo outilsHTML::finDeFichierHtml();
?>