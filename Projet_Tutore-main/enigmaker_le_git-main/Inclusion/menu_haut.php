<div class="menu_haut">
      <nav class='super'>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
          <a  href="../Accueil/index.php"class="titre">Enigmaker</a>
         </div>
         <ul class="nav-items">
            <li><a href="../Creation/index.php">Créer</a></li>
            <?php
            if (!isset($_SESSION['num_utilisateur']) ) {
               echo " <li><a href='../Connexion/index.php'> Connexion </a></li> ";
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
    
         <!--   <li><a href="#">Le site</a></li> -->
         </ul>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
         <form class="fo_haut" action="../recherche/index.php"   method="get">
            <input type="search" name="srch"class="search-data" placeholder="Recherchez" required>
            <button type="submit" name="rechercherVali" class="fas fa-search"></button>
         </form>
      </nav>
   </div>
   <script src="../Script/menu_haut.js">  </script>
