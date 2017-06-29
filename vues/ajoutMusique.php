<?php
/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 14/01/2017
 * Time: 21:32
 */

echo outilsHTML::enteteHTML("Ajout d'une musique","UTF-8","vues/bootstrap/css/bootstrap.min.css");
echo outilsHTML::headerHtml();

?>

<!-- Formulaire d'ajout d'une musique -->
<h1 class="text-center">Ajout d'une musique</h1>
<div class="container">
    <form class="form-horizontal col-sm-6 col-sm-offset-2" method="post">
        <div class="form-group">
            <label class="col-sm-4 control-label">Artiste</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="artiste" placeholder="Artiste">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Titre</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="titreMusique" placeholder="Titre">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Durée</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="dureeMusique" placeholder="Durée">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Chemin de la musique</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="cheminMusique" placeholder="Chemin de la musique">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-10">
                <input class="btn btn-default" type="submit" name='action' value="Création"/>
            </div>
        </div>
    </form>
</div>

<?php
echo outilsHTML::footerHtml();
echo outilsHTML::finDeFichierHtml();
?>
