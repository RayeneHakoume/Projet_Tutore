
<?php
	require("../_scripts_/fonctionsPack.php");
	require("../_scripts_/head.php");
?>

<div id = "CORPS_DOCUMENT">
<?php
	echo '<div style="display:flex;flex-direction: column;align-content: center;flex-wrap: wrap;justify-content: center;align-items: flex-start;color:white;">';
	$trouve = 0;
	if ( isset( $_POST['submit'] ) ) {
		$email = $_POST['email'];
		$mdp = $_POST['mdp'];
		

		
		$rq = 'SELECT * FROM n_utilisateur';
		$mysqli = getMysqli();
		$result = select($mysqli , $rq);
		while ($row = $result->fetch_row()) { //pour chaque utilisateurs obtenus :
			/*
			$row[0] = num
			$row[1] = nom
			$row[2] = prenom
			$row[3] = pseudo
			$row[4] = email
			$row[5] = mdp (hash)
			$row[6] = date inscription
			$row[7] = nb mission réussite
			$row[8] = nb parcours terminés
			*/

			if(checkHash($mdp,$row[5]) == 0){
				//setSession($nom,$prenom,$pseudo)
				setSession($row[1],$row[2],$row[3],$row[0]);
				$trouve = 1; //en fait ça sert à R si on refresh juste après. mais flemme de l'enlever
				//même si c'est plus long d'écrire ces deux commentaires que de l'enlever mdrrr
				header('Status: 301 Moved Permanently', false, 301);      
				header('Location: /_Noe/bf/ENIGMAKER/index.php');//lien absolu car flemme 
			}

		}
		if ($trouve ==0) {
		readfile("./formulaire.php"); //on affiche le form pour qu'il refasse
		echo "<p style='margin-top:1%;'><b style='color:#FFFF00;letter-spacing: 2px;'>ECHEC</b></p>";
		}
		
	}else{
		readfile("./formulaire.php"); //on affiche le form
	}
	echo '</div>';
?>
</div>

<?php
	require("../_scripts_/tail.php");
?>