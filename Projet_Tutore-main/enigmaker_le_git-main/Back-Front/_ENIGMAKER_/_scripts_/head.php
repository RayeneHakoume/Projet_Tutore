<?php
	/*
	ici on cherche à définir si on est dans la racine (_ENIGMAKER_) du site (l'accueil) ou si on est ailleurs. 
	l'accueil étant le seul fichier qui n'est pas dans un répértoire, les liens relatifs doivent être changés.
	*/
	if ((explode("/",getcwd())[count(explode("/",getcwd()))-1]) != "ENIGMAKER"){
		$sep = "../";
	}else{
		$sep = "./";
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head style="margin-bottom=1%;">
	<?php echo "\n"; require($sep . "_scripts_/genererTitrePage.php");?> <!--$sep = "./" ou "../" !-->
	<meta charset="UTF-8">
	<link href="<?php echo $sep;?>style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link rel="stylesheet" href="./styleParticulier.css" />
	<?php
		if($sep == './') {//si c'est l'index
			    echo '
					<script type="text/javascript" src="./js/jquery.js"></script>
					<script type="text/javascript" src="./js/lightslider.js"></script>
					<link rel="stylesheet" href="./slider.css" />
				';
		}
	?>
</head>

<?php 
	require($sep . "_scripts_/banniere.php"); 
	echo "<body id='bdy'>";
?>
