<?php

include '../Commun/connexion.php';

	$requete = "SELECT * FROM annonce WHERE visible = 1";
	$stmt = $bd->query($requete);

	echo json_encode($stmt->fetchAll());

 ?>
