<?php
	//en-tête de page web
	require("../_scripts_/fonctionsPack.php");
	//require("../_scripts_/head.php");
	echo '<link href="./styleCreateur.css" rel="stylesheet" type="text/css">';
	//////////////


	echo '<div id="JSON">';
	readfile("../_ressource_/TypeEnigmesTableDeTraduction.json");
	echo '</div>';
	readfile("./UI.html");

	//////////////
	echo "<script src=\"./scr.js\" type=\"text/javascript\"></script>";
	//require("../_scripts_/tail.php");
	//bas de page web
	
?>