<?php
// Démarre la session
session_start();

// Je récupère l'ID de l'article
$id = (isset($_GET['id']) ? (int)$_GET['id'] : false);

if ($id && is_int($id)) {
    // On vérifie si le panier existe déjà
    if (isset($_SESSION['panier'])) {
        // Le panier existe
        $panier = $_SESSION['panier'];

        foreach ($panier as $key => $item) {
            if ($item['id'] == $id) {
                // On supprime l'item
                unset($panier[$key]);
            }
        }

        // On remplace notre panier
        $_SESSION['panier'] = $panier;
    }
}

// On redirige vers la page panier
header('Location: ../panier.php');
