<?php
/* ------------------------------------------------------------------------------------------------------*/
/* ----------------------------------Set UTF-8 as the character set------------------------------------- */
/* ------------------------------------------------------------------------------------------------------*/
header('Content-Type: text/html; charset=utf-8');
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
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* -------------------------------------FONCTION D'INSERTION HOBBY-------------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function setHobby($hobby){
        // on prépare notre requête 
        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO Hobby (type) value (:hobby)"
        );
        // on exécute la requête en remplaçant :hobby par une variable
        $requete_prepare->execute (
            array ('hobby' => $hobby
            )
        );
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* -------------------------------------FONCTION D'INSERTION MUSIQUE------------------------------------ */
    /* ------------------------------------------------------------------------------------------------------*/
    public function setMusic ($musique){
        // on prépare notre requête 
        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO Musique (type) value (:musique)"
        );
        // on exécute la requête en remplaçant :musique par une variable
        $requete_prepare->execute (
            array ('musique' => $musique
            )
        ); 
        $id = $this->connexion->lastInsertId();
        return $id;
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* -----------------------------------FONCTION D'INSERTION PERSONNE------------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function setPersonne ($nom, $prenom, $url_photo, $date_naissance, $statut_couple){
        // on prépare notre requête 
        $requete_prepare = $this->connexion->prepare(
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
        $id = $this->connexion->lastInsertId();
        return $id;
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* -------------------------------FONCTION D'INSERTION RELATION MUSIQUE--------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function setRelationMusic ($personne_id, $musique_id){
        // on prépare notre requête 
        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO RelationMusique (personne_id, musique_id) VALUE (:personne_id, :musique_id)"
        );
        // on exécute la requête
        $requete_prepare->execute (
            array ( 'personne_id' => $personne_id,
                    'musique_id' => $musique_id
            )
        );

    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* -------------------------------FONCTION D'INSERTION RELATION HOBBY----------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function setRelationHobby ($personne_id, $hobby_id){
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
    /* ------------------------------------------------------------------------------------------------------*/
    /* -------------------------------FONCTION D'INSERTION RELATION HOBBY----------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function setRelationPersonne ($personne_id, $relation_id, $type){
        // on prépare notre requête 
        $requete_prepare = $this->connexion->prepare(
            "INSERT INTO RelationPersonne (personne_id, relation_id, type) VALUE (:personne_id, :relation_id, :type)"
        );
        // on exécute la requête
        $requete_prepare->execute (
            array ( 'personne_id' => $personne_id,
                    'relation_id' => $relation_id,
                    'type' => $type
            )
        ); 
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* ------------------------------------FONCTION DE SELECTION HOBBY-------------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function selectAllHobby (){
        // on prépare notre requête select
        $requete_prepare = $this->connexion->prepare(
            "SELECT id, type FROM Hobby"
        );
        //On exécute la requête 
        $requete_prepare->execute ();
        // Met un tableau d'objets dans la variable resultat
        //Le nom de chaque colonne correspond à une propriété de l'objet
        $resultat=$requete_prepare->fetchAll (PDO::FETCH_OBJ);
        return $resultat;
        /*  // Affiche le premier type de hobbie trouvé
        echo ($resultat[0]->type);
        // Affiche le deuxième type de hobbies trouvé
        echo ($resultat[1]->type); */
    }  
    /* ------------------------------------------------------------------------------------------------------*/
    /* ------------------------------------FONCTION DE SELECTION MUSIQUE------------------------------------ */
    /* ------------------------------------------------------------------------------------------------------*/
    public function selectAllMusic (){
        // on prépare notre requête select
        $requete_prepare = $this->connexion->prepare(
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
    /* ------------------------------------FONCTION DE SELECTION PERSONNE----------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function selectAllPersonne (){
        // On prépare notre requête select
        $requete_prepare = $this->connexion->prepare(
            "SELECT id, nom, prenom, url_photo, date_naissance, statut_couple FROM Personne"
        );
        //On exécute la requête 
        $requete_prepare->execute ();
        // Met un tableau d'objets dans la variable resultat
        // Le nom de chaque colonne correspond à une propriété de l'objet
        $resultat=$requete_prepare->fetchAll (PDO::FETCH_OBJ);
        return $resultat;
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* ----------------------------FONCTION DE SELECTION PERSONNE PAR UN ID -------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function getPersonneById ($id){
        // Je prépare ma requête 
        $requete_prepare = $this->connexion -> prepare (
            "SELECT * 
            FROM Personne
            WHERE id = :id" 
        );
        // J'execute la requête en passant la valeur
        $requete_prepare -> execute (
            array ('id' => $id
            )
        );
        // Je récupère le résultat de la requête
        $personne = $requete_prepare->fetchAll (PDO::FETCH_OBJ);
        // Je retourne la liste de hobbies
        return $personne;
    }
    /* ------------------------------------------------------------------------------------------------------*/
    /* ----------------------------FONCTION DE SELECTION HOBBY PAR UN ID ------..--------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function getPersonneHobbyById ($personne_id){
        // Je prépare ma requête 
        $requete_prepare = $this->connexion -> prepare (
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
    /* ------------------------------------------------------------------------------------------------------*/
    /* ----------------------------FONCTION DE SELECTION MUSIQUE PAR UN ID --------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function getPersonneMusicById ($personne_id){
        // Je prépare ma requête 
        $requete_prepare = $this->connexion -> prepare (
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
    /* ------------------------------------------------------------------------------------------------------*/
    /* ----------------------------FONCTION DE SELECTION PERSONNE PAR UN ID -------------------------------- */
    /* ------------------------------------------------------------------------------------------------------*/
    public function getPersonneRelationById ($personne_id){
        // Je prépare ma requête 
        $requete_prepare = $this->connexion -> prepare (
            "SELECT rp.type, rp.relation_id
            FROM Personne p
            INNER JOIN RelationPersonne rp
            ON p.id = rp.relation_id
            WHERE rp.personne_id = :personne_id" 
        );
        // J'execute la requête en passant la valeur
        $requete_prepare -> execute (
            array ('personne_id' => $personne_id
            )
        );
        // Je récupère le résultat de la requête
        $relation = $requete_prepare->fetchAll (PDO::FETCH_OBJ);
        // Je retourne la liste de musique
        return $relation;
    }

    
}

?>