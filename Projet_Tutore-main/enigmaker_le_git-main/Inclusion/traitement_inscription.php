<?php

if (isset($_POST['form_inscription'])) {
    $pseudo= htmlspecialchars($_POST['pseudo']);
    $mail= htmlspecialchars($_POST['mail']);
    $mail2= htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);
    $pseudo_length= strlen($pseudo);
    if  (! empty($_POST['pseudo'] )
        AND ! empty($_POST['mail'] )
       AND ! empty($_POST['mail2'] )
       AND ! empty($_POST['mdp'] ) 
       AND ! empty($_POST['mdp2'] ) )  {

          if($pseudo_length<=16) {
             
            if($mail==$mail2) {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    
                
                if($mdp==$mdp2) {
                    $verif_utilisateur = $bdd->prepare("SELECT count(*) from n_utilisateur where email='$mail' ");
                    $verif_utilisateur->execute();
                    $verif_utilisateur_contenu=$verif_utilisateur->fetchColumn();
                    
                    if ($verif_utilisateur_contenu>=1) {
                        $erreur="Cette adresse mail est déjà utilisée";
                    }
                    else {
                    $insertion_utilisateur = $bdd->prepare("INSERT INTO n_utilisateur (pseudo, email, mdp) VALUES('$pseudo', '$mail', '$mdp')");
                   $insertion_utilisateur->execute();

           
     
                   $confirmation = "Votre compte a bien été crée";
                    }
                    
                }
                else {
                    $erreur="Vos mots de passes de correspondent pas";
                }
            
        
              }  else {
                $erreur="votre  adresse_mail n'est pas valide";
            }
            
          }  else {
                $erreur="Vos adresses mail ne correspondent pas";
            }
          
        }  else {
              $erreur="Votre pseudo ne doit pas dépasser 16 caratères";
          }
       
         } else {
       $erreur="tous les champs doivent être complétés";
    }
}


?>