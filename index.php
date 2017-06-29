<?php
/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 14/12/2016
 * Time: 14:29
 */

    require_once (__DIR__.'/config/Autoload.php');
    Autoload::charger();

    //Chargement du controleur
    $frontCtrl = new FrontController();
?>