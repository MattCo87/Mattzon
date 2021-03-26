<?php

// Fonction retournant le tableau de tous les produits en BDD

function getProducts()
{
    // Connexion à la BDD
    $uneconnexion = new Database();
    $connexion = $uneconnexion->dbco;

    // On récupére tous les ID des produits en BDD
    $result = $connexion->prepare("SELECT id FROM product");
    $result->execute();
    $tableau = $result->fetchAll(PDO::FETCH_OBJ);

    return $tableau;
}