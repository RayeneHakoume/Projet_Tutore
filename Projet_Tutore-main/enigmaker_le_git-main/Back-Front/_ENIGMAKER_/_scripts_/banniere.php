<?php
	if ((explode("/",getcwd())[count(explode("/",getcwd()))-1]) != "ENIGMAKER"){
		$sep = "../";
	}else{
		$sep = "./";
	}
?>


<header>
	<script>
		function logoClique(){
			window.location.replace("<?php echo $sep;?>index.php");
		}
	</script>
	<nav>
		<a href="<?php echo $sep;?>index.php"></a> <label class="logo" id="ENIGMAKER_LOGO" onclick="logoClique()">Enigmaker</label>
		<ul>
			<button class="btn btn-secondary" type="button">
				<i class="fa fa-search"></i>
			</button>
			<li><a href="<?php echo $sep;?>Recherche"></a><form action="<?php echo $sep;?>Recherche"><input type="search" id="search" name="srch" placeholder="Recherche..."></form></li>

			<li><a class="active" href="<?php echo $sep;?>index.php">Accueil</a></li>
			<li>
				<a href="<?php echo $sep;?>Jouer">Jouer <i class="fas fa-caret-down"></i></a>
				<ul>
					<li><a style ='font-size:86%;' href="#">Voir Tout</a></li>
					<li><a style ='font-size:86%;' href="#">Trier Par Créateur</a></li>
					<li><a style ='font-size:86%;' href="#">Les plus populaires</a></li>

				</ul>
			</li>
			<li><a href="<?php echo $sep;?>Creation">Créer enigme</a> </li>
			<?php 
				if(checkSession()){
					echo '<li>';
					echo '<a id="ATTENTION_CLIQUER" href="' . $sep .'Connexion/deco.php">Se déconnecter</a></li>';
					echo '</li>';

					echo '<li>';
					echo '<a href="' . $sep .'Profil">Mon Profil</a></li>';
					echo '</li>';
				}else{
					echo '<li><a href="'.$sep.'Inscription">Inscription</a></li>';
					echo '<li><a href="' . $sep .'Connexion">Se connecter</a></li>';
				}
			?>
			<li>
			

		</ul>
	</nav>
</header>