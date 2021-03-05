<?php

/**
 * Ajout d'un message en base de données
 */
function addMsg($connexion, $data) {
    // Requete d'ajout de message
    try {
        // Début de la transaction
        $connexion->beginTransaction();
      
        // Requête d'insertion
        $result = $connexion->prepare("INSERT INTO msg VALUES (:id, :nom, :prenom, :email, :demande, :sujet, :descript) ");
        $result->execute(['id' => NULL, 'nom' => $data['nom'], 'prenom' => $data['prenom'], 'email' => $data['email'], 'demande' => $data['demande'], 'sujet' => $data['sujet'], 'descript' => $data['descript'] ]);
      
        // Si on arrive ici, alors on exécute la transaction :)
        $connexion->commit();

      } catch (PDOException $exception) {
        // On annule la transaction (on remet dans l'état initial)
        $connexion->rollback();
      
        // On gère l'exception
        die($exception->getMessage());
      }
}