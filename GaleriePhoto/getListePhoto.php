<?php

include '../Commun/connexion.php';

	$requete = "SELECT titre, id_annonce, photo FROM annonce";
	$stmt = $bd->query($requete);

	echo json_encode($stmt->fetchAll());

 ?>
