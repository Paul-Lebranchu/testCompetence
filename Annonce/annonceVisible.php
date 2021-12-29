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

		<title> Liste d'annonce </title>
	</head>

	<body class="bg-dark">

		<?php echo $menu;?>

		<main class="bg-light">

			<div>
				<h2> Les annonces visibles: </h2>

				<table class="table table-striped">
					<thead>
						<th> ID annonce </th>
						<th> Titre</th>
						<th> Secteur </th>
						<th> Reference </th>
						<th> Annonce visible </th>
						<th> Lien annonce </th>
					</thead>
					<tbody id="data"></tbody>
				</table>
			</div>

		</main>

		<?php echo $footer; ?>
	</body>
</html>

<script>

//création de la liste des annonces
let ajax = new XMLHttpRequest();
 ajax.open("GET", "getListeAnnonceVisible.php", true);
 ajax.send();

 ajax.onreadystatechange = function () {
	 if (this.readyState == 4 && this.status == 200) {
		 let data = JSON.parse(this.responseText);

		 let html = "";
		 for (let a = 0; a < data.length; a++) {

			 html += "<tr data-id='" + data[a].id_annonce +"'>";
				 html += "<td>" + data[a].id_annonce + "</td>";
				 html += "<td>" + data[a].titre + "</td>";
				 html += "<td>" + data[a].secteur + "</td>";
				 html += "<td>" + data[a].reference + "</td>";
				 html += "<td>" + data[a].visible + "</td>";
				 html += "<td> <a href='getAnnonce.php?id=" + data[a].id_annonce + "'> <button class='btn btn-success'>Lien annonce </button> </a> </td>";
			 html += "</tr>";
		 }

		 document.getElementById("data").innerHTML += html;
	 }
 };
</script>
