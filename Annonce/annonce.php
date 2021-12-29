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
		<!-- Style utilisé pour faire un champ texte type word -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../Style/jquery/RichText/richtext.min.css">
		<script src="../Style/jquery/jquery.min.js"></script>
		<script src="../Style/jquery/RichText/jquery.richtext.min.js"></script>

		<title> Liste d'annonce </title>
	</head>

	<body class="bg-dark">

		<?php echo $menu;?>

		<main class="bg-light">

			<div class = "container-fluid">


				<h1> Liste d'annonce </h1>

				<div>
					<a href="annonceVisible.php"><button class="btn btn-secondary"> Voir les annonces visibles </button></a>
				</div>

				<div>

					<h2> Formulaire d'ajout d'annonce </h2>
					<!-- Formulaire d'ajour de nouvelle annonce -->
					<form onsubmit = "return addAnnonce();">
						<div>
							 <label for="titre"> <h4> Titre : </h4></label>
							 <br>
	    		 			 <input type="text" id="titre" name="titre" placeholder = "titre de votre annonce"/>
							 <p class="err" id="errTitre"> </p>
						 </div>
						 <div>
							 <label for="secteur"> <h4> Secteur : </h4> </label>
							 <br>
	    		 			 <input type="text" id="secteur" name="secteur" placeholder = "Entrez votre secteur d'activité ">
							 <p class="err" id="errSecteur"> </p>
						 </div>
						 <div>
							 <label for="prix"> <h4> Prix : </h4></label>
							 <br>
	    		 			 <input type="number" step="0.01" id="prix" name="prix" placeholder = "Entrez le prix de votre annonce" >
							 <p class="err" id="errPrix"> </p>
						 </div>
						 <div>
							 <label for="reference"> <h4> Référence : </h4></label>
							 <br>
	    		 			 <input type="text" id="reference" name="reference" placeholder = "Entrez la référence de votre annonce" >
							 <p class="err" id="errReference"> </p>
						 </div>
						 <div>
							 <label for="description"><h4> Description : </h4></label>
							 <br>
							 <textarea class = "content" id="description" name="description" rows="5" cols="33"></textarea>
							 <p class="err" id="errDescription"> </p>
						 </div>
						 <div>
							 <label for="image"><h4> Image : </h4></label>
							 <br>
	    		 			 <input type="url" id="image" name="image" placeholder = "Insérez url de votre image" >
							 <p class="err" id="errImage"> </p>
						 </div>
						 <div>
							<input type="checkbox" id="visible" name="visible">
							<label for="visible"> Annonce visible</label>
						 </div>
						 <br>
						 <input type="submit" class="btn btn-primary" value="ajouter une annonce">
						 <br>
					</form>

				</div>

				<div>
					<button class='btn btn-info' data-bs-toggle='modal' data-bs-target='#politique'> Politique de gestion de vos données personelles ! </button>
				</div>


				<div>
					<h2> Les annonces : </h2>
					<button id='loadAnnonce' onclick="reload()"> charger les annonces </button>

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

			</div>

			<!-- Modal pour la suppresion d'une annonce -->
			<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content bg-dark text-light">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel"></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<p> Voulez-vous vraiment supprimer votre annonce? </p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" id="confirmDel" data-bs-dismiss="modal">Supprimer annonce</button>
							<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal pour la politique de confidentialité des données-->
			<div class="modal fade" id="politique" tabindex="-1" aria-labelledby="labelPolitique" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content bg-dark text-light">
						<div class="modal-header">
							<h5 class="modal-title" id="labelPolitique">Politique de confidentialité des données</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<p>Les informations recueillies sur ce formulaire sont enregistrées dans un fichier informatisé par
								[identité et coordonnées du responsable de traitement] pour [finalités du traitement]. La base
								légale du traitement est [base légale du traitement].
							</p>
							<p>Les données collectées seront communiquées aux seuls destinataires suivants : [destinataires des
								données].
							</p>
							<p>Les données sont conservées pendant [durée de conservation des données prévue par le responsable
								du traitement ou critères permettant de la déterminer].
							</p>
							<p>Vous pouvez accéder aux données vous concernant, les rectifier, demander leur effacement ou
								exercer votre droit à la limitation du traitement de vos données. (en fonction de la base légale
								du traitement, mentionner également : Vous pouvez retirer à tout moment votre consentement au
								traitement de vos données ; Vous pouvez également vous opposer au traitement de vos données ;
								Vous pouvez également exercer votre droit à la portabilité de vos données)
							</p>
							<p>Consultez le site cnil.fr pour plus d’informations sur vos droits.</p>

							<p>Pour exercer ces droits ou pour toute question sur le traitement de vos données dans ce dispositif,
								 vous pouvez contacter (le cas échéant, notre délégué à la protection des données ou le
								 service chargé de l’exercice de ces droits) : [adresse électronique, postale, coordonnées
								 téléphoniques, etc.]
							</p>
							<p>Si vous estimez, après nous avoir contactés, que vos droits « Informatique et Libertés » ne sont
								pas respectés, vous pouvez adresser une réclamation à la CNIL.
							</p>
							<p>N.B : distinguer dans le formulaire de collecte, par exemple via des astérisques, les données dont
								la fourniture est obligatoire de celles dont la fourniture est facultative et précisez les
								conséquences éventuelles en cas de non-fourniture des données.
							</p>
						</div>
						<div class="modal-footer">

							<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
						</div>
					</div>
				</div>
			</div>

		</main>

		<?php echo $footer; ?>

	</body>
