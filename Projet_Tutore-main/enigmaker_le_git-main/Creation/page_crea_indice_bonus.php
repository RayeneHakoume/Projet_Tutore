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
      <?php 
   include ("../Inclusion/menu_haut.php");
    ?>
    <div class="" > 
    <div class="container">
      <form name="myForm"   class="form_inscri" action="" 
            method="post">
            
         <h4 class="display-4 text-center" class="t1_cre">Créer des indices bonus</h4><hr><br>
         <?php if (isset($_GET['error'])) { ?>
         <div class="alert alert-danger" role="alert">
           <?php echo $_GET['error']; ?>
          </div>
         <?php } ?>




       
         <div class='form-group'>
           <label for='rep'>Saisir le texte de l'indice bonus </label> <br>
           <textarea class="t_eni" 
                 class='form-control'
                 id='lib'
                 name='lib' 
                
                 placeholder='texte indice'>
</textarea>
         </div>

       
         <label >choisissez le mode d'appartion </label> <br>
après date <input type="radio"  id="Check1" onclick="myFunction(); checkOnly(this)" name="cb1"  value="textuelle">
après temps <input type="radio"   id="Check2" onclick="myFunction(); checkOnly(this)" name="cb1" value="image"> 
<!-- pour les énigmes images début -->
<div id="img"  style="display:none">


<div class='form-group'>
           <label for='rep'>Saisir le temps après lequel l'indice apparaitra</label> <br>
           <input type='number' min=1
                 class='form-control' 
                 id='rep' 
                 name='rep' 
                  
                 
                 placeholder="nombre de minute">
         </div>

         <button type='submit'
                class='btn btn-primary'
                name='creer_ib_temps'>Créer l'indice bonus</button>

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



     

         <div class='form-group'>
           <label for='rep'>Saisir la date d'apparition</label> <br/>
           <input type='date' 
                 class='form-control' 
                 id='rep' 
                 name='rep' 
             
                 
                 placeholder="">
         </div>

         <div class='input_fields_wrap'>
 
    <div>

    </div>
	
     </div>

     <button type='submit'
                class='btn btn-primary'
                name='create'>Créer l'indice bonus</button> 
     

      
   </div>
   <br>


       
                <button name='creer_ib_date' type="submit">
         associer des indices bonus à des énigmes</button>
       
                
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