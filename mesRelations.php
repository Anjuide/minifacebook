<?php
/* if(isset($_POST['submit'])){
    if(!empty($_POST['relation'])) {
        echo "<span>J'ai sélectionné: <b> ".$_POST['relation']."</b></span><br/>";
    }
    else { 
        echo "<span>STP Sélectionne au moins une relation.</span><br/>";
    }
} */

if(isset($_POST['submit'])){
    if(!empty($_POST['relation'])) {
        echo "<span>J'ai sélectionné:</span><br/>";
        // As output of $_POST['musique'] is an array we have to use Foreach Loop to display individual value
        foreach ($_POST['relation'] as $select){
            echo "<span><b>".$select."</b></span><br/>";
        }
    }
    else { 
        echo "<span>STP Sélectionne au moins une relation.</span><br/>";
    }
}
?>