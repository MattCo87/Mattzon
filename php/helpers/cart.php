<?php
session_start();

// Récupération de l'id
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    echo 'No id';
} else {
    // Modification du panier
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    if (!empty($cart)) {
        // Le panier existe, on cherche si le produit existe dedans
        if (isset($cart[$id])) {
            // Le produit existe, on incrémente sa quantité
            $cart[$id]++;
        } else {
            // Le produit n'existe pas dans le panier, on l'ajoute
            $cart[$id] = 1;
        }
    } else {
        // Le panier n'existe pas, on le crée
        $cart[$id] = 1;
    }

    $_SESSION['cart'] = $cart;

    // Récupération du nombre de produits dans le panier
    $qty = 0;
    foreach($cart as $itemId => $itemQty){
        $qty += $itemQty;
    }

    // Renvoi du nombre d'items dans le panier
    echo $qty;
}
