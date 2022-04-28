<?php

	require("../_scripts_/fonctionsPack.php");	
	require("../_scripts_/head.php");
	//////////////
?>

<div id = "CORPS_DOCUMENT">
<p style="font-size:150%;color:white">Listes des Parcours</p>
<div id="parcoursContainer" style="display:flex;flex-wrap: wrap;">

	<?php
	$mysqli = getMysqli();
	$query = "select * from n_parcours";
	$result = select($mysqli, $query);

	while ($row = $result->fetch_assoc()) {
		echo '<div class="parcours" ' . 
				'style="background:blue;color:white;display:inline;padding:1%;margin:1%; width:25%; text-align:center;" '.
				'onMouseOver="this.style.color=\'#0F0\'" '.
				'onMouseOut="this.style.color=\'#FFF\'" '.
				'onclick="selectParcours(\''.$row['url'].'\')"> '. 
				$row['titre'] .
				'</br>' .
				$row['pseudo_crea'] .
				'</div>';
	}

	?>

	<script>
		
		function selectParcours(url){
			window.location.href = "./VueParcours.php" + "?" + "idp=" + url;
		}
	
	</script>

</div>

</div>
<?php
	//////////////
	require("../_scripts_/tail.php");

?>