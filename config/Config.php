<?php
/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 29/12/2016
 * Time: 11:38
 */
class Config {
    private static $tabErreur = array();

    public static function ajouterErreur($erreur)
    {
        self::$tabErreur[] = $erreur;
    }

    public static function getErreur() {
        return self::$tabErreur;
    }

    public static function getVues($vue)
    {
        $rep = __DIR__.'/../vues/';
        switch ($vue)
        {
            case 'erreur' : return $rep.'erreur.php'; break;
            case 'accueil' : return $rep.'accueil.php'; break;
            case 'identification' : return $rep.'identification.php'; break;
            case 'accueilAdmin' : return $rep.'accueilAdmin.php'; break;
            case 'suppression' : return $rep.'suppression.php'; break;
            case 'details' : return $rep.'detailMusique.php'; break;
            case 'ajout': return $rep.'ajoutMusique.php'; break;
            case 'succes': return $rep.'connexionSucces.php'; break;        }
    }

    public static function getInfoBDD()
    {
        return array(
            'dbname' => 'projetphp2',
            'login' => "root",
            'mdp' => "mdp"
        );
    }
}
