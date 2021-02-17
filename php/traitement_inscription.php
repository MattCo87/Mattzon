<?php

// Récupération des données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];
$passwordconfirm = $_POST['passwordconfirm'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$formulaireok = 1;
$error = 'registered';



// Test de non-nullité du champ
foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $formulaireok =  0;
        $error = 'empty';
    }
}
// Test de la confirmation du mot de passe
if ($password != $passwordconfirm) {
    $formulaireok =  0;
    $error = 'password';
}
// Test de la validité de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $formulaireok = 0;
    $error = 'email';
}

// Nettoyage des données
if ($formulaireok == 1) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = filter_var($passowrd, FILTER_SANITIZE_STRING);
    $nom = filter_var($nom, FILTER_SANITIZE_STRING);
    $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);

    // Redirection vers la page de connexion
    Header('Location: ../connexion.php?test=' . $error);
} else {
    // Redirection vers la page d'inscription
    Header('Location: ../inscription.php?message=' . $error);
}