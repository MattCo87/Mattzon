<?php

// Connexion à la base de données
require_once('connexion_bdd.php');

// Récupération des données du formulaire
var_dump($_POST['nom']);
$nom  = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$demande = $_POST['demande'];
$sujet = $_POST['sujet'];
$description = $_POST['description'];

$formulaireok = 1;
$error = 'msgok';

// Nettoyage des données
$nom = filter_var($nom, FILTER_SANITIZE_STRING);
$prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$demande = filter_var($demande, FILTER_SANITIZE_STRING);
$sujet = filter_var($sujet, FILTER_SANITIZE_STRING);
$descript = filter_var($description, FILTER_SANITIZE_STRING);

/*******************    TEST DES CHAMPS DU FORMULAIRE    ****************************** */
// Test de non-nullité du champ
foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $formulaireok =  0;
        $error = 'empty';
    }
}

/*******************    FIN TEST DES CHAMPS DU FORMULAIRE    ****************************** */

// Test de la validité finale du formulaire d'inscription et ajout et/ou redirection
if ($formulaireok == 1) {

    // Requete d'ajout de message
    try {
        // Début de la transaction
        $connexion->beginTransaction();
      
        // Requête d'insertion
        $result = $connexion->prepare("INSERT INTO msg VALUES (:id, :nom, :prenom, :email, :demande, :sujet, :descript) ");
        $result->execute(['id' => NULL, 'nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'demande' => $demande, 'sujet' => $sujet, 'descript' => $descript ]);
      
        // Si on arrive ici, alors on exécute la transaction :)
        $connexion->commit();

      } catch (PDOException $exception) {
        // On annule la transaction (on remet dans l'état initial)
        $connexion->rollback();
      
        // On gère l'exception
        die($exception->getMessage());
      }

        // Redirection vers la page de connexion
    Header('Location: ../index.php?message=' . $error);

} else {
    // Redirection vers la page d'inscription
    Header('Location: ../contact.php?message=' . $error);
}