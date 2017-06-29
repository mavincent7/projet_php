<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 09/01/2017
 * Time: 09:20
 */
class CommentaireGateway
{
    /**
     * Insérer un nouveau commentaire
     * @param $txtCommentaire
     * @param $idMusique
     */
    public static function  insert($txtCommentaire,$idMusique)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $nbCommentaire = self::nbCommentaire($idMusique);
        if ($nbCommentaire[0]['cpt'] < 3)
        {
            $query = 'INSERT INTO commentaire VALUES (:id_Commentaire,:Commentaire,:id_Musique)';
            $co->executeQuery($query,array(':id_Commentaire'=>array(NULL,PDO::PARAM_INT),
                ':Commentaire'=>array($txtCommentaire,PDO::PARAM_STR),
                ':id_Musique'=>array($idMusique,PDO::PARAM_INT)));
        }
        else
        {
            $query = 'INSERT INTO commentaire VALUES (:id_Commentaire,:Commentaire,:id_Musique)';
            $co->executeQuery($query,array(':id_Commentaire'=>array(NULL,PDO::PARAM_INT),
                ':Commentaire'=>array($txtCommentaire,PDO::PARAM_STR),
                ':id_Musique'=>array($idMusique,PDO::PARAM_INT)));
                $dernierElement = $co->lastInsertId();
                self::delete($dernierElement-3);
        }
    }

    /**
     * Supprimer un commentaire
     * @param $idCommentaire
     */
    public static function delete($idCommentaire)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'DELETE FROM commentaire WHERE id_Commentaire = :idCommentaire';
        $co->executeQuery($query,array(':idCommentaire'=>array($idCommentaire,PDO::PARAM_INT)));
    }

    /**
     * Récupérer tous les commentaire d'une musique
     * @param $idMusique
     * @return mixed
     */
    public static function tousCommentaire($idMusique)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'SELECT id_Commentaire, Commentaire FROM commentaire WHERE id_Musique = :idMusique';
        $co->executeQuery($query,array(':idMusique'=>array($idMusique,PDO::PARAM_INT)));
        $result = $co->getResult();
        return $result;
    }

    /**
     * Récupérer le nombre de commentaires d'une musique
     * @param $idMusique
     * @return mixed
     */
    public static function nbCommentaire ($idMusique)
    {
        $co = new Connection(Config::getInfoBDD()['dbname'],Config::getInfoBDD()['login'],Config::getInfoBDD()['mdp']);
        $query = 'SELECT COUNT(*) cpt FROM commentaire WHERE id_Musique = :idMusique';
        $co->executeQuery($query,array(':idMusique'=>array($idMusique,PDO::PARAM_INT)));
        $result = $co->getResult();
        return $result;
    }
}