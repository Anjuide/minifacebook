<?php
/* ------------------------------------------------------------------------------------------------------*/
/* ----------------------------------Set UTF-8 as the character set------------------------------------- */
/* ------------------------------------------------------------------------------------------------------*/
header('Content-Type: text/html; charset=utf-8');
/* ------------------------------------------------------------------------------------------------------*/
/* ---------------------------------------REQUIRE FICHIER.PHP------------------------------------------- */
/* ------------------------------------------------------------------------------------------------------*/
require_once 'connect.php';
/* ------------------------------------------------------------------------------------------------------*/
/* --------------------------------------------CONNEXION------------------------------------------------ */
/* ------------------------------------------------------------------------------------------------------*/
$appliBD = new Connexion();
/* ------------------------------------------------------------------------------------------------------*/
/* ////////////////////////////////////MA CLASSE HOBBY///////////////////////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/
class Personne {
    private $nom;
    private $prenom;
    private $url_photo;
    private $date_naissance;
    private $statut_couple;
    
    public function __construct($nom, $prenom, $url_photo, $date_naissance, $statut_couple){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->url_photo = $url_photo;
        $this->date_naissance = $date_naissance;
        $this->date_naissance = $statut_couple;
        // on prépare notre requête 
        $requete_prepare = $appliBD->connexion->prepare(
            "INSERT INTO Personne (nom, prenom, url_photo, date_naissance, statut_couple) 
            value (:nom, :prenom, :url_photo, :date_naissance, :statut_couple)"
        );
        // on exécute la requête 
        $requete_prepare->execute (
            array ('nom' => $nom,
                    'prenom' => $prenom,
                    'url_photo' => $url_photo,
                    'date_naissance' => $date_naissance,
                    'statut_couple' => $statut_couple
            )
        );
        $id = $appliBD->connexion->lastInsertId();
        return $id;
    }

    public function getNom (){
        return $this->nom;
    }

    public function getPrenom (){
        return $this->prenom;
    }

    public function getdate_naissance (){
        return $this->date_naissance;
    }

    public function setdate_naissance ($date_naissance){ 
        $this->date_naissance = $date_naissance;
    }

    public function setNom ($nom){ 
        $this->nom = $nom;
    }

    public function setPrenom ($prenom){ 
        $this->prenom = $prenom;
    }

}

    $ange = new Personne ("Gnamba", "Ange", 29);
    echo $ange->getNom() ."<br>"; 
    echo $ange->getPrenom() ."<br>";
    echo $ange->setdate_naissance(39) ."<br>";
    echo "Ton âge est: ". $ange->getdate_naissance() ."<br>";
/*     UPDATE `access_users`   
    SET `contact_first_name` = :firstname,
        `contact_surname` = :surname,
        `contact_email` = :email,
        `telephone` = :telephone 
  WHERE `user_id` = :user_id - */





?>