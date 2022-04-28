<?php
	require("../_scripts_/fonctionsPack.php");
	require("../_scripts_/head.php");
?>

<?php
	stopSession();
	header('Status: 301 Moved Permanently', false, 301);      
	header('Location: /_Noe/bf/ENIGMAKER/index.php');     //lien absolu car flemme 
	exit();    

?>