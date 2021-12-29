<?php

include "Commun/connexion.php";
include "Commun/footer.php";
include "Commun/menu.php";

 ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<script src="Style/js/bootstrap.js"></script>
		<link rel="stylesheet" href="Style/css/bootstrap.css"  />
		<title> Accueil </title>
	</head>

	<body class="bg-dark">

		<?php echo $menu;?>

		<main class="bg-light">
			<div class = "container-fluid">
				<h1> Page d'accueil </h1>

				<p> Bienvenue sur notre site d'annonce </p>

				<p> Sur ce site, vous pourrez trouver un ensemble d'annonce sur des produit divers et variés
  					(<a href="Annonce/annonce.php"> cliquez ici pour les consulter </a>) ainsi qu'une galerie
					d'image contenant les images de nos différents produits (<a href="GaleriePhoto/galerie.php"> cliquez ici pour les consulter </a>)
				</p>
			</div>
		</main>

		<?php echo $footer; ?>

	</body>
</html>
