<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 07/01/2017
 * Time: 16:03
 */
class Artiste
{
    public static function detailsArtiste($idArtiste)
    {
        $resultatArtisteDuneMusique = ArtisteGateway::detailsArtiste($idArtiste);
        return $resultatArtisteDuneMusique;
    }

    public static function insert($pseudo)
    {
        $id = ArtisteGateway::insert(NULL,NULL,$pseudo);
        return $id;
    }

    public static function exist($pseudo)
    {
        $resultatExistArtiste = ArtisteGateway::exist($pseudo);
        if($resultatExistArtiste[0]['cpt'] != 1)
        {
            $id = self::insert($pseudo);
        }
        else
        {
            $resultId = ArtisteGateway::getArtiste($pseudo);
            $id = $resultId[0]['id_Artiste'];
        }
        return $id;
    }
}
