
<!doctype html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/profil.css">
	<link rel="icon" href="images/favicon.png">
	<title>Affichage du profil</title>
	<?php 	include 'header.php';
			require 'connexion.php';
			$appliBD = new Connexion();
			$id = $_GET["id"];
			$personneInfos = $appliBD->getPersonneById ($id);
			foreach ($personneInfos as $personne){ };
			$hobbyListe = $appliBD->getPersonneHobbyById ($id);
			$musiqueListe = $appliBD->getPersonneMusicById ($id);
			$relationListe = $appliBD->getPersonneRelationById ($id);				
	?>
</head>
<body>
	<div class="contenu">
		<!-- Titre de la page  -->
		<h1>A PROPOS</h1>

		<div class="container_details">
			<!-- BLOC D'IMAGES -->
			<div class="container_picture">
				<img class="picture" src="<?php echo "$personne->url_photo" ;?>" alt="Photo de profil de <?php echo "$personne->nom $personne->prenom" ;?>"> 
			</div>
			<!-- BLOC D'INFOS -->
			<div class="container_info">
				<p><?php echo "$personne->nom $personne->prenom" ;?></p>
				<p><?php echo "$personne->date_naissance" ;?></p>
				<p><?php echo "$personne->statut_couple" ;?></p>
			</div>
		</div> <!-- FIN BLOC DE DETAILS -->
		<h2>Liste de contacts</h2>
		<div class="containerMusicHobbyPersonne">
			
			<div class="musicHobby">
				<h2>Loisirs</h2>
				<div class="musique" >
					<h3>Musique</h3>
					<ul style="list-style-type:disc">
						<?php 
							foreach ($musiqueListe as $musique){ 
								echo "<li>$musique->type</li>" ;
							};
						?>
					</ul>
				</div>
				<div class="hobbies">
					<h3>Hobbies</h3>
					<ul style="list-style-type:disc">
						<?php 
							foreach ($hobbyListe as $hobby){ 
								echo "<li>$hobby->type</li>" ;
							};
						?>
					</ul>
				</div>
			</div>
			
			<div class="container_friendslisting">
				<?php
					foreach ($relationListe as $relation){
						$id_personne=$relation->relation_id;
						$relationInfos = $appliBD->getPersonneById ($id_personne);
						foreach ($relationInfos as $relationInfos){
							echo '<div class="container_friendsdetails">';
								/* <!-- BLOC D'IMAGES --> */
								echo '<div class="container_friendspicture">';
									echo"<a href='profil.php?id=$relationInfos->id'>";
										echo"<img class='friendspicture' src='$relationInfos->url_photo' alt='Photo de profil de $relationInfos->nom'>";
									echo "</a>";
								echo "</div>";
								/* <!-- BLOC D'INFOS --> */
								echo '<div class="container_friendsinfo">';
									echo"<a class='friendsinfo' href='profil.php?id=$relationInfos->id'>";
										echo "$relationInfos->nom $relationInfos->prenom";
									echo "</a>";
								echo "</div>";
							echo "</div>"; /* <!-- FIN BLOC DE DETAILS DES PERSONNES --> */
						};
					};
				?>
			</div>

		</div> <!-- FIN BLOC MUSIC HOBBY PERSONNE -->

	</div> <!-- FIN BLOC CONTENU -->
</body>

</html>

