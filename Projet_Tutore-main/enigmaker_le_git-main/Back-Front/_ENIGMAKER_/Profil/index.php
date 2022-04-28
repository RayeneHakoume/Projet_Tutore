<?php
	//en-tête de page web
	require("../_scripts_/fonctionsPack.php");	
	require("../_scripts_/head.php");
	//////////////
?>

<div id = "CORPS_DOCUMENT">
<?php
	//mettre code ici
	//ou html en dessous
    $rq = 'SELECT * FROM n_utilisateur where num=' . $_SESSION["num"] . '';
		$mysqli = getMysqli();
		$result = select($mysqli , $rq);
		while ($row = $result->fetch_row()) { //pour chaque utilisateurs obtenus :
			/*
			$row[0] = num
			$row[1] = nom
			$row[2] = prenom
			$row[3] = pseudo
			$row[4] = emai  l
			$row[5] = mdp (hash)
			$row[6] = date inscription
			$row[7] = nb mission réussite
			$row[8] = nb parcours terminés
			*/
			echo '<div style="display:flex;justify-content: center;align-items: flex-start;align-content: center;flex-direction: column;flex-wrap: wrap;texte-align:center;padding:10%;">';

            echo '<div style="color:white;">Votre pseudo est <b style="color:#FFFF00;">' . $row[3] .		  "</b><br></div>";
            echo '<div style="color:white;">Votre adresse mail est <b style="color:#FFFF00;">' . $row[4] . "</b><br></div>";

            echo '<div style="color:white;">Vous avez réussi <b style="color:#FFFF00;">' . $row[7] .' missions ' . "</b><br></div>";
            echo '<div style="color:white;">Vous avez terminé <b style="color:#FFFF00;">' . $row[8] . ' parcours ' . "</b><br></div>";

			echo '</div>';
		}
?>
</div>

<?php
	//////////////
	require("../_scripts_/tail.php");
	//bas de page web
?>