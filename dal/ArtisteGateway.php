<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 12/01/2017
 * Time: 19:50
 */
class ArtisteGateway
{
    /**
     * Insérer un nouvel artiste dans la BDD
     * @param $nom
     * @param $prenom
     * @param $pseudo
     * @return string
     */
     public static function  insert($nom,$prenom,$pseudo)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'INSERT INTO artiste VALUES (:id_Artiste,:Nom,:Prenom, :Pseudo)';
        $co->executeQuery($query,array(':id_Artiste'=>array(NULL,PDO::PARAM_INT),
            ':Nom'=>array($nom,PDO::PARAM_STR),
            ':Prenom'=>array($prenom,PDO::PARAM_STR),
            ':Pseudo'=>array($pseudo,PDO::PARAM_STR)));
        return $co->lastInsertId();
    }

    /**
     * Récupérer les détails d'un artiste
     * @param $idArtiste
     * @return mixed
     */
    public static function detailsArtiste($idArtiste)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'SELECT Nom, Prenom, Pseudo FROM artiste WHERE id_Artiste = :id_Artiste';
        $co->executeQuery($query,array(':id_Artiste'=>array($idArtiste,PDO::PARAM_INT)));
        $result = $co -> getResult();
        return $result;
    }

    /**
     * Permet de vérifier si un artiste existe
     * @param $pseudo
     * @return mixed
     */
    public static function exist($pseudo)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'SELECT COUNT(*) cpt FROM artiste WHERE Pseudo = :Pseudo';
        $co->executeQuery($query,array(':Pseudo'=>array($pseudo,PDO::PARAM_STR)));
        $result = $co->getResult();
        return $result;
    }

    /**
     * Récupérer un artiste
     * @param $pseudo
     * @return mixed
     */
    public static function getArtiste($pseudo)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'SELECT id_Artiste FROM artiste WHERE Pseudo = :Pseudo';
        $co->executeQuery($query,array(':Pseudo'=>array($pseudo,PDO::PARAM_STR)));
        return $co -> getResult();
    }
}