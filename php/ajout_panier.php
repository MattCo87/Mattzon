<?php

// Démarre la session
session_start();

// Je récupère l'ID de l'article
$id = (isset($_GET['id']) ? (int)$_GET['id'] : false);

if($id && is_int($id)) {

    $panier = [
        [ 
            'id' => $id,
            'qte' => 1,
        ],
    ];

    // On ajoute au panier
    $_SESSION['panier'] = $panier;

}

header('Location: ../index.php');


