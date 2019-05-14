<!doctype html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/profil.css">
	<link rel="icon" href="images/favicon.png">
	<title>Affichage du profil</title>
	<?php include 'header.php';
	require 'connexion.php';
	$appliBD = new Connexion();
	$id = $_GET["id"];
	$personneInfos = $appliBD->getPersonneById($id);
	foreach ($personneInfos as $personne) { };
	$hobbyListe = $appliBD->getPersonneHobbyById($id);
	$musiqueListe = $appliBD->getPersonneMusicById($id);
	$relationListe = $appliBD->getPersonneRelationById($id);
	?>
</head>

<body>
	<div class="container">
		<div class="container_details">
			<!-- Titre de la page  -->
			<div class="container_enTete">
				<h1 class="enTete">À propos</h1>
			</div>
			<!-- BLOC D'IMAGES -->
			<div class="container_picture">
				<img class="picture" src="<?php echo "$personne->url_photo"; ?>" alt="Photo de profil de <?php echo "$personne->nom $personne->prenom"; ?>">
			</div>
			<!-- BLOC D'INFOS -->
			<div class="container_info">
				<p class="info"><?php echo "$personne->prenom $personne->nom"; ?></p>
				<p class="info"><?php echo "$personne->date_naissance"; ?></p>
				<p class="info"><?php echo "$personne->statut_couple"; ?></p>
			</div>
		</div> <!-- FIN BLOC DE DETAILS -->

		<div class="container_MusicHobby">

			<div class="container_music">
				<div class="container_enTete">
					<h2 class="enTete">Musique</h2>
				</div>
				<ul style="list-style-type:disc">
					<?php
					foreach ($musiqueListe as $musique) {
						echo "<li>$musique->type</li>";
					};
					?>
				</ul>
			</div>
			<div class="container_hobbies">
				<div class="container_enTete">
					<h2 class="enTete">Hobbies</h2>
				</div>
				<ul style="list-style-type:disc">
					<?php
					foreach ($hobbyListe as $hobby) {
						echo "<li>$hobby->type</li>";
					};
					?>
				</ul>
			</div>

		</div> <!-- FIN BLOC MUSIC HOBBY -->
		<div class="container_relation">
			<div class="container_enTete">
				<h2 class="enTete">Liste de contacts</h2>
			</div>
			<div class="container_friends">
				<?php
				foreach ($relationListe as $relation) {
					$id_personne = $relation->relation_id;
					$relationInfos = $appliBD->getPersonneById($id_personne);
					foreach ($relationInfos as $relationInfos) {
						?>
						<div class="container_friend_details">
							<?php
							/* <!-- BLOC D'IMAGES --> */
							echo '<div class="container_friend_picture">';
							echo "<a href='profil.php?id=$relationInfos->id'>";
							echo "<img class='friend_picture' src='$relationInfos->url_photo' alt='Photo de profil de $relationInfos->nom'>";
							echo "</a>";
							echo "</div>";
							/* <!-- BLOC D'INFOS --> */
							echo '<div class="container_friend_info">';
							echo "<a class='friend_info' href='profil.php?id=$relationInfos->id'>";
							echo "$relationInfos->nom $relationInfos->prenom";
							echo "</a>";
							echo "</div>";
							?>
						</div> <?php
						};
					};
					?>
			</div>

		</div> <!-- FIN BLOC MUSIC HOBBY PERSONNE -->
	</div> <!-- FIN BLOC CONTENU -->
</body>

</html>