<?php

/*
 * Vu du module accueil
 */

class accueilVue{

    private $parametre = []; //Tableau qui est égal à $_REQUEST
    private $tpl; //Propriété de type objet Smarty (=template)

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

        $this->tpl = new Smarty();

    }

    public function genererAffichageListe()
    {
        $this->tpl->assign('bonjour', 'message de bonjour');

        $this->tpl->display('module_accueil/vue/accueilVue.tpl');

    }
}