<?php
	if ((explode("/",getcwd())[count(explode("/",getcwd()))-1]) != "_ENIGMAKER_"){
		$sep = "../";
	}else{
		$sep = "./";
	}
?>
<header id="BANNIERE" style="display:flex;margin-bottom=2%;">
	<div style="display: flex; justify-content: space-around; width: 40%;">
		<div>ENIGMAKER</div>
		<a href='<?php echo $sep;?>index.php'>Accueil</a>
		<a href='<?php echo $sep;?>Connexion'>Connexion</a>
		<a href='<?php echo $sep;?>Inscription'>Inscription</a>
		<a href='<?php echo $sep;?>Jouer'>Jouer</a>
		<a href='<?php echo $sep;?>Creation'>Création</a>
	</div>

	<div style="display: flex; justify-content: flex-end; width: 60%;">
		<?php 
		if(checkSession()){
			echo "Vous êtes connecté(e) en tant que :  <b style='margin:0.5%;margin-top:0;'>" . $_SESSION['pseudo'] . "</b>";
			echo '<a href="' . $sep .'Connexion/deco.php" style="margin-left:2%;">Me déconnecter</a>';
		}else{
			echo 'Vous n\'êtes pas connecté(e)';
		}
		?>
	</div>
</header>