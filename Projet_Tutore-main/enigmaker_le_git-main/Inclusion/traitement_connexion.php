<?php 
session_start();
	if(isset($_POST['formconnexion'])) {
     
        $mailconnect = htmlspecialchars($_POST['mailconnect']);
        $mdpconnect = sha1($_POST['mdpconnect']);
        if(!empty($mailconnect) AND !empty($mdpconnect)) {
           $requser = $bdd->prepare("SELECT * FROM  n_utilisateur WHERE email = ? AND mdp = ?");
           $requser->execute(array($mailconnect, $mdpconnect));
           $userexist = $requser->rowCount();
           if($userexist == 1) {
            echo   $userinfo['num_utilisateur'];
              $userinfo = $requser->fetch();
              $_SESSION['num_utilisateur'] = $userinfo['num_utilisateur'];
              $_SESSION['pseudo'] = $userinfo['pseudo'];
              $_SESSION['email'] = $userinfo['email'];
         
         
        
              header("Location: ../Profil/index.php?num_utilisateur=".$_SESSION['num_utilisateur']);
           } else {
              $erreur = "Mauvais mail ou mot de passe !";
           }
        } else {
           $erreur = "Tous les champs doivent être complétés !";
        }
     }
?>