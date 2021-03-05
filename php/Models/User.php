<?php

function addUser($connexion, $data){
        // Requete d'ajout d'utilisateur
        try {
            // Début de la transaction
            $connexion->beginTransaction();
          
            // Requête d'insertion
            $result = $connexion->prepare("INSERT INTO user VALUES (:id, :nom, :prenom, :email, :pwd) ");
            $result->execute(['id' => NULL, 'nom' => $data['nom'], 'prenom' => $data['prenom'], 'email' => $data['email'], 'pwd' => $data['pwd']]);
          
            // Si on arrive ici, alors on exécute la transaction :)
            $connexion->commit();
    
          } catch (PDOException $exception) {
            // On annule la transaction (on remet dans l'état initial)
            $connexion->rollback();
          
            // On gère l'exception
            die($exception->getMessage());
          }
}

function login($connexion, $data){
    // Requete qui récupère un utilisateur selon le mail et le pwd est indiqué
    $result = $connexion->prepare("SELECT * FROM user WHERE email = :email AND pwd = :pwd");
    $result->execute(['email' => $data['email'], 'pwd' => $data['pwd']]);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row;
}