<?php
Class LieuVue{
    private $parametre = [];
    private $tpl; //propriété de type objet (smarty)
    public function __construct($parametre)
    {
        $this->parametre = $parametre;

        $this->tpl = new Smarty();
    }
    //preparation login
    public function chargementValeurs(){
        $this->tpl->assign('deconnexion', 'Deconnexion');

        $this->tpl->assign('login', $_SESSION['prenomNom']);

        $this->tpl->assign('titreVue', $_SESSION['']);
    }

    public function genererAffichageListe($valeurs){
//        $this->chargementValeurs();
        $this->tpl->assign('titrePage', 'Liste des lieux');

        $this->tpl->assign('listeLieux', $valeurs);

        $this->tpl->display('mod_lieu/vue/lieuListeVue.tpl');
    }


    public function genererAffichageFiche($valeurs){
//        $this->chargementValeurs();

        switch ($this->parametre['action']){
            case 'form_consulter':
                $this->tpl->assign('action','consulter');

                $this->tpl->assign('readonly','disabled');

                $this->tpl->assign('titrePage','Fiche lieu: Consultation');

                $this->tpl->assign('unLieu', $valeurs);

                break;
            case 'form_ajouter':
            case 'ajouter':
            $this->tpl->assign('action','ajouter');

            $this->tpl->assign('readonly','');

            $this->tpl->assign('titrePage','Fiche lieu: Création');

            $this->tpl->assign('unLieu', $valeurs);
            break;

            case 'form_supprimer':
            case 'supprimer':
            $this->tpl->assign('action','supprimer');

            $this->tpl->assign('readonly','disabled');

            $this->tpl->assign('titrePage','Fiche lieu: Suppression');

            $this->tpl->assign('unLieu', $valeurs);

            break;

            case 'form_modifier':
            case 'modifier':
                $this->tpl->assign('action','modifier');

                $this->tpl->assign('readonly','');

                $this->tpl->assign('titrePage','Fiche lieu: Modification');

                $this->tpl->assign('unLieu', $valeurs);
        }

        $this->tpl->display('mod_lieu/vue/lieuFicheVue.tpl');
    }

}