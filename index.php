<?php
// Connexion à la base de données
require_once('php/connexion_bdd.php');

// Import du modèle Product
require_once('php/Models/Product.php');

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
        <link rel="stylesheet" href="assets/css/styles.css" />
    </head>

    <body>

        <!-- Header inclusion -->
        <?php include('_header.php'); ?>

        <!-- Application main -->
        <main class="app-maincontenu">

            <!-- Section offre du jour -->
            <section class="offres-du-jour">

                <!-- Affichage du message du status de connexion -->
                <?php 
                    include('_msgconnexion.php');
                ?>                

                <!-- Titre des offres du jour -->
                <h2>Les offres du jour</h2>

                <!-- Conteneur des vignettes -->
                <div class="vignettes">

                    <?php 
                        include('_vignette.php');
                    ?>
                    </div>
                </div>
            </section>

            <?php if(!isset($_SESSION['id'])): ?>
                <!-- Application inscription -->
                <section class="bandeau-inscription">
                    <div >
                        <a href="inscription.php">
                            Inscrivez-vous !
                        </a>
                   </div>
                </section>
            <?php endif; ?>
        </main>

        <!-- Application footer-->
        <?php include('_footer.php'); ?>
    </body>
</html>