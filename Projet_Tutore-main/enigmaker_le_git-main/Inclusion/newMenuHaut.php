
     <header>

<nav class="nav2">
<label class="logo" id="ENIGMAKER_LOGO" onclick="logoClique()">		<a href="../Accueil/index.php"class='titreLogo'>Enigmaker</a></label>
    <ul class="b2">
    
        <li><a href="Recherche"></a><form action="../recherche/index.php" name="RechercheForm" method="GET"><input type="search" id="search" name="srch" placeholder="Recherche..." ></li>
     <button type="submit" name="rechercherVali" class="btn btn-secondary"  class="loupeImgNew" >

            <i class="fa fa-search"></i>
        </button>
    </form>
     <li><a class="possibBar" href="../Creation/index.php">Créer </a> </li>
     <?php
        if (!isset($_SESSION['num_utilisateur']) ) {
           echo " <li><a href='../Connexion/index.php'> Connexion </a></li> ";
        }
        else {
        echo " <li><a href='../Profil/deconnexion.php'>Déconnexion</a></li>";
        }
        ?>
<li><a  class="possibBar"  href="../Inscription/index.php">S'inscrire</a> </li>
<?php
        if (!isset($_SESSION['num_utilisateur']) ) {
           echo " <li><a href='../Profil/index.php'> Profil </a></li> ";
        }
        else {
        echo " <li><a href='../Profil/index.php?num_utilisateur={$_SESSION['num_utilisateur']}'>Profil</a></li>";
        }
        ?>
        <!--
            <a href="Jouer">Jouer <i class="fas fa-caret-down"></i></a>
            <ul>
                <li><a style ='font-size:86%;' href="Recherche?type=all">Voir Tout</a></li>
                <li><a style ='font-size:86%;' href="Recherche?type=crea">Trier Par Créateur</a></li>
                <li><a style ='font-size:86%;line-height:revert;' href="Recherche?type=parc">Les Parcours Populaires</a></li>

            </ul>
        </li>
-->


        

    </ul>
</nav>
</header>