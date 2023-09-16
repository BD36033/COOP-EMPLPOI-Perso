<?php

Class LieuControleur{

    private $parametre = []; // tableau = $_REQUEST
    private $oModele = []; // propriete de type objet
    private $oVue = []; // propriete de type objet

    public function  __construct($parametre){
        $this->parametre= $parametre;
        //Creation d'un objet, instance de la classe LieuModele
        $this->oModele = new LieuModele($this->parametre);
        //Creation d'un objet, instance de la classe LieuVue
        $this->oVue = new LieuVue($this->parametre);
    }

    public function lister(){
        $listeLieu = $this->oModele->getListeLieu();

        $this->oVue->genererAffichageListe($listeLieu);
    }

    public function form_consulter(){
        $unLieu = $this->oModele->getUnLieu();

        $this->oVue->genererAffichageFiche($unLieu);
    }
    public function form_ajouter(){
       $prepareLieu = new LieuTable();

       $this->oVue->genererAffichageFiche($prepareLieu);
    }

    public function ajouter(){

        $controleLieu = new LieuTable($this->parametre);

        if ($controleLieu->getAutorisationBD() == false) {
            //Retour à la fiche
            $this->oVue->genererAffichageFiche($controleLieu);
        }else{
            //Insertion BD puis retour à la liste des lieux
            $this->oModele->addLieu($controleLieu);
            $this->lister();
        }
    }

    public function form_supprimer(){
        $unLieu = $this->oModele->getUnLieu();

        $this->oVue->genererAffichageFiche($unLieu);
    }

    public function supprimer(){

        $controleLieu = new LieuTable($this->parametre);

        if ($controleLieu->getAutorisationBD() == false){
            //Retour à la fiche
            $this->oVue->genererAffichageFiche($controleLieu);
        }else{
            //Insertion BD puis retour à la liste des lieux
            $this->oModele->deleteLieu($controleLieu);
            $this->lister();
        }
    }

    public function form_modifier(){
        $unLieu = $this->oModele->getUnLieu();

        $this->oVue->genererAffichageFiche($unLieu);
    }

    public function modifier(){

        $controleLieu = new LieuTable($this->parametre);

        if ($controleLieu->getAutorisationBD() == false){
            //Retour à la fiche
            $this->oVue->genererAffichageFiche($controleLieu);
        }else{
            //Insertion BD puis retour à la liste des lieux
            $this->oModele->updateLieu($controleLieu);
            $this->lister();
        }
    }

}