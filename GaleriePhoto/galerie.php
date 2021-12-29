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
		<title> Galerie photo </title>
	</head>

	<body class="bg-dark">

		<?php echo $menu;?>

		<main class="bg-light">
			<div class = "container-fluid text-center">
				<h1> Galerie photo </h1>

				<table class="table table-striped">
					<thead>
						<th> Photo </th>
					</thead>
					<tbody id="data"></tbody>
				</table>
			</div>

			</div>

			<button class = "btn btn-dark"><a href="./../GaleriePhoto/galeriePure.php"> Galerie sans lien organisé en colonne </a> </button>
		</main>


		<?php echo $footer; ?>

	</body>
</html>


<script>
let ajax = new XMLHttpRequest();
 ajax.open("GET", "getListePhoto.php", true);
 ajax.send();

 ajax.onreadystatechange = function () {
	 if (this.readyState == 4 && this.status == 200) {
		 var data = JSON.parse(this.responseText);

		 var html = "";
		 for (var a = 0; a < data.length; a++) {
			 var id = data[a].numero;

			 html += "<tr data-id='" + data[a].id_annonce +"'>";
				 html += "<td> <img width=50% alt=" + data[a].titre + " src =" + data[a].photo + ">";
				 html += " <br> <br><a href='../Annonce/getAnnonce.php?id=" + data[a].id_annonce + "'> <button class='btn btn-success'>Lien annonce </button> </a> </td>";
			 html += "</tr>";
		 }

		 document.getElementById("data").innerHTML += html;
	 }
 };
</script>
