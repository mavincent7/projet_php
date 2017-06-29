<?php
echo outilsHTML::enteteHTML('Connecté avec succès', 'UTF-8', 'vues/bootstrap/css/bootstrap.min.css');
echo outilsHTML::headerHtml();

?>

<!-- Page d'information : L'administrateur c'est connecté avec succès-->
<div class="container">
    <h2 class="alert alert-success col-sm-6 col-sm-offset-3 text-center">Vous êtes connecté</h2><br/>

    <a class="text-center col-sm-6 col-sm-offset-3" href="index.php?action=admin_accueil">Aller à l'accueil administrateur</a>
</div>

<?php
echo outilsHTML::footerHtml();
echo outilsHTML::finDeFichierHtml();
?>
