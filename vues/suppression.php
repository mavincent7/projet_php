<?php

echo outilsHTML::enteteHTML("Page de suppression","UTF-8","vues/bootstrap/css/bootstrap.min.css");
echo outilsHTML::headerHtml();
?>
<div class="container">
<h2 class="text-center">Page de suppresion</h2>

<!-- Message d'information : Une musique ne doit plus avoir de commentaire pour être supprimée -->
<h3 class="text-center breadcrumb">Suppression d'un commentaire</h3>
<p class="alert alert-warning">Vous devez supprimer tous les commentaires avant de supprimer une musique</p>

<?php
/**
 * Liste des commentaires d'une musique
 */
foreach ($resultatCommentaire as $rowCommentaire)
{
    echo "<div class='container'>";
    echo "<form method=\"post\" name=\"action\">";
    echo "<p class='breadcrumb col-xs-12 col-md-8'>". $rowCommentaire['Commentaire'] ."</p>";
    echo "<input type=\"hidden\" name=\"idCommentaireASupprimer\" value=".$rowCommentaire['id_Commentaire'].">";
    echo "<input class='btn btn-danger col-xs-6 col-xs-offset-3 col-md-4' type=\"submit\" name=\"action\" value=\"Supprimer le commentaire\" />";
    echo "</form>";
    echo "</div>";
}
?>
    <!-- Suppression de la musique -->
<h3 class="text-center breadcrumb">Supprimer la musique</h3>
<p>
    <form method="post" name="action">
    <?php
    echo "<input type=\"hidden\" name=\"idMusiqueASupprimer\" value=".$idMusiqueCommentaireASupprimer.">";
    ?>
    <input class="btn btn-danger col-md-6 col-md-offset-3" type="submit" name="action" value="Supprimer la musique">
    </form>
</p>
</div>
<?php

echo outilsHTML::footerHtml();
echo outilsHTML::finDeFichierHtml();
?>


