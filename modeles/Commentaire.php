<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 07/01/2017
 * Time: 16:03
 */
class Commentaire
{
    public static function ajouterCommentaire ($txtCommentaire,$idMusique)
    {
        CommentaireGateway::insert($txtCommentaire,$idMusique);
    }

    public static function commentaireMusique($idMusique)
    {
        $resultatCommentaire = CommentaireGateway::tousCommentaire($idMusique);
        return $resultatCommentaire;
    }

    public static function supprimerCommentaire ($idCommentaire)
    {
        CommentaireGateway::delete($idCommentaire);
    }
}