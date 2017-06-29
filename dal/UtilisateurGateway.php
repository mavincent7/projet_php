<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 14/01/2017
 * Time: 00:08
 */
class UtilisateurGateway
{
    /**
     * getAdmin
     * @param $login
     * @param $mdp
     * @return Admin|null
     */
    public static function getAdmin($login,$mdp)
    {

        if (empty($login) || empty($mdp))
        {
            return NULL;
        }


        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);

        $query = 'SELECT COUNT(id_Admin) cpt FROM administrateur WHERE Login = :Login AND Mdp = :Mdp';
        $co->executeQuery($query,array(':Login'=>array($login,PDO::PARAM_STR),
                                        ':Mdp'=>array($mdp,PDO::PARAM_STR)));

        $resultNb = $co->getResult();


        if($resultNb[0]['cpt'] == 1)
        {
            return new Admin($login, $mdp);
        }

        else return NULL;

    }
}
