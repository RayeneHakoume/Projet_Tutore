<?php

	require("../_scripts_/fonctionsPack.php");	
	require("../_scripts_/head.php");
	//////////////
?>

<div id = "CORPS_DOCUMENT">
<?php
	$parcoursINFO = null;
	if(isset($_GET["idp"])){
		$hash_num_parcours = $_GET["idp"];
		$mysqli = getMysqli();
		$query = "select * from n_parcours";
		$result = select($mysqli, $query);

		while ($row = $result->fetch_assoc()) {
			if(checkHash("-__ENGMKR:" . $row['num'] . ":RKMGNE__-",$hash_num_parcours)==0){
				$parcoursINFO = $row;
			}
		}
		if($parcoursINFO==null) {
			echo "Parcours indisponible";
			exit();
		}
	}else{
		echo 'Parcours indisponible';
		exit();

	}
?>

<p style="font-size:250%;color:white"><?php echo $parcoursINFO['titre'];?></p>
<p style="font-size:150%;color:white">Listes des Énigmes</p>
<div id="enigmeContainer" style="display:flex;flex-wrap: wrap;">

	<?php
	$mysqli = getMysqli();
	$query = "select * from n_enigme where num_parcours =" . $parcoursINFO['num'];
	$result = select($mysqli, $query);

	while ($row = $result->fetch_assoc()) {
		echo '<div class="enigme" ' . 
				'style="background:blue;color:white;display:inline;padding:1%;margin:1%; width:25%; text-align:center;" '.
				'onMouseOver="this.style.color=\'#0F0\'" '.
				'onMouseOut="this.style.color=\'#FFF\'" '.
				'onclick="selectEng(\''.$row['url'].'\')"> '. 
				$row['titre'] .
				'</br>' .
				//$row['pseudo_crea'] . dire si c'est une énigme textuelle ou pas 
				'</div>';
	}

	?>

	<script>
		
		function selectEng(url){
			urlParcours = window.location.href.split('=')[1];
			window.location.href = "./Jouer.php" + "?" + "idp=" + urlParcours + "&" + "ide=" + url;
		}
	
	</script>

</div>
</div>
<?php
	//////////////
	require("../_scripts_/tail.php");

?>