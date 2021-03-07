<?php
/**
 * Récupération de tous les produits dans la base de données
 */
function getProducts($connexion) {
    $result = $connexion->prepare("SELECT id FROM product");
    $result->execute();
    $row = $result->fetchAll(PDO::FETCH_OBJ);
    return $row;    
}


/**
 * Récupération d'un produit dans la base de données
 */
function getProduct($connexion, $id) {
    $result = $connexion->prepare("SELECT * FROM product WHERE id = :id");
    $result->execute(['id' => $id]);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row;
}