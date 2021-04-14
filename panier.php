<?php
session_start();

// On inclut la classe Procduct
require_once('php/entities/Product.php');

// On récupère le total du panier
$cartTotal = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $qty) {
        $unproduct = new Product();
        $unproduct->getProduct($id);
        $cartTotal += $unproduct->getPrice() * $qty;
    }
}
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

    <!--   ******************************************   SECTION PANIER  ********************************************** -->
        <section class="container">
            <h1>Mon panier</h1>

            <?php if (!empty($_SESSION['cart'])) : ?>
                <div class="table">
                    <div class="table-row mb-3">
                        <div class="table-row-cell">&nbsp;</div>
                        <div class="table-row-cell fw-bold">Nom du produit</div>
                        <div class="table-row-cell fw-bold text-end">Prix Unitaire</div>
                        <div class="table-row-cell fw-bold text-center">Quantité</div>
                        <div class="table-row-cell fw-bold text-end">Total</div>
                        <div class="table-row-cell">&nbsp;</div>
                    </div>

                    <?php foreach ($_SESSION['cart'] as $id => $qty) :
                        $unproduct = new Product();
                        $unproduct->getProduct($id); ?>

                        <div class="table-row mb-2">
                            <a href="#" class="table-row-cell text-center" title="<?php echo $unproduct->getName(); ?>">
                                <img src="assets/img/<?php echo ($unproduct->getImage()); ?>" alt="Pardon je vous la pique 2s" />
                            </a>
                            <div class="table-row-cell">
                                <a href="#" class="table-row-cell" title="<?php echo $unproduct->getName(); ?>">
                                    <?php echo $unproduct->getName(); ?>
                                </a>
                            </div>
                            <div class="table-row-cell text-end">
                                <?php echo $unproduct->getPrice() . "€"; ?>
                            </div>
                            <div class="table-row-cell d-flex justify-content-center align-items-center">
                                <button type="button" class="btn qtymoins" data-productid="<?php echo $id; ?>">-</button>
                                <span class="qty" id="qty-<?php echo $id; ?>"><?php echo $qty; ?></span>
                                <button type="button" class="btn qtyplus" data-productid="<?php echo $id; ?>">+</button>
                            </div>
                            <div class="table-row-cell text-end">
                                <?php echo number_format($unproduct->getPrice() * $qty, 2) . "€"; ?>
                            </div>
                            <div class="table-row-cell text-center">
                                <button type="button" class="btn btn-outline-danger removeToCart" data-productid="<?php echo $id; ?>"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>

                <div class="table-row d-flex justify-content-end align-items-center mb-3">
                    <p class="me-3 my-2"><span class="fw-bold">Total :</span>&nbsp;<?php echo $cartTotal; ?>€</p>
                    <p class="my-2 me-2"><button type="button" class="btn btn-danger" id="emptyCart">Vider le panier</button></p>
                </div>
            <?php else : ?>
                <p class="text-center">Votre panier est vide…</p>
            <?php endif; ?>
            </div>
        </section>
    <!--   ******************************************   FIN SECTION PANIER  ********************************************** -->




    <!--   ******************************************   SECTION COMMANDE  ********************************************** -->
        <section class="container">

            <div class="container my-5">
                <hr />
            </div>

            <div class="container">
                <h2>Commander</h2>
            </div>

            <form class="app-form" method="post" action="#">
                    <fieldset>
                        <legend class="bg-light">Vos coordonnées</legend>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="email">Votre adresse e-mail *</label>
                            </div>
                            <div class="col">
                                <input type="email" id="email" name="email" class="form-control" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="name">Nom du destinataire *</label>
                            </div>
                            <div class="col">
                                <input type="text" id="name" name="name" class="form-control" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label for="adress">Adresse du destinataire *</label>
                            </div>
                            <div class="col">
                                <input type="text" id="adress" name="adress" class="form-control" required />
                            </div>
                        </div>

                    </fieldset>

                    <hr />

                    <fieldset>
                        <legend class="bg-light">Votre commande</legend>

                        <div class="row mb-3">
                            Bon de commande
                        </div>



                        
                    </fieldset>

                    <hr />

                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary ">Acheter</button>
                        </div>
                    </div>
                </form>
       



        </section>
    <!--   ******************************************   FIN SECTION COMMANDE  ********************************************** -->


    </main>
    <?php include('_footer.php'); ?>
</body>

</html>