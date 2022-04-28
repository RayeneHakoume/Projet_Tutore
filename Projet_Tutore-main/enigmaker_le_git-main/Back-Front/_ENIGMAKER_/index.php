<?php
	//en-tête de page web
	require("./_scripts_/fonctionsPack.php");	
	require("./_scripts_/head.php");
	//////////////
?>

<?php
	//mettre code ici
	//ou html en dessous
?>
<ul id="autoWidth" class="cs-hidden">
<?php
$elt = array('Mathematique','Intelligence','Histoire-Géo','Divers','Science');

foreach ( $elt as $t ){

	echo '
			<li class="item-a">
            <div class="box">
                <div class="slide-img">
                    <img src="./image/'. $t . '.png" alt="" />
                    <div class="overlay">
                        <a href="./Recherche/index.php?srch='.$t.'" class="buy-btn">Jouer!</a>
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="./Recherche/index.php?srch='.$t.'">'.$t.'</a>
                    </div>
                </div>
            </div>
            </li>
		 ';
}
?>
</ul>
<script type="text/javascript" src="./js/script.js"></script>
<?php
	//////////////
	require("./_scripts_/tail.php");
	//bas de page web
?>