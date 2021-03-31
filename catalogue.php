<?php

// On inclut la classe Procduct
require_once('php/entities/Product.php');

// On accède à la session
session_start();

// Récupération d'un tableau de produit de la base de données
$productObj = new Product();

// Si on a un paramètre GET, alors il faut filtrer la requête
$searchText = isset($_GET['q']) ? $_GET['q'] : null;

$tabProducts = $productObj->getProducts($searchText);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>aMattzon</title>
    <meta name="description" content="Blablabla…" />

    <!-- Scripts JS -->
    <script src="js/scripts.js" defer></script>

    <link rel="stylesheet" href="assets/css/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b916232238.js" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous" defer></script>

</head>

<body>
    <?php include('_header.php'); ?>

    <main class="app-main">
        <div class="container mb-3">
            <h1>
                <?php if ($searchText) : ?>
                    Résultats pour : <?php echo $searchText; ?>
                <?php else : ?>
                    Tous les produits
                <?php endif; ?>
            </h1>

            <!-- Tableau de vignettes -->
            <div class="vignettes">
                <?php
                foreach ($tabProducts as $key) {
                    // Je récupére la description du produit par son ID
                    $unproduct = new Product();
                    $unproduct->getProduct($key->id);

                    // J'affiche chaque vignette
                    include('_vignette.php');

                }
                ?>
            </div>
        </div>
    </main>

    <?php include('_footer.php'); ?>
</body>

</html>