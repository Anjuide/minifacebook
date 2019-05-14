<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/index.css">
	<link rel="icon" href="images/favicon.png">
	<!-- Charger la librairie d'icônes-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Liste de Profil</title>
	<?php
	include 'header.php';
	require_once 'connexion.php';
	$appliBD = new Connexion();
	$pattern = "";
	if ($_POST != null) {
		$pattern = $_POST['q'];
	}
	$allPersonne = $appliBD->getPersonneByPatterns($pattern);

	?>
</head>

<body>
	<div class="container">
		<form method="post">
			<!-- BLOC RECHERCHER ET CLASSER -->
			<div class="container_search">
				<!-- Rechercher une personne par son nom ou prénom -->
				<input type="search" id="site-search" class="search-input" name="q" placeholder="Rechercher un contact par nom ou prénom">
				<button type="submit" id="submit" name="submit" class="search-button"><i class="fa fa-search"></i></button>
			</div> <!-- FIN SEARCH_CLASS -->
		</form>
		<!-- Titre de la page  -->
		<h1>Liste des contacts</h1>
		<!-- BLOC LISTE DE PERSONNES -->
		<div class="container_friendslisting">
			<?php
			foreach ($allPersonne as $value) {
				/* BLOC DETAILS DES PERSONNES */
				echo '<div class="container_friendsdetails">';
				/* <!-- BLOC D'IMAGES --> */
				echo '<div class="container_friendspicture">';
				echo "<a href='profil.php?id=$value->id'>";
				echo "<img class='friendspicture' src='$value->url_photo' alt='Photo de profil de $value->nom'>";
				echo "</a>";
				echo "</div>";
				/* <!-- BLOC D'INFOS --> */
				echo '<div class="container_friendsinfo">';
				echo "<a class='friendsinfo' href='profil.php?id=$value->id'>";
				echo "$value->prenom $value->nom";
				echo "</a>";
				echo "</div>";
				echo "</div>"; /*  <!-- FIN BLOC DE DETAILS DES PERSONNES --> */
			}
			?>
		</div> <!-- FIN BLOC LISTE DE PERSONNES -->

	</div> <!-- FIN BLOC CONTENU -->
</body>

</html>