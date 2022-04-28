<?php
    require("../_scripts_/fonctionsPack.php");
	require("../_scripts_/head.php");
?>

<div id = "CORPS_DOCUMENT">
<?php
	echo "<div>";
	echo '<div id="topMenu" style="padding:2%;">';
	echo "<p style='color:white;'>";
if(checkSession()){
	echo '<input type="button" id="CREER_PARC" name="créer un parcour" value="créer un parcours" onclick="creer()">';
	echo '</div>';
	echo '<p style="margin:2%;font-size:160%;">Vos Parcours : </p>';
	echo '<div id="parcoursListe" style="margin:2%;display:flex;flex-wrap: wrap;">';
	afficherParcours();
	echo '</div>';
}else {
	echo '<input type="button" id="CREER_PARC" name="créer un parcour" value="créer un parcours" disabled="true">';
	echo '<p style=\'color:white;\'> vous devez vous connecter ! </p>';
	echo '</div>';
	exit();
	}
	echo "</p>";
	echo "</div>";
?>

<script type="text/javascript"> 
	function creer(){
		window.location.href = "./CreerParcours.php";
	}

	function awa(url){
	window.location.href = './VueParcours.php?id=' + url;
	}
</script> 
</div>

<?php
	require("../_scripts_/tail.php");
?>

<?php

function afficherParcours(){
	$mysqli = getMysqli();
	$query = "select * from n_parcours p where id_createur=" . $_SESSION['num'];
	$result = select($mysqli, $query);

	while ($row = $result->fetch_assoc()) {
		echo '<div class="parcours" style="background:blue;color:white;display:inline;padding:1%;margin:1%;user-select: none;" onMouseOver="this.style.color=\'#0F0\'" onMouseOut="this.style.color=\'#FFF\'" onclick="awa(\''. $row['url'] .'\')"> '. $row['titre'] .' </div>';
		echo "\n\n";
	}
}

?>