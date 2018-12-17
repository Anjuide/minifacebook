<!DOCTYPE html>
<html>
    <head>
        <title>Get Id Value personne, musique et hobby</title> 
        <!-- Include CSS File Here-->
        <link href="getId.css" rel="stylesheet">
        <?php require_once 'connexion.php';
            $appliBD = new Connexion(); ?>
    </head>
    <body>
        <div class="container">
            <div class="main">
                <h2>Get Value Musique, Relation, Statuts</h2>
                <form action="getId.php" method="post">
               
                    <?php $allMusique = $appliBD->selectAllMusic();
                        $i = 0;
                        foreach ($allMusique as $value){  
                            echo "<input type='checkbox' name='musique[]' id='musique$i' value='". $value -> id."'>";
                            echo "<label for='musique$i'> ". $value -> type ." </label>";
                            $i++;
                        } 
                    ?>

                    <br>
                    <?php include'mesId.php'; ?>
                <!----- Champ du select commence ici ----->
                        <select id="relation" name="relation[]">
							<option label="aucune" value="1"></option>
							<option label="famille" value="2">Famille</option>
							<option label="ami" value="3">Ami</option>
							<option label="collègue" value="4">Collègue</option>
						</select>
                        <br>
                        <select id="relation" name="relation[]">
							<option label="aucune" value="1"></option>
							<option label="famille" value="2">Famille</option>
							<option label="ami" value="3">Ami</option>
							<option label="collègue" value="4">Collègue</option>
						</select>
                        <select id="relation" name="relation[]">
							<option label="aucune" value="1"></option>
							<option label="famille" value="2">Famille</option>
							<option label="ami" value="3">Ami</option>
							<option label="collègue" value="4">Collègue</option>
						</select>
                        <?php include'mesRelations.php'; ?>
                    <!---- Boutton radio commence ici ----->
                    <label class="heading">Statuts :</label>
                    <input name="statut" type="radio" value="&nbsp">
                    <input name="statut" type="radio" value="Célibataire">Célibataire
                    <input name="statut" type="radio" value="En couple">En couple
                    <input name="statut" type="radio" value="Marié">Marié
                    <?php include'mesStatuts.php'; ?>
                    <input name="submit" type="submit" value="Obtenir Value">
                </form>
            </div>
        </div>
    </body>
</html>