<?php
/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 30/12/2016
 * Time: 16:01
 */
class MdlAdmin
{
    private $login;
    private $mdp;

    public function __construct($login,$mdp)
    {
        $this->login = $login;
        $this->mdp = $mdp;
    }

    public static function deconnexion()
    {
        session_unset();
        session_destroy();
        $_SESSION = array();
        $CtrlUtilisateur = new CtrlUtilisateur('NULL');
    }

    public static function isAdmin() {
        if(isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
            $login = Nettoyer::nettoyerString($_SESSION['login']);
            $mdp =  Nettoyer::nettoyerString($_SESSION['mdp']);
            return new Admin($login, $mdp);
        }
        else return NULL;
    }
}