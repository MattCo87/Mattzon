<?php
session_start();

// On inclut la classe Procduct
require_once('php/entities/Product.php');


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>aMattzon</title>
    <meta name="description" content="Blablabla…" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b916232238.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/styles.css" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous" defer></script>
    <script src="js/scripts.js" defer></script>
</head>

<body>
    <?php include('_header.php'); ?>

    <main class="app-main">
        <div class="container">
            <p>Liste des produits (vignette, nom, prix unitaire, quantité, prox total, bouton "enlever du panier")</p>
            <?php
            if (isset($_SESSION['cart'])) {
                echo '<pre>' . var_export($_SESSION['cart'], true) . '</pre>';
            }

            if (!empty($_SESSION['cart'])) : ?>
                <div class="vignettes">
                    <?php foreach ($_SESSION['cart'] as $key => $item) :
                        echo  var_dump($item);
                        $unproduct = new Product();
                        //  $unproduct->getProduct($item->id); 
                    ?>

                        <?php /*
                            <div class="vignette">
                                <a href="#" class="vignette-image" title="<?php echo ($unproduct->getName()); ?>">
                                    <img src="assets/img/<?php echo ($unproduct->getImage()); ?>" alt="Pardon je vous la pique 2s" />
                                </a>
                                <div>
                                    <p>
                                        <?php echo ($unproduct->getName()); ?>
                                        <?php echo ($unproduct->getPrice() . "€"); ?>
                                    </p>
                                </div>
                            </div>
                            */ ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>




            <p>Bouton "Vider le panier"</p>
        </div>
    </main>

    <?php include('_footer.php'); ?>
</body>

</html>