<?php
session_start();

// Récupération de l'action
$action = isset($_GET['action']) ? $_GET['action'] : null;

// Récupération de l'id
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($action) {
    switch ($action) {
        case "add":
            addToCart();
            break;

        case "empty":
            emptyCart();
            break;

        case "remove":
            removeToCart($id);
            break;

        default:
            echo "Action inconnue";
            break;
    }
} else {
    echo "Pas d'action";
}


function addToCart()
{

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
        foreach ($cart as $itemId => $itemQty) {
            $qty += $itemQty;
        }

        // Renvoi du nombre d'items dans le panier
        echo $qty;
    }
}

function emptyCart()
{
    unset($_SESSION['cart']);
    echo "Panier vidé";
}

function removeToCart($id)
{
    // Suppression de l'article selectionné
    unset($_SESSION['cart'][$id]);

    // Modification du panier
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    // Récupération du nombre de produits dans le panier
    $qty = 0;
    foreach ($cart as $itemId => $itemQty) {
        $qty += $itemQty;
    }

    // Renvoi du nombre d'items dans le panier
    echo $qty;
}
