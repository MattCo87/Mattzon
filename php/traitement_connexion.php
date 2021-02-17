<?php

// Récupération des données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];
$connexion = 0;
$error = '';


// Test si le email est existant dans la base d'user
if ($email=="test@test.com"){

    // Test si le mot de passe indiqué correspond au password associé à l'email
    if ($password=="test"){
        $connexion = 1;
        $error= 'registered';
    }
    else{
        $error= 'nomatch';
    }

// Le compte n'existe pas
}
else{
    $error= 'invalide';
}

// Redirection
//if ($connexion==1){

// Vers index en mode connecté
//    Header('Location: ../index.html?message=' . $error);
//}
//else{
// Vers la page de connexion
    Header('Location: ../connexion.php?message=' . $error);
//}