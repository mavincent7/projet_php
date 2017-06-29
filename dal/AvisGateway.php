<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 09/01/2017
 * Time: 08:47
 */
class AvisGateway
{
    /**
     * Insérer un nouvel avis
     * @param $type
     * @param $idMusique
     * @return string
     */
    public static function  insert($type,$idMusique)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'INSERT INTO avis VALUES (:id_Avis,:Avis,:id_Musique)';
        $co->executeQuery($query,array(':id_Avis'=>array(NULL,PDO::PARAM_INT),
            ':Avis'=>array($type,PDO::PARAM_STR),
            ':id_Musique'=>array($idMusique,PDO::PARAM_INT)));
        return $co->lastInsertId();
    }

    /**
     * Calcul des avis positifs
     * @param $idMusique
     * @return mixed
     */
    public static function nbAvisP($idMusique)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'SELECT COUNT(DISTINCT id_Avis) cptP FROM avis WHERE Type = "P" AND id_Musique = :idMusique';
        $co->executeQuery($query,array(':idMusique'=>array($idMusique,PDO::PARAM_INT)));
        $result = $co->getResult();
        return $result;
    }

    /**
     * Calcul des avis indifférents
     * @param $idMusique
     * @return mixed
     */
    public static function nbAvisI($idMusique)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'SELECT COUNT(DISTINCT id_Avis) cptI FROM avis WHERE Type = "I" AND id_Musique = :idMusique';
        $co->executeQuery($query,array(':idMusique'=>array($idMusique,PDO::PARAM_INT)));
        $result = $co->getResult();
        return $result;
    }

    /**
     * Calcul des avis négatifs
     * @param $idMusique
     * @return mixed
     */
    public static function nbAvisN($idMusique)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'SELECT COUNT(DISTINCT id_Avis) cptN FROM avis WHERE Type = "N" AND id_Musique = :idMusique';
        $co->executeQuery($query,array(':idMusique'=>array($idMusique,PDO::PARAM_INT)));
        $result = $co -> getResult();
        return $result;
    }

    /**
     * Supprimer un avis
     * @param $idMusique
     */
    public static function delete($idMusique)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'DELETE FROM avis WHERE id_Musique = :id_Musique';
        $co->executeQuery($query,array(':id_Musique'=>array($idMusique,PDO::PARAM_INT)));
    }
}