</html>

<script>
	$('.content').richText();

	//création de la liste des annonces
	let ajax = new XMLHttpRequest();
	 ajax.open("GET", "getListeAnnonce.php", true);
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
					 html += "<td> <a href='getEditAnnonce.php?id=" + data[a].id_annonce + "'> <button class='btn btn-warning'>EDIT </button> </a> </td>";
					 html += "<td> <button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#delete' data-bs-id='" + data[a].id_annonce + "'> DELETE </button> </td>";
				 html += "</tr>";
			 }

			 document.getElementById("data").innerHTML += html;
		 }
	 };

	 //fonction rechargeant les annonces au cas où il y ait eu modif de la part d'un autre utilisateur
	 function reload(){
		 //supprime le contenu de la table
		 $('#data').empty();
		 //recréer le contenu de la table
		 let ajax = new XMLHttpRequest();
	 	 ajax.open("GET", "getListeAnnonce.php", true);
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
	 					 html += "<td> <a href='getEditAnnonce.php?id=" + data[a].id_annonce + "'> <button class='btn btn-warning'>EDIT </button> </a> </td>";
	 					 html += "<td> <button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#delete' data-bs-id='" + data[a].id_annonce + "'> DELETE </button> </td>";
	 				 html += "</tr>";
	 			 }

	 			 document.getElementById("data").innerHTML += html;
	 		 }
	 	 };
	 }
	 //vérifie que l'ensemble des champs soit non vide, est appelé dans le fonction d'ajout
	 function verifForm(){
		//selection des différents élément du formulaire
		let titre = document.getElementById("titre").value;
		let secteur = document.getElementById("secteur").value;
		let prix = document.getElementById("prix").value;
		let reference = document.getElementById("reference").value;
		let description = document.getElementById("description").value;
		let image = document.getElementById("image").value;

		let err = 0;

		//réinitialisation des messages d'erreur
		document.getElementById("errTitre").innerHTML ="";
		document.getElementById("errSecteur").innerHTML ="";
		document.getElementById("errPrix").innerHTML ="";
		document.getElementById("errReference").innerHTML ="";
		document.getElementById("errDescription").innerHTML ="";
		document.getElementById("errImage").innerHTML ="";
		//ajout de message d'erreur si nécesssaire
		if(titre === ""){
			document.getElementById("errTitre").innerHTML = "Veuillez rentrez un titre pour votre annonce";
			err = 1;
		}

		if(secteur === ""){
			document.getElementById("errSecteur").innerHTML = "Veuillez renseigné votre secteur d'activité";
			err = 1;
		}

		if(prix === ""){
			document.getElementById("errPrix").innerHTML = "Veuillez renseigné un prix pour votre annonce";
			err = 1;
		}

		if(reference === ""){
			document.getElementById("errReference").innerHTML = "Veuillez renseigné la référence de votre annonce";
			err = 1;
		}

		if(description === ""){
			document.getElementById("errDescription").innerHTML = "Veuillez renseigné une description de votre annonce";
			err = 1;
		}

		if(image === ""){
			document.getElementById("errImage").innerHTML = "Veuillez renseigné une url valide pour votre image de votre annonce";
			err = 1;
		}
		if(err === 1){
			return false;
		}
		return true;
 	}

	//function pour ajouter une nouvelle annonce
	function addAnnonce(){
		//supprime le contenu de la table
		 $('#data').empty();
		 //recharge le contenu de la table
		 reload();
		let titre = document.getElementById("titre").value;
		let secteur = document.getElementById("secteur").value;
		let prix = document.getElementById("prix").value;
		let reference = document.getElementById("reference").value;
		let description = document.getElementById("description").value;
		let image = document.getElementById("image").value;
		let checked = document.getElementById("visible").checked;

		if(checked == true){
			checked = 1;
		}
		else{
			checked = 0;
		}

		if(verifForm()){
			let ajax = new XMLHttpRequest();
			ajax.open("POST", "addAnnonce.php", true);
			ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			ajax.send("titre=" + titre + "&secteur=" + secteur + "&prix= " + prix
		    + "&reference=" + reference + "&description=" + description + "&image=" +image
			+ "&visible=" + checked);

			ajax.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					console.log(this.responseText);

					let html = "<tr data-id='" + this.responseText +"'>";
						 html += "<td>" + this.responseText + "</td>";
						 html += "<td>" + titre + "</td>";
						 html += "<td>" + secteur + "</td>";
						 html += "<td>" + reference + "</td>";
						 html += "<td>" + checked + "</td>";
						 html += "<td> <a href='getAnnonce.php?id=" +  this.responseText+ "'> <button class='btn btn-success'>Lien annonce </button> </a> </td>";
						 html += "<td> <a href='getEditAnnonce.php?id=" +  this.responseText+ "'> <button class='btn btn-warning'>EDIT </button> </a> </td>";
						 html += "<td> <button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#delete' data-bs-id='" + this.responseText + "'> DELETE </button> </td>";
					 html += "</tr>";

					document.getElementById("data").innerHTML += html;

				}
			}
		}
		return false;
	}


	//fonction de suppression de l'annonce
	function deleteAnnonce(id){
		//supprime le contenu de la table
		 $('#data').empty();
		 //recharge le contenu de la table
		 reload();
		 let ajax = new XMLHttpRequest();
		 ajax.open("POST", "deleteAnnonce.php", true);
		 ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		 ajax.send("id=" + id);

		 ajax.onreadystatechange = function () {
			 if (this.readyState == 4 && this.status == 200) {
				 console.log(this.responseText);
				 document.querySelector("tr[data-id='" + id + "']").remove();
			 }
		 };
		 return false;

	}

	function searchAnnonce(){
		let titre = document.getElementById("titreSearsh").value;
		let inf = document.getElementById("inf").value;
		let sup = document.getElementById("sup").value;
		err="";
		if(inf < 0 || inf > sup || sup < 0 || titre === ""){
			err = "erreur dans votre formulaire!";
		}
		let ajax = new XMLHttpRequest();
		ajax.open("POST", "searchAnnonce.php", true);
		ajax.setRequestHeader("Content-type", "");
		ajax.send("titre=" + titre + "&inf=" + inf + "&sup= " + sup );

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
				document.getElementById("errSearsh").innerHTML = err;
				document.getElementById("res").innerHTML = html;
			}
		}

		return false;
	}

	//paramètre modal suppression
	let delAnnonce = document.getElementById('delete');
	delAnnonce.addEventListener('show.bs.modal', function (event) {

		// ajout du numéro de l'annonce à supprimer dans le titre de la modal
		let button = event.relatedTarget;
		let id = button.getAttribute('data-bs-id');
		let modalTitle = delAnnonce.querySelector('.modal-title');
		modalTitle.innerHTML = "Confirmation de suppresion de l'annonce n°" + id;

		//ajout de la fonction supprimer sur le bouton danger de la modal
		let confirmDel = delAnnonce.querySelector('#confirmDel');
		confirmDel.addEventListener("click", function(e){
			deleteAnnonce(id);
		})
	})

</script>
