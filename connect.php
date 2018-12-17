<?php
/* ------------------------------------------------------------------------------------------------------*/
/* ////////////////////////////////////MA CLASSE DE CONNEXION////////////////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/
class Connexion {
    private $connexion;
    public function __construct(){
        // le chemin vers le serveur
        $PARAM_hote='localhost';
        // le port de connexion à la base de données
        $PARAM_port='3306';
        // le nom de la base de données
        $PARAM_nom_bd='minifacebook';
        // Le nom d'utilisateur pour se connecter 
        $PARAM_utilisateur='adminMiniFacebook';
        // le mot de passe de l'utilisateur pour se connecter
        $PARAM_mot_passe='Mini_facebook';

        // Attraper les exceptions (au cas où ce qui est dans le try ne marche pas)
        try{
            $this->connexion = new PDO (
                'mysql:host='.$PARAM_hote.';
                dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
            $this->connexion-> setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
        } catch (Exception $e) {
            echo 'Erreur: ' .$e->getMessage() . '<br/>';
            echo 'N° : '.$e->getCode();
        }
    } // Fin FONCTION   
} // FIN CLASSE

?>