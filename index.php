<!-- Traitement du message -->
<?php

require_once('php/connexion_bdd.php');

session_start();

$class = '';
$info = '';

if (isset($_GET['message'])) {
    if (!empty($_GET['message'])) {
        switch ($_GET['message']) {
            case 'registered':
                $class = 'success';
                $info = "Bienvenue !!";
                break;
            case 'msgok';
                $class = 'success';
                $info = "Votre message est envoyé !";
                break;
            case 'disconnected';
                $class = 'info';
                $info = "Vous êtes maintenant déconnecté";
                break;
            default:
                $class = 'error';
                $info = 'Un problème bizarre est survenu…';
                break;
        }
    }
}
?>
<!-- Fin du traitement du message -->

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

        <!-- Header inclusion -->
        <?php include('_header.php'); ?>

        <!-- Application main -->
        <main class="app-maincontenu">

            <!-- Section offre du jour -->
            <section class="offres-du-jour">

                <?php if (!empty($class)): ?>
                    <!-- Affichage du message -->
                    <p class="<?php echo $class; ?>">
                        <?php echo $info; ?>
                    </p>
                    <!-- Fin Affichage du message -->
                <?php endif; ?>

                <!-- Titre des offres du jour -->
                <h2>Les offres du jour</h2>

                <!-- Conteneur des vignettes -->
                <div class="vignettes">

                    <!-- Vignette produit N°1 -->
                    <div class="vignette">
                        <a
                            href="#"
                            class="vignette-image"
                            title="La Pegasis"
                        >
                            <img
                                src="img/nike-pegasus.jpg"
                                alt="Pardon je vous la pique 2s"
                            />
                        </a>
                        <h3>Pegasis</h3>
                        <p class="prix">125€</p>
                        
                        <!-- Affichage des options de vignette PC -->
                        <div class="vignette-option-pc">
                            <p>
                                <a href="#">En savoir + </a>
                            </p>
                            <p>
                                <a href="#"> 
                                    Ajouter au panier
                                </a>
                            </p>
                        </div>

                        <!-- Affichage des options de vignette Tablette -->
                        <div class="vignette-option-tablette">
                            <p>
                                <a href="#">
                                    <i class="fas fa-plus-square"></i>
                                </a>
                            </p>
                            <p>
                                <a href="#">
                                    <i class="fas fa-cart-arrow-down"></i> 
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Vignette produit N°2 -->
                    <div class="vignette">
                        <a
                            href="#"
                            class="vignette-image"
                            title="La Flavius"
                        >
                            <img
                                src="img/Flavius.jpg"
                                alt="Une création athypique de Flavio"
                            />
                        </a>
                        <h3>Flavius</h3>
                        <p class="prix">59,99€</p>

                        <!-- Affichage des options de vignette PC -->
                        <div class="vignette-option-pc">
                            <p>
                                <a href="#">En savoir + </a>
                            </p>
                            <p>
                                <a href="#"> Ajouter au panier </a>
                            </p>
                        </div>

                        <!-- Affichage des options de vignette Tablette -->
                        <div class="vignette-option-tablette">
                            <p>
                                <a href="#">
                                    <i class="fas fa-plus-square"></i>
                                </a>
                            </p>
                            <p>
                                <a href="#">
                                    <i class="fas fa-cart-arrow-down"></i> 
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- Vignette produit N°3 -->
                    <div class="vignette">
                        <a
                            href="#"
                            class="vignette-image"
                            title="La JupiTerrien"
                        >
                            <img
                                src="img/JupiTerrien.jpg"
                                alt="De Jupiter à la Terre"
                            />
                        </a>
                        <h3>JupiTerrien</h3>
                        <p class="prix">39,99€</p>

                        <!-- Affichage des options de vignette PC -->
                        <div class="vignette-option-pc">
                            <p>
                                <a href="#">En savoir + </a>
                            </p>
                            <p>
                                <a href="#"> Ajouter au panier </a>
                            </p>
                        </div>

                        <!-- Affichage des options de vignette Tablette -->
                        <div class="vignette-option-tablette">
                            <p>
                                <a href="#">
                                    <i class="fas fa-plus-square"></i>
                                </a>
                            </p>
                            <p>
                                <a href="#">
                                    <i class="fas fa-cart-arrow-down"></i> 
                                </a>
                            </p>
                        </div>
                    </div>
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
        <footer class="app-footer">
            <h2>Footer</h2>
        </footer>
    </body>
</html>