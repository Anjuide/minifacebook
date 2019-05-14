<?php
/* ------------------------------------------------------------------------------------------------------*/
/* ----------------------------------Set UTF-8 as the character set------------------------------------- */
/* ------------------------------------------------------------------------------------------------------*/
header('Content-Type: text/html; charset=utf-8');
/* ------------------------------------------------------------------------------------------------------*/
/* ---------------------------------------REQUIRE FICHIER.PHP------------------------------------------- */
/* ------------------------------------------------------------------------------------------------------*/
require_once 'connexion.php';
/* ------------------------------------------------------------------------------------------------------*/
/* --------------------------------------------CONNEXION------------------------------------------------ */
/* ------------------------------------------------------------------------------------------------------*/
/* $connexion = connexionBD();
if (is_null ($connexion)){
    echo 'Connection BD échouée';
} else{
    echo'Connection BD réussie';
}
 */
$appliBD = new Connexion();
/* ------------------------------------------------------------------------------------------------------*/
/* -----------------------------------------INSERTION HOBBY--------------------------------------------- */
/* ------------------------------------------------------------------------------------------------------*/
/* // En passant par une variable
$hobby = "Bricolage";
$appliBD->setHobby($hobby);
// En passant directement par le paramètre
$appliBD->setHobby("Danse");
$appliBD->setHobby("Sports");
$appliBD->setHobby("Chasse");
$appliBD->setHobby("Jardinage");
$appliBD->setHobby("Musique");
$appliBD->setHobby("Pêche");
$appliBD->setHobby("Théâtre");
$appliBD->setHobby("Cuisine et gastronomie");
$appliBD->setHobby("Photographie");
$appliBD->setHobby("Volontariat"); */

/* ------------------------------------------------------------------------------------------------------*/
/* -----------------------------------------INSERTION MUSIQUE------------------------------------------- */
/* ------------------------------------------------------------------------------------------------------*/
// En passant par une variable
/* $musique = "Afro-Trap";
$appliBD->setMusic($musique);
// En passant directement par le paramètre
$appliBD->setMusic("Chanson française");
$appliBD->setMusic("Dancehall");
$appliBD->setMusic("Rock");
$appliBD->setMusic("Hip-Hop");
$appliBD->setMusic("Pop");
$appliBD->setMusic("Reggae");  */
/* $id = $appliBD->setMusic("Montest");
echo $id; */

/* ------------------------------------------------------------------------------------------------------*/
/* -----------------------------------------INSERTION PERSONNE------------------------------------------ */
/* ------------------------------------------------------------------------------------------------------*/
/* $appliBD->setPersonne ("Gnamba", "Angra Ange Anselme", "Photodeange.ch", "1989-01-27", "En couple");
$appliBD->setPersonne ("Cerdelli", "Marine Coralie", "Photodemarine.ch", "1993-06-07", "En couple");
$appliBD->setPersonne ("Bouo", "Odile Anastasie", "PhotodeOdile.ch", "1965-04-15", "Célibataire");
$appliBD->setPersonne ("Friederich", "Bernhard", "Photodebernard.ch", "1960-03-10", "Célibataire");
$appliBD->setPersonne ("Palazzotto", "Sabine Valérie", "Photodesabine.ch", "1978-08-29", "Marié");
$appliBD->setPersonne ("Palazzotto", "Paolo", "Photodepaolo.ch", "1960-02-28", "Marié");
$appliBD->setPersonne ("Damato", "Alexandro", "PhotodeAlex.ch", "1988-10-05", "En couple");
$appliBD->setPersonne ("Xiang", "Yuka", "PhotodeYuka.ch", "1986-02-05", "En couple");
$appliBD->setPersonne ("Lalle Bi", "Jacques Arnaud", "Photodejacques.ch", "2003-06-14", "Célibataire");
$appliBD->setPersonne ("Affin", "Walid", "Photodewalid.ch", "2003-09-14", "Célibataire");
$appliBD->setPersonne ("Pédéa", "Jeannette", "Photodejeannette.ch", "1935-01-01", "Célibataire"); */

/* ------------------------------------------------------------------------------------------------------*/
/* -------------------------------------AFFICHER TOUS LES HOBBY -----------------------------------------*/
/* ------------------------------------------------------------------------------------------------------*/
/* // Affichage en une liste non ordonnée
$allHobbies = $appliBD->selectAllHobby ();
echo "<ul>";
foreach ($allHobbies as $value){  
    echo "<li>" . $value->type . "</li>";
}
echo "</ul>";
// Affichage en checkbox
$allHobbies = $appliBD->selectAllHobby ();
foreach ($allHobbies as $value){  
    echo "<input type='checkbox' name='hobby[]' id='". $value->type . $value->id ."' value='". $value->id."'>";
    echo "<label for='". $value->type . $value->id ."'> ". $value->type ." </label>";
} */

