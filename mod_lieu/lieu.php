<?php
//Routeur pour le lieu
class Lieu{

    private $parametre = [];
    private $oControleur;

    public function __construct($parametre){
        //initialisation de la propriété paramètre
        $this->parametre =$parametre;
        //création d'un objet, instance de la classe LieuControleur
        $this->oControleur = new LieuControleur($this->parametre);
    }


public function choixAction(){
    //Les differentes action possible (type switch)
    if(isset($this->parametre['action'])){
        //Traitement des differentes action
        switch ($this->parametre['action']){
            case 'form_consulter':
                $this->oControleur->form_consulter();
                break;
            case 'form_ajouter':
                $this->oControleur->form_ajouter();
                break;
            case 'ajouter':
                $this->oControleur->ajouter();
                break;
            case 'form_supprimer':
                $this->oControleur->form_supprimer();
                break;
            case 'supprimer':
                $this->oControleur->supprimer();
                break;
            case 'form_modifier':
                $this->oControleur->form_modifier();
                break;
            case 'modifier':
                $this->oControleur->modifier();
                break;
        }
    } else {
        $this->oControleur->lister();
        }
    }
}