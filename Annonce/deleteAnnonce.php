<?php
	include '../Commun/connexion.php';
	$requete  = "DELETE FROM annonce WHERE id_annonce = :id ";

	$res = $bd->prepare($requete);
	$res->execute( array(
		":id" => $_POST["id"]
	));

	echo "Supression réussi!";
 ?>
