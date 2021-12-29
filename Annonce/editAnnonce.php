<?php
	include '../Commun/connexion.php';
	$rq = "UPDATE annonce SET titre = :titre, secteur = :secteur, prix = :prix,
	reference = :reference, descriptif = :description, photo = :photo, visible = :visible
	where id_annonce = :id";

	$res = $bd->prepare($rq);
	$res->execute( array(
		":titre" => $_POST["titre"],
		":secteur" => $_POST["secteur"],
		":prix" => $_POST["prix"],
		":reference" => $_POST["reference"],
		":description" => $_POST["description"],
		":photo" => $_POST["image"],
		":visible" => $_POST["visible"],
		":id" => $_POST["id"]
	));
	echo $_POST["visible"];
	echo "modification réussi";


 ?>
