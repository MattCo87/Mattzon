<?php
// Connexion à la base de données
require_once('connexion_bdd.php');
require_once('Models/User.php');

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

// Vérification de l'utilisateur en base de données
$row = login($connexion, [
    'email' => $email,
    'pwd' => $pwd,
]);


// Test s'il existe un résultat à la requête
if ($row) {

    // accès au site autorisé
    $acces = true;
    $error = 'registered';

    // Sinon le compte n'existe pas
} else {
    $error = 'invalide';
}

if ($acces) {
    // On inscrit l'utilisateur en session
    session_start();
    $_SESSION['id'] = $row['id'];
    $_SESSION['prenom'] = $row['prenom'];
    $_SESSION['nom'] = $row['nom'];
    $_SESSION['email'] = $row['email'];

    // Redirection vers index en mode connecté
    Header('Location: ../index.php?message=' . $error);
} else {
    // Redirection vers la page de connexion avec message d'erreur
    Header('Location: ../connexion.php?message=' . $error);
}