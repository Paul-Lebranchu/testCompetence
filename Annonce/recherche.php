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
 		<title> Recherche annonce </title>
 	</head>

 	<body class="bg-dark">

 		<?php echo $menu;?>

 		<main class="bg-light">
 			<div class = "container-fluid">
				<h2> Recherche d'annonce : </h2>
				<form onsubmit = "return searchAnnonce();">
				   <input type="text" name="titre" placeholder="titre annonce .." id="titreSearsh"/>
				   <input type="number" step="0.01" name="sup" placeholder="prix superieur à .." id="sup" />
				   <input type="number" step="0.01" name="inf" placeholder="prix inferieur à .." id="inf"/>
				   <br>
				   <input type="radio" id="order1" name="order" value="titre" checked>
    			   <label for="order1">Titre ordre alphabétique</label>
				   <input type="radio" id="order2" name="order" value="titre desc">
    			   <label for="order2">Titre ordre inverse alphabétique</label>
				   <input type="radio" id="order3" name="order" value="prix">
    			   <label for="order3">Prix croissant</label>
				   <input type="radio" id="order4" name="order" value="prix desc">
    			   <label for="order4">Prix décroissant</label>
				   <br>
				   <input type="submit" class="btn btn-primary" value="Valider" />
				   <p class="err" id="errSearsh"></p>
				</form>

				<table class="table table-striped table-warning" id="res">
				</table>
 			</div>
 		</main>

 		<?php echo $footer; ?>

 	</body>
 </html>

<script>
	function searchAnnonce(){
		let titre = document.getElementById("titreSearsh").value;
		let inf = document.getElementById("inf").value;
		let sup = document.getElementById("sup").value;

		let radio = document.getElementsByName("order");
		let order = "";

		for(let i = 0; i < radio.length; i++){
			if(radio[i].checked){
				order = radio[i].value;
			}
		}

		err="";
		if(inf < 0 || inf < sup || sup < 0 || titre === "" || inf ==="" || sup ==="" ){
			err = "erreur dans votre formulaire!";
		}
		document.getElementById("errSearsh").innerHTML = err;

		if(err === ""){
			let ajax = new XMLHttpRequest();
			ajax.open("POST", "searchAnnonce.php", true);
			ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			ajax.send("titre=" + titre + "&inf=" + inf + "&sup= " + sup + "&order=" + order);

			ajax.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					let data = JSON.parse(this.responseText);
					let html =  "<thead> <th> id </th> <th> titre </th> <th> prix </th> <th> lien </th> </thead>";
					console.log(data);
					for (let a = 0; a < data.length; a++) {
						html += "<tr data-id='" + data[a].id_annonce +"'>";
						html += "<td>" + data[a].id_annonce + "</td>";
						html += "<td>" + data[a].titre + "</td>";
						html += "<td>" + data[a].prix + "</td>";
						html += "<td> <a href='getAnnonce.php?id=" + data[a].id_annonce + "'> <button class='btn btn-success'>Lien annonce </button> </a> </td>";
					}
					document.getElementById("res").innerHTML = html;
				}
			}
		}

		return false;
	}
</script>
