<?php

// Connexion à la base de données
require_once('connexion_bdd.php');

// Récupération des données du formulaire
$email = $_POST['email'];
$pwd = $_POST['password'];
$error = '';
$acces = false;

// Test de non-nullité du champ
foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $error = 'empty';
    }
}

// Nettoyage des données
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$pwd = filter_var($pwd, FILTER_SANITIZE_STRING);

// Requete qui récupère un utilisateur selon le mail et le pwd est indiqué
$result = $connexion->prepare("SELECT * FROM user WHERE email = :email AND pwd = :pwd");
$result->execute(['email' => $email, 'pwd' => $pwd]);
$row = $result->fetch(PDO::FETCH_ASSOC);


// Test s'il existe un résultat à la requête
if ($row) {

    // accès au site autorisé
    $acces = true;
    $error = 'registered';

    // Sinon le compte n'existe pas
} else {
    $error = 'invalide';
}

// Redirection
if ($acces) {
    // Vers index en mode connecté
    Header('Location: ../index.php?message=' . $error);
} else {
    // Vers la page de connexion avec message d'erreur
    Header('Location: ../connexion.php?message=' . $error);
}
