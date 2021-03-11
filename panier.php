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
            <?php if (isset($_SESSION['panier'])) : ?>
                <?php if (!empty($_SESSION['panier'])) : ?>
                    <div class="vignettes">
                        <?php foreach ($_SESSION['panier'] as $key => $item) : ?>
                            <?php $product = getProduct($connexion, $item['id']); ?>
                            <div class="vignette">
                                <a href="#" class="vignette-image" title="<?php echo ($product['name']); ?>">
                                    <img src="assets/img/<?php echo ($product['image']); ?>" alt="Pardon je vous la pique 2s" />
                                </a>
                                <div class="nomPrix">
                                    <p>
                                        <?php echo ($product['name']); ?>
                                        <?php echo ($product['price'] . "€"); ?>
                                    </p>
                                </div>

                                <!--        TEST MATT  -->
                                <div class="etatPanier">
                                    <p id="quantitePanier">
                                        X&nbsp; <?php echo ($item['qte']); ?>
                                    </p>
                                    <p class="boutonsPanier">

                                        <button type="cancel">
                                            <a href="php/modifierqte_panier.php?act=false&id=<?php echo $item['id']; ?>">
                                                <i class="fas fa-minus"></i>
                                            </a>
                                        </button>


                                        <button type="submit">
                                            <a href="php/modifierqte_panier.php?act=true&id=<?php echo $item['id']; ?>">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </button>

                                    </p>
                                </div>

                                <!--        FIN TEST MATT -->



                                <?php  /* for ($i = 0; $i < $item['qte']; $i++): ?>
                            <p>
                                1x <?php echo $product['price']; ?>€
                                <a href="#"><i class="fas fa-trash"></i></a>
                            </p>
                        <?php endfor */ ?>


                                <p class="prix"><?php echo $product['price'] * $item['qte']; ?>€</p>

                                <!-- Affichage des options de vignette PC -->
                                <div class="vignette-option-pc">
                                    <p>
                                        <a href="#">En savoir + </a>
                                    </p>
                                    <p>
                                        <a href="php/suppression_panier.php?id=<?php echo $item['id']; ?>">
                                            Enlever du panier
                                        </a>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <p class="info">Votre panier est vide.</p>
                <?php endif; ?>
            <?php else : ?>
                <p class="info">Votre panier est vide.</p>
            <?php endif; ?>
        </section>
    </main>

    <!-- Application footer-->
    <?php include('_footer.php'); ?>
</body>

</html>