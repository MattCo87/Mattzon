<?php

// Connexion à la base de données
require_once('connexion_bdd.php');

// Récupération des données du formulaire
$email = $_POST['email'];
$pwd = $_POST['password'];
$passwordconfirm = $_POST['passwordconfirm'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

$formulaireok = 1;
$error = 'registered';

// Nettoyage des données
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$pwd = filter_var($pwd, FILTER_SANITIZE_STRING);
$nom = filter_var($nom, FILTER_SANITIZE_STRING);
$prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
$passwordconfirm = filter_var($passwordconfirm, FILTER_SANITIZE_STRING);

/*******************    TEST DES CHAMPS DU FORMULAIRE    ****************************** */
// Test de non-nullité du champ
foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $formulaireok =  0;
        $error = 'empty';
    }
}
// Test de la confirmation du mot de passe
if ($pwd != $passwordconfirm) {
    $formulaireok =  0;
    $error = 'password';
}
// Test de la validité de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $formulaireok = 0;
    $error = 'email';
}
/*******************    FIN TEST DES CHAMPS DU FORMULAIRE    ****************************** */

// Test de l'existence d'un mail dans la base

// Requete qui récupère un utilisateur selon le mail est indiqué
$result = $connexion->prepare("SELECT * FROM user WHERE email = :email");
$result->execute(['email' => $email]);
$row = $result->fetch(PDO::FETCH_ASSOC);

if($row){
    $formulaireok = 0;
    $error = 'already';
}


// Test de la validité finale du formulaire d'inscription et ajout et/ou redirection
if ($formulaireok == 1) {

    // Requete d'ajout d'utilisateur
    try {
        // Début de la transaction
        $connexion->beginTransaction();
      
        // Requête d'insertion
        $result = $connexion->prepare("INSERT INTO user VALUES (:id, :nom, :prenom, :email, :pwd) ");
        $result->execute(['id' => NULL, 'nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'pwd' => $pwd]);
      
        // Si on arrive ici, alors on exécute la transaction :)
        $connexion->commit();

      } catch (PDOException $exception) {
        // On annule la transaction (on remet dans l'état initial)
        $connexion->rollback();
      
        // On gère l'exception
        die($exception->getMessage());
      }

    // Redirection vers la page de connexion
    Header('Location: ../connexion.php?test=' . $error);

} else {
    // Redirection vers la page d'inscription
    Header('Location: ../inscription.php?message=' . $error);
}