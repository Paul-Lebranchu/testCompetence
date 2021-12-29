<?php

include '../Commun/connexion.php';

	$requete = "SELECT * FROM annonce";
	$stmt = $bd->query($requete);

	echo json_encode($stmt->fetchAll());

 ?>
