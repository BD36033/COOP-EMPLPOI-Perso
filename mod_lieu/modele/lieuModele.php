<?php
Class LieuModele extends Modele{

    private $parametre=[]; //Tableau

    public function __construct($parametre){

        $this->parametre = $parametre;
    }

    public function getListeLieu(){
        $sql = "SELECT * FROM lieu";

        $idRequete = $this->executeRequete($sql); // requête simple

        if($idRequete->rowCount() > 0){
            while($row = $idRequete->fetch(PDO::FETCH_ASSOC)){

                $listeLieu[] = new LieuTable($row);
            }
            return $listeLieu;
        }else{
            return null;
        }
    }
    public function getUnLieu(){
        $sql = "SELECT * FROM lieu WHERE id = ?";
        $idRequete = $this->executeRequete($sql, [$this->parametre['id']]); // requete prepare

        return new LieuTable($idRequete->fetch(PDO::FETCH_ASSOC));
    }

    public function addLieu(LieuTable $valeurs){
        $sql = "INSERT INTO lieu ( nom, adresse1, adresse2, adresse3, adresse4, codepostal, ville, contact, 
                  telephone,capaciteaccueil) VALUES (?,?,?,?,?,?,?,?,?,?)";

        $idRequete = $this->executeRequete($sql,[
            $valeurs->getNom(),
            $valeurs->getAdresse1(),
            $valeurs->getAdresse2(),
            $valeurs->getAdresse3(),
            $valeurs->getAdresse4(),
            $valeurs->getCodePostal(),
            $valeurs->getVille(),
            $valeurs->getContact(),
            $valeurs->getTelephone(),
            $valeurs->getCapaciteAccueil(),
        ]);

        if($idRequete){
            LieuTable::setMessageSuccess("Création du lieu réussi.");
        }
    }

    public function deleteLieu(LieuTable $valeurs){
        $sql = "DELETE FROM lieu WHERE id = ?";
        $idRequete = $this->executeRequete($sql,[
            $valeurs->getId()
        ]);
        if($idRequete){
            LieuTable::setMessageSuccess("Suppression du lieu réussi.");
        }

    }

    public function updateLieu(LieuTable $valeurs){
        $sql = "UPDATE lieu SET nom = ?, adresse1 = ?,adresse2 = ?,adresse3 = ?,adresse4 = ?,codepostal = ?,ville = ?,contact = ?,telephone = ?,capaciteaccueil = ? WHERE id= ?";
        $idRequete = $this->executeRequete($sql, [
            $valeurs->getNom(),
            $valeurs->getAdresse1(),
            $valeurs->getAdresse2(),
            $valeurs->getAdresse3(),
            $valeurs->getAdresse4(),
            $valeurs->getCodePostal(),
            $valeurs->getVille(),
            $valeurs->getContact(),
            $valeurs->getTelephone(),
            $valeurs->getCapaciteAccueil(),
            $valeurs->getId()
        ]);
        if($idRequete){
            LieuTable::setMessageSuccess("Modification du lieu correctement effectué");
        }
    }

}