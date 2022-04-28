<?php	

	/////////

	/*
	
	ici on cherche à définir si on est dans la racine (_ENIGMAKER_) du site (l'accueil) ou si on est ailleurs. 
	l'accueil étant le seul fichier qui n'est pas dans un répértoire, les liens relatifs doivent être changés.

	*/

	if ((explode("/",getcwd())[count(explode("/",getcwd()))-1]) != "ENIGMAKER"){
		$sep = "../";
	}else{
		$sep = "./";
	}

	/////////

	header('Content-type: text/html; charset=UTF-8'); //on prend en compte les accents (àéèâê...)
    ini_set("display_errors", true); //on affiche toutes les erreurs liées à php directement sur la page web
    error_reporting(E_ALL); //et on les affiche TOUTES !
	
	require($sep . "_scripts_/select.php");
	require($sep . "_scripts_/getMysqli.php");
	require($sep . "_scripts_/hash.php");
	require($sep . "_scripts_/getProchainIndex.php");
	require($sep . "_scripts_/session.php");

	startSession();
?>