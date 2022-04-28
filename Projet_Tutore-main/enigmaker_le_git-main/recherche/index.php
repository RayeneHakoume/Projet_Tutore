<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
   <link rel="stylesheet" href="../testScript/lightslider.css">
    <script type="text/javascript" src="../testScript/jquery.js"></script>
    <script type="text/javascript" src="../testScript/lightslider.js"></script>
    <script type="text/javascript" src="../testScript/script.js"></script>
    <link rel="stylesheet" href="../testScript/style.css" />
   <?php 
         session_start();
         include ("../Inclusion/connexion_bd.php");
        // include ("../Inclusion/menu_haut.php");
        $_SESSION['Tabchecker']=array();
         @$_SESSION['nb_enigme_resolu']=0;
        @ $_SESSION['taille']=null;
         @$_SESSION['checker']=null;
        ?>
      <meta charset="utf-8">
      <title>Enigmaker</title>
      <link rel="stylesheet" href="../Style/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../Style/fontawesome-free-5.15.3-web/css/all.css"/>   
       <!-- href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  -->
   </head>
   <body>
      <div class="conteneur">


     <?php 
   include ("../Inclusion/menu_haut.php");
    ?>



<div class="contSecond2alt">
 <p class="zaa">Voici la liste des parcours correspondant à votre recherche :</p>
 <br>
 <!-- ************************************************************* -->

 <?php 
if ($_GET['srch']!=null) {
    
$recherheSaisi=$_GET['srch'];
$requeteRecherche2= $bdd->prepare("   SELECT * from n_parcours where titre_parcours like '%$recherheSaisi%' ");
$requeteRecherche1= $bdd->prepare("   SELECT * from n_parcours where titre_parcours= '$recherheSaisi'   ");
$requeteRecherche1->execute();

if ($requeteRecherche1->rowCount()>=1) {// si on trouve  des parcours avec ce nom
    $var_confirm="";
    while($ti =$requeteRecherche1->fetch()) {
        $titre=$ti['titre_parcours'];
        $num= $ti['num_parcour'];
        if($ti!=$var_confirm) {
        echo "<a  class='buy-btn jouerRecherche'  href='../jouer/bloc_jeu.php?num_parcour={$num}'> $titre</a>";
        echo "<br>";
        }
        $var_confirm= $ti;
    }
}


// si on trouve pas de parcours avec le nom on cherche ceux qui contiennt la saisai
else if ($requeteRecherche1->rowCount()==0) {
   
    $requeteRecherche2->execute();
    $var_confirm="";
    while($ti =$requeteRecherche2->fetch()) {
        $titre=$ti['titre_parcours'];
        $num= $ti['num_parcour'];
        if($ti!=$var_confirm) {
        echo "<a  class='buy-btn jouerRecherche'  href='../jouer/bloc_jeu.php?num_parcour={$num}'> $titre</a>";
        echo "<br>";
        }
        $var_confirm= $ti;
    }

}
    if($requeteRecherche2->rowCount()==0) {// si aucun parcours contient la saisi on décompose les espace et on cherche ceux qui contiennent un de ses mots
        $explosion = explode(' ' , $recherheSaisi);// tableau avec chaque mot de la recherche 
        $taille=sizeof($explosion);
        $compteur=0; // s'incrémentera de  1 à chaque fois qu'un parcours contiendra un mot du tableau
        // on parcours le tableau on fait une requete sql dedans qui vaut chaque mot
        // si on trouve un truc égal à ce mot on affiche le parcours
        $i=0;
        $var_confirm="";
        for($i=0 ; $i<$taille ; $i++) {
            $titreActu=$explosion[$i];
            $requeteRecherche4= $bdd->prepare("   SELECT * from n_parcours where titre_parcours like '%$titreActu%'  ");
            $requeteRecherche4->execute();
   //         echo   $titreActu;
            while($ti =$requeteRecherche4->fetch()) {
                
                $titre=$ti['titre_parcours'];
                $num= $ti['num_parcour'];
                if($ti!=$var_confirm) {
                echo "<a  class='buy-btn jouerRecherche'  href='../jouer/bloc_jeu.php?num_parcour={$num}'> $titre</a>";
                echo "<br>";
                }
                $var_confirm= $ti;
                
            }
            
        }
        if($requeteRecherche4->rowCount()==0) {
            echo"<p>aucun résultat ne correspond à la recherche</p>";
       // print_r($explosion);
      
    }
       // print_r($explosion);
      
    }




}

else {
    header("Location: ../Accueil/index.php");
}



	 

?>

 <!-- ************************************************************* -->
</div>

      <!-- ***************************************** -->
      <br>

 
      <?php 
   include ("../Inclusion/footer.php");
    ?>

      <!-- ***************************************-->
   </div>
   



   </body>
</html>

