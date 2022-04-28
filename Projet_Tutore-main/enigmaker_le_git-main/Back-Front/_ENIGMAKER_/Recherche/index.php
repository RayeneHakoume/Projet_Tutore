<?php
	//en-tête de page web
	require("../_scripts_/fonctionsPack.php");	
	require("../_scripts_/head.php");
	//////////////
?>

<div id = "CORPS_DOCUMENT">
<?php
	if(isset($_GET['srch'])){

		echo $_GET['srch'];

	}
?>
</div>

<?php
	//////////////
	require("../_scripts_/tail.php");
	//bas de page web
?>