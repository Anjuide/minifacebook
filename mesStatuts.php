<?php
echo "<br>";
if (isset($_POST['submit'])) {
    if(isset($_POST['statut']))
    {
        echo "<span>J'ai sélectionné: <b> ".$_POST['statut']."</b></span>";
    }
    else{ 
        echo "<span>STP Choisis au moins un statut.</span>";
    }
}
?>