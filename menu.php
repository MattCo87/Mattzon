<?php

require_once('php/connexion_bdd.php');

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Informations destinées au navigateur -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Informations destinées au SEO (Search Engine Optimization = référencement naturel) -->
        <title>aMattzon</title>

        <!-- Feuilles de styles -->

        <!-- Ajouter lien du style -->


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
        <link rel="stylesheet" href="css/styles.css" />
    </head>

    <body>
        <div class="app-header">

            <!-- Logo du site-->
            <h1>
                <a href="index.php"> <span>a</span>Mattzon<span>.fr</span> </a>
            </h1>

            <!-- Barre de navigation du site-->
            <nav class="app-mainmenu">
                <ul class="menu">
                    <li>
                        <a href="index.php">
                            <i class="fas fa-home"></i>
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-address-book"></i>
                            Catalogue
                        </a>
                    </li>
                    
                    <?php if(!isset($_SESSION['id'])): ?>
                        <li>
                            <a href="connexion.php">
                                <i class="fas fa-plug"></i>
                                Connexion
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="php/traitement_deconnexion.php">
                                <i class="fas fa-power-off"></i>
                                Déconnexion
                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <li>
                        <a href="#">
                            <i class="fas fa-cart-arrow-down"></i> 
                            Mon panier</a>
                    </li>
                    <li>
                        <a href="contact.php">
                            <i class="fas fa-mail-bulk"></i>
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Barre de recherche PC -->
            <div class="barre-recherche-pc">
                <a href="#">
                    <i class="fas fa-search"></i>
                    Recherche
                </a>
            </div>

            <!-- Barre de recherche Tablette -->
            <div class="barre-recherche-tablette">
                <input type="text" name="recherche" id="rechercher" placeholder="Recherche" size="15">
            </div>

            <!-- Menu Hamburger -->
            <div class="hamburger">
                <a href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
        </div>
    </body>
</html>