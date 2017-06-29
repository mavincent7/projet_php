<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 30/12/2016
 * Time: 11:41
 */
class MusiqueGateway
{
    /**
     * Insérer une nouvelle musique
     * @param $titre
     * @param $duree
     * @param $chemin
     * @param $idArtiste
     * @param $idAlbum
     */
    public static function  insert($titre,$duree,$chemin,$idArtiste,$idAlbum)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'INSERT INTO musique VALUES (:id_Musique,:Titre,:Duree,:Chemin,NOW(),:id_Artiste,:id_Album)';

        $co->executeQuery($query,array(':id_Musique'=>array(NULL,PDO::PARAM_NULL),
                                                ':Titre'=>array($titre,PDO::PARAM_STR),
                                                ':Duree'=>array($duree,PDO::PARAM_INT),
                                                ':Chemin'=>array($chemin,PDO::PARAM_STR),
                                                ':id_Artiste'=>array($idArtiste,PDO::PARAM_INT),
                                                ':id_Album'=>array($idAlbum,PDO::PARAM_INT)));
        $co->lastInsertId();
    }


    /**
     * Supprimer une musique
     * @param $id
     */
    public static function delete($id)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'DELETE FROM musique 
                  WHERE id_Musique = :id_Musique';

        $co->executeQuery($query,array(':id_Musique'=>array($id,PDO::PARAM_INT)));
    }

    /**
     * Récupérer toutes les musiques
     * @return mixed
     */
    public static function toutesMusiques()
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'SELECT id_Musique , Titre ,Duree ,Chemin,MiseEnLigne, id_Artiste 
                   FROM musique';
        $co->executeQuery($query,array());
        $result = $co->getResult();
        return $result;
    }

    /**
     * Récupérer les détails d'une musiques
     * @param $idMusique
     * @return mixed
     */
    public static function detailsMusique($idMusique)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'SELECT id_Musique, Titre, Duree,MiseEnLigne, id_Artiste, id_Album FROM musique WHERE id_Musique = :idMusique';
        $co->executeQuery($query,array(':idMusique'=>array($idMusique,PDO::PARAM_INT)));
        $result = $co->getResult();
        return $result;
    }
}