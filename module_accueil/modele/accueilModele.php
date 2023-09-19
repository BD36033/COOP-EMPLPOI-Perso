<?php

/*
 * Modèle du module accueil
 */

class accueilModele extends Modele{

    private $parametre = array();

    function __construct($parametre){

        $this->parametre = $parametre;

    }
}