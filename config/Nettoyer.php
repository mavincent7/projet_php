<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 30/12/2016
 * Time: 15:54
 */
class Nettoyer
{
    public static function nettoyerString($string)
    {
        return filter_var($string, FILTER_SANITIZE_STRING);
    }
}