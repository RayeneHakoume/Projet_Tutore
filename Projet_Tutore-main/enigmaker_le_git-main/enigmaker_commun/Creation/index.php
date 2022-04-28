<?php 
        include ("../Inclusion/connexion_bd.php");
        include ("../Inclusion/traitement_connexion.php");
       
         $info_ajout="";
         $pbinfo_ajout="";
         include ("../Creation/bloc_crea.php");
        if (isset($_SESSION['num_utilisateur']) ) {

         

        ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
   
  
      <meta charset="utf-8">
      <title>Enigmaker</title>
      <link rel="stylesheet" href="../Style/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../Style/fontawesome-free-5.15.3-web/css/all.css"/>   
      
   </head>
 
   <body>
      <div class="conteneur">
      <div class="menu_haut">
      <nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
          <a  href="../Accueil/index.php"class="titre">Enigmaker</a>
         </div>
         <ul class="nav-items">
            <li><a class='actu' href="../Creation/index.php">Créer</a></li>
            <?php
            if (!isset($_SESSION['num_utilisateur']) ) {
               echo " <li><a  href='../Connexion/index.php'> Connexion </a></li> ";
            }
            else {
            echo " <li><a href='../Profil/deconnexion.php'>Déconnexion</a></li>";
            }
            ?>
            <li><a href="../Inscription/index.php">Inscription</a></li>
            <?php
            if (!isset($_SESSION['num_utilisateur']) ) {
               echo " <li><a href='../Profil/index.php'> Profil </a></li> ";
            }
            else {
            echo " <li><a href='../Profil/index.php?num_utilisateur={$_SESSION['num_utilisateur']}'>Profil</a></li>";
            }
            ?>
            <li><a href="#">Le site</a></li>
         </ul>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
         <form class="fo_haut" action="#">
            <input type="search" class="search-data" placeholder="Recherchez" required>
            <button type="submit" class="fas fa-search"></button>
         </form>
      </nav>
   </div>
   <script src="../Script/menu_haut.js">  </script>
     

    <div class="conteneur_inscription" > 
    <div class="container">
      <form name="myForm"   class="form_inscri" action="" 
            method="post">
            
         <h4 class="display-4 text-center" class="t1_cre">Créer un parcours</h4><hr><br>
         <?php if (isset($_GET['error'])) { ?>
         <div class="alert alert-danger" role="alert">
           <?php echo $_GET['error']; ?>
          </div>
         <?php } ?>




       
         <label for="name">Choisir le type d'enigme</label> <br>

       

Textuelle <input type="radio"  id="Check1" onclick="myFunction(); checkOnly(this)" name="cb1"  value="textuelle">
Image <input type="radio"   id="Check2" onclick="myFunction(); checkOnly(this)" name="cb1" value="image"> 
<!-- pour les énigmes images début -->
<div id="img"  style="display:none">
<p>choississez des images</p>
<input type="file"
       id="img_eni" name="img_eni"
       accept="image/png, image/jpeg">  <br>
       <label for='rep'>Saisir la réponse de l'enigme</label> <br>
           <input type='text' 
                 class='form-control' 
                 id='rep_img' 
                 name='rep_img' 
                 value="<?php if(isset($_GET['rep_img']))
		                           echo($_GET['rep_img']); ?>" 
                 
                 placeholder="réponse de l'enigme"> <br/>
                 <button type='submit'
                class='btn btn-primary'
                name='create_eni_img'>Créer l'enigme</button> <br/>
                 <button  onclick="location.href='../Creation/page_crea_indice_bonus.php'" type='button'
                class='btn btn-primary'
                name='create_ib' >Créer des indices bonus</button> <br/>

</div>
<!-- pour les énigmes image fin-->
<div id="text" style="display:none"><!--Checkbox is CHECKED!  -->

<script> 
function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("Check1");
  // rajout deb
  var checkBox2 = document.getElementById("Check2");
  // rajout fin
  // Get the output text
  var text = document.getElementById("text");
  var text2 = document.getElementById("img");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
    img.style.display = "none";
  }
  if (checkBox2.checked == true    ){
    text.style.display = "none";
    img.style.display = "block";
  }


}
</script>



         <div class='form-group' action="">
           <p>Saisir le texte de l'enigme</p>
           <textarea class="t_eni" 
                 class='form-control'
                 id='lib'
                 name='lib' 
                
                 placeholder='texte de lenigme'>
</textarea>
         </div>

         <div class='form-group'>
           <label for='rep'>Saisir la réponse de l'enigme</label> <br>
           <input type='text' 
                 class='form-control' 
                 id='rep' 
                 name='rep' 
                 value="<?php if(isset($_GET['rep']))
		                           echo($_GET['rep']); ?>" 
                 
                 placeholder="réponse de l'enigme">
         </div>

         <div class='input_fields_wrap'>
 
    <div>

    </div>
	
     </div>
<br>
     <button type='submit'
                class='btn btn-primary'
                name='create'>Créer l'enigme</button> <br>
     
                <button type='button'
                class='btn btn-primary'
                onclick="location.href='../Creation/page_crea_indice_bonus.php'"
                name='create_ib'>Créer des indices bonus</button>

      
   </div>
   <br>


       
                <button onclick="location.href='../Creation/page_lecture.php'" type="button">
         choisir les énigmes qui constitueront le parcours</button>
       
                
         <!-- <a href='../Creation/page_lecture.php' class='link-primary'>Voir la liste des enigmes</a> -->
    
       </form>
   <?php 

         if( $info_ajout!=null  ){
            echo "<p class='inf_eni'> $info_ajout </p>";

         }
         if( $pbinfo_ajout!=null  ){
            echo "<p class='inf_enim'> $pbinfo_ajout </p>";

         }
   
         
         ?>
   </div>

    </div>

     
<?php 



/*
 if ($uri!=$url_page_crea) {
   $_SESSION['missionCreable']=0;
}
*/

//echo  $_SESSION['missionCreable'];


// conter le nombre d'enigme créé par l'utilisateur
// on sélectionnne ce nb @TODO





?>
   </div>
   </body>
</html>

<?php   
}
else {
   header("Location: ../Connexion/index.php");
}
?>