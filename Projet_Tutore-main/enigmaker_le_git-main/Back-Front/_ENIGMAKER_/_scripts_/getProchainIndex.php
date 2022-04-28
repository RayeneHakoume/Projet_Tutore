<?php

function getProchainIndex($mysqli,$table){
	/*
	
	Fonction qui attrape le plus grand index de la table et l'incrémente de '1'
	on peut pas utiliser l'attribut auto_increment de MySQL car la variable d'environnement @@auto_increment_increment est bloquée à '2'
	donc les num s'incrémentaient de 2 en 2
	
	*/
	try {
		$resultat = $mysqli	->query( "SELECT MAX(num) FROM " . $table );
			// Récupère un tableau d'objets 
		while ($row = $resultat->fetch_row()) {
			$returned = $row[0];
		}
		//echo "|" . $returned . "|";
	} catch (Exception $e) {
		echo 'Exception reçue : ' .  $e->getMessage() . "<br/>";
		$returned = -1;
	}
	return $returned+1;

}

?>