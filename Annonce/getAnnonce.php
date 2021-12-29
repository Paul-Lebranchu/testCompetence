<?php

include "../Commun/connexion.php";
include "../Commun/footer.php";
include "../Commun/menu.php";

 ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<script src="../Style/js/bootstrap.js"></script>
		<link rel="stylesheet" href="../Style/css/bootstrap.css"  />
		<title> Votre annonce </title>
	</head>

	<body class="bg-dark">

		<?php echo $menu;?>

		<main class="bg-light">
			<div class = "container-fluid">

				<?php
				//récupère l'identifinat de notre annonce
				$id = $_GET['id'];

				//selection de notre annonce :
				$requete = "SELECT * FROM annonce WHERE id_annonce = :id ";
				$res = $bd->prepare($requete);
				$res->execute( array(
					":id" => $id
				));

				//stocke les infos sur l'annonce dans ce tableau
			 	$data = $res->fetch();

				//bouton d'édition de l'annonces
				echo "<td> <a href='getEditAnnonce.php?id=".$id."'> <button class='btn btn-info'>Editer cette annonce </button> </a> </td>";
				//affiche les infos de l'annonce
				echo "<h1> Annonce  : ". $data['titre'] ;

				echo "<h2> Secteur d'activité : </h2>";

				echo $data['secteur'];

				echo "<h2> Prix : </h2>";

				echo $data['prix']." €";

				echo "<h2> Référence produit :</h2>";

				echo $data['reference'];

				echo "<h2> Description </h2>";

				echo $data['descriptif'];

				echo "<h2> Image </h2>";

				echo "<img src='".$data['photo']."' alt = '".$data['descriptif']."' width=100%>";

				echo "<h2> Annonce visible ?</h2>";

				if($data['visible'] === '1'){
					echo "annonce visible";
				}
				else{
					echo "annonce cachée";
				}
				?>


			</div>
		</main>

		<?php echo $footer;?>
	</body>
</html>
