<?php

function startSession(){
	session_start();
}

function setSession($nom,$prenom,$pseudo,$id){
	
	$_SESSION["connecté"]=1;

	$_SESSION["nom"]=$nom;
	$_SESSION["prenom"]=$prenom;
	$_SESSION["pseudo"]=$pseudo;
	$_SESSION["num"]=$id;
}

function checkSession(){
	if(isset($_SESSION["connecté"])){
		if($_SESSION["connecté"]==1){
			return true;
		}
	}
	return false;
}

function stopSession(){
	if(isset($_SESSION["connecté"])){
		unset($_SESSION["connecté"]);
	}
}

?>