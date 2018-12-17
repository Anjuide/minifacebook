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
/* ////////////////////////////////////MA CLASSE MUSIQUE/////////////////////////////////////////////////*/
/* ------------------------------------------------------------------------------------------------------*/
class Musique {
    private $musique;
    public function __construct($musique){
        // on prépare notre requête 
        $requete_prepare = $appliBD->connexion->prepare(
            "INSERT INTO Musique (type) VALUE (:musique)"
        );
        // on exécute la requête
        $requete_prepare->execute (
            array ('musique' => $musique
            )
        ); 
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* ------------------------------------FONCTION DE SELECTION MUSIQUE------------------------------------ */
    /* ------------------------------------------------------------------------------------------------------*/
    public function getMusic (){
        // on prépare notre requête select
        $requete_prepare = $appliBD->connexion->prepare(
            "SELECT id, type FROM Musique"
        );
        //On exécute la requête 
        $requete_prepare->execute ();
        // Met un tableau d'objets dans la variable resultat
        // Le nom de chaque colonne correspond à une propriété de l'objet
        $resultat=$requete_prepare->fetchAll (PDO::FETCH_OBJ);
        return $resultat;
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* ----------------------------FONCTION DE SELECTION MUSIQUE PAR UN ID --------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function getMusicByPersonneId ($personne_id){
        // Je prépare ma requête 
        $requete_prepare = $appliBD->connexion -> prepare (
            "SELECT m.type 
            FROM Musique m
            INNER JOIN RelationMusique rm
            ON m.id = rm.musique_id
            WHERE rm.personne_id = :personne_id" 
        );
        // J'execute la requête en passant la valeur
        $requete_prepare -> execute (
            array ('personne_id' => $personne_id
            )
        );
        // Je récupère le résultat de la requête
        $musique = $requete_prepare->fetchAll (PDO::FETCH_OBJ);
        // Je retourne la liste de musique
        return $musique;
    }
}

class RelationMusique {
    private $personne_id;
    private $musique_id;
    public function __construct($personne_id,$musique_id){
        // on prépare notre requête 
        $requete_prepare = $appliBD->connexion->prepare(
            "INSERT INTO RelationMusique (personne_id, musique_id) VALUE (:personne_id, :musique_id)"
        );
        // on exécute la requête
        $requete_prepare->execute (
            array ( 'personne_id' => $personne_id,
                    'musique_id' => $musique_id
            )
        );
    }
}


?>