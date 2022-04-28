<?php
    require("../_scripts_/fonctionsPack.php");
	require("../_scripts_/head.php");

	echo '<div id="topMenu" style="padding:2%;">';

if(!checkSession()){ //l'utilisateur n'a rien à faire ici s'il n'est pas connecté
	exit();
}
?>

<div id = "CORPS_DOCUMENT">
<?php
	if(isset($_GET["id"])){
		$hash_num_parcours = $_GET["id"];
		$num_parcours = -1;
		$mysqli = getMysqli();
		$query = "select * from n_parcours";
		$result = select($mysqli, $query);

		while ($row = $result->fetch_assoc()) {
			if(checkHash("-__ENGMKR:" . $row['num'] . ":RKMGNE__-",$hash_num_parcours)==0){
				echo "<p style='font-size:150%;text-align:center;'>" . $row['titre'] . "</p>";
				$num_parcours = $row['num'];
			}
		}
		if($num_parcours==-1) {
			echo "Parcours indisponible";
			exit();
		}
	}else{
		echo 'Parcours indisponible';
		exit();

	}
?>

<?php

	if((isset($_POST['ENIGME_TYPE']))){
		
		switch ($_POST["ENIGME_TYPE"]) { //en fonction de l'enigme reçue
		
		case '2': //enigme textuelle

			$type = $_POST['ENIGME_TYPE'];
			$QText_question = $_POST['QText_question'];
			$QText_reponse = $_POST['QText_reponse'];
			$QText_bgType = $_POST['QText_bgType'];
			$QText_bgInfo = $_POST['QText_bgInfo'];
			$titre = $_POST['ENIGME_TITRE'];
			$nb_indice = 3;

			$table = "n_enigme";

			$indexENG = getProchainIndex($mysqli,$table);
			$url = getHash("-__ENGMKR-ENG:" . $indexENG . ":GNE-RKMGNE__-");	

			$rq = "INSERT INTO " . $table . " (num,num_parcours,titre,nb_indice,url,QText_question,QText_reponse,QText_bgType,QText_bgInfo) VALUES (" . 
					$indexENG . "," . 
					$num_parcours . ",'" .
					$titre . "'," . 
					$nb_indice  . ",'" . 
					$url . "','" . 
					$QText_question  . "','" . 
					$QText_reponse  . "'," . 
					$QText_bgType  . ",'" . 
					$QText_bgInfo . "')";

			mysqli_query($mysqli, $rq);
			echo "Création réussie";
			break;
	
		default:
			echo 'ERREUR LORS DE LA CREATION DE VOTRE ENIGME';
			break;
		}

	}

echo '</div>'; //top menu
?>

<script>
	function creer(param){
		window.location.href = "./Createur.php#" + param + "?id=" + "<?php echo $hash_num_parcours;?>";
	}

	function engSelect(id){

	}
</script>

<div id="BoutonContainer" style="margin:2%;display:flex;flex-wrap: wrap;margin-left:0;">
	<input type="button" id="CREER_ENG" name="Créer une Enigme" value="Créer une énigme textuelle" onclick="creer(2)">
</div>
<div id="EngContainer" style="margin:2%;display:flex;flex-wrap: wrap;margin-left:0;">
	
	<?php
	$query = "select * from n_enigme e where num_parcours=" . $num_parcours;
	$result = select($mysqli, $query);
	$compteur = 0;
	while ($row = $result->fetch_assoc()) {
		$compteur +=1;
		echo '<div class="parcours" ' . 
				'style="background:blue;color:white;display:inline;padding:1%;margin:1%;" '.
				'onMouseOver="this.style.color=\'#0F0\'" '.
				'onMouseOut="this.style.color=\'#FFF\'" '.
				'onclick="engSelect(\''.$row['url'].'\')"> '. 
				$row['titre'] .
				'</div>';
	}

	if($compteur == 0){
		echo "rien crée";
	}
	?>

</div>

</div> 



<?php
	require("../_scripts_/tail.php");
?>
