<?php

include '../Commun/connexion.php';

	$titre = "%".$_POST["titre"]."%";
	$order = $_POST['order'];
	switch ($order){
		case "titre":
			$rq = "SELECT * FROM annonce WHERE titre LIKE :titre  AND prix > :sup AND prix < :inf ORDER BY titre";
			break;
		case "titre desc":
			$rq = "SELECT * FROM annonce WHERE titre LIKE :titre  AND prix > :sup AND prix < :inf ORDER BY titre DESC";
			break;
		case "prix":
			$rq = "SELECT * FROM annonce WHERE titre LIKE :titre  AND prix > :sup AND prix < :inf ORDER BY prix";
			break;
		case "prix desc":
			$rq = "SELECT * FROM annonce WHERE titre LIKE :titre  AND prix > :sup AND prix < :inf ORDER BY prix DESC";
			break;
	}


	$res = $bd->prepare($rq);
	$res->execute( array(
		":titre" => $titre,
		":inf"	=> $_POST["inf"],
		":sup" => $_POST["sup"]
	));
	$resultat = $res->fetchAll();

	echo json_encode($resultat);
 ?>
