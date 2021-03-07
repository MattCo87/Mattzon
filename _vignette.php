<?php

// Connexion à la base de données
require_once('php/connexion_bdd.php');

// Import du modèle Product
require_once('php/Models/Product.php');

// Récupération d'un tableau de produit de la base de données
$tabProducts = getProducts($connexion);

foreach ($tabProducts as $value) {

    // Je récupére la description du produit par son ID
    $value = $value->id;
    $row = getProduct($connexion, $value);
?>

    <!-- Vignette produit -->
    <div class="vignette">
        <a href="#" class="vignette-image" title="<?php echo ($row['name']); ?>">
            <img src="assets/img/<?php echo ($row['image']); ?>" alt="Pardon je vous la pique 2s" />
        </a>
        <h3><?php echo ($row['name']); ?></h3>
        <p class="prix"><?php echo ($row['price']); ?>€</p>

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
<?php
}
?>