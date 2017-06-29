<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 07/01/2017
 * Time: 16:02
 */
class Musique
{
    public static function toutesLesMusique()
    {
        $resultatToutesMusiques = MusiqueGateway::toutesMusiques();
        return $resultatToutesMusiques;
    }

    public static function detailsMusique($idMusique)
    {
        $resultatDetails = MusiqueGateway::detailsMusique($idMusique);
        return $resultatDetails;
    }

    public static function nouvelleMusique($idArtiste,$titre,$duree,$chemin)
    {
        MusiqueGateway::insert($titre,$duree,$chemin,$idArtiste,NULL);
    }

    public static function delete($idMusique)
    {
        if(Avis::suppresionPossible($idMusique))
        {
            MusiqueGateway::delete($idMusique);

        }
        else
        {
            Avis::supprimerTousAvis($idMusique);
        }
    }
}