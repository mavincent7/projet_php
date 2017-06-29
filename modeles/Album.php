<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 07/01/2017
 * Time: 16:02
 */
class Album
{
    public static function detailsAlbum($idAlbum)
    {
        $resultatArtisteDuneMusique = AlbumGateway::detailAlbum($idAlbum);
        return $resultatArtisteDuneMusique;
    }
}