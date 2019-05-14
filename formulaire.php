<!doctype html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/formulaire.css">
	<link rel="icon" href="images/favicon.png">
	<title>Inserer un nouveau profil</title>

	<?php
	header('Content-Type: text/html; charset=utf-8');
	include 'header.php';
	require 'connexion.php';
	$appliBD = new Connexion();
	$appliBD->selectAllMusic();
	$appliBD->selectAllHobby();
	?>
</head>

<body>
	<div class="container">
		<h1>
			Insérer un nouveau profil
		</h1>
		<div class="formulaire">
			<form method="post" action="formulaire_action.php">
				<div class="row">
					<div class="col-25">
						<label for="nom">Nom:</label>
					</div>
					<div class="col-75">
						<input type="text" name="nom" id="nom" placeholder="Veuillez entrer votre nom" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="prenom">Prénom:</label>
					</div>
					<div class="col-75">
						<input type="text" name="prenom" id="prenom" placeholder="Veuillez entrer votre prénom" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="date_naissance">Date de naissance:</label>
					</div>
					<div class="col-75">
						<input type="date" name="date_naissance" id="date_naissance" required><br>
					</div>
				</div>

				<div class="row">
					<div class="col-25">
						<label>Statut: </label>
					</div>
					<div class="col-75">
						<input type="radio" name="statut" id="couple" value="En couple">
						<label for="couple">En couple</label>
						<input type="radio" name="statut" id="celibataire" value="Célibataire">
						<label for="celibataire">Célibataire</label>
						<input type="radio" name="statut" id="undefined" value="Non défini">
						<label for="undefined">Non défini</label><br>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="url_photo">Photo de profil:</label>
					</div>
					<div class="col-75">
						<input type="url" name="url_photo" id="url_photo" placeholder="Veuillez entrer l'URL de la photo" required><br>
					</div>
				</div>

				<div class="row">
					<div class="col-25">
						<label>Musique: </label>
					</div>
					<div class="col-75">
						<?php
						$allMusique = $appliBD->selectAllMusic();
						foreach ($allMusique as $value) {
							echo "<input type='checkbox' name='musique[]' id='" . $value->type . $value->id . "' value='" . $value->id . "'>";
							echo "<label for='" . $value->type . $value->id . "'> " . $value->type . " </label>";
						}
						?><br>
					</div>
				</div>

				<div class="row">
					<div class="col-25">
						<label>Hobbies: </label>
					</div>
					<div class="col-75">
						<?php
						$allHobbies = $appliBD->selectAllHobby();
						foreach ($allHobbies as $value) {
							echo "<input type='checkbox' name='hobby[]' id='" . $value->type . $value->id . "' value='" . $value->id . "'>";
							echo "<label for='" . $value->type . $value->id . "'> " . $value->type . " </label>";
						} ?>
					</div>
				</div>

				<div class="row">
					<div class="col-25">
						<label>Ajouter une relation: </label>
					</div>
					<div class="col-75">
						<?php
						$allPersonne = $appliBD->selectAllPersonne();
						foreach ($allPersonne as $value) {
							echo '<div class="col-75">';
							echo "<input type='checkbox' name='personne[]' id='" . $value->nom . $value->id . "' value='" . $value->id . "'>";
							echo "<label for='" . $value->nom . $value->id . "'> " . $value->nom . " " . $value->prenom . " </label>";
							echo "</div>";
							echo '<div class="col-25">';
							echo '<select id="relation" name="' . $value->id . '">
								<option> </option>
								<option label="famille" value="Famille">Famille</option>
								<option label="ami" value="Ami">Ami</option>
								<option label="collègue" value="Collègue">Collègue</option>
								</select>';
							echo "</div>";

							echo "<br>";
						}
						?>
					</div>
				</div>
				<div class="row">
					<input name="submit" id="submit" type="submit" value="Insérer le profil">
				</div>
			</form>
		</div>
	</div>

</body>

</html>