<?php

// Connexion à la base de données
require_once('connexion_bdd.php');
require_once('Models/User.php');

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
$row = checkUser($connexion, [
    'email' => $email,
]);

if($row){
    $formulaireok = 0;
    $error = 'already';
}


// Test de la validité finale du formulaire d'inscription et ajout et/ou redirection
if ($formulaireok == 1) {

    // Création du user en base de données
    addUser($connexion, [
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'pwd' => $pwd,
    ]);

    // Redirection vers la page de connexion
    Header('Location: ../connexion.php?test=' . $error);

} else {
    // Redirection vers la page d'inscription
    Header('Location: ../inscription.php?message=' . $error);
}