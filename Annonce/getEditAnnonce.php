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
		<title> Votre annonce </title>
	</head>

	<body class="bg-dark">

		<?php echo $menu;?>

		<main class="bg-light">
			<div class = "container-fluid">

				<?php
				//récupère l'identifinat de notre annonce
				$id = $_GET['id'];

				//selection de notre annonce :
				$requete = "SELECT * FROM annonce WHERE id_annonce = :id ";
				$res = $bd->prepare($requete);
				$res->execute( array(
					":id" => $id
				));

				//stocke les infos sur l'annonce dans ce tableau
			 	$data = $res->fetch();
				?>

				<h1> Formulaire d'édition d'annonce : </h1>
				<form onsubmit = "return editAnnonce();">
					<input type="hidden" id="id" value="<?= $id; ?>">
					<div>
						 <label for="titre"> <h4> Titre : </h4></label>
						 <br>
						 <input type="text" id="titre" name="titre" value='<?php echo $data['titre'] ?>'/>
						 <p class="err" id="errTitre"> </p>
					 </div>
					 <div>
						 <label for="secteur"> <h4> Secteur : </h4> </label>
						 <br>
						 <input type="text" id="secteur" name="secteur" value='<?php echo $data['secteur'] ?>'>
						 <p class="err" id="errSecteur"> </p>
					 </div>
					 <div>
						 <label for="prix"> <h4> Prix : </h4></label>
						 <br>
						 <input type="number" step="0.01" id="prix" name="prix" value='<?php echo $data['prix'] ?>'>
						 <p class="err" id="errPrix"> </p>
					 </div>
					 <div>
						 <label for="reference"> <h4> Référence : </h4></label>
						 <br>
						 <input type="text" id="reference" name="reference" value='<?php echo $data['reference'] ?>'>
						 <p class="err" id="errReference"> </p>
					 </div>
					 <div>
						 <label for="description"><h4> Description : </h4></label>
						 <br>
						 <textarea class ="content" id="description" name="description" rows="5" cols="33"><?php echo $data['descriptif'] ?></textarea>
						 <p class="err" id="errDescription"> </p>
					 </div>
					 <div>
						 <label for="image"><h4> Image : </h4></label>
						 <br>
						 <input type="url" id="image" name="image" value='<?php echo $data['photo'] ?>' >
						 <p class="err" id="errImage"> </p>
					 </div>
					 <div>
						<input type="checkbox" id="visible" name="visible" <?php if($data['visible'] === '1' ){echo 'checked';} ?> >
						<label for="visible"> Annonce visible</label>
					 </div>
					 <br>
					 <input type="submit" class="btn btn-primary" value="éditer votre annonce">
					 <br>
				</form>

				<div>
					<button class='btn btn-info' data-bs-toggle='modal' data-bs-target='#politique'> Politique de gestion de vos données personelles ! </button>
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

		<?php echo $footer;?>
	</body>
</html>

<script>
	$('.content').richText();

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
	   //ajout message d'erruer si il y en a
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
	//édition de l'annonce
	function editAnnonce(){
		//récupère les variables pour notre requete
		var titre = document.getElementById("titre").value;
		var secteur = document.getElementById("secteur").value;
		var prix = document.getElementById("prix").value;
		var reference = document.getElementById("reference").value;
		var description = document.getElementById("description").value;
		var image = document.getElementById("image").value;
		var id = document.getElementById("id").value;
		var checked = document.getElementById("visible").checked;

		if(checked == true){
			checked = 1;
		}
		else{
			checked = 0;
		}

		if(verifForm()){
			//utilise ajax pour appeller le fichier editAnnonce.php et executé sa requête
			let ajax = new XMLHttpRequest();
			ajax.open("POST", "editAnnonce.php", true);
			ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			ajax.send("titre=" + titre + "&secteur=" + secteur + "&prix= " + prix
			+ "&reference=" + reference + "&description=" + description + "&image=" + image +
			"&id=" + id + "&visible=" + checked);

			ajax.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					console.log(this.responseText);
					//redirection vers la page de l'annonce
					document.location.href="getAnnonce.php?id="+id;
				}
			}
		}
		return false;
	}
</script>
