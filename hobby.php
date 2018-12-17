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
class Hobby {
    private $hobby;
    public function __construct($hobby){
        // on prépare notre requête 
        $requete_prepare = $appliBD->connexion->prepare(
            "INSERT INTO Hobby (type) value (:hobby)"
        );
        // on exécute la requête
        $requete_prepare->execute (
            array ('hobby' => $hobby
            )
        );
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* ------------------------------------FONCTION DE SELECTION HOBBY ------------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function getHobby (){
        // on prépare notre requête select
        $requete_prepare = $appliBD->connexion->prepare(
            "SELECT id, type FROM Hobby"
        );
        //On exécute la requête 
        $requete_prepare->execute ();
        // Met un tableau d'objets dans la variable resultat
        //Le nom de chaque colonne correspond à une propriété de l'objet
        $resultat=$requete_prepare->fetchAll (PDO::FETCH_OBJ);
        return $resultat;
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* ----------------------------FONCTION DE SELECTION MUSIQUE PAR UN ID --------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function getHobbyByPersonneId ($personne_id){
        // Je prépare ma requête 
        $requete_prepare = $appliBD->connexion -> prepare (
            "SELECT h.type 
            FROM Hobby h
            INNER JOIN RelationHobby rh
            ON h.id = rh.hobby_id
            WHERE rh.personne_id = :personne_id" 
        );
        // J'execute la requête en passant la valeur
        $requete_prepare -> execute (
            array ('personne_id' => $personne_id
            )
        );
        // Je récupère le résultat de la requête
        $hobbies = $requete_prepare->fetchAll (PDO::FETCH_OBJ);
        // Je retourne la liste de hobbies
        return $hobbies;
    }
}

class RelationHobby {
    private $personne_id;
    private $hobby;
    public function __construct($personne_id,$hobby){
        // on prépare notre requête 
        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO RelationHobby (personne_id, hobby_id) VALUE (:personne_id, :hobby_id)"
        );
        // on exécute la requête
        $requete_prepare->execute (
            array ( 'personne_id' => $personne_id,
                    'hobby_id' => $hobby_id
            )
        ); 
    }
}

?>