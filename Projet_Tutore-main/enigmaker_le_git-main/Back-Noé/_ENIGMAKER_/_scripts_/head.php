<?php
	/*
	ici on cherche à définir si on est dans la racine (_ENIGMAKER_) du site (l'accueil) ou si on est ailleurs. 
	l'accueil étant le seul fichier qui n'est pas dans un répértoire, les liens relatifs doivent être changés.
	*/
	if ((explode("/",getcwd())[count(explode("/",getcwd()))-1]) != "_ENIGMAKER_"){
		$sep = "../";
	}else{
		$sep = "./";
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<?php echo "\n"; require($sep . "_scripts_/genererTitrePage.php");?>
	<meta charset="UTF-8">
	<link href="./style.css" rel="stylesheet" type="text/css">
</head>

<?php 
	echo "<body id='bdy'>";
	require($sep . "_scripts_/banniere.php"); 
?>