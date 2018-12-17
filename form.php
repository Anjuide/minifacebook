<?php

// On vérifie d'abord s'il n'y a pas de champ vide
if(isset($_POST['submit'])){
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date_naissance']) AND 
                                        !empty($_POST['statut']) AND !empty($_POST['url_photo']) AND 
                                        !empty($_POST['musique']) AND !empty($_POST['hobby']) ) {
        echo $_POST["nom"];
        echo "Ton nom est: " . $_POST['nom'] . "<br />";
        echo 'Ton prénom est: ' . $_POST["prenom"] . '<br />';
        echo 'Ta date de naissance est: ' . $_POST["date_naissance"] . '<br />';
        echo 'Ton statut est: ' . $_POST["statut"] . '<br />';
        echo 'Ton URL_Photo est: ' . $_POST["url_photo"] . '<br />';
        echo 'Liste de musique: <br />';
        foreach ($_POST['musique'] as $select){
            echo "<span><b>".$select."</b></span><br/>";
        }
        echo 'Liste de hobby: <br />';
        foreach ($_POST['hobby'] as $select){
            echo "<span><b>".$select."</b></span><br/>";
        }
        echo 'Liste de relations choisies: <br />';
        foreach ($_POST['personne'] as $select){
            echo "<span>La personne choisie est le n°: <b>".$select."</b></span><br/>";
            echo "<span>La relation choisie pour cette personne est: <b>".$_POST[$select] . "</b><br>";
        }
       /* var_dump($_POST['personne']); */
       echo "<br>";
      /*  $i = "Paolo";
       var_dump($_POST["$i"]); */
        
        /* foreach ($_POST[''] as $select){
            echo "<span><b>".$select."</b></span><br/>";
        }
 */
        /* echo $_POST["Bernhard"]; */
    }
    else { 
        echo "<span>Veuillez remplir tous les champs obligatoires.</span><br/>";
    }
}





/* if ($_POST['description'] == NULL OR $_POST['mail'] == NULL)

{

    echo 'Tous les champs ne sont pas remplis !';

}

else // Si c'est bon, on enregistre les informations dans la base

{

    $bdd->prepare('INSERT INTO enquete VALUES (\'\', ?, ?)');

    $bdd->execute(array($_POST['description'], $_POST['mail']));    

    

    // Puis on envoie les photos

    

    for ($numero = 1 ; $numero <= 3 ; $numero++)

    {

        if ($_FILES['photo' . $numero]['error'] == 0)

        {

            if ($_FILES['photo' . $numero]['size'] < 500000)

            {

                move_uploaded_file($_FILES['photo' . $numero]['tmp_name'], $numero . '.jpg');

            }

            else

            {

                echo 'La photo ' . $numero . 'n\'est pas valide.<br />';

                $probleme = true;

            }

        }

    }

    

    // Enfin, affichage d'un message de confirmation si tout s'est bien passé

    

    if (!(isset($probleme)))

    {

        echo 'Merci ! Les informations ont été correctement enregistrées !';

    }

} */
?>