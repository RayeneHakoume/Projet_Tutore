<?php

	require("../_scripts_/fonctionsPack.php");
	echo "<html>";
	echo "<body id='bdy'>";
//	require("../_scripts_/head.php");
	//////////////
	$mysqli = getMysqli();
?>



<?php
if( !(isset($_GET['idp']) && isset($_GET['ide']))){
	echo "Enigme introuvable";
	exit();

}
?>

<?php

$hashIDEng = $_GET['ide'];
$hashIDPar = $_GET['idp'];

$valEng = null;
$valPar = null;

$rq = 'select * from n_enigme';
$result = select($mysqli,$rq);

while ($row = $result->fetch_assoc()) {
	if(checkHash("-__ENGMKR-ENG:" . $row['num'] . ":GNE-RKMGNE__-",$hashIDEng)==0){
		$valEng = $row;
	}

}

$rq = 'select * from n_parcours';
$result = select($mysqli,$rq);

while ($row = $result->fetch_assoc()) {
	if(checkHash("-__ENGMKR:" . $row['num'] . ":RKMGNE__-",$hashIDPar)==0){
		$valPar = $row;
	}

}

if($valEng == null || $valPar == null){
	echo "Enigme indisponible";
	exit();
}

?>


<?php

if(isset($_POST['reponse'])){
	echo "<p style='text-align:center;color:white;background-color:rgba(0,0,0,.5);font-size:160%;'> ";
	if($_POST['reponse'] == $valEng['QText_reponse']){
		echo "Bonne Réponse !";
	}else{
		echo "Mauvaise Réponse :(";
	}
	echo "</p>";
}
?>


<?php

	//echo $valPar['titre'] . " ; " . $valEng['titre'];

	if( !($valEng['QText_bgType'] == 1)){
		echo	"<script> " .
				"let uwu  = document.getElementById('bdy');" .
				"uwu.style.backgroundImage = \"url(\" + '" . $valEng['QText_bgInfo'] . "' + \")\";".
                "uwu.style.backgroundRepeat = \"no-repeat\";".
                "uwu.style.backgroundSize = \"100%\";".
                "uwu.style.backgroundPosition = \"center\";".
				"</script>";
	}else{
		echo	"<script> " .
				"let uwu  = document.getElementById('bdy');" .
				"uwu.style.backgroundColor = '" . $valEng['QText_bgInfo'] . "';".
				"</script>";
	}

?>
<div id="egContainer" style="display:flex;align-content: center;justify-content: center;flex-direction: column;flex-wrap: wrap;text-align:center;">
 <div id="question" style="margin-top:10%;background-color:rgba(255,255,255,.5);font-size:150%;"><?php echo $valEng['QText_question']?></div>
 <input type='text' name='rep' id="inputRp"></input>
 <input type='button' name='valider' value='valider' onclick="valider()"></input>
</div>

<script>

	function valider(){
		formz = document.getElementById('rp');
		formz.value = document.getElementById('inputRp').value;
		document.getElementById('Formulaire').submit();
	}

</script>

<form action="#" method="post" id="Formulaire" style="display:none;">
	<input type="text" name="reponse" id="rp">
</form>

<?php
	//////////////
	#require("../_scripts_/tail.php");

?>
</body>
</html>