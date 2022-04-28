<?php
    require("../_scripts_/fonctionsPack.php");
	require("../_scripts_/head.php");
?>

<div id = "CORPS_DOCUMENT">
<?php
    $mysqli = getMysqli();
    echo '<div style="display:flex;flex-direction: column;align-content: center;flex-wrap: wrap;justify-content: center;align-items: flex-start;color:white;">';
   // Vérifier si le formulaire est soumis 
   if ( isset( $_POST['submit'] ) ) {
      
     $nom = $_POST['nom']; 
     $prenom = $_POST['prenom']; 
     $pseudo = $_POST['pseudo']; 
     $email = $_POST['email'];
     $mdp = $_POST['mdp']; 
     

     //Verif si taille est correcte
     if ( !((strlen($pseudo) < 20) && (strlen($pseudo) > 3)) ){
        readfile("./formulaire.php");
        echo 'Erreur taille du pseudo invalide (elle doit être comprise entre 3 et 20)';
        
     }else{
        $index = getProchainIndex($mysqli,"n_utilisateur");
        $sql = "Insert into n_utilisateur values(". $index . ",'" . $nom . "','" . $prenom . "','" . $pseudo . "','" . $email . "','" . getHash($mdp) . "','" . date("Y-m-d") . "'," . 0 . "," . 0 . ")";
                if(mysqli_query($mysqli, $sql)){
                    echo "Inscription terminé, tous est bon";
                }else{
                    readfile("./formulaire.php");
                    echo "Erreur lors de l'inscription : ". mysqli_error($mysqli);
                }
        
     exit;
    }
  }else{
    //Si il vient d'envoyer son formulaire
    readfile("./formulaire.php");
  }
  	echo '</div>';
?>
</div>

<?php
	require("../_scripts_/tail.php");
?>