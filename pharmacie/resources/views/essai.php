<!-- <script>
    $("#num_commande").change(function(){
    $.get('qnté_commandée/'+paysID)
        .success(function(data) {
        	if (data.length > 0) {
              $("#regions").empty();
    			$(data).each(function(index, value) 
    			{
                  $("#regions").append("<option value="+data[index].id+">"+data[index].nom_ville+"</option>"); 			
    			});
                
            }
            else {
            // no result
            }	
        })
        .error(function(data) { 
           alert('Error: ' + data); 
        }); 
}
</script>

public function getListCitiesByCountry($idpays) {
        $villes = City::where('countryid', $idpays)->get();
        return $villes;
    }

    Route::get('villes/{idpays}', 'AddressController@getListCitiesByCountry');


    <!DOCTYPE HTML>
<html dir="ltr" lang="fr">
<head>
	<meta charset="utf-8" />
	<title>Formulaire d'Inscription</title>
	<style type="text/css">
 
 body {
	background-color: #33FFCC;
}
</style>
 
<script src="scripts/jquery.1.5.1.min.js"></script> 
<script type="text/javascript">
	/* Initialisation XMLHttpRequest (obligatoire) */
	function getXhr(){
		var xhr = null; 
		if(window.XMLHttpRequest) // Firefox et autres
		   xhr = new XMLHttpRequest(); 
		else if(window.ActiveXObject){ // Internet Explorer 
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else { // XMLHttpRequest non supporté par le navigateur 
			alert ("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
			xhr = false; 
		} 
		return xhr;
	};
 
	/* Charger la liste "ville" après choix dans la liste "province" */
	function changeVilleParProvince( id_province, iddiv_ajax ){
		var id_province; // valeur de l'option ("id_province") choisie
		var iddiv_ajax; // id du div dans lequel on remplira la liste des "villes"
		var nom_province;
		var xhr = getXhr();
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200)
			{
				texthtml = xhr.responseText;
				// innerHTML va ajouter les options à la liste des "villes"
				document.getElementById(iddiv_ajax).innerHTML = texthtml;
			}
		}
		// on defini la methode (post) + le fichier de traitement + asynchrone (true)
		xhr.open("POST","ajaxVillesFromProvinces.php",true);
		// ne pas oublier ça pour le post
		xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		// on poste les parametres a transmettre au fichier qui fera le traitement
		xhr.send("id_province="+id_province);
	};
 
</script>
 
 
 
<style>
#formulaireBox { width:48em; margin:auto; border:1px solid black; padding:1em; }
#formulaireBox label { display:inline-block; min-width: 150px; }
#msgerreurBox { font-size:0.8em; font-weight:bold; color:red; }
</style>
</head>
 
<body>
 
<div id="formulaireBox">
	<h4>Formulaire</h4>
	<form action="#" method="post" id = "form_identification">	
 
 
<?php
 
?>
			</select>
			</span>
		</p>
 
		<legend>1: Choisissez d'abord une province. 2: Ensuite une ville. </legend> 
 
		<p>
			<label for="idid_province">1.Province : </label>
			<select id="id_province" name="id_province" onChange="changeVilleParProvince(this.options[this.selectedIndex].value,'iddiv3');">
				<!-- on appelle la fct sur le onchange (valeur-choisie, id-du-div-à-remplir) -->
				<option value="-1">Choisir une province</option>
<?php
 
// --------------------------------------------------------------
// Paramètres de connection a la Base de Données sur le serveur
// --------------------------------------------------------------
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND]  = 'SET NAMES utf8';
	$pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
	$bdd = new PDO('mysql:host=localhost;dbname=provinces', 'root', '', $pdo_options);
// --------------------------------------------------------------
				// requete : liste de toutes les provinces
				$province_sql = "SELECT id_province, nom_province FROM province ORDER BY nom_province ASC;";
				$province_res = $bdd->prepare($province_sql);				  
				$province_res->execute(array());
				while($province_row = $province_res->fetch())
				{
					$selected = (isset($_SESSION['post_form']['id_province']) && $_SESSION['post_form']['id_province']==$province_row['id_province'])? ' selected="selected"' : '';
?>
				<option value="<?php echo $province_row['id_province']; ?>"<?php echo $selected; ?>><?php echo $province_row['nom_province']; ?></option>
<?php			} ?>
			</select>
		</p>
          <p>
			<label for="idid_ville">2. Ville : </label>
			<span id="iddiv3"><!-- c'est ici que par innerHTML AJAX va ecrire la liste2 -->
			<select id="idid_ville" name="id_ville">
			<?php		// déjà une province choisie
			if( isset($_SESSION['post_form']['id_province']) && $_SESSION['post_form']['id_province']>0){
			?>
 
		<option value="-1">Choisir une ville</option>
 
 
		// requete : la liste des "villes" de la province choisie
 
<?php  
 
// --------------------------------------------------------------
// Paramètres de connection a la Base de Données sur le serveur
// --------------------------------------------------------------
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND]  = 'SET NAMES utf8';
	$pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
	$bdd = new PDO('mysql:host=localhost;dbname=provinces', 'root', '', $pdo_options);
// --------------------------------------------------------------
				// requete : liste de toutes les villes
				$ville_sql =	"SELECT  nom_ville FROM ville WHERE id_ville =  ?;"; 
 
				$ville_res = $bdd->prepare($ville_sql);				  
				$ville_res->execute(array($_SESSION['post_form']['id_province']));
				while($ville_row = $ville_res->fetch())
				{
					$selected = (isset($_SESSION['post_form']['id_ville']) && $_SESSION['post_form']['id_ville']==$ville_row['id_ville'])? ' selected="selected"' : '';
?>
				<option value="<?php echo $ville_row['id_ville']; ?>"<?php echo $selected; ?>><?php echo $ville_row['nom_ville']; ?></option>
<?php			
          }
          // SI pas de province choisie (-1) ou erreur : on met le select "par defaut" :
		}else{	  
?>
	<option value="-1">	Choisissez d'abord une province</option>
 
<?php
  }        
?>
		</select>
			</span>
		</p>  
		<!-- on appelle la fct sur le onchange (valeur-choisie, id-du-div-à-remplir) onChange=changeVilleParCommune(this.options[this.selectedIndex].value,'iddiv4')-->
		<p>		
	<label for="idid_commune">3.Commune : </label>
 
 
	  </p>
 
		<p style="margin-top:1.5em">
			<input name="envoyer" value="Envoyer" type="submit"/>
		</p>	  
 </div>
	</form>
<?php
if(!empty($_SESSION['post_form']['message']))
{
?>
	<ul id="msgerreurBox">
<?php
	foreach($_SESSION['post_form']['message'] as $value)
	{
		echo '<li>'.$value.'</li>';
	}
?>
</ul>
<?php
}
?>
</div>
 
</body>
</html> -->