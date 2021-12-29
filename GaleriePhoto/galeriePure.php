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
 		<title> Galerie photo pure </title>
 	</head>

 	<body class="bg-dark">

 		<?php echo $menu;?>

 		<main class="bg-light">

 			<div class = "container-fluid text-center">
 				<h1> Galerie photo </h1>


 				<div id="data"></div>

 			</div>

 			</div>
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
			 if(a%2 == 0 ){
				 html += "<div class = 'row'>";
			 }
 			 html += "<div class = 'col-6' data-id='" + data[a].id_annonce +"'>";
 			 html += "<p> <img width=50% alt=" + data[a].titre + " src =" + data[a].photo + "> </p>";
 			 html += "</div>";
			 if(a%2 == 1 ){
				 html += "</div>"
			 }
 		 }

 		 document.getElementById("data").innerHTML += html;
 	 }
  };
 </script>
