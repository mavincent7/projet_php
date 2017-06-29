<?php
/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 30/12/2016
 * Time: 16:36
 */
class outilsHTML {

    public static function enteteHTML($title,$charset,$css_sheet)
    {
        $htmlCode = "<!DOCTYPE html>\n<html lang=\"fr\">\n<head>";
        $htmlCode .= "<meta charset=\"" . $charset . "\">\n";
        $htmlCode .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $css_sheet . "\"/>\n";
        $htmlCode .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"vues/style.css\"/>\n";
        $htmlCode .= "<title>" . $title . "</title>\n";
        $htmlCode .= "</head>\n<body>\n";
        return $htmlCode;
    }

    public static function headerHtml()
    {
        $headerCode = "<header>\n<h1><a href=\"index.php\">Spot Hi-Fi</a> </h1>\n<p>\n";
        $headerCode .= "</p>\n</header>";
        $headerCode .= "<ul class=\"nav nav-tabs\">";
        $headerCode .= "<li role=\"presentation\"><a href=\"index.php\">Accueil</a></li>";
        $headerCode .= "<li role=\"presentation\"><a href=\"index.php?action=admin_accueil\">Accueil Admin</a></li>";
        $headerCode .= "<li role=\"presentation\"><a href=\"index.php?action=identification\">Identification</a></li>";
        $headerCode .= "<li role=\"presentation\"><a href=\"index.php?action=deconnexion\">Déconnexion</a></li>";
        $headerCode .= "<li role=\"presentation\"><a href=\"index.php?action=ajout\">Ajout</a></li>";
        $headerCode .= "</ul>";
        return $headerCode;
    }

    public static function footerHtml()
    {
        $codeFooter = "<footer class='container-fluid'>\n";
        $codeFooter .= "<div class='text-center'>\nMathieu VINCENT\n</div>\n";
        $codeFooter .= "<p class='text-center'>\nGroupe 7\n</p>\n";
        $codeFooter .= "</footer>\n";

        return $codeFooter;
    }

    public static function finDeFichierHtml()
    {
        return "</body>\n</html>\n";
    }

    /**
     * Options d'un utilisateur sur une musique (avis, commentaire, détails)
     * @param $idMusique
     */
    public static function optionUtilisateur($idMusique) {
        echo "<form method=\"post\" class='options'>";
        echo '<div class="col-xs-12 col-md-6">';
        echo "<input type=\"text\" class='form-control ' name='textCommentaire' placeholder=\"Votre commentaire ici\" />";
        echo "<input type=\"hidden\" name=\"idMusique\" value=".$idMusique." />";
        echo '</div>';
        echo '<div class="col-xs-12 col-md-6">';
        echo "<input class='btn btn-default spaced' type=\"submit\" name='action' value=\"Commenter\" />";
        echo "<input class='btn btn-danger spaced' type=\"submit\" name='action' value=\"Négatif\" />";
        echo "<input class='btn btn-warning spaced' type=\"submit\" name='action' value=\"Indifférent\" />";
        echo "<input class='btn btn-success spaced' type=\"submit\" name='action' value=\"Positif\" />";
        echo "<input class='btn btn-default spaced' type='submit' name='action' value='Détails' />";
        echo '</div>';

        echo "</form>";
    }

    /**
     * Options de l'admin sur une musique (avis, commentaire, détails)
     * @param $idMusique
     */
    public static function optionAdmin($idMusique) {
        echo "<form method=\"post\" class='options'>";
        echo '<div class="col-xs-12 col-md-6">';
        echo "<input type=\"text\" class='form-control' name='textCommentaire' placeholder=\"Votre commentaire ici\" />";
        echo "<input type=\"hidden\" name=\"idMusique\" value=".$idMusique." />";
        echo '</div>';
        echo '<div class="col-xs-12 col-md-6">';
        echo "<input class='btn btn-default spaced' type=\"submit\" name='action' value=\"Commenter\" />";
        echo "<input class='btn btn-danger spaced' type=\"submit\" name='action' value=\"Négatif\" />";
        echo "<input class='btn btn-warning spaced' type=\"submit\" name='action' value=\"Indifférent\" />";
        echo "<input class='btn btn-success spaced' type=\"submit\" name='action' value=\"Positif\" />";
        echo "<input class='btn btn-danger spaced' type='submit' name='action' value='Supprimer' />";
        echo '</div>';

        echo "</form>";
    }
}