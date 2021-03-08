<?php 
session_start();

// Connexion à la base de données
require_once('php/connexion_bdd.php');

// Import du modèle Product
require_once('php/Models/Product.php');

?>

<!DOCTYPE html>
<html>

<head>
    <!-- Informations destinées au navigateur -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Informations destinées au SEO (Search Engine Optimization = référencement naturel) -->
    <title>aMattzon : Panier</title>

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
        <section class="panier">
            <h2>Mon panier</h2>
            <?php if(isset($_SESSION['panier'])): ?>
            <div class="vignettes">
                <?php foreach($_SESSION['panier'] as $key => $item): ?>
                <?php $product = getProduct($connexion, $item['id']); ?>
                <div class="vignette">
                    <a href="#" class="vignette-image" title="<?php echo ($product['name']); ?>">
                        <img src="assets/img/<?php echo ($product['image']); ?>" alt="Pardon je vous la pique 2s" />
                    </a>
                    <h3><?php echo ($product['name']); ?></h3>
                    <p><?php echo $item['qte']; ?> x <?php echo $product['price']; ?>€</p>
                    <p class="prix"><?php echo $product['price'] * $item['qte']; ?>€</p>

                    <!-- Affichage des options de vignette PC -->
                    <div class="vignette-option-pc">
                        <p>
                            <a href="#">En savoir + </a>
                        </p>
                        <p>
                            <a href="#">
                                Enlever du panier
                            </a>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <p class="info">Votre panier est vide.</p>
            <?php endif; ?>
        </section>
    </main>

    <!-- Application footer-->
    <?php include('_footer.php'); ?>
</body>

</html>