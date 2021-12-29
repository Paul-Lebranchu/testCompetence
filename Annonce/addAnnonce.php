<?php
	//requête modifiant les annonces
	include '../Commun/connexion.php';
	$requete  = "INSERT INTO annonce (titre, secteur, prix, reference, descriptif, photo, visible)
	VALUES (:titre, :secteur, :prix, :reference, :description, :photo, :visible)";

	$res = $bd->prepare($requete);
	$res->execute( array(
		":titre" => $_POST["titre"],
		":secteur" => $_POST["secteur"],
		":prix" => $_POST["prix"],
		":reference" => $_POST["reference"],
		":description" => $_POST["description"],
		":photo" => $_POST["image"],
		":visible" => $_POST["visible"]
	));

	echo $bd->lastInsertId();
 ?>
