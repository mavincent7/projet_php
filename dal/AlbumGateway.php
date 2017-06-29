<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 12/01/2017
 * Time: 19:50
 */
class AlbumGateway
{
    /**
     * Insérer un nouvel album dans la BDD
     * @param $titre
     * @param $duree
     * @param $couverture
     * @param $annee
     * @param $idArtiste
     * @return string
     */
    public static function  insert($titre,$duree,$couverture,$annee,$idArtiste)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'INSERT INTO album VALUES (:id_Album,:Titre,:Couverture, :Annee_Parution, :id_Artiste)';
        $co->executeQuery($query,array(':id_Album'=>array(NULL,PDO::PARAM_INT),
            ':Titre'=>array($titre,PDO::PARAM_STR),
            ':Duree'=>array($duree,PDO::PARAM_INT),
            ':Couverture'=>array($couverture,PDO::PARAM_STR),
            ':Annee_Parution'=>array($annee,PDO::PARAM_INT),
            ':id_Artiste'=>array($idArtiste,PDO::PARAM_INT)));
        return $co->lastInsertId();
    }

    /**
     * Récupérer les détails d'un album
     * @param $idAlbum
     * @return mixed
     */
    public static function detailAlbum($idAlbum)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'SELECT id_Album, Titre, Duree, Couverture, Annee_Parution, id_Artiste FROM album WHERE id_Album = :id_Album';
        $co->executeQuery($query,array(':id_Album'=>array($idAlbum,PDO::PARAM_INT)));
        $resultDetailsAlbum = $co->getResult();
        return $resultDetailsAlbum;
    }
}