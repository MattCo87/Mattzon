<?php
// Démarre la session
session_start();

// Je récupère l'ID de l'article
$id = (isset($_GET['id']) ? (int)$_GET['id'] : false);
$act = (isset($_GET['act']) ? $_GET['act'] : false);

if($id && is_int($id)) {
  // On vérifie si le panier existe déjà
  if(isset($_SESSION['panier'])) {
    // Le panier existe
    $panier = $_SESSION['panier'];
    $itemExists = false;

    // On vérifie si le produit est déjà dans le panier
    foreach($panier as $key => $item){
      if($item['id'] == $id){
        if($act == 'true'){
        // Si oui, on incrémente sa quantité
        $panier[$key]['qte'] ++;          
        }
        if(($act == 'false') && ($panier[$key]['qte'] <> 0)){
          // Si non, on décrémente sa quantité          
          $panier[$key]['qte'] --;   
        } 
        $itemExists = true;
      }

      // On remplace notre panier
      $_SESSION['panier'] = $panier;
    }
  }
}

// On redirige vers la page d'accueil
header('Location: ../panier.php');


