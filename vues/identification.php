<?php
    require_once (__DIR__.'/../vues/outilsHTML.php');
    echo outilsHTML::enteteHTML('Page identification',"UTF-8","vues/bootstrap/css/bootstrap.min.css");
    echo outilsHTML::headerHtml();
?>
    <!-- Formulaire de connexion -->

    <h1 class="text-center">Page d'identification</h1>
    <div class="container">
    <form class="form-horizontal col-sm-4 col-sm-offset-4 breadcrumb" method="post" name="/controleur/FrontController.php">
        <div class="form-group">
            <label class="col-sm-4 control-label">Login</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="login" placeholder="Login">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Mot de passe</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="mdp" placeholder="Mot de passe">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input class="btn btn-default" type="submit" name='action' value="Connexion"/>
            </div>
        </div>
    </form>
    </div>

<?php
    echo outilsHTML::footerHtml();
    echo outilsHTML::finDeFichierHtml();
?>

