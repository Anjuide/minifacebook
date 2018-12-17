<?php 
    require 'connexion.php';
    $appliBD = new Connexion();
    $musique = $appliBD->selectAllMusique();
    /* AFFICHER CHAQUE MUSIQUE DANS UN CHECKBOX */              
/*     function allMusique(){
        
        $i = 0;
        foreach ($musique as $value){  
            echo "<input type='checkbox' name='musique[]' id='musique$i' value='". $value->id."'>";
            echo "<label for='musique$i'> ". $value->type ." </label>";
            $i++;
        }
        echo"<br>";
    }
    allMusique();
 */
    /* AFFICHER CHAQUE HOBBY DANS UN CHECKBOX */              
/*     function allHobbies(){
        $hobbies = $appliBD->selectAllHobbies();
        $i = 0;
        foreach ($hobbies as $value){  
            echo "<input type='checkbox' name='hobbies[]' id='hobby$i' value='". $value->id."'>";
            echo "<label for='hobby$i'> ". $value->type ." </label>";
            $i++;
        }
        echo"<br>";
    }
    allHobbies(); */
    /* AFFICHER CHAQUE STATUTS DANS UN BOUTON RADIO */
    function allStatuts(){
        $statuts = array("Célibataire","En couple","Marié(e)");
        $i = 0;
        foreach ($statuts as $value){  
            echo "<input type='radio' name='statut' id='statuts$i' value='". $value ."'>";
            echo "<label for='statuts$i'> ". $value ." </label>";
            $i++;
        }
        echo"<br>";
    }
    allStatuts();


?>