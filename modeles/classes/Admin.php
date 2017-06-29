<?php

/**
 * Created by PhpStorm.
 * User: Mathieu Vincent
 * Date: 15/01/2017
 * Time: 14:43
 */
class Admin
{
    private $login;
    private $mdp;

    public function __construct($login, $mdp) {
        $this->login = $login;
        $this->mdp = $mdp;
    }
    public function getLogin() {
        return $this->login;
    }

    public function getMdp() {
        return $this->mdp;
    }
}