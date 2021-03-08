<?php

// Démarre la session
session_start();

// Je récupère l'ID de l'article
$id = (isset($_GET['id']) ? $_GET['id'] : false);

if(is_int($id)) {
  // On ajoute au panier
  var_dump($id);

}

// Redirection vers l'accueil


