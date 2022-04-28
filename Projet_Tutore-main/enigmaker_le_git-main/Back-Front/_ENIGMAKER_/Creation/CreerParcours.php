<?php

	require("../_scripts_/fonctionsPack.php");	
	require("../_scripts_/head.php");
	//////////////
	if(!checkSession()){ //l'utilisateur n'a rien à faire ici s'il n'est pas connecté
	exit();
	}
?>

<div id = "CORPS_DOCUMENT">
<?php
	if ( isset( $_POST['submit'] ) ) {
		$mysqli = getMysqli();

		$num = getProchainIndex($mysqli,"n_parcours");
		$id_createur = $_SESSION['num'];
		$titre = "'" . $_POST['titre'] . "'";
		$date_crea = "'" . date("Y-m-d") . "'";
		$nb_vue = 0;
		$note = 0;
		$pseudo_crea = "'" . $_SESSION['pseudo'] . "'";
		$diff = -1;
		$url = "'" . getHash("-__ENGMKR:" . $num . ":RKMGNE__-") . "'";

		$query = "INSERT INTO n_parcours VALUES (" . 
					$num			. "," . 
					$id_createur	. "," . 
					$titre			. "," . 
					$date_crea		. "," . 
					$nb_vue			. "," . 
					$note			. "," .
					$pseudo_crea	. "," .
					$diff			. "," .
					$url . ")";
		mysqli_query($mysqli, $query);
		echo "<SCRIPT type='text/javascript'>window.location.replace(\"./VueParcours.php?id=" . str_replace('\'', '', $url) . "\");</SCRIPT>";
	}
?>
</div>

<?php
	
	readfile("./formulaire.php");

?>

<?php
	//////////////
	require("../_scripts_/tail.php");

?>