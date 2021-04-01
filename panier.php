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
            <h1>Mon panier</h1>
            
            <?php if (!empty($_SESSION['cart'])) : ?>
                <div class="table">
                    <div class="table-row">
                        <div class="table-row-cell">&nbsp;</div>
                        <div class="table-row-cell">Nom du produit</div>
                        <div class="table-row-cell text-right">Prix Unitaire</div>
                        <div class="table-row-cell text-right">Quantité</div>
                        <div class="table-row-cell text-right">Total</div>
                        <div class="table-row-cell">&nbsp;</div>
                    </div>

                    <?php foreach ($_SESSION['cart'] as $id => $qty) :
                        $unproduct = new Product();
                        $unproduct->getProduct($id); ?>

                        <div class="table-row">
                            <a href="#" class="table-row-cell text-center" title="<?php echo $unproduct->getName(); ?>">
                                <img src="assets/img/<?php echo($unproduct->getImage()); ?>" alt="Pardon je vous la pique 2s" />
                            </a>
                            <div class="table-row-cell">
                                <a href="#" class="table-row-cell" title="<?php echo $unproduct->getName(); ?>">
                                        <?php echo $unproduct->getName(); ?>
                                </a>
                            </div>
                            <div class="table-row-cell text-right">
                                <?php echo $unproduct->getPrice() . "€"; ?>
                            </div>
                            <div class="table-row-cell text-right">
                                <?php echo $qty; ?>
                            </div>
                            <div class="table-row-cell text-right">
                                <?php echo number_format($unproduct->getPrice() * $qty, 2) . "€"; ?>
                            </div>
                            <div class="table-row-cell text-center">
                                <button type="button" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>

                <p class="text-right">
                    <button type="button" class="btn btn-danger" id="emptyCart">Vider le panier</button>
                </p>
            <?php else: ?>
                <p class="text-center">Votre panier est vide…</p>
            <?php endif; ?>
        </div>
    </main>

    <?php include('_footer.php'); ?>
</body>

</html>