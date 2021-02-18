<?php
// Récupération des données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];
$connexion = false;
$error = '';

// Test si le email est existant dans la base d'user
if ($email=="test@test.com") {

// Test si le mot de passe indiqué correspond au password associé à l'email
    if ($password=="test") {
        $connexion = true;
        $error= 'registered';
    } else {
        $error= 'nomatch';
    }
    // Le compte n'existe pas
} else {
    $error= 'invalide';
}

// Redirection
if ($connexion) {
    // Vers index en mode connecté
    Header('Location: ../index.php?message=' . $error);
} else {
    // Vers la page de connexion
    Header('Location: ../connexion.php?message=' . $error);
}