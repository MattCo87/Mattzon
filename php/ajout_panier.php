<?php
// Démarre la session
session_start();

// Je récupère l'ID de l'article
$id = (isset($_GET['id']) ? (int)$_GET['id'] : false);

if($id && is_int($id)) {
  // On vérifie si le panier existe déjà
    if(isset($_SESSION['panier'])) {
      // Le panier existe
      $panier = $_SESSION['panier'];
      $itemExists = false;

      // On vérifie si le produit est déjà dans le panier
      foreach($panier as $key => $item){
        if($item['id'] == $id){
          // Si oui, onn incrémente sa quantité
          $panier[$key]['qte'] ++;
          $itemExists = true;
        }
      }

      // Si non, on ajoute un item [id, qte] au panier
      if(!$itemExists){
        $panier[] = [
          'id' => $id,
          'qte' => 1,
        ];
      }

    }else{
      // Le panier n'existe pas
      $panier = [
        [
          'id' => $id,
          'qte' => 1,
        ],
      ];
    }

    // On remplace notre panier
    $_SESSION['panier'] = $panier;
}

header('Location: ../index.php');


