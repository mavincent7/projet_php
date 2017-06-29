<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 30/12/2016
 * Time: 16:01
 */
class Utilisateur
{
    public static function seConnecter($login,$mdp)
    {
        $resultatConnexion = UtilisateurGateway::getAdmin($login,$mdp);
        if($resultatConnexion != NULL)
        {
            $_SESSION['login'] = $resultatConnexion->getLogin();
            $_SESSION['mdp'] = $resultatConnexion->getMdp();
        }
        return $resultatConnexion;
    }
}