<?php
    // On se connecte à la base de données
    require 'connexion.php';
    $appliBD = new Connexion();
    if(isset($_POST['submit'])){
        // On vérifie s'il n'y a pas de champ vide
        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date_naissance']) AND 
                                            !empty($_POST['statut']) AND !empty($_POST['url_photo']) AND 
                                            !empty($_POST['musique']) AND !empty($_POST['hobby']) ) {
            // On ajoute la personne dans la base de données et on récupère son Id
            $personneId = $appliBD->setPersonne ($_POST['nom'], $_POST['prenom'], $_POST['url_photo'], $_POST['date_naissance'], $_POST['statut']);
            
            // On ajoute la relation musique
            foreach ($_POST['musique'] as $musique){
                $appliBD->setRelationMusic ($personneId, $musique);
            }
            
            // On ajoute la relation hobby
            
            foreach ($_POST['hobby'] as $hobby){
                $appliBD->setRelationHobby ($personneId, $hobby);
            }
            // On ajoute la relation personnes
            foreach ($_POST['personne'] as $personneSelectedId){
                $appliBD->setRelationPersonne ($personneId, $personneSelectedId, $_POST[$personneSelectedId]);
            }
            header("Location: profil.php?id=$personneId"); 
        }
        else { 
            echo "<span>Veuillez remplir tous les champs obligatoires.</span><br/>";
        }
    }else {
        header("Location: formulaire.php");
    }
?>