/* ------------------------------------------------------------------------------------------------------*/
/* -----------------------------------------AFFICHER TOUTES LES MUSIQUE--------------------------------- */
/* ------------------------------------------------------------------------------------------------------*/
/* // Affichage en une liste non ordonnée
$allMusique = $appliBD->selectAllMusic ();
echo "<ul>";
foreach ($allMusique as $value){  
    echo "<li>" . $value->type . "</li>";
}
echo "</ul>";
// Affichage en checkbox
$allMusique = $appliBD->selectAllMusic ();
foreach ($allMusique as $value){  
    echo "<input type='checkbox' name='musique[]' id='". $value->type . $value->id ."' value='". $value->id."'>";
    echo "<label for='". $value->type . $value->id ."'> ". $value->type ." </label>";
} */

/* ------------------------------------------------------------------------------------------------------*/
/* -----------------------------------------SELECTION PERSONNES----------------------------------------- */
/* ------------------------------------------------------------------------------------------------------*/
/*  // Affichage en une liste non ordonnée
$allPersonne = $appliBD->selectAllPersonne ();
echo "<ul>";
foreach ($allPersonne as $value){  
    echo "<li>" . $value->nom . " " . $value->prenom . "</li>";
    echo '<select id="relation" name="relation[]">
    <option label="aucune" value="aucune"></option>
    <option label="famille" value="famille">Famille</option>
    <option label="ami" value="ami">Ami</option>
    <option label="collègue" value="collègue">Collègue</option>
</select>';
}
echo "</ul>";  */
// Affichage en checkbox(
/* function fautquecamarche ($appliBD){
    $allPersonne = $appliBD->selectAllPersonne ();
    foreach ($allPersonne as $value){  
        echo "<input type='checkbox' name='personne' id='". $value->nom . $value->id ."' value='". $value->id."'>";
        echo "<label for='". $value->nom . $value->id ."'> ". $value->nom . " " . $value->prenom ." </label>";
        echo '<select id="relation" name="relation[]">
            <option label="aucune" value="aucune"></option>
            <option label="famille" value="Famille">Famille</option>
            <option label="ami" value="Ami">Ami</option>
            <option label="collègue" value="Collègue">Collègue</option>
        </select><br>';
    }
}
fautquecamarche ($appliBD); */
/* ------------------------------------------------------------------------------------------------------*/
/* -----------------------------AFFICHAGE PAR UN ID PASSÉ EN PARAMÈTRE---------------------------------- */
/* ------------------------------------------------------------------------------------------------------*/

/* // Affichage en une liste non ordonnée des hobbies
$personne_Id = 1;
$hobbies = $appliBD->getPersonneHobbyById($personne_Id);
echo "<ul>";
foreach ($hobbies as $value){  
    echo "<li>" . $value->type . "</li>";
}
echo "</ul>"; */

/* // Affichage en une liste non ordonnée des musiques
$personne_Id = 1;
$musiques = $appliBD->getPersonneMusicById($personne_Id);
echo "<ul>";
foreach ($musiques as $value){  
    echo "<li>" . $value->type . "</li>";
}
echo "</ul>"; */

// Affichage en une liste non ordonnée des relations
/* $personne_Id = 2;
$relation = $appliBD->getPersonneRelationById($personne_Id);
echo "<ul>";
foreach ($relation as $value){  
    echo "<li>" . $value->type . " du numéro " . $value->relation_id . "</li>";
}
echo "</ul>"; */

/* ------------------------------------------------------------------------------------------------------*/
/* -----------------------------------------SELECTION MUSIQUE------------------------------------------- */
/* ------------------------------------------------------------------------------------------------------*/

/* $personne_id = $appliBD->setPersonne($_POST['nom'],$_POST['prenom'],$_POST['url_photo'],$_POST['date_naissance'],$_POST['statut_couple']);
foreach ($_POST['musique'] as $musique_id){
    $appliBD->setRelationMusic($personne_id, $musique_id);
}
foreach ($_POST['hobby'] as $hobby_id){
    $appliBD->setRelationHobby($personne_id, $hobby_id);
}
foreach ($_POST['personne'] as $personne_id){
    $appliBD->setRelationPersonne($personne_id, $personne_id, $_POST['relation']);
    foreach ($_POST['personne'] as $personne_id){
        $appliBD->setRelationPersonne($personne_id, $personne_id, $_POST['relation']);
    }
}


    $appliBD->setRelationPersonne($personne_id, $_POST['personne'], $_POST['relation']); */


// Affichage en une liste non ordonnée des relations
/* $personne_Id = 2;
$relation = $appliBD->getPersonneRelationById($personne_Id);
echo "<ul>";
foreach ($relation as $value){  
    $id= $value->type  ;
  
        $id2= $value->relation_id ;

    
    echo "<li>" . $id . " du numéro " . $id2 . "</li>";
}
echo "</ul>";  */

$pattern = "";

$resultat = $appliBD->getPersonneByPatterns ($pattern);
var_dump($resultat);

?>