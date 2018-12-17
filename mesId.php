<?php


if(isset($_POST['submit'])){
    if(!empty($_POST['musique'])) {
        echo "<span>J'ai sélectionné:</span><br/>";
        // As output of $_POST['musique'] is an array we have to use Foreach Loop to display individual value
        foreach ($_POST['musique'] as $select){
            echo "<span><b>".$select."</b></span><br/>";
        }
    }
    else { 
        echo "<span>STP Sélectionne au moins une musique.</span><br/>";
    }
}


?>