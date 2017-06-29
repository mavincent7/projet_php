<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 07/01/2017
 * Time: 16:03
 */
class Avis
{
    public static function ajouterAvis ($type,$idMusique)
    {
        AvisGateway::insert($type,$idMusique);
    }

    public static function nbAvis($idMusique)
    {
        $resultatNbAvis = array(
            'positifs' => AvisGateway::nbAvisP($idMusique),
            'indifferent' => AvisGateway::nbAvisI($idMusique),
            'negatif' => AvisGateway::nbAvisN($idMusique)
        );
        return $resultatNbAvis;
    }

    public static function suppresionPossible($idMusique)
    {
        $nbAvis = self::nbAvis($idMusique);
        if ($nbAvis['positifs'][0]['cptP'] == 0 && $nbAvis['indifferent'][0]['cptI'] == 0 && $nbAvis['negatif'][0]['cptN'] == 0)
        {
            return true;
        }
        else return false;
    }

    public static function supprimerTousAvis($idMusique)
    {
        AvisGateway::delete($idMusique);
    }

}