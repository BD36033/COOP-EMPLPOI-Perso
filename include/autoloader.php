<?php
class autoloader{

    public static function chargerClasses(){

        spl_autoload_register([__CLASS__, 'autoload']); //Pour chaque classe, à chaque fois qu'on va créer n'importe quel objet ca va appeler la fonction "autoload"

    }

    public static function autoload($maClasse){
        //Je passe le nom de ma classe avec une minuscule en guise de première lettre Accueil -> accueil
        $maClasse = lcfirst($maClasse);

        $repertoires = [
          'module_accueil/',
          'module_accueil/controleur/',
          'module_accueil/modele/',
          'module_accueil/vue/',
          'mod_lieu/',
          'mod_lieu/controleur/',
          'mod_lieu/modele/',
          'mod_lieu/vue/',
        ];

        foreach ($repertoires as $repertoire) {

            //Vérifier si un script.php existe dans le répertoire
            if (file_exists($repertoire.$maClasse.'.php')){
                require_once $repertoire.$maClasse.'.php';
                return;
            }
            
        }
        
    }